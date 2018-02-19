<?php
/**
 * shortcut icon
 */
function wp_organic_site_icon(){
    global $smof_data;
    $icon = get_template_directory_uri() . '/favicon.ico';

    if(!empty($smof_data['general_site_icon']['url']))
        $icon = $smof_data['general_site_icon']['url'];
    if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() )
        echo '<link rel="icon" type="image/png" href="'.esc_url($icon).'"/>';
}
add_action('wp_head', 'wp_organic_site_icon');
/**
 * Page title template
 * @since 1.0.0
 * @author Fox
 */
function wp_organic_page_title(){
    global $smof_data, $wp_organic_meta, $wp_organic_base;

    if(is_page() && isset($wp_organic_meta->_cms_custom_breadcrumb) && $wp_organic_meta->_cms_custom_breadcrumb){
        if(isset($wp_organic_meta->_cms_enable_breadcrumb)){
            $smof_data['enable_breadcrumb'] = $wp_organic_meta->_cms_enable_breadcrumb;
        }
    }
    if(is_page() && isset($wp_organic_meta->_cms_page_title) && $wp_organic_meta->_cms_page_title){
        if(isset($wp_organic_meta->_cms_page_title_type)){
            $smof_data['page_title_layout'] = $wp_organic_meta->_cms_page_title_type;
        }
    }
    if(is_page() && isset($wp_organic_meta->_cms_page_title) && $wp_organic_meta->_cms_page_title){
        if (is_page() && isset($wp_organic_meta->_cms_bg_image_page_title) && $wp_organic_meta->_cms_bg_image_page_title) {
            $smof_data['bg_image_page_title']['url'] = wp_get_attachment_url($wp_organic_meta->_cms_bg_image_page_title);
        }
    }

    if (is_single() && isset($smof_data['bg_image_page_title_post']['url'])) {
        $smof_data['bg_image_page_title']['url'] = $smof_data['bg_image_page_title_post']['url'];
    }
    if(class_exists('Woocommerce')){
        if (is_woocommerce() && isset($smof_data['bg_image_page_title_shop']['url'])) {
            $smof_data['bg_image_page_title']['url'] = $smof_data['bg_image_page_title_shop']['url'];
        }
    }

    /* Page Title Page */

        if ($smof_data['enable_breadcrumb'] && is_page()) { ?>
            <div id="breadcrumb-text">
                <div class="container">
                    <div
                        class=" row col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php $wp_organic_base->wp_organic_get_breadcrumb(); ?></div>
                </div>
            </div>

        <?php } ?>
        <?php if ($smof_data['page_title_layout'] && !is_single()) { ?>
            <div id="page-title" class="page-title br-style<?php echo '' . $smof_data['page_title_layout']; ?>"
                 style="background-image: url(<?php echo esc_url($smof_data['bg_image_page_title']['url']); ?>);">
                <div class="container">
                    <div class="row">
                        <?php switch ($smof_data['page_title_layout']) {
                            case '1':
                                ?>
                                <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                    <h1 class=""><?php $wp_organic_base->wp_organic_get_page_title(); ?></h1>
                                <span class="sub-title">
                                    <?php
                                    wp_organic_page_sub_title();
                                    ?>
                                </span>

                                </div>
                                <?php
                                break;
                            case '2':
                                ?>
                                <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
                                    <h1><?php $wp_organic_base->wp_organic_get_page_title(); ?></h1>
                                <span class="sub-title">
                                    <?php
                                    wp_organic_page_sub_title();
                                    ?>
                                </span>

                                </div>
                                <?php
                                break;
                            case '3':
                                ?>
                                <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                    <h1 class="custom-font-3"><?php $wp_organic_base->wp_organic_get_page_title(); ?></h1>
                                <span class="sub-title">
                                    <?php
                                    wp_organic_page_sub_title();
                                    ?>
                                </span>

                                </div>
                                <?php
                                break;
                        } ?>
                    </div>
                </div>
            </div><!-- #page-title -->
            <?php
        }
        if ($smof_data['page_title_layout'] && is_singular('product')) { ?>
        <div id="page-title" class="page-title br-style<?php echo '' . $smof_data['page_title_layout']; ?>"
             style="background-image: url(<?php echo esc_url($smof_data['bg_image_page_title']['url']); ?>);">
            <div class="container">
                <div class="row">
                    <?php switch ($smof_data['page_title_layout']) {
                        case '1':
                            ?>
                            <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                <h1><?php $wp_organic_base->wp_organic_get_page_title(); ?></h1>
                                <span class="sub-title">
                                    <?php
                                    wp_organic_page_sub_title();
                                    ?>
                                </span>

                            </div>
                            <?php
                            break;
                        case '2':
                            ?>
                            <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
                                <h1><?php $wp_organic_base->wp_organic_get_page_title(); ?></h1>
                                <span class="sub-title">
                                    <?php
                                    wp_organic_page_sub_title();
                                    ?>
                                </span>

                            </div>
                            <?php
                            break;
                        case '3':
                            ?>
                            <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                <h1><?php $wp_organic_base->wp_organic_get_page_title(); ?></h1>
                                <span class="sub-title">
                                    <?php
                                    wp_organic_page_sub_title();
                                    ?>
                                </span>

                            </div>
                            <?php
                            break;
                    } ?>
                </div>
            </div>
        </div><!-- #page-title -->
        <?php
    }
    /* Page Title Recipe */
    if(is_singular('recipe')){
        $backgroud_images='';
        if ($smof_data['bg_image_page_title_recipe']) {
            $backgroud_images = $smof_data['bg_image_page_title_recipe']['url'];
        }
        ?>
        <div id="recipe-title" class=" <?php echo ''.esc_attr($smof_data['page_title_layout']); ?>" style="background-image: url(<?php echo esc_url($backgroud_images);?>);">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        <div class="recipe-title-text">
                            <h2><?php $wp_organic_base->wp_organic_get_page_title(); ?></h2>
                           <?php  if(isset($wp_organic_meta->_cms_recipe_subtitle) && $wp_organic_meta->_cms_recipe_subtitle){?>
                            <h5> <?php echo esc_attr($wp_organic_meta->_cms_recipe_subtitle);?> </h5>
                            <?php } ?>
                            <?php if(!empty($smof_data['recipe_page'])): ?>
                                <a href="<?php echo get_the_permalink($smof_data['recipe_page']);?>"><span><i class="material-icons">keyboard_arrow_left</i><?php esc_html_e('Recipes','wp-organic');?></span></a>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- #page-title -->
        <?php
    }
    /* Page Title Post */
    if(is_singular('post')){
       if ($smof_data['enable_breadcrumb']){?>
        <div id="breadcrumb-text">
            <div class="container">
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php $wp_organic_base-> wp_organic_get_breadcrumb(); ?></div>
                 </div>
            </div>
        </div>
       <?php }
        $backgroud_images='';
        if ($smof_data['images_post_title']) {
            $backgroud_images = $smof_data['bg_image_page_title']['url'];
        }
        else{
            if(has_post_thumbnail()){
                $backgroud_images = wp_get_attachment_url( get_post_thumbnail_id(),'' );
            }
            else{
                $backgroud_images = get_template_directory_uri(). '/assets/images/no-image.jpg';
            }
        }

        ?>
        <div id="post-title" style="background-image: url(<?php echo esc_url($backgroud_images);?>);">
            <div class="container">
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        <div class="post-title-text">
                            <h2><?php $wp_organic_base->wp_organic_get_page_title(); ?></h2>
                            <span class="social-post">
                                <?php
                                    wp_organic_get_socials_share();
                                ?>
                            </span>

                        </div>

                     </div>
                 </div>
            </div>
        </div><!-- #page-title -->
        <?php
    }
    /* Page Title Post */
    if(is_singular() && $smof_data['enable_breadcrumb'] && !is_singular('post') && !is_singular('recipe') && !is_page()){
        ?>
        <div id="breadcrumb-text">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php $wp_organic_base-> wp_organic_get_breadcrumb(); ?></div>
                </div>
            </div>
        </div>
        <?php
    }
}
function wp_organic_breadcrumbs(){
    global $smof_data, $wp_organic_meta, $wp_organic_base;
    if(isset($wp_organic_meta->_cms_enable_breadcrumb)){
        $smof_data['enable_breadcrumb'] = $wp_organic_meta->_cms_enable_breadcrumb;
    }
    if ($smof_data['enable_breadcrumb']){
        ?>

        <div id="breadcrumb-text">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php $wp_organic_base-> wp_organic_get_breadcrumb(); ?></div>
                </div>
            </div>
        </div>
        <?php }
}
/**
 * Get sub page title.
 *
 * @author Fox
 */
