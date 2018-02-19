<?php
vc_map(array(
    "name" => 'CMS Call To Action',
    "base" => "cms_cta",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'wp-organic'),
    "params" => array(
        array(
            "type" => "textarea",
            "heading" => __ ( 'Call to action Sub Title', 'wp-organic' ),
            "param_name" => "cta_subtext",
            "value" => '',
            "group" => esc_html__("Settings", 'wp-organic')
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Call to action Sub Title color",'wp-organic'),
            "param_name" => "cta_subtext_color",
            "value" => "",
            "group" => esc_html__("Settings", 'wp-organic')
        ),
        array(
            "type" => "textarea",
            "heading" => __ ( 'Call to action Title', 'wp-organic' ),
            "param_name" => "cta_text",
            "value" => '',
            "group" => esc_html__("Settings", 'wp-organic')
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Call to action Title - Font size', 'wp-organic' ),
            "param_name" => "cta_text_font_size",
            "value" => '',
            "group" => esc_html__("Settings", 'wp-organic'),
            'dependency' => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_cta--style2.php",
                )
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Call to action Title - Line Height', 'wp-organic' ),
            "param_name" => "cta_text_line_height",
            "value" => '',
            "group" => esc_html__("Settings", 'wp-organic'),
            'dependency' => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_cta--style2.php",
                )
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Call to action Title - Margin', 'wp-organic' ),
            "param_name" => "cta_text_margin",
            "value" => '',
            "group" => esc_html__("Settings", 'wp-organic'),
            'dependency' => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_cta--style2.php",
                )
            ),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Call to action Title color",'wp-organic'),
            "param_name" => "cta_text_color",
            "value" => "",
            "group" => esc_html__("Settings", 'wp-organic')
        ),

        array(
            "type" => "textfield",
            "heading" => __ ( 'Text on the button 1', 'wp-organic' ),
            "param_name" => "button_text1",
            "value" => 'button',
            "group" => esc_html__("Settings", 'wp-organic')
        ),
        array(
            "type" => "vc_link",
            "class" => "",
            "heading" => esc_html__("Link button 1", 'wp-organic'),
            "param_name" => "link_button1",
            "value" => '',
            "group" => esc_html__("Settings", 'wp-organic')
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Text on the button 2', 'wp-organic' ),
            "param_name" => "button_text2",
            "value" => 'button',
            "group" => esc_html__("Settings", 'wp-organic')
        ),
        array(
            "type" => "vc_link",
            "class" => "",
            "heading" => esc_html__("Link button 2", 'wp-organic'),
            "param_name" => "link_button2",
            "value" => '',
            "group" => esc_html__("Settings", 'wp-organic')
        ),
        /* Start Icon */
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon library', 'wp-organic' ),
            'value' => array(
                esc_html__( 'Font Awesome', 'wp-organic' ) => 'fontawesome',
                esc_html__( 'Open Iconic', 'wp-organic' ) => 'openiconic',
                esc_html__( 'Typicons', 'wp-organic' ) => 'typicons',
                esc_html__( 'Entypo', 'wp-organic' ) => 'entypo',
                esc_html__( 'Linecons', 'wp-organic' ) => 'linecons',
                esc_html__( 'Pixel', 'wp-organic' ) => 'pixelicons',
                esc_html__( 'P7 Stroke', 'wp-organic' ) => 'pe7stroke',
                esc_html__( 'RT Icon', 'wp-organic' ) => 'rticon',
            ),
            'param_name' => 'icon_type',
            'description' => esc_html__( 'Select icon library.', 'wp-organic' ),
            "group" => esc_html__("Settings", 'wp-organic'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'wp-organic' ),
            'param_name' => 'icon_fontawesome',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'fontawesome',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__( 'Select icon from library.', 'wp-organic' ),
            "group" => esc_html__("Settings", 'wp-organic'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'wp-organic' ),
            'param_name' => 'icon_openiconic',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'openiconic',
            ),
            'description' => esc_html__( 'Select icon from library.', 'wp-organic' ),
            "group" => esc_html__("Settings", 'wp-organic'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'wp-organic' ),
            'param_name' => 'icon_typicons',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'typicons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'wp-organic' ),
            "group" => esc_html__("Settings", 'wp-organic'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'wp-organic' ),
            'param_name' => 'icon_entypo',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'entypo',
            ),
            'description' => esc_html__( 'Select icon from library.', 'wp-organic' ),
            "group" => esc_html__("Settings", 'wp-organic'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'wp-organic' ),
            'param_name' => 'icon_linecons',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'linecons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'wp-organic' ),
            "group" => esc_html__("Settings", 'wp-organic'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'wp-organic' ),
            'param_name' => 'icon_pixelicons',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'pixelicons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'pixelicons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'wp-organic' ),
            "group" => esc_html__("Settings", 'wp-organic'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'wp-organic' ),
            'param_name' => 'icon_pe7stroke',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'pe7stroke',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'pe7stroke',
            ),
            'description' => esc_html__( 'Select icon from library.', 'wp-organic' ),
            "group" => esc_html__("Settings", 'wp-organic'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'wp-organic' ),
            'param_name' => 'icon_rticon',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'rticon',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'rticon',
            ),
            'description' => esc_html__( 'Select icon from library.', 'wp-organic' ),
            "group" => esc_html__("Settings", 'wp-organic'),
        ),
        /* End Icon */
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Icon Align", 'wp-organic'),
            "admin_label" => true,
            "param_name" => "icon_align",
            "value" => array(
                "Left" => "left",
                "Right" => "right"
            ),
            "group" => esc_html__("Settings", 'wp-organic'),
        ),


        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Align", 'wp-organic'),
            'param_name' => 'button_align',
            'value' => array(
                'Right' => 'cta-right',   
                'Left' => 'cta-left',        
            ),
            "group" => esc_html__("Settings", 'wp-organic'),
            'dependency' => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_cta.php",
                    "cms_cta--style1.php",
                )
            ),
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Icon images button 1",'wp-organic'),
            "param_name" => "image_icon1",
            "group" => esc_html__("Template", 'wp-organic'),
            'dependency' => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_cta.php",
                )
            ),
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Icon images button 2",'wp-organic'),
            "param_name" => "image_icon2",
            "group" => esc_html__("Template", 'wp-organic'),
            'dependency' => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_cta.php",
                )
            ),
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Background Images ",'wp-organic'),
            "param_name" => "image_background",
            "group" => esc_html__("Template", 'wp-organic'),
            'dependency' => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_cta.php",
                )
            ),
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Call to action Align", 'wp-organic'),
            'param_name' => 'cta_align',
            'value' => array(
                'Center' => 'cta-align-center',        
                'Left' => 'cta-align-left',        
                'Right' => 'cta-align-right',        
            ),
            "group" => esc_html__("Settings", 'wp-organic'),
            'dependency' => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_cta--style2.php",
                )
            ),
        ),  

        array(
            "type" => "textfield",
            "heading" => __ ( "Extra class name", 'wp-organic' ),
            "param_name" => "el_class",
            "description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'wp-organic' ),
            "group" => esc_html__("Settings", 'wp-organic'),
        ), 
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "cms_cta",
            "heading" => esc_html__("Shortcode Template",'wp-organic'),
            "admin_label" => true,
            "group" => esc_html__("Template", 'wp-organic'),
        ),
    )
));

class WPBakeryShortCode_cms_cta extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>