<?php
	$params = array(
		array(
			'type' => 'cms_template_img',
		    'param_name' => 'cms_template',
		    "shortcode" => "cms_counter_single",
		    "heading" => esc_html__("Shortcode Template",'wp-organic'),
		    "admin_label" => true,
		    "group" => esc_html__("Template", 'wp-organic'),
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Icon Color",'wp-organic'),
			"param_name" => "icon_color",
			"value" => "",
			"group" => esc_html__("Template", 'wp-organic')
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Digit Color",'wp-organic'),
			"param_name" => "digit_color",
			"value" => "",
			"group" => esc_html__("Template", 'wp-organic')
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Title Color",'wp-organic'),
			"param_name" => "title_color",
			"value" => "",
			"group" => esc_html__("Template", 'wp-organic')
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Icon Font Size",'wp-organic'),
			"param_name" => "icon_fontsize",
			"value" => "",
			"group" => esc_html__("Template", 'wp-organic')
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Custom Icon -  Add Class Icon",'wp-organic'),
			"param_name" => "icon_custom",
			"value" => "",
			"group" => esc_html__("Template", 'wp-organic'),
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Border style", 'wp-organic'),
			"param_name" => "border_style",
			"value" => array(
				"Yes" => "yes",
				"No" => "no"
			),
			"group" => esc_html__("Template", 'wp-organic'),
			"template" => array(
				"cms_counter_single--layout2.php"
			),
		),
	);
	/** Remove pamrams **/
	vc_remove_param( "cms_counter_single", "title" );
	vc_remove_param( "cms_counter_single", "description" );
	vc_remove_param( "cms_counter_single", "content_align" );
?>