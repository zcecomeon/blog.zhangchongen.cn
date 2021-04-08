<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */

/**
 * moun10_footer_primary_content hook
 *
 * @hooked moun10_add_subscribe_section -  10
 *
 */
do_action( 'moun10_footer_primary_content' );

/**
 * moun10_content_end_action hook
 *
 * @hooked moun10_content_end -  10
 *
 */
do_action( 'moun10_content_end_action' );

/**
 * moun10_content_end_action hook
 *
 * @hooked moun10_footer_start -  10
 * @hooked moun10_Footer_Widgets->add_footer_widgets -  20
 * @hooked moun10_footer_site_info -  40
 * @hooked moun10_footer_end -  100
 *
 */
do_action( 'moun10_footer' );

/**
 * moun10_page_end_action hook
 *
 * @hooked moun10_page_end -  10
 *
 */
do_action( 'moun10_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
