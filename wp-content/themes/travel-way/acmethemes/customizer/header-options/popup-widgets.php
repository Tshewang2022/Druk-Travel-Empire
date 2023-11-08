<?php
/*Title*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-popup-widget-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-popup-widget-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-popup-widget-title]', array(
	'label'		        => esc_html__( 'Main Title', 'travel-way' ),
	'section'           => 'travel-way-menu-options',
	'settings'          => 'travel_way_theme_options[travel-way-popup-widget-title]',
	'type'	  	        => 'text',
    'active_callback'   => 'travel_way_menu_right_button_if_booking',
) );