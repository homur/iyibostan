<?php 
    $icon_name = "icon_" . $atts['icon_type'];
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $icon_color = isset($atts['icon_color']) ? $atts['icon_color'] : '';
    $digit_color = isset($atts['digit_color']) ? $atts['digit_color'] : '';
    $title_color = isset($atts['title_color']) ? $atts['title_color'] : '';
    $icon_fontsize = isset($atts['icon_fontsize']) ? $atts['icon_fontsize'] : '';
    $icon_custom = isset($atts['icon_custom']) ? $atts['icon_custom'] : '';
?>
<div class="cms-counter-wraper cms-counter-layout-default <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="cms-counter-body clearfix">
        <div class="cms-counter-content">
			<div style="color: <?php echo esc_attr($digit_color)?>" id="counter_<?php echo esc_attr($atts['html_id']);?>" class="cms-counter <?php echo esc_attr(strtolower($atts['type']));?>" data-suffix="<?php echo esc_attr($atts['suffix']);?>" data-prefix="<?php echo esc_attr($atts['prefix']);?>" data-type="<?php echo esc_attr(strtolower($atts['type']));?>" data-digit="<?php echo esc_attr($atts['digit']);?>">
			</div>
            <div class="cms-counter-icon">
                <?php if( $icon_custom ): ?>
                    <i class="<?php echo esc_attr($icon_custom); ?>" style="color: <?php echo esc_attr($icon_color)?>; font-size: <?php echo esc_attr($icon_fontsize)?>;"></i>
                <?php else: if( $iconClass ): ?>
                    <i class="<?php echo esc_attr($iconClass); ?>" style="color: <?php echo esc_attr($icon_color)?>; font-size: <?php echo esc_attr($icon_fontsize)?>;"></i>
                <?php endif; ?>
                <?php endif; ?>
            </div>
            <?php if($atts['c_title']):?>
                <div class="cms-counter-title custom-font-6 dark2" style="color: <?php echo esc_attr($title_color)?>">
                    <?php echo apply_filters('the_title',$atts['c_title']);?>
                </div>
            <?php endif;?>
        </div>

    </div>
</div>