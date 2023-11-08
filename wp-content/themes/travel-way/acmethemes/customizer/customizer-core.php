<?php
/**
 * Menu and Logo Display Options
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_header_image_display
 *
 */
if ( !function_exists('travel_way_header_image_display') ) :
	function travel_way_header_image_display() {
		$travel_way_header_image_display =  array(
			'hide'              => esc_html__( 'Hide', 'travel-way' ),
			'bg-image'          => esc_html__( 'Background Image', 'travel-way' ),
			'normal-image'      => esc_html__( 'Normal Image', 'travel-way' )
		);
		return apply_filters( 'travel_way_header_image_display', $travel_way_header_image_display );
	}
endif;

/**
 * Menu Right Button Link Options
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_menu_right_button_link_options
 *
 */
if ( !function_exists('travel_way_menu_right_button_link_options') ) :
	function travel_way_menu_right_button_link_options() {
		$travel_way_menu_right_button_link_options =  array(
			'disable'       => esc_html__( 'Disable', 'travel-way' ),
			'booking'       => esc_html__( 'Popup Widgets ( Booking Form )', 'travel-way' ),
			'link'          => esc_html__( 'Open Link', 'travel-way' )
		);
		return apply_filters( 'travel_way_menu_right_button_link_options', $travel_way_menu_right_button_link_options );
	}
endif;

/**
 * Header top display options of elements
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_header_top_display_selection
 *
 */
if ( !function_exists('travel_way_header_top_display_selection') ) :
	function travel_way_header_top_display_selection() {
		$travel_way_header_top_display_selection =  array(
			'hide'          => esc_html__( 'Hide', 'travel-way' ),
			'left'          => esc_html__( 'on Top Left', 'travel-way' ),
			'right'         => esc_html__( 'on Top Right', 'travel-way' )
		);
		return apply_filters( 'travel_way_header_top_display_selection', $travel_way_header_top_display_selection );
	}
endif;

/**
 * Feature slider text align
 *
 * @since Mercantile 1.0.0
 *
 * @param null
 * @return array $travel_way_slider_text_align
 *
 */
if ( !function_exists('travel_way_slider_text_align') ) :
	function travel_way_slider_text_align() {
		$travel_way_slider_text_align =  array(
			'alternate'     => esc_html__( 'Alternate', 'travel-way' ),
			'text-left'     => esc_html__( 'Left', 'travel-way' ),
			'text-right'    => esc_html__( 'Right', 'travel-way' ),
			'text-center'   => esc_html__( 'Center', 'travel-way' )
		);
		return apply_filters( 'travel_way_slider_text_align', $travel_way_slider_text_align );
	}
endif;

/**
 * Featured Slider Image Options
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_fs_image_display_options
 *
 */
if ( !function_exists('travel_way_fs_image_display_options') ) :
	function travel_way_fs_image_display_options() {
		$travel_way_fs_image_display_options =  array(
			'full-screen-bg' => esc_html__( 'Full Screen Background', 'travel-way' ),
			'responsive-img' => esc_html__( 'Responsive Image', 'travel-way' )
		);
		return apply_filters( 'travel_way_fs_image_display_options', $travel_way_fs_image_display_options );
	}
endif;

/**
 * Feature Info number
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_feature_info_number
 *
 */
if ( !function_exists('travel_way_feature_info_number') ) :
	function travel_way_feature_info_number() {
		$travel_way_feature_info_number =  array(
			1               => esc_html__( '1', 'travel-way' ),
			2               => esc_html__( '2', 'travel-way' ),
			3               => esc_html__( '3', 'travel-way' ),
			4               => esc_html__( '4', 'travel-way' ),
		);
		return apply_filters( 'travel_way_feature_info_number', $travel_way_feature_info_number );
	}
endif;

/**
 * Footer copyright beside options
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_footer_copyright_beside_option
 *
 */
if ( !function_exists('travel_way_footer_copyright_beside_option') ) :
	function travel_way_footer_copyright_beside_option() {
		$travel_way_footer_copyright_beside_option =  array(
			'hide'          => esc_html__( 'Hide', 'travel-way' ),
			'social'        => esc_html__( 'Social Links', 'travel-way' ),
			'footer-menu'   => esc_html__( 'Footer Menu', 'travel-way' )
		);
		return apply_filters( 'travel_way_footer_copyright_beside_option', $travel_way_footer_copyright_beside_option );
	}
endif;

/**
 * Sidebar layout options
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_sidebar_layout
 *
 */
if ( !function_exists('travel_way_sidebar_layout') ) :
    function travel_way_sidebar_layout() {
        $travel_way_sidebar_layout =  array(
	        'right-sidebar' => esc_html__( 'Right Sidebar', 'travel-way' ),
	        'left-sidebar'  => esc_html__( 'Left Sidebar' , 'travel-way' ),
	        'both-sidebar'  => esc_html__( 'Both Sidebar' , 'travel-way' ),
	        'middle-col'    => esc_html__( 'Middle Column' , 'travel-way' ),
	        'no-sidebar'    => esc_html__( 'No Sidebar', 'travel-way' )
        );
        return apply_filters( 'travel_way_sidebar_layout', $travel_way_sidebar_layout );
    }
endif;

/**
 * Blog content from
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_blog_archive_content_from
 *
 */
if ( !function_exists('travel_way_blog_archive_content_from') ) :
	function travel_way_blog_archive_content_from() {
		$travel_way_blog_archive_content_from =  array(
			'excerpt'    => esc_html__( 'Excerpt', 'travel-way' ),
			'content'    => esc_html__( 'Content', 'travel-way' )
		);
		return apply_filters( 'travel_way_blog_archive_content_from', $travel_way_blog_archive_content_from );
	}
endif;

/**
 * Image Size
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_get_image_sizes_options
 *
 */
if ( !function_exists('travel_way_get_image_sizes_options') ) :
	function travel_way_get_image_sizes_options( $add_disable = false ) {
		global $_wp_additional_image_sizes;
		$choices = array();
		if ( true == $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'travel-way' );
		}
		foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
			$choices[ $_size ] = $_size . ' ('. get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
		}
		$choices['full'] = esc_html__( 'full (original)', 'travel-way' );
		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {

			foreach ($_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key . ' ('. $size['width'] . 'x' . $size['height'] . ')';
			}
		}
		return apply_filters( 'travel_way_get_image_sizes_options', $choices );
	}
endif;


/**
 * Pagination Options
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array travel_way_pagination_options
 *
 */
if ( !function_exists('travel_way_pagination_options') ) :
	function travel_way_pagination_options() {
		$travel_way_pagination_options =  array(
			'default'  => esc_html__( 'Default', 'travel-way' ),
			'numeric'  => esc_html__( 'Numeric', 'travel-way' )
		);
		return apply_filters( 'travel_way_pagination_options', $travel_way_pagination_options );
	}
endif;