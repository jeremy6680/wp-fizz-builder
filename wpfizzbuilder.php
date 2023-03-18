<?php
/*
 * Plugin Name: WP Fizz Builder
 * Description: A simple Page Builder for WordPress, built with ACF Pro and Timber
 * Version: 1.0.23
 * Author: Jeremy Marchandeau
 * Author URI: https://jeremymarchandeau.com
 * Text Domain: fizz-builder
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('WPFizzBuilder') ) :

class WPFizzBuilder {
  private static $instance;

  public static function getInstance() {
    if (self::$instance == NULL) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  private function __construct() {
    // implement hooks here
	// Setup
	define( 'WPFBUILDER_PLUGIN_URL', __FILE__ );

	// Includes
	$acfpath = get_stylesheet_directory() . '/vendor/advanced-custom-fields/advanced-custom-fields-pro/acf.php';
	if(file_exists($acfpath)):
	    include_once($acfpath);
	endif;
	include( 'includes/activate.php' );
	include( 'includes/init.php' );
	include( 'includes/front/enqueue.php' );
	include( 'process/add-template.php' );
	include( 'process/builder.php' );
	include( 'includes/register-plugins.php' );
	require_once( plugin_dir_path( __FILE__) . "/includes/libs/class-tgm-plugin-activation.php" );



	// Hooks
	register_activation_hook( __FILE__, 'wpfb_activate_plugin' );
	add_action( 'admin_init', 'wpfb_hide_editor' );
	add_action( 'wp_enqueue_scripts', 'wpfb_scripts' );
	add_filter ( 'theme_page_templates', 'wpfb_add_page_template' );
	add_filter( 'template_include', 'wpfb_catch_plugin_template' );
	add_action( 'tgmpa_register', 'wpfb_register_required_plugins' );

  }
}

WPFizzBuilder::getInstance();

endif; // class_exists check