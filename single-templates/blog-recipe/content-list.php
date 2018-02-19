<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
$recipe_meta = wp_organic_post_meta_data();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="item-inner content-layout-list">
				<div class="recipe-list-image">
					<?php if(has_post_thumbnail()):
						the_post_thumbnail('wp_organic_portfolio-width-height');
					else :?>

						<img src= "<?php echo esc_url(get_template_directory_uri(). '/assets/images/no-image.jpg');?>" alt="" />

					<?php endif; ?>
				</div>
				<div class="recipe-list-content">
					<div class="recipe-list-content-left">
						<h3 class="title"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="content-recipe">
							<div class="short-content">
								<?php echo wp_trim_words(get_the_content(),13,'.') ?>
							</div>

						</div>
					</div>
					<div class="recipe-list-content-right">
						<div class="menu_product_meta">
                               <span class="item_product_meta">
                                   <?php if(isset($recipe_meta->_cms_recipe_time_icon2)) { ?>
									   <i class="material-icons"><?php echo esc_attr($recipe_meta->_cms_recipe_time_icon2); ?></i>
								   <?php } else {
									   if(isset($recipe_meta->_cms_recipe_time_icon1)) { ?>
										   <i class="<?php echo esc_attr($recipe_meta->_cms_recipe_time_icon1); ?>"></i>
									   <?php } } ?>
								   <span class="title"><?php esc_html_e('Time','wp-organic'); ?></span>
                                      <span><?php echo date_i18n('i:s',strtotime($recipe_meta->_cms_recipe_time)); ?></span>
                               </span>
                                <span class="item_product_meta">
                                   <?php if(isset($recipe_meta->_cms_recipe_skill_icon2)) { ?>
									   <i class="material-icons"><?php echo esc_attr($recipe_meta->_cms_recipe_skill_icon2); ?></i>
								   <?php } else {
									   if(isset($recipe_meta->_cms_recipe_skill_icon1)) { ?>
										   <i class="<?php echo esc_attr($recipe_meta->_cms_recipe_skill_icon1); ?>"></i>
									   <?php } } ?>
									<span class="title"><?php esc_html_e('Skill','wp-organic'); ?></span>
									<?php if (isset($recipe_meta->_cms_recipe_skill)) {?>
										<span><?php echo esc_attr($recipe_meta->_cms_recipe_skill).'/5'; ?></span>
									<?php }?>
                               </span>
                                <span class="item_product_meta">
                                   <?php if(isset($recipe_meta->_cms_recipe_calories_icon2)) { ?>
									   <i class="material-icons"><?php echo esc_attr($recipe_meta->_cms_recipe_calories_icon2); ?></i>
								   <?php } else {
									   if(isset($recipe_meta->_cms_recipe_calories_icon1)) { ?>
										   <i class="<?php echo esc_attr($recipe_meta->_cms_recipe_calories_icon1); ?>"></i>
									   <?php } } ?>
									<span class="title"><?php esc_html_e('Calories','wp-organic'); ?></span>
                                      <span><?php echo esc_attr($recipe_meta->_cms_recipe_calories); ?></span>
                               </span>

						</div>
						<a class="readmore btn btn-tiny" href="<?php echo get_the_permalink(); ?>"><?php esc_html_e('View recipe','wp-organic'); ?></a>
					</div>
				</div>

		</div>
</article>

<!-- #post -->
