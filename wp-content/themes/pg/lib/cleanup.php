<?php
/**
 * Cleanup.
 */

/**
 * Disable Gutenberg assets.
 */
add_action(
	'wp_enqueue_scripts',
	function() {
		// Block CSS.
		wp_dequeue_style( 'wp-block-library' );
		// Inline CSS.
		wp_dequeue_style( 'global-styles' );
		// Classic theme CSS.
		wp_dequeue_style( 'classic-theme-styles' );
	}
);

/**
 * Disable gallery block inline CSS.
 */
remove_action( 'init', 'register_block_core_gallery' );

/**
 * Disable Gutenberg inline CSS in footer.
 */
add_action(
	'wp_footer',
	function() {
		wp_dequeue_style( 'core-block-supports' );
	}
);

/**
 * Fix WordPress 5.9 bug with adding SVG's in to the body.
 *
 * @link https://github.com/WordPress/gutenberg/issues/38299
 */
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

/**
 * Remove update nag on all environments except development.
 */
add_action(
	'admin_init',
	function() {
		if ( ! defined( 'WP_ENV' ) || 'development' === WP_ENV ) {
			return;
		}

		remove_action( 'admin_notices', 'update_nag', 3 );
		remove_action( 'network_admin_notices', 'update_nag', 3 );
	}
);

/**
 * Clean up output of stylesheet <link> tags.
 */
add_filter(
	'style_loader_tag',
	function( $html ) {
		// Disable PHP_CodeSniffer rule WordPress.WP.EnqueuedResources.NonEnqueuedStylesheet since it returns a false positive for our <link> tags.

		preg_match_all( '/<link rel=\'stylesheet\'\s?(id=\'[^\']+\')?\s+href=\'(.*)\' media=\'(.*)\' \/>/', $html, $matches ); // phpcs:ignore WordPress.WP.EnqueuedResources.NonEnqueuedStylesheet

		if ( empty( $matches[2] ) ) {
			return $html;
		}

		// Only display media if it is meaningful.
		$media = $matches[3][0] !== '' && $matches[3][0] !== 'all' ? ' media="' . $matches[3][0] . '"' : '';
		return '<link rel="stylesheet" href="' . $matches[2][0] . '"' . $media . '>' . "\n"; // phpcs:ignore WordPress.WP.EnqueuedResources.NonEnqueuedStylesheet
	}
);

/**
 * Disable the emoji's.
 */
add_action(
	'init',
	function() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'tiny_mce_plugins', 'pg_disable_emojis_tinymce' );
		add_filter( 'wp_resource_hints', 'pg_disable_emojis_remove_dns_prefetch', 10, 2 );
	}
);

/**
 * Disable emojies in TinyMCE.
 */
function pg_disable_emojis_tinymce( $plugins ) {
	return is_array( $plugins ) ? array_diff( $plugins, [ 'wpemoji' ] ) : [];
}

/**
 * Disable emoji DNS prefetch.
 */
function pg_disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' === $relation_type ) {
		$urls = array_diff( $urls, [ apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' ) ] );
	}

	return $urls;
}
