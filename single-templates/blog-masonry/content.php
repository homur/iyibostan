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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-blog <?php echo has_post_thumbnail() ? ' has-feature-img' : ' no-feature-img' ; ?>">
		<div class="entry-feature entry-feature-image">
			<?php the_post_thumbnail( 'wp_organic_3columns' ); ?>
		</div>
		<div class="entry-header clearfix">
			<h1 class="entry-title">
		    	<a href="<?php the_permalink(); ?>">
		    		<?php
			    		if(is_sticky()){
			                echo "<i class='fa fa-thumb-tack'></i>";
			            }
			    	?>
		    		<?php the_title(); ?>
		    	</a>
		    </h1>
		    <div class="entry-time">
                <?php the_time('F d, Y');?>
            </div>
		</div>
		<!-- .entry-header -->
		
		<div class="entry-content">

			<div class="entry-content-inner">
				<?php echo substr(get_the_excerpt(), 0,100); ?>...
			</div>

		</div>

		<!-- .entry-content -->
	</div>
	<!-- .entry-blog -->
</article>
<!-- #post -->
