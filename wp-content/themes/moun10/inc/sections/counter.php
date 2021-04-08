<?php
/**
 * Counter section
 *
 * This is the template for the content of counter section
 *
 * @package Theme Palace
 * @subpackage Moun10 Pro
 * @since Moun10 Pro 1.0.0
 */
if ( ! function_exists( 'moun10_add_counter_section' ) ) :
    /**
    * Add counter section
    *
    *@since Moun10 Pro 1.0.0
    */
    function moun10_add_counter_section() {
        $options = moun10_get_theme_options();
        // Check if counter is enabled on frontpage
        $counter_enable = apply_filters( 'moun10_section_status', true, 'counter_section_enable' );

        if ( true !== $counter_enable ) {
            return false;
        }

        // Render counter section now.
        moun10_render_counter_section();
    }
endif;

if ( ! function_exists( 'moun10_render_counter_section' ) ) :
  /**
   * Start counter section
   *
   * @return string counter content
   * @since Moun10 Pro 1.0.0
   *
   */
   function moun10_render_counter_section() {
        $options = moun10_get_theme_options();
        $image   = empty( $options['counter_image'] ) ? '' : $options['counter_image'] ;
        $counter_count = 4;
        $contents = array();
        for( $i= 1; $i <= absint( $counter_count ); $i++ ){
            $page_post['icon']      = empty( $options['counter_content_icon_'.$i] ) ? '' : $options['counter_content_icon_'.$i] ;
            $page_post['title']     = empty( $options['counter_title_'.$i] ) ? '' :$options['counter_title_'.$i];
            $page_post['number']    = empty( $options['counter_number_'.$i] ) ? '' :$options['counter_number_'.$i];
            array_push( $contents, $page_post );
        }
        if(empty($contents)) return;
        ?>
            <div id="counter-section" class="page-section" style="background-image: url('<?php echo esc_url( $image ) ; ?>');">
                <div class="overlay"></div>
                <div class="wrapper">
                    <div class="col-4 clear">
                    <?php foreach ( $contents as $content ): ?>

                        <article>
                            <h2 class="counter-value"><?php echo esc_html( $content['number'] ); ?>  </h2>
                            <h3 class="counter-title"><?php echo esc_html( $content['title'] ); ?></h3>
                        </article>
                        <?php endforeach ?>

                    </div><!-- .col-4 -->
                </div><!-- .wrapper -->
            </div>
        
    <?php  }
endif;
