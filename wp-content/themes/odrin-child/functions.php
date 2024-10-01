<?php
add_action( 'wp_enqueue_scripts', '_action_odrin_enqueue_styles' );
function _action_odrin_enqueue_styles() {

	$parent_styles = array(
		'font-awesome',
		'owl-carousel',
		'et-line',
		'animatecss',
		'simplelightbox',
		'perfect-scrollbar',
		'bookblock',
		'odrin_master-css',
		'odrin_custom-css'
	);

	wp_enqueue_style( 'child-styles' , get_stylesheet_directory_uri() . '/style.css', $parent_styles);

}




// CURRENT CHANGES START

if(!is_user_logged_in()) {
	if (strpos($_SERVER['REQUEST_URI'], 'login') === false) {
		wp_redirect('login');
	}
}


function creds() {
	return array(
		'username' => 'ck_ca65581060a64373bc6c34dc2daee365d7dd4400',
		'password' => 'cs_e3454aafb71deb94705407628b368a7cc2e16719',
		'domain_name' => 'Digital DigestBook',
		'base_url' => str_replace(array('https://', 'http://', 'www'), array('', '', ''), get_base_url())
	);
}

/**
 * ADD NEW USER COLUMN FOR ACTIVE STATUS
 */
function new_active_status( $active_status ) {
    $active_status['active_status'] = 'Active Status';
    return $active_status;
}
add_filter( 'user_contactmethods', 'new_active_status', 10, 1 );


function new_modify_user_table( $column ) {
    $column['active_status'] = 'Active Status';
	if (isset($column['posts'])) unset($column['posts']);
	if (isset($column['locked'])) unset($column['locked']);
    return $column;
}
add_filter( 'manage_users_columns', 'new_modify_user_table' );

function new_modify_user_table_row( $val, $column_name, $user_id ) {
    switch ($column_name) {
        case 'active_status' :
            return get_user_meta($user_id, 'active_status', true) == "1" ? "Active" : "Inactive";
            // return get_user_meta($user_id, 'active_status', true);
        default:
    }
    return $val;
}
add_filter( 'manage_users_custom_column', 'new_modify_user_table_row', 10, 3 );


/**
 * Bypass Force Login to allow for exceptions.
 *
 * @param bool $bypass Whether to disable Force Login. Default false.
 * @param string $visited_url The visited URL.
 * @return bool
 */
function my_forcelogin_bypass( $bypass, $visited_url ) {

	// Allow 'My Page' to be publicly accessible
	if ( is_page(array(2334, 'my-account', 'my-account-lost-password')) ) {
		$bypass = true;
	}

	if (strpos($_SERVER['REQUEST_URI'], '/wp-json/wp/v2/users/register') != "") {
		$bypass = true;
	} 

	return $bypass;
}
add_filter( 'v_forcelogin_bypass', 'my_forcelogin_bypass', 10, 2 );

/**
 * POSTBACK ENDPOINTS
 */

add_action( 'rest_api_init', function () {
	register_rest_route('wp/v2', 'users/register', array(
		'methods' => 'POST',
		'callback' => 'wc_rest_user_endpoint_handler',
		'permission_callback' => '__return_true'
	));
} );

