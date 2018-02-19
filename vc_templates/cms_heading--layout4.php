<?php
extract(shortcode_atts(array(
    'hd_title' => '',       
    'hd_description' => '',  
    'hd_btn_text' => '',       
    'hd_btn_link' => '',
    'heading_letter_spacing' => '',
    'heading_color'=>'',
    'heading_size'=>'',
    'heading_lineheight'=>'',
    'desc_color'=>'',
    'desc_size'=>'',
    'desc_lineheight'=>'',
    'custom_class' => '',
), $atts));

$link = vc_build_link($hd_btn_link);
$a_href = '';
$a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
}
?>
<div class="cms-heading-wrapper cms-heading-layout5 text-center <?php echo esc_attr($custom_class); ?>">
    <div class="cms-heading-inner">
        <div class="cms-heading-content">
            <h3 class="title custom-font-3" style="color: <?php echo esc_attr($heading_color)?>;font-size: <?php echo esc_attr($heading_size)?>;line-height: <?php echo esc_attr($heading_lineheight)?>;letter-spacing:<?php echo esc_attr($heading_letter_spacing)?>; "><?php echo esc_attr($hd_title); ?></h3>
            <span class="line-title"></span>
            <div class="content custom-font-1" style="color: <?php echo esc_attr($desc_color)?>;font-size: <?php echo esc_attr($desc_size)?>;line-height: <?php echo esc_attr($desc_lineheight)?>;"><?php echo apply_filters('the_content',$atts['hd_description']);?></div>
        </div>
        <?php if(!empty($hd_btn_text) && $hd_btn_text) { ?>
            <div class="cms-heading-button">
                <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>" class="btn btn-tiny">
                    <?php echo esc_attr($hd_btn_text); ?>
                </a>
            </div>
        <?php } ?>
    </div>
</div>