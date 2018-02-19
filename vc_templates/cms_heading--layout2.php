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
    'subtitle_bottom'=>'',
    'custom_class' => '',
    'hd_subtitle_padding' => '',
), $atts));
$layout_style = isset($atts['layout_style']) ? $atts['layout_style'] : '';
?>
<div class="cms-heading-wrapper heading-layout3 <?php echo esc_attr($custom_class); ?> <?php echo esc_attr($layout_style);?>">
    <div class="row">
        <div class="cms-heading-inner col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="arctext2 custom-font-2 cms-heading-subtitle" style="text-align:<?php echo esc_attr($hd_text_align); ?>;margin-bottom:<?php echo esc_attr($subtitle_bottom); ?>;padding-right:<?php echo esc_attr($hd_subtitle_padding);?>">
                <?php echo esc_attr($hd_subtitle); ?>
            </div>
            <div class="cms-heading-content">
                <?php if (!empty($hd_title) && $hd_title) { ?>
                    <h3 class="title custom-font-3" style="text-align:<?php echo esc_attr($hd_text_align); ?>;color: <?php echo esc_attr($heading_color)?>;font-size: <?php echo esc_attr($heading_size)?>;line-height: <?php echo esc_attr($heading_lineheight)?>;letter-spacing:<?php echo esc_attr($heading_letter_spacing)?>; ">
                        <?php $title = $hd_title;

                        $tmp = explode(' ', $title);
                        $last = $tmp[count($tmp)-1];
                        $tmp[count($tmp)-1] = '';
                        $first = implode(' ', $tmp);
                        ?>
                        <?php echo esc_attr($first); ?><span class="custom-font-5"><?php echo esc_attr($last); ?></span>
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