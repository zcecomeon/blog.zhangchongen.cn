<?php
/**
 * Banner section
 *
 * This is the template for the content of slider section
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */
if ( ! function_exists( 'moun10_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since Moun10 1.0.0
    */
    function moun10_add_slider_section() {
    	$options = moun10_get_theme_options();
        // Check if slider is enabled on frontpage
        $slider_enable = apply_filters( 'moun10_section_status', true, 'slider_section_enable' );

        if ( true !== $slider_enable ) {
            return false;
        }
        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'moun10_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render slider section now.
        moun10_render_slider_section( $section_details );
    }
endif;

if ( ! function_exists( 'moun10_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since Moun10 1.0.0
    * @param array $input slider section details.
    */
    function moun10_get_slider_section_details( $input ) {
        $options = moun10_get_theme_options();

        // Content type.
        $slider_content_type    = $options['slider_content_type'];
        $slider_count           = 3;
        
        $content = array();
        switch ( $slider_content_type ) {
            
            case 'page':
                $page_ids = array();

                for ( $i = 1; $i <= $slider_count; $i++ ) {
                    if ( ! empty( $options['slider_content_page_' . $i] ) )
                        $page_ids[] = $options['slider_content_page_' . $i];
                }

                $args = array(
                    'post_type'         => 'page',
                    'post__in'          => ( array ) $page_ids,
                    'posts_per_page'    => absint( $slider_count ),
                    'orderby'           => 'post__in',
                    );                    
            break;

            default:
            break;
        }

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['author']    = moun10_author();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// slider section content details.
add_filter( 'moun10_filter_slider_section_details', 'moun10_get_slider_section_details' );


if ( ! function_exists( 'moun10_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since Moun10 1.0.0
   *
   */
   function moun10_render_slider_section( $content_details = array() ) {
        $options = moun10_get_theme_options();
        $section_sub_title = isset( $options['slider_section_title'] ) ? $options['slider_section_title'] : '';
        if ( empty( $content_details ) ) {
            return;
        } ?>
        
        <div id="featured-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":true, "autoplay": <?php echo $options['slider_autoplay_enable']; ?>, "draggable": true, "fade": true }'>
            <?php 
                foreach ( $content_details as $content ) : ?>
                    <article style="background-image: url('<?php echo esc_url( $content['image'] ) ; ?>');">
                        <div class="overlay"></div>
                        <div class="wrapper">
                            <div class="featured-content-wrapper">
                                <header class="entry-header">
                                    <p class="section-subtitle"><?php echo esc_html($section_sub_title ); ?></p>
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>
                                <?php if(!empty($options['slider_btn_txt'])): ?>
                                <div class="read-more">
                                    <a href="<?php echo esc_url($content['url']); ?>" class="btn"><?php echo esc_html($options['slider_btn_txt'])?></a>
                                </div><!-- .read-more -->
                                <?php endif;?>
                            </div>
                        </div><!-- .wrapper -->
                    </article>
            <?php 
                endforeach; ?>
       </div><!-- #featured-slider -->
    <?php
    }    
endif; ?>
