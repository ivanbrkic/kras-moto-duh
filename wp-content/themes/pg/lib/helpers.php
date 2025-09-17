<?php
/**
 * Helpers.
 */

/**
 * Get title.
 *
 * @return string
 */
function pg_get_page_header() : string {
	if ( is_home() ) {
		$front_page_id = get_option( 'page_for_posts', true );
		if ( $front_page_id ) {
			return get_the_title( $front_page_id );
		} else {
			return __( 'News', 'playground' );
		}
	} elseif ( is_search() ) {
		/* translators: %s is the search term. */
		return sprintf( __( 'Search results for "%s"', 'playground' ), get_search_query() );
	} elseif ( is_archive() ) {
		return get_the_archive_title();
	} elseif ( is_404() ) {
		return __( '404 not found', 'playground' );
	} else {
		return get_the_title();
	}
}

/**
 * Get pagination.
 *
 * @param array $args Pagination arguments.
 * @return string
 */
function pg_get_pagination( array $args = [] ) : string {
	$default_args = [
		'base' => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
		'type' => 'list',
	];

	return get_the_posts_pagination( wp_parse_args( $args, $default_args ) );
}
