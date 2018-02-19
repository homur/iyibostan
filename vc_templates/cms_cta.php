<?php
extract(shortcode_atts(array(
    'icon_type' => 'fontawesome',
    'button_text1'  => 'Button',
    'link_button1'  => '#',
    'button_text2'  => 'Button',
    'link_button2'  => '#',
    'image_icon1'  => '',
    'image_icon2'  => '',
    'image_background'  => '',
    'icon_align'  => 'left',
    'button_align'  => 'cta-right',
    'cta_subtext'  => '',
    'cta_text'  => '',
    'cta_text_color'  => '',
    'cta_subtext_color'  => '',

    'el_class'  => ''       
), $atts));
 
    $icon_name = "icon_" . $icon_type;
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    if (!empty($link_button1)){
        $link1 = vc_build_link($link_button1);

        if ( strlen( $link1['url'] ) > 0 ) {
            $a_href1 = $link1['url'];
        }
    }
    if (!empty($link_button2)){
        $link2 = vc_build_link($link_button2);
        if ( strlen( $link2['url'] ) > 0 ) {
            $a_href2 = $link2['url'];
        }
    }
    $image_background_url = '';
    if (!empty($atts['image_background'])) {
        $attachment_image = wp_get_attachment_image_src($atts['image_background'], 'full');
        $image_background_url = $attachment_image[0];
    }

?>
<div class="cms-cta-wrapper cms-style-default<?php echo esc_attr($el_class); ?> <?php echo esc_attr($button_align); ?>" style="background-image: url(<?php echo esc_attr($image_background_url);?>);">
    <div class="cms-cta-wrapper-inner">
        <div class="cms-cta-content">
            <div class="cms-cta-text">
                <?php if (!empty($cta_subtext) && $cta_subtext) { ?>
                    <div class="subtext" style="color: <?php echo esc_attr($cta_subtext_color); ?>;">
                        <?php echo esc_attr($cta_subtext); ?>
                    </div>
                <?php } ?>

                <?php if (!empty($cta_text) && $cta_text) { ?>
                <div class="text" style="color: <?php echo esc_attr($cta_text_color); ?>;">
                    <?php echo esc_attr($cta_text); ?>
                </div>
                <?php } ?>
            </div>


                <div class="cms-cta-button">
                    <?php if (!empty($button_text1) && $button_text1) { ?>
                        <a href="<?php echo esc_url($a_href1);?>" class="">
                        <?php switch ($icon_align) {
                            case 'right':
                                ?>
                                    <?php echo esc_attr($button_text1); ?>
                                        <?php
                                        $image_icon1_url = '';
                                        if (!empty($atts['image_icon1'])) {
                                            $attachment_icon1_image = wp_get_attachment_image_src($atts['image_icon1'], 'full');
                                            $image_icon1_url = $attachment_icon1_image[0];
                                        }
                                        ?>
                                        <?php if($image_icon1_url):?>
                                                <img src="<?php echo esc_attr($image_icon1_url);?>" alt="" />
                                        <?php else:?>
                                                <?php if(!empty($iconClass)):?>
                                                    <i class="<?php echo esc_attr($iconClass);?>"></i>
                                                <?php endif;?>
                                        <?php endif;?>

                                <?php
                                break;
                            case 'left':
                            default:
                                ?>

                                <?php
                                $image_icon1_url = '';
                                if (!empty($atts['image_icon1'])) {
                                    $attachment_icon1_image = wp_get_attachment_image_src($atts['image_icon1'], 'full');
                                    $image_icon1_url = $attachment_icon1_image[0];
                                }
                                ?>
                                <?php if($image_icon1_url):?>
                                <img src="<?php echo esc_attr($image_icon1_url);?>" alt="" />
                            <?php else:?>
                                <?php if(!empty($iconClass)):?>
                                    <i class="<?php echo esc_attr($iconClass);?>"></i>
                                <?php endif;?>
                            <?php endif;?>
                                <?php echo esc_attr($button_text1); ?>
                                <?php
                                break;
                        }?>
                    </a>
                    <?php } ?>
                    <?php if (!empty($button_text2) && $button_text2) { ?>
                        <a href="<?php echo esc_url($a_href2);?>" class="">
                        <?php switch ($icon_align) {
                            case 'right':
                                ?>
                                <?php echo esc_attr($button_text2); ?>
                                <?php
                                $image_icon2_url = '';
                                if (!empty($atts['image_icon2'])) {
                                    $attachment_icon2_image = wp_get_attachment_image_src($atts['image_icon2'], 'full');
                                    $image_icon2_url = $attachment_icon2_image[0];
                                }
                                ?>
                                <?php if($image_icon2_url):?>
                                <img src="<?php echo esc_attr($image_icon2_url);?>" alt="" />
                                <?php else:?>
                                    <?php if(!empty($iconClass)):?>
                                        <i class="<?php echo esc_attr($iconClass);?>"></i>
                                    <?php endif;?>
                                <?php endif;?>

                                <?php
                                break;
                            case 'left':
                            default:
                                ?>

                                <?php
                                $image_icon2_url = '';
                                if (!empty($atts['image_icon2'])) {
                                    $attachment_icon2_image = wp_get_attachment_image_src($atts['image_icon2'], 'full');
                                    $image_icon2_url = $attachment_icon2_image[0];
                                }
                                ?>
                                <?php if($image_icon2_url):?>
                                <img src="<?php echo esc_attr($image_icon2_url);?>" alt="" />
                                <?php else:?>
                                    <?php if(!empty($iconClass)):?>
                                        <i class="<?php echo esc_attr($iconClass);?>"></i>
                                    <?php endif;?>
                                <?php endif;?>
                                <?php echo esc_attr($button_text2); ?>
                                <?php
                                break;
                        }?>
                    </a>
                    <?php } ?>
                </div>

         </div>
    </div>
</div>