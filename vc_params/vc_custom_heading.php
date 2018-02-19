<?php
/**
 * Add custom headding params
 * 
 * @author Fox
 * @since 1.0.0
 */
vc_add_param("vc_custom_heading", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Custom Font Family", 'wp-organic'),
    "admin_label" => true,
    "param_name" => "cms_custom_font_family",
    "value" => array(
        "Default" => "",
        "Ostrich Sans Black" => "custom-font-3",
        "Proxima Nova Light" => "custom-font-6",
        "Proxima Nova Regular" => "custom-font-1",
        "Proxima Nova Bold" => "custom-font-7",
        "Proxima Nova SemiBold" => "custom-font-8",
        "Snell Roundhand" => "ft-snellroundhand",
    ),
    'group' => 'CMS Customs'
));
vc_add_param("vc_custom_heading", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Heading Letter Spacing", 'wp-organic'),
    "admin_label" => true,
    "param_name" => "letter_spacing",
    "value" => array(
        '0' => '0em',
        '-0.042em' => '-0.042em',
        '-0.01em' => '-0.01em',
        '0.01em' => '0.01em',
        '0.02em' => '0.02em',
        '0.025em' => '0.025em',
        '0.03em' => '0.03em',
        '0.035em' => '0.035em',
        '0.04em' => '0.04em',
        '0.045em' => '0.045em',
        '0.05em' => '0.05em',
        '0.055em' => '0.055em',
        '0.06em' => '0.06em',
        '0.065em' => '0.065em',
        '0.07em' => '0.07em',
        '0.075em' => '0.075em',
        '0.08em' => '0.08em',
        '0.085em' => '0.085em',
        '0.09em' => '0.09em',
        '0.095em' => '0.095em',
        '0.1em' => '0.1em',
        '0.105em' => '0.105em',
        '0.125em' => '0.125em',
        '0.2em' => '0.2em',
        '0.225em' => '0.225em',
        '0.3em' => '0.3em',
        '0.4em' => '0.4em',
        '0.5em' => '0.5em',
        '0.6em' => '0.6em',
        '0.7em' => '0.7em',
        '0.8em' => '0.8em',
        '0.9em' => '0.9em',
    ),
    'group' => 'CMS Customs'
));