function wp_organic_page_sub_title() {
    global $wp_organic_meta, $post, $smof_data;
    if (is_page() && isset($wp_organic_meta->_cms_page_title) && ($wp_organic_meta->_cms_page_title)) {
        if(!empty($wp_organic_meta->_cms_page_title_sub)) {
            echo '' . esc_attr($wp_organic_meta->_cms_page_title_sub) . '';
        }
    }
    if (!empty($post->ID) && get_post_meta($post->ID, 'post_subtitle', true)){
        echo ''.esc_attr(get_post_meta($post->ID, 'post_subtitle', true)).'';
    } elseif (!empty(wp_organic_post_meta_data()->_cms_attorneys_sub_title)) {
        echo ''.esc_attr(wp_organic_post_meta_data()->_cms_attorneys_sub_title).'';
    } elseif (!empty(wp_organic_post_meta_data()->_cms_practice_sub_title)) {
        echo ''.esc_attr(wp_organic_post_meta_data()->_cms_practice_sub_title).'';
    }
    if(class_exists('Woocommerce')){
        if (is_woocommerce() && !empty($smof_data['subtitle_page_shop'])) {
            echo ''.esc_attr($smof_data['subtitle_page_shop']).'';
        }

    }
}

/**
 * Get Header Layout.
 * 
 * @author Fox
 */
function wp_organic_header(){
    global $smof_data, $wp_organic_meta;
    /* header for page */
    if(isset($wp_organic_meta->_cms_header) && $wp_organic_meta->_cms_header){
        if(isset($wp_organic_meta->_cms_header_layout)){
            $smof_data['header_layout'] = $wp_organic_meta->_cms_header_layout;
        }
    }
    /* load template. */
    get_template_part('inc/header/header', $smof_data['header_layout']);
}
/**
* Get Header Layout.
 *
 * @author Fox
*/
function wp_organic_footer(){
    global $smof_data, $wp_organic_meta;
    /* header for page */
    if(isset($wp_organic_meta->_cms_footer) && $wp_organic_meta->_cms_footer){
        if(isset($wp_organic_meta->_cms_footer_layout)){
            $smof_data['footer_layout'] = $wp_organic_meta->_cms_footer_layout;
        }
    }
    /* load template. */
    get_template_part('inc/footer/footer', $smof_data['footer_layout']);
}

/**
 * Get menu location ID.
 * 
 * @param string $option
 * @return NULL
 */
function wp_organic_menu_location($option = '_cms_primary'){
    global $wp_organic_meta;
    /* get menu id from page setting */
    return (isset($wp_organic_meta->$option) && $wp_organic_meta->$option) ? $wp_organic_meta->$option : null ;
}


/**
 * Add main class
 * 
 * @author Fox
 * @since 1.0.0
 */
function wp_organic_main_class(){
    global $wp_organic_meta;
    
    $main_class = '';
    /* chect content full width */
    if(isset($wp_organic_meta->_cms_full_width) && $wp_organic_meta->_cms_full_width){
        /* full width */
        $main_class = "no-container";
    } else {
        /* boxed */
        $main_class = "container";
    }
    
    echo apply_filters('wp_organic_main_class', $main_class);
}

/**
 * Archive detail
 * 
 * @author Fox
 * @since 1.0.0
 */
function wp_organic_archive_detail_top(){
    ?>
    <ul>
        <li class="detail-date">
            <a href="<?php echo get_day_link(get_the_time('Y'),get_the_time('m'),get_the_time('d'));?>">
                <span><?php echo get_the_date("F"); ?></span>
                <span class="ft-lo"><?php echo get_the_date("d"); ?></span>
            </a>
        </li>
    </ul>
    <?php
}
function wp_organic_archive_detail_bottom(){
    ?>
    <ul>
        <li class="detail-author"><?php esc_html_e('Posted By: ', 'wp-organic'); ?> <?php the_author_posts_link(); ?></li>
        <?php if(has_category()): ?>
        <li class="detail-terms"><?php the_terms( get_the_ID(), 'category', ''.esc_html__('Posted In: ', 'wp-organic'), ' , ' ); ?></li>
        <?php endif; ?>
        <li class="detail-tags"><?php the_tags( 'Tags: ', ', ' ); ?></li>
        <li class="detail-date">
            <?php esc_html_e('Date: ', 'wp-organic'); ?>
            <a href="<?php echo get_day_link(get_the_time('Y'),get_the_time('m'),get_the_time('d'));?>">
                <span><?php echo get_the_date(); ?></span>
            </a>
        </li>
        <li class="post-details-right right">
            <ul>
                <li class="comment"><a href="<?php the_permalink(); ?>"><i class="fa fa-comments"></i> <?php echo comments_number('0','1','%'); ?></a></li>
                <li class="counter-view"><i class="fa fa-eye"></i>
                    <?php if(function_exists('wp_organic_post_views')) { 
                        echo wp_organic_post_views(get_the_ID()); 
                    }?>
                </li>
            </ul>
        </li>
    </ul>
    <?php
}

/**
 * Archive readmore
 * 
 * @author Fox
 * @since 1.0.0
 */
function wp_organic_archive_readmore(){
    echo '<a class="btn-readmore" href="'.get_the_permalink().'" title="'.get_the_title().'" >'.esc_html__('Read more', 'wp-organic').'</a>';
}

/**
 * Media Audio.
 * 
 * @param string $before
 * @param string $after
 */
function wp_organic_archive_audio() {
    global $wp_organic_base;
    /* get shortcode audio. */
    $shortcode = $wp_organic_base->wp_organic_get_shortcode_from_content('audio', get_the_content());
    
    if($shortcode != ''){
        echo do_shortcode($shortcode);
        
        return true;
        
    } else {
        if(has_post_thumbnail()){
            the_post_thumbnail();
        }
        
        return false;
    }
    
}

/**
 * Media Video.
 *
 * @param string $before
 * @param string $after
 */
function wp_organic_archive_video() {
    
    global $wp_embed, $wp_organic_base;
    /* Get Local Video */
    $local_video = $wp_organic_base->wp_organic_get_shortcode_from_content('video', get_the_content());
    
    /* Get Youtobe or Vimeo */
    $remote_video = $wp_organic_base->wp_organic_get_shortcode_from_content('embed', get_the_content());
    
    if($local_video){
        /* view local. */
        echo do_shortcode($local_video);
        
        return true;
        
    } elseif ($remote_video) {
        /* view youtobe or vimeo. */
        echo ''.$wp_embed->run_shortcode($remote_video);
        
        return true;
        
    } elseif (has_post_thumbnail()) {
        /* view thumbnail. */
        the_post_thumbnail();
    } else {
        return false;
    }
    
}

/**
 * Gallerry Images
 * 
 * @author Fox
 * @since 1.0.0
 */
function wp_organic_archive_gallery(){
    global $wp_organic_base;
    /* get shortcode gallery. */
    $shortcode = $wp_organic_base->wp_organic_get_shortcode_from_content('gallery', get_the_content());
    
    if($shortcode != ''){
        preg_match('/\[gallery.*ids=.(.*).\]/', $shortcode, $ids);
        
        if(!empty($ids)){
        
            $array_id = explode(",", $ids[1]);
            ?>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <?php $i = 0; ?>
                <?php foreach ($array_id as $image_id): ?>
                    <?php
                    $attachment_image = wp_get_attachment_image_src($image_id, 'full', false);
                    if($attachment_image[0] != ''):?>
                        <div class="item <?php if( $i == 0 ){ echo 'active'; } ?>">
                            <img style="width:100%;" data-src="holder.js" src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
                        </div>
                    <?php $i++; endif; ?>
                <?php endforeach; ?>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                </a>
            </div>
            <?php
            
            return true;
        
        } else {
            return false;
        }
    } else {
        if(has_post_thumbnail()){
            the_post_thumbnail();
        }
    }
}

/**
 * Quote Text.
 * 
 * @author Fox
 * @since 1.0.0
 */
function wp_organic_archive_quote() {
    /* get text. */
    preg_match('/\<blockquote\>(.*)\<\/blockquote\>/', get_the_content(), $blockquote);
    
    if(!empty($blockquote[0])){
        echo ''.$blockquote[0].'';
        return true;
    } else {
        if(has_post_thumbnail()){
            the_post_thumbnail();
        }
        return false;
    }
}

/**
 * List socials share for post.
 * 
 * @since 1.0.0
 */
