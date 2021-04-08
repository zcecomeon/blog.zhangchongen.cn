<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'moun10_pagination', array(
	'title'               	=> esc_html__('Pagination','moun10'),
	'description'         	=> esc_html__( 'Pagination section options.', 'moun10' ),
	'panel'               	=> 'moun10_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'moun10_theme_options[pagination_enable]', array(
	'sanitize_callback' 	=> 'moun10_sanitize_switch_control',
	'default'             	=> $options['pagination_enable'],
) );

$wp_customize->add_control( new Moun10_Switch_Control( $wp_customize, 'moun10_theme_options[pagination_enable]', array(
	'label'               	=> esc_html__( 'Pagination Enable', 'moun10' ),
	'section'             	=> 'moun10_pagination',
	'on_off_label' 			=> moun10_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'moun10_theme_options[pagination_type]', array(
	'sanitize_callback'   	=> 'moun10_sanitize_select',
	'default'             	=> $options['pagination_type'],
) );

$wp_customize->add_control( 'moun10_theme_options[pagination_type]', array(
	'label'               	=> esc_html__( 'Pagination Type', 'moun10' ),
	'section'             	=> 'moun10_pagination',
	'type'                	=> 'select',
	'choices'			  	=> moun10_pagination_options(),
	'active_callback'	  	=> 'moun10_is_pagination_enable',
) );
