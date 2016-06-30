<?php
namespace CNP;
/**
 * wp_title
 *
 * Adds the Site Name and/or description to the WP Title
 *
 * @param $title
 * @param $sep
 *
 * @return string
 */
function wp_title( $title, $sep ) {
	global $paged, $page;

	// Ignore feed pages
	if ( is_feed() ) {
		return $title;
	}

	// Add site name
	$title .= get_bloginfo( 'name' );

	// add site description for the home/front page
	$desc = get_bloginfo( 'description', 'display' );
	if ( $desc && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $desc";
	}

	// Add a page number if necessary
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep Page " . max( $paged, $page );
	}

	return $title;
}

add_filter( 'wp_title', 'CNP\wp_title', 10, 2 );
