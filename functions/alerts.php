<?php 

function sb_alert_customise_register($wp_customize) {
	$wp_customize->add_section("sb_alert", array(
		"title" => "Alert",
		"priority" => 50
	));
	$wp_customize->add_setting("sb_alert_type", array(
		"default" => "",
		"transport" => "refresh"
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"sb_alert_type",
		array(
			"label" => "Alert type",
			"section" => "sb_alert",
			"settings" => "sb_alert_type",
			"type" => "select",
			"choices" => array(
				"" => "Default",
				"error" => "Error",
				"warning" => "Warning",
				"success" => "Success"
			)
		)
	));
	$wp_customize->add_setting("sb_alert_message", array(
		"default" => "",
		"transport" => "refresh"
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"sb_alert_message",
		array(
			"label" => "Message",
			"section" => "sb_alert",
			"settings" => "sb_alert_message",
			"type" => "textarea"
		)
	));
}
add_action("customize_register", "sb_alert_customise_register");