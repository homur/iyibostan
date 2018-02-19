<?php
/**
 * CMS Theme functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

/**
 * load font-awesome icons class.
 */
require_once get_template_directory() . '/inc/libs/font-awesome.php';

/* Add base functions */
require( get_template_directory() . '/inc/base.class.php' );

/* Add ReduxFramework. */
require( get_template_directory() . '/inc/ReduxCore/framework.php' );

/* Add theme options. */
require( get_template_directory() . '/inc/options/functions.php' );

/* Add theme meta tax. */
require( get_template_directory() . '/inc/taxonomy-meta/taxonomy.php' );

/**
 * Custom params & remove VC Elements.
 * 
 * @author FOX
 */
add_action('vc_after_init', 'wp_organic_vc_after_init');
function wp_organic_vc_after_init(){
    
    require( get_template_directory() . '/vc_params/vc_rows.php' );
    require( get_template_directory() . '/vc_params/vc_column.php' );
    require( get_template_directory() . '/vc_params/vc_column.php' );
    require( get_template_directory() . '/vc_params/vc_pie.php' );
    require( get_template_directory() . '/vc_params/vc_tta_section.php' );
	require( get_template_directory() . '/vc_params/cms_custom_pagram_vc.php' );
    vc_remove_element( "vc_button" );
    vc_remove_element( "vc_button2" );
    vc_remove_element( "vc_cta_button" );
    vc_remove_element( "vc_cta_button2" );
    vc_remove_element( "vc_cta" );
}

/**
 * Add new elements for VC
 * 
 * @author FOX
 */
add_action('vc_before_init', 'wp_organic_vc_elements');

function wp_organic_vc_elements(){
    
    if(!class_exists('CmsShortCode'))
        return ;
    
    require( get_template_directory() . '/inc/elements/button/cms_button.php' );
    require( get_template_directory() . '/inc/elements/heading/cms_heading.php' );
    require( get_template_directory() . '/inc/elements/social/cms_social.php' );
    require( get_template_directory() . '/inc/elements/googlemap/cms_googlemap.php' );
	require( get_template_directory() . '/vc_params/vc_custom_heading.php' );
	require( get_template_directory() . '/inc/elements/cta/cms_cta.php' );
	require( get_template_directory() . '/inc/elements/step/cms_step.php' );
	require( get_template_directory() . '/inc/elements/portfolio/cms_portfolio.php' );
	require( get_template_directory() . '/inc/elements/gallery/cms_gallery.php' );
	require( get_template_directory() . '/inc/elements/images_carousel/cms_images_carousel.php' );
}


/* Add SCSS */
if(!class_exists('scssc')){
    require( get_template_directory() . '/inc/libs/scss.inc.php' );
}

/**
 * Admin Loader.
 * require admin files.
 * 
 * @author Fox
 */
if(is_admin()){
    /* Add Meta Core Options */
    if(!class_exists('CsCoreControl')){
        
        /* add mete core */
        require( get_template_directory() . '/inc/metacore/core.options.php' );
        
        /* add meta options */
        require( get_template_directory() . '/inc/options/meta.options.php' );
    }
	/**
	 * Include the TGM_Plugin_Activation class.
	 */
	require( get_template_directory() . '/inc/libs/class-tgm-plugin-activation.php' );
    /* tmp plugins. */
    require( get_template_directory() . '/inc/options/require.plugins.php' );
    /* add presets */
    require( get_template_directory() . '/inc/options/presets.php' );
}

/* Add Template functions */
require( get_template_directory() . '/inc/template.functions.php' );

/* Static css. */
require( get_template_directory() . '/inc/dynamic/static.css.php' );

/* Dynamic css*/
require( get_template_directory() . '/inc/dynamic/dynamic.css.php' );

/* Add widgets */
require( get_template_directory() . '/inc/widgets/social.php' );
require( get_template_directory() . '/inc/widgets/recent-posts.php' );
require( get_template_directory() . '/inc/widgets/feature-posts.php' );
require( get_template_directory() . '/inc/widgets/cart_search.php' );
require( get_template_directory() . '/inc/post_favorite/post_favorite.php' );
require( get_template_directory() . '/inc/widgets/recipe-nationality.php' );
require( get_template_directory() . '/inc/widgets/recipe-cooking-time.php' );

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 625;

/* Add mega menu */
if(!class_exists('HeroMenuWalker')){
    require( get_template_directory() . '/inc/megamenu/mega-menu.php' );
}


/*
 * Limit Words
 */
if (!function_exists('wp_organic_limit_words')) {
	function wp_organic_limit_words($string, $word_limit) {
	    
		$words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
	}
}

