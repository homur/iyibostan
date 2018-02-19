<div class="cms-grid-wraper cms-pricing-layout2 <?php echo esc_attr($atts['template']);?> clearfix" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="row cms-pricing-sameheight <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        while($posts->have_posts()){
            $posts->the_post();
            $pricing_meta = wp_organic_post_meta_data();
            $pricing_currency = !empty($pricing_meta->_cms_pricing_currency) ? $pricing_meta->_cms_pricing_currency: '';
            $pricing_price = !empty($pricing_meta->_cms_pricing_price) ? $pricing_meta->_cms_pricing_price: '';
            $pricing_btn_text = !empty($pricing_meta->_cms_pricing_btn_text) ? $pricing_meta->_cms_pricing_btn_text: '';
            $pricing_btn_link = !empty($pricing_meta->_cms_pricing_btn_link) ? $pricing_meta->_cms_pricing_btn_link: '';
            $pricing_icon_font = !empty($pricing_meta->_cms_icon_font) ? $pricing_meta->_cms_icon_font: '';
            $pricing_margin_icon = !empty($pricing_meta->_cms_margin_icon) ? $pricing_meta->_cms_margin_icon: '';
            $pricing_subtitle = !empty($pricing_meta->_cms_pricing_subtitle) ? $pricing_meta->_cms_pricing_subtitle: '';
            $pricing_payment = !empty($pricing_meta->_cms_pricing_payment) ? $pricing_meta->_cms_pricing_payment: '';
            $pricing_feature = !empty($pricing_meta->_cms_pricing_feature) ? $pricing_meta->_cms_pricing_feature: '';
            $pricing_color_primary = !empty($pricing_meta->_cms_pricing_color_primary) ? $pricing_meta->_cms_pricing_color_primary: '';
            if (!empty($pricing_meta->_cms_icon_image)) {
                $attachment_image = wp_get_attachment_url($pricing_meta->_cms_icon_image, 'full');
            }
            $button = !empty($pricing_meta->_cms_button) ? $pricing_meta->_cms_button: '';
            ?>

            <div class="cms-pricing-item text-center <?php if($pricing_feature) { echo " pricing-feature";} ?> <?php echo esc_attr($atts['item_class']);?>">
                <div class="cms-pricing-item-inner">
                    <div class="cms-grid-icon" style="margin:<?php echo esc_attr($pricing_margin_icon);?>;">
                            <?php  if (!empty($pricing_meta->_cms_icon_image)):?>
                                <div class="cms-pricing-image">
                                    <img src="<?php echo esc_attr($attachment_image);?>" alt=""/>
                                </div>
                            <?php else:?>
                                <span class="pricing-icon">
                                    <i class="<?php echo esc_attr($pricing_icon_font);?>" style="color:<?php echo esc_attr($pricing_color_primary);?>; "></i>
                                </span>
                            <?php endif;?>

                    </div>
                    <div class="cms-grid-title">

                        <div class="cms-pricing-title">
                           <h3 class="custom-font-2"><?php the_title();?></h3>
                            <div class="subtitle"><?php echo esc_html($pricing_subtitle);?></div>
                        </div>
                        <?php if ($pricing_price){?>
                            <div class="cms-pricing-price custom-font-2">
                               <?php echo esc_attr($pricing_currency);?><?php echo esc_attr($pricing_price);?>

                            </div>
                        <?php }?>
                        <?php if ($pricing_payment){?>
                            <div class="cms-pricing-payment" style="color:<?php echo esc_attr($pricing_color_primary);?>; ">
                               <?php echo esc_attr($pricing_payment);?>

                            </div>
                        <?php }?>
                    </div>
                    <div class="cms-grid-content">
                        <div class="cms-pricing-content">
                            <?php the_content();?>
                        </div>
                        <div class="cms-ordernow">
                            <a class="btn btn-primary custom-font-2" href="<?php echo esc_url($pricing_btn_link);?>" style="background:<?php echo esc_attr($pricing_color_primary);?>;border-color:<?php echo esc_attr($pricing_color_primary);?>; "><?php echo esc_attr(
                            $pricing_btn_text);?></a>
                        </div>
                    </div>
                </div>
            </div>

                <?php
        }
        ?>
    </div>
</div>