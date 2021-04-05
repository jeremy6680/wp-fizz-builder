<?php

function wpfb_scripts() {
    wp_register_style( 'wpfb-global-styles', plugins_url( 'assets/dist/global.css' , WPFBUILDER_PLUGIN_URL ), 100 );
    wp_register_style( 'wpfb-components-styles', plugins_url( 'assets/dist/components.css' , WPFBUILDER_PLUGIN_URL ), 100 );
    wp_register_script( 'wpfb_main', plugins_url( '/assets/dist/main.js', WPFBUILDER_PLUGIN_URL ), ['jquery'], '1.0.0', true );

    if(is_page_template('pagebuilder-template.php')) {
	    wp_enqueue_style( 'wpfb-components-styles' );
	    wp_enqueue_style( 'wpfb-global-styles' );
	    wp_enqueue_script( 'wpfb_main' );   	
    }
}