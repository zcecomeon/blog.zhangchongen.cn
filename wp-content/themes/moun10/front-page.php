<?php
/**
 * The template for displaying al pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */

get_header(); ?>
	<?php
		// Call home if Homepage setting is set to latest posts.
		if ( moun10_is_latest_posts() ) {

			get_template_part( 'template-parts/content', 'home' );

		} elseif ( moun10_is_frontpage() ) {
		
			$options = moun10_get_theme_options();
			$sorted = array();
			if ( ! empty( $options['sortable'] ) ) {
				$sorted = explode( ',' , $options['sortable'] );
			}

			foreach ( $sorted as $section ) {
				add_action( 'moun10_primary_content', 'moun10_add_'. $section .'_section' );
			}
			do_action( 'moun10_primary_content' );
		}
get_footer();
