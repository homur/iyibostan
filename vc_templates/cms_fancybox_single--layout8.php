<?php
extract(shortcode_atts(array(
   'image_icon'=>'',
), $atts));
?>
<?php
    $icon_name = "icon_" . $atts['icon_type'];
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $cms_fancybox_order_box = isset($atts['cms_fancybox_order_box']) ? $atts['cms_fancybox_order_box'] : '';
$layout_style = isset($atts['layout_style']) ? $atts['layout_style'] : '';
?>
<div class="cms-fancyboxes-wraper <?php echo esc_attr($atts['template']);?> <?php echo esc_attr($layout_style);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $image_url = '';
    if (!empty($atts['image'])) {
        $attachment_image = wp_get_attachment_image_src($atts['image'], 'full');
        $image_url = $attachment_image[0];
    }
    $image_url_icon = '';
    if (!empty($atts['image_icon'])) {
        $attachment_image_icon = wp_get_attachment_image_src($atts['image_icon'], 'full');
        $image_url_icon = $attachment_image_icon[0];
    }
    ?>

    <div class="cms-fancybox-item clearfix" style="background-image:url(<?php echo esc_attr($image_url);?>);">
        <div class="bg-overlay"></div>
        <a href="<?php echo esc_url($atts['button_link']);?>" class="link-overlay"></a>

        <div class="cms-fancybox-item-inner" >
            <div class="fancybox-left">
                <?php if($atts['description_item']): ?>
                    <div class="fancy-box-content">
                        <?php echo apply_filters('the_content',$atts['description_item']);?>
                    </div>
                <?php endif; ?>
                <?php if($atts['title_item']):?>
                    <h3 class="cms-fancybox-title custom-font-3">
                        <?php echo apply_filters('the_title',$atts['title_item']);?>

                    </h3>
                <?php endif;?>

            </div>
            <div class="fancybox-right">
                <?php if($atts['button_text']!=''):?>
                    <div class="cms-fancyboxes-footer">
                        <?php
                        $class_btn = ($atts['button_type']=='button')?'btn btn-default':'';
                        ?>
                        <a href="<?php echo esc_url($atts['button_link']);?>" class="<?php echo esc_attr($class_btn);?>"><span><?php echo esc_attr($atts['button_text']);?></span></a>
                    </div>
                <?php endif;?>
            </div>

        </div>

    </div>

</div>