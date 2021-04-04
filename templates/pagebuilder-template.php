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

