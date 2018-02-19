<?php global $post;
$query = new WP_Query(array('posts_per_page'=> 4, 'post_type' => 'recipe', 'post_status'=> 'publish'));

if($query->have_posts()){
?>
    <div class="cms-recipe clearfix">
        <div class="row">
    <?php
    while ($query->have_posts()): $query->the_post();
        $recipe_meta = wp_organic_post_meta_data();
        ?>
        <div class="item-post col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <article>
                <div class="item-inner">
                    <?php if(has_post_thumbnail()):
                        the_post_thumbnail('wp_organic_recipe');
                    else :?>

                        <img src= "<?php echo esc_url(get_template_directory_uri(). '/assets/images/no-image.jpg');?>" alt="" />

                    <?php endif; ?>
                    <h3 class="title"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="content-overlay">
                        <div class="content-overlay-inner">
                            <div class="menu_product_meta">
                               <span class="item_product_meta">
                                   <?php if(!empty($recipe_meta->_cms_recipe_time_icon2)) { ?>
                                       <i class="material-icons"><?php echo $recipe_meta->_cms_recipe_time_icon2; ?></i>
                                       <?php } else {
                                            if(!empty($recipe_meta->_cms_recipe_time_icon1)) { ?>
                                              <i class="<?php echo $recipe_meta->_cms_recipe_time_icon1; ?>"></i>
                                   <?php } } ?>
                                   <span class="title"><?php esc_html_e('Time','wp-organic'); ?></span>
                                      <span><?php echo $recipe_meta->_cms_recipe_time; ?></span>
                               </span>
                                <span class="item_product_meta">
                                   <?php if(!empty($recipe_meta->_cms_recipe_skill_icon2)) { ?>
                                       <i class="material-icons"><?php echo $recipe_meta->_cms_recipe_skill_icon2; ?></i>
                                   <?php } else {
                                       if(!empty($recipe_meta->_cms_recipe_skill_icon1)) { ?>
                                           <i class="<?php echo $recipe_meta->_cms_recipe_skill_icon1; ?>"></i>
                                       <?php } } ?>
                                    <span class="title"><?php esc_html_e('Skill','wp-organic'); ?></span>
                                    <?php if (isset($recipe_meta->_cms_recipe_skill)) {?>
                                      <span><?php echo $recipe_meta->_cms_recipe_skill.'/5'; ?></span>
                                      <?php }?>
                               </span>
                                <span class="item_product_meta">
                                   <?php if(!empty($recipe_meta->_cms_recipe_calories_icon2)) { ?>
                                       <i class="material-icons"><?php echo $recipe_meta->_cms_recipe_calories_icon2; ?></i>
                                   <?php } else {
                                       if(!empty($recipe_meta->_cms_recipe_calories_icon1)) { ?>
                                           <i class="<?php echo $recipe_meta->_cms_recipe_calories_icon1; ?>"></i>
                                       <?php } } ?>
                                    <span class="title"><?php esc_html_e('Calories','wp-organic'); ?></span>
                                      <span><?php echo $recipe_meta->_cms_recipe_calories; ?></span>
                               </span>

                            </div>


                            <div class="content-recipe">
                                <div class="short-content">
                                    <?php echo wp_trim_words(get_the_content(),13,'.') ?>
                                </div>
                                <a class="readmore" href="<?php echo get_the_permalink(); ?>"><?php esc_html_e('View recipe','wp-organic'); ?></a>
                            </div>

                        </div>
                    </div>

                </div>
            </article>
        </div>
        <?php
    endwhile;

    ?> </div></div> <?php
}

wp_reset_postdata();
