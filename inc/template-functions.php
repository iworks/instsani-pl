<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Handbook_for_technical_school_students
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function instsani_pl_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'instsani_pl_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function instsani_pl_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'instsani_pl_pingback_header' );

function instsani_pl_side_menu() {
	$menu = get_nav_menu_locations();
	if ( ! isset( $menu['menu-sidebar'] ) ) {
		return;
	}
	$items = wp_get_nav_menu_items( $menu['menu-sidebar'] );
	$ids   = array();
	foreach ( $items as $one ) {
		$url = '';
		if ( has_post_thumbnail( $one->object_id ) ) {
			$url = get_the_post_thumbnail_url( $one->object_id, 'menu' );
		}
		$title = sprintf(
			'<a href="%s" class="%s" style="%s">%s</a>',
			get_permalink( $one->object_id ),
			esc_attr( implode( ' ', get_post_class( '', $one->object_id ) ) ),
			empty( $url ) ? '' : sprintf( 'background-image:url(%s)', wp_make_link_relative( $url ) ),
			esc_html( $one->title )
		);
		$args  = array(
			'child_of'    => $one->object_id,
			'sort_column' => 'menu_order',
			'depth'       => 1,
			'title_li'    => $title,
		);
		wp_list_pages( $args );
	}
}

