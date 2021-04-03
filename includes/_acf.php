<?php

function acf_load() {
	/**
	*  Load ACF
	*  cf https://www.advancedcustomfields.com/resources/including-acf-within-a-plugin-or-theme/
	*/

	// Define path and URL to the ACF plugin.
	define( 'MY_ACF_PATH', plugin_dir_path( __DIR__ ). '/vendor/advanced-custom-fields/advanced-custom-fields-pro/' );
	define( 'MY_ACF_URL', plugin_dir_path( __DIR__ ) . '/vendor/advanced-custom-fields/advanced-custom-fields-pro/' );

	// Include the ACF plugin.
	include_once( MY_ACF_PATH . 'acf.php' );

	// Customize the url setting to fix incorrect asset URLs.
	add_filter('acf/settings/url', 'my_acf_settings_url');
	function my_acf_settings_url( $url ) {
	    return MY_ACF_URL;
	}

	// (Optional) Hide the ACF admin menu item.
	add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
	function my_acf_settings_show_admin( $show_admin ) {
	    return false;
	}

}