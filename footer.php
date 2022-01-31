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
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
</body>
</html>