/**
 * WP Organic setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * WP Organic supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since WP Organic 1.0
 */
function wp_organic_setup() {
	/*
	 * Makes WP Organic available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on WP Organic, use a find and replace
	 * to change 'wp-organic' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wp-organic', get_template_directory() . '/languages' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css' ) );

	// Adds title tag
	add_theme_support( "title-tag" );

	// Add woocommerce
	add_theme_support('woocommerce');
	
	// Adds custom header
	add_theme_support( 'custom-header' );
	
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'video' , 'gallery',) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', esc_html__( 'Primary Menu', 'wp-organic' ) );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	add_image_size('wp_organic_3columns', 300, 200, true);
	add_image_size('wp_organic_blog_carousel', 600, 482, true);
	add_image_size('wp_organic_product_listing', 261, 204, true);
	add_image_size('wp_organic_recipe',225, 280, true);
	add_image_size('wp_organic_blog_listing2',360,360, true);
	add_image_size('wp_organic_blog_block',940,271, true);
	add_image_size('wp_organic_portfolio-2height',261,382, true);
	add_image_size('wp_organic_portfolio-2width',554,176, true);
	add_image_size('wp_organic_portfolio-width-height',264,176, true);
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'wp_organic_setup' );

/**
 * Get meta data.
 * @author Fox
 * @return mixed|NULL
 */
function wp_organic_meta_data(){
    global $post, $wp_organic_meta;
    
    if(!isset($post->ID)) return ;
    
    $wp_organic_meta = json_decode(get_post_meta($post->ID, '_cms_meta_data', true));
    
    if(empty($wp_organic_meta)) return ;
    
    foreach ($wp_organic_meta as $key => $meta){
        $wp_organic_meta->$key = rawurldecode($meta);
    }
}
add_action('wp', 'wp_organic_meta_data');

/**
 * Get post meta data.
 * @author Fox
 * @return mixed|NULL
 */
function wp_organic_post_meta_data($id=0){
    global $post;
    
    if(!$id && isset($post->ID)) $id=$post->ID;
    
    $post_meta = json_decode(get_post_meta($id, '_cms_meta_data', true));
    
    if(empty($post_meta)) return null;
    
    foreach ($post_meta as $key => $meta){
        $post_meta->$key = rawurldecode($meta);
    }
    
    return $post_meta;
}

/*
 * Convert HEX to GRBA
*/
if(!function_exists('wp_organic_hex_to_rgb')){
    function wp_organic_hex_to_rgb($hex,$opacity = 1) {
    	$hex = str_replace("#",null, $hex);
    	$color = array();
    	if(strlen($hex) == 3) {
    		$color['r'] = hexdec(substr($hex,0,1).substr($hex,0,1));
    		$color['g'] = hexdec(substr($hex,1,1).substr($hex,1,1));
    		$color['b'] = hexdec(substr($hex,2,1).substr($hex,2,1));
    		$color['a'] = $opacity;
    	}
    	else if(strlen($hex) == 6) {
    		$color['r'] = hexdec(substr($hex, 0, 2));
    		$color['g'] = hexdec(substr($hex, 2, 2));
    		$color['b'] = hexdec(substr($hex, 4, 2));
    		$color['a'] = $opacity;
    	}
    	$color = "rgba(".implode(', ', $color).")";
    	return $color;
    }
}

/**
 * Enqueue scripts and styles for front-end.
 * @author Fox
 * @since CMS SuperHeroes 1.0
 */
function wp_organic_scripts_styles() {
    
	global $smof_data, $wp_styles,$wp_organic_meta;
	
	/** theme options. */
	$script_options = array(
	    'menu_sticky'=> $smof_data['menu_sticky'],
	    'back_to_top'=> $smof_data['footer_botton_back_to_top']
	);
	
	/* Adds JavaScript Bootstrap. */
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '3.3.2');
	
	/* Add parallax plugin. */
	wp_enqueue_script('parallax', get_template_directory_uri() . '/assets/js/jquery.parallax-1.1.3.js', array( 'jquery' ), '1.1.3', true);
	/* Add jscroll plugin */
	wp_enqueue_script('jscroll', get_template_directory_uri() . '/assets/js/jquery.jscroll.min.js', array( 'jquery' ), '1.1.3', true);
	wp_enqueue_script('masonry', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array( 'jquery' ), '1.0.0', true);
	wp_enqueue_script('placeholder', get_template_directory_uri() . '/assets/js/placeholders.min.js', array( 'jquery' ), '1.0.0', true);
	wp_enqueue_script('arctext', get_template_directory_uri() . '/assets/js/jquery.arctext.js', array( 'jquery' ), '1.0.0', true);
	wp_enqueue_script('arctextjs',get_template_directory_uri() . '/assets/js/jsapi.js', array( 'jquery' ), '1.0.0', true);
	/* OLW Carousel */
	wp_enqueue_script('olw-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '1.0.0', true);
	/* Add smoothscroll plugin */
	if($smof_data['smoothscroll']){
	   wp_enqueue_script('smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.min.js', array( 'jquery' ), '1.0.0', true);
	}

	/* Add One Page plugin. */
	if(is_page() && isset($wp_organic_meta->_cms_one_page) && $wp_organic_meta->_cms_one_page){
	    wp_enqueue_script('jquery.singlePageNav', get_template_directory_uri() . '/assets/js/jquery.singlePageNav.js', array( 'jquery' ), '1.0.0', true);
	     
	    if(!empty($wp_organic_meta->_cms_one_page_easing)){
	        wp_enqueue_script('jquery-effects-core');
	        $script_options['one_page_easing'] = !empty($wp_organic_meta->_cms_one_page_easing) ? $wp_organic_meta->_cms_one_page_easing : 'swing';
	    }
	     
	    $script_options['one_page'] = true;
	    $script_options['one_page_speed'] = !empty($wp_organic_meta->_cms_one_page_speed) ? $wp_organic_meta->_cms_one_page_speed : 1000;
	}
	
	
	/* Loads awesome stylesheet. */
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.3.0');

	/* Loads fonts stylesheet. */
	wp_enqueue_style('cmssuperheroes-fonts', get_template_directory_uri() . '/assets/css/fonts.css');

	/* Loads animations stylesheet. */
	wp_enqueue_style('animations', get_template_directory_uri() . '/assets/css/animations.css');
	/* Loads Font Ionicons. */
	wp_enqueue_style('font-ionicons', get_template_directory_uri() . '/assets/css/ionicons.min.css', array(), '2.0.1');

	/* Loads Pe Icon. */
	wp_enqueue_style('pe-icon', get_template_directory_uri() . '/assets/css/pe-icon-7-stroke.css', array(), '1.0.1');
	
	/* Loads Pe Icon. */
	wp_enqueue_style('elegant-icon', get_template_directory_uri() . '/assets/css/elegant-icon.css', array(), '1.0.1');
	/*testemonial css*/
	wp_enqueue_style('default-testimonial', get_template_directory_uri() . '/assets/css/default.css', array(), '1.0.1');
	wp_enqueue_style('component', get_template_directory_uri() . '/assets/css/component.css', array(), '1.0.1');
	/* Slick Carousel*/
	wp_enqueue_style('slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0.1');
	wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), '1.0.1');
	/*material icon*/
	wp_enqueue_style('material-design-iconic-font', get_template_directory_uri() . '/assets/css/material-design-iconic-font.min.css', array(), '1.0.1');
	/* Olw Carousel */
	wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), '1.0.1');
	wp_enqueue_style('owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.css', array(), '1.0.1');



	/** --------------------------custom------------------------------- */
	
	/* Add main.js */
	wp_register_script('wp-organic-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0.0', true);
	wp_localize_script('wp-organic-main', 'CMSOptions', $script_options);
	wp_enqueue_script('wp-organic-main');
	/* Add menu.js */
    wp_enqueue_script('wp-organic-menu', get_template_directory_uri() . '/assets/js/menu.js', array( 'jquery' ), '1.0.0', true);
    wp_register_script('progressCircle', get_template_directory_uri() . '/assets/js/process_cycle.js', array( 'jquery' ), '1.0.0', true);
    wp_register_script('vc_pie_custom', get_template_directory_uri() . '/assets/js/vc_pie_custom.js', array( 'jquery' ), '1.0.0', true);
	/* OLW Carousel */
	/* Magnific Popup */
    wp_enqueue_script('magnific-image', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), '1.0.0', true);
    /* animation column */
    wp_enqueue_script('animation-column', get_template_directory_uri() . '/assets/js/animation-column.js', array( 'jquery' ), '1.0.0', true);
    /* Same Height */
    wp_enqueue_script('matchHeight', get_template_directory_uri() . '/assets/js/jquery.matchHeight-min.js', array( 'jquery' ), '1.0.0', true);
    wp_enqueue_script('sameheight', get_template_directory_uri() . '/assets/js/sameheight.js', array( 'jquery' ), '1.0.0', true);
    /* Style Scroll */
    wp_enqueue_script('scroll-bar', get_template_directory_uri() . '/assets/js/enscroll.js', array( 'jquery' ), '1.0.0', true);
	/*js testimonial*/
	wp_enqueue_script('modernizr-custom', get_template_directory_uri() . '/assets/js/modernizr.custom.js', array( 'jquery' ), '1.0.0', true);
	 wp_enqueue_script('jquery_cbpQTRotator', get_template_directory_uri() . '/assets/js/jquery.cbpQTRotator.js', array( 'jquery' ), '1.0.0', true);
	/* Slick Carousel*/
	wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), '1.0.0', true);

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

    /*------------------------------------- Stylesheet ---------------------------------------*/
	
	/** --------------------------libs--------------------------------- */
	
	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.2');
	
	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.3.0');
	
	/** --------------------------custom------------------------------- */
	/* Popup Images Gallery */
	wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0.1');
	
	/* Loads our main stylesheet. */
	wp_enqueue_style( 'wp-organic-style', get_stylesheet_uri(), array( 'bootstrap' ));

	/* Loads the Internet Explorer specific stylesheet. */
	wp_enqueue_style( 'wp_medico-ie', get_template_directory_uri() . '/assets/css/ie.css', array( 'wp-organic-style' ), '20121010' );
	$wp_styles->add_data( 'wp_medico-ie', 'conditional', 'lt IE 9' );
	
    wp_enqueue_style('wp-organic-static', get_template_directory_uri() . "/assets/css/static.css", array( 'wp-organic-style' ), '1.0.0');
	/* Load iconfont*/
	wp_enqueue_style('icons-fonts', get_template_directory_uri() . '/assets/css/elegant-icon.css', array( 'wp-organic-style' ), '1.0.0');
    //var_dump($static_css);
}
add_action( 'wp_enqueue_scripts', 'wp_organic_scripts_styles' );


