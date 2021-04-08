<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */

get_header(); 
?>  

<div id="inner-content-wrapper" class="wrapper page-section">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="blog-post-wrapper archive-blog-wrapper col-2 clear">
				<?php
				if ( have_posts() ) : ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div>
			<?php  
			/**
			* Hook - moun10_action_pagination.
			*
			* @hooked moun10_pagination 
			*/
			do_action( 'moun10_action_pagination' ); 

			/**
			* Hook - moun10_infinite_loader_spinner_action.
			*
			* @hooked moun10_infinite_loader_spinner 
			*/
			do_action( 'moun10_infinite_loader_spinner_action' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php  
	if ( moun10_is_sidebar_enable() ) {
		get_sidebar();
	}
	?>
</div><!-- .wrapper -->

<?php
get_footer();
