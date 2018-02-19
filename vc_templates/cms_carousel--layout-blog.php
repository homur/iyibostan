<div class="cms-carousel <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        ?>
        <div class="cms-carousel-item">
            <?php
            if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                $class = ' has-thumbnail';
                $thumbnail = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID(),'full'));
            else:
                $class = ' no-image';
                $thumbnail = '' .get_template_directory_uri(). '/assets/images/no-image.jpg';
            endif;
            ?>
            <div class="cms-grid-media <?php echo esc_attr($class); ?>" style="background-image:url(<?php echo esc_url($thumbnail);?>);">
            </div>
            <div class="content-overlay">
                <div class="cms-carousel-title">
                    <h3><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(),2,'...') ?></a></h3>
                </div>
                <div class="cms-carousel-categories">
                    <?php echo get_the_term_list( get_the_ID(), 'category', '', ', ', '' ); ?>
                </div>
                <div class="cms-grid-content">
                    <?php  wp_organic_the_excerpt(340, '', esc_html__('...', 'wp-organic'));?><a href="<?php the_permalink(); ?>"><?php echo esc_html__('Continue reading...','wp-organic');?></a>
                </div>
            </div>

        </div>
        <?php
    }
    ?>
</div>