/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Fox
 */
function wp_organic_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Main Sidebar 1', 'wp-organic' ),
		'id' => 'sidebar-1',
		'description' => esc_html__( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'wp-organic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Main Sidebar 2', 'wp-organic' ),
		'id' => 'sidebar-2',
		'description' => esc_html__( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'wp-organic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Main Sidebar 3', 'wp-organic' ),
		'id' => 'sidebar-3',
		'description' => esc_html__( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'wp-organic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title"><span>',
		'after_title' => '</span></h5>',
	) );


	register_sidebar( array(
		'name' => esc_html__( 'Header shop cart ', 'wp-organic' ),
		'id' => 'shop-cart',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Shop Cart', 'wp-organic' ),
		'id' => 'shop-cart',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer Top Full column ', 'wp-organic' ),
		'id' => 'footer-top-5',
		'description' => esc_html__( 'For Footer layout1', 'wp-organic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer Top - Column 1 Footer 1 ', 'wp-organic' ),
		'id' => 'footer-top-6',
		'description' => esc_html__( 'For Footer layout1 and layout2', 'wp-organic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer Top - Column 2 Footer 1 ', 'wp-organic' ),
		'id' => 'footer-top-7',
		'description' => esc_html__( 'For Footer layout1 and layout2', 'wp-organic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer Top - Column 3  Footer 1 ', 'wp-organic' ),
		'id' => 'footer-top-8',
		'description' => esc_html__( 'For Footer layout1 and layout2', 'wp-organic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer Top -  Bottom Footer 1 ', 'wp-organic' ),
		'id' => 'footer-top-9',
		'description' => esc_html__( 'For Footer layout1 and layout2', 'wp-organic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer Top - Column 1  Footer 3 ', 'wp-organic' ),
		'id' => 'footer-top-10',
		'description' => esc_html__( 'For Footer layout3 and layout4', 'wp-organic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer Top - Column 2  Footer 3 ', 'wp-organic' ),
		'id' => 'footer-top-11',
		'description' => esc_html__( 'For Footer layout3 and layout4', 'wp-organic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer Top - Column 3  Footer 3 ', 'wp-organic' ),
		'id' => 'footer-top-12',
		'description' => esc_html__( 'For Footer layout3 and layout4', 'wp-organic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer Top - Column 4  Footer 3 ', 'wp-organic' ),
		'id' => 'footer-top-13',
		'description' => esc_html__( 'For Footer layout3 and layout4', 'wp-organic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer Top - Full Column  Footer 3 ', 'wp-organic' ),
		'id' => 'footer-top-14',
		'description' => esc_html__( 'For Footer layout3 and layout4', 'wp-organic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar(array(
		'name' => 'Newsletter Sidebar',
		'id' => 'newsletter-widget-area',

		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title"><span>',
		'after_title' => '</span></h3>',
	));
	register_sidebar( array(
		'name' => esc_html__( 'Sidebar Shop', 'wp-organic' ),
		'id' => 'woocommerce-widget-area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="wg-wrap"><div class="wg-wrap-inner">',
		'after_widget' => '</div></div></aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Sidebar Recipe', 'wp-organic' ),
		'id' => 'recipe-widget-area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="wg-wrap"><div class="wg-wrap-inner">',
		'after_widget' => '</div></div></aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Widget Search Product', 'wp-organic' ),
		'id' => 'woocommerce-widget-search',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'wp_organic_widgets_init' );

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since 1.0.0
 */
