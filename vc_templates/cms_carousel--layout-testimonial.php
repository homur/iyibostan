
<div class="cms-testimonial-layout1 custom-layout1 custom-font-1">
    <?php
    $testimonial_color = isset($atts['testimonial_color']) ? $atts['testimonial_color'] : '';
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        $testimonial_meta = wp_organic_post_meta_data();
        ?>
        <div class="cms-carousel-item cms-testimonial-item">
            <div class="cms-testimonial-wrapper clearfix">

                <div class="cms-testimonial-body-left">
                    <div class="content" style="color:<?php echo esc_attr($testimonial_color);?>;">
                            <div class="left-quote">&ldquo;</div>

                             <div class="span-content"><?php
                                 $tring=get_the_content();
                                 echo wp_organic_text_limit( $tring,20); ?>
                             </div>
                            <div class="right-quote">&rdquo;</div>
                    </div>
                </div>
                <div class="cms-testimonial-body-right">

                    <?php
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                        $class = ' has-thumbnail';
                        $thumbnail = get_the_post_thumbnail(get_the_ID(),'wp_organic_blog_listing2');
                    else:
                        $class = ' no-image';
                        $thumbnail = '<img src="'.get_template_directory_uri(). '/assets/images/no-image.jpg" alt="'.get_the_title().'" />';
                    endif;
                    echo '<div class="cms-grid-media '.esc_attr($class).'">'.$thumbnail.'</div>';
                    ?>
                    <div class="title custom-font-8" style="color:<?php echo esc_attr($testimonial_color);?>;">
                        <?php the_title();?>
                    </div>
                    <?php
                    if (!empty($testimonial_meta ->_cms_testimonial_position)){
                    ?>
                        <div class="position custom-font-1">
                            <?php echo esc_attr($testimonial_meta ->_cms_testimonial_position);?>
                        </div>
                    <?php }?>
                </div>
            </div>

        </div>
        <?php
    }
    ?>
</div>