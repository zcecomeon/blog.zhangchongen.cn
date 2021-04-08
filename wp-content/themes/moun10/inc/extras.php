<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function moun10_body_classes( $classes ) {
	$options = moun10_get_theme_options();

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( $options['menu_sticky'] ) {
		$classes[] = 'menu-sticky';
	}

	// Add a class for typography
	$typography = (  $options['theme_typography'] == 'default' ) ? '' :  $options['theme_typography'];
	$classes[] = esc_attr( $typography );

	$body_typography = (  $options['body_theme_typography'] == 'default' ) ? '' :  $options['body_theme_typography'];
	$classes[] = esc_attr( $body_typography );

	// Add a class for layout
	$classes[] = esc_attr( $options['site_layout'] );

	// Add a class for sidebar
	$sidebar_position = moun10_layout();
	$sidebar = 'sidebar-1';
	if ( is_singular() || is_home() ) {
		$id = ( is_home() && ! is_front_page() ) ? get_option( 'page_for_posts' ) : get_the_id();
	  	$sidebar = get_post_meta( $id, 'moun10-selected-sidebar', true );
	  	$sidebar = ! empty( $sidebar ) ? $sidebar : 'sidebar-1';
	}
	
	if ( is_active_sidebar( $sidebar ) ) {
		$classes[] = esc_attr( $sidebar_position );
	} else {
		$classes[] = 'no-sidebar';
	}
	
	return $classes;
}
add_filter( 'body_class', 'moun10_body_classes' );
