<?php

/**
 * Header Options
 * 
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Header', 'wp-organic'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id' => 'header_layout',
            'title' => esc_html__('Layouts', 'wp-organic'),
            'subtitle' => esc_html__('Select a layout for header', 'wp-organic'),
            'default' => '1',
            'type' => 'image_select',
            'options' => array(
                '1' => get_template_directory_uri().'/inc/options/images/header/header1.png',
                '2' => get_template_directory_uri().'/inc/options/images/header/header2.png',
                '3' => get_template_directory_uri().'/inc/options/images/header/header3.jpg',
                '4' => get_template_directory_uri().'/inc/options/images/header/header4.jpg',
            )
        ),
        array(
            'id' => 'background_header_top',
            'title' => esc_html__('Background Header Top', 'wp-organic'),
            'type' => 'background',
            'output'   => array('#cshero-header-top'),
            'background-repeat'  => false,
            'background-attachment'  => false,
            'background-position' => false,
            'background-image'   => false,
            'background-clip' => false,
            'background-origin' => false,
            'background-size' => false,
            'default'  => array(
                'background-color' => '#558b2f',
            )

        ),
        array(
            'id' => 'background_header',
            'title' => esc_html__('Background Header ', 'wp-organic'),
            'type' => 'background',
            'output'   => array('#cshero-header-inner.header-2 #cshero-header'),
            'background-repeat'  => false,
            'background-attachment'  => false,
            'background-position' => false,
            'background-image'   => false,
            'background-clip' => false,
            'background-origin' => false,
            'background-size' => false,
            'default'  => array(
                'background-color' => '#7cb342',
            )
        ),

        array(
            'subtitle' => esc_html__('Enable header sticky.', 'wp-organic'),
            'id' => 'menu_sticky',
            'type' => 'switch',
            'title' => esc_html__('Header Sticky', 'wp-organic'),
            'default' => false,
        ),
    )
);

/* Logo */
$this->sections[] = array(
    'title' => esc_html__('Logo', 'wp-organic'),
    'icon' => 'el-icon-picture',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Main Logo', 'wp-organic'),
            'subtitle' => esc_html__('Select an image file for your logo.', 'wp-organic'),
            'id' => 'main_logo',
            'type' => 'media',
            'url' => false,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo.png'
            )
        ),
        array(
            'subtitle' => esc_html__('in pixels.', 'wp-organic'),
            'id' => 'main_logo_height',
            'title' => 'Logo Height',
            'type' => 'dimensions',
            'units'    => array('px'),
            'width' => false,
            'default'  => array(
                'height'  => 82,
                'units'=>'px',
            ),
        ),
        array(
            'title' => esc_html__('Transparent Logo', 'wp-organic'),
            'subtitle' => esc_html__('Select an image file for your logo.', 'wp-organic'),
            'id' => 'trans_logo',
            'type' => 'media',
            'url' => false,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/trans-logo.png'
            )
        ),
        array(
            'subtitle' => esc_html__('in pixels.', 'wp-organic'),
            'id' => 'trans_logo_height',
            'title' => 'Logo Transparent Height ',
            'type' => 'dimensions',
            'units'    => array('px'),
            'width' => false,
            'default'  => array(
                'height'  => 82,
                'units'=>'px',
            ),
        ),
        array(
            'subtitle' => esc_html__('in pixels.', 'wp-organic'),
            'id' => 'logo-height-sticky',
            'title' => esc_html__('Logo Height Sticky', 'wp-organic'),
            'type' => 'dimensions',
            'units'    => array('px'),
            'width' => false,
            'default'  => array(
                'height'  => 82,
                'units'=>'px',
            ),
        ),

    )
);
/*login*/
$this->sections[] = array(
    'title' => esc_html__('Sign in', 'wp-organic'),
    'icon' => 'el el-user',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Background Sign in', 'wp-organic'),
            'subtitle' => esc_html__('Select an image file for your form sign in.', 'wp-organic'),
            'id' => 'bg_signin',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/bg-signin.jpg'
            )
        ),

    )
);
/*Sign up*/
$this->sections[] = array(
    'title' => esc_html__('Sign Up', 'wp-organic'),
    'icon' => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Background Sign Up', 'wp-organic'),
            'subtitle' => esc_html__('Select an image for left side of Sign up.', 'wp-organic'),
            'id' => 'bg_signup',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/bg-left-signup.jpg'
            )
        ),
        array(
            'title' => esc_html__('Logo Sign Up', 'wp-organic'),
            'subtitle' => esc_html__('Select an image file for your logo Sign Up.', 'wp-organic'),
            'id' => 'singup_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-signup.png'
            )
        ),
        array(
            'subtitle' => esc_html__('in pixels.', 'wp-organic'),
            'id' => 'signup_logo_height',
            'title' => esc_html__('Logo Sign Up Height', 'wp-organic'),
            'type' => 'dimensions',
            'units'    => array('px'),
            'width' => false,
            'output'=> array('.modal-content-left img'),
            'default'  => array(
                'height'  => 30,
                'units'=>'px',
            ),
        ),

    )
);
$this->sections[] = array(
    'title' => esc_html__('Favicon Icon', 'wp-organic'),
    'icon' => 'el-icon-star',
    'subsection' => true,
    'fields' => array(
        array(
            'title'             => esc_html__('Favicon Icon', 'wp-organic'),
            'subtitle'          => esc_html__('Select an image .png file for your site icon', 'wp-organic'),
            'id'                => 'general_site_icon',
            'type'              => 'media',
            'url'               => true,
        ),
    )
);