function wc_rest_user_endpoint_handler($request = null) {
	$reponseCode = 200;
	$response = array();
	$parameters = $request->get_params();
	
	$username = sanitize_text_field($parameters['email']); // use email as username
	$firstname = sanitize_text_field($parameters['firstname']);
	$lastname = sanitize_text_field($parameters['lastname']);
	$email = sanitize_text_field($parameters['email']);
	$order_id = sanitize_text_field($parameters['order_id']);
	$limit = sanitize_text_field($parameters['limit']);

	//shipping address
	$shippingDetails = array(
		'shipping_first_name' => $firstname,
		'shipping_last_name' => $lastname,
		'shipping_phone' => sanitize_text_field($parameters['phone']),
		'shipping_city' => sanitize_text_field($parameters['shippingCity']),
		'shipping_state' => sanitize_text_field($parameters['shippingState']),
		'shipping_country' => sanitize_text_field($parameters['shippingCountry']),
		'shipping_address_1' => sanitize_text_field($parameters['address']),
		'shipping_postcode' => sanitize_text_field($parameters['zipcode'])
	);

	$password = getRandomString(12);
	$emailArr = explode("@", $email);

	//auth checking
	if (auth_checking() === false) {
		$reponseCode = 401;
		$response['code'] = 401;
		$response['message'] = __("Unauthorized", 'wp-rest-user');
		return new WP_REST_Response($response, $reponseCode);
	}

	if (isset($limit) && $limit != "") {
		for($i = 1; $i <= $limit; $i++) {
			$usernameLoop  = $username.''.$i;
			$email     = $emailArr[0] . $i . "@" . $emailArr[1];
			$resSingle = register_user($usernameLoop, $firstname, $lastname, $email, $password, $order_id, $shippingDetails);
			if ($resSingle['code'] != 200) $reponseCode = $resSingle['code'];
			$response[] = $resSingle;
		}
	} else {
		$resSingle = register_user($username, $firstname, $lastname, $email, $password, $order_id, $shippingDetails);
		if ($resSingle['code'] != 200) $reponseCode = $resSingle['code'];
		$response[] = $resSingle;
	}

	return new WP_REST_Response($response, $reponseCode);
}

function register_user($username, $firstname, $lastname, $email, $password, $order_id, $shippingDetails) {
	$response = array();
	$error = new WP_Error();

	if (empty($username)) {
		$response['code'] = 400;
		$response['message'] = __("Username field 'username' is required.", "wp-rest-user");
		return $response;
	}
	if (empty($email)) {
		$response['code'] = 400;
		$response['message'] = __("Email field 'email' is required.", 'wp-rest-user');
		return $response;
	} else {
		if (!is_email($email)) {
			$response['code'] = 400;
			$response['message'] = __("Email field is invalid.", 'wp-rest-user');
			return $response;
		}
	}

	$user_id = username_exists($username);

	if (!$user_id && email_exists($email) == false) {
		$user_id = wp_create_user($username, $password, $email);
		if (!is_wp_error($user_id)) {
			// Ger User Meta Data (Sensitive, Password included. DO NOT pass to front end.)
			$user = get_user_by('id', $user_id);
			$user->set_role('customer');
			
			// generate gift card
				// $giftCard = customer_gift_card(get_base_url(), $email);
				// $giftCardNumber = $giftCard[0]->gift_card->number;

			$emailConfirmationSub = "Customer Account Confirmation";
			$emailSubject = "Welcome to " . creds()['domain_name'];

			// add user meta data
				// add_user_meta($user_id, 'gift_card_id', $giftCardNumber, true);
			add_user_meta($user_id, 'active_status', "1", true);
			add_user_meta($user_id, 'order_id', $order_id, true);
			// send email for confirmation
				// customer_account_confirmation_email($emailConfirmationSub, $email, get_base_url());
			// send email for coupon details
				customer_login_creds($emailSubject, $firstname, $lastname, get_base_url(), $email, $password);


			wp_update_user([
				'ID' => $user_id, // this is the ID of the user you want to update.
				'first_name' => $firstname,
				'last_name' => $lastname,
			]);

			// update shipping address
			foreach ($shippingDetails as $meta_key => $meta_value ) {
				update_user_meta( $user_id, $meta_key, $meta_value );
			}

			// WooCommerce specific code
			if (class_exists('WooCommerce')) {
				$user->set_role('customer');
			}
			// Ger User Data (Non-Sensitive, Pass to front end.)
			$response['code'] = 200;
			$response['message'] = __("User '" . $username . "' Registration was Successful", "wp-rest-user");
		} else {
			return $user_id;
		}
	} else {
		$response['code'] = 400;
		$response['message'] = __("Email or Username is already exists, please try 'Reset Password'", 'wp-rest-user');
		return $response;
	}

	return $response;
}

add_action( 'rest_api_init', function () {
	register_rest_route( 'wp/v2', '/customer/rebill', array(
		'methods'  => 'POST',
		'callback' => 'customer_rebill',
		'permission_callback' => '__return_true',
	) );
} );

