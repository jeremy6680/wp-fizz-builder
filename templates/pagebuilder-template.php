<?php
/**
 * Template Name: Page Builder Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();

global $post, $wpdb;

?>

<main id="site-content" role="main">
<h1>Page Builder Template</h1>

<?php the_field('title'); ?>
	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

		}
	}

	?>

</main><!-- #site-content -->

<?php get_footer();