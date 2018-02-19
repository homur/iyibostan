<div class="cms-grid-wraper cms-pricing-layout1 <?php echo esc_attr($atts['template']);?> clearfix" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="cms-pricing-sameheight <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        while($posts->have_posts()){
            $posts->the_post();
            $pricing_meta = wp_organic_post_meta_data();
            $pricing_currency = !empty($pricing_meta->_cms_pricing_currency) ? $pricing_meta->_cms_pricing_currency: '';
            $pricing_price = !empty($pricing_meta->_cms_pricing_price) ? $pricing_meta->_cms_pricing_price: '0';
            $pricing_btn_text = !empty($pricing_meta->_cms_pricing_btn_text) ? $pricing_meta->_cms_pricing_btn_text: '';
            $pricing_btn_link = !empty($pricing_meta->_cms_pricing_btn_link) ? $pricing_meta->_cms_pricing_btn_link: '';
            $pricing_time = !empty($pricing_meta->_cms_pricing_time) ? $pricing_meta->_cms_pricing_time: '';
            $pricing_feature = !empty($pricing_meta->_cms_pricing_feature) ? $pricing_meta->_cms_pricing_feature: '';
            $button = !empty($pricing_meta->_cms_button) ? $pricing_meta->_cms_button: '';
            ?>
            <div class="cms-pricing-item <?php if($pricing_feature) { echo " pricing-feature";} ?> <?php echo esc_attr($atts['item_class']);?>">
                <div class="cms-grid-title">
                    <div class="cms-pricing-title">
                       <h3 class="custom-font-3"><?php the_title();?></h3>
                    </div>
                    <div class="cms-pricing-price custom-font-1">
                        <span class="unit"><?php echo esc_attr($pricing_currency);?></span>
                        <span class="price"><?php echo esc_attr($pricing_price);?></span>
                        <span class="time"><?php echo esc_attr($pricing_time);?></span>
                    </div>
                </div>
                <div class="cms-grid-content">
                    <div class="cms-pricing-content custom-font-8">
                        <?php the_content();?>
                    </div>
                    <div class="cms-ordernow">
                        <a class="btn btn-primary custom-font-7" href="<?php echo esc_url($pricing_btn_link);?>"><?php echo esc_attr(
                        $pricing_btn_text);?></a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>