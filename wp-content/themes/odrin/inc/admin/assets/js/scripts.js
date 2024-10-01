jQuery(document).ready(function($){

	"use strict";

	/**
	 * ----------------------------------------------------------------------------------------
	 *    GLOBALS
	 * ----------------------------------------------------------------------------------------
	 */

	var $window = $(window);
	var $document = $(document);
	var $html = $('html');
	var $body = $('body');
	var isMobile = false;
	
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		isMobile = true;
	}


	var gmapsIntervalTries = 0;

	var gmapsInterval = setInterval(function() {
		if ( $('.gm-err-content').length ) {
			$('.gm-err-message').html(odrin_admin.gooleapi_error);
			$('.acf-google-map .canvas').css('height', '300px');
			clearInterval(gmapsInterval);
		}
		gmapsIntervalTries++;
		if ( gmapsIntervalTries >= 60 ) {
			clearInterval(gmapsInterval);
		}
	}, 100);


	/**
	* ----------------------------------------------------------------------------------------
	*    Admin Notices
	* ----------------------------------------------------------------------------------------
	*/

	$document.on( 'click', '.odrin-notice-documentation .notice-dismiss', function() {

		$.ajax({
			url: ajaxurl,
			data: {
				action: '_odrin_dismiss_documentation_notice'
			}
		})

	})

	$document.on( 'click', '.odrin-notice-update .notice-dismiss', function() {

		$.ajax({
			url: ajaxurl,
			data: {
				action: '_odrin_dismiss_update_notice'
			}
		})

	})

})
