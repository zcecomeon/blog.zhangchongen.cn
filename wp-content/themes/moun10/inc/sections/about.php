<?php
/**
 * About section
 *
 * This is the template for the content of about section
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */
if ( ! function_exists( 'moun10_add_about_section' ) ) :
    /**
    * Add about section
    *
    *@since Moun10 1.0.0
    */
    function moun10_add_about_section() {
        $options = moun10_get_theme_options();
        // Check if about is enabled on frontpage
        $about_enable = apply_filters( 'moun10_section_status', true, 'about_section_enable' );

        if ( true !== $about_enable ) {
            return false;
        }
        // Get about section details
        $section_details = array();
        $section_details = apply_filters( 'moun10_filter_about_section_details', $section_details );
        if ( empty( $section_details ) ) {
            return ;
        }

        // Render about section now.
        moun10_render_about_section( $section_details );
    }
endif;

if ( ! function_exists( 'moun10_get_about_section_details' ) ) :
    /**
    * about section details.
    *
    * @since Moun10 1.0.0
    * @param array $input about section details.
    */
    function moun10_get_about_section_details( $input ) {
        $options = moun10_get_theme_options();

        // Content type.
        $about_content_type  = $options['about_content_type'];
        $about_count = ! empty( $options['about_count'] ) ? $options['about_count'] : 1;
        
        $content = array();
        switch ( $about_content_type ) {
            case 'page':
                $page_id = '';
                if ( ! empty( $options['about_content_page'] ) )
                    $page_id = isset($options['about_content_page']) ? $options['about_content_page'] : '' ;
                $args = array(
                    'post_type'             => 'page',
                    'p'                     =>  absint( $page_id ),
                    'ignore_sticky_posts'   => true,
                    );
                break;

            case 'post':
                $post_id = '';
                if ( ! empty( $options['about_content_post'] ) )
                    $post_id = isset($options['about_content_post'])?$options['about_content_post']:'';
                $args = array(
                    'post_type'             => 'post',
                    'p'                     => absint( $post_id ),
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
                $page_post['content']   = moun10_trim_content(40);
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
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
// about section content details.
add_filter( 'moun10_filter_about_section_details', 'moun10_get_about_section_details' );


if ( ! function_exists( 'moun10_render_about_section' ) ) :
  /**
   * Start about section
   *
   * @return string about content
   * @since Moun10 1.0.0
   *
   */
   function moun10_render_about_section( $content_details = array() ) {
        $options        = moun10_get_theme_options();
        $thumbnail_img  = isset($options['about_thumbnail_img'])?$options['about_thumbnail_img']: '';
        $video_url      = isset($options['about_video_url'])?$options['about_video_url']:'';
        
        if ( empty( $content_details ) ) {
            return;
        } ?>
       <?php $content = $content_details[0];?>
       <div id="about-us" class="relative page-section">
            <div class="wrapper">
                <div class="section-header">
                    <h2 class="section-title">
                        <a href=<?php echo esc_url($content['url']); ?>><?php echo esc_html($content['title']); ?></a>
                    </h2>
                    
                    <span><?php echo wp_kses_post($content['content']); ?></span>
                </div><!-- .section-header -->
                <?php if(!empty($thumbnail_img) && !empty($video_url)) : ?>
                <div class="section-content" style="background-image:url(<?php echo esc_url($thumbnail_img); ?>)">
                    <div class="video-button">
                        <a href="<?php echo esc_url($video_url); ?>" class="popup-video">
                            <?php echo moun10_get_svg(array('icon'=>'play'));?>
                        </a>
                    </div><!-- .video-button -->
                </div><!-- .services-content -->
                <?php endif; ?>
            </div><!-- .wrapper -->
        </div><!-- #about-us -->
    <?php
    }    
endif; ?>