<?php

function wpfb_scripts() {
    wp_enqueue_style( 'wpfb-global-styles', plugins_url( 'assets/dist/global.css' , RECIPE_PLUGIN_URL ), 100 );
    wp_enqueue_style( 'wpfb-global-styles' );
    wp_register_script( 'wpfb-components-styles', plugins_url( 'assets/dist/components.css' , RECIPE_PLUGIN_URL ), 100 );
    wp_enqueue_style( 'wpfb-components-styles' );
    
    wp_register_script( 'wpfb_main', plugins_url( '/assets/dist/main.js', RECIPE_PLUGIN_URL ), ['jquery'], '1.0.0', true );
    wp_enqueue_script( 'wpfb_main' );
}