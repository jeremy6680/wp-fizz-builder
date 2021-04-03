<?php

// Add page template for the builder
function wpfb_add_page_template ($templates) {
    $templates['pagebuilder-template.php'] = 'Page Builder Template';
    return $templates;
    }

// Page template filter callback
function wpfb_catch_plugin_template($template) {
    // If tp-file.php is the set template
    if( is_page_template('pagebuilder-template.php') )
        // Update path(must be path, use WP_PLUGIN_DIR and not WP_PLUGIN_URL) 
        $template = WP_PLUGIN_DIR . '/wp-fizz-builder/templates/pagebuilder-template.php';
    // Return
    return $template;
}