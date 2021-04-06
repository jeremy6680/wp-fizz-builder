<?php

// loard required plugins
$filepath = get_template_directory() . '/vendor/autoload.php';

if (file_exists($filepath)) {
    require_once(get_template_directory() . '/vendor/autoload.php');
}  
else {
    require_once(plugin_dir_path( __DIR__ ) . '/vendor/autoload.php');
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

