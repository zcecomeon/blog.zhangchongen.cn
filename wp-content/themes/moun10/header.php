<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Moun10
	 * @since Moun10 1.0.0
	 */

	/**
	 * moun10_doctype hook
	 *
	 * @hooked moun10_doctype -  10
	 *
	 */
	do_action( 'moun10_doctype' );

?>
<head>
<?php
	/**
	 * moun10_before_wp_head hook
	 *
	 * @hooked moun10_head -  10
	 *
	 */
	do_action( 'moun10_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>
<?php
	/**
	 * moun10_page_start_action hook
	 *
	 * @hooked moun10_page_start -  10
	 *
	 */
	do_action( 'moun10_page_start_action' ); 

	/**
	 * moun10_loader_action hook
	 *
	 * @hooked moun10_loader -  10
	 *
	 */
	do_action( 'moun10_before_header' );

	/**
	 * moun10_header_action hook
	 *
	 * @hooked moun10_site_branding -  10
	 * @hooked moun10_header_start -  20
	 * @hooked moun10_site_navigation -  30
	 * @hooked moun10_header_end -  50
	 *
	 */
	do_action( 'moun10_header_action' );

	/**
	 * moun10_content_start_action hook
	 *
	 * @hooked moun10_content_start -  10
	 *
	 */
	do_action( 'moun10_content_start_action' );

    /**
     * moun10_header_image_action hook
     *
     * @hooked moun10_header_image -  10
     *
     */
    do_action( 'moun10_header_image_action' );
