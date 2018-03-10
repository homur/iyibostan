<?php
/**
 *
 * @name : Default
 * @package : CMSSuperHeroes
 * @author : Fox
 */
?>

<?php
$uniqid_id = uniqid('register-modal-');
$uniqid_id_login = uniqid('login-modal-');
?>

<div id="cshero-header-inner" class="header-4">
    <div id="cshero-header-wrapper">
        <div id="cshero-header" class="cshero-main-header <?php wp_organic_sticky_menu(); ?>">
            <div class="container">
                <div class="row">
                    <div id="header-main-right" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                       
                        <div id="cshero-header-navigation" class="<?php if ( !is_active_sidebar( 'header-default-left' ) ) { echo 'header-top-acitve'; } ?>">
                      
                            <div class="navigation-main">
                                <nav id="site-navigation" class="main-navigation">
                                    <?php
                                    
                                    $attr = array(
                                        'menu' =>wp_organic_menu_location(),
                                        'menu_class' => 'nav-menu menu-main-menu',
                                    );
                                    
                                    $menu_locations = get_nav_menu_locations();
                                    
                                    if(!empty($menu_locations['primary'])){
                                        $attr['theme_location'] = 'primary';
                                    }
                                    
                                    /* enable mega menu. */
                                    if(class_exists('HeroMenuWalker')){ $attr['walker'] = new HeroMenuWalker(); }
                                    
                                    /* main nav. */
                                    wp_nav_menu( $attr ); ?>
                                </nav>
                                
                            </div>
                        </div>
                    </div>
                    <div id="cshero-menu-mobile" class="collapse navbar-collapse">
                        <i class="cms-icon-menu pe-7s-menu"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>