function wp_organic_page_menu_args( $args ) {
    if ( ! isset( $args['show_home'] ) )
        $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'wp_organic_page_menu_args' );

/**
 * Add field subtitle to post.
 * 
 * @since 1.0.0
 */
function wp_organic_add_subtitle_field(){
    global $post, $cms_meta;
    
    /* get current_screen. */
    $screen = get_current_screen();
    
    /* show field in post. */
    if(in_array($screen->id, array('post'))){
        
        /* get value. */
        $value = get_post_meta($post->ID, 'post_subtitle', true);
        
        /* html. */
        echo '<div class="subtitle"><input type="text" name="post_subtitle" value="'.esc_attr($value).'" id="subtitle" placeholder = "'.esc_html__('Subtitle', 'wp-organic').'" style="width: 100%;margin-top: 4px;"></div>';
    }
}

add_action( 'edit_form_after_title', 'wp_organic_add_subtitle_field' );

/**
 * Save custom theme meta. 
 * 
 * @since 1.0.0
 */
function wp_organic_save_meta_boxes($post_id) {
    
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    /* update field subtitle */
    if(isset($_POST['post_subtitle'])){
        update_post_meta($post_id, 'post_subtitle', $_POST['post_subtitle']);
    }
}

add_action('save_post', 'wp_organic_save_meta_boxes');

