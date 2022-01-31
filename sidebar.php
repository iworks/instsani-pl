<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Handbook_for_technical_school_students
 */
?>
<aside id="secondary" class="widget-area">
	<ul class="side-menu"><?php instsani_pl_side_menu(); ?></ul>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
