<?php 
    /* get categories */
        $taxo = 'category';
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
    <div class="row <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = ($atts['layout']=='basic')?'thumbnail':'wp_organic_3columns';
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="<?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                <div class="cms-grid-3columns">
                    <?php 
                        if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                            $class = ' has-thumbnail';
                            $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
                        else:
                            $class = ' no-image';
                            $thumbnail = '<img src="'.esc_url(CMS_IMAGES).'no-image.jpg" alt="'.get_the_title().'" />';
                        endif;
                        echo '<div class="cms-grid-media '.esc_attr($class).'">'.$thumbnail.'</div>';
                    ?>
                    <div class="cms-grid-descriptions">
                        <div class="cms-grid-title">
                            <a href="<?php the_permalink(); ?>"><h5><?php the_title();?></h5></a>
                        </div>
                        <div class="cms-grid-time">
                            <?php the_time('d/m/Y, G:i');?>
                        </div>
                        <div class="cms-grid-content">
                            <?php echo wp_trim_words(get_the_content(),10,'.') ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="cms_pagination"></div>
</div>