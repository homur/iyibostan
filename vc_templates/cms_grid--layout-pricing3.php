<div class="cms-grid-wraper cms-pricing-layout3 <?php echo esc_attr($atts['template']);?> clearfix" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="row cms-pricing-sameheight <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        while($posts->have_posts()){
            $posts->the_post();
            $attachment_image='';
            $pricing_meta = wp_organic_post_meta_data();
            $pricing_currency = !empty($pricing_meta->_cms_pricing_currency) ? $pricing_meta->_cms_pricing_currency: '';
            $pricing_price = !empty($pricing_meta->_cms_pricing_price) ? $pricing_meta->_cms_pricing_price: '0';
            $pricing_btn_text = !empty($pricing_meta->_cms_pricing_btn_text) ? $pricing_meta->_cms_pricing_btn_text: '';
            $pricing_btn_link = !empty($pricing_meta->_cms_pricing_btn_link) ? $pricing_meta->_cms_pricing_btn_link: '';
            $pricing_time = !empty($pricing_meta->_cms_pricing_time) ? $pricing_meta->_cms_pricing_time: '';
            $pricing_feature = !empty($pricing_meta->_cms_pricing_feature) ? $pricing_meta->_cms_pricing_feature: '';
            $button = !empty($pricing_meta->_cms_button) ? $pricing_meta->_cms_button: '';
            $pricing_button_style = !empty($pricing_meta->_cms_button_style) ? $pricing_meta->_cms_button_style: '';
            $pricing_color_primary = !empty($pricing_meta->_cms_pricing_color_primary) ? $pricing_meta->_cms_pricing_color_primary: '';
            if (!empty($pricing_meta->_cms_background_image_title)) {
                $attachment_image = wp_get_attachment_url($pricing_meta->_cms_background_image_title, 'full');
            }
            ?>
            <div class="cms-pricing-item <?php if($pricing_feature) { echo " pricing-feature";} ?> <?php echo esc_attr($atts['item_class']);?>">
                <div class="cms-pricing-item-inner">
                    <div class="cms-grid-title">
                        <div class="cms-pricing-title" style="background-image: url(<?php echo esc_url($attachment_image);?>);">
                           <h3><?php the_title();?></h3>
                        </div>
                        <div class="cms-pricing-price" style="color:<?php echo esc_attr($pricing_color_primary);?>">
                            <span class="unit"><?php echo esc_html($pricing_currency);?></span>
                            <span class="price"><?php echo esc_html($pricing_price);?></span>
                            <span class="time"><?php echo esc_html($pricing_time);?></span>
                        </div>
                    </div>
                    <div class="cms-grid-content">
                        <div class="cms-pricing-content">
                            <?php the_content();?>
                        </div>
                        <div class="cms-ordernow">
                            <a class="btn btn-primary <?php echo esc_attr($pricing_button_style);?>" href="<?php echo esc_url($pricing_btn_link);?>" style="background:<?php echo esc_attr($pricing_color_primary);?>;border-color:<?php echo esc_attr($pricing_color_primary);?>;color:<?php echo esc_attr($pricing_color_primary);?>; "><?php echo esc_attr(
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