/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since 1.0.0
 */
function wp_organic_paging_nav() {
    // Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 1,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => '<i class="material-icons">keyboard_backspace</i>',
			'next_text' => '<i class="material-icons">arrow_forward</i>',

	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation clearfix" role="navigation">
			<div class="pagination loop-pagination">
				<?php echo ''.$links; ?>
			</div><!-- .pagination -->
	</nav><!-- .navigation -->
	<?php
	endif;
}

/**
* Display navigation to next/previous post when applicable.
*
* @since 1.0.0
*/
function wp_organic_post_nav() {
    global $post;
    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
    <?php
    $next_post = get_next_post();
    $previous_post = get_previous_post();
    if( !empty($next_post) )
    {
    ?>
	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links row clearfix">
			<div class="nav-link-prev col-sm-6 col-xs-12 text-left">
				<?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
					<a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>">
						<i class="fa fa-long-arrow-left br-2px"></i>
						<div class="nav-inner">
				  			<span><?php esc_html_e('Previous Post', 'wp-organic') ?></span>
					  		<h5><?php echo get_the_title( $previous_post->ID ); ?></h5>
					  	</div>
				  	</a>
				<?php } ?>
			</div>
			<div class="nav-link-next col-sm-6 col-xs-12 text-right">
				<?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
					<a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
						<i class="fa fa-long-arrow-right br-2px"></i>
						<div class="nav-inner">
				  			<span><?php esc_html_e('Next Post', 'wp-organic') ?></span>
					  		<h5><?php echo get_the_title( $next_post->ID ); ?></h5>
					  	</div>
				  	</a>
				<?php } ?>
			</div>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
    }
}
/* End Post nav */

add_filter('cms-shorcode-list', 'wp_organic_shortcodes_list');
function wp_organic_shortcodes_list(){
	$wp_organic_shortcodes_list = array(
		'cms_carousel',
		'cms_grid',
		'cms_fancybox_single',
		'cms_counter_single',
		'cms_progressbar',
		);

	return $wp_organic_shortcodes_list;
}
/* Add Custom Comment */
function wp_organic_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
<<?php echo esc_attr($tag) ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
<?php if ( 'div' != $args['style'] ) : ?>
<div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
<?php endif; ?>
<div class="comment-author-image vcard">
	<?php echo get_avatar( $comment, 109 ); ?>
</div>
<?php if ( $comment->comment_approved == '0' ) : ?>
	<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.' , 'wp-organic'); ?></em>
<?php endif; ?>
<div class="comment-main">
	<div class="comment-meta commentmetadata">
		<span class="comment-author"><?php echo get_comment_author_link(); ?></span>
		<span class="comment-date">
			<?php echo get_comment_date();?>
			<span class="time"> - <?php echo get_comment_date('g:iA'); ?></span>
		
		</span>
	</div>
	<div class="comment-content">
		<?php comment_text(); ?>
		<div class="reply">
		<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
	</div>
