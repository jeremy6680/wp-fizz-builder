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

Timber::render( $templates, $context );