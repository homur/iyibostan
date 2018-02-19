<?php 
    $icon_name = "icon_" . $atts['icon_type'];
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $cms_fancybox_sub_title = isset($atts['cms_fancybox_sub_title']) ? $atts['cms_fancybox_sub_title'] : '';
    $icon_custom = isset($atts['icon_custom']) ? $atts['icon_custom'] : '';
    $icon_custom_text = isset($atts['icon_custom']) ? $atts['icon_custom_text'] : '';
?>
<div class="cms-fancyboxes-wraper cms-fancyboxes-layout1 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if($atts['title']!=''):?>
        <div class="cms-fancyboxes-header">
            <div class="cms-fancyboxes-title">
                <?php echo apply_filters('the_title',$atts['title']);?>
            </div>
            <div class="cms-fancyboxes-description">
                <?php echo apply_filters('the_content',$atts['description']);?>
            </div>
        </div>
    <?php endif;?>
    <div class="cms-fancyboxes-body">
        <div class="cms-fancybox-item">
            <?php 
                $image_url = '';
                if (!empty($atts['image'])) {
                    $attachment_image = wp_get_attachment_image_src($atts['image'], 'full');
                    $image_url = $attachment_image[0];
                }
            ?>
            <div class="cms-fancybox-item-title">

                    <?php if($image_url):?>
                        <div class="cms-fancybox-image">
                            <img src="<?php echo esc_attr($image_url);?>" alt=""/>
                        </div>
                    <?php else:?>
                        <?php if( $icon_custom ): ?>
                            <span class="fancy-box-icon"><i class="<?php echo esc_attr($icon_custom);?>"><?php echo esc_attr($icon_custom_text);?></i></span>
                        <?php else: if( $iconClass ): ?>
                            <span class="fancy-box-icon">
                                <i class="<?php echo esc_attr($iconClass);?>"></i>
                            </span>
                        <?php endif; ?>
                        <?php endif; ?>

                    <?php endif;?>

                <?php if($atts['title_item']):?>
                    <h5><?php echo apply_filters('the_title',$atts['title_item']);?></h5>
                <?php endif;?>
            </div>

            <div class="content-center">


                <?php if($atts['description_item']): ?>
                    <div class="cms-fancybox-content">
                        <?php echo apply_filters('the_content',$atts['description_item']);?>
                    </div>
                <?php endif; ?>
                <?php if($atts['button_text']!=''):?>
                    <div class="cms-fancyboxes-footer">
                        <?php
                        $class_btn = ($atts['button_type']=='button')?'btn btn-default':'';
                        ?>
                        <a href="<?php echo esc_url($atts['button_link']);?>" class="<?php echo esc_attr($class_btn);?>"><?php echo esc_attr($atts['button_text']);?></a>
                    </div>
                <?php endif;?>
            </div>
            
        </div>
    </div>
</div>