function wp_organic_get_socials_share(){
    ?>
    <ul>
    <li><span><?php esc_html_e('Share ', 'wp-organic'); ?></span></li>
    <li><a title="Facebook" data-placement="top" data-rel="tooltip" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><i class="fa fa-facebook"></i></a></li>
    <li><a title="Twitter" data-placement="top" data-rel="tooltip" target="_blank" href="https://twitter.com/home?status=<?php esc_html_e('Check out this article', 'wp-organic');?>:%20<?php the_title();?>%20-%20<?php the_permalink();?>"><i class="fa fa-twitter"></i></a></li>
    <li><a title="Google Plus" data-placement="top" data-rel="tooltip" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink();?>"><i class="fa fa-google-plus"></i></a></li>
    <li class="social-pinterest"><a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink();?>"><i class="fa fa-pinterest"></i></a></li>
    </ul>
    <?php
}

/* 
/**
 * Related Gallery
 * 
 * @since 1.0.0
 */
function wp_organic_related_gallery() {
    global $post;

    $posttags = get_the_terms($post->ID, 'galeries-category');

    if(empty($posttags)) return ;

    $tags = array();

    foreach ($posttags as $tag) {

        $tags[] = $tag->term_id;
    }

    $query = new WP_Query(array('posts_per_page'=> 10, 'post_type' => 'galeries', 'post_status'=> 'publish', 'tax_query'=>array(array('taxonomy'=>'galeries-category', 'field'=>'id', 'terms'=>$tags))));

    if($query->have_posts()){
        ?> <div class="layout-gallery gallery-full cms-related-gallery clearfix"> <?php
        while ($query->have_posts()): $query->the_post();
        ?>
        <article>
            <div class="cms-grid-item">
                <div class="cms-grid-item-inner cms-gallery-item">
                    <div class="cms-gallery-image">
                        <?php 
                            if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                                $class = ' has-thumbnail';
                                $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                                $thumbnail = get_the_post_thumbnail(get_the_ID(),'full');
                            else:
                                $class = ' no-image';
                                $thumbnail_url[0] = CMS_IMAGES.'no-image.jpg';
                                $thumbnail = '<img src="'.esc_url(CMS_IMAGES).'no-image.jpg" alt="'.get_the_title().'" />';
                            endif;
                            echo '<div class="cms-grid-media  has-thumbnail">'.$thumbnail.'</div>';
                        ?>
                        <div class="cms-gallery-image-links">
                            <a href="<?php echo esc_url($thumbnail_url[0]); ?>" class="cms-prettyphoto p-view"><i class="rt-icon-zoom-outline"></i></a>
                            <a class="p-link" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><i class="rt-icon-location-outline"></i></a>
                        </div>
                    </div>
                    <div class="cms-gallery-description-layout2">
                        <h3><a href="<?php the_permalink() ?>" ><?php the_title();?> </a></h3>
                    </div>
                </div>
            </div>
        </article>
        <?php
        endwhile;
        ?> </div> <?php
    }
    
    wp_reset_postdata();
}

/* Related Post */
function wp_organic_related_post() {
    global $post;

    $posttags = get_the_category($post->ID);
    
    if(empty($posttags)) return ;
    
    $tags = array();
    
    foreach ($posttags as $tag) {
        
        $tags[] = $tag->term_id;
    }
    
    $query = new WP_Query(array('posts_per_page'=> 3, 'post_type' => 'post', 'post_status'=> 'publish', 'category__in'=>$tags));
    
    if($query->have_posts()){
        ?> 
        <div class="cms-related-post clearfix"> 
            <h3 class="cms-title"><?php esc_html_e('Related Posts','wp-organic'); ?></h3>
           <div class="cms-related-post-inner row">
        <?php
        while ($query->have_posts()): $query->the_post();
        ?>
            <div class="item <?php echo has_post_thumbnail() ? ' has-feature-img' : ' no-feature-img' ; ?> col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="item-inner">
                    <?php the_post_thumbnail('wp_organic_images-sm'); ?>
                    <div class="blog-date"><?php wp_organic_archive_detail_top(); ?></div>
                    <h5 class="title"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <div class="tr-overlay"></div>
                </div>
            </div>
        <?php
        endwhile;
        ?> </div></div> <?php
    }
    
    wp_reset_postdata();
}
/**
 * Excerpt content.
 * 
 * @param (int) string limited.
 * @return echo.
 */
