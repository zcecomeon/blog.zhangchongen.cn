<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */

if ( ! function_exists( 'moun10_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Moun10 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function moun10_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'moun10_theme_options[pagination_enable]' )->value();
	}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if slider section is enabled.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_slider_section_enable( $control ) {
	return ( $control->manager->get_setting( 'moun10_theme_options[slider_section_enable]' )->value() );
}

/**
 * Check if slider section content type is post.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_slider_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'moun10_theme_options[slider_content_type]' )->value();
	return moun10_is_slider_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if slider section content type is page.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_slider_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'moun10_theme_options[slider_content_type]' )->value();
	return moun10_is_slider_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if slider section content type is category.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_slider_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'moun10_theme_options[slider_content_type]' )->value();
	return moun10_is_slider_section_enable( $control ) && ( 'category' == $content_type );
}
/**
 * Check if slider separator section is enabled.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_slider_section_separator_enable( $control ) {
    $content_type = $control->manager->get_setting( 'moun10_theme_options[slider_content_type]' )->value();
    return moun10_is_slider_section_enable( $control ) && !( 'category' == $content_type );
}
/**
 * Check if about section is enabled.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'moun10_theme_options[about_section_enable]' )->value() );
}

/**
 * Check if about section content type is page.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_about_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'moun10_theme_options[about_content_type]' )->value();
	return moun10_is_about_section_enable( $control ) && ( 'page' == $content_type );
}
/**
 * Check if slider section content type is post.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_about_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'moun10_theme_options[about_content_type]' )->value();
	return moun10_is_about_section_enable( $control ) && ( 'post' == $content_type );
}
/**
 * Check if service section is enabled.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_service_section_enable( $control ) {
	return ( $control->manager->get_setting( 'moun10_theme_options[service_section_enable]' )->value() );
}

/**
 * Check if service section content type is page.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_service_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'moun10_theme_options[service_content_type]' )->value();
	return moun10_is_service_section_enable( $control ) && ( 'page' == $content_type );
}
/**
 * Check if service section content type is post.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_service_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'moun10_theme_options[service_content_type]' )->value();
	return moun10_is_service_section_enable( $control ) && ( 'post' == $content_type );
}
/**
 * Check if service section content type is category.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_service_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'moun10_theme_options[service_content_type]' )->value();
	return moun10_is_service_section_enable( $control ) && ( 'category' == $content_type );
}
/**
 * Check if service separator section is enabled.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_service_section_separator_enable( $control ) {
    $content_type = $control->manager->get_setting( 'moun10_theme_options[service_content_type]' )->value();
    return moun10_is_service_section_enable( $control ) && !( 'category' == $content_type );
}
/**
 * Check if service btn url section is enabled.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_service_section_btn_url_enable( $control ) {
    $content_type = $control->manager->get_setting( 'moun10_theme_options[service_content_type]' )->value();
    return moun10_is_service_section_enable( $control ) && !( 'category' == $content_type );
}

/**
 * Check if blog section is enabled.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'moun10_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if blog section content type is post.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_blog_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'moun10_theme_options[blog_content_type]' )->value();
	return moun10_is_blog_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if blog section content type is page.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_blog_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'moun10_theme_options[blog_content_type]' )->value();
	return moun10_is_blog_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if blog section content type is category.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_blog_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'moun10_theme_options[blog_content_type]' )->value();
	return moun10_is_blog_section_enable( $control ) && ( 'category' == $content_type );
}
/**
 * Check if blog section content type is recent.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_blog_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'moun10_theme_options[blog_content_type]' )->value();
	return moun10_is_blog_section_enable( $control ) && ( 'recent' == $content_type );
}
/**
 * Check if blog separator section is enabled.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_blog_section_separator_enable( $control ) {
    $content_type = $control->manager->get_setting( 'moun10_theme_options[blog_content_type]' )->value();
    return moun10_is_blog_section_enable( $control ) && !( 'recent' == $content_type || 'category' == $content_type ) ;
}

/**
 * Check if counter section is enabled.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_counter_section_enable( $control ) {
	return ( $control->manager->get_setting( 'moun10_theme_options[counter_section_enable]' )->value() );
}

/**
 * Check if destination section is enabled.
 *
 * @since Moun10 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_destination_section_enable( $control ) {
	return ( $control->manager->get_setting( 'moun10_theme_options[destination_section_enable]' )->value() );
}
/**
 * Check if destination section content type is page.
 *
 * @since Moun10 Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_destination_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'moun10_theme_options[destination_content_type]' )->value();
	return moun10_is_destination_section_enable( $control ) && ( 'page' == $content_type );
}
/**
 * Check if destination section content type is post.
 *
 * @since Moun10 Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function moun10_is_destination_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'moun10_theme_options[destination_content_type]' )->value();
	return moun10_is_destination_section_enable( $control ) && ( 'post' == $content_type );
}

function moun10_is_popular_destination_section_enable( $control ) {
	return ( $control->manager->get_setting( 'moun10_theme_options[popular_destination_section_enable]' )->value() );
}