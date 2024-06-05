<?php

require get_template_directory() . '/revolution/inc/tgm/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function wp_shop_woocommerce_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Woocommerce', 'wp-shop-woocommerce' ),
			'slug'             => 'woocommerce',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'wp_shop_woocommerce_register_recommended_plugins' );