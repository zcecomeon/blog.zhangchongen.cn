<?php
/**
 *
 * This template can be overridden by copying it to yourtheme/wp-travel/single-itineraries.php.
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

get_header( 'itinerary' ); ?>
<?php do_action( 'wp_travel_before_main_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>

	<?php wptravel_get_template_part( 'content', 'single-itineraries' ); ?>


	<div id="secondary">
		<div id="wp-travel-secondary" class="wp-travel-widget-area widget-area" role="complementary">
			<?php if ( $wp_travel_itinerary->is_sale_enabled() ) : ?>
      			<div class="wp-travel-offer">
      			    <span><?php esc_html_e( 'Offer', 'moun10' ); ?></span>
      			</div>
  			<?php endif; ?>
  			
			<?php do_action( 'moun10_trip_after_title', get_the_ID() ); ?>
		</div>
	</div>
<?php endwhile; // end of the loop. ?>

<?php do_action( 'wp_travel_after_main_content' ); ?>
<?php get_footer( 'itinerary' ); ?>
