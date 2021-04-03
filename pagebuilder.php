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

register_extended_field_group([
	'title' => 'Page Builder',
	'fields' => [
	FlexibleContent::make('Components', 'page-components')
		->instructions('Create your own layout from the available components')
		->buttonLabel('Add a page component')
		->layouts([

			/****************************
			**** COMPONENT: HERO ********
			*****************************/ 
			Layout::make('Hero')
			->fields([
				require __DIR__.'/components/hero/fields.php'
			])
			->layout('block'),

			/****************************
			**** COMPONENT: TITLE *******
			*****************************/ 
			Layout::make('Title')
			->fields([
				require __DIR__.'/components/title/fields.php'
			])
			->layout('block'),

		])
	],
	'location' => [
        Location::if('page_template', '==', 'pagebuilder-template.php'),
    ]
]);