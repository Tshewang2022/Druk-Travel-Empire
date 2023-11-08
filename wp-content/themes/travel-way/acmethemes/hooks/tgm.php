<?php
add_action( 'tgmpa_register', 'travel_way_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function travel_way_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'     => esc_html__( 'WooCommerce', 'travel-way' ),
			'slug'     => 'woocommerce',
			'required' => false,
		),
		array(
			'name'     => 'Gutentor',
			'slug'     => 'gutentor',
			'required' => false,
		),
		array(
			'name'     => 'Classic Widgets',
			'slug'     => 'classic-widgets',
			'required' => false,
		),
	);
	tgmpa( $plugins );
}
