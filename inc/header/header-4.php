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
<div id="cshero-header-top" class="header-top4">
    <div class="container">
        <div class="row">
            <div class="header-right-top col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="shop-cart">
                    <?php if ( is_active_sidebar( 'shop-cart' ) ) { ?>
                        <div class="cart-img"><i class="material-icons">shopping_cart</i></div>
                        <div class="cart-product">
                            <?php if(class_exists('woocommerce')){ ?>
                                <span class="couter_items"><?php echo sprintf (_n( '%d items', '%d items', WC()->cart->cart_contents_count, "wp-organic" ), WC()->cart->cart_contents_count ); ?>

                                    </span>
                                <span>- <?php echo WC()->cart->get_cart_total();?></span>
                            <?php } ?>
                        </div>
                        <div class="cart-info">
                            <div class="cart-info-inner">
                                <span class="arrow"></span>
                                <h3><i class="material-icons">shopping_basket</i> <?php esc_html_e('Your basket', 'wp-organic');?></h3>
                                <?php if ( class_exists( 'WC_Widget_Cart' ) ): ?>
                                    <div class="widget_shopping_cart">
                                        <div class="widget_shopping_cart_content">
                                            <?php woocommerce_mini_cart(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php if(function_exists('up_get_template_part')): ?>
                <div class="login-wrap">
                    <button type="button" class="button-login progress-button show-login-form button-signin-form" data-toggle="modal" data-target="#<?php echo esc_attr($uniqid_id_login); ?>">
                        <span class="content"><?php esc_html_e('Sign in', 'wp-organic');?></span>
                    </button>
                    <button type="button" class="btn-register show-signin-form button-signup-form" data-toggle="modal" data-target="#<?php echo esc_attr($uniqid_id); ?>">
                        <?php esc_html_e('Sign up','wp-organic');?>
                    </button>
                </div>
                <div class="modal fade form-login" id="<?php echo esc_attr($uniqid_id_login); ?>" tabindex="-1" >
                    <div class="modal-dialog" role="document">
                        <div class="modal-content clearfix modal-content-login" style="background-image:url(<?php wp_organic_background_signin();?>);" >
                            <div class="bg-overlay"></div>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="material-icons">close</i></span></button>
                                <?php if(!is_user_logged_in()): ?>
                                <h4 class="modal-title" id="myModalLabel1"><span><?php esc_html_e('Sign In', 'wp-organic');?></span></h4>
                               <p> <span><?php esc_html_e('Dont have an account?','wp-organic');?></span> <a class="switch_to_sign_up"> <?php esc_html_e('Sign Up','wp-organic');?></a></p>
                                <?php endif; ?>
                            </div>
                            <div class="modal-body">

                                <?php  echo do_shortcode('[user-press layout="" form_type="login" is_logged="profile"]'); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade form-register" id="<?php echo esc_attr($uniqid_id); ?>" tabindex="-1" >
                    <div class="modal-dialog" role="document">
                        <div class="modal-content clearfix">
                            <div class="modal-content-child modal-content-left" style="background-image:url(<?php wp_organic_background_signup();?>);">
                                <div class="bg-overlay"></div>
                                <div class="modal-content-left-inner">

                                    <h4 class="modal-content-left-title"><span><?php esc_html_e('Sign Up', 'wp-organic');?></span></h4>
                                    <p> <?php esc_html_e('Sign up for all the latest news, offers and to check-out even faster.','wp-organic');?></p>
                                    <img alt="" src="<?php wp_organic_logo_signup();?>">
                                </div>

                            </div>
                            <div class="modal-content-child modal-content-right modal-content-login" style="background-image:url(<?php wp_organic_background_signin();?>);">
                                <div class="bg-overlay"></div>
                                <div class="modal-header">
                                    <!-- Modal -->
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="material-icons">close</i></span></button>
                                    <h4 class="modal-title" id="myModalLabel"><span><?php esc_html_e('Sign Up', 'wp-organic');?></span></h4>
                                    <p> <span><?php esc_html_e('Have an account? ','wp-organic');?></span> <a  class="switch_to_login"> <?php esc_html_e('Sign In','wp-organic');?></a></p>

                                </div>
                                <div class="modal-body">
                                    <p> <?php esc_html_e('Sign up using your email address','wp-organic');?></p>
                                    <?php up_get_template_part('default/form', 'register'); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>
<div id="cshero-header-inner" class="header-4">
    <div id="cshero-header-wrapper">
        <div id="cshero-header" class="cshero-main-header <?php wp_organic_sticky_menu(); ?>">
            <div class="container">
                <div class="row">
                    <div id="cshero-header-logo" class="col-xs-9 col-sm-4 col-md-3 col-lg-3">

                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img alt="" src="<?php wp_organic_show_logo();?>">

                        </a>
                    </div>
                    <div id="header-main-right" class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                       
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