/**
 * Breadcrumbs
 *
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Breadcrumb', 'wp-organic'),
    'icon' => 'el-icon-website',
    'fields' => array(
        array(

            'id' => 'enable_breadcrumb',
            'type' => 'switch',
            'title' => esc_html__('Enable Breadcrumb', 'wp-organic'),
            'default' => false,
        ),
        array(
            'id'       => 'breadcrumb_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Background', 'wp-organic' ),
            'subtitle' => esc_html__( 'Breadcrumb background color', 'wp-organic' ),
            'output'   => array('#breadcrumb-text'),
            'required' => array( 0 => 'enable_breadcrumb', 1 => '=', 2 => '1' ),
           'background-repeat'  => false,
            'background-attachment'  => false,
            'background-position' => false,
            'background-image'   => false,
            'background-clip' => false,
            'background-origin' => false,
            'background-size' => false,
            'default'  => array(
                'background-color' => '#f2f2f2',
            )
        ),
    )
);

/**
 * Page Title Options
 * 
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Page Title', 'wp-organic'),
    'icon' => 'el el-map-marker',
    'fields' => array(
        array(
            'id' => 'page_title_layout',
            'title' => esc_html__('Layouts', 'wp-organic'),
            'subtitle' => esc_html__('Select a layout for page title', 'wp-organic'),
            'default' => '1',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri().'/inc/options/images/pagetitle/p0.png',
                '1' => get_template_directory_uri().'/inc/options/images/pagetitle/p1.jpg',
                '2' => get_template_directory_uri().'/inc/options/images/pagetitle/p3.jpg',
                '3' => get_template_directory_uri().'/inc/options/images/pagetitle/p4.jpg',

            )
        ),
        array(
            'title' => esc_html__('Select Background Image', 'wp-organic'),
            'subtitle' => esc_html__('Select an image file for background page title.', 'wp-organic'),
            'id' => 'bg_image_page_title',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/bg-page-title.jpg'
            )
        ),
        array(
            'title'             => esc_html__('Padding', 'wp-organic'),
            'subtitle'          => esc_html__('Page title padding (top/bottom).', 'wp-organic'),
            'id'                => 'page_title_padding',
            'type'              => 'spacing',
            'mode'              => 'padding',
            'units'             => array( 'px'),
            'top'               => true,
            'right'             => false,
            'bottom'            => true,
            'left'              => false,
            'output'            => array( '#page-title,#page-title.br-style2,#page-title.br-style3' ),

        ),
    )
);
/**
 * Sidebar
 * 
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Sidebar', 'wp-organic'),
    'icon' => 'el el-align-justify',
    'fields' => array( 
        array(
            'title' => esc_html__('Select background for widget title in main sidebar', 'wp-organic'),
            'subtitle' => esc_html__('Select an image file for widget title in main sidebar.', 'wp-organic'),
            'id' => 'bg-title-sidebar',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/bg-title-sidebar.jpg'
            )
        ),
    )
);
/**
* Woocomerce
*
 * @author Fox
*/
$this->sections[] = array(
    'title' => esc_html__('Woocommerce', 'wp-organic'),
    'icon' => 'el el-shopping-cart',
    'fields' => array(
        array(
            'title' => esc_html__('Select Background Image', 'wp-organic'),
            'subtitle' => esc_html__('Select an image file for background page title on page shop.', 'wp-organic'),
            'id' => 'bg_image_page_title_shop',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/page-title-shop.jpg'
            ),

        ),
        array(
            'title' => esc_html__('Fill Subtitle for Page Show Product', 'wp-organic'),
            'id' => 'subtitle_page_shop',
            'type' => 'text',
            'default'=>esc_html__('Healthy food delivered fast.','wp-organic'),
        ),
        array(
            'id'       => 'shop_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Background', 'wp-organic' ),
            'subtitle' => esc_html__( 'Select background for page shop product', 'wp-organic' ),
            'output'   => array('.product-archive-style2'),
            'background-clip' => false,
            'background-origin' => false,
            'default'  => array(
                'background-color' => '#f2f2f2',
                'background-image'=>get_template_directory_uri().'/assets/images/bg-shop.jpg',
                'background-repeat' => 'repeat',
                'background-position'=> 'center top',
            ),
        ),
        array(
            'title' => esc_html__('Products displayed per page', 'wp-league'),
            'id' => 'product_per_page',
            'type' => 'slider',
            'subtitle' => esc_html__('Number product to show', 'wp-league'),
            'default' => 9,
            'min'  => 3,
            'step' => 3,
            'max' => 24,
        ),
        array(
            'id'       => 'product_great_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Background', 'wp-organic' ),
            'subtitle' => esc_html__( 'Select background for block "More Great Product" on Page Single Product', 'wp-organic' ),
            'output'   => array('.cms_grid_product_great'),
            'background-clip' => false,
            'background-origin' => false,
            'default'  => array(
                'background-color' => '#f2f2f2',
                'background-image'=>get_template_directory_uri().'/assets/images/bg-shop.jpg',
                'background-repeat' => 'repeat',
                'background-position'=> 'center top',
            ),
        ),


    )
);
$this->sections[] = array(
    'title' => esc_html__('Single product', 'wp-organic'),
    'icon' => 'el-icon-text-width',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'enable_tab_recipe_product',
            'type' => 'switch',
            'title' => esc_html__('Enbale tab recipe', 'wp-organic'),
            'default' => true,
        ),
    ),
);
/**
 * Fancybox
 *
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('FancyBox ', 'wp-organic'),
    'icon' => 'el el-hdd',
    'fields' => array(

        array(
            'title' => esc_html__('Title for Box 1', 'wp-organic'),
            'id' => 'box_title1',
            'subtitle' => esc_html__( 'Apply for page single product and recipe', 'wp-organic' ),
            'type' => 'text',
            'default'=>esc_html__('Free shipping over £50.', 'wp-organic' ),

        ),
        array(
            'title' => esc_html__('Select Icon Image for Box1', 'wp-organic'),
            'id' => 'box_image1',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/car.png'
            ),

        ),
        array(
            'title' => esc_html__('Title for Box 2', 'wp-organic'),
            'id' => 'box_title2',
            'subtitle' => esc_html__( 'Apply for page single product and recipe', 'wp-organic' ),
            'type' => 'text',
            'default'=> esc_html__( 'Money back guarantee', 'wp-organic' ),

        ),
        array(
            'title' => esc_html__('Select Icon Image for Box2', 'wp-organic'),
            'id' => 'box_image2',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/dola.png'
            ),

        ),
        array(
            'title' => esc_html__('Title for Box 3', 'wp-organic'),
            'id' => 'box_title3',
            'subtitle' => esc_html__( 'Apply for page single product and recipe', 'wp-organic' ),
            'type' => 'text',
            'default'=> esc_html__( 'Safe & secure shopping', 'wp-organic' ),

        ),
        array(
            'title' => esc_html__('Select Icon Image for Box3', 'wp-organic'),
            'id' => 'box_image3',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/security.png'
            ),

        ),




    )
);
/**
 * Footer
 *
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Footer', 'wp-organic'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id' => 'footer_layout',
            'title' => esc_html__('Layouts', 'wp-organic'),
            'subtitle' => esc_html__('select a layout for footer', 'wp-organic'),
            'default' => '',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri().'/inc/options/images/footer/footer1.jpg',
                '1' => get_template_directory_uri().'/inc/options/images/footer/footer2.jpg',
                '2' => get_template_directory_uri().'/inc/options/images/footer/footer3.jpg',
                '3' => get_template_directory_uri().'/inc/options/images/footer/footer4.jpg',
            )
        ),

         array(
            'title' => esc_html__('Logo Footer', 'wp-organic'),
            'subtitle' => esc_html__('Select an image file for your logo footer.', 'wp-organic'),
            'id' => 'logo_footer',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/footer-logo.png'
            )
        ),
        array(
            'subtitle' => esc_html__('in pixels.', 'wp-organic'),
            'id' => 'footer_logo_height',
            'title' => esc_html__('Logo Footer Height', 'wp-organic' ),
            'type' => 'dimensions',
            'units'    => array('px'),
            'width' => false,
            'output'=> array('#cshero-footer-bottom .logo-footer img'),
            'default'  => array(
                'height'  => 30,
                'units'=>'px',
            ),
        ),
        array(
            'subtitle' => esc_html__('Enable button back to top.', 'wp-organic'),
            'id' => 'footer_botton_back_to_top',
            'type' => 'switch',
            'title' => esc_html__('Back To Top', 'wp-organic'),
            'default' => true,
        )
    )
);
$this->sections[] = array(
    'title' => esc_html__('Footer top', 'wp-organic'),
    'icon' => 'el-icon-text-width',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'enable_footer_top',
            'type' => 'switch',
            'title' => esc_html__('Enbale Footer top', 'wp-organic'),
            'default' => false
        ),
        array(
            'id'       => 'footer_top_background',
            'type'     => 'background',
            'title' => esc_html__('Select Background Footer top', 'wp-organic'),
            'subtitle'=>'Only apply for layout footer 1 and 2',
            'background-size' =>false,
            'background-attachment' =>false,
            'required' => array( 0 => 'enable_footer_top', 1 => '=', 2 => '1' ),
            'default' => array(
                'background-image'=>get_template_directory_uri().'/assets/images/footer_top.png',
                'background-color' =>  'transparent',
                'background-repeat' => 'repeat',
                'background-position'=> 'center top',
                'background-size' =>'cover'
            )

        ),
    )
);
$this->sections[] = array(
    'title' => esc_html__('Footer Feature ', 'wp-organic'),
    'icon' => 'el el-map-marker',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'enable_footer_feature',
            'type' => 'switch',
            'title' => esc_html__('Enbale Footer feature', 'wp-organic'),
            'default' => true
        ),
        array(
            'title' => esc_html__('Title for Box 1', 'wp-organic'),
            'id' => 'box_footer_title1',
            'subtitle' => esc_html__( 'Apply for layout footer 3 and 4', 'wp-organic' ),
            'type' => 'text',
            'default'=>esc_html__('Free Shipping', 'wp-organic' ),
            'required' => array( 0 => 'enable_footer_feature', 1 => '=', 2 => '1' ),
        ),
        array(
            'title' => esc_html__('Subtitle for Box 1', 'wp-organic'),
            'id' => 'box_footer_subtitle1',
            'type' => 'text',
            'default'=>esc_html__('On orders over €99', 'wp-organic' ),
            'required' => array( 0 => 'enable_footer_feature', 1 => '=', 2 => '1' ),
        ),
        array(
            'title' => esc_html__('Icon Box 1 ', 'wp-organic'),
            'subtitle' => 'http://zavoloklom.github.io/material-design-iconic-font/icons.html',
            'id' => 'box_footer_icon1',
            'type' => 'text',
            'default' => 'zmdi zmdi-truck',
            'required' => array( 0 => 'enable_footer_feature', 1 => '=', 2 => '1' ),
        ),
        array(
            'title' => esc_html__('Title for Box 2', 'wp-organic'),
            'id' => 'box_footer_title2',
            'subtitle' => esc_html__( 'Apply for layout footer 3 and 4', 'wp-organic' ),
            'type' => 'text',
            'default'=>esc_html__('Special Gift Card','wp-organic' ),
            'required' => array( 0 => 'enable_footer_feature', 1 => '=', 2 => '1' ),
        ),
        array(
            'title' => esc_html__('Subtitle for Box 2', 'wp-organic'),
            'id' => 'box_footer_subtitle2',
            'type' => 'text',
            'default'=>esc_html__('The perfect gift idea', 'wp-organic' ),
            'required' => array( 0 => 'enable_footer_feature', 1 => '=', 2 => '1' ),
        ),
        array(
            'title' => esc_html__('Icon Box 2 ', 'wp-organic'),
            'subtitle' => 'http://zavoloklom.github.io/material-design-iconic-font/icons.html',
            'id' => 'box_footer_icon2',
            'type' => 'text',
            'default' => 'zmdi zmdi-card-giftcard',
            'required' => array( 0 => 'enable_footer_feature', 1 => '=', 2 => '1' ),
        ),
        array(
            'title' => esc_html__('Title for Box 3', 'wp-organic'),
            'id' => 'box_footer_title3',
            'subtitle' => esc_html__( 'Apply for layout footer 3 and 4', 'wp-organic' ),
            'type' => 'text',
            'default'=>esc_html__('Special Discounts', 'wp-organic' ),
            'required' => array( 0 => 'enable_footer_feature', 1 => '=', 2 => '1' ),
        ),
        array(
            'title' => esc_html__('Subtitle for Box 3', 'wp-organic'),
            'id' => 'box_footer_subtitle3',
            'type' => 'text',
            'default'=>esc_html__('Weeky promotions', 'wp-organic' ),
            'required' => array( 0 => 'enable_footer_feature', 1 => '=', 2 => '1' ),
        ),
        array(
            'title' => esc_html__('Icon Box 3 ', 'wp-organic'),
            'subtitle' => 'http://zavoloklom.github.io/material-design-iconic-font/icons.html',
            'id' => 'box_footer_icon3',
            'type' => 'text',
            'default' => 'zmdi zmdi-calendar-note',
            'required' => array( 0 => 'enable_footer_feature', 1 => '=', 2 => '1' ),
        ),
        array(
            'title' => esc_html__('Title for Box 4', 'wp-organic'),
            'id' => 'box_footer_title4',
            'subtitle' => esc_html__( 'Apply for layout footer 3 and 4', 'wp-organic' ),
            'type' => 'text',
            'default'=>esc_html__('24/7 Customer Care', 'wp-organic' ),
            'required' => array( 0 => 'enable_footer_feature', 1 => '=', 2 => '1' ),
        ),
        array(
            'title' => esc_html__('Subtitle for Box 4', 'wp-organic'),
            'id' => 'box_footer_subtitle4',
            'type' => 'text',
            'default'=>esc_html__('Hours: 8:00 - 20:00 Mon - Sat', 'wp-organic' ),
            'required' => array( 0 => 'enable_footer_feature', 1 => '=', 2 => '1' ),
        ),
        array(
            'title' => esc_html__('Icon Box 4 ', 'wp-organic'),
            'subtitle' => 'http://zavoloklom.github.io/material-design-iconic-font/icons.html',
            'id' => 'box_footer_icon4',
            'type' => 'text',
            'default' => 'zmdi zmdi-comments',
            'required' => array( 0 => 'enable_footer_feature', 1 => '=', 2 => '1' ),
        ),




    )
);
/**
 * page 404
 */

