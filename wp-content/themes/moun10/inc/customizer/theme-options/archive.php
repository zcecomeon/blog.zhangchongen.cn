<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'moun10_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','moun10' ),
	'description'       => esc_html__( 'Archive section options.', 'moun10' ),
	'panel'             => 'moun10_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'moun10_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'moun10_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'moun10' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'moun10' ),
	'section'           => 'moun10_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'moun10_is_latest_posts'
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'moun10_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'moun10_sanitize_switch_control',
) );

$wp_customize->add_control( new Moun10_Switch_Control( $wp_customize, 'moun10_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'moun10' ),
	'section'           => 'moun10_archive_section',
	'on_off_label' 		=> moun10_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'moun10_theme_options[hide_category]', array(
	'default'           => $options['hide_category'],
	'sanitize_callback' => 'moun10_sanitize_switch_control',
) );

$wp_customize->add_control( new Moun10_Switch_Control( $wp_customize, 'moun10_theme_options[hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'moun10' ),
	'section'           => 'moun10_archive_section',
	'on_off_label' 		=> moun10_hide_options(),
) ) );


