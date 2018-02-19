<?php
global $product,$woocommerce;
/* get categories */
$taxo = 'portfolio-categories';
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
/*ajax media*/
wp_enqueue_style('wp-mediaelement');
wp_enqueue_script('wp-mediaelement');
/* js, css for load more */
wp_register_script('cms-loadmore-js', get_template_directory_uri() . '/assets/js/cms_loadmore_gallery.js', array('jquery'), '1.0', true);
// What page are we on? And what is the pages limit?
global $wp_query;
$max = $wp_query->max_num_pages;
$limit = $atts['limit'];
$paged = (get_query_var('paged') > 1) ? get_query_var('paged') : 1;

// Add some parameters for the JS.
$current_id = str_replace('-', '_', $atts['html_id']);
wp_localize_script(
    'cms-loadmore-js',
    'cms_more_obj' . $current_id,
    array(
        'startPage' => $paged,
        'maxPages' => $max,
        'total' => $wp_query->found_posts,
        'perpage' => $limit,
        'nextLink' => next_posts($max, false),
        'masonry' => $atts['layout']
    )
);
wp_enqueue_script('cms-loadmore-js');
?>
<div class="cms-grid-wraper template-cms_grid--product-great <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if($atts['filter']=="true" and $atts['layout']=='masonry'):?>
        <div class="cms-grid-filter">
            <ul class="cms-filter-category list-unstyled list-inline">
                <li class="all_cat"><a class="active custom-font-3" href="#" data-group="all"><span><?php echo esc_html__('All', 'wp-organic');?></span></a></li>
                <?php foreach($atts['categories'] as $category):?>
                    <?php $term = get_term( $category, $taxo );?>
                    <li>

                        <?php $term_icon = get_term_meta($term->term_id, 'taxonomy-icon', true); ?>
                        <?php $term_icon_image = get_term_meta($term->term_id, 'taxonomy-thumbnail-id', true); ?>
                        <?php $term_icon_image_hover = get_term_meta($term->term_id, 'taxonomy-hover-image-id', true); ?>
                        <?php $term_hover_color = get_term_meta($term->term_id, 'taxonomy-hover-color', true); ?>
                        <a href="#" data-group="<?php echo esc_attr('category-'.$term->slug);?>" class="custom-font-3 <?php if (!( $term_icon) && !($term_icon_image)) { echo 'no_icon_images';}?> ">

                            <?php if($term_icon): ?>
                                <span class="img-cat-block">
                                    <i class="icon1-not-hover <?php echo esc_attr($term_icon); ?>"></i>
                                    <?php if($term_hover_color): ?>
                                        <i class="icon1-hover <?php echo esc_attr($term_icon); ?>" style="color:<?php echo esc_attr($term_hover_color); ?>"></i>
                                </span>
                                <?php endif; ?>

                            <?php elseif ($term_icon_image): ?>
                                <span class="img-cat-block">
                                    <img class="img-cat" src="<?php echo wp_get_attachment_image_url($term_icon_image); ?>" alt="" />
                                    <?php if ($term_icon_image_hover){ ?>
                                    <img class="img-cat-hover" src="<?php echo wp_get_attachment_image_url($term_icon_image_hover); ?>" alt="" />
                                    <?php } ?>
                                </span>
                            <?php endif; ?>
                            <span><?php echo esc_html($term->name);?></span>

                        </a>

                    </li>
                <?php endforeach;?>
               <!-- <span class="line slider" style="background-color:<?php echo esc_attr($term_hover_color); ?>"></span>-->
            </ul>
        </div>
    <?php endif;?>
    <div class="row <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = ($atts['layout']=='basic')?'thumbnail':'';
        while($posts->have_posts()){
            $posts->the_post();

            $groups = array();
            $groups[] = '"all"';
            $portfolio_meta = wp_organic_post_meta_data();
            $item_class='';
            if (!empty($portfolio_meta ->_cms_portfolio_images_size)) {
                if (($portfolio_meta ->_cms_portfolio_images_size)=='2x') {
                    $size = 'wp_organic_portfolio-2width';
                    $item_class="cms-grid-item col-xs-12 col-sm-3 col-md-6";
                }
                else if (($portfolio_meta ->_cms_portfolio_images_size)=='2y') {
                    $size = 'wp_organic_portfolio-2height';
                    $item_class="cms-grid-item col-xs-12 col-sm-3 col-md-3";
                }
                else {
                    $size = 'wp_organic_portfolio-width-height';
                    $item_class="cms-grid-item col-xs-12 col-sm-3 col-md-3";
                }
            }
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>

            <div class="<?php echo esc_attr($item_class);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                <div class="cms-grid-3columns">

                    <?php

                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                        $class = ' has-thumbnail';
                        $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
                        $thumbnail_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID(),'full'));
                    else:
                        $class = ' no-image';
                        $thumbnail = '<img src="'.esc_url(CMS_IMAGES).'no-image.jpg" alt="'.get_the_title().'" />';
                        $thumbnail_url = '' .get_template_directory_uri(). '/assets/images/no-image.jpg';
                    endif;

                    echo '<div class="cms-gallery-item">
                            <a class="cms-prettyphoto p-view" href="' . esc_url($thumbnail_url) . '"><i class="material-icons">zoom_in</i></a>';
                            echo '<div class="cms-grid-media '.esc_attr($class).'">'.$thumbnail.'</div></div>';


                    ?>

                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="cms_pagination"></div>
</div>