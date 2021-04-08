<?php
/**
 * Services section
 *
 * This is the template for the content of service section
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */
if ( ! function_exists( 'moun10_add_service_section' ) ) :
    /**
    * Add service section
    *
    *@since Moun10 1.0.0
    */
    function moun10_add_service_section() {
    	$options = moun10_get_theme_options();
        // Check if service is enabled on frontpage
        $service_enable = apply_filters( 'moun10_section_status', true, 'service_section_enable' );

        if ( true !== $service_enable ) {
            return false;
        }
        // Get service section details
        $section_details = array();
        $section_details = apply_filters( 'moun10_filter_service_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render service section now.
        moun10_render_service_section( $section_details );
    }
endif;

if ( ! function_exists( 'moun10_get_service_section_details' ) ) :
    /**
    * service section details.
    *
    * @since Moun10 1.0.0
    * @param array $input service section details.
    */
    function moun10_get_service_section_details( $input ) {
        $options = moun10_get_theme_options();

        // Content type.
        $service_content_type  = $options['service_content_type'];
        $service_count = 6;
        
        $content = array();
        switch ( $service_content_type ) {
            
            case 'page':
                $page_ids = array();

                for ( $i = 1; $i <= $service_count; $i++ ) {
                    if ( ! empty( $options['service_content_page_' . $i] ) )
                        $page_ids[] = $options['service_content_page_' . $i];
                }

                $args = array(
                    'post_type'         => 'page',
                    'post__in'          => ( array ) $page_ids,
                    'posts_per_page'    => absint( $service_count ),
                    'orderby'           => 'post__in',
                    );                    
            break;

            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= $service_count; $i++ ) {
                    if ( ! empty( $options['service_content_post_' . $i] ) )
                        $post_ids[] = $options['service_content_post_' . $i];
                }
                
                $args = array(
                    'post_type'             => 'post',
                    'post__in'              => ( array ) $post_ids,
                    'posts_per_page'        => absint( $service_count ),
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
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['content']   = get_the_excerpt();
                $page_post['url']       = get_the_permalink();
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
// service section content details.
add_filter( 'moun10_filter_service_section_details', 'moun10_get_service_section_details' );


if ( ! function_exists( 'moun10_render_service_section' ) ) :
  /**
   * Start service section
   *
   * @return string service content
   * @since Moun10 1.0.0
   *
   */
   function moun10_render_service_section( $content_details = array() ) {
        $options    = moun10_get_theme_options();
        $title      = isset($options['service_section_title']) ? $options['service_section_title']: '';
       if ( empty( $content_details ) ) {
            return;
        } ?>
        
       <div id="our-services" class="relative">
            <div class="wrapper">
                <div class="section-header">
                    <h2 class="section-title"><?php echo esc_html($title); ?></h2>
                </div><!-- .section-header -->
                <div class="section-content">
            <?php 
                foreach ( $content_details as $i=>$content ) : ?>
                    <article class="has-post-thumbnail <?php echo esc_attr($content['id']); ?>">
                        <div class="featured-image" style="background-image: url('<?php echo esc_url($content['image']); ?>');">
                        <a href="<?php echo esc_url($content['image']); ?>" class="post-thumbnail-link"></a>
                        </div><!-- .featured-image -->

                        <div class="entry-container">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php echo esc_url($content['url']); ?>"><?php echo esc_html($content['title']); ?></a></h2>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <p><?php echo wp_kses_post($content['content']); ?></p>
                            </div><!-- .entry-content -->
                            <a href="<?php echo esc_url($content['url']); ?>" class="more-link"><?php esc_html_e( 'Read more','moun10'); ?></a>
                        </div><!-- .entry-container -->
                    </article><!-- article-->
            <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
       </div><!-- #our-services -->
    <?php
    }    
endif; ?>
