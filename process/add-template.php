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

/**
* Hide editor on pages which have the Page Builder Template.
*
*/
	function wpfb_hide_editor() {
		// Get the Post ID.
		$id = !empty($_POST['post_id']) ? $_POST['post_id'] : '';
		$post_id = !empty($_GET['post']) ? $_GET['post'] : $id ;
		if( !isset( $post_id ) ) return;

		// Hide the editor on a page with a specific page template
		// Get the name of the Page Template file.
		$template_file = get_post_meta($post_id, '_wp_page_template', true);

		if($template_file == 'pagebuilder-template.php'){ // the filename of the page template
			remove_post_type_support('page', 'editor');
		}
	}