<?php
vc_map(array(
    "name" => 'CMS Button',
    "base" => "cms_button",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'wp-organic'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __ ( 'Text on the button', 'wp-organic' ),
            "param_name" => "button_text",
            "value" => 'button',
            "group" => esc_html__("Button Settings", 'wp-organic')
        ),
        array(
            "type" => "vc_link",
            "class" => "",
            "heading" => esc_html__("Link button", 'wp-organic'),
            "param_name" => "link_button",
            "value" => '',
            "group" => esc_html__("Button Settings", 'wp-organic')
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
            "group" => esc_html__("Button Settings", 'wp-organic'),
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
            "group" => esc_html__("Button Settings", 'wp-organic'),
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
            "group" => esc_html__("Button Settings", 'wp-organic'),
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
            "group" => esc_html__("Button Settings", 'wp-organic'),
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
            "group" => esc_html__("Button Settings", 'wp-organic'),
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
            "group" => esc_html__("Button Settings", 'wp-organic'),
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
            "group" => esc_html__("Button Settings", 'wp-organic'),
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
            "group" => esc_html__("Button Settings", 'wp-organic'),
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
            "group" => esc_html__("Button Settings", 'wp-organic'),
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
            "group" => esc_html__("Button Settings", 'wp-organic'),
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Style", 'wp-organic'),
            'param_name' => 'button_style',
            'value' => array(
                'Theme Default' => 'btn-default',    
                'Button Default 1' => 'btn-default2',
                'Button Default 2' => 'btn-default3',
                'Button Default 3' => 'btn-default4',
                'Button Default Alt style1' => 'btn-default-alt',
                'Button Default Alt style 2' => 'btn-default-alt btn-default-alt-style2 ',
                'Button Default Alt style 3' => 'btn-default-alt btn-default-alt-style3 ',
            ),
            "group" => esc_html__("Button Settings", 'wp-organic'),
        ),  
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Size", 'wp-organic'),
            'param_name' => 'button_size',
            'value' => array(
                'Default' => '',
                'Super' => 'btn-super',
                'Large' => 'btn-lg',
                'Large 2' => 'btn-lg btn-lg2',
                'Medium' => 'btn-md2',
                'Small' => 'btn-sm',
                'Tiny' => 'btn-tiny',
                'Mini' => 'btn-xs',

            ),
            "group" => esc_html__("Button Settings", 'wp-organic'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__("Button Shape", 'wp-organic'),
            'param_name' => 'button_shape',
            'value' => array(
                'Default' => '',
                'Square' => 'btn-square',
                'Rounded' => 'btn-rounded',
                'Circle' => 'btn-circle',
                'Circle large' => 'btn-circle-large',

            ),
            "group" => esc_html__("Button Settings", 'wp-organic'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__("Button Color", 'wp-organic'),
            'param_name' => 'button_color',
            'value' => array(
                'Default' => '',
                'Primary' => 'btn-primary',
                'Secondary' => 'btn-secondary',
                'Info' => 'btn-info',
                'Warning' => 'btn-warning',
                'Danger' => 'btn-danger',
            ),
            "group" => esc_html__("Button Settings", 'wp-organic'),
        ),

        array(
            "type" => "textfield",
            "heading" => __ ( "Extra class name", 'wp-organic' ),
            "param_name" => "el_class",
            "description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'wp-organic' ),
            "group" => esc_html__("Button Settings", 'wp-organic'),
        ),

    )
));

class WPBakeryShortCode_cms_button extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>