<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function moun10_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'moun10' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function moun10_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'moun10' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

/**
 * List of trips for post choices.
 * @return Array Array of post ids and name.
 */
function moun10_trip_choices() {
    $posts = get_posts( array( 'post_type' => 'itineraries', 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'moun10' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}


/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function moun10_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'category',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'moun10' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}

if ( ! function_exists( 'moun10_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function moun10_site_layout() {
        $moun10_site_layout = array(
            'wide'          => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout'  => get_template_directory_uri() . '/assets/images/boxed.png',
            'frame-layout'  => get_template_directory_uri() . '/assets/images/framed.png',
        );

        $output = apply_filters( 'moun10_site_layout', $moun10_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'moun10_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function moun10_selected_sidebar() {
        $moun10_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'moun10' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'moun10' ),
            'optional-sidebar-2'    => esc_html__( 'Optional Sidebar 2', 'moun10' ),
            'optional-sidebar-3'    => esc_html__( 'Optional Sidebar 3', 'moun10' ),
            'optional-sidebar-4'    => esc_html__( 'Optional Sidebar 4', 'moun10' ),
        );

        $output = apply_filters( 'moun10_selected_sidebar', $moun10_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'moun10_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function moun10_global_sidebar_position() {
        $moun10_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'left-sidebar'  => get_template_directory_uri() . '/assets/images/left.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'moun10_global_sidebar_position', $moun10_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'moun10_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function moun10_sidebar_position() {
        $moun10_sidebar_position = array(
            'right-sidebar'         => get_template_directory_uri() . '/assets/images/right.png',
            'left-sidebar'          => get_template_directory_uri() . '/assets/images/left.png',
            'no-sidebar'            => get_template_directory_uri() . '/assets/images/full.png',
            'no-sidebar-content'    => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'moun10_sidebar_position', $moun10_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'moun10_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function moun10_pagination_options() {
        $moun10_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'moun10' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'moun10' ),
        );

        $output = apply_filters( 'moun10_pagination_options', $moun10_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'moun10_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function moun10_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'moun10' ),
            'off'       => esc_html__( 'Disable', 'moun10' )
        );
        return apply_filters( 'moun10_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'moun10_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function moun10_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'moun10' ),
            'off'       => esc_html__( 'No', 'moun10' )
        );
        return apply_filters( 'moun10_hide_options', $arr );
    }
endif;
