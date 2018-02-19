
<div id="cbp-qtrotator" class="cbp-qtrotator cms-testimonial-layout2 custom-layout1" >
    <?php
    $testimonial_color = isset($atts['testimonial_color']) ? $atts['testimonial_color'] : '';
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        $testimonial_meta = wp_organic_post_meta_data();
        ?>
        <div class=" cms-testimonial-item cbp-qtcontent"  style="border-color:<?php echo wp_organic_hex_to_rgb(esc_attr($testimonial_color),0.77);?>;">

            <div class="cms-carousel-body cms-testimonial-body">
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
                <div class="cms-testimonial-body-left">
                    <div class="content" style="color:<?php echo esc_attr($testimonial_color);?>;">
                             <div class="span-content"><?php
                                 the_content();?>
                             </div>
                    </div>
                    <div class="title" style="color:<?php echo esc_attr($testimonial_color);?>;">
                        <?php the_title();?>
                    </div>
                </div>

            </div>


        </div>
        <?php
    }
    ?>
</div>