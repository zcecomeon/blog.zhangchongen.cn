<?php
/**
 * The template for displaying 404 pages (not found).
 *
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */

get_header(); ?>
<div class="wrapper page-section">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/uploads/404.png' ); ?>" alt="<?php esc_attr_e( '404', 'moun10' ); ?>">
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'moun10' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
