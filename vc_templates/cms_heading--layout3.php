<?php
extract(shortcode_atts(array(
    'hd_subtitle' => '',
    'hd_title' => '',
    'hd_text_align'=>'',
    'hd_description' => '',
    'heading_letter_spacing' => '',
    'heading_color'=>'',
    'heading_size'=>'',
    'heading_lineheight'=>'',
    'desc_color'=>'',
    'desc_size'=>'',
    'desc_lineheight'=>'',
    'custom_class' => '',

), $atts));
$image_url_icon = '';
if (!empty($atts['image_icon'])) {
    $attachment_image_icon = wp_get_attachment_image_src($atts['image_icon'], 'full');
    $image_url_icon = $attachment_image_icon[0];
}
?>
<div class="cms-heading-wrapper heading-layout4 <?php echo esc_attr($custom_class); ?>">
    <div class="row">
        <div class="cms-heading-inner col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="cms-heading-content">
                <?php if (!empty($hd_title) && $hd_title) { ?>
                    <h3 class="title custom-font-3" style="text-align:<?php echo esc_attr($hd_text_align); ?>;color: <?php echo esc_attr($heading_color)?>;font-size: <?php echo esc_attr($heading_size)?>;line-height: <?php echo esc_attr($heading_lineheight)?>;letter-spacing:<?php echo esc_attr($heading_letter_spacing)?>; ">
                         <?php echo esc_attr($hd_title); ?>
                    </h3>
                <?php } ?>

            </div>
            <?php if (!empty($hd_description) && $hd_description) { ?>
                <div class="description" style="text-align:<?php echo esc_attr($hd_text_align); ?>;color: <?php echo esc_attr($desc_color)?>;font-size: <?php echo esc_attr($desc_size)?>;line-height: <?php echo esc_attr($desc_lineheight)?>; ">
                    <?php echo apply_filters('the_content',$atts['hd_description']);?>
                </div>
            <?php } ?>
        </div>
       
    </div>
</div>