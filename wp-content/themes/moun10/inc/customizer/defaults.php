<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 * @return array An array of default values
 */

function moun10_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$moun10_default_options = array(
		// Color Options
		'header_title_color'			    => '#fff',
		'header_tagline_color'			    => '#fff',
		'header_txt_logo_extra'			    => 'show-all',
		'colorscheme_hue'				    => '#fe463a',
		'colorscheme'					    => 'default',


		// typography Options
		'theme_typography' 				    => 'default',
		'body_theme_typography' 		    => 'default',
		
		// loader
		'loader_enable'         		    => (bool) false,
		'loader_icon'         			    => 'default',

		// breadcrumb
		'breadcrumb_enable'				    => (bool) true,
		'breadcrumb_separator'			    => '/',
		
		// layout 
		'site_layout'         			    => 'wide',
		'sidebar_position'         		    => 'right-sidebar',
		'post_sidebar_position' 		    => 'right-sidebar',
		'page_sidebar_position' 		    => 'right-sidebar',
		'menu_sticky'					    => (bool) false,

		// excerpt options
		'long_excerpt_length'               => 25,
		'read_more_text'           		    => esc_html__( 'Read More', 'moun10' ),

		// pagination options
		'pagination_enable'         	    => (bool) true,
		'pagination_type'         		    => 'default',

		// footer options
		'copyright_text'           		    => sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s. ', '1: Year, 2: Site Title with home URL', 'moun10' ), '[the-year]', '[site-link]' ) . esc_html__( 'All Rights Reserved | ', 'moun10' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'moun10' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>',
		'scroll_top_visible'        	    => (bool) true,

		// reset options
		'reset_options'      			    => (bool) false,
		
		// homepage sections sortable
		'sortable' 						    => 'slider,about,popular_destination,destination,service,counter',

		// blog/archive options
		'your_latest_posts_title' 		    => esc_html__( 'Blogs', 'moun10' ),
		'hide_date' 					    => (bool) false,
		'hide_category'					    => (bool) false,

		// single post theme options
		'single_post_hide_date' 		    => (bool) false,
		'single_post_hide_author'		    => (bool) false,
		'single_post_hide_category'		    => (bool) false,
		'single_post_hide_tags'			    => (bool) false,

		/* Front Page */

		// Slider
		'slider_section_enable'				=> (bool) false,
		'slider_content_type'				=> 'page',
		'slider_count'						=> 4,
		'slider_autoplay_enable'			=> (bool) false,
		'slider_btn_txt'                    => esc_html__('Explore more','moun10'),
		
		//about 
		'about_section_enable'			    => (bool) false,
		'about_content_type'			    => 'page',
		
		//service
		'service_section_enable'		    => (bool) false,
		'service_content_type'			    =>'page',
		'service_posts_count'			    => 2,

		//destination
		'destination_autoplay_enable'       => (bool) false,
		'destination_section_sub_title'     => esc_html__('Explore mountain','moun10'),
		'destination_section_title'         => esc_html__('Top things to do in Himalaya','moun10'),
		'destination_section_enable'	    => (bool) false,
		'destination_content_type'		    => 'page',
		'destination_section_description'	=> esc_html__('You don’t climb mountains without a team, you don’t climb mountains without being fit, you don’t climb mountains without being prepared and you don’t climb mountains without balancing the risks and rewards. And you never climb a mountain on accident-it has to be intentional.','moun10'),
		
		// counter
		'counter_section_enable'		=> (bool)false,
		'counter_count'					=> 4,


		// blog
		'blog_section_enable'			    => (bool) false,
		'blog_content_type'				    => 'recent',
		'blog_count'					    => 4,
		'blog_title'					    => esc_html__( 'Amazing mountain articles', 'moun10' ),

		'popular_destination_section_enable'		=> false,
		'popular_destination_title'					=> esc_html__( 'Popular Destinations', 'moun10' ),
		'popular_destination_sub_title'				=> esc_html__('DESTINATIONS','moun10'),
		'popular_destination_btn_label'				=> esc_html__( 'Let’s Travel Now', 'moun10' ),
		'popular_destination_read_more_btn_label'	=> esc_html__( 'More Details', 'moun10' ),
		'popular_destination_btn_url'				=> '#',

	);

	$output = apply_filters( 'moun10_default_theme_options', $moun10_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}