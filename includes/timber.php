<?php

// Load Timber
require_once(plugin_dir_path( __DIR__ ) . '/vendor/autoload.php');

$timber = new \Timber\Timber();

// Set Timber Locations + possibility to override templates in theme
Timber::$locations = array(
    plugin_dir_path( __DIR__ ) . '/views',
    get_stylesheet_directory() . '/views',
    get_template_directory() . '/views'
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