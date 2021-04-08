<?php
/**
 * Service Section options
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */

// Add Service section
$wp_customize->add_section( 'moun10_service_section', array(
	'title'             => esc_html__( 'Services','moun10' ),
	'description'       => esc_html__( 'Services Section options.', 'moun10' ),
	'panel'             => 'moun10_front_page_panel',
) );

// Service content enable control and setting
$wp_customize->add_setting( 'moun10_theme_options[service_section_enable]', array(
	'default'			=> 	$options['service_section_enable'],
	'sanitize_callback' => 'moun10_sanitize_switch_control',
) );

$wp_customize->add_control( new Moun10_Switch_Control( $wp_customize, 'moun10_theme_options[service_section_enable]', array(
	'label'             => esc_html__( 'Service Section Enable', 'moun10' ),
	'section'           => 'moun10_service_section',
	'on_off_label' 		=> moun10_switch_options(),
) ) );

// Service section title control and setting
$wp_customize->add_setting( 'moun10_theme_options[service_section_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=>'postMessage'
) );

$wp_customize->add_control('moun10_theme_options[service_section_title]', array(
    'label'             => esc_html__( 'Section Title', 'moun10' ),
    'section'           => 'moun10_service_section',
    'type'              =>'text',
    'active_callback'	=> 'moun10_is_service_section_enable',
));
$wp_customize->selective_refresh->add_partial(
    'moun10_theme_options[service_section_title]',
    array(
        'selector'            => '#our-services .section-title',
        'render_callback'     => 'moun10_service_section_partial_title',
    )
);

// Service content type control and setting
$wp_customize->add_setting( 'moun10_theme_options[service_content_type]', array(
	'default'          	=> $options['service_content_type'],
	'sanitize_callback' => 'moun10_sanitize_select',
) );

$wp_customize->add_control( 'moun10_theme_options[service_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'moun10' ),
	'section'           => 'moun10_service_section',
	'type'				=> 'select',
	'active_callback' 	=> 'moun10_is_service_section_enable',
	'choices'			=> array( 
		'page' 		=> esc_html__( 'Page', 'moun10' ),
		'post' 		=> esc_html__( 'Post', 'moun10' ),
	),
) );



for($i = 1; $i <= 6; $i ++):
// service pages drop down chooser control and setting
	$wp_customize->add_setting( 'moun10_theme_options[service_content_page_'.$i.']', array(
		'sanitize_callback' => 'moun10_sanitize_page',
	) );

	$wp_customize->add_control( new Moun10_Dropdown_Chooser( $wp_customize, 'moun10_theme_options[service_content_page_'.$i.']', array(
		'label'             => sprintf(esc_html__( 'Select Page : %d', 'moun10'), $i ),
		'section'           => 'moun10_service_section',
		'choices'			=> moun10_page_choices(),
		'active_callback'	=> 'moun10_is_service_section_content_page_enable',
	) ) );

	// service posts drop down chooser control and setting
	$wp_customize->add_setting( 'moun10_theme_options[service_content_post_'.$i.']', array(
		'sanitize_callback' => 'moun10_sanitize_page',
	) );

	$wp_customize->add_control( new Moun10_Dropdown_Chooser( $wp_customize, 'moun10_theme_options[service_content_post_'.$i.']', array(
		'label'             => sprintf(esc_html__( 'Select Post : %d', 'moun10'), $i ),
		'section'           => 'moun10_service_section',
		'choices'			=> moun10_post_choices(),
		'active_callback'	=> 'moun10_is_service_section_content_post_enable',
	) ) );

    //moun10_Customize_Horizontal_Line
    $wp_customize->add_setting('moun10_theme_options[service_separator'. $i .']',array(
        'sanitize_callback'      => 'moun10_sanitize_html',
    ));

    $wp_customize->add_control(new Moun10_Customize_Horizontal_Line($wp_customize,'moun10_theme_options[service_separator'. $i .']',array(
        'active_callback'       => 'moun10_is_service_section_separator_enable',
        'type'                  =>'hr',
        'section'               =>'moun10_service_section',
    )));

endfor;