if(!function_exists('wp_organic_the_excerpt')){
    function wp_organic_the_excerpt($limit = 50 , $before = '', $after = ''){
        
        $_wp_content = strip_tags(strip_shortcodes(get_the_content()));
        
        echo (strlen($_wp_content) <= $limit ) ? $_wp_content :  $before . substr($_wp_content, 0, (int)$limit) . $after;
    }
}
/*cut word in string*/
function wp_organic_text_limit($str,$limit=10)
{

    if(stripos($str," ")){
        $ex_str = explode(" ",$str);
        if(count($ex_str)>$limit){
            $str_s='';
            for($i=0;$i<$limit;$i++){
                $str_s.=$ex_str[$i]." ";
            }
            return $str_s;
        }else{
            return $str;
        }
    }else{
        return $str;
    }
}
/*move varible gloabal in function*/
function wp_organic_blog_listing(){

    global $wp_query,$paged;
                 $wp_query = new WP_Query('post_type=post'.'&showposts='.get_option('posts_per_page').'&paged='.$paged);
                if ( have_posts() ) : ?>
        <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
            /* Include the post format-specific template for the content. If you want to
             * this in a child theme then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            get_template_part( 'single-templates/blog-list/content', get_post_format() );
        endwhile; // end of the loop.



    else :

        get_template_part( 'single-templates/blog-list', 'none' );
    endif;
}
function wp_organic_blog_listing_latest(){

    global $wp_query,$paged;

    $wp_query = new WP_Query(array(
        'posts_per_page'=> get_option('posts_per_page'),
        'post_type' => 'post',
        'post_status'=> 'publish',
    ));

    if ( have_posts() ) : ?>
        <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
            /* Include the post format-specific template for the content. If you want to
             * this in a child theme then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            get_template_part( 'single-templates/blog-list2/content', get_post_format() );
        endwhile; // end of the loop.



    else :

        get_template_part( 'single-templates/blog-list2', 'none' );
    endif;
}
function wp_organic_blog_listing_popular(){

    global $wp_query,$paged;
    $wp_query = new WP_Query(array(
        'posts_per_page'=> get_option('posts_per_page'),
        'post_type' => 'post',
        'post_status'=> 'publish',
        'meta_key' => 'post_views_count',
        'orderby' => 'meta_value_num'
    ));

    if ( have_posts() ) : ?>
        <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
            /* Include the post format-specific template for the content. If you want to
             * this in a child theme then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            get_template_part( 'single-templates/blog-list2/content', get_post_format() );
        endwhile; // end of the loop.



    else :

        get_template_part( 'single-templates/blog-list2', 'none' );
    endif;
}
function wp_organic_blog_listing2(){
    ?>
    <div class="blog-tabs">
        <ul class="nav nav-tabs" role="tablist">

            <li role="presentation" class="active related-tab">
                <a class="custom-font-2" href="#tab-related" aria-controls="related" role="tab" data-toggle="tab"><?php esc_html_e('Latest', 'wp-organic'); ?></a>
            </li>
            <li class="related_tab">
                <a class="custom-font-2" href="#tab-recipies" aria-controls="profile" role="tab" data-toggle="tab"><?php esc_html_e('Popular', 'wp-organic'); ?></a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="tab-related">
                <?php wp_organic_blog_listing_latest(); ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="tab-recipies">
                <?php wp_organic_blog_listing_popular(); ?>
            </div>

        </div>

    </div>
    <?php
}
function wp_organic_blog_masonry_latest(){

    global $wp_query,$paged;

    $wp_query = new WP_Query(array(
        'posts_per_page'=> get_option('posts_per_page'),
        'post_type' => 'post',
        'post_status'=> 'publish',
    ));

    if ( have_posts() ) : ?>
        <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
            /* Include the post format-specific template for the content. If you want to
             * this in a child theme then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
        ?>
         <div class="item-masonry col-md-4 col-lg-4 col-xs-12 col-sm-6">
             <?php  get_template_part( 'single-templates/blog-masonry/content', get_post_format() );?>
         </div>
            <?php
        endwhile; // end of the loop.



    else :
        ?>
        <div class="col-md-12">
            <?php get_template_part( 'single-templates/blog-masonry', 'none' );?>
        </div>
        <?php

    endif;
}

function wp_organic_blog_masonry_popular(){

    global $wp_query,$paged;
    $wp_query = new WP_Query(array(
        'posts_per_page'=> get_option('posts_per_page'),
        'post_type' => 'post',
        'post_status'=> 'publish',
        'meta_key' => 'post_views_count',
        'orderby' => 'meta_value_num'
    ));

    if ( have_posts() ) : ?>
        <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
            /* Include the post format-specific template for the content. If you want to
             * this in a child theme then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            ?>
            <div class="item-masonry popular col-md-4 col-lg-4 col-xs-12 col-sm-6">
                <?php  get_template_part( 'single-templates/blog-masonry/content', get_post_format() );?>
            </div>
            <?php
        endwhile; // end of the loop.




    else :

        ?>
        <div class="col-md-12">
            <?php get_template_part( 'single-templates/blog-masonry', 'none' );?>
        </div>
        <?php
    endif;
}
function wp_organic_blog_masonry(){
    if(isset($_REQUEST['mode'])){
        $mode = $_REQUEST['mode'];
    } else {
        $mode = 'latest';
    }
    switch ($mode) {
        case 'popular':
            $class_latest = '';
            $class_popular = 'active';
            break;

        default:
            $class_latest = 'active';
            $class_popular = '';
            break;
    }

    $this_page_id = get_query_var('page_id');
    ?>
    <div class="blog-tabs">
        <ul class="blog-masonry-tabs">
        <?php
              ?>
          <li class="<?php echo esc_attr($class_latest); ?> latest"> <a  class="custom-font-2" href="?page_id=<?php echo esc_attr($this_page_id);?>&mode=latest"><span><?php esc_html_e('Latest', 'wp-organic'); ?></span></a></li>
            <li class="<?php echo esc_attr($class_popular); ?> popular"> <a  class="custom-font-2" href="?page_id=<?php echo esc_attr($this_page_id);?>&mode=popular"><span><?php esc_html_e('Popular', 'wp-organic'); ?></span></a></li>
	    </ul>
        <!-- Tab panes -->
        <div class="blog-masonry-content">
            <?php
            switch ($mode) {
                case 'popular':?>
                    <div class="row masonry masonry-popular">
                        <?php wp_organic_blog_masonry_popular(); ?>
                    </div>
                 <?php   break;

                default:?>
                    <div class="row masonry masonry-latest">
                        <?php wp_organic_blog_masonry_latest();?>
                    </div>
                   <?php break;
            }
            ?>
        </div>

    </div>
    <?php
}
function wp_organic_blog_block_latest(){

    global $wp_query,$paged;

    $wp_query = new WP_Query(array(
        'posts_per_page'=> get_option('posts_per_page'),
        'post_type' => 'post',
        'post_status'=> 'publish',
        'paged'=> $paged,
    ));?>
    <div id="content" role="main">
        <?php if ( have_posts() ) : ?>
            <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
                /* Include the post format-specific template for the content. If you want to
                 * this in a child theme then include a file called called content-___.php
                 * (where ___ is the post format) and that will be used instead.
                 */
                get_template_part( 'single-templates/blog-block/content', get_post_format() );
            endwhile; // end of the loop.



        else :

            get_template_part( 'single-templates/blog-block', 'none' );
        endif;
        ?>
    </div>
    <?php
    wp_organic_paging_nav(); wp_reset_query();
}
function wp_organic_blog_block_popular(){

    global $wp_query,$paged;
    $wp_query = new WP_Query(array(
        'posts_per_page'=> get_option('posts_per_page'),
        'post_type' => 'post',
        'post_status'=> 'publish',
        'meta_key' => 'post_views_count',
        'orderby' => 'meta_value_num',
         'paged'=> $paged,
    ));?>

    <div id="content" role="main">
        <?php if ( have_posts() ) : ?>
            <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
                /* Include the post format-specific template for the content. If you want to
                 * this in a child theme then include a file called called content-___.php
                 * (where ___ is the post format) and that will be used instead.
                 */
                get_template_part( 'single-templates/blog-block/content', get_post_format() );
            endwhile; // end of the loop.



        else :

            get_template_part( 'single-templates/blog-block', 'none' );
        endif;
        ?>
    </div>
    <?php
    wp_organic_paging_nav(); wp_reset_query();
}
function wp_organic_blog_block(){
    ?>
    <div class="blog-tabs">
        <ul class="nav nav-tabs" role="tablist">

            <li role="presentation" class="active related-tab">
                <a class="custom-font-2" href="#tab-related" aria-controls="related" role="tab" data-toggle="tab"><?php esc_html_e('Latest', 'wp-organic'); ?></a>
            </li>
            <li class="related_tab">
                <a class="custom-font-2" href="#tab-recipies" aria-controls="profile" role="tab" data-toggle="tab"><?php esc_html_e('Popular', 'wp-organic'); ?></a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="tab-related">
                <?php wp_organic_blog_block_latest(); ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="tab-recipies">
                <?php wp_organic_blog_block_popular(); ?>
            </div>

        </div>

    </div>
    <?php
}
/* WOO Config Products Per Page */
$cms_products_perpage = array(
    '8' => esc_html__('Show 8 Products', 'wp-organic'),
    '12' => esc_html__('Show 12 Products', 'wp-organic'),
    '16' => esc_html__('Show 16 Products', 'wp-organic'),
    '20' => esc_html__('Show 20 Products', 'wp-organic')
);

function wp_organic_show_sidebar(){
    global $wp_organic_meta;

 if (isset($wp_organic_meta->_cms_show_sidebar) && $wp_organic_meta->_cms_show_sidebar == '1') return true;

}
function wp_organic_sidebar_left_active(){
    global $wp_organic_meta;

    if (isset($wp_organic_meta->_cms_show_sidebar_page_left) && $wp_organic_meta->_cms_show_sidebar_page_left) return true;

}

function wp_organic_footer_top(){
    global $smof_data;
    if ($smof_data['enable_footer_top']) return true;

}
function wp_organic_logo_footer(){
    global $smof_data,$wp_organic_meta;
    if(is_page() && isset($wp_organic_meta->_cms_custom_logo_footer) && $wp_organic_meta->_cms_custom_logo_footer) {
        if (is_page() && isset($wp_organic_meta->_cms_logo_footer)) {
            $smof_data['logo_footer']['url'] = wp_get_attachment_url($wp_organic_meta->_cms_logo_footer);
        }
    }
   ?>
    <img alt="" src="<?php echo esc_url($smof_data['logo_footer']['url']); ?>">
<?php
}
function wp_organic_post_full_width(){
    global $smof_data, $wp_organic_meta;

    if(isset($wp_organic_meta->_cms_enable_post_sidebar) && $wp_organic_meta->_cms_enable_post_sidebar) {
        if (isset($wp_organic_meta->_cms_post_full_width) && $wp_organic_meta->_cms_post_full_width != '') {
            $smof_data['post_full_width'] = $wp_organic_meta->_cms_post_full_width;
        }
    }
    if ($smof_data['post_full_width']==1) return true;
}
function wp_organic_post_sidebarleft(){
    global $smof_data, $wp_organic_meta;
    if(isset($wp_organic_meta->_cms_enable_post_sidebar) && $wp_organic_meta->_cms_enable_post_sidebar) {
        if (isset($wp_organic_meta->_cms_post_sidebar_left) && $wp_organic_meta->_cms_post_sidebar_left != '') {
            $smof_data['post_sidebar_left'] = $wp_organic_meta->_cms_post_sidebar_left;
        }
    }
    if ($smof_data['post_sidebar_left']==1) return true;

}
function wp_organic_has_post(){
    global $post;
 $temp_post = $post;


}
function wp_organic_show_logo(){
    global $smof_data, $wp_organic_meta;
    if(is_page() && isset($wp_organic_meta->_cms_custom_logo) && $wp_organic_meta->_cms_custom_logo) {
        if (is_page() && isset($wp_organic_meta->_cms_header_logo_page) && $wp_organic_meta->_cms_header_logo_page) {
            $smof_data['main_logo']['url'] = wp_get_attachment_url($wp_organic_meta->_cms_header_logo_page);
        }
    }
    echo esc_attr($smof_data['main_logo']['url']);
}

function wp_organic_trans_logo(){
    global $smof_data, $wp_organic_meta;
    if(is_page() && isset($wp_organic_meta->_cms_custom_logo) && $wp_organic_meta->_cms_custom_logo) {
        if (is_page() && isset($wp_organic_meta->_cms_header_logo_page) && $wp_organic_meta->_cms_header_logo_page) {
            $smof_data['trans_logo']['url'] = wp_get_attachment_url($wp_organic_meta->_cms_header_logo_page);
        }
    }
    echo esc_attr($smof_data['trans_logo']['url']);
}

