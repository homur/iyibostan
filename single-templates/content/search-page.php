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
        <div class="entry-header clearfix">
            <div class="entry-feature entry-feature-image">
                <?php the_post_thumbnail( 'full' ); ?>
                <div class="blog-date"><?php wp_organic_archive_detail_top(); ?></div>
            </div>
        </div>
        <!-- .entry-header -->

        <div class="entry-content">
            <div class="entry-meta"><?php wp_organic_archive_detail_bottom(); ?></div>
            <h2 class="entry-title ft-lo">
                <a href="<?php the_permalink(); ?>">
                    <?php
                    if(is_sticky()){
                        echo "<i class='fa fa-thumb-tack'></i>";
                    }
                    ?>
                    <?php the_title(); ?>
                </a>
            </h2>
            <div class="entry-content-inner">
                <?php echo wp_trim_words(get_the_excerpt(), 100,''); ?>
            </div>
            <?php
            wp_link_pages( array(
                'before'      => '<div class="pagination loop-pagination"><span class="page-links-title">' . esc_html__( 'Pages:','wp-organic') . '</span>',
                'after'       => '</div>',
                'link_before' => '<span class="page-numbers">',
                'link_after'  => '</span>',
            ) );
            ?>
            <div class="entry-readmore">
                <?php wp_organic_archive_readmore(); ?>
            </div>
        </div>

        <!-- .entry-content -->
    </div>
    <!-- .entry-blog -->
</article>
<!-- #post -->