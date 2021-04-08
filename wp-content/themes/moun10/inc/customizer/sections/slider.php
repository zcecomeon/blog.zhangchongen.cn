<?php
/**
 * Slider Section options
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */

// Add Slider section
$wp_customize->add_section( 'moun10_slider_section', array(
	'title'             => esc_html__( 'Slider','moun10' ),
	'description'       => esc_html__( 'Slider Section options.', 'moun10' ),
	'panel'             => 'moun10_front_page_panel',
) );

// Slider content enable control and setting
$wp_customize->add_setting( 'moun10_theme_options[slider_section_enable]', array(
	'default'			=> 	$options['slider_section_enable'],
	'sanitize_callback' => 'moun10_sanitize_switch_control',
) );

$wp_customize->add_control( new Moun10_Switch_Control( $wp_customize, 'moun10_theme_options[slider_section_enable]', array(
	'label'             => esc_html__( 'Slider Section Enable', 'moun10' ),
	'section'           => 'moun10_slider_section',
	'on_off_label' 		=> moun10_switch_options(),
) ) );

// Slider autoplay enable control and setting
$wp_customize->add_setting( 'moun10_theme_options[slider_autoplay_enable]', array(
	'default'			=> 	$options['slider_autoplay_enable'],
	'sanitize_callback' => 'moun10_sanitize_switch_control',
) );

$wp_customize->add_control( new Moun10_Switch_Control( $wp_customize, 'moun10_theme_options[slider_autoplay_enable]', array(
	'label'             => esc_html__( 'Slider Autoplay Enable', 'moun10' ),
	'section'           => 'moun10_slider_section',
	'active_callback'   => 'moun10_is_slider_section_enable',
	'on_off_label' 		=> moun10_switch_options(),
) ) );

// Slider number control and setting
$wp_customize->add_setting( 'moun10_theme_options[slider_count]', array(
	'default'          	=> $options['slider_count'],
	'sanitize_callback' => 'moun10_sanitize_number_range',
	'validate_callback' => 'moun10_validate_slider_count',
) );

// slider section title control and setting
$wp_customize->add_setting( 'moun10_theme_options[slider_section_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=>'postMessage'
) );

$wp_customize->add_control('moun10_theme_options[slider_section_title]', array(
    'label'             => esc_html__( 'Section Title', 'moun10' ),
    'section'           => 'moun10_slider_section',
    'type'              =>'text',
    'active_callback'	=> 'moun10_is_slider_section_enable',
));
$wp_customize->selective_refresh->add_partial(
    'moun10_theme_options[slider_section_title]',
    array(
        'selector'            => '#featured-slider .section-subtitle',
        'render_callback'     => 'moun10_slider_section_partial_title',
    )
);

// Slider content type control and setting
$wp_customize->add_setting( 'moun10_theme_options[slider_content_type]', array(
	'default'          	=> $options['slider_content_type'],
	'sanitize_callback' => 'moun10_sanitize_select',
) );

$wp_customize->add_control( 'moun10_theme_options[slider_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'moun10' ),
	'section'           => 'moun10_slider_section',
	'type'				=> 'select',
	'active_callback' 	=> 'moun10_is_slider_section_enable',
	'choices'			=> array( 
            'page' 		=> esc_html__( 'Page', 'moun10' ),
            'post' 		=> esc_html__( 'Post', 'moun10' ),
	),
) );


for ( $i = 1; $i <= 3; $i++ ) :

	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'moun10_theme_options[slider_content_page_'. $i .']', array(
		'sanitize_callback' => 'moun10_sanitize_page',
	) );

	$wp_customize->add_control( new Moun10_Dropdown_Chooser( $wp_customize, 'moun10_theme_options[slider_content_page_'. $i .']', array(
		'label'             => sprintf(esc_html__( 'Select Page: %d', 'moun10'), $i ),
		'section'           => 'moun10_slider_section',
		'choices'			=> moun10_page_choices(),
		'active_callback'	=> 'moun10_is_slider_section_content_page_enable',
	) ) );

	// slider posts drop down chooser control and setting
	$wp_customize->add_setting( 'moun10_theme_options[slider_content_post_'. $i .']', array(
		'sanitize_callback' => 'moun10_sanitize_page',
	) );

	$wp_customize->add_control( new Moun10_Dropdown_Chooser( $wp_customize, 'moun10_theme_options[slider_content_post_'. $i .']', array(
		'label'             => sprintf(esc_html__( 'Select Post : %d', 'moun10'), $i ),
		'section'           => 'moun10_slider_section',
		'choices'			=> moun10_post_choices(),
		'active_callback'	=> 'moun10_is_slider_section_content_post_enable',
	) ) );

	//moun10_Customize_Horizontal_Line
    $wp_customize->add_setting('moun10_theme_options[slider_separator'. $i .']',array(
       'sanitize_callback'      => 'moun10_sanitize_html',
    ));

    $wp_customize->add_control(new Moun10_Customize_Horizontal_Line($wp_customize,'moun10_theme_options[slider_separator'. $i .']',array(
        'active_callback'       => 'moun10_is_slider_section_separator_enable',
        'type'                  =>'hr',
        'section'               =>'moun10_slider_section',
    )));

endfor;


//slider_btn_txt
$wp_customize->add_setting('moun10_theme_options[slider_btn_txt]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['slider_btn_txt'],
    )
);

$wp_customize->add_control('moun10_theme_options[slider_btn_txt]',
    array(
        'section'			=> 'moun10_slider_section',
        'label'				=> esc_html__( 'Button Text:', 'moun10' ),
        'type'          	=>'text',
        'active_callback' 	=> 'moun10_is_slider_section_enable'
    )
);

$wp_customize->selective_refresh->add_partial('moun10_theme_options[slider_btn_txt]',
    array(
        'selector'            => '#featured-slider .read-more a',
        'render_callback'     => 'moun10_slider_section_partial_btn_txt',
    )
);
