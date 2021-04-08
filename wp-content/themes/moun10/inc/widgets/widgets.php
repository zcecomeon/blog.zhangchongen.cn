<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of Moun10
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */

/*
 * Add Social   widget
 */
require get_template_directory() . '/inc/widgets/social-widget.php';


/**
 * Register widgets
 */
function moun10_register_widgets() {

    register_widget( 'Moun10_Social_Widget' );

}
add_action( 'widgets_init', 'moun10_register_widgets' );