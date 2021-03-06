<?php 
    $icon_name = "icon_" . $atts['icon_type'];
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $cms_fancybox_sub_title = isset($atts['cms_fancybox_sub_title']) ? $atts['cms_fancybox_sub_title'] : '';
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
            <div class="icon-left">
                <?php if($image_url):?>
                    <div class="cms-fancybox-image">
                        <img src="<?php echo esc_attr($image_url);?>" alt="" />
                    </div>
                <?php else:?>
                    <span class="fancy-box-icon">
                        <i class="<?php echo esc_attr($iconClass);?>"></i>
                    </span>
                <?php endif;?>
            </div>
            <div class="content-right">
                <?php if($atts['title_item']):?>
                    <h5><?php echo apply_filters('the_title',$atts['title_item']);?></h5>
                <?php endif;?>

                <?php if($atts['description_item']): ?>
                    <div class="cms-fancybox-content">
                        <?php echo apply_filters('the_content',$atts['description_item']);?>
                    </div>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</div>