$this->sections[] = array(
    'title' => esc_html__('Page 404', 'wp-organic'),
    'icon' => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'       => 'page404_background',
            'type'     => 'background',
            'title' => __('Select Background for Page 404', 'wp-organic'),
            'background-attachment' =>false,
            'output'=> array('.page-404-site-content'),
            'default' => array(
                'background-image'=>get_template_directory_uri().'/assets/images/page404.jpg',
                'background-color' =>  'transparent',
                'background-repeat' => 'no-repeat',
                'background-position'=> 'center top',
                'background-size' =>'cover',
            )

        ),
    )
);
/**
 * Styling
 * 
 * css color.
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Styling', 'wp-organic'),
    'icon' => 'el-icon-adjust',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Set color primary color.', 'wp-organic'),
            'id' => 'primary_color',
            'type' => 'color',
            'title' => esc_html__('Primary Color', 'wp-organic'),
            'default' => '#90c43e'
        ),
        array(
            'subtitle' => esc_html__('Set color secondary color.', 'wp-organic'),
            'id' => 'secondary_color',
            'type' => 'color',
            'title' => esc_html__('Secondary Color', 'wp-organic'),
            'default' => '#212121'
        ),
        array(
            'subtitle' => esc_html__('Set color for tags <a></a>.', 'wp-organic'),
            'id' => 'link_color',
            'type' => 'color',
            'title' => esc_html__('Link Color', 'wp-organic'),
            'default' => '#90c43e'
        ),

    )
);

/**
 * Typography
 * 
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Typography', 'wp-organic'),
    'icon' => 'el-icon-text-width',
    'subsection' => false,
    'fields' => array(
        array(
            'id' => 'font_body',
            'type' => 'typography',
            'title' => esc_html__('Body Font', 'wp-organic'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'rgba' =>true,
            'output' => array(
                'body'
            ),
            'text-align' => false,
            'units' => 'px',
            'default' => array(
                'color' => '#000',
                'font-style' => '400',
                'font-family' => 'Roboto',
                'google' => true,
                'font-size' => '14px',
                'line-height' => '24px',
            ),
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'wp-organic')
        ),
        array(
            'id' => 'font_h1',
            'type' => 'typography',
            'title' => esc_html__('H1', 'wp-organic'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h1'),
            'units' => 'px',
            'text-align' => false,
            'default' => array(
                'color' => '#000',
                'font-style' => '700',
                'font-family' => 'Roboto',
                'google' => true,
                'font-size' => '50px',
                'line-height' => '55px',

            ),
        ),
        array(
            'id' => 'font_h2',
            'type' => 'typography',
            'title' => esc_html__('H2', 'wp-organic'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h2'),
            'units' => 'px',
            'text-align' => false,
            'default' => array(
                'color' => '#000',
                'font-style' => '400',
                'font-family' => 'Roboto',
                'google' => true,
                'font-size' => '48px',
                'line-height' => '53px',
            ),
        ),
        array(
            'id' => 'font_h3',
            'type' => 'typography',
            'title' => esc_html__('H3', 'wp-organic'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h3'),
            'units' => 'px',
            'text-align' => false,
            'default' => array(
                'color' => '#000',
               'font-style' => '400',
                'font-family' => 'Roboto',
                'google' => true,
                'font-size' => '40px',
                'line-height' => '45px',
            ),
        ),
        array(
            'id' => 'font_h4',
            'type' => 'typography',
            'title' => esc_html__('H4', 'wp-organic'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h4'),
            'units' => 'px',
            'text-align' => false,
            'default' => array(
                'color' => '#000',
               'font-style' => '400',
                'font-family' => 'Roboto',
                'google' => true,
                'font-size' => '24px',
                'line-height' => '26px',
            ),
        ),
        array(
            'id' => 'font_h5',
            'type' => 'typography',
            'title' => esc_html__('H5', 'wp-organic'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h5'),
            'units' => 'px',
            'text-align' => false,
            'default' => array(
                'color' => '#000',
                'font-style' => '700',
                'font-family' => 'Roboto',
                'google' => true,
                'font-size' => '18px',
                'line-height' => '24px',

            ),
        ),
        array(
            'id' => 'font_h6',
            'type' => 'typography',
            'title' => esc_html__('H6', 'wp-organic'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h6'),
            'units' => 'px',
            'text-align' => false,
            'default' => array(
                'color' => '#222222',
               'font-style' => '400',
                'font-family' => 'Raleway',
                'google' => true,
                'font-size' => '14px',
                'line-height' => '18px',

            ),
        )
    )
);

/* Extra Font */
$this->sections[] = array(
    'title' => esc_html__('Extra Fonts', 'wp-organic'),
    'icon' => 'el el-fontsize',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'google-font-1',
            'type' => 'typography',
            'title' => esc_html__('Font 1', 'wp-organic'),
            'google' => true,
            'font-backup' => false,
            'font-style' => true,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'default' => array(
                'font-weight' => '700',
                'font-family' => 'Dosis'
            )
        ),
        array(
            'id' => 'google-font-selector-1',
            'type' => 'textarea',
            'title' => esc_html__('Selector 1', 'wp-organic'),
            'subtitle' => esc_html__('add html tags ID or class (body,a,.class,#id)', 'wp-organic'),
            'validate' => 'no_html',
            'default' => '',
        ),
        array(
            'id' => 'google-font-2',
            'type' => 'typography',
            'title' => esc_html__('Font 2', 'wp-organic'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'default' => array(
                'font-weight' => '700',
                'font-family' => 'Amatic SC'
            )
        ),
        array(
            'id' => 'google-font-selector-2',
            'type' => 'textarea',
            'title' => esc_html__('Selector 2', 'wp-organic'),
            'subtitle' => esc_html__('add html tags ID or class (body,a,.class,#id)', 'wp-organic'),
            'validate' => 'no_html',
            'default' => '',
        ),
        array(
            'id' => 'google-font-3',
            'type' => 'typography',
            'title' => esc_html__('Font 3', 'wp-organic'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'default' => array(
                'font-weight' => '700',
                'font-family' => 'Amatic SC'
            )
        ),
        array(
            'id' => 'google-font-selector-3',
            'type' => 'textarea',
            'title' => esc_html__('Selector 3', 'wp-organic'),
            'subtitle' => esc_html__('add html tags ID or class (body,a,.class,#id)', 'wp-organic'),
            'validate' => 'no_html',
            'default' => '',
        ),
    )
);
/**
 * Blog Option
 *
 * css color.
 *
 * @author CMS
 */
