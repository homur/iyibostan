<?php
vc_map(array(
    "name" => 'CMS Heading',
    "base" => "cms_heading",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'wp-organic'),
    "params" => array(

        array(
            "type" => "textfield",
            "heading" => __ ( 'Title', 'wp-organic' ),
            "param_name" => "hd_title",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'wp-organic'),
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Subtitle', 'wp-organic' ),
            "param_name" => "hd_subtitle",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'wp-organic'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading.php",
                    "cms_heading--layout2.php",
                    "cms_heading--layout3.php",
                )
            ),
        ),

        array(
            "type" => "textarea",
            "heading" => __ ( 'Description', 'wp-organic' ),
            "param_name" => "hd_description",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'wp-organic'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading--layout2.php",
                    "cms_heading--layout3.php",
                    "cms_heading--layout4.php",
                )
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Letter spacing title', 'wp-organic' ),
            "value" => array(
                '0' => '0em',
                '-0.042em' => '-0.042em',
                '-0.01em' => '-0.01em',
                '0.01em' => '0.01em',
                '0.02em' => '0.02em',
                '0.02em' => '0.025em',
                '0.03em' => '0.03em',
                '0.035em' => '0.035em',
                '0.04em' => '0.04em',
                '0.05em' => '0.05em',
                '0.06em' => '0.06em',
                '0.07em' => '0.07em',
                '0.075em' => '0.075em',
                '0.08em' => '0.08em',
                '0.09em' => '0.09em',
                '0.1em' => '0.1em',
                '0.2em' => '0.2em',
                '0.3em' => '0.3em',
                '0.4em' => '0.4em',
                '0.5em' => '0.5em',
                '0.6em' => '0.6em',
                '0.7em' => '0.7em',
                '0.8em' => '0.8em',
                '0.9em' => '0.9em',
            ),
            'param_name' => 'heading_letter_spacing',
            'description' => '',
            "group" => esc_html__("Heading Tittle Settings", 'wp-organic'),

        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Title Color', 'wp-organic' ),
            'param_name' => 'heading_color',
            'description' => '',
            "group" => esc_html__("Heading Tittle Settings", 'wp-organic'),

        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Title Font Size', 'wp-organic' ),
            'param_name' => 'heading_size',
            'description' => '',
            "group" => esc_html__("Heading Tittle Settings", 'wp-organic'),

        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Title lineheight', 'wp-organic' ),
            'param_name' => 'heading_lineheight',
            'description' => '',
            "group" => esc_html__("Heading Tittle Settings", 'wp-organic'),

        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Description Color', 'wp-organic' ),
            'param_name' => 'desc_color',
            'description' => '',
            "group" => esc_html__("Description Settings", 'wp-organic'),

        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Description Font Size', 'wp-organic' ),
            'param_name' => 'desc_size',
            'description' => '',
            "group" => esc_html__("Description Settings", 'wp-organic'),

        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Description lineheight', 'wp-organic' ),
            'param_name' => 'desc_lineheight',
            'description' => '',
            "group" => esc_html__("Description Settings", 'wp-organic'),

        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Subtitle Margin Bottom', 'wp-organic' ),
            'param_name' => 'subtitle_bottom',
            'description' => '',
            "group" => esc_html__("Heading Settings", 'wp-organic'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading--layout2.php",
                )
            ),

        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Subtitle padding right', 'wp-organic' ),
            "param_name" => "hd_subtitle_padding",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'wp-organic'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading--layout2.php",
                )
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Text align', 'wp-organic' ),
            'value' => array(
                '' => 'default',
                'center' => 'center',
                'left'=> 'left',
                'right'=> 'right',
            ),
            'param_name' => 'hd_text_align',
            "group" => esc_html__("Heading Settings", 'wp-organic'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading.php",
                    "cms_heading--layout2.php",
                    "cms_heading--layout3.php",
                )
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Layout style", 'wp-organic'),
            "param_name" => "layout_style",
            "value" => array(
                "Style 1" => "style1",
                "Style 2" => "style2"
            ),
            "group" => esc_html__("Template", 'wp-organic'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading--layout2.php",
                )
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Button Text', "wp-organic" ),
            "param_name" => "hd_btn_text",
            "value" => '',
            "group" => esc_html__("Heading Settings", "wp-organic"),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading--layout4.php",
                )
            ),
        ),

        array(
            "type" => "vc_link",
            "heading" => __ ( 'Button Link', "wp-organic" ),
            "param_name" => "hd_btn_link",
            "value" => '',
            "group" => esc_html__("Heading Settings", "wp-organic"),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading--layout4.php",
                )
            ),
        ),
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "cms_heading",
            "heading" => esc_html__("Shortcode Template",'wp-organic'),
            "admin_label" => true,
            "group" => esc_html__("Template", 'wp-organic'),
        ),

    )
));

class WPBakeryShortCode_cms_heading extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>