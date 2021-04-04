<?php
/**
 * Template Name: Page Builder Template
 * Template Post Type: post, page
 *
 */

$context = Timber::context();

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;
$templates        = array( 'builder.twig' );
$twigbase = get_template_directory() . '/views/base.twig';
$file_exists = file_exists($twigbase);
if($file_exists):
Timber::render( 'builder.twig', $context );
else:
Timber::render( 'notimber-builder.twig', $context );
endif;


use WordPlate\Acf\Fields\Layout;


	//$layout = [];
	//$layouts = [];
/*function MoreLayouts($name,$fields) {
	Layout::make($name)
	->fields([require $fields])
	->layout('block');
}*/


	
	$layouts = [];

	foreach ( glob( plugin_dir_path( __DIR__ ) . 'components/*' ) as $component ) {

		$component = basename($component);
		$name = ucfirst($component);
		$fields = plugin_dir_path( __DIR__ ) . "components/". $component . "/fields.php";
	
			//var_dump($component);
			//var_dump($name);
			//var_dump($fields);
			//var_dump($layouts);

						Layout::make($name)
						->fields([require $fields])
						->layout('block');

			$layouts;

		//$layouts[] .= array_push($layouts, $layout);

var_dump($layouts);
			//var_dump(implode($layouts));
	
	}





		//var_dump($component);