</div>
<?php if ( 'div' != $args['style'] ) : ?>
</div>
<?php endif; ?>
<?php
}
/* End Custom Comment */

/* Add Images Category */
add_action( 'woocommerce_archive_description', 'wp_organic_woocommerce_category_image', 2 );
function wp_organic_woocommerce_category_image() {
    if ( is_product_category() ){
	    global $wp_query;
	    $cat = $wp_query->get_queried_object();
	    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
	    if ( $image ) {
		    echo '<img class="woo-image-categries" src="' . esc_url($image) . '" alt="" />';
		}
	}
}

/* Replace Stylesheet */
function wp_organic_validate_stylesheet($src) {
	if(strstr($src,'font-awesome-css')|| strstr($src,'cms-icon-rticon-css') || strstr($src,'mediaelement-css') || strstr($src,'wp-mediaelement-css') ){
		return str_replace('rel', 'property="stylesheet" rel', $src);
	}
	else{
		return $src;
	}
}
add_filter('style_loader_tag', 'wp_organic_validate_stylesheet');

/**
 * Display navigation to next/previous comments when applicable.
 *
 * @since 1.0.0
 */
function wp_organic_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'wp-organic' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'wp-organic' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'wp-organic' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}

/* Post view */
function wp_organic_post_views($post_ID) {
 
    //Set the name of the Posts Custom Field.
    $count_key = 'post_views_count'; 
     
    //Returns values of the custom field with the specified key from the specified post.
    $count = get_post_meta($post_ID, $count_key, true);
    
    $count = $count ? (int)$count : 0 ;
        
    if(is_single()){
    	
    	$count++;
    	
    	update_post_meta($post_ID, $count_key, $count);
    	
    }
    
    return $count;
}

/**
 * Set home page.
 *
 * get home title and update options.
 *
 * @return Home page title.
 * @author FOX
 */
function wp_organic_set_home_page(){

	$home_page = 'Home';

	$page = get_page_by_title($home_page);

	if(!isset($page->ID))
		return ;
		 
		update_option('show_on_front', 'page');
		update_option('page_on_front', $page->ID);
}

add_action('cms_import_finish', 'wp_organic_set_home_page');

/**
 * Set menu locations.
 *
 * get locations and menu name and update options.
 *
 * @return string[]
 * @author FOX
 */
function wp_organic_set_menu_location(){

	$setting = array(
			'Main Menu' => 'primary'
	);

	$navs = wp_get_nav_menus();

	$new_setting = array();

	foreach ($navs as $nav){

		if(!isset($setting[$nav->name]))
			continue;

			$id = $nav->term_id;
			$location = $setting[$nav->name];

			$new_setting[$location] = $id;
	}

	set_theme_mod('nav_menu_locations', $new_setting);
}

add_action('cms_import_finish', 'wp_organic_set_menu_location');

/**
 * Custom params & remove VC Elements.
 *
 * @author FOX
 */

/** Remove param custom heading **/

add_action('vc_after_init', 'wp_organic_cms_remove_some_param');
	function wp_organic_cms_remove_some_param() {
	}
/*add option for all widget*/

//Add input fields(priority 5, 3 parameters)
add_action('in_widget_form', 'wp_organic_hw_in_widget_form',5,3);
//Callback function for options update (priorität 5, 3 parameters)
add_filter('widget_update_callback', 'wp_organic_hw_in_widget_form_update',5,3);

function wp_organic_hw_in_widget_form($t,$return,$instance){
	global $enable_backgound_title;
   $instance = wp_parse_args( (array) $instance, array( 'enable_backgound_title'=>'no_background') );
     if ( !isset($instance['enable_backgound_title']) )
        $instance['enable_backgound_title'] = null;
   ?>
   
    <p>
        <label>Enable background title</label>
        <select id="<?php echo esc_attr($t->get_field_id('enable_backgound_title')); ?>" name="<?php echo esc_attr($t->get_field_name('enable_backgound_title')); ?>">
            <option <?php selected($instance['enable_backgound_title'], 'no_background');?> value="no_background">No</option>
             <option <?php selected($instance['enable_backgound_title'], 'has_background');?> value="has_background">Yes</option>
            
        </select>
    </p>
   
    <?php
    $retrun = null;
    return array($t,$return,$instance);
}
function wp_organic_hw_in_widget_form_update($instance, $new_instance, $old_instance){
  
    $instance['enable_backgound_title'] = $new_instance['enable_backgound_title'];
  
    return $instance;

}
add_filter('dynamic_sidebar_params', 'wp_organic_hw_dynamic_sidebar_params');
function wp_organic_hw_dynamic_sidebar_params($params){
    global $wp_registered_widgets,$enable_backgound_title;
    $widget_id = $params[0]['widget_id'];
    $widget_obj = $wp_registered_widgets[$widget_id];
    $widget_opt = get_option($widget_obj['callback'][0]->option_name);
    $widget_num = $widget_obj['params'][0]['number'];
             $enable_backgound_title = isset($widget_opt[$widget_num]['enable_backgound_title'])?$widget_opt[$widget_num]['enable_backgound_title']:'no_background';
            $params[0]['before_widget'] = preg_replace('/class="/', 'class="'.$enable_backgound_title.' clearfix ',  $params[0]['before_widget'], 1);
    
   
    return $params;
}
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action( 'woocommerce_checkout_order_checkout_payment', 'woocommerce_checkout_payment', 20 );
add_action( 'woocommerce_after_shop_loop_item', 'wp_organic_woocommerce_product_loop_tags', 5 );

