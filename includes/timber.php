<?php

// Load Timber

$filepath = get_template_directory() . '/vendor/autoload.php';

if (file_exists($filepath)) {
    require_once(get_template_directory() . '/vendor/autoload.php');
}  
else {
    require_once(plugin_dir_path( __DIR__ ) . '/vendor/autoload.php');
} 

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber' ) ) {

    add_action(
        'admin_notices',
        function() {
            echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
        }
    );

    add_filter(
        'template_include',
        function( $template ) {
            return get_stylesheet_directory() . '/static/no-timber.html';
        }
    );
    return;
}



$timber = new \Timber\Timber();

// Set Timber Locations + possibility to override templates in theme
Timber::$locations = array(

    get_stylesheet_directory() . '/views',
    get_stylesheet_directory() . '/components',
    get_template_directory() . '/views',
    get_template_directory() . '/components',
    plugin_dir_path( __DIR__ ) . '/views',
    plugin_dir_path( __DIR__ ) . '/components'
);

//cf https://github.com/timber/timber/issues/248
/*function configure_views() {
    if (is_array(Timber::$dirname)) {
        $views = Timber::$dirname;
    } else {
        $views = array(Timber::$dirname);
    }
    $views[] = __DIR__ . "views";
    Timber::$dirname = $views;
}*/