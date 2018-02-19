<?php
	$params = array(
		array(
            "type" => "colorpicker",
            "heading" => esc_html__("Description Color",'wp-organic'),
            "param_name" => "description_color",
            "value" => "",
            "group" => esc_html__("Template", 'wp-organic'),
            "template" => array(
            	"cms_carousel--layout-teatimonial3.php",
            ),
        ),
		array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color",'wp-organic'),
            "param_name" => "title_color",
            "value" => "",
            "group" => esc_html__("Template", 'wp-organic'),
            "template" => array(
            	"cms_carousel--layout-teatimonial2.php",
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Navigation Horizontal Center", 'wp-organic'),
            "param_name" => "navigation_horizontal_center",
            "value" => array(
                "No" => "no",
                "Yes" => "yes"                
            ),
            "template" => array(
                "cms_carousel--layout-client3.php",
            ),
            "group" => esc_html__("Template", 'wp-organic'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Row", 'wp-organic'),
            "param_name" => "number_row",
            "value" => array(
                "1" => "1",
                "2" => "2"
            ),
            "template" => array(
                "cms_carousel--layout-team4.php",
            ),
            "group" => esc_html__("Template", 'wp-organic'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Navigation Align", 'wp-organic'),
            "param_name" => "navigation_align",
            "value" => array(
                "Default" => "nav-default",
                "Top Right" => "nav-top-right"                
            ),
            "template" => array(
                "cms_carousel--layout-practice6.php",
                "cms_carousel--layout-client1.php",
                "cms_carousel--layout-client2.php",
                "cms_carousel--layout-client3.php",
            ),
            "group" => esc_html__("Template", 'wp-organic'),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Testimonial Color",'wp-organic'),
            "param_name" => "testimonial_color",
            "value" => "",
            "group" => esc_html__("Template", 'wp-organic'),
            "template" => array(
                "cms_carousel--layout-testimonial.php",
                "cms_carousel--layout-testimonial2.php",
            ),
        ),
        
	);
	vc_remove_param('cms_carousel','cms_template');
	$cms_template_attribute = array(
		'type' => 'cms_template_img',
	    'param_name' => 'cms_template',
	    "shortcode" => "cms_carousel",
	    "heading" => esc_html__("Shortcode Template",'wp-organic'),
	    "admin_label" => true,
	    "group" => esc_html__("Template", 'wp-organic'),
		);
	vc_add_param('cms_carousel',$cms_template_attribute);
?>