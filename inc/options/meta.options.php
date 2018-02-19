<?php
/**
 * Meta options
 *
 * @author Fox
 * @since 1.0.0
 */
class CMSMetaOptions
{
    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
    }
    /* add script */
    function admin_script_loader()
    {
        global $pagenow;
        if (is_admin() && ($pagenow == 'post-new.php' || $pagenow == 'post.php')) {
            wp_enqueue_style('metabox', get_template_directory_uri() . '/inc/options/css/metabox.css');

            wp_enqueue_script('easytabs', get_template_directory_uri() . '/inc/options/js/jquery.easytabs.min.js');
            wp_enqueue_script('metabox', get_template_directory_uri() . '/inc/options/js/metabox.js');
        }
    }
    /* add meta boxs */
    public function add_meta_boxes()
    {
        $this->add_meta_box('template_page_options', esc_html__('Setting', 'wp-organic'), 'page');
        $this->add_meta_box('post_options', esc_html__('Post Setting', 'wp-organic'), 'post');
        $this->add_meta_box('recipe_options', esc_html__('Recipe Setting', 'wp-organic'), 'recipe');
        $this->add_meta_box('team_options', esc_html__('Team Options', 'wp-organic'), 'team', 'side','high');
        $this->add_meta_box('product_options', esc_html__('Product Options', 'wp-organic'), 'product', 'side','high');
        $this->add_meta_box('team_social', esc_html__('Team Social', 'wp-organic'), 'team', 'side','high');
        $this->add_meta_box('testimonial_option', esc_html__('Testimonial Options', 'wp-organic'), 'testimonial', 'side','high');
        $this->add_meta_box('pricing_options', esc_html__('Pricing Option', 'wp-organic'), 'pricing');
        $this->add_meta_box('portfolio_options', esc_html__('Portfolio Option', 'wp-organic'), 'portfolio');
        $this->add_meta_box('timeline_options', esc_html__('Timeline Option', 'wp-organic'), 'timeline');
        $this->add_meta_box('gallery_options', esc_html__('Gallery Subtitle', 'wp-organic'), 'gallery');

    }

    public function add_meta_box($id, $label, $post_type, $context = 'advanced', $priority = 'default')
    {
        add_meta_box('_cms_' . $id, $label, array($this, $id), $post_type, $context, $priority);
    }

    /* --------------------- POST ---------------------- */
    function post_options(){
        ?>
        <div class="post-full">
            <?php
             cms_options(array(
                 'id' => 'enable_post_sidebar',
                 'label' => esc_html__('Custom sidebar','wp-organic'),
                 'type'     => 'switch',
                 'options' => array('on'=>'1','off'=>''),
                 'follow' => array('1'=>array('#post_sidebar_enable'))
                ));
             ?>
             <div id="post_sidebar_enable"><?php
                cms_options(array(
                    'id' => 'post_full_width',
                    'label' => esc_html__('Post Full Width','wp-organic'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>'0'),
                ));
                cms_options(array(
                    'id' => 'post_sidebar_left',
                    'label' => esc_html__('Enable Post Sidebar Left','wp-organic'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>'0'),
                ));
            ?>
            </div>
        </div>
        <?php
    }

    /* --------------------- Testimonial ---------------------- */
    function testimonial_option(){
        ?>
        <div class="cms-testimonial">
            <?php
            cms_options(array(
                'id' => 'testimonial_position',
                'label' => esc_html__('Testimonial Postion','wp-organic'),
                'type' => 'text',
            ));
            ?>
        </div>
        <?php
    }
    /* --------------------- Client ---------------------- */
    function client_options(){
        ?>
        <div class="clients">
            <?php
            cms_options(array(
                'id' => 'client_url',
                'label' => esc_html__('URL','wp-organic'),
                'type' => 'text',
            ));
            ?>
        </div>
        <?php
    }
    /* --------------------- Pricing ---------------------- */
    function pricing_options(){
        ?>
        <div class="cms-pricing">
            <?php
            cms_options(array(
                'id' => 'pricing_currency',
                'label' => esc_html__('Currency Unit','wp-organic'),
                'type' => 'text',
                'placeholder' => '$'
            ));
            cms_options(array(
                'id' => 'pricing_time',
                'label' => esc_html__('Time','wp-organic'),
                'type' => 'text',
                'placeholder' => '/mo'
            ));
            cms_options(array(
                'id' => 'pricing_price',
                'label' => esc_html__('Price','wp-organic'),
                'type' => 'text',
                'placeholder' => '100'
            ));
            cms_options(array(
                'id' => 'pricing_btn_text',
                'label' => esc_html__('Button Text','wp-organic'),
                'type' => 'text',
                'placeholder' => esc_html__( 'Order This Plan','wp-organic'),
            ));
            cms_options(array(
                'id' => 'pricing_btn_link',
                'label' => esc_html__('Button Url','wp-organic'),
                'type' => 'text',
                'placeholder' => '#'
            ));
            cms_options(array(
                'id' => 'pricing_feature',
                'label' => esc_html__('Feature','wp-organic'),
                'type' => 'switch',
                'options' => array('on'=>'1','off'=>''),
                'desc' => esc_html__('Apply for layout 4','wp-organic'),
            ));
            cms_options(array(
                'id' => 'pricing_subtitle',
                'label' => esc_html__('Subtitle','wp-organic'),
                'type' => 'text',
                'desc' => esc_html__('Apply for layout 2 and 4','wp-organic'),
            ));
            cms_options(array(
                'id' => 'pricing_payment',
                'label' => esc_html__('Payment','wp-organic'),
                'type' => 'text',
                'desc' => esc_html__('Apply for layout 2','wp-organic'),
            ));
            cms_options(array(
                'id' => 'icon_image',
                'label' => esc_html__('Icon images','wp-organic'),
                'type' => 'image',
                'default' => '',
                'desc' => esc_html__('Apply for layout 2','wp-organic'),
            ));
            cms_options(array(
                'id' => 'icon_font',
                'label' => esc_html__('Icon Class','wp-organic'),
                'type' => 'text',
                'default' => '',
                'desc' => esc_html__('Apply for layout 2','wp-organic'),
            ));
            cms_options(array(
                'id' => 'margin_icon',
                'label' => esc_html__('Icon margin','wp-organic'),
                'type' => 'text',
                'desc' =>  esc_html__('Apply for layout 2','wp-organic'),
                'placeholder' => '10px 0 5px 0',
            ));
            cms_options(array(
                'id' => 'background_image_title',
                'label' => esc_html__('Background images for title','wp-organic'),
                'type' => 'image',
                'default' => '',
                'desc' =>  esc_html__('Apply for layout 3','wp-organic'),
            ));
            cms_options(array(
                'id' => 'button_style',
                'label' => esc_html__('Button style','wp-organic'),
                'type' => 'select',
                'value'=>'',
                'options'=>array(
                    'style1'=>'Default',
                    'style2'=>'Default 2',
                ),
                'desc' =>  esc_html__('Apply for layout 3','wp-organic'),
            ));
            cms_options(array(
                'id' => 'pricing_color_primary',
                'label' => esc_html__('Pricing primary color','wp-organic'),
                'type' => 'color',
                'desc' => esc_html__('Apply for layout 2 and 3 and 4 and 5','wp-organic'),
            ));

            ?>
        </div>
        <?php
    }
    /* --------------------- PAGE ---------------------- */
    function template_page_options() {
        ?>
         <div class='body-class'>
            <?php
            cms_options(array(
                'id' => 'body_class',
                'label' => esc_html__('Body class','wp-organic'),
                'type' => 'text',
                'placeholder'=>'home2',
            ));
            ?>

         </div>
        <div class="tab-container clearfix">
            <ul class='etabs clearfix'>
                <li class="tab"><a href="#tabs-header"><?php esc_html_e('Header', 'wp-organic'); ?></a></li>
                <li class="tab"><a href="#tabs-page-title"><?php esc_html_e('Page Title', 'wp-organic'); ?></a></li>
                <li class="tab"><a href="#tabs-slider"><?php esc_html_e('Slider', 'wp-organic'); ?></a></li>
                <li class="tab"><a href="#tabs-footer"><?php esc_html_e('Footer', 'wp-organic'); ?></a></li>
                <li class="tab"><a href="#tabs-sidebar"><?php esc_html_e('Sidebar', 'wp-organic'); ?></a></li>


            </ul>
            <div class='panel-container'>
                <div id="tabs-header">
                    <?php
                    /* Header. */
                    cms_options(array(
                        'id' => 'header',
                        'label' => esc_html__('Custom Header','wp-organic'),
                        'type' => 'switch',
                        'options' => array('on'=>'1','off'=>''),
                        'follow' => array('1'=>array('#page_header_enable'))
                    ));
                    ?>
                    <div id="page_header_enable">
                        <?php
                        global $wp_organic_base;
                        cms_options(array(
                            'id' => 'header_layout',
                            'label' => esc_html__('Layout','wp-organic'),
                            'type' => 'imegesselect',
                            'options' => array(
                                '1' => get_template_directory_uri().'/inc/options/images/header/header1.png',
                                '2' => get_template_directory_uri().'/inc/options/images/header/header2.png',
                                '3' => get_template_directory_uri().'/inc/options/images/header/header3.jpg',
                                '4' => get_template_directory_uri().'/inc/options/images/header/header4.jpg',

                            )
                        ));
                        cms_options(array(
                            'id' => 'background_header_top',
                            'label' => esc_html__('Set background for header top.','wp-organic'),
                            'type' => 'color',
                            'desc' => esc_html__('Apply for header 1','wp-organic'),
                        ));
                        cms_options(array(
                            'id' => 'background_header',
                            'label' => esc_html__('Set background for header.','wp-organic'),
                            'type' => 'color',
                            'desc' => esc_html__('Apply for header 1','wp-organic'),
                        ));
                        cms_options(array(
                            'id' => 'custom_logo',
                            'label' => esc_html__('Custom Logo','wp-organic'),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>''),
                            'follow' => array('1'=>array('#custom_logo_page'))
                        ));
                        ?>
                        <div id="custom_logo_page">
                            <?php
                            cms_options(array(
                                'id' => 'header_logo_page',
                                'label' => esc_html__('Logo','wp-organic'),
                                'type' => 'image',
                                'default' => ''
                            ));
                            cms_options(array(
                                'id' => 'logo_height_page',
                                'label' => esc_html__('Logo Height','wp-organic'),
                                'type' => 'text',
                                'default' => '',
                                'placeholder'=>'82px'
                            ));
                            ?>
                        </div>


                    </div>

                </div>
                <div id="tabs-page-title">
                    <?php
                    cms_options(array(
                        'id' => 'custom_breadcrumb',
                        'label' => esc_html__('Custom Breadcrumbs','wp-organic'),
                        'type' => 'switch',
                        'options' => array('on'=>'1','off'=>''),
                        'follow' => array('1'=>array('#breadcrumbs_enable'))
                    ));?>
                    <div id="breadcrumbs_enable"><?php
                        cms_options(array(
                            'id' => 'enable_breadcrumb',
                            'label' => esc_html__('Enable Breadcrumbs','wp-organic'),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>''),

                        ));
                   ?></div><?php
                    /* page title. */
                    cms_options(array(
                        'id' => 'page_title',
                        'label' => esc_html__('Custom Page Title','wp-organic'),
                        'type' => 'switch',
                        'options' => array('on'=>'1','off'=>''),
                        'follow' => array('1'=>array('#page_title_enable'))
                    ));
                    ?>  <div id="page_title_enable"><?php
                        cms_options(array(
                            'id' => 'page_title_text',
                            'label' => esc_html__('Title','wp-organic'),
                            'type' => 'text',
                        ));
                        cms_options(array(
                            'id' => 'page_title_sub',
                            'label' => esc_html__('Sub Title','wp-organic'),
                            'type' => 'text',
                        ));
                        cms_options(array(
                            'id' => 'page_title_padding',
                            'label' => esc_html__('Page Title Padding','wp-organic'),
                            'type' => 'text',
                        ));
                        cms_options(array(
                            'id' => 'page_title_margin',
                            'label' => esc_html__('Page Title Margin','wp-organic'),
                            'type' => 'text',
                        ));
                        cms_options(array(
                            'id' => 'page_title_type',
                            'label' => esc_html__('Layout','wp-organic'),
                            'type' => 'imegesselect',
                            'options' => array(
                                '' => get_template_directory_uri().'/inc/options/images/pagetitle/p0.png',
                                '1' => get_template_directory_uri().'/inc/options/images/pagetitle/p1.jpg',
                                '2' => get_template_directory_uri().'/inc/options/images/pagetitle/p3.jpg',
                                '3' => get_template_directory_uri().'/inc/options/images/pagetitle/p4.jpg',
                            )
                        ));
                        cms_options(array(
                            'id' => 'bg_image_page_title',
                            'label' => esc_html__('Select Background Image','wp-organic'),
                            'type' => 'image',
                            'default' => ''
                        ));
                        cms_options(array(
                            'id' => 'enable_bg_overlay',
                            'label' => esc_html__('Enable background overlay','wp-organic'),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>'',
                            'default'  => '1'),
                        ));
                        cms_options(array(
                            'id' => 'bg_overlay',
                            'label' => esc_html__('Select Background overlay','wp-organic'),
                            'type' => 'color',
                            'rgba'=>true,
                            'default' => '#1e1e1e',
                            'desc'=> esc_html__('Apply when background overlay is turned on','wp-organic'),
                        ));
                        ?>
                    </div>
                </div>
                <div id="tabs-slider">
                    <?php
                    /* Header. */
                    cms_options(array(
                        'id' => 'slider_custom',
                        'label' => esc_html__('Custom Slider','wp-organic'),
                        'type' => 'switch',
                        'options' => array('on'=>'1','off'=>''),
                        'follow' => array('1'=>array('#page_slider_enable'))
                    ));
                    ?>
                    <div id="page_slider_enable">
                        <?php
                        global $wp_organic_base;
                            cms_options(array(
                                'id' => 'get_revslide',
                                'label' => esc_html__('Revolution','wp-organic'),
                                'type' => 'select',
                                'options' => $wp_organic_base->wp_organic_build_shortcode_rev_slider(),
                            ));
                            cms_options(array(
                                'id' => 'overlay_slider_color',
                                'label' => esc_html__('Set overlay color.','wp-organic'),
                                'type' => 'color',
                                'rgba'=>'true',
                            ));
                        ?>



                    </div>

                </div>
                <div id="tabs-footer">
                    <?php
                    /* header. */
                    cms_options(array(
                        'id' => 'footer',
                        'label' => esc_html__('Custom','wp-organic'),
                        'type' => 'switch',
                        'options' => array('on'=>'1','off'=>''),
                        'follow' => array('1'=>array('#page_footer_enable'))
                    ));
                    ?><div id="page_footer_enable"><?php
                        cms_options(array(
                            'id' => 'footer_layout',
                            'label' => esc_html__('Layout','wp-organic'),
                            'type' => 'imegesselect',
                            'options' => array(
                                '' => get_template_directory_uri().'/inc/options/images/footer/footer1.jpg',
                                '1' => get_template_directory_uri().'/inc/options/images/footer/footer2.jpg',
                                '2' => get_template_directory_uri().'/inc/options/images/footer/footer3.jpg',
                                '3' => get_template_directory_uri().'/inc/options/images/footer/footer4.jpg',
                            )
                        ));
                        cms_options(array(
                            'id' => 'custom_logo_footer',
                            'label' => esc_html__('Custom Logo Footer','wp-organic'),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>''),
                            'follow' => array('1'=>array('#custom_logo__footer_page'))
                        ));
                        ?>
                        <div id="custom_logo__footer_page">
                            <?php
                            cms_options(array(
                                'id' => 'logo_footer',
                                'label' => esc_html__('Footer Logo','wp-organic'),
                                'type' => 'image',
                                'default' => ''
                            ));
                            ?>
                        </div>
                        <?php
                            cms_options(array(
                                'id' => 'footer_top_background',
                                'label' => esc_html__('Background Footer Top','wp-organic'),
                                'type' => 'image',
                                'desc'=>esc_html__('Only Apply for layout footer 2','wp-organic'),
                                'default' => ''
                            ));
                            cms_options(array(
                                'id' => 'footer_top_background_image_repeat',
                                'label' => esc_html__('Background repeat','wp-organic'),
                                'type' => 'select',
                                'value'=>'',
                                'options'=>array(
                                    ''=>'Background Repeat',
                                    'no-repeat'=>'No repeat',
                                    'repeat'=>'Repeat All',
                                    'repeat-x'=>'Repeat Horizontally',
                                    'repeat-y'=>'Repeat Vertically',
                                    'inherit'=>'Inherit',

                                ),
                            ));
                            cms_options(array(
                                'id' => 'footer_top_background_image_position',
                                'label' => esc_html__('Background position','wp-organic'),
                                'type' => 'select',
                                'value'=>'',
                                'options'=>array(
                                    ''=>'Background Position ',
                                    'left top'=>'Left Top',
                                    'left center'=>'Left center',
                                    'left bottom'=>'Left Bottom',
                                    'center top'=>'Center Top',
                                    'center center'=>'Center Center',
                                    'center bottom'=>'Center Bottom',
                                    'right top'=>'Right Top',
                                    'right center'=>'Right center',
                                    'right bottom'=>'Right Bottom',
                                ),
                            ));
                            cms_options(array(
                                'id' => 'footer_top_background_size',
                                'label' => esc_html__('Background size','wp-organic'),
                                'type' => 'select',
                                'value'=>'',
                                'options'=>array(
                                    ''=>'Background size',
                                    'contain'=>'Contain',
                                    'cover'=>'cover',
                                    'inherit'=>'Inherit',
                                    'Initial'=>'Initial'
                                ),
                            ));
                        ?>


                    </div>
                </div>
                <div id="tabs-sidebar">
                    <?php
                    cms_options(array(
                        'id' => 'show_sidebar',
                        'label' => esc_html__('Show Sidebar','wp-organic'),
                        'type' => 'switch',
                        'options' => array('on'=>'1','off'=>''),
                        'follow' => array('1'=>array('#show_sidebar_page_left'))
                    ));
                    ?>
                    <div id="show_sidebar_page_left">
                        <?php
                        cms_options(array(
                            'id' => 'show_sidebar_page_left',
                            'label' => esc_html__('Show Sidebar Left - Default Sidebar Right','wp-organic'),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>''),
                        ));
                        ?>
                    </div>
                </div>

            </div>
        </div>
        <?php
    }
    /* --------------------- Team Option ---------------------- */
    function team_options(){
        ?>
        <div class="cms-position">
            <?php
            cms_options(array(
                'id' => 'position_sub_title',
                'label' => esc_html__('Position','wp-organic'),
                'type' => 'text',
                'placeholder' => esc_html__('Manager','wp-organic'),
            ));
            ?>
        </div>
        <?php
    }
    /* --------------------- Team Social ---------------------- */
    function team_social(){
        ?>
        <div class="team-social">
            <?php
            cms_options(array(
                'id' => 'icon1',
                'label' => esc_html__('Icon 1','wp-organic'),
                'type' => 'text',
                'placeholder' => 'ex: fa fa-facebook',
            ));
            cms_options(array(
                'id' => 'link1',
                'label' => esc_html__('Link 1','wp-organic'),
                'type' => 'text',
            ));
            cms_options(array(
                'id' => 'icon2',
                'label' => esc_html__('Icon 2','wp-organic'),
                'type' => 'text',
            ));
            cms_options(array(
                'id' => 'link2',
                'label' => esc_html__('Link 2','wp-organic'),
                'type' => 'text',
            ));
            cms_options(array(
                'id' => 'icon3',
                'label' => esc_html__('Icon 3','wp-organic'),
                'type' => 'text',
            ));
            cms_options(array(
                'id' => 'link3',
                'label' => esc_html__('Link 3','wp-organic'),
                'type' => 'text',
            ));
            cms_options(array(
                'id' => 'icon4',
                'label' => esc_html__('Icon 4','wp-organic'),
                'type' => 'text',
            ));
            cms_options(array(
                'id' => 'link4',
                'label' => esc_html__('Link 4','wp-organic'),
                'type' => 'text',
            ));
            ?>
        </div>
        <?php
    }
    /* --------------------- Team Option ---------------------- */
    function product_options(){
        ?>
        <div class="cms-product">
            <?php
            cms_options(array(
                'id' => 'product_sub_title',
                'label' => esc_html__('Subtitle Product','wp-organic'),
                'type' => 'text',
                'placeholder' => esc_html__('Bursting full of flavour','wp-organic'),
            ));
            ?>
        </div>
        <?php
    }
    /* --------------------- portfolio Option ---------------------- */
    function portfolio_options(){
        ?>
        <div class="portfolio-option">
            <?php
            cms_options(array(
            'id' => 'portfolio_images_size',
            'label' => esc_html__('Images size','wp-organic'),
            'type' => 'select',
            'value'=>'',
            'options'=>array(
            ''=>'Images size',
            '2x'=>'2 Width',
            '2y'=>'2 Height ',
            'xy'=>'Width Equal Height',
            ),
            ));
            ?>
        </div>
        <?php
    }
    /* --------------------- Timeline Option ---------------------- */
    function timeline_options(){
        ?>
        <div class="timeline-option">
            <?php
            cms_options(array(
                'id' => 'timeline_year',
                'label' => esc_html__('Timeline Year','wp-organic'),
                'type' => 'text',
            ));
            ?>
        </div>
        <?php
    }
    /* --------------------- gallery Option ---------------------- */
    function gallery_options(){
        ?>
        <div class="gallery-option">
            <?php
            cms_options(array(
                'id' => 'subtitle_gallery',
                'label' => esc_html__('Subtitle','wp-organic'),
                'type' => 'text',
            ));
            ?>
        </div>
        <?php
    }
    /* --------------------- recipe Option ---------------------- */
    function recipe_options(){
       global $post;

        ?>
        <div class="tab-container clearfix">
            <ul class='etabs clearfix'>
                <li class="tab"><a href="#tabs-0"><?php esc_html_e('Recipe', 'wp-organic'); ?></a></li>
                <li class="tab"><a href="#tabs-1"><?php esc_html_e('Ingredients', 'wp-organic'); ?></a></li>
                <li class="tab"><a href="#tabs-2"><?php esc_html_e('Times', 'wp-organic'); ?></a></li>
                <li class="tab"><a href="#tabs-3"><?php esc_html_e('Skill', 'wp-organic'); ?></a></li>
                <li class="tab"><a href="#tabs-4"><?php esc_html_e('Calories', 'wp-organic'); ?></a></li>
            </ul>
            <div class='panel-container'>
                <div id="tabs-0">
                    <?php
                    cms_options(array(
                        'id' => 'recipe_subtitle',
                        'label' => esc_html__('Recipe Subtitle','wp-organic'),
                        'type' => 'text',
                    ));
                    cms_options(array(
                        'id' => 'recipe_serves',
                        'label' => esc_html__('Serves','wp-organic'),
                        'type' => 'number',
                    ));
                    cms_options(array(
                        'id' => 'recipe_recipes',
                        'label' => esc_html__('Recipe Html','wp-organic'),
                        'type' => 'editor',
                        'rows'   => 10
                    ));
                    cms_options(array(
                        'id' => 'recipe_ingredients',
                        'label' => esc_html__('Ingredients Html','wp-organic'),
                        'type' => 'editor',
                        'rows'   => 10
                    ));
                    ?>
                </div>
                <div id="tabs-1">
                    <?php

                    $_ingredients = get_post_meta($post->ID, '_cms_ingredients', true);

                    $_inputs = array();
                    if(!empty($_ingredients['ingredient'])){
                        foreach ($_ingredients['ingredient'] as $_id){
                            $_post = get_post($_id);
                            $_initvalue = $_post->post_title;

                            $_inputs[] = array(
                                array(
                                    'id' => 'ingredient',
                                    'label' => esc_html__('Enter ingredient ID','wp-organic'),
                                    'type' => 'text',
                                    'attributes' => array(
                                        'data-initvalue="'.$_initvalue.'"'
                                    )
                                ),
                                array(
                                    'id' => 'numbers',
                                    'label' => esc_html__('Numbers','wp-organic'),
                                    'type' => 'number',
                                    'value' => 1
                                )
                            );
                        }
                    } else {
                        $_inputs[] = array(
                            array(
                                'id' => 'ingredient',
                                'label' => esc_html__('Enter ingredient name','wp-organic'),
                                'type' => 'text',
                                'attributes' => array(
                                    'data-initvalue=""'
                                )
                            ),
                            array(
                                'id' => 'numbers',
                                'label' => esc_html__('Numbers','wp-organic'),
                                'type' => 'number',
                                'value' => 1
                            )
                        );
                    }
                    cms_options(array(
                        'id' => 'ingredients',
                        'label' => esc_html__('Ingredients','wp-organic'),
                        'type' => 'multiple_input',
                        'inputs'=> $_inputs
                    ));
                    ?>
                </div>
                <div id="tabs-2">
                    <?php
                    cms_options(array(
                        'id' => 'recipe_time',
                        'label' => esc_html__('Time','wp-organic'),
                        'type' => 'time',
                        'format' => 'H:i'
                    ));
                    cms_options(array(
                        'id' => 'recipe_time_icon1',
                        'label' => esc_html__('Icon Time','wp-organic'),
                        'type' => 'text',
                        'placeholder' => 'fa fa-child'
                    ));
                    cms_options(array(
                        'id' => 'recipe_time_icon2',
                        'label' => esc_html__('Icon Time','wp-organic'),
                        'type' => 'text',
                        'placeholder' => 'av_timer',
                        'desc'=>esc_html__('Apply only for font Material','wp-organic'),
                    ));
                    ?>
                </div>
                <div id="tabs-3">
                    <?php
                    cms_options(array(
                        'id' => 'recipe_skill',
                        'label' => esc_html__('Skill','wp-organic'),
                        'type' => 'select',
                        'value'=>'',
                        'options'=>array(
                            '1'=>'1',
                            '2'=>'2',
                            '3'=>'3',
                            '4'=>'4',
                            '5'=>'5',
                        ),
                    ));
                    cms_options(array(
                        'id' => 'recipe_skill_icon1',
                        'label' => esc_html__('Icon Skill','wp-organic'),
                        'type' => 'text',
                        'placeholder' => 'fa fa-child'
                    ));
                    cms_options(array(
                        'id' => 'recipe_skill_icon2',
                        'label' => esc_html__('Icon Skill','wp-organic'),
                        'type' => 'text',
                        'placeholder' => 'looks_4',
                        'desc'=>esc_html__('Apply only for font Material','wp-organic'),
                    ));
                    ?>
                </div>
                <div id="tabs-4">
                    <?php
                    cms_options(array(
                        'id' => 'recipe_calories',
                        'label' => esc_html__('Calories','wp-organic'),
                        'type' => 'text',
                    ));
                    cms_options(array(
                        'id' => 'recipe_calories_icon',
                        'label' => esc_html__('Icon Calories','wp-organic'),
                        'type' => 'text',
                        'placeholder' => 'fa fa-child'
                    ));
                    cms_options(array(
                        'id' => 'recipe_calories_icon2',
                        'label' => esc_html__('Icon Calories','wp-organic'),
                        'type' => 'text',
                        'placeholder' => 'restaurant_menu',
                        'desc'=>esc_html__('Apply only for font Material','wp-organic'),
                    ));
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
}

new CMSMetaOptions();