function customer_rebill($request) {
	$reponseCode = 200;
	$response = array();
	$parameters = $request->get_params();
	
	$isActive = sanitize_text_field($parameters['is_active']);
	$email = sanitize_text_field($parameters['email']);
	
	//auth checking
	if (auth_checking() === false) {
		$reponseCode = 401;
		$response['code'] = 401;
		$response['message'] = __("Unauthorized", 'wp-rest-user');
		return new WP_REST_Response($response, $reponseCode);
	}

	if (empty($email)) {
		$reponseCode = 400;
		$response['code'] = 400;
		$response['message'] = __("Email field 'email' is required.", 'wp-rest-user');
		return new WP_REST_Response($response, $reponseCode);
	}

	if ((isset($email) && $email != "") && (isset($isActive) && $isActive != "")) {
		$user = get_user_by_email($email);
		if (empty($user)) {
			$reponseCode = 400;
			$response['code'] = 400;
			$response['message'] = __("Invalid email please try a new email", 'wp-rest-user');
			return new WP_REST_Response($response, $reponseCode);
		}

		$userId = $user->get('ID');

		// add separated user meta for active status
		add_user_meta($userId, 'active_status', $isActive, true);

		if (isset($userId) && $userId != "") {
			if ($isActive == "1") {
				// unlock the customer
				delete_user_meta($userId, 'baba_user_locked');
				update_user_meta($userId, 'active_status', '1');

				$reponseCode = 200;
				$response['code'] = 200;
				$response['message'] = __("Active Status set to ACTIVE - '$email'.", 'wp-rest-user');
			} elseif ($isActive == "0") {
				// lock the customer
				add_user_meta($userId, 'baba_user_locked', 'yes');
				delete_user_meta($userId, 'active_status');

				$reponseCode = 200;
				$response['code'] = 200;
				$response['message'] = __("Active Status set to INACTIVE - '$email'", 'wp-rest-user');
			}
		} else {
			$reponseCode = 400;
			$response['code'] = 400;
			$response['message'] = __("Can't find the user ID", 'wp-rest-user');
		}
	} else {
		$reponseCode = 400;
		$response['code'] = 400;
		$response['message'] = __("Parameter mismatch", 'wp-rest-user');
	}

	return new WP_REST_Response($response, $reponseCode);
	exit;
}

function customer_account_confirmation_email($subject, $email, $baseUrl) { // email = "lance.kinsman530@gmail.com"
	$domainName = creds()['domain_name'];
	$urlReplace = creds()['base_url'];

	$html = "
		<div style='
			margin: 0 25%;
		'>
		<h2 style='
			margin-bottom: 20px;
		'>Digital Discount Portal</h2>
		<p style='
			font-size: 16px;
		'>Welcome to Digital Discount Portal</p>
		<br>
		<p style='
			color: #6c757d7d;
		'>You've activated your customer account. Next time you shop with us, login for faster checkout.</p>
		<br>
		<a href='$baseUrl' style='
			color: #fff;
			background-color: #007bff;
			border-color: #007bff;
			display: inline-block;
			font-weight: 400;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			border: 1px solid transparent;
			padding: 10px;
			font-size: 1rem;
			line-height: 1.5;
			border-radius: .25rem;
			transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
		'>Visit our store</a>
		<br>
		<br>
		<br>
		<br>
		<p style='
			color: #6c757d7d;
		'>If you have any questions, reply to this email or contact us at <a href='mailto:support@$urlReplace'>support@$urlReplace</a>
		</p>
		</div>
	";

	return wp_mail($email, $subject, $html, email_headers());
}

