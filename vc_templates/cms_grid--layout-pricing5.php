<div class="cms-grid-wraper cms-pricing-layout5 <?php echo esc_attr($atts['template']);?> clearfix" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="row cms-pricing-sameheight <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        while($posts->have_posts()){
            $posts->the_post();
            $pricing_meta = wp_organic_post_meta_data();
            $pricing_currency = !empty($pricing_meta->_cms_pricing_currency) ? $pricing_meta->_cms_pricing_currency: '';
            $pricing_price = !empty($pricing_meta->_cms_pricing_price) ? $pricing_meta->_cms_pricing_price: '0';
            $pricing_color_primary = !empty($pricing_meta->_cms_pricing_color_primary) ? $pricing_meta->_cms_pricing_color_primary: '';
            ?>
            <div class="cms-pricing-item <?php echo esc_attr($atts['item_class']);?>">
                <div class="cms-pricing-item-inner">
                    <div class="cms-grid-title">
                        <div class="cms-pricing-title">
                            <h3 class="" style="color:<?php echo esc_attr($pricing_color_primary);?>"><?php the_title();?></h3>
                        </div>
                        <div class="cms-pricing-price" style="color:<?php echo esc_attr($pricing_color_primary);?>">
                            <span class="unit custom-font-10"><?php echo esc_attr($pricing_currency);?></span>
                            <span class="price custom-font-10"><?php echo esc_attr($pricing_price);?></span>

                        </div>
                    </div>
                    <div class="cms-grid-content">
                        <div class="cms-pricing-content">
                            <?php the_content();?>
                        </div>

                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>