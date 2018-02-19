
<div style="opacity: 0;" class="cms-carousel layout-attorney attorney-layout1 cms-carousel-attorney-layout1 cms_carousel--layout-team3 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    $size = 'full';
    while($posts->have_posts()){
        $posts->the_post();
        $attorney_meta = wp_organic_post_meta_data();
        $position_sub_title = isset( $attorney_meta->_cms_position_sub_title) ? $attorney_meta->_cms_position_sub_title : '';
        ?>
        <div class="cms-carousel-item cms-team-item">
            <?php 
                if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                    $class = ' has-thumbnail';
                    $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false);
                    $thumbnail = get_the_post_thumbnail(get_the_ID(),'full');
                else:
                    $class = ' no-image';
                    $thumbnail_url[0] = get_template_directory_uri(). '/assets/images/no-image.jpg';
                    $thumbnail = '<img src="'.esc_url(get_template_directory_uri(). '/assets/images/no-image.jpg').'" alt="'.get_the_title().'" />';
                endif;
                echo '<div class="cms-grid-media '.esc_attr($class).'">'.$thumbnail.'</div>';
            ?>

            <div class="cms-grid-team-content">
                <h3 class="custom-font-3"><?php the_title();?></h3>
                <div class="position">
                    <?php echo  esc_attr($position_sub_title); ?>
                </div>
                <div class="description">
                    <?php echo substr(get_the_content(), 0,100); ?>
                </div>
                <div class="cms-team-social cms-social-page">
                    <?php
                    for($i=1;$i<5;$i++){
                        $icon = $attorney_meta->{"_cms_icon".$i};
                        $link = $attorney_meta->{"_cms_link".$i};
                        if(!empty($icon) && !empty($link)): ?>
                            <a class="<?php echo esc_attr($icon);?>" href="<?php echo esc_url($link);?>"></a>
                        <?php endif;
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>