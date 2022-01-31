<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Handbook_for_technical_school_students
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="entry-wrapper">
		<?php if ( ! is_front_page() && ! is_home() ) { ?>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php
			if ( function_exists( 'bcn_display' ) ) {
				bcn_display();
			}
			?>
</div>
		<?php } ?>
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'page' );
		endwhile; // End of the loop.
		?>
		</div>
		<?php get_template_part( 'template-parts/adsbygoogle/side' ); ?>
	</main><!-- #main -->
<?php
get_sidebar();
get_footer();
