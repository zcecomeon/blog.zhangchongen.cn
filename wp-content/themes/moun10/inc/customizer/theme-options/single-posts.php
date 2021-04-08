<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'moun10_single_post_section', array(
	'title'             => esc_html__( 'Single Post','moun10' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'moun10' ),
	'panel'             => 'moun10_theme_options_panel',
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'moun10_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'moun10_sanitize_switch_control',
) );

$wp_customize->add_control( new Moun10_Switch_Control( $wp_customize, 'moun10_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'moun10' ),
	'section'           => 'moun10_single_post_section',
	'on_off_label' 		=> moun10_hide_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'moun10_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'moun10_sanitize_switch_control',
) );

$wp_customize->add_control( new Moun10_Switch_Control( $wp_customize, 'moun10_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'moun10' ),
	'section'           => 'moun10_single_post_section',
	'on_off_label' 		=> moun10_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'moun10_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'moun10_sanitize_switch_control',
) );

$wp_customize->add_control( new Moun10_Switch_Control( $wp_customize, 'moun10_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'moun10' ),
	'section'           => 'moun10_single_post_section',
	'on_off_label' 		=> moun10_hide_options(),
) ) );

// Archive tag category setting and control.
$wp_customize->add_setting( 'moun10_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'moun10_sanitize_switch_control',
) );

$wp_customize->add_control( new Moun10_Switch_Control( $wp_customize, 'moun10_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'moun10' ),
	'section'           => 'moun10_single_post_section',
	'on_off_label' 		=> moun10_hide_options(),
) ) );
