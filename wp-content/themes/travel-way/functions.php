<?php
/**
 * Travel Way functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Acme Themes
 * @subpackage Travel Way
 */

/**
 * Default Theme layout options
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_theme_layout
 *
 */
if ( !function_exists('travel_way_get_default_theme_options') ) :
    function travel_way_get_default_theme_options() {

        $default_theme_options = array(

            /*logo and site title*/
            'travel-way-display-site-logo'      => '',
            'travel-way-display-site-title'     => 1,
            'travel-way-display-site-tagline'   => 1,

            /*header height*/
            'travel-way-header-height'          => 300,
            'travel-way-header-image-display'   => 'normal-image',

            /*header top*/
            'travel-way-enable-header-top'       => '',
            'travel-way-header-top-menu-display-selection'      => 'right',
            'travel-way-header-top-info-display-selection'      => 'left',
            'travel-way-header-top-social-display-selection'    => 'right',

            /*menu options*/
            'travel-way-enable-transparent'             => '',
            'travel-way-enable-sticky'                  => '',
            'travel-way-menu-right-button-options'      => 'disable',
            'travel-way-menu-right-button-title'        => esc_html__('Request a Quote','travel-way'),
            'travel-way-menu-right-button-link'         => '',
            'travel-way-enable-cart-icon'               => '',

            /*feature section options*/
            'travel-way-enable-feature'                         => '',
            'travel-way-slides-data'                            => '',
            'travel-way-feature-slider-enable-animation'        => 1,
            'travel-way-feature-slider-display-title'           => 1,
            'travel-way-feature-slider-display-excerpt'         => 1,
            'travel-way-fs-image-display-options'               => 'full-screen-bg',
            'travel-way-feature-slider-text-align'              => 'text-left',

            /*basic info*/
            'travel-way-feature-info-number'    => 4,
            'travel-way-first-info-icon'        => 'fa-calendar',
            'travel-way-first-info-title'       => esc_html__('Send Us a Mail', 'travel-way'),
            'travel-way-first-info-desc'        => esc_html__('domain@example.com ', 'travel-way'),
            'travel-way-second-info-icon'       => 'fa-map-marker',
            'travel-way-second-info-title'      => esc_html__('Our Location', 'travel-way'),
            'travel-way-second-info-desc'       => esc_html__('Elmonte California', 'travel-way'),
            'travel-way-third-info-icon'        => 'fa-phone',
            'travel-way-third-info-title'       => esc_html__('Call Us', 'travel-way'),
            'travel-way-third-info-desc'        => esc_html__('01-23456789-10', 'travel-way'),
            'travel-way-forth-info-icon'        => 'fa-envelope-o',
            'travel-way-forth-info-title'       => esc_html__('Office Hours', 'travel-way'),
            'travel-way-forth-info-desc'        => esc_html__('8 hours per day', 'travel-way'),

            /*footer options*/
            'travel-way-footer-copyright'                       => esc_html__( '&copy; All right reserved', 'travel-way' ),
            'travel-way-footer-copyright-beside-option'         => 'footer-menu',
            'travel-way-footer-bg-img'                          => '',

            /*layout/design options*/
            'travel-way-pagination-option'      => 'numeric',

            'travel-way-enable-animation'       => '',

            'travel-way-single-sidebar-layout'                  => 'right-sidebar',
            'travel-way-front-page-sidebar-layout'              => 'right-sidebar',
            'travel-way-archive-sidebar-layout'                 => 'right-sidebar',

            'travel-way-blog-archive-img-size'                  => 'full',
            'travel-way-blog-archive-content-from'              => 'excerpt',
            'travel-way-blog-archive-excerpt-length'            => 42,
            'travel-way-blog-archive-more-text'                 => esc_html__( 'Read More', 'travel-way' ),

            'travel-way-primary-color'          => '#77a6f7',
            'travel-way-header-top-bg-color'    => '#77a6f7',
            'travel-way-footer-bg-color'        => '#434a54',
            'travel-way-footer-bottom-bg-color' => '#414852',
            'travel-way-link-color'             => '#f4364f',
            'travel-way-link-hover-color'       => '#fc002a',

            /*Front Page*/
            'travel-way-hide-front-page-content' => '',
            'travel-way-hide-front-page-header'  => '',


            /*woocommerce*/
            'travel-way-wc-shop-archive-sidebar-layout'     => 'no-sidebar',
            'travel-way-wc-product-column-number'           => 4,
            'travel-way-wc-shop-archive-total-product'      => 16,
            'travel-way-wc-single-product-sidebar-layout'   => 'no-sidebar',

            /*single post*/
            'travel-way-single-header-title'            => esc_html__( 'Blog', 'travel-way' ),
            'travel-way-single-img-size'                => 'full',

            /*theme options*/
            'travel-way-popup-widget-title'     => esc_html__( 'Request a Quote', 'travel-way' ),
            'travel-way-show-breadcrumb'        => 1,
            'travel-way-search-placeholder'     => esc_html__( 'Search', 'travel-way' ),
            'travel-way-social-data'            => ''
        );
        return apply_filters( 'travel_way_default_theme_options', $default_theme_options );
    }
endif;

/**
 * Get theme options
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array travel_way_theme_options
 *
 */
if ( !function_exists('travel_way_get_theme_options') ) :
    function travel_way_get_theme_options() {

        $travel_way_default_theme_options = travel_way_get_default_theme_options();
        $travel_way_get_theme_options = get_theme_mod( 'travel_way_theme_options');
        if( is_array( $travel_way_get_theme_options )){
            return array_merge( $travel_way_default_theme_options ,$travel_way_get_theme_options );
        }
        else{
            return $travel_way_default_theme_options;
        }
    }
endif;

$travel_way_saved_theme_options = travel_way_get_theme_options();
$GLOBALS['travel_way_customizer_all_values'] = $travel_way_saved_theme_options;

/**
 * Require init.
 */
require trailingslashit( get_template_directory() ).'acmethemes/init.php';