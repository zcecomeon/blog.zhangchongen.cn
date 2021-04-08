<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'moun10_reset_section', array(
	'title'             => esc_html__('Reset all settings','moun10'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'moun10' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'moun10_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'moun10_sanitize_checkbox',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'moun10_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'moun10' ),
	'section'           => 'moun10_reset_section',
	'type'              => 'checkbox',
) );
