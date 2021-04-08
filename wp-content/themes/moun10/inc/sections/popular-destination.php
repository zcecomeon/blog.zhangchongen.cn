<?php
/**
 * Popular Destination section
 *
 * This is the template for the content of popular Destination section
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */
if ( ! function_exists( 'moun10_add_popular_destination_section' ) ) :
	/**
	* Add popular Destination section
	*
	*@since Moun10 1.0.0
	*/
	function moun10_add_popular_destination_section() {
		$options = moun10_get_theme_options();

			// Check if Destination is enabled on frontpage
			$popular_destination_enable = apply_filters( 'moun10_section_status', true, 'popular_destination_section_enable' );

			if ( ! class_exists( 'WP_Travel' ) )return;
			
			if ( true !== $popular_destination_enable ) {
				return false;
			}
			// Get Destination section details
			$section_details = array();
			$section_details = apply_filters( 'moun10_filter_popular_destination_section_details', $section_details );
			if ( empty( $section_details ) ) {
				return;
			}

			// Render Destination section now.
			moun10_render_popular_destination_section( $section_details );
		}
endif;

if ( ! function_exists( 'moun10_get_popular_destination_section_details' ) ) :
	/**
	* Popular Destination section details.
	*
	* @since Moun10 Pro 1.0.0
	* @param array $input popular destination section details.
	*/
	function moun10_get_popular_destination_section_details( $input ) {
		$options = moun10_get_theme_options();

		$popular_destination_count = 6;
		
		$content 		= array();	


		$page_ids = array();

		for ( $i = 1; $i <= $popular_destination_count; $i++ ) {
			if ( ! empty( $options['popular_destination_content_trip_' . $i] ) )
				$page_ids[] = $options['popular_destination_content_trip_' . $i];
		}
		
		$args = array(
			'post_type'         => 'itineraries',
			'post__in'          => ( array ) $page_ids,
			'posts_per_page'    => absint( $popular_destination_count ),
			'orderby'           => 'post__in',
			);   

		$content['taxonomy'] = 'travel_locations';

		$content['details'] = array();
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) : 
			while ( $query->have_posts() ) : $query->the_post();
				$page_post['id']        = get_the_id();
				$page_post['title']     = get_the_title();
				$page_post['url']       = get_the_permalink();
				$page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) :  get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';
				// Push to the main array.
				array_push( $content['details'], $page_post );
			endwhile;
		endif;

		wp_reset_postdata();
		if ( ! empty( $content ) ) {
				$input = $content;
		}
		return $input;
	}
endif;

// Destination section content details.
add_filter( 'moun10_filter_popular_destination_section_details', 'moun10_get_popular_destination_section_details' );


if ( ! function_exists( 'moun10_render_popular_destination_section' ) ) :
	/**
	 * Start Destination section
	 *
	 * @return string Destination content
	 * @since Moun10 Pro 1.0.0
	 *
	 */
	 function moun10_render_popular_destination_section( $content_details = array() ) {
		$options = moun10_get_theme_options();

		$popular_destination_btn_label 		= !empty($options['popular_destination_btn_label']) ? $options['popular_destination_btn_label'] : '';

		if ( empty( $content_details ) ) {
				return;
		} ?>
			<div id="top-destinations" class="relative page-section">
                <div class="wrapper">
           
                    <div class="section-header">
						<p class="section-subtitle"><?php echo esc_html($options['popular_destination_sub_title']); ?></p>
						<h2 class="section-title"><?php echo esc_html($options['popular_destination_title']); ?></h2>
                    </div><!-- .section-header -->   

                    <div class="section-content col-3 clear">
					<?php foreach ($content_details['details'] as $content): ?>

                        <article>
                            <div class="destination-item-wrapper">
                                <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'])?>');">
                                    <div class="overlay"></div>
                                </div><!-- .featured-image -->

                                <div class="entry-container clear">
                                    <header class="entry-header">
										<h2 class="entry-title"><a href="<?php echo esc_url($content['url']); ?>"><?php echo esc_html($content['title']); ?></a></h2>
									
										<span><a href="<?php echo esc_url($content['url']); ?>"><?php wptravel_get_trip_duration($content['id']); ?></a></span>
									
                                    </header>   
						
									<div class="price-wrapper">
										<span class="trip-price">             
										<?php $trip_price = WP_Travel_Helpers_Pricings::get_price( array('trip_id'=>$content['id']) );
											echo wptravel_get_formated_price_currency( $trip_price ); 									
											$average_rating = wptravel_get_average_rating( $content['id'] ); 
											?>
											<div class="wp-travel-average-review"
												title="<?php printf( esc_attr__( 'Rated %s out of 5', 'moun10' ), $average_rating ); ?>">
												<span style="width:<?php echo esc_attr( ( $average_rating / 5 ) * 100 ); ?>%">
													<strong itemprop="ratingValue"
														class="rating"><?php echo esc_html( $average_rating ); ?></strong>
													<?php printf( esc_html__( 'out of %1$s5%2$s', 'moun10' ), '<span itemprop="bestRating">', '</span>' ); ?>
												</span>
											</div>										
										</span><!-- .trip-price -->
										<?php wptravel_single_trip_rating( $content['id'], $hide_rating = true ) ?>
										<?php if(!empty($options['popular_destination_read_more_btn_label'])) echo sprintf( '<a href="%s" class="more-link">%s</a>', esc_url($content['url']), esc_html($options['popular_destination_read_more_btn_label']) ); ?>
									</div><!-- .price-wrapper -->

                                </div><!-- .entry-container -->
                            </div><!-- .destination-item-wrapper -->
                        </article>
						<?php endforeach; ?>

                    </div><!-- .section-content -->

					<?php if( !empty($options['popular_destination_btn_url'] ) && !empty($popular_destination_btn_label)) : ?>
						<div class="read-more">
							<a href="<?php echo esc_url($options['popular_destination_btn_url']); ?>" class="btn"><?php echo esc_html($popular_destination_btn_label); ?></a>
						</div><!-- .read-more -->
					<?php endif; ?>
                </div><!-- .wrapper -->
            </div>
<?php }
endif;