<?php 
    $icon_name = "icon_" . $atts['icon_type'];
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $cms_fancybox_sub_title = isset($atts['cms_fancybox_sub_title']) ? $atts['cms_fancybox_sub_title'] : '';
    $icon_custom = isset($atts['icon_custom']) ? $atts['icon_custom'] : '';
    $icon_custom_text = isset($atts['icon_custom_text']) ? $atts['icon_custom_text'] : '';

    $image_url = '';
    if (!empty($atts['image'])) {
        $attachment_image = wp_get_attachment_image_src($atts['image'], 'full');
        $image_url = $attachment_image[0];
    }
?>
<div class="cms-fancyboxes-wraper cms-fancybox-layout9 text-center <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>" style="background-image: url(<?php echo esc_attr($image_url);?>);">
    <div class="cms-fancyboxes-body">
        <div class="cms-fancybox-item">
            
            <div class="cms-fancybox-content-wrapper">
                <div class="cms-fancybox-icon">
                    <i class="<?php echo esc_attr($iconClass); echo esc_attr($icon_custom);?>">
                    <?php  echo esc_attr($icon_custom_text); ?>
                    </i>
                </div>
                
                <?php if($atts['button_text']!=''):?>
                    <div class="cms-fancybox-readmore">
                        <a href="<?php echo esc_url($atts['button_link']);?>"><?php echo esc_attr($atts['button_text']);?></a>
                    </div>
                <?php endif;?>

                <?php if($atts['title_item']):?>
                    <h3 class="cms-fancybox-title custom-font-3"><?php echo apply_filters('the_title',$atts['title_item']);?></h3>
                <?php endif;?>
        
                <?php if($atts['description_item']): ?>
                    <div class="cms-fancybox-content custom-font-1">
                        <?php echo apply_filters('the_content',$atts['description_item']);?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>