<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Moun10
 * @since Moun10 1.0.0
 */

$options = moun10_get_theme_options();  


if ( ! function_exists( 'moun10_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Moun10 1.0.0
	 */
	function moun10_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;
add_action( 'moun10_doctype', 'moun10_doctype', 10 );


if ( ! function_exists( 'moun10_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Moun10 1.0.0
	 *
	 */
	function moun10_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
		<?php endif;
	}
endif;
add_action( 'moun10_before_wp_head', 'moun10_head', 10 );

if ( ! function_exists( 'moun10_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Moun10 1.0.0
	 *
	 */
	function moun10_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'moun10' ); ?></a>

		<?php
	}
endif;
add_action( 'moun10_page_start_action', 'moun10_page_start', 10 );

if ( ! function_exists( 'moun10_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since Moun10 1.0.0
	 *
	 */
	function moun10_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'moun10_page_end_action', 'moun10_page_end', 10 );

if ( ! function_exists( 'moun10_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since Moun10 1.0.0
	 *
	 */
	function moun10_site_branding() {
		$options  = moun10_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];
		?>
		 <div class="menu-overlay"></div>
		 <header id="masthead" class="site-header" role="banner">
            <div class="wrapper">
                <div class="site-branding">
					<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) )  ) { ?>
						<div class="site-logo">
							<?php the_custom_logo(); ?>
						</div>
					<?php } 
					if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
						<div id="site-identity">
							<?php
							if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
								if ( moun10_is_latest_posts() ) : ?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
								endif;
							} 
							if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
								<?php
								endif; 
							}?>
						</div>
					<?php endif; ?>
				</div><!-- .site-branding -->
				<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Primary Menu">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<?php
				echo moun10_get_svg( array( 'icon' => 'menu', 'class' => 'icon-menu' ) );
				echo moun10_get_svg( array( 'icon' => 'close', 'class' => 'icon-menu' ) );
				?>			
				</button>
				<?php  
				
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'container' => 'div',
						'menu_class' => 'menu nav-menu',
						'menu_id' => 'primary-menu',
						'echo' => true,
						'fallback_cb' => 'moun10_menu_fallback_cb',
					) );
				?>
				</nav><!-- #site-navigation -->
            </div><!-- .wrapper -->
		</header><!-- .header-->
		<?php
	}
endif;
add_action( 'moun10_header_action', 'moun10_site_branding', 10 );

if ( ! function_exists( 'moun10_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Moun10 1.0.0
	 *
	 */
	function moun10_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'moun10_content_start_action', 'moun10_content_start', 10 );

if ( ! function_exists( 'moun10_header_image' ) ) :
    /**
     * Header Image codes
     *
     * @since Moun10 1.0.0
     *
     */
    function moun10_header_image() {
        if ( moun10_is_frontpage() )
            return;
        $header_image = get_header_image();
        if ( is_singular() ) :
            $header_image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $header_image;
        endif;
        ?>

        <div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <header class="page-header">
                    <?php echo moun10_custom_header_banner_title(); ?>
                </header>
                <?php moun10_add_breadcrumb(); ?>
            </div>
        </div><!-- #page-site-header -->

        <?php
    }
endif;
add_action( 'moun10_header_image_action', 'moun10_header_image', 10 );

if ( ! function_exists( 'moun10_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since Moun10 1.0.0
	 */
	function moun10_add_breadcrumb() {
		$options = moun10_get_theme_options();

		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( moun10_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list" >';
				/**
				 * moun10_simple_breadcrumb hook
				 *
				 * @hooked moun10_simple_breadcrumb -  10
				 *
				 */
				do_action( 'moun10_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
	}
endif;

if ( ! function_exists( 'moun10_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Moun10 1.0.0
	 *
	 */
	function moun10_content_end() {
		?>
        </div><!-- #content -->
		<?php
	}
endif;
add_action( 'moun10_content_end_action', 'moun10_content_end', 10 );

if ( ! function_exists( 'moun10_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Moun10 1.0.0
	 *
	 */
	function moun10_footer_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
	}
endif;
add_action( 'moun10_footer', 'moun10_footer_start', 10 );

if ( ! function_exists( 'moun10_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Moun10 1.0.0
	 *
	 */
	function moun10_footer_site_info() {
		$options = moun10_get_theme_options();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text = $options['copyright_text'];
		?>
		<div class="site-info">
                <div class="wrapper">
                    <span>
                    <?php 
	                	echo moun10_santize_allow_tag( $copyright_text ); 
	                	if ( function_exists( 'the_privacy_policy_link' ) ) {
							the_privacy_policy_link( ' | ' );
						}
                	?>
                	</span>
                </div><!-- .wrapper -->    
            </div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'moun10_footer', 'moun10_footer_site_info', 40 );

if ( ! function_exists( 'moun10_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Moun10 1.0.0
	 *
	 */
	function moun10_footer_scroll_to_top() {
		$options  = moun10_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo moun10_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'moun10_footer', 'moun10_footer_scroll_to_top', 40 );

if ( ! function_exists( 'moun10_footer_end' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Moun10 1.0.0
	 *
	 */
	function moun10_footer_end() {
		?>
		</footer>
		<div class="popup-overlay"></div>
		<?php
	}
endif;
add_action( 'moun10_footer', 'moun10_footer_end', 100 );

if ( ! function_exists( 'moun10_loader' ) ) :
	/**
	 * Start div id #loader
	 *
	 * @since Moun10 1.0.0
	 *
	 */
	function moun10_loader() {
		$options = moun10_get_theme_options();
		if ( $options['loader_enable'] ) { ?>

			<div id="loader">
	            <div class="loader-container">
	            	<?php if ( 'default' == $options['loader_icon'] ) : ?>
		                <div id="preloader">
		                    <span></span>
		                    <span></span>
		                    <span></span>
		                    <span></span>
		                    <span></span>
		                </div>
		            <?php else :
		            	echo moun10_get_svg( array( 'icon' => esc_attr( $options['loader_icon'] ) ) );
		            endif; ?>
	            </div>
	        </div><!-- #loader -->
		<?php }
	}
endif;
add_action( 'moun10_before_header', 'moun10_loader', 10 );


if ( ! function_exists( 'moun10_infinite_loader_spinner' ) ) :
	/**
	 *
	 * @since Moun10 1.0.0
	 *
	 */
	function moun10_infinite_loader_spinner() { 
		global $post;
		$options = moun10_get_theme_options();
		if ( $options['pagination_type'] == 'infinite' ) :
			if ( count( $post ) > 0 ) {
				echo '<div class="blog-loader">' . moun10_get_svg( array( 'icon' => 'spinner-umbrella' ) ) . '</div>';
			}
		endif;
	}
endif;
add_action( 'moun10_infinite_loader_spinner_action', 'moun10_infinite_loader_spinner', 10 );
