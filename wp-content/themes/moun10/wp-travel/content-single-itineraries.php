<?php
/**
 * Itinerary Single Contnet Template
 *
 * This template can be overridden by copying it to yourtheme/wp-travel/content-single-itineraries.php.
 *
 * HOWEVER, on occasion wp-travel will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.wensolutions.com/document/template-structure/
 * @author      WenSolutions
 * @package     wp-travel/Templates
 * @since       1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $wp_travel_itinerary;
?>

<div id="inner-content-wrapper" class="wrapper page-section">
	<div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
			<?php
			do_action( 'wp_travel_before_single_itinerary', get_the_ID() );
			if ( post_password_required() ) {
				echo get_the_password_form();
				return;
			}

			do_action( 'wp_travel_before_content_start');
			?>

			<div id="itinerary-4<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="content entry-content">
				    <?php do_action( 'wp_travel_single_trip_after_header', get_the_ID() ); ?>
				</div><!-- .summary -->

			</div><!-- #itinerary-<?php the_ID(); ?> -->

			<?php do_action( 'wp_travel_after_single_itinerary', get_the_ID() ); ?>
		</main><!-- #main -->
	</div><!-- #primary -->