$this->sections[] = array(
    'title' => esc_html__('Blog Option', 'wp-organic'),
    'icon' => 'el el-blogger',
    'fields' => array(
        array(
            'id'       => 'blog_listing_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Background', 'wp-organic' ),
            'subtitle' => esc_html__( 'Select image background for page blog listing', 'wp-organic' ),
            'output'   => array('#page-blog-listing,#page-blog-masonry,#page-blog-standard'),
            'background-clip' => false,
            'background-origin' => false,
            'default'  => array(
                'background-repeat' => 'repeat',
                'background-position'=> 'center top',
                'background-image'=>get_template_directory_uri().'/assets/images/bg-shop.jpg',
            ),

        ),
    )
);

/**
 * Post Option
 *
 * css color.
 * 
 * @author CMS
 */
$this->sections[] = array(
    'title' => esc_html__('Post Option', 'wp-organic'),
    'icon' => 'el el-book',
    'fields' => array(
        array(
            'id' => 'post_full_width',
            'type' => 'switch',
            'title' => esc_html__('Post Full Width', 'wp-organic'),
            'subtitle' => esc_html__('Show single post full width no sidebar.', 'wp-organic'),
            'default' => false
        ),
        array(
            'id' => 'post_sidebar_left',
            'type' => 'switch',
            'title' => esc_html__('Enable Post Sidebar Left', 'wp-organic'),
            'subtitle' => esc_html__('Default post blog sidebar Right.', 'wp-organic'),
            'default' => false,
            'required' => array( 0 => 'post_full_width', 1 => '=', 2 => '0' ),
        ),
    )
);
/* Post Title - Single Post */
$this->sections[] = array(
    'title' => esc_html__('Post Title', 'wp-organic'),
    'icon' => 'el el-map-marker',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'images_post_title',
            'type' => 'switch',
            'title' => esc_html__('Enable background post title', 'wp-organic'),
            'subtitle' => esc_html__('Show background for all posts title', 'wp-organic'),
            'default' => false
        ),
        array(
            'title' => esc_html__('Select Background Image', 'wp-organic'),
            'subtitle' => esc_html__('Select an image file for background post title - apply post single', 'wp-organic'),
            'id' => 'bg_image_page_title_post',
            'type' => 'media',
            'url' => true,
            'required' => array( 0 => 'images_post_title', 1 => '=', 2 => '1' ),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/bg-page-title_post.jpg'
            )
        ),
    )
);
/**
 * recipe
 */
