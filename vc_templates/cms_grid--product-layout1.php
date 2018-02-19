<?php
global $product,$woocommerce;
    /* get categories */
        $taxo = 'product_cat';
        $_category = array();
        if(!isset($atts['cat']) || $atts['cat']==''){
            $terms = get_terms($taxo);
            foreach ($terms as $cat){
                $_category[] = $cat->term_id;
            }
        } else {
            $_category  = explode(',', $atts['cat']);
        }
        $atts['categories'] = $_category;
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $limit = $atts['limit'];
        $paged = (get_query_var('paged') > 1) ? get_query_var('paged') : 1;

        // Add some parameters for the JS.
        $current_id = str_replace('-', '_', $atts['html_id']);

?>
<div class="cms-grid-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if($atts['filter']=="true" and $atts['layout']=='masonry'):?>
        <div class="cms-grid-filter">
            <ul class="cms-filter-category list-unstyled list-inline">
                <li><a class="active" href="#" data-group="all"><span>All products</span></a></li>
                <?php foreach($atts['categories'] as $category):?>
                    <?php $term = get_term( $category, $taxo );?>
                    <li><a href="#" data-group="<?php echo esc_attr('category-'.$term->slug);?>">
                           <span> <?php echo esc_html($term->name);?></span>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>
    <div class="<?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = ($atts['layout']=='basic')?'thumbnail':'wp_organic_product_listing';
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            $product_meta = wp_organic_post_meta_data();
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="grid-item" data-groups='[<?php echo implode(',', $groups);?>]'>
                <div class="cms-grid-product woocommerce ">
                    <?php 
                        if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                            $class = ' has-thumbnail';
                            $thumbnail = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID(),'full'));
                        else:
                            $class = ' no-image';
                            $thumbnail = '' .get_template_directory_uri(). '/assets/images/no-image.jpg';
                        endif;
                    ?>
                       <div class="cms-grid-media <?php echo esc_attr($class) ?>" style="background-image:url(<?php echo esc_url($thumbnail); ?>); ">
                        <div class="overlay"></div>

                           <?php  $sale = get_post_meta( get_the_ID(), '_sale_price', true); ?>
                           <?php if($sale) : ?>
                               <span class="onsale">Sale!</span>
                           <?php endif;?>


                       </div>

                    <div class="cms-grid-descriptions">


                            <h5><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h5>
                        <div class="des-inner">
                            <?php if (isset($product_meta -> _cms_product_sub_title)){?>
                                <div class="cms-grid-subtitle">
                                    <?php echo esc_attr($product_meta -> _cms_product_sub_title); ?>
                                </div>
                            <?php }
                            $product = new WC_Product( get_the_ID() );
                            $price_html = $product->get_price_html();
                            ?>
                            <div class="price_unit">
                                <div class="price">
                                    <span> <?php echo $price_html; ?></span>

                                </div>
                                <div class="per_unit">

                                    <?php
                                    $unit_one = get_post_meta( get_the_ID(), 'unit_one', true);
                                    if($unit_one){
                                        echo esc_html__(' per ','wp-organic').$unit_one;
                                    }
                                    else{
                                        $total_weight = get_option('woocommerce_weight_unit');
                                        echo esc_html__(' per ','wp-organic').$total_weight;
                                    }

                                    ?>


                                </div>
                            </div>
                            <div class="readmore_product">
                                <a href="<?php the_permalink(); ?>"><i class="material-icons">keyboard_arrow_right</i></a>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>