function wp_organic_woocommerce_product_loop_tags() {
	global $post, $product;

	$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

	echo wc_get_product_tag_list ( $post->ID,' / ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'wp-organic' ) . ' ', '</span>' );
}
/* Woo commerce function */
if(class_exists('WooCommerce')){
	/**
	 * Get current users preference
	 * @return int
	 */
	function wp_organic_products_per_page(){

		global $smof_data, $woocommerce;

		$default = $smof_data['product_per_page'];
		$count = $default;
		$options = wp_organic_products_per_page_options();

		// capture form data and store in session
		if(isset($_POST['wp-organic-woocommerce-products-per-page'])){

			// set products per page from dropdown
			$products_max = intval($_POST['wp-organic-woocommerce-products-per-page']);
			if($products_max != 0 && $products_max >= -1){

				if(is_user_logged_in()){

					$user_id = get_current_user_id();
					$limit = get_user_meta( $user_id, '_product_per_page', true );

					if(!$limit){
						add_user_meta( $user_id, '_product_per_page', $products_max);
					}else{
						update_user_meta( $user_id, '_product_per_page', $products_max, $limit);
					}
				}

				$woocommerce->session->wp_organic_product_per_page = $products_max;
				return $products_max;
			}
		}

		// load product limit from user meta
		if(is_user_logged_in() && !isset($woocommerce->session->wp_organic_product_per_page)){

			$user_id = get_current_user_id();
			$limit = get_user_meta( $user_id, '_product_per_page', true );

			if(array_key_exists($limit, $options)){
				$woocommerce->session->wp_organic_product_per_page = $limit;
				return $limit;
			}
		}

		// load product limit from session
		if(isset($woocommerce->session->wp_organic_product_per_page)){

			// set products per page from woo session
			$products_max = intval($woocommerce->session->wp_organic_product_per_page);
			if($products_max != 0 && $products_max >= -1){
				return $products_max;
			}
		}
		return $count;

	}
	add_filter('loop_shop_per_page','wp_organic_products_per_page');

	/**
	 * Fetch list of avaliable options
	 * @return array
	 */
	function wp_organic_products_per_page_options(){
		global $smof_data;

		$default = $smof_data['product_per_page'];
		$cms_products_perpage = array(

			$default => esc_html__('Default', 'wp-organic'),
			'3' => esc_html__('3 Products / page', 'wp-organic'),
			'6' => esc_html__('6 Products / page', 'wp-organic'),
			'9' => esc_html__('9 Products / page', 'wp-organic'),
			'12' => esc_html__('12 Products / page', 'wp-organic'),
			'15' => esc_html__('15 Products / page', 'wp-organic'),
			'18' => esc_html__('18 Products / page', 'wp-organic'),
			'21' => esc_html__('21 Products / page', 'wp-organic'),
			'24' => esc_html__('24 Products / page', 'wp-organic')
		);
		$options = apply_filters( 'wp_organic_products_per_page', $cms_products_perpage);
		return $options;
	}

	/**
	 * Display dropdown form to change amount of products displayed
	 * @return void
	 */
	function wp_organic_woocommerce_products_per_page(){
		global $wp_query;
		$paged    = max( 1, $wp_query->get( 'paged' ) );
		$total    = $wp_query->found_posts;
		$options = wp_organic_products_per_page_options();
		$current_value = wp_organic_products_per_page();
		?>
		<form action="" method="POST" class="woocommerce-products-per-page">
			<label><select name="wp-organic-woocommerce-products-per-page"  class="filter-products-per-page" onchange="this.form.submit()">
					<?php foreach($options as $value => $name):
						if ($value == $current_value){
							$label = $name;
						} else {
							$label = $name;
						}
						?>
						<?php if(ceil($total/$value) >= $paged): ?>
						<option value="<?php echo esc_attr($value); ?>" <?php selected($value, $current_value); ?>><?php echo esc_html($label); ?></option>
					<?php endif; ?>
					<?php endforeach; ?>
				</select></label>
		</form>
		<?php
	}
}

add_filter( 'woocommerce_product_add_to_cart_text', 'wp_organic_woo_archive_custom_cart_button_text' );    // 2.1 +

function wp_organic_woo_archive_custom_cart_button_text() {
		return __( 'Add', 'wp-organic' );
}
add_filter( 'woocommerce_product_tabs', 'wp_organic_woo_rename_tabs', 98 );

function wp_organic_woo_rename_tabs( $tabs ) {

	global $product;

	if( $product->has_attributes() || $product->has_dimensions() || $product->has_weight() ) { // Check if product has attributes, dimensions or weight
		$tabs['additional_information']['title'] = esc_attr__( 'Additional Info', 'wp-organic' );	// Rename the additional information tab
	}

	return $tabs;

}
/**
 * show rating product in file vc template
 */
add_action('woocommerce_after_shop_loop_item', 'wp_organic_get_star_rating' );
function wp_organic_get_star_rating()
{
	global $woocommerce, $product;
	$average = $product->get_average_rating();

	echo '<div class="star-rating"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong class="rating">'.$average.'</strong> '.__( 'out of 5', 'wp-organic' ).'</span></div>';
}

/**
 * recipe_templates
 */

function wp_organic_recipe_page_templates($templates){
	global $smof_data, $post;

	if(isset($post->ID) && isset($smof_data['recipe_page']) && ($post->ID == $smof_data['recipe_page']))
		return get_template_directory() . '/page-templates/page-recipe.php';

	return $templates;
}

add_filter( "page_template", "wp_organic_recipe_page_templates" );

function wp_organic_recipe_archive_templates($templates){

	if(get_post_type() == 'recipe')
		return get_template_directory() . '/page-templates/page-recipe.php';

	return $templates;
}

add_filter( "archive_template", "wp_organic_recipe_archive_templates" );
add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_single_excerpt', 5);
/**
 * Ajax update cart total number
 * */
add_filter( 'woocommerce_add_to_cart_fragments', 'wp_organic_woocommerce_header_add_to_cart_fragment' );
function wp_organic_woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
	<span class="couter_items"><?php echo sprintf (_n( '%d items', '%d items', WC()->cart->cart_contents_count, "wp-organic" ), WC()->cart->cart_contents_count ); ?></span>
	<?php

	$fragments['span.couter_items'] = ob_get_clean();

	return $fragments;
}