$this->sections[] = array(
    'title' => esc_html__('Recipe Option', 'wp-organic'),
    'icon' => 'el el-slideshare',
    'fields' => array(
        array(
            'id'       => 'recipe_page',
            'type'     => 'select',
            'data'     => 'pages',
            'title'    => esc_html__( 'Recipe Pages', 'wp-organic' ),
            'subtitle' =>esc_html__(  'Recipe page for search, archive...', 'wp-organic' ),
        ),
        array(
            'id'       => 'recipe_shop_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Background', 'wp-organic' ),
            'subtitle' => esc_html__( 'Select image background for page recipe single', 'wp-organic' ),
            'output'   => array('.pt-single-recipe'),
            'background-clip' => false,
            'background-origin' => false,
            'default'  => array(
                'background-color' => '#f2f2f2',
                'background-image'=>get_template_directory_uri().'/assets/images/bg-shop.jpg',
                'background-repeat' => 'repeat',
                'background-position'=> 'center top',
            ),
        )
    )
);
$this->sections[] = array(
    'title' => esc_html__('Filter recipe', 'wp-organic'),
    'icon' => 'el-icon-text-width',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'enable_filter_time',
            'type' => 'switch',
            'title' => esc_html__('Enbale filter recipe time', 'wp-organic'),
            'default' => true,
        ),
        array(
            'id' => 'enable_filter_skill',
            'type' => 'switch',
            'title' => esc_html__('Enbale filter recipe skill', 'wp-organic'),
            'default' => true,
        ),
        array(
            'id' => 'enable_filter_calories',
            'type' => 'switch',
            'title' => esc_html__('Enbale filter recipe calories', 'wp-organic'),
            'default' => true,
        ),
    ),
);
/**
 * recipe title
 */
