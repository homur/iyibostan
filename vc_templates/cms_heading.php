<?php
extract(shortcode_atts(array(
    'hd_subtitle' => '',
    'hd_title' => '',
    'hd_text_align'=>'',
    'heading_letter_spacing' => '',
    'heading_color' => '',
    'heading_size' => '',
    'heading_lineheight' => '',
), $atts));
?>
<div class="cms-heading-wrapper heading-layout2">
    <div class="row">
        <div class="cms-heading-inner col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="cms-heading-content">
                <h3 class="title custom-font-3" style="text-align:<?php echo esc_attr($hd_text_align); ?>;color: <?php echo esc_attr($heading_color)?>;font-size: <?php echo esc_attr($heading_size)?>;line-height: <?php echo esc_attr($heading_lineheight)?>;letter-spacing:<?php echo esc_attr($heading_letter_spacing)?>; ">
                    <?php echo esc_attr($hd_title); ?>
                </h3>
            </div>
            <div class="cms-heading-subtitle" style="text-align:<?php echo esc_attr($hd_text_align); ?>;">
                 <?php echo esc_attr($hd_subtitle); ?>
            </div>
        </div>
       
    </div>
</div>