jQuery(document).ready(function($){

/**
* ----------------------------------------------------------------------------------------
*    Image Upload Field
* ----------------------------------------------------------------------------------------
*/

	"use strict";

	var mediaUploader;

	$(document).on('click', '.ssd-upload-image-button',function(e) {
		e.preventDefault();

		var $uploadButton = $(this);
		var $widgetContainer = $uploadButton.closest('.widget-inside');
		var uploadButtonName = $uploadButton.data('name');
	    // If the uploader object has already been created, reopen the dialog
	    if (mediaUploader) {
	    	mediaUploader.open();
	    	return;
	    }
	    // Extend the wp.media object
	    mediaUploader = wp.media.frames.file_frame = wp.media({
	    	title: 'Select Image',
	    	button: {
	    		text: 'Select'
	    	},
	    	multiple: false
	    });

	    // When a file is selected, grab the URL and set it as the text field's value
	    mediaUploader.on('select', function() {
	    	var attachment = mediaUploader.state().get('selection').first().toJSON();
	    	$('input.ssd-widget-image-url-field[name="' + uploadButtonName + '"]').val(attachment.id );
	    	$('input[type="hidden"][name="' + uploadButtonName + '"]').val(attachment.id );
	    	$widgetContainer.find('.widget-control-save').trigger('click');
	    });
	    // Open the uploader dialog
	    mediaUploader.open();
	});

	$(document).on('click', '.ssd-widget-remove-image',function(e) {
		e.preventDefault();

		var $removeImageButton = $(this);
		var removeImageButtonName = $removeImageButton.data('image-remove');
		var $widgetContainer = $removeImageButton.closest('.widget-inside');

		$('input.ssd-widget-image-url-field[name="' + removeImageButtonName + '"]').val('');
	    $('input[type="hidden"][name="' + removeImageButtonName + '"]').val('');
	    $widgetContainer.find('.widget-control-save').trigger('click');
		
	});

/**
* ----------------------------------------------------------------------------------------
*    Multi Select Field
* ----------------------------------------------------------------------------------------
*/

	function initMultiSelect( widget_el ) {
        widget_el.find( '.ssdwf-multi-select:not(.selectized)' ).selectize({
        	create: true,
        	sortField: {
        		field: 'text',
        		direction: 'asc'
        	},
        	dropdownParent: 'body'
        });

    }

	function onFormUpdate( e, widget_el ) {

        if (  widget_el.find( '.ssdwf-multi-select' ) ) {
            initMultiSelect( widget_el, 'widget-added' === e.type );
        }
    }

	$(document).on( 'widget-added widget-updated', onFormUpdate );

	$( '#widgets-right .widget:has(.ssdwf-multi-select)' ).each( function () {
		initMultiSelect( $(this) );
	});

	


})