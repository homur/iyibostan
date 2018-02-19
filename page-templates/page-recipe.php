<?php
get_header();

if(isset($_REQUEST['mode'])){
    $mode = $_REQUEST['mode'];
} else {
    $mode = 'grid';
}
switch ($mode) {
    case 'list':
        $class_grid = '';
        $class_list = 'active';
        break;

    default:
        $class_grid = 'active';
        $class_list = '';
        break;
}

$this_page_id = get_query_var('page_id');
?>
<form id="rf_filter" method="GET" action="">
<div class="cms-product-meta cms_recipe-meta clearfix">
    <div class="container">
        <div class="row">
            <div class="recipe-filter">
                <?php  wp_organic_recipe_filter();?>
            </div>
        </div>
    </div>

</div>
<div id="page-recipe" class="">
    <div class="container">
        <div class="row">
            <?php if ( is_active_sidebar( 'recipe-widget-area' ) ) : ?>
                <div id="rf-sidebar" class="col-xs-12 col-sm-4 col-md-3 col-lg-3">

                    <div id="sidebar" class="widget-area woocommerce-widget" role="complementary">
                        <?php dynamic_sidebar( 'recipe-widget-area' ); ?>
                    </div><!-- #secondary -->

                </div>
            <?php endif; ?>
            <section id="primary" class="<?php echo ( is_active_sidebar('recipe-widget-area') ) ? 'col-xs-12 col-sm-8 col-md-9 col-lg-9 sidebar-active' : 'col-xs-12 col-sm-12 col-md-12 col-lg-12 pr-full-width'; if ($mode=='list'){ echo ' layout-list';} ?>">
                    <?php  wp_organic_recipe_content();?>
            </section><!-- #primary -->

        </div>
    </div>
</div>
</form>
<?php get_footer(); ?>

