<?php
/* get categories */
$taxo = 'timeline-categories';
$_category = array();
if(!isset($atts['cat']) || $atts['cat']==''){
    $terms = get_terms($taxo);
    if(!$terms) {
        foreach ($terms as $cat) {
            $_category[] = $cat->term_id;
        }
    }
} else {
    $_category  = explode(',', $atts['cat']);
}
$atts['categories'] = $_category;
?>
<div class="cms-grid-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="row <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = ($atts['layout']=='basic')?'wp_organic_blog_listing2':'';
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            if(!$terms){
                foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                    $groups[] = '"category-'.$category->slug.'"';
                }
            }

            $timeline_meta = wp_organic_post_meta_data();
            $timeline_year = !empty($timeline_meta->_cms_timeline_year) ? $timeline_meta->_cms_timeline_year: '';
            ?>
            <div class="cms-grid-item col-lg-12 col-md-12 col-sm-12 col-xs-12" data-groups='[<?php echo implode(',', $groups);?>]'>
                <div class="cms-grid-left">
                    <div class="cms-grid-descriptions" >
                        <div class="cms-grid-title custom-font-8">
                           <?php the_title();?>
                        </div>

                        <div class="cms-grid-content custom-font-1">
                            <?php echo wp_trim_words(get_the_content(),30,'.') ?>
                        </div>
                        <div class="cms-grid-time custom-font-8">
                            <?php the_time('F d');?>
                        </div>
                    </div>
                </div>
                <div class="cms-grid-right">
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
                    <div class="cms-grid-year custom-font-1" >
                        <?php echo esc_attr($timeline_year); ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="cms_pagination"></div>
</div>