<?php

function wpfb_scripts() {

	$file = plugin_dir_path(dirname(__FILE__)).'../assets/dist/';
    
    if(file_exists($file)) {

    	$dist = plugin_dir_url( __DIR__ ). '../assets/dist/';
	    wp_register_style( 'wpfb-global-styles', $dist . 'global.css', 100 );
	    wp_register_style( 'wpfb-components-styles', $dist . 'components.css', 100 );
	    wp_register_script( 'wpfb_main', $dist . 'main.js', ['jquery'], '1.0.0', true );

	    if(is_page_template('pagebuilder-template.php')) {
		    wp_enqueue_style( 'wpfb-components-styles' );
		    wp_enqueue_style( 'wpfb-global-styles' );
		    wp_enqueue_script( 'wpfb_main' );   	
	    }
    }

}