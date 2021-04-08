<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */

// Add About section
$wp_customize->add_section( 'moun10_about_section', array(
	'title'             => esc_html__( 'About us','moun10' ),
	'description'       => esc_html__( 'About us  Section options.', 'moun10' ),
	'panel'             => 'moun10_front_page_panel',
) );

// About content enable control and setting
$wp_customize->add_setting( 'moun10_theme_options[about_section_enable]', array(
	'default'			=> 	$options['about_section_enable'],
	'sanitize_callback' => 'moun10_sanitize_switch_control',
) );

$wp_customize->add_control( new Moun10_Switch_Control( $wp_customize, 'moun10_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'About Section Enable', 'moun10' ),
	'section'           => 'moun10_about_section',
	'on_off_label' 		=> moun10_switch_options(),
) ) );

// About content type control and setting
$wp_customize->add_setting( 'moun10_theme_options[about_content_type]', array(
	'default'          	=> $options['about_content_type'],
	'sanitize_callback' => 'moun10_sanitize_select',
) );

$wp_customize->add_control( 'moun10_theme_options[about_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'moun10' ),
	'section'           => 'moun10_about_section',
	'type'				=> 'select',
	'active_callback' 	=> 'moun10_is_about_section_enable',
	'choices'			=> array( 
            'page' 		=> esc_html__( 'Page', 'moun10' ),
            'post' 		=> esc_html__( 'Post', 'moun10' ),
	),
) );

	// about pages drop down chooser control and setting
	$wp_customize->add_setting( 'moun10_theme_options[about_content_page]', array(
		'sanitize_callback' => 'moun10_sanitize_page',
	) );

	$wp_customize->add_control( new Moun10_Dropdown_Chooser( $wp_customize, 'moun10_theme_options[about_content_page]', array(
		'label'             => esc_html__( 'Select Page', 'moun10' ),
		'section'           => 'moun10_about_section',
		'choices'			=> moun10_page_choices(),
		'active_callback'	=> 'moun10_is_about_section_content_page_enable',
	) ) );

	// about posts drop down chooser control and setting
	$wp_customize->add_setting( 'moun10_theme_options[about_content_post]', array(
		'sanitize_callback' => 'moun10_sanitize_page',
	) );

	$wp_customize->add_control( new Moun10_Dropdown_Chooser( $wp_customize, 'moun10_theme_options[about_content_post]', array(
		'label'             => esc_html__( 'Select Post', 'moun10' ),
		'section'           => 'moun10_about_section',
		'choices'			=> moun10_post_choices(),
		'active_callback'	=> 'moun10_is_about_section_content_post_enable',
	) ) );


// About link setting
$wp_customize->add_setting(
    'moun10_theme_options[about_video_url]',
    array(
        'sanitize_callback' => 'esc_url_raw',
        'default' 			=> '#',
    )
);

$wp_customize->add_control(
    'moun10_theme_options[about_video_url]',
    array(
        'section'			=> 'moun10_about_section',
        'label'				=> esc_html__( 'Video URL Link:', 'moun10' ),
        'type'				=> 'url',
        'active_callback' 	=> 'moun10_is_about_section_enable'
    )
);
// About image setting
$wp_customize->add_setting(
    'moun10_theme_options[about_thumbnail_img]',
    array(
        'sanitize_callback' => 'moun10_sanitize_image',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'moun10_theme_options[about_thumbnail_img]',
        array(
            'section'			=> 'moun10_about_section',
            'label'				=> esc_html__( 'Video Thumbnail Image:', 'moun10' ),
            'active_callback' 	=> 'moun10_is_about_section_enable',
        )
    )
);
