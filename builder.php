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

$layout = [];

foreach ( (glob(plugin_dir_path( __FILE__ ) . "components/*") ) as $component  ) {

$component = basename($component);

$layout[] = Layout::make(ucfirst($component))
			->fields([
				require plugin_dir_path( __FILE__ ) . 'components/' . $component . '/fields.php'
			])
			->layout('block');


}

register_extended_field_group([
	'title' => 'Page Builder',
	'fields' => [
	FlexibleContent::make('Components', 'page-components')
		->instructions('Create your own layout from the available components')
		->buttonLabel('Add a page component')
		->layouts($layout)
	],
	'location' => [
        Location::if('page_template', '==', 'pagebuilder-template.php'),
    ]
]);