function customer_login_creds($subject, $firstname, $lastname, $baseUrl, $email, $password) {
	$domainName = creds()['domain_name'];
	$urlReplace = creds()['base_url'];

	$yearNow = date('Y');

	$html = "<table width='100%' cellpadding='0' cellspacing='0' role='presentation' style='background:#edf2f7;margin:0px;padding:32px 15px;width:100%!important'>
		<tbody style=".'"'."font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'".'"'.">
		<tr>
			<td align='center'>
				<table width='100%' cellpadding='0' cellspacing='0' role='presentation' style='margin:0px;padding:0px;max-width:570px'>
					<tbody>
						
					<tr>
						<td width='100%' cellpadding='0' cellspacing='0' style='border-top-width:1px;border-top-color:rgb(237,242,247);border-bottom-width:1px;border-bottom-color:rgb(237,242,247);margin:0px;padding:0px'>
							<table align='center' cellpadding='0' cellspacing='0' role='presentation' style='background-color:rgb(255,255,255);border-color:rgb(232,229,239);border-radius:2px;border-width:1px;margin:0px auto;padding:0px;max-width:570px'>
								<tbody>
								<tr>
									<td style='padding:10px 0px;text-align:center'>&nbsp;
										<table cellpadding='0' cellspacing='0' role='presentation' style='text-align:center;width:100%;max-width:250px;margin:auto'>
											<tbody>
												<tr>
													<td style='padding:5px' valign='middle'>
														<a href='$baseUrl' style='text-decoration:none;color:rgb(61,72,82);font-size:1.6em;font-weight:bold;display:inline-block;text-align:right' target='_blank'>
															<img src='$baseUrl/wp-content/uploads/2024/03/BLACK.png' width='100%' style='max-width:100%;max-height:84px;display:block' class='CToWUd' data-bit='iit' jslog='138226; u014N:xr6bB; 53:WzAsMl0.'>
														</a>
													</td>
													
												</tr>
											</tbody>
											</table>     
									</td>
								</tr>
								<tr>
									<td style='max-width:100vw;padding:0px 15px 32px'>
									
										<table width='100%' cellpadding='0' cellspacing='0' role='presentation' style='text-align:center;background-color: #31a2e6;'>
											<tbody>
											<tr>
												<td style='padding:16px'>
													<p style='margin:0px;line-height:1.5em;padding-bottom:0px;font-size:1.3em'>
														<span style='color:inherit;text-decoration:none;text-transform:uppercase;font-weight:bold;color:#ffffff'>THANK YOU FOR JOINING</span>
													</p>
												</td>
											</tr>
											</tbody>
										</table>
										<p style='margin-top:0'><img width='100%' src='$baseUrl/wp-content/uploads/2024/03/img-7b-copyright.jpg' style='font-size:1rem;width:100%;display:block' class='CToWUd a6T' data-bit='iit' tabindex='0'><div class='a6S' dir='ltr' style='opacity: 0.01; left: 705.984px; top: 858.328px;'><span data-is-tooltip-wrapper='true' class='a5q' jsaction='JIbuQc:.CLIENT'><button class='VYBDae-JX-I VYBDae-JX-I-ql-ay5-ays CgzRE' jscontroller='PIVayb' jsaction='click:h5M12e;clickmod:h5M12e; pointerdown:FEiYhc; pointerup:mF5Elf; pointerenter:EX0mI; pointerleave:vpvbp; pointercancel:xyn4sd; contextmenu:xexox;focus:h06R8; blur:zjh6rb;mlnRJb:fLiPzd;' data-idom-class='CgzRE' jsname='hRZeKc' aria-label='Download attachment ' data-tooltip-enabled='true' data-tooltip-id='tt-c76' data-tooltip-classes='AZPksf' id='' jslog='91252; u014N:cOuCgd,Kr2w4b,xr6bB; 4:WyIjbXNnLWY6MTc2Mjc3NjczOTc0MzQ1MzIyMSJd; 43:WyJpbWFnZS9qcGVnIl0.'><span class='OiePBf-zPjgPe VYBDae-JX-UHGRz'></span><span class='bHC-Q' data-unbounded='false' jscontroller='LBaJxb' jsname='m9ZlFb' soy-skip='' ssk='6:RWVI5c'></span><span class='VYBDae-JX-ank-Rtc0Jf' jsname='S5tZuc' aria-hidden='true'><span class='bzc-ank' aria-hidden='true'><svg height='20' viewBox='0 -960 960 960' width='20' focusable='false' class=' aoH'><path d='M480-336 288-528l51-51 105 105v-342h72v342l105-105 51 51-192 192ZM263.717-192Q234-192 213-213.15T192-264v-72h72v72h432v-72h72v72q0 29.7-21.162 50.85Q725.676-192 695.96-192H263.717Z'></path></svg></span></span><div class='VYBDae-JX-ano'></div></button><div class='ne2Ple-oshW8e-J9' id='tt-c76' role='tooltip' aria-hidden='true'>Download</div></span></div><br></p>
										<p style=".'"'."font-weight:bold;font-size:1.3em;color:rgb(61,72,82);font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';text-align: center;".'"'.">
											You can use the following link to confirm your account:</p>
											<table width='100%' cellpadding='0' cellspacing='0' role='presentation' style='margin:21px 0px'>
												<tbody>
												<tr>
													<td style='background-color:#e85728;color:#fff;padding:16px'>
														<table width='100%' cellpadding='0' cellspacing='0' role='presentation' style='text-align:center'>
															<tbody>
																<tr>
																	<td style='padding:0px'><p style='margin:0px;line-height:1.5em;padding-bottom:0px'>
																		<a href='$baseUrl' style='color:#fff;text-decoration:none;font-weight:bold' target='_blank'>LOGIN</a>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
												</tbody>
											</table>
										<p style='line-height:1.5em'>If you’re having trouble clicking
											the 'Login , copy and paste the URL below into your web
											browser:</p><p style='line-height:1.5em'></p>
										<p style='line-height:1.5em'><a href='$baseUrl/login' target='_blank'>$baseUrl/login</a></p><p style='line-height:1.5em'><b>Email:</b> <a href='mailto:$email' target='_blank'>$email</a></p><p style='line-height:1.5em'><b>Password:</b> $password</p>
										<p style='line-height:1.5em'><br></p>
										
										<div style='text-align:center'><br></div>
										<div style='text-align:center'><span style='font-size:1rem'>In order to receive all our communications in your inbox&nbsp;</span>
										</div>
										<div style='text-align:center'><span style='font-size:1rem'>please add </span><b style='font-size:1rem'>support@$urlReplace</b>
										</div>
										<div style='text-align:center'><span style='font-size:1rem'>to you address book and authorize automatic image downloads.<br><br></span>
										</div>
										
									</td>
								</tr>
								</tbody>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table align='center' cellpadding='0' cellspacing='0' role='presentation' style='margin:0px auto;padding:0px;text-align:center;max-width:570px'>
								<tbody>
								<tr>
									<td align='center' style='max-width:100vw;padding:32px'><p style='line-height:1.5em;color:rgb(176,173,197);font-size:12px'>
										© $yearNow $domainName. All rights reserved.</p></td>
								</tr>
								</tbody>
							</table>
						</td>
					</tr>
					</tbody>
				</table>
			</td>
		</tr>
		</tbody>
	</table>";

	return wp_mail($email, $subject, $html, email_headers());
}
/**
 * Instraction: change Reply-To based on the email reply availble per site
 */
function email_headers() {
	$headers = array(
        'Content-Type: text/html; charset=UTF-8',
        "Reply-To: Digital Digestbook <support@digitaldigestbook.com>",
    );

	return $headers;
}

// redirect the admin to dashboard after login
function redirect_to_dashboard() {
    // Check if the user is an administrator
    if (current_user_can('administrator')) {
        // Redirect to the admin dashboard
        wp_redirect(admin_url());
        exit;
    }
}
add_action('wp_login', 'redirect_to_dashboard');

function getRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';

    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $string;
}

function get_base_url() {
	$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] 
                === 'on' ? "https" : "http") . 
                "://" . $_SERVER['HTTP_HOST'];

	return $link;
}

function auth_checking() {
	$final_username = "rsf2adminuser";
	$final_password = "3bSFfhKUhe";

	$server_username = $_SERVER['PHP_AUTH_USER'];
	$server_password = $_SERVER['PHP_AUTH_PW'];

	if ($final_username != $server_username || $final_password != $server_password) {
		return false;
	}

	return true;
}

function dump_now($arr) {
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}