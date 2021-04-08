<?php
/**
 * Destination Section options
 *
 * @package Theme Palace
 * @subpackage Moun10 Pro
 * @since Moun10 Pro 1.0.0
 */

// Add Destination section
$wp_customize->add_section( 'moun10_destination_section', array(
	'title'             => esc_html__( 'Destinations','moun10' ),
	'description'       => esc_html__( 'Destinations Section options.', 'moun10' ),
	'panel'             => 'moun10_front_page_panel',
) );

// Destination content enable control and setting
$wp_customize->add_setting( 'moun10_theme_options[destination_section_enable]', array(
	'default'			=> 	$options['destination_section_enable'],
	'sanitize_callback' => 'moun10_sanitize_switch_control',
) );

$wp_customize->add_control( new Moun10_Switch_Control( $wp_customize, 'moun10_theme_options[destination_section_enable]', array(
	'label'             => esc_html__( 'Destination Section Enable', 'moun10' ),
	'section'           => 'moun10_destination_section',
    'on_off_label' 		=> moun10_switch_options(),
) ) );


// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'moun10_theme_options[destination_section_enable]', array(
		'selector'            => '#destination .wrapper',
		'settings'            => 'moun10_theme_options[destination_section_enable]',
    ) );
}

// Destination autoplay enable control and setting
$wp_customize->add_setting( 'moun10_theme_options[destination_autoplay_enable]', array(
    'default'			=> 	$options['destination_autoplay_enable'],
    'sanitize_callback' => 'moun10_sanitize_switch_control',
) );

$wp_customize->add_control( new Moun10_Switch_Control( $wp_customize, 'moun10_theme_options[destination_autoplay_enable]', array(
    'label'             => esc_html__( 'Destination Autoplay Enable', 'moun10' ),
    'section'           => 'moun10_destination_section',
    'active_callback'   => 'moun10_is_destination_section_enable',
    'on_off_label' 		=> moun10_switch_options(),
) ) );

// Destination section sub title control and setting
$wp_customize->add_setting( 'moun10_theme_options[destination_section_sub_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=>'postMessage',
    'default'           => $options['destination_section_sub_title'],
) );

$wp_customize->add_control('moun10_theme_options[destination_section_sub_title]', array(
    'label'             => esc_html__( 'Section Sub Title', 'moun10' ),
    'section'           => 'moun10_destination_section',
    'type'              =>'text',
    'active_callback'	=> 'moun10_is_destination_section_enable',
));
$wp_customize->selective_refresh->add_partial(
    'moun10_theme_options[destination_section_sub_title]',
    array(
        'selector'            => '#destination .section-subtitle',
        'render_callback'     => 'moun10_destination_section_partial_sub_title',
    )
);

// Destination section title control and setting
$wp_customize->add_setting( 'moun10_theme_options[destination_section_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
    'transport'			=>'postMessage',
    'default'           => $options['destination_section_title'],
) );

$wp_customize->add_control('moun10_theme_options[destination_section_title]', array(
    'label'             => esc_html__( 'Section Title', 'moun10' ),
    'section'           => 'moun10_destination_section',
    'type'              =>'text',
    'active_callback'	=> 'moun10_is_destination_section_enable',
));
$wp_customize->selective_refresh->add_partial(
    'moun10_theme_options[destination_section_title]',
    array(
        'selector'            => '#destination h2.section-title',
        'render_callback'     => 'moun10_destination_section_partial_title',
    )
);
// Destination section Description control and setting
$wp_customize->add_setting( 'moun10_theme_options[destination_section_description]', array(
    'sanitize_callback' => 'sanitize_textarea_field',
    'transport'			=>'postMessage',
    'default'           => $options['destination_section_description'],

) );

$wp_customize->add_control('moun10_theme_options[destination_section_description]', array(
    'label'             => esc_html__( 'Description', 'moun10' ),
    'section'           => 'moun10_destination_section',
    'type'              =>'textarea',
    'active_callback'	=> 'moun10_is_destination_section_enable',
));
$wp_customize->selective_refresh->add_partial(
    'moun10_theme_options[destination_section_description]',
    array(
        'selector'            => '#destination div.section-header span.content',
        'render_callback'     => 'moun10_destination_section_partial_description',
    )
);


//Destination section content control type setting and control
$wp_customize->add_setting( 'moun10_theme_options[destination_content_type]', array(
	'default'          	=> $options['destination_content_type'],
	'sanitize_callback' => 'moun10_sanitize_select',
) );

$wp_customize->add_control( 'moun10_theme_options[destination_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'moun10' ),
	'section'           => 'moun10_destination_section',
	'type'				=> 'select',
	'active_callback' 	=> 'moun10_is_destination_section_enable',
	'choices'			=> array( 
            'page' 		=> esc_html__( 'Page', 'moun10' ),
            'post' 		=> esc_html__( 'Post', 'moun10' ),
	),
) );



for($i = 1; $i <= 6; $i ++):
// Destination pages drop down chooser control and setting
    $wp_customize->add_setting( 'moun10_theme_options[destination_content_page_'.$i.']', array(
        'sanitize_callback' => 'moun10_sanitize_page',
    ) );

    $wp_customize->add_control( new Moun10_Dropdown_Chooser( $wp_customize, 'moun10_theme_options[destination_content_page_'.$i.']', array(
        'label'             => sprintf(esc_html__( 'Select Page : %d' , 'moun10'), $i ),
        'section'           => 'moun10_destination_section',
        'choices'			=> moun10_page_choices(),
        'active_callback'	=> 'moun10_is_destination_section_content_page_enable',
    ) ) );

    // Destination posts drop down chooser control and setting
    $wp_customize->add_setting( 'moun10_theme_options[destination_content_post_'.$i.']', array(
        'sanitize_callback' => 'moun10_sanitize_page',
    ) );

    $wp_customize->add_control( new Moun10_Dropdown_Chooser( $wp_customize, 'moun10_theme_options[destination_content_post_'.$i.']', array(
        'label'             => sprintf(esc_html__( 'Select Post : %d', 'moun10' ), $i),
        'section'           => 'moun10_destination_section',
        'choices'			=> moun10_post_choices(),
        'active_callback'	=> 'moun10_is_destination_section_content_post_enable',
    ) ) );
       // Destination posts sub title control and setting
    $wp_customize->add_setting( 'moun10_theme_options[destination_post_sub_title_'.$i.']', array(
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control('moun10_theme_options[destination_post_sub_title_'.$i.']', array(
        'label'             => sprintf(esc_html__( 'Select Sub Title : %d', 'moun10'), $i),
        'section'           => 'moun10_destination_section',
        'active_callback'	=> 'moun10_is_destination_section_enable',
        'type'              => 'text',
    ) );

    //Moun10_Customize_Horizontal_Line
    $wp_customize->add_setting('moun10_theme_options[destination_separator'. $i .']',array(
        'sanitize_callback'      => 'moun10_sanitize_html',
    ));

    $wp_customize->add_control(new Moun10_Customize_Horizontal_Line($wp_customize,'moun10_theme_options[destination_separator'. $i .']',array(
        'active_callback'	    => 'moun10_is_destination_section_enable',
        'type'                  =>'hr',
        'section'               =>'moun10_destination_section',
    )));

endfor;
