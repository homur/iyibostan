<div class="cms-slick-wrap cms-carousel-shop">

    <div class="cms-slider-default layout4">
        <div class="cms-slider-nav">
            <?php
            $posts = $atts['posts'];
            while($posts->have_posts()){
                $posts->the_post();
                ?>
                <div class="cms-carousel-item">
                    <?php
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                        $class = ' has-thumbnail';
                        $thumbnail = get_the_post_thumbnail(get_the_ID(),'wp_organic_blog_carousel');
                    else:
                        $class = ' no-image';
                        $thumbnail = '<img src="'.get_template_directory_uri(). '/assets/images/no-image.jpg" alt="'.get_the_title().'" />';
                    endif;
                    echo '<div class="cms-grid-media '.esc_attr($class).'">'.$thumbnail.'</div>';
                    ?>
                    <div class="title custom-font-8"><?php echo get_the_title();?></div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="cms-slider-wrap">
            <?php
            $posts = $atts['posts'];
            while($posts->have_posts()){
                $posts->the_post();
                ?>
                <div class="cms-carousel-item">
                    <div class="cms-carousel-title custom-font-1">
                       <a href="<?php the_permalink(); ?>"><?php echo get_the_title();?></a>
                    </div>
                    <div class="cms-grid-content">
                        <?php echo wp_trim_words(get_the_content(),51,'...') ?>
                    </div>


                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>