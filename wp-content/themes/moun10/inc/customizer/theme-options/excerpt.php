<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'moun10_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','moun10' ),
	'description'       => esc_html__( 'Excerpt section options.', 'moun10' ),
	'panel'             => 'moun10_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'moun10_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'moun10_sanitize_number_range',
	'validate_callback' => 'moun10_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'moun10_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'moun10' ),
	'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'moun10' ),
	'section'     		=> 'moun10_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );

// read more text setting and control
$wp_customize->add_setting( 'moun10_theme_options[read_more_text]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['read_more_text'],
) );

$wp_customize->add_control( 'moun10_theme_options[read_more_text]', array(
	'label'           	=> esc_html__( 'Read More Text Label', 'moun10' ),
	'section'        	=> 'moun10_excerpt_section',
	'type'				=> 'text',
) );
