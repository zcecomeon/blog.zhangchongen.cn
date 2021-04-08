<?php
/**
 * Counter Section options
 *
 * @package Theme Palace
 * @subpackage Moun10 Pro
 * @since Moun10 Pro 1.0.0
 */

// Add Counter section
$wp_customize->add_section( 'moun10_counter_section', array(
	'title'             => esc_html__( 'Counters','moun10' ),
	'description'       => esc_html__( 'Counters Section options.', 'moun10' ),
	'panel'             => 'moun10_front_page_panel',
) );

// Counter content enable control and setting
$wp_customize->add_setting( 'moun10_theme_options[counter_section_enable]', array(
	'default'			=> 	$options['counter_section_enable'],
	'sanitize_callback' => 'moun10_sanitize_switch_control',
) );

$wp_customize->add_control( new Moun10_Switch_Control( $wp_customize, 'moun10_theme_options[counter_section_enable]', array(
	'label'             => esc_html__( 'Counter Section Enable', 'moun10' ),
	'section'           => 'moun10_counter_section',
	'on_off_label' 		=> moun10_switch_options(),
) ) );


// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'moun10_theme_options[counter_section_enable]', array(
		'selector'            => '#counter-section .wrapper',
		'settings'            => 'moun10_theme_options[counter_section_enable]',
    ) );
}

$wp_customize->add_setting( 'moun10_theme_options[counter_image]', array(
	'sanitize_callback' => 'moun10_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'moun10_theme_options[counter_image]',
		array(
		'label'       		=> esc_html__( 'Background Image', 'moun10' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'moun10' ), 1350, 385 ),
		'section'     		=> 'moun10_counter_section',
		'active_callback'	=> 'moun10_is_counter_section_enable',
) ) );



for ( $i = 1; $i <= 4; $i++ ) :

	// counter title setting and control
	$wp_customize->add_setting( 'moun10_theme_options[counter_title_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'moun10_theme_options[counter_title_' . $i . ']', array(
		'label'           	=> sprintf( esc_html__( 'Counter Title %d', 'moun10' ), $i ),
		'section'        	=> 'moun10_counter_section',
		'active_callback' 	=> 'moun10_is_counter_section_enable',
		'type'				=> 'text',
	) );

	// counter title setting and control
	$wp_customize->add_setting( 'moun10_theme_options[counter_number_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'moun10_theme_options[counter_number_' . $i . ']', array(
		'label'           	=> sprintf( esc_html__( 'Counter Count %d', 'moun10' ), $i ),
		'section'        	=> 'moun10_counter_section',
		'active_callback' 	=> 'moun10_is_counter_section_enable',
		'type'				=> 'text',
	) );

	// counter hr setting and control
	$wp_customize->add_setting( 'moun10_theme_options[counter_hr_'. $i .']', array(
		'sanitize_callback' => 'moun10_sanitize_html'
	) );

	$wp_customize->add_control( new Moun10_Customize_Horizontal_Line( $wp_customize, 'moun10_theme_options[counter_hr_'. $i .']',
		array(
			'section'         => 'moun10_counter_section',
			'active_callback' => 'moun10_is_counter_section_enable',
			'type'			  => 'hr'
	) ) );
endfor;



