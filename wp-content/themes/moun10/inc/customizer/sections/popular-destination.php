<?php
/**
 * Popular Destination Section options
 *
 * @package Theme Palace
 * @subpackage Moun10 Pro
 * @since Moun10 Pro 1.0.0
 */

if ( ! class_exists( 'WP_Travel' ) )return;

// Add Popular Destination section
$wp_customize->add_section( 'moun10_popular_destination_section', array(
	'title'             => esc_html__( 'Popular Destination','moun10' ),
	'description'       => esc_html__( 'Popular Destination Section options.', 'moun10' ),
	'panel'             => 'moun10_front_page_panel',

) );

// Popular Destination content enable control and setting
$wp_customize->add_setting( 'moun10_theme_options[popular_destination_section_enable]', array(
	'default'			=> 	$options['popular_destination_section_enable'],
	'sanitize_callback' => 'moun10_sanitize_switch_control',
) );

$wp_customize->add_control( new Moun10_Switch_Control( $wp_customize, 'moun10_theme_options[popular_destination_section_enable]', array(
	'label'             => esc_html__( 'Popular Destination Section Enable', 'moun10' ),
	'section'           => 'moun10_popular_destination_section',
	'on_off_label' 		=> moun10_switch_options(),
) ) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'moun10_theme_options[popular_destination_section_enable]', array(
		'selector'            => '#top-destinations .tooltiptext',
		'settings'            => 'moun10_theme_options[popular_destination_section_enable]',
    ) );
}

// popular destination sub title setting and control
$wp_customize->add_setting( 'moun10_theme_options[popular_destination_sub_title]', array(
	'default'			=> $options['popular_destination_sub_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'moun10_theme_options[popular_destination_sub_title]', array(
	'label'           	=> esc_html__( 'Sub Title', 'moun10' ),
	'section'        	=> 'moun10_popular_destination_section',
	'active_callback' 	=> 'moun10_is_popular_destination_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'moun10_theme_options[popular_destination_sub_title]', array(
		'selector'            => '#top-destinations div.section-header p',
		'settings'            => 'moun10_theme_options[popular_destination_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'moun10_popular_destination_sub_title_partial',
    ) );
}


// popular destination title setting and control
$wp_customize->add_setting( 'moun10_theme_options[popular_destination_title]', array(
	'default'			=> $options['popular_destination_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'moun10_theme_options[popular_destination_title]', array(
	'label'           	=> esc_html__( 'Title', 'moun10' ),
	'section'        	=> 'moun10_popular_destination_section',
	'active_callback' 	=> 'moun10_is_popular_destination_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'moun10_theme_options[popular_destination_title]', array(
		'selector'            => '#top-destinations div.section-header h2',
		'settings'            => 'moun10_theme_options[popular_destination_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'moun10_popular_destination_title_partial',
    ) );
}



for ( $i=1; $i <= 6; $i++ ) { 

	// popular_destination trips drop down chooser control and setting
	$wp_customize->add_setting( 'moun10_theme_options[popular_destination_content_trip_' . $i . ']', array(
		'sanitize_callback' => 'moun10_sanitize_page',
	) );

	$wp_customize->add_control( new Moun10_Dropdown_Chooser( $wp_customize, 'moun10_theme_options[popular_destination_content_trip_' . $i . ']', array(
		'label'             => sprintf ( esc_html__( 'Select Trip %d', 'moun10' ), $i ),
		'section'           => 'moun10_popular_destination_section',
		'choices'			=> moun10_trip_choices(),
		'active_callback'	=> 'moun10_is_popular_destination_section_enable',
	) ) );
}


// Popular deatination btn label setting and control
$wp_customize->add_setting( 'moun10_theme_options[popular_destination_read_more_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['popular_destination_read_more_btn_label'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'moun10_theme_options[popular_destination_read_more_btn_label]', array(
	'label'           	=> esc_html__( 'Read More Button Label', 'moun10' ),
	'section'        	=> 'moun10_popular_destination_section',
	'active_callback' 	=> 'moun10_is_popular_destination_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'moun10_theme_options[popular_destination_read_more_btn_label]', array(
		'selector'            => '#top-destinations article .entry-container a.more-link',
		'settings'            => 'moun10_theme_options[popular_destination_read_more_btn_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'moun10_popular_destination_read_more_btn_label_partial',
    ) );
}

// Popular deatination btn label setting and control
$wp_customize->add_setting( 'moun10_theme_options[popular_destination_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['popular_destination_btn_label'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'moun10_theme_options[popular_destination_btn_label]', array(
	'label'           	=> esc_html__( 'Popular Destination Button Label', 'moun10' ),
	'section'        	=> 'moun10_popular_destination_section',
	'active_callback' 	=> 'moun10_is_popular_destination_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'moun10_theme_options[popular_destination_btn_label]', array(
		'selector'            => '#top-destinations div.read-more a',
		'settings'            => 'moun10_theme_options[popular_destination_btn_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'moun10_popular_destination_btn_label_partial',
    ) );
}


// blog btn url setting and control
$wp_customize->add_setting( 'moun10_theme_options[popular_destination_btn_url]', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'			=> $options['popular_destination_btn_url'],
) );

$wp_customize->add_control( 'moun10_theme_options[popular_destination_btn_url]', array(
	'label'           	=> esc_html__( 'Popular Destination Button URL', 'moun10' ),
	'section'        	=> 'moun10_popular_destination_section',
	'active_callback' 	=> 'moun10_is_popular_destination_section_enable',
	'type'				=> 'url',
) );
