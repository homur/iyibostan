<?php
extract(shortcode_atts(array(
    'icon_type' => 'fontawesome',
    'button_text'  => 'Button',
    'link_button'  => '#',
    'button_style'  => 'btn-default',
    'button_size'  => '',
    'button_shape'  => '',
    'button_color'  => '',

    'icon_align'  => 'left',
    'button_duplicated'  => '',
    'el_class'  => ''       
), $atts));
 
    $icon_name = "icon_" . $icon_type;
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $link = vc_build_link($link_button);
    $a_href = '';
    if ( strlen( $link['url'] ) > 0 ) {
        $a_href = $link['url'];
    }
?>
<div class="cms-button-wrapper <?php echo esc_attr($el_class); ?>">

    <a href="<?php echo esc_url($a_href);?>" class="btn <?php echo esc_attr($button_style); ?> <?php echo esc_attr($button_size); ?> <?php echo esc_attr($button_shape); ?> <?php echo esc_attr($button_color); ?>">
        <?php switch ($icon_align) {
            case 'right':
                ?>
                    <?php echo esc_attr($button_text); ?>
                    <?php if(!empty($iconClass)):?>
                    <i class="<?php echo esc_attr($iconClass);?>" style="padding-left: 6px;"></i>
                    <?php endif;?>
                <?php
                break;
            case 'left':
            default:
                ?>
                    <?php if(!empty($iconClass)):?>
                        <i class="<?php echo esc_attr($iconClass);?>" style="padding-right: 6px;"></i>     
                    <?php endif;?>
                    <?php echo esc_attr($button_text); ?>
                <?php
                break;
        }?>
    </a>
</div>