/**
 * ajax product search.
 */

add_action('wp_ajax_wp_organic_product_search', 'wp_organic_product_search');

function wp_organic_product_search(){
	header('Content-Type: application/json');

	$data = array();

	$_s = isset($_REQUEST['q']) ? $_REQUEST['q'] : '';

	$_product = new WP_Query(array(
		'posts_per_page' => 20,
		'post_type' => 'product',
		'post_status' => 'publish',
		's'		=> $_s
	));

	if($_product->have_posts()){
		while ($_product->have_posts()){
			$_product->the_post();

			$data[] = array(
				'id' => get_the_ID(),
				'text' => get_the_title(),
				'image' => ''
			);
		}
	}
	exit(json_encode($data));
}
/**
/**
 * demo data.
 *
 * config.
 */
add_filter('ef3-theme-options-opt-name', 'et3_theme_framework_set_demo_opt_name');

function et3_theme_framework_set_demo_opt_name(){
	return 'smof_data';
}

add_filter('ef3-replace-content', 'et3_theme_framework_replace_content', 10 , 2);

function et3_theme_framework_replace_content($replaces, $attachment){
	return array(
		//'/image="(.+?)"/' => 'image="'.$attachment.'"',
		'/portfolio_masonry_category="(.+?)"/' => '',
		'/tax_query:/' => 'remove_query:',
		'/categories:/' => 'remove_query:',
		//'/src="(.+?)"/' => 'src="'.ef3_import_export()->acess_url.'ef3-placeholder-image.jpg"'
	);
}

add_filter('ef3-replace-theme-options', 'et3_theme_framework_replace_theme_options');

function et3_theme_framework_replace_theme_options(){
	return array(
		'dev_mode' => 0,
	);
}

add_filter('ef3-enable-create-demo', 'wp_organic_enable_create_demo');

function wp_organic_enable_create_demo(){
	return false;
}

