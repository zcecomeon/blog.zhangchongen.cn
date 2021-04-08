<?php
/**
 * Destination section
 *
 * This is the template for the content of Destination section
 *
 * @package Theme Palace
 * @subpackage Moun10 Pro
 * @since Moun10 Pro 1.0.0
 */

if ( ! function_exists( 'moun10_add_destination_section' ) ) :
    /**
    * Add destination section
    *
    *@since Moun10 Pro 1.0.0
    */
    function moun10_add_destination_section() {
    	$options = moun10_get_theme_options();
        // Check if destination is enabled on frontpage
        $destination_enable = apply_filters( 'moun10_section_status', true, 'destination_section_enable' );

        if ( true !== $destination_enable ) {
            return false;
        }
        // Get destination section details
        $section_details = array();
        $section_details = apply_filters( 'moun10_filter_destination_section_details', $section_details );
        if ( empty( $section_details ) ) {
            return ;
        }

        // Render destination section now.
        moun10_render_destination_section( $section_details );
    }
endif;

if ( ! function_exists( 'moun10_get_destination_section_details' ) ) :
    /**
    * destination section details.
    *
    * @since Moun10 Pro 1.0.0
    * @param array $input destination section details.
    */
    function moun10_get_destination_section_details( $input ) {
        $options = moun10_get_theme_options();

        // Content type.
        $destination_content_type  = $options['destination_content_type'];
        $destination_count = 6;
        
        $content = array();
        switch ( $destination_content_type ) {
            case 'page':
                $page_ids = array();

                for ( $i = 1; $i <= $destination_count; $i++ ) {
                    if ( ! empty( $options['destination_content_page_' . $i] ) )
                        $page_ids[] = $options['destination_content_page_' . $i];
                }

                $args = array(
                    'post_type'         => 'page',
                    'post__in'          => ( array ) $page_ids,
                    'posts_per_page'    => absint( $destination_count ),
                    'orderby'           => 'post__in',
                    );                    
            break;

            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= $destination_count; $i++ ) {
                    if ( ! empty( $options['destination_content_post_' . $i] ) )
                        $post_ids[] = $options['destination_content_post_' . $i];
                }
                
                $args = array(
                    'post_type'             => 'post',
                    'post__in'              => ( array ) $post_ids,
                    'posts_per_page'        => absint( $destination_count ),
                    'orderby'               => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            default:
            break;
        }
        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 1;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full') : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';
                $page_post['sub_title'] = isset($options['destination_post_sub_title_'.$i]) ? $options['destination_post_sub_title_'.$i] :'';
                // Push to the main array.
                array_push( $content, $page_post );
                $i++;
            endwhile;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// destination section content details.
add_filter( 'moun10_filter_destination_section_details', 'moun10_get_destination_section_details' );


if ( ! function_exists( 'moun10_render_destination_section' ) ) :
  /**
   * Start destination section
   *
   * @return string destination content
   * @since Moun10 Pro 1.0.0
   *
   */
   function moun10_render_destination_section( $content_details = array() ) {
    $options                = moun10_get_theme_options();
    $section_sub_title      = $options['destination_section_sub_title'];
    $section_title          = isset($options['destination_section_title']) ? $options['destination_section_title'] :'';
    $section_description    = isset($options['destination_section_description']) ? $options['destination_section_description'] : '';
    $autoplay               = ($options['destination_autoplay_enable']) ? 'true' : 'false';
    if ( empty( $content_details ) ) {
        return;
    } ?>
       <div id="destination" class="relative page-section">
            <div class="wrapper">
                <div class="section-header">
                    <p class="section-subtitle"><?php echo esc_html($section_sub_title); ?></p>
                    <h2 class="section-title"><?php echo esc_html($section_title); ?></h2>
                    <span class="content"><?php echo esc_html($section_description); ?></span>
                </div><!-- .section-header -->
                <!-- add class="classic-slider" if slide <= 3, and add class="modern-slider" if slide > 3 -->
                <div class="destination-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":false, "autoplay": <?php echo $autoplay; ?> , "draggable": true, "fade": false }'>
                    <?php foreach($content_details as $i=>$content): ?>
                    <article style="background-image: url('<?php echo esc_url($content['image']); ?>');">
                        <header class="entry-header">
                            <span><?php echo esc_html($content['sub_title']); ?></span>
                            <h2 class="entry-title"><a href="<?php echo esc_url($content['url']); ?>"><?php echo esc_html($content['title'])?></a></h2>
                        </header>
                    </article>
                    <?php endforeach; ?>
                </div><!-- .destination-slider -->
            </div><!-- .wrapper -->
        </div><!--- destinations -->
    <?php
    }    
endif; ?>
