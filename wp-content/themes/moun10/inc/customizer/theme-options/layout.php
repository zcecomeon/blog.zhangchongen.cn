<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'moun10_layout', array(
	'title'               => esc_html__('Layout','moun10'),
	'description'         => esc_html__( 'Layout section options.', 'moun10' ),
	'panel'               => 'moun10_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'moun10_theme_options[site_layout]', array(
	'sanitize_callback'   => 'moun10_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Moun10_Custom_Radio_Image_Control ( $wp_customize, 'moun10_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'moun10' ),
	'section'             => 'moun10_layout',
	'choices'			  => moun10_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'moun10_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'moun10_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Moun10_Custom_Radio_Image_Control ( $wp_customize, 'moun10_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'moun10' ),
	'section'             => 'moun10_layout',
	'choices'			  => moun10_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'moun10_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'moun10_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Moun10_Custom_Radio_Image_Control ( $wp_customize, 'moun10_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'moun10' ),
	'section'             => 'moun10_layout',
	'choices'			  => moun10_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'moun10_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'moun10_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Moun10_Custom_Radio_Image_Control( $wp_customize, 'moun10_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'moun10' ),
	'section'             => 'moun10_layout',
	'choices'			  => moun10_sidebar_position(),
) ) );