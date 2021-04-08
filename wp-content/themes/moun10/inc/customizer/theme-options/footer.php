<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'moun10_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'moun10' ),
		'priority'   			=> 900,
		'panel'      			=> 'moun10_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'moun10_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'moun10_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);

$wp_customize->add_control( 'moun10_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'moun10' ),
		'section'    			=> 'moun10_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'moun10_theme_options[copyright_text]', array(
		'selector'            => '.site-info .wrapper',
		'settings'            => 'moun10_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'moun10_copyright_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'moun10_theme_options[scroll_top_visible]',
	array(
		'default'       	=> $options['scroll_top_visible'],
		'sanitize_callback' => 'moun10_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Moun10_Switch_Control( $wp_customize, 'moun10_theme_options[scroll_top_visible]',
    array(
		'label'      		=> esc_html__( 'Display Scroll Top Button', 'moun10' ),
		'section'    		=> 'moun10_section_footer',
		'on_off_label' 		=> moun10_switch_options(),
    )
) );