function wp_organic_sticky_menu(){
    global $smof_data, $wp_organic_meta;
    if (!$smof_data['menu_sticky']) echo 'no-sticky';
}
function wp_organic_body_class(){
    global $smof_data, $wp_organic_meta;
    $body_class = array();
    if( isset($wp_organic_meta->_cms_body_class)) {
        $body_class[] = $wp_organic_meta->_cms_body_class;
    }

    if(isset($wp_organic_meta->_cms_slider_custom) && (($wp_organic_meta->_cms_slider_custom) !='')) {
        if (isset($wp_organic_meta->_cms_get_revslide)) {
            $body_class[] = $wp_organic_meta->_cms_get_revslide;
        }
    }
    echo implode(' ', $body_class);
}
function wp_organic_background_signin(){
    global $smof_data;
    if (isset($smof_data['bg_signin']['url'])) {
        echo esc_url($smof_data['bg_signin']['url']);
    }

}
function wp_organic_background_signup(){
    global $smof_data;
    if (isset($smof_data['bg_signup']['url'])) {
        echo esc_url($smof_data['bg_signup']['url']);
    }

}
function wp_organic_logo_signup(){
    global $smof_data;
    if (isset($smof_data['singup_logo']['url'])) {
        echo esc_url($smof_data['singup_logo']['url']);
    }

}

