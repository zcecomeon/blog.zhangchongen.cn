<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Moun10
* @since Moun10 1.0.0
*/

if ( ! function_exists( 'moun10_blog_title_partial' ) ) :
    // blog title
    function moun10_blog_title_partial() {
        $options = moun10_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

if ( ! function_exists( 'moun10_copyright_text_partial' ) ) :
    // blog btn title
    function moun10_copyright_text_partial() {
        $options = moun10_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;

// slider section  btn txt
if ( ! function_exists( 'moun10_slider_section_partial_btn_txt' ) ) :
    function moun10_slider_section_partial_btn_txt() {
        $options = moun10_get_theme_options();
        return esc_html( $options['slider_btn_txt'] );
    }
endif;

if ( ! function_exists( 'moun10_slider_section_partial_title' ) ) :
    // slider section title title
    function moun10_slider_section_partial_title() {
        $options = moun10_get_theme_options();
        return esc_html( $options['slider_section_title'] );
    }
endif;

//service section title selective refresh
if ( ! function_exists( 'moun10_service_section_partial_title' ) ) :
    // service section  title
    function moun10_service_section_partial_title() {
        $options = moun10_get_theme_options();
        return esc_html( $options['service_section_title'] );
    }
endif;
