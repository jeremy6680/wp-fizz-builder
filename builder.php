<?php

use WordPlate\Acf\Fields\FlexibleContent;
use WordPlate\Acf\Fields\Layout;
use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Location;

/*****************************************
********** PAGE BUILDER WITH ACF  ********
******************************************/ 

$layouts = [];

function AddLayout() {

	foreach ( glob( plugin_dir_path( __DIR__ ) . 'components/*' ) as $component ) {

		$component = basename($component);
		$name = ucfirst($component);
		$fields = plugin_dir_path( __DIR__ ) . "components/". $component . "/fields.php";
	
			var_dump($component);
			var_dump($name);
			var_dump($fields);
			
			Layout::make($name)
			->fields([require $fields])
			->layout('block');
			
	
	}

}

AddLayout();


register_extended_field_group([
	'title' => 'Page Builder',
	'fields' => [
	FlexibleContent::make('Components', 'page-components')
		->instructions('Create your own layout from the available components')
		->buttonLabel('Add a page component')
		->layouts($layouts)
	],
	'location' => [
        Location::if('page_template', '==', 'pagebuilder-template.php'),
    ]
]);