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

function instsani_pl_side_menu_helper( $parent_id, $pages_list, $level = 1 ) {
	$args  = array(
		'post_parent' => $parent_id,
		'order'       => 'menu_order',
		'fields'      => 'ids',
		'post_type'   => 'page',
	);
	$pages = new WP_Query( $args );
	if ( empty( $pages ) ) {
		return;
	}
	printf( '<ul class="level-%d">', $level );
	foreach ( $pages->posts as $post_id ) {
		printf(
			'<li%s>',
			in_array( $post_id, $pages_list ) ? ' class="current-menu-item"' : ''
		);
		printf(
			'<a href="%s" class="%s" style="%s">%s</a>',
			get_permalink( $post_id ),
			esc_attr( implode( ' ', get_post_class( '', $post_id ) ) ),
			empty( $url ) ? '' : sprintf( 'background-image:url(%s)', wp_make_link_relative( $url ) ),
			esc_html( get_the_title( $post_id ) )
		);
		if ( in_array( $post_id, $pages_list ) ) {
			$level++;
			instsani_pl_side_menu_helper( $post_id, $pages_list, $level );
		}
		echo '</li>';
	}
	echo '</ul>';
}

function instsani_pl_side_menu_helper_page_parents( $post_id, $pages_list ) {
	$pages_list[]   = $post_id;
	$post_parent_id = wp_get_post_parent_id( $post_id );
	if ( 0 < $post_parent_id ) {
		$pages_list = instsani_pl_side_menu_helper_page_parents( $post_parent_id, $pages_list );
	}
	return $pages_list;
}

function instsani_pl_side_menu() {
	$pages_list = array();
	if ( is_page() ) {
		global $post;
		$pages_list = instsani_pl_side_menu_helper_page_parents( $post->ID, $pages_list );
	}
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
		printf(
			'<li%s>',
			in_array( $one->object_id, $pages_list ) ? ' class="current-menu-item"' : ''
		);
		printf(
			'<a href="%s" class="%s" style="%s">%s</a>',
			get_permalink( $one->object_id ),
			esc_attr( implode( ' ', get_post_class( '', $one->object_id ) ) ),
			empty( $url ) ? '' : sprintf( 'background-image:url(%s)', wp_make_link_relative( $url ) ),
			esc_html( $one->title )
		);
		instsani_pl_side_menu_helper( $one->object_id, $pages_list );
		echo '</li>';
	}
}

