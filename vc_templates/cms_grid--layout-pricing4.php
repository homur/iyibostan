<div class="cms-grid-wraper cms-pricing-layout4 <?php echo esc_attr($atts['template']);?> clearfix" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="row <?php echo esc_attr($atts['grid_class']);?>">
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
            $pricing_subtitle = !empty($pricing_meta->_cms_pricing_subtitle) ? $pricing_meta->_cms_pricing_subtitle: '';
            $pricing_color_primary = !empty($pricing_meta->_cms_pricing_color_primary) ? $pricing_meta->_cms_pricing_color_primary: '';
            ?>
            <div class="cms-pricing-item <?php if($pricing_feature) { echo " pricing-feature";} ?> <?php echo esc_attr($atts['item_class']);?>">
                <div class="line" style="background:<?php echo esc_attr($pricing_color_primary);?>"></div>
                <div class="cms-grid-title">
                    <div class="cms-pricing-title">
                       <h3 class="" ><?php the_title();?></h3>
                    </div>
                    <div class="cms-pricing-price" style="color:<?php echo esc_attr($pricing_color_primary);?>">
                        <span class="unit"><?php echo esc_attr($pricing_currency);?></span>
                        <span class="price"><?php echo esc_attr($pricing_price);?></span>

                    </div>
                    <?php if ($pricing_subtitle){?>
                         <div class="subtitle"><?php echo esc_html($pricing_subtitle);?></div>
                    <?php }?>
                </div>
                <div class="cms-grid-content">
                    <div class="cms-pricing-content custom-font-8">
                        <?php the_content();?>
                    </div>
                    <div class="cms-ordernow">
                        <a class="" href="<?php echo esc_url($pricing_btn_link);?>" style="color:<?php echo esc_attr($pricing_color_primary);?>"><?php echo esc_attr(
                        $pricing_btn_text);?></a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>