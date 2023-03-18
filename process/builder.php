<?php

use Extended\ACF\Fields\FlexibleContent;
use Extended\ACF\Fields\Layout;
use Extended\ACF\Location;

/*****************************************
********** PAGE BUILDER WITH ACF  ********
******************************************/ 

// Setting up a variable to store the components directory.
$filename = get_template_directory() . "/components/";
if(file_exists($filename)):
	// if you have a components folder in your theme, the plugin will look for components there.
    $path = get_template_directory();
else:
	// otherwise it will look for the components folder in this plugin.
    $path = plugin_dir_path( __DIR__ );
endif;

// Creation of an empty array where we will store the different components.
$components = [];

// Start of a loop. The builder will look for components and will add them to the list of components.
foreach ( (glob($path . "/components/*") ) as $component  ) {

$component = basename($component);

// We add each component to the list of components, in the form of an ACF field Layout.
$components[] = Layout::make(ucfirst($component))
				->fields([
					require $path . '/components/' . $component . '/fields.php'
				])
				->layout('block');

}

// Now we can register the Page Builder, where there will be as many layouts as there are components.
register_extended_field_group([
	'title' => 'Page Builder',
	'fields' => [
	FlexibleContent::make('Components', 'page-components')
		->instructions('Create your own layout from the available components')
		->buttonLabel('Add a page component')
		->layouts($components)
	],
	'location' => [
        Location::where('page_template', '==', 'pagebuilder-template.php'),
    ]
]);