<?php
	/** Add pamrams **/
	$params = array(
		array(
			'type' => 'cms_template_img',
		    'param_name' => 'cms_template',
		    "shortcode" => "cms_fancybox_single",
		    "heading" => esc_html__("Shortcode Template",'wp-organic'),
		    "admin_label" => true,
		    "group" => esc_html__("Template", 'wp-organic'),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Custom Icon -  Add Class Icon",'wp-organic'),
			"param_name" => "icon_custom",
			"value" => "",
			"group" => esc_html__("Template", 'wp-organic'),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Text Custom Icon -  Add Class Icon",'wp-organic'),
			"param_name" => "icon_custom_text",
			"value" => "",
			"group" => esc_html__("Template", 'wp-organic'),
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
			"template" => array(
				"cms_fancybox_single--layout8.php"
			),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Title - Number",'wp-organic'),
			"param_name" => "title_number",
			"value" => "",
			"group" => esc_html__("Template", 'wp-organic'),
			"template" => array(
                "cms_fancybox_single.php",
				"cms_fancybox_single--layout3.php"
            ),
		),

	);


	/** Remove pamrams **/
	vc_remove_param( "cms_fancybox_single", "title" );
	vc_remove_param( "cms_fancybox_single", "description" );
	vc_remove_param( "cms_fancybox_single", "content_align" );
?>