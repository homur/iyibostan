<?php
vc_map(array(
    "name" => 'CMS Step',
    "base" => "cms_step",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'wp-organic'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Title Item 1', 'wp-organic' ),
            "param_name" => "item1_title",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 1', 'wp-organic' ),
                "param_name" => "item1_icon1",
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_step.php",
                    "cms_step--layout2.php"
                )
            ),

        ),
        array(
                "type" => "attach_image",
                "heading" => esc_html__( 'Icon image 1', 'wp-organic' ),
                "param_name" => "item1_iconimage",
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_step.php",
                    "cms_step--layout2.php"
                )
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Item 1 Status", 'wp-organic'),
            "param_name" => "item1_status",
            "value" => array(
                "Do not Complete " => "no-complete",
                "Completed" => "item-completed"
            ),

        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Title Item 2', 'wp-organic' ),
            "param_name" => "item2_title",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Icon 2', 'wp-organic' ),
            "param_name" => "item2_icon2",
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_step.php",
                    "cms_step--layout2.php"
                )
            ),
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__( 'Icon image 2', 'wp-organic' ),
            "param_name" => "item2_iconimage",
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_step.php",
                    "cms_step--layout2.php"
                )
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Item 2 Status", 'wp-organic'),
            "param_name" => "item2_status",
            "value" => array(
                "Do not Complete " => "no-complete",
                "Completed" => "item-completed"
            ),

        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Title Item 3', 'wp-organic' ),
            "param_name" => "item3_title",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Icon 3', 'wp-organic' ),
            "param_name" => "item3_icon3",
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_step.php",
                    "cms_step--layout2.php"
                )
            ),
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__( 'Icon image 3', 'wp-organic' ),
            "param_name" => "item3_iconimage",
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_step.php",
                    "cms_step--layout2.php"
                )
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Item 3 Status", 'wp-organic'),
            "param_name" => "item3_status",
            "value" => array(
                "Do not Complete " => "no-complete",
                "Completed" => "item-completed"
            ),

        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Title Item 4', 'wp-organic' ),
            "param_name" => "item4_title",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Icon 4', 'wp-organic' ),
            "param_name" => "item4_icon4",
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_step.php",
                    "cms_step--layout2.php"
                )
            ),
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__( 'Icon image 4', 'wp-organic' ),
            "param_name" => "item4_iconimage",
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_step.php",
                    "cms_step--layout2.php"
                )
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Item 4 Status", 'wp-organic'),
            "param_name" => "item4_status",
            "value" => array(
                "Do not Complete " => "no-complete",
                "Completed" => "item-completed"
            ),

        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Title Item 5', 'wp-organic' ),
            "param_name" => "item5_title",
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_step--layout3.php",
                )
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Item 5 Status", 'wp-organic'),
            "param_name" => "item5_status",
            "value" => array(
                "Do not Complete " => "no-complete",
                "Completed" => "item-completed"
            ),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_step--layout3.php",
                )
            ),

        ),
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "cms_step",
            "heading" => esc_html__("Shortcode Template",'wp-organic'),
            "admin_label" => true,
            "group" => esc_html__("Template", 'wp-organic'),
        ),
    )
));

class WPBakeryShortCode_cms_step extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}
?>