<?php
/**
 * Travel Way Theme Customizer.
 *
 * @package Acme Themes
 * @subpackage Travel Way
 */

/*
* file for upgrade to pro
*/
require travel_way_file_directory('acmethemes/customizer/customizer-pro/class-customize.php');

/*
* file for customizer core functions
*/
require travel_way_file_directory('acmethemes/customizer/customizer-core.php');

/*
* file for customizer sanitization functions
*/
require travel_way_file_directory('acmethemes/customizer/sanitize-functions.php');

/**
 * Adding different options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function travel_way_customize_register( $wp_customize ) {

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    /*saved options*/
    $options  = travel_way_get_theme_options();

    /*defaults options*/
    $defaults = travel_way_get_default_theme_options();

    /*custom controls*/
    require travel_way_file_directory('acmethemes/customizer/custom-controls.php');
	require travel_way_file_directory('acmethemes/customizer/customizer-repeater/customizer-control-repeater.php');

    /*
     * file for feature panel of home page
     */
    require travel_way_file_directory('acmethemes/customizer/feature-section/feature-panel.php');

    /*
    * file for header panel
    */
    require travel_way_file_directory('acmethemes/customizer/header-options/header-panel.php');

    /*
    * file for customizer footer section
    */
    require travel_way_file_directory('acmethemes/customizer/footer-options/footer-panel.php');

    /*
    * file for design/layout panel
    */
    require travel_way_file_directory('acmethemes/customizer/design-options/design-panel.php');

	/*
   * file for single panel
   */
	require travel_way_file_directory('acmethemes/customizer/single-posts/single-post-panel.php');

    /*
     * file for options panel
     */
    require travel_way_file_directory('acmethemes/customizer/options/options-panel.php');

	/*woocommerce options*/
	if ( travel_way_is_woocommerce_active() ) :
		require_once travel_way_file_directory('acmethemes/customizer/wc-options/wc-panel.php');
	endif;

    /*sorting core and widget for ease of theme use*/
    $wp_customize->get_section( 'static_front_page' )->priority = 10;
    
    $travel_way_home_section = $wp_customize->get_section( 'sidebar-widgets-travel-way-home' );
    if ( ! empty( $travel_way_home_section ) ) {
        $travel_way_home_section->panel         = '';
        $travel_way_home_section->title         = esc_html__( 'Home Main Content Area ', 'travel-way' );
        $travel_way_home_section->priority      = 80;
    }

    /*customizing default colors section and adding new controls-setting too*/
    $wp_customize->get_section( 'colors' )->panel = 'travel-way-design-panel';
    $wp_customize->get_section( 'colors' )->title = esc_html__( 'Basic Color', 'travel-way' );
    $wp_customize->get_section( 'background_image' )->priority = 100;

    /*Background Image*/
    $wp_customize->get_section( 'background_image' )->panel = 'travel-way-design-panel';
    $wp_customize->get_section( 'background_image' )->priority = 60;

    /*adding header image inside this panel*/
    $wp_customize->get_section( 'header_image' )->panel = 'travel-way-header-panel';
    $wp_customize->get_section( 'header_image' )->description = esc_html__( 'Applied to header image of inner pages.', 'travel-way' );

    /*TODO WP 5.8*/
    /*$travel_way_popup_widget_area = $wp_customize->get_section( 'sidebar-widgets-popup-widget-area' );
    if ( ! empty( $travel_way_popup_widget_area ) ) {
        $travel_way_popup_widget_area->panel = 'travel-way-header-panel';
        $travel_way_popup_widget_area->title = esc_html__( 'Popup Widgets', 'travel-way' );
        $travel_way_popup_widget_area->priority = 999;

        $travel_way_popup_widget_title = $wp_customize->get_control( 'travel_way_theme_options[travel-way-popup-widget-title]' );
        if ( ! empty( $travel_way_popup_widget_title ) ) {
            $travel_way_popup_widget_title->section  = 'sidebar-widgets-popup-widget-area';
            $travel_way_popup_widget_title->priority = -1;
        }
    }*/
}
add_action( 'customize_register', 'travel_way_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function travel_way_customize_preview_js() {
    wp_enqueue_script( 'travel-way-customizer', get_template_directory_uri() . '/acmethemes/core/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'travel_way_customize_preview_js' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function travel_way_customize_controls_scripts() {
    wp_enqueue_script( 'travel-way-customizer-controls', get_template_directory_uri() . '/acmethemes/core/js/customizer-controls.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'travel_way_customize_controls_scripts' );