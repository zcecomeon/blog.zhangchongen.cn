<?php
/**
 * Theme Palace wp travel hooks overwrite
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */

/**
 * Add html for Keywords.
 *
 * @param int $post_id ID of current post.
 */
function moun10_trip_duration( $post_id ) {
	if ( ! $post_id ) {
		return;
	}
	$start_date	= get_post_meta( $post_id, 'wp_travel_start_date', true );
	$end_date 	= get_post_meta( $post_id, 'wp_travel_end_date', true );
	
	$fixed_departure = get_post_meta( $post_id, 'wp_travel_fixed_departure', true );
	$fixed_departure = ( $fixed_departure ) ? $fixed_departure : 'yes';
	$fixed_departure = apply_filters( 'wp_travel_fixed_departure_defalut', $fixed_departure );

	$trip_duration = get_post_meta( $post_id, 'wp_travel_trip_duration', true );
	$trip_duration = ( $trip_duration ) ? $trip_duration : 0;
	$trip_duration_night = get_post_meta( $post_id, 'wp_travel_trip_duration_night', true );
	$trip_duration_night = ( $trip_duration_night ) ? $trip_duration_night : 0;
	
	if ( 'yes' === $fixed_departure ) : 
		if ( $start_date && $end_date ) :
			
			$date_format = get_option( 'date_format' );
			if ( ! $date_format ) :
				$date_format = 'jS M, Y';
			endif;
			printf( '%s - %s', date( $date_format, strtotime( $start_date ) ), date( $date_format, strtotime( $end_date ) ) ); 

		endif;
	else :
		if ( $trip_duration || $trip_duration_night ) :
			printf( __( '%1$s Day(s) %2$s Night(s)', 'moun10' ), $trip_duration, $trip_duration_night );
		endif;

	endif;
}

remove_action( 'wp_travel_after_main_content', 'wp_travel_archive_wrapper_close' );
add_action( 'wp_travel_after_main_content', 'moun10_archive_wrapper_close' );
/**
 * Add html for Keywords.
 */
function moun10_archive_wrapper_close() { ?>
	</div>
<?php }

remove_action( 'wp_travel_single_trip_after_title', 'wptravel_trip_price', 1 );
remove_action( 'wp_travel_single_trip_after_title', 'wptravel_single_excerpt', 1 );
remove_action( 'wp_travel_single_trip_after_header', 'wptravel_trip_map', 20 );
add_action( 'moun10_trip_after_title', 'wptravel_trip_price', 10 );
add_action( 'moun10_trip_after_title', 'wptravel_single_excerpt', 20 );
add_action( 'moun10_trip_after_title', 'wptravel_trip_map', 30 );
