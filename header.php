<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Handbook_for_technical_school_students
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>

<body <?php body_class(); ?>>
<script> (adsbygoogle = window.adsbygoogle || []).push({});</script>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'instsani-pl' ); ?></a>
	<header id="masthead" class="site-header">
		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'instsani-pl' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
			<div class="search"><?php get_search_form(); ?></div>
			<div class="psb">
				<a href="https://www.facebook.com/profile.php?id=61573038181996&locale=pl_PL" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="currentColor"><path d="M26.786,32H3.214A3.214,3.214,0,0,0,0,35.214V58.786A3.214,3.214,0,0,0,3.214,62h9.191V51.8H8.186V47h4.219V43.341c0-4.162,2.478-6.461,6.273-6.461A25.558,25.558,0,0,1,22.4,37.2v4.085H20.3a2.4,2.4,0,0,0-2.707,2.594V47H22.2l-.737,4.8H17.595V62h9.191A3.214,3.214,0,0,0,30,58.786V35.214A3.214,3.214,0,0,0,26.786,32Z" transform="translate(0 -32)"/></svg><span class="sr-only">Państwowe Szkoły Budownictwa i Geodezji im. Hieronima Łopacińskiego w Lublinie</span></a>
			</div>
		</div><!-- .site-branding -->
		<?php get_template_part( 'template-parts/adsbygoogle/before' ); ?>
	</header><!-- #masthead -->
