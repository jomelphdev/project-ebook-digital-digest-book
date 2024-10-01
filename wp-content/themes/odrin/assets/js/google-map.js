(function($) {

/*
*  render_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

var $window = $(window);

function render_map( $el ) {

	// vars
	var args = {
		zoom				: $el.data('gmap-zoom') ? $el.data('gmap-zoom') : 15,
		center				: new google.maps.LatLng(0, 0),
		disableDefaultUI	: true,
		scrollwheel 		: false,
		mapTypeId			: google.maps.MapTypeId.ROADMAP,
		styles: [{"featureType": "all","elementType": "labels.text","stylers": [{"visibility": "off"}]},{"featureType": "administrative","elementType": "labels","stylers": [{"visibility": "on"}]},{"featureType": "landscape","elementType": "all","stylers": [{"visibility": "off"},{"color": "#ff0000"}]},{"featureType": "landscape.man_made","elementType": "geometry.fill","stylers": [{"color": "#e9e9e9"},{"visibility": "simplified"}]},{"featureType": "landscape.natural","elementType": "geometry.fill","stylers": [{"color": "#f5f5f2"},{"visibility": "on"}]},{"featureType": "poi","elementType": "all","stylers": [{"visibility": "on"}]},{"featureType": "poi","elementType": "labels.text","stylers": [{"visibility": "on"}]},{"featureType": "poi","elementType": "labels.icon","stylers": [{"visibility": "off"}]},{"featureType": "poi.attraction","elementType": "all","stylers": [{"visibility": "on"}]},{"featureType": "poi.attraction","elementType": "labels.icon","stylers": [{"visibility": "on"}]},{"featureType": "poi.business","elementType": "all","stylers": [{"visibility": "on"}]},{"featureType": "poi.business","elementType": "labels","stylers": [{"visibility": "on"},{"saturation": "-69"},{"lightness": "0"}]},{"featureType": "poi.government","elementType": "all","stylers": [{"visibility": "on"}]},{"featureType": "poi.government","elementType": "geometry","stylers": [{"visibility": "off"}]},{"featureType": "poi.medical","elementType": "all","stylers": [{"visibility": "on"}]},{"featureType": "poi.medical","elementType": "labels","stylers": [{"visibility": "on"},{"saturation": "-12"}]},{"featureType": "poi.park","elementType": "all","stylers": [{"color": "#a4b65d"},{"gamma": "1.51"},{"saturation": "0"},{"lightness": "15"}]},{"featureType": "poi.park","elementType": "labels.text","stylers": [{"visibility": "on"}]},{"featureType": "poi.park","elementType": "labels.text.fill","stylers": [{"visibility": "on"},{"color": "#528441"}]},{"featureType": "poi.park","elementType": "labels.text.stroke","stylers": [{"visibility": "on"},{"lightness": "20"}]},{"featureType": "poi.park","elementType": "labels.icon","stylers": [{"visibility": "off"}]},{"featureType": "poi.place_of_worship","elementType": "all","stylers": [{"visibility": "off"}]},{"featureType": "poi.school","elementType": "all","stylers": [{"visibility": "on"}]},{"featureType": "poi.sports_complex","elementType": "all","stylers": [{"visibility": "off"}]},{"featureType": "poi.sports_complex","elementType": "geometry","stylers": [{"color": "#c7c7c7"},{"visibility": "off"}]},{"featureType": "road.highway","elementType": "geometry","stylers": [{"visibility": "simplified"},{"color": "#fffae8"}]},{"featureType": "road.highway","elementType": "labels.text","stylers": [{"visibility": "simplified"},{"color": "#696969"}]},{"featureType": "road.highway","elementType": "labels.icon","stylers": [{"visibility": "off"}]},{"featureType": "road.arterial","elementType": "all","stylers": [{"visibility": "simplified"}]},{"featureType": "road.arterial","elementType": "geometry","stylers": [{"visibility": "simplified"}]},{"featureType": "road.local","elementType": "all","stylers": [{"color": "#fdfdfd"}]},{"featureType": "road.local","elementType": "geometry","stylers": [{"visibility": "on"}]},{"featureType": "road.local","elementType": "labels","stylers": [{"visibility": "simplified"},{"color": "#9b9b9b"}]},{"featureType": "transit","elementType": "all","stylers": [{"visibility": "off"}]},{"featureType": "water","elementType": "all","stylers": [{"color": "#a0d3d3"}]},{"featureType": "water","elementType": "labels","stylers": [{"visibility": "simplified"},{"color": "#7b7b7b"}]}]
	};

	


	// create map	        	
	var map = new google.maps.Map( $el[0], args);

	// Disable Scroll
	google.maps.event.addListener(map, 'click', function(event){
		this.setOptions({scrollwheel:true});
	});

	google.maps.event.addListener(map, 'drag', function(event){
		this.setOptions({scrollwheel:true});
	});

	// add a markers reference
	map.markers = [];

	// add markers
	add_marker( $el, map );


	// center map
	center_map( map );

	$window.on('resize', function(){
		center_map(map);
	})

}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery map element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $el, map ) {

	// var
	var latlng = new google.maps.LatLng( $el.attr('data-gmap-lat'), $el.attr('data-gmap-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map,
		icon		: $el.data('gmap-marker') != '' ? $el.data('gmap-marker') : ''
	});

	// add to array
	map.markers.push( marker );

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
		map.setCenter( bounds.getCenter() );
	    // map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/



$(document).ready(function(){

	$('.is-google-map').each(function(){

		render_map( $(this) );

	});



});

})(jQuery);