function  wp_organic_recipe_content(){

    global $wp_query,$paged;

    if(isset($_REQUEST['mode'])){
        $mode = $_REQUEST['mode'];
    } else {
        $mode = 'grid';
    }

    $_query = array(
        'posts_per_page'=> '12',
        'post_type' => 'recipe',
        'post_status'=> 'publish',
        'paged'=>$paged,
    );

    $_query['meta_query'] = $_query['tax_query'] = $_query['orderby'] = array();

    /* search */
    if(!empty($_REQUEST['recipe_s'])){
        $_query['s'] = $_REQUEST['recipe_s'];
    }

    /* filter nationality */
    if(!empty($_REQUEST['nationality'])){
        $_query['tax_query'][] = array(
            'taxonomy' => 'nationality',
            'field'    => 'term_id',
            'terms'    => $_REQUEST['nationality'],
        );
    }

    /* filter ingredients */
    if(!empty($_REQUEST['recipe-ingredients'])){
        $_query['tax_query'][] = array(
            'taxonomy' => 'recipe-ingredients',
            'field'    => 'term_id',
            'terms'    => $_REQUEST['recipe-ingredients'],
        );
    }

    /*  filter time*/
    if(!empty($_REQUEST['recipe-min-time']) && !empty($_REQUEST['recipe-max-time'])){
        $_query['meta_query'][] = array(
            'key'     => '_cms_recipe_time',
            'value'   => $_REQUEST['recipe-min-time'],
            'type'    => 'TIME',
            'compare' => '>='
        );

        $_query['meta_query'][] = array(
            'key'     => '_cms_recipe_time',
            'value'   => $_REQUEST['recipe-max-time'],
            'type'    => 'TIME',
            'compare' => '<='
        );
    }

    /* order */
    if(!empty($_REQUEST['rf-order-by']) && !empty($_REQUEST['rf-order'])){
        switch ($_REQUEST['rf-order-by']) {
            case '_cms_recipe_time':
                $_query['meta_query'][] = array(
                    'key' => '_cms_recipe_time',
                    'type' => 'TIME',
                );
                break;
            case '_cms_recipe_skill':
                $_query['meta_query'][] = array(
                    'key' => '_cms_recipe_skill',
                    'type' => 'numeric',
                    'value'=> '',
                    'compare' => '!='
                );
                break;
            case '_cms_recipe_calories':
                $_query['meta_query'][] = array(
                    'key' => '_cms_recipe_calories',
                    'type' => 'numeric',
                    'value'=> '',
                    'compare' => '!='
                );
                break;
        }

        $_query['orderby'] = 'meta_value';
        $_query['meta_key'] = $_REQUEST['rf-order-by'];
        $_query['order'] = $_REQUEST['rf-order'];
    }

    /* filter terms */
    if(is_archive()){
        $term = get_queried_object();

        $_query['tax_query'][] = array(
            'taxonomy' => $term->taxonomy,
            'field'    => 'term_id',
            'terms'    => $term->term_id,
        );
    }

    $wp_query = new WP_Query($_query);

    if ( have_posts() ) : ?>
        <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
            /* Include the post format-specific template for the content. If you want to
             * this in a child theme then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            ?>

            <?php
            switch ($mode) {
                case 'list':?>
                    <div class="item-post col-md-12 col-lg-12 col-xs-12 col-sm-6">
                        <?php get_template_part( 'single-templates/blog-recipe/content-list', get_post_format() );?>
                    </div>
                    <?php
                    break;

                default:?>
                    <div class="item-post col-md-4 col-lg-4 col-xs-12 col-sm-6">
                        <?php get_template_part( 'single-templates/blog-recipe/content', get_post_format() );?>
                    </div>
                    <?php
                    break;
            }


            ?>

            <?php
        endwhile; // end of the loop.
         wp_organic_paging_nav();


    else :
        ?>
        <div class="col-md-12">
            <?php get_template_part( 'single-templates/blog-recipe', 'none' );?>
        </div>
        <?php

    endif;
}

function wp_organic_recipe_filter(){

    global $smof_data;

    $_order_by =isset($_REQUEST['rf-order-by']) ? $_REQUEST['rf-order-by'] : '';
    $_order =isset($_REQUEST['rf-order']) ? $_REQUEST['rf-order'] : '';
    $_filter_s = isset($_REQUEST['recipe_s']) ? $_REQUEST['recipe_s'] : '';
    $_mode = isset($_REQUEST['mode']) ? $_REQUEST['mode'] : 'grid';

    ?>
    <div class="col-sm-3 col-md-3 col-sm-3 col-lg-3">
        <div class="form-search">
            <input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="Search" value="<?php echo esc_attr($_filter_s); ?>" name="recipe_s" title="Search for:">
            <input type="submit" value="Search">
        </div>
    </div>
     <div class="filter-content col-sm-8 col-md-6 col-sm-6 col-lg-7 text-right">

        <?php if (isset($smof_data['enable_filter_time']) && ($smof_data['enable_filter_time']=='1')){?>
             <label data-name="_cms_recipe_time" class="<?php if($_order_by == '_cms_recipe_time' && $_order == 'ASC'){ echo 'active'; } ?>"><?php esc_html_e('Cooking Time', 'wp-organic'); ?></label>
        <?php }?>
        <?php if (isset($smof_data['enable_filter_skill']) && ($smof_data['enable_filter_skill']=='1')){?>
        <label data-name="_cms_recipe_skill" class="<?php if($_order_by == '_cms_recipe_skill' && $_order == 'ASC'){ echo 'active'; } ?>"><?php esc_html_e('Skill', 'wp-organic'); ?></label>
        <?php }?>
        <?php if (isset($smof_data['enable_filter_calories']) && ($smof_data['enable_filter_calories']=='1')){?>
         <label data-name="_cms_recipe_calories" class="<?php if($_order_by == '_cms_recipe_calories' && $_order == 'ASC'){ echo 'active'; } ?>"><?php esc_html_e('Calories', 'wp-organic'); ?></label>
        <?php }?>
         <input id="rf-order-by" type="hidden" name="rf-order-by" value="<?php echo esc_attr($_order_by); ?>">
         <input id="rf-order" type="hidden" name="rf-order" value="<?php echo esc_attr($_order); ?>">
     </div>

    <div class="cms-product-layout col-sm-3 col-md-3 col-sm-3 col-lg-2">
        <input type="radio" class="radio1" name="mode" value="grid"<?php if($_mode == 'grid'){ echo ' checked="checked"';}?>>
        <label class="radio-grid overlay"></label>
        <input type="radio" class="radio2" name="mode" value="list"<?php if($_mode == 'list'){ echo ' checked="checked"';}?>>
        <label class="radio-list overlay"></label>
    </div>
    <input type="hidden" name="page_id" value="<?php the_ID(); ?>">
    <?php
}

function wp_organic_recipe_meta(){
    global $wp_organic_meta;
    if(isset($wp_organic_meta->_cms_recipe_serves)) {?>
        <span class="serves"><?php esc_html_e('Serves: ','wp-organic'); ?><span><?php echo esc_attr($wp_organic_meta->_cms_recipe_serves); ?></span></span>
    <?php }
    if(isset($wp_organic_meta->_cms_recipe_time)) {?>
        <span class="time"><?php esc_html_e('Time: ','wp-organic'); ?><span><?php echo esc_attr($wp_organic_meta->_cms_recipe_time); ?></span></span>
    <?php }
    if(isset($wp_organic_meta->_cms_recipe_skill)) {?>
        <span class="skill"><?php esc_html_e('Skill: ','wp-organic'); ?>
            <span>
                <ul class="dots-skill">
                    <li class="<?php if ((int)($wp_organic_meta->_cms_recipe_skill) >=1) echo 'active' ?>"></li>
                    <li class="<?php if ((int)($wp_organic_meta->_cms_recipe_skill) >=2) echo 'active' ?>"></li>
                    <li class="<?php if ((int)($wp_organic_meta->_cms_recipe_skill) >=3) echo 'active' ?>"></li>
                    <li class="<?php if ((int)($wp_organic_meta->_cms_recipe_skill) >=4) echo 'active' ?>"></li>
                    <li class="<?php if ((int)($wp_organic_meta->_cms_recipe_skill) >=5) echo 'active' ?>"></li>

                </ul>

            </span>
        </span>
    <?php }?>

<?php
}
function wp_organic_recipe_single_tab(){
    global $wp_organic_meta;
 if(isset($wp_organic_meta->_cms_recipe_ingredients) || isset($wp_organic_meta->_cms_recipe_recipes) ) { ?>
    <div class="content-tab">
        <ul class="nav nav-tabs" role="tablist">

            <li role="presentation" class="active related-tab">
                <a href="#tab-ingredients" aria-controls="related" role="tab" data-toggle="tab"><?php esc_html_e('Ingredients', 'wp-organic'); ?></a>
            </li>
            <li class="related_tab">
                <a href="#tab-recipies" aria-controls="profile" role="tab" data-toggle="tab"><?php esc_html_e('Recipe', 'wp-organic'); ?></a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="tab-ingredients">
                <?php echo wp_kses_post($wp_organic_meta->_cms_recipe_ingredients); ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="tab-recipies">
                <?php echo wp_kses_post($wp_organic_meta->_cms_recipe_recipes); ?>
            </div>

        </div>
    </div>
<?php }
}
function wp_organic_share_recipe(){
    ?>
    <div class="entry-share">
        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" >
            <i class="material-icons">share</i>
        </a>
        <ul class="social-menu dropdown-menu dropdown-menu-right" role="menu">
            <li><a title="Facebook" data-placement="top" data-rel="tooltip" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><i class="fa fa-facebook"></i></a></li>
            <li><a title="Twitter" data-placement="top" data-rel="tooltip" target="_blank" href="https://twitter.com/home?status=<?php esc_html_e('Check out this article', 'wp-organic');?>:%20<?php the_title();?>%20-%20<?php the_permalink();?>"><i class="fa fa-twitter"></i></a></li>
            <li><a title="Google Plus" data-placement="top" data-rel="tooltip" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink();?>"><i class="fa fa-google-plus"></i></a></li>
            <li class="social-pinterest"><a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink();?>"><i class="fa fa-pinterest"></i></a></li>
        </ul>
    </div>
<?php
}
/* Related Recipe */
function wp_organic_related_recipe($id) {
    global $post,$wp_organic_meta;
    $_group = array();
    $category_name = array();

    $post_terms = get_the_terms($post->ID, 'recipe-categories' );

    foreach ($post_terms as $p_term){
        $_group[] = $p_term->slug;
        $category_name[] = $p_term->name;
    }

    $query_data = array(
        'post_type' => 'recipe',
        'posts_per_page' => 3,
        'post_status'=> 'publish',
        'post__not_in'=>array($id),
        'tax_query' => array(
            array(
                'taxonomy' => 'recipe-categories',
                'field' => 'slug',
                'terms' => $category_name,
            )
        )
    );
    $query = new WP_Query($query_data);

    if($query->have_posts()){
        ?> <div class="cms-related-recipe row clearfix">
            <h3 class="title-recipe-related custom-font-3"> <?php esc_html_e('Recipies You May Also Like', 'wp-organic'); ?></h3>
            <?php
            while ($query->have_posts()): $query->the_post();
                ?>
                <div class="item-post col-xs-12 col-sm-4 col-md-4">
                    <article>
                        <div class="item-inner">
                            <?php if(has_post_thumbnail()):
                                the_post_thumbnail('wp_organic_blog_listing2');
                            else :?>

                                <img src= "<?php echo esc_url(get_template_directory_uri(). '/assets/images/no-image.jpg');?>" alt="" />

                            <?php endif; ?>
                            <h3 class="title"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <h5 class="subtitle"><?php echo esc_attr($wp_organic_meta->_cms_recipe_subtitle); ?></h5>


                        </div>
                    </article>
                </div>
                <?php
            endwhile;

            ?> </div> <?php
    }

    wp_reset_postdata();
}
function wp_organic_fancybox_themeoption(){
    global $smof_data;
    ?>
    <section class="cms-fancyboxes-wraper-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="cms-fancyboxes-wraper cms-fancyboxes-layout1 template-cms_fancybox_single--layout4 no-border">
                        <div class="cms-fancyboxes-body">
                            <div class="cms-fancybox-item">

                                <div class="icon-left">
                                    <?php if(!empty($smof_data['box_image1']['url'])){?>
                                        <div class="cms-fancybox-image">
                                            <img src="<?php echo esc_attr($smof_data['box_image1']['url']);?>" alt="" />
                                        </div>
                                    <?php }?>
                                </div>
                                <div class="content-right">
                                    <?php if($smof_data['box_title1']):?>
                                        <h5><?php echo esc_attr($smof_data['box_title1']);?></h5>
                                    <?php endif;?>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="cms-fancyboxes-wraper cms-fancyboxes-layout1 template-cms_fancybox_single--layout4">
                        <div class="cms-fancyboxes-body">
                            <div class="cms-fancybox-item">

                                <div class="icon-left">
                                    <?php if(!empty($smof_data['box_image2']['url'])){?>
                                        <div class="cms-fancybox-image">
                                            <img src="<?php echo esc_attr($smof_data['box_image2']['url']);?>" alt="" />
                                        </div>
                                    <?php }?>
                                </div>
                                <div class="content-right">
                                    <?php if($smof_data['box_title2']):?>
                                        <h5><?php echo esc_attr($smof_data['box_title2']);?></h5>
                                    <?php endif;?>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 hidden-sm">
                    <div class="cms-fancyboxes-wraper cms-fancyboxes-layout1 template-cms_fancybox_single--layout4">
                        <div class="cms-fancyboxes-body">
                            <div class="cms-fancybox-item">

                                <div class="icon-left">
                                    <?php if(!empty($smof_data['box_image3']['url'])){?>
                                        <div class="cms-fancybox-image">
                                            <img src="<?php echo esc_attr($smof_data['box_image3']['url']);?>" alt="" />
                                        </div>
                                    <?php }?>
                                </div>
                                <div class="content-right">
                                    <?php if($smof_data['box_title3']):?>
                                        <h5><?php echo esc_attr($smof_data['box_title3']);?></h5>
                                    <?php endif;?>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
}
function wp_organic_footer_feature(){
    global $smof_data;
    if ($smof_data['enable_footer_feature']) return true;

}
function wp_organic_footer_content_feature(){
    global $smof_data;
    ?>
    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
        <div class="cms-fancyboxes-wraper template-cms_fancybox_single--layout6">
            <div class="cms-fancyboxes-body">
                <div class="cms-fancybox-item">
                    <div class="icon-left">
                        <span class="fancy-box-icon">
                            <i class="<?php echo esc_attr($smof_data['box_footer_icon1']);?>">
                            </i>
                        </span>

                    </div>
                    <div class="content-right">
                        <?php if($smof_data['box_footer_title1']):?>
                            <h5 class="custom-font-3"><?php echo esc_attr($smof_data['box_footer_title1']);?></h5>
                        <?php endif;?>
                        <?php if($smof_data['box_footer_subtitle1']): ?>
                            <div class="cms-fancybox-content">
                                <?php echo esc_attr($smof_data['box_footer_subtitle1']);?>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
        <div class="cms-fancyboxes-wraper template-cms_fancybox_single--layout6">
            <div class="cms-fancyboxes-body">
                <div class="cms-fancybox-item">
                    <div class="icon-left">
                        <span class="fancy-box-icon">
                            <i class="<?php echo esc_attr($smof_data['box_footer_icon2']);?>">
                            </i>
                        </span>

                    </div>
                    <div class="content-right">
                        <?php if($smof_data['box_footer_title2']):?>
                            <h5 class="custom-font-3"><?php echo esc_attr($smof_data['box_footer_title2']);?></h5>
                        <?php endif;?>
                        <?php if($smof_data['box_footer_subtitle2']): ?>
                            <div class="cms-fancybox-content">
                                <?php echo esc_attr($smof_data['box_footer_subtitle2']);?>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
        <div class="cms-fancyboxes-wraper template-cms_fancybox_single--layout6">
            <div class="cms-fancyboxes-body">
                <div class="cms-fancybox-item">
                    <div class="icon-left">
                        <span class="fancy-box-icon">
                            <i class="<?php echo esc_attr($smof_data['box_footer_icon3']);?>">
                            </i>
                        </span>

                    </div>
                    <div class="content-right">
                        <?php if($smof_data['box_footer_title3']):?>
                            <h5 class="custom-font-3"><?php echo esc_attr($smof_data['box_footer_title3']);?></h5>
                        <?php endif;?>
                        <?php if($smof_data['box_footer_subtitle3']): ?>
                            <div class="cms-fancybox-content">
                                <?php echo esc_attr($smof_data['box_footer_subtitle3']);?>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 hidden-sm">
        <div class="cms-fancyboxes-wraper template-cms_fancybox_single--layout6">
            <div class="cms-fancyboxes-body">
                <div class="cms-fancybox-item">
                    <div class="icon-left">
                        <span class="fancy-box-icon">
                            <i class="<?php echo esc_attr($smof_data['box_footer_icon4']);?>">
                            </i>
                        </span>

                    </div>
                    <div class="content-right">
                        <?php if($smof_data['box_footer_title4']):?>
                            <h5 class="custom-font-3"><?php echo esc_attr($smof_data['box_footer_title4']);?></h5>
                        <?php endif;?>
                        <?php if($smof_data['box_footer_subtitle4']): ?>
                            <div class="cms-fancybox-content">
                                <?php echo esc_attr($smof_data['box_footer_subtitle4']);?>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php
}
/**
 * Portfolio Masonry layout 1
 *
 */

function wp_organic_portfolio_masonry($portfolio_masonry_category){
    global $product,$woocommerce,$post;

    /* query. */
    $query = array(
        'posts_per_page'=> 4,
        'post_type' => 'product',
        'post_status' => 'publish'
    );

    if(!empty($portfolio_masonry_category)){
        $query['tax_query'] = array(array('taxonomy'=>'product_cat', 'field'=>'slug', 'terms'=>explode(',', $portfolio_masonry_category)));
    }
    $portfolio_masonry_posts = new WP_Query( $query );
    if(empty($portfolio_masonry_posts)) return ;

    ?>
    <div class="cs-portfolio-masonry-wrapper clearfix cms-gallery-layout1">
        <div class="cs-portfolio-masonry-top cs-portfolio-masonry-box clearfix">
            <div class="w100">
                <?php $j=0;
                ?>

                <?php while ($portfolio_masonry_posts->have_posts() ) :  $portfolio_masonry_posts->the_post(); ?>
                    <?php if($j == 0) {?>
                        <div class="w50 clearfix">
                            <div class="cs-portfolio-masonry-item item1">
                                <?php wp_organic_portfolio_masonry_post(); ?>
                            </div>
                        </div>
                    <?php } else {?>

                            <?php if($j == 1) {?>
                             <div class="w50 clearfix">
                                <div class="w100 clearfix">
                                    <div class="cs-portfolio-masonry-item item2">
                                        <?php wp_organic_portfolio_masonry_post();?>
                                    </div>
                                </div>
                            <?php }?>

                            <?php if($j == 2) {?>
                                <div class="w50 clearfix">
                                    <div class="cs-portfolio-masonry-item item3">
                                        <?php  wp_organic_portfolio_masonry_post(); ?>
                                    </div>
                                </div>
                            <?php }?>
                            <?php if($j == 3) {?>
                                <div class="w50 clearfix">
                                    <div class="cs-portfolio-masonry-item item4">
                                        <?php wp_organic_portfolio_masonry_post(); ?>
                                    </div>
                                </div>
                                </div>
                            <?php }?>
                            <?php if($portfolio_masonry_posts->post_count < 3){ echo '</div>';}?>
                    <?php } $j++;?>
                <?php endwhile;
                ?>

            </div>
        </div>
    </div>
    <?php

    wp_reset_postdata();
}

/**
 * Portfolio Masonry - Child function wp_goldmate_portfolio_masonry()
 *
 */
function wp_organic_portfolio_masonry_post(){
    global $post;
    ?>
    <div class="woocommerce cms-grid-item">
        <?php
        ?>
        <?php
        if(has_post_thumbnail()):
            $class = ' has-thumbnail';
            $thumbnail = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID(),'full'));
        else:
            $class = ' no-image';
            $thumbnail = '' .get_template_directory_uri(). '/assets/images/no-image.jpg';
            $thumbnail = '' .get_template_directory_uri(). '/assets/images/no-image.jpg';
        endif;
        ?>
        <div class="cms-grid-media" style="background-image:url(<?php echo esc_url($thumbnail);?>);"></div>
        <div class="cshero-woo-meta">

            <div class="cshero-product-title custom-font-1">
                <?php the_title(); ?>
            </div>
            <div class="cshero-product-desc custom-font-1">
                <?php echo wp_trim_words(apply_filters( 'woocommerce_short_description', $post->post_excerpt ),15,'.') ?>

            </div>

            <div class="price-add-to-cart">

                <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
                <?php
                /**
                 * woocommerce_after_shop_loop_item_title hook
                 *
                 * @hooked woocommerce_template_loop_rating - 5
                 * @hooked woocommerce_template_loop_price - 10
                 */

                ?>
                <a href="<?php the_permalink(); ?>" alt="" ><i class="zmdi zmdi-eye"></i></a>
            </div>

        </div>

    </div>
    <?php
}
/**
 * gallery Masonry layout 1
 *
 */

function wp_organic_gallery_masonry(){
    global $product,$woocommerce,$post;

    /* query. */
    $query = array(
        'posts_per_page'=> 18,
        'post_type' => 'gallery',
        'post_status' => 'publish'
    );

    $gallery_masonry_posts = new WP_Query( $query );
    $gallery_masonry_posts =  $gallery_masonry_posts->posts;

    if(empty( $gallery_masonry_posts)) return ;

    ?>
    <div class="cs-portfolio-masonry-wrapper clearfix cms-gallery-layout2">
        <div class="cs-portfolio-masonry-top cs-portfolio-masonry-box clearfix">
            <div class="w100">
                <div class="w26 clearfix">
                    <div class="cs-portfolio-masonry-item item1">
                        <?php isset($gallery_masonry_posts[0]) ? wp_organic_gallery_masonry_post($gallery_masonry_posts[0]) : ''; ?>
                    </div>
                </div>

                <div class="w48 clearfix">
                    <div class="w50 clearfix">
                        <div class="cs-portfolio-masonry-item item2">
                            <?php isset($gallery_masonry_posts[1]) ? wp_organic_gallery_masonry_post($gallery_masonry_posts[1]) : ''; ?>
                        </div>
                    </div>

                    <div class="w50 clearfix">
                        <div class="cs-portfolio-masonry-item item3">
                            <?php isset($gallery_masonry_posts[2]) ? wp_organic_gallery_masonry_post($gallery_masonry_posts[2]) : ''; ?>
                        </div>
                    </div>

                    <div class="w50 clearfix">
                        <div class="cs-portfolio-masonry-item item4">
                            <?php isset($gallery_masonry_posts[3]) ? wp_organic_gallery_masonry_post($gallery_masonry_posts[3]) : ''; ?>
                        </div>
                    </div>
                    <div class="w50 clearfix">
                        <div class="cs-portfolio-masonry-item item5">
                            <?php isset($gallery_masonry_posts[4]) ? wp_organic_gallery_masonry_post($gallery_masonry_posts[4]) : ''; ?>
                        </div>
                    </div>
                </div>

                <div class="w26 clearfix">
                    <div class="cs-portfolio-masonry-item item6">
                        <?php isset($gallery_masonry_posts[5]) ? wp_organic_gallery_masonry_post($gallery_masonry_posts[5]) : ''; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($gallery_masonry_posts[6])){?>
        <div class="cs-portfolio-masonry-top cs-portfolio-masonry-box clearfix">
            <div class="w100">
                <div class="w26 clearfix">
                    <div class="cs-portfolio-masonry-item item1 ">
                        <?php isset($gallery_masonry_posts[6]) ? wp_organic_gallery_masonry_post($gallery_masonry_posts[6]) : ''; ?>
                    </div>
                </div>

                <div class="w48 clearfix">
                    <div class="w50 clearfix">
                        <div class="cs-portfolio-masonry-item item2">
                            <?php isset($gallery_masonry_posts[7]) ? wp_organic_gallery_masonry_post($gallery_masonry_posts[7]) : ''; ?>
                        </div>
                    </div>

                    <div class="w50 clearfix">
                        <div class="cs-portfolio-masonry-item item3">
                            <?php isset($gallery_masonry_posts[8]) ? wp_organic_gallery_masonry_post($gallery_masonry_posts[8]) : ''; ?>
                        </div>
                    </div>

                    <div class="w50 clearfix">
                        <div class="cs-portfolio-masonry-item item4">
                            <?php isset($gallery_masonry_posts[9]) ? wp_organic_gallery_masonry_post($gallery_masonry_posts[9]) : ''; ?>
                        </div>
                    </div>
                    <div class="w50 clearfix">
                        <div class="cs-portfolio-masonry-item item5">
                            <?php isset($gallery_masonry_posts[10]) ? wp_organic_gallery_masonry_post($gallery_masonry_posts[10]) : ''; ?>
                        </div>
                    </div>
                </div>

                <div class="w26 clearfix">
                    <div class="cs-portfolio-masonry-item item6">
                        <?php isset($gallery_masonry_posts[11]) ? wp_organic_gallery_masonry_post($gallery_masonry_posts[11]) : ''; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>
        <?php if (isset($gallery_masonry_posts[12])){?>
        <div class="cs-portfolio-masonry-top cs-portfolio-masonry-box clearfix">
            <div class="w100">
                <div class="w26 clearfix">
                    <div class="cs-portfolio-masonry-item item1">
                        <?php isset($gallery_masonry_posts[12]) ? wp_organic_gallery_masonry_post($gallery_masonry_posts[12]) : ''; ?>
                    </div>
                </div>

                <div class="w48 clearfix">
                    <div class="w50 clearfix">
                        <div class="cs-portfolio-masonry-item item2">
                            <?php isset($gallery_masonry_posts[13]) ? wp_organic_gallery_masonry_post($gallery_masonry_posts[3]) : ''; ?>
                        </div>
                    </div>

                    <div class="w50 clearfix">
                        <div class="cs-portfolio-masonry-item item3">
                            <?php isset($gallery_masonry_posts[14]) ? wp_organic_gallery_masonry_post($gallery_masonry_posts[14]) : ''; ?>
                        </div>
                    </div>

                    <div class="w50 clearfix">
                        <div class="cs-portfolio-masonry-item item4">
                            <?php isset($gallery_masonry_posts[15]) ? wp_organic_gallery_masonry_post($gallery_masonry_posts[15]) : ''; ?>
                        </div>
                    </div>
                    <div class="w50 clearfix">
                        <div class="cs-portfolio-masonry-item item5">
                            <?php isset($gallery_masonry_posts[16]) ? wp_organic_gallery_masonry_post($gallery_masonry_posts[16]) : ''; ?>
                        </div>
                    </div>
                </div>

                <div class="w26 clearfix">
                    <div class="cs-portfolio-masonry-item item6">
                        <?php isset($gallery_masonry_posts[17]) ? wp_organic_gallery_masonry_post($gallery_masonry_posts[17]) : ''; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
    <?php

    wp_reset_postdata();
}
function wp_organic_gallery_masonry_post($item){
    global $post,$wp_organic_meta;
     $gallery_meta = wp_organic_post_meta_data($item->ID);
    ?>
    <div class="woocommerce cms-grid-item">
        <?php
        ?>
        <?php
        if(has_post_thumbnail($item->ID)):
            $class = ' has-thumbnail';
            $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($item->ID,'full'));
        else:
            $class = ' no-image';
            $thumbnail = '' .get_template_directory_uri(). '/assets/images/no-image.jpg';
            $thumbnail = '' .get_template_directory_uri(). '/assets/images/no-image.jpg';
        endif;
        ?>
        <div class="cms-gallery-item">
            <a class="cms-prettyphoto p-view" href="<?php echo esc_url($thumbnail);?>"><i class="material-icons">zoom_in</i></a>
            <div class="cms-grid-media" style="background-image:url(<?php echo esc_url($thumbnail);?>);"></div>
        </div>
        <div class="cshero-woo-meta">
            <div class="cshero-product-subtitle">
                <?php
                echo esc_attr($gallery_meta->_cms_subtitle_gallery);
                ?>
            </div>
            <div class="cshero-product-title custom-font-3">
                <?php echo get_the_title($item->ID); ?>
            </div>



        </div>

    </div>
    <?php
}
/**
 * gallery layout 2
 *
 */
function wp_organic_gallery_masonry_layout2(){
    global $post,$wp_organic_meta;


    /* query. */
    $query = array(
        'posts_per_page'=> 12,
        'post_type' => 'gallery',
        'post_status' => 'publish'
    );
    $gallery_posts = new WP_Query( $query );
    if(empty($gallery_posts)) return ;

    ?>
    <div class="cs-portfolio-masonry-wrapper clearfix cms-gallery-layout3">

              <?php while ($gallery_posts->have_posts() ) :  $gallery_posts->the_post(); ?>
                  <?php $gallery_meta = wp_organic_post_meta_data();?>
                        <div class="cms-grid-item">

                            <?php
                            if(has_post_thumbnail()):
                                $class = ' has-thumbnail';
                                $thumbnail = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID(),'full'));
                            else:
                                $class = ' no-image';
                                $thumbnail = '' .get_template_directory_uri(). '/assets/images/no-image.jpg';
                                $thumbnail = '' .get_template_directory_uri(). '/assets/images/no-image.jpg';
                            endif;
                            ?>
                            <div class="cms-gallery-item">
                                <a class="cms-prettyphoto p-view" href="<?php echo esc_url($thumbnail);?>"><i class="material-icons">zoom_in</i></a>
                                <div class="cms-grid-media" style="background-image:url(<?php echo esc_url($thumbnail);?>);"></div>
                            </div>
                            <div class="cshero-woo-meta">
                                <div class="cshero-product-subtitle">
                                    <?php
                                    echo esc_attr($gallery_meta->_cms_subtitle_gallery);
                                    ?>
                                </div>
                                <div class="cshero-product-title custom-font-3">
                                    <?php echo get_the_title(); ?>
                                </div>
                            </div>

                        </div>

                <?php endwhile;
                ?>
    </div>
    <?php

    wp_reset_postdata();
}

function wp_organic_woocommerce_cart_url(){
    global $woocommerce;

    $cart_url = $woocommerce->cart->get_cart_url();

    $_ingredients = get_post_meta(get_the_ID(), '_cms_ingredients', true);

    $_parameter = array('ingredients' => 1);

    if(!empty($_ingredients)){
        $_numbers = $_ingredients['numbers'];
        $_ingredient = $_ingredients['ingredient'];

        $_i = 0;
        foreach ($_ingredient as $_ing){
            $_parameter['add-to-cart['.$_i.']'] = $_ing ? $_ing : '0' ;
            $_parameter['quantity['.$_i.']'] = !empty($_numbers[$_i]) ? $_numbers[$_i] : 1;
            $_i++;
        }
    }

    return add_query_arg(array($_parameter), $cart_url);
}

function wp_organic_ingredients_add_cart(){

    if(empty($_REQUEST['ingredients'])) return;

    $products = $_REQUEST['add-to-cart'];
    $quantity = $_REQUEST['quantity'];

    if(empty($products) || empty($quantity)) return;

    $i = 0;

    foreach ($products as $product ) {

        if(empty($product) || empty($quantity[$i])) continue;

        WC()->cart->add_to_cart($product, $quantity[$i]);

        $i++;
    }
}

add_action('wp_loaded', 'wp_organic_ingredients_add_cart');
/**
 * Excerpt content.
 *
 * @param (int) string limited.
 * @return echo.
 */
if(!function_exists('wp_organic_the_excerpt')){
    function wp_organic_the_excerpt($limit = 50 , $before = '', $after = ''){

        $_wp_content = strip_tags(strip_shortcodes(get_the_content()));

        echo (strlen($_wp_content) <= $limit ) ? $_wp_content :  $before . substr($_wp_content, 0, (int)$limit) . $after;
    }
}