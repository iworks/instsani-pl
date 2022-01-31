<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Handbook_for_technical_school_students
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
<?php
/* translators: %s: year */
printf( esc_html__( '&copy; %s Alfred Adamczewski', 'instsani-pl' ), date( 'Y' ) );
?>
			</a>
		</div><!-- .site-info -->
<?php
wp_nav_menu(
	array(
		'theme_location' => 'menu-footer',
		'menu_id'        => 'footer-menu',
	)
);
?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<?php get_template_part( 'template-parts/adsbygoogle/footer' ); ?>

</body>
</html>