$this->sections[] = array(
    'title' => esc_html__('Recipe Title', 'wp-organic'),
    'icon' => 'el el-map-marker',
    'subsection' => true,
    'fields' => array(

        array(
            'title' => esc_html__('Select Background Image', 'wp-organic'),
            'subtitle' => esc_html__('Select an image file for background recipe title - apply recipe single', 'wp-organic'),
            'id' => 'bg_image_page_title_recipe',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/bg-page-recipe-title.jpg'
            )
        ),
    )
);
/**
 * Custom CSS
 * 
 * extra css for customer.
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Custom CSS', 'wp-organic'),
    'icon' => 'el-icon-bulb',
    'fields' => array(
        array(
            'id' => 'custom_css',
            'type' => 'ace_editor',
            'title' => esc_html__('CSS Code', 'wp-organic'),
            'subtitle' => esc_html__('create your css code here.', 'wp-organic'),
            'mode' => 'css',
            'theme' => 'monokai',
        )
    )
);
/**
 * Animations
 *
 * Animations options for theme. libs css, js.
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Animations', 'wp-organic'),
    'icon' => 'el-icon-magic',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Enable animation mouse scroll...', 'wp-organic'),
            'id' => 'smoothscroll',
            'type' => 'switch',
            'title' => esc_html__('Smooth Scroll', 'wp-organic'),
            'default' => false
        )
    )
);
/**
 * Optimal Core
 * 
 * Optimal options for theme. optimal speed
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Optimal Core', 'wp-organic'),
    'icon' => 'el-icon-idea',
    'fields' => array(
        array(
            'subtitle' => esc_html__('no minimize , generate css over time...', 'wp-organic'),
            'id' => 'dev_mode',
            'type' => 'switch',
            'title' => esc_html__('Dev Mode (not recommended)', 'wp-organic'),
            'default' => false
        )
    )
);