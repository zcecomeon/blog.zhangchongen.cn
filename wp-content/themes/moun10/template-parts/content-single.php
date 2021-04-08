<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */
$options = moun10_get_theme_options();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear' ); ?>>
    <div class="entry-meta">
        <?php if(! $options['single_post_hide_author']):
            echo $options['single_post_hide_author'];
            echo moun10_author();
        endif; ?>
        <?php if (! $options['single_post_hide_date'] ) :
        	moun10_posted_on();
        endif; ?>
    </div>
		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'moun10' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'moun10' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

	<div class="entry-meta">
		<?php
			moun10_single_categories();
			moun10_entry_footer();
		?>
	</div>
</article><!-- #post-## -->
