/**
 * Created by thien on 18/01/2016.
 */
jQuery(function($) {
    "use strict";

    $( window ).load(function() {
        $('.term-color input').wpColorPicker();

        // Only show the "remove image" button when needed
        $( '.term-image' ).find('input').each(function () {
            if (!$(this).val()) {
                $(this).parents('.term-image').find('.pcd_remove_image_button').hide();
            } else {
                $(this).parents('.term-image').find('.pcd_remove_image_button').show();
            }
        });
    });

    // Uploading files
    var file_frame;

    $( '.term-image' ).on( 'click', '.pcd_upload_image_button', function( event ) {

        var img_field = $(this).parents( '.term-image' );

        event.preventDefault();

        // If the media frame already exists, reopen it.
        if ( file_frame ) {
            file_frame.open();
            return;
        }

        // Create the media frame.
        file_frame = wp.media.frames.downloadable_file = wp.media({
            title: 'Choose an image',
            button: {
                text: 'Use image'
            },
            multiple: false
        });

        // When an image is selected, run a callback.
        file_frame.on( 'select', function() {
            var attachment = file_frame.state().get( 'selection' ).first().toJSON();

            img_field.find( 'input' ).val( attachment.id );

            var _url = (typeof attachment.sizes.thumbnail != 'undefined') ? attachment.sizes.thumbnail.url : attachment.url;

            img_field.find( 'img' ).attr( 'src', _url );
            img_field.find( '.pcd_remove_image_button' ).show();
        });

        // Finally, open the modal.
        file_frame.open();
    });

    $( '.term-image' ).on( 'click', '.pcd_remove_image_button', function() {
        $(this).parents( '.term-image' ).find( 'img' ).attr( 'src', '' );
        $(this).parents( '.term-image' ).find( 'input').val( '' );
        $(this).parents( '.term-image' ).find( '.pcd_remove_image_button' ).hide();
        return false;
    });

    /* icons. */

    /* show icons list. */
    $('.select-icon').on('click', function() {
        tb_show("Icons", "#TB_inline?inlineId=cms_icons_list");
    });

    /* icon select */
    $('.icons-content ul li').on('click', function () {

        $('#taxonomy-icon').val($(this).find('i').attr('class')).trigger("change");
        $('.select-icon i').attr('class', $(this).find('i').attr('class'));

        tb_remove();
    });
});