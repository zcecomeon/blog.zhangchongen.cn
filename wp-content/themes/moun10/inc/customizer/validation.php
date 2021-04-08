<?php
/**
* Customizer validation functions
*
* @package Theme Palace
* @subpackage Moun10
* @since Moun10 1.0.0
*/
if ( ! function_exists( 'moun10_validate_service_posts_count' ) ) :
    function moun10_validate_service_posts_count( $validity, $value ){
           $value = intval( $value );
       if ( empty( $value ) || ! is_numeric( $value ) ) {
           $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'moun10' ) );
       } elseif ( $value < 2 ) {
           $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 2', 'moun10' ) );
       } elseif ( $value > 6 ) {
           $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 6', 'moun10' ) );
       }
       return $validity;
    }
  endif;
if ( ! function_exists( 'moun10_validate_long_excerpt' ) ) :
    function moun10_validate_long_excerpt( $validity, $value ){
        $value = intval( $value );
        if ( empty( $value ) || ! is_numeric( $value ) ) {
            $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'moun10' ) );
        } elseif ( $value < 5 ) {
            $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of words is 5', 'moun10' ) );
        } elseif ( $value > 100 ) {
            $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 100', 'moun10' ) );
        }
        return $validity;
    }
endif;

if ( ! function_exists( 'moun10_validate_slider_count' ) ) :
  function moun10_validate_slider_count( $validity, $value ){
         $value = intval( $value );
     if ( empty( $value ) || ! is_numeric( $value ) ) {
         $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'moun10' ) );
     } elseif ( $value < 1 ) {
         $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 1', 'moun10' ) );
     } elseif ( $value > 5 ) {
         $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 5', 'moun10' ) );
     }
     return $validity;
  }
endif;
if ( ! function_exists( 'moun10_validate_destination_posts_count' ) ) :
    function moun10_validate_destination_posts_count( $validity, $value ){
        $value = intval( $value );
        if ( empty( $value ) || ! is_numeric( $value ) ) {
            $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'moun10' ) );
        } elseif ( $value < 1 ) {
            $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 1', 'moun10' ) );
        } elseif ( $value > 12 ) {
            $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'moun10' ) );
        }
        return $validity;
    }
endif;

if ( ! function_exists( 'moun10_validate_blog_count' ) ) :
  function moun10_validate_blog_count( $validity, $value ){
         $value = intval( $value );
     if ( empty( $value ) || ! is_numeric( $value ) ) {
         $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'moun10' ) );
     } elseif ( $value < 1 ) {
         $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 1', 'moun10' ) );
     } elseif ( $value > 6 ) {
         $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 6', 'moun10' ) );
     }
     return $validity;
  }
endif;
