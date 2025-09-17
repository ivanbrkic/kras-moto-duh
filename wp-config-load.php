<?php
/**
 * Loads different config files based on the environment.
 *
 * @version 1.0.3
 */

/**
 * Playground debug plugin.
 */
if ( file_exists( __DIR__ . '/pgdc.php' ) ) {
	require __DIR__ . '/pgdc.php';
}

/**
 * Try environment variable 'WP_ENV'
 */
if ( getenv( 'WP_ENV' ) !== false ) {
	define( 'WP_ENV', preg_replace( '/[^a-z]/', '', getenv( 'WP_ENV' ) ) );
}

/** WP CLI setup */
if ( defined( 'WP_CLI' ) && WP_CLI ) {
	/**
	 * Fix missing $_SERVER super global
	 *
	 * @link https://make.wordpress.org/cli/handbook/common-issues/#php-notice-undefined-index-on-_server-superglobal
	 */
	if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && 'https' === $_SERVER['HTTP_X_FORWARDED_PROTO'] ) {
		$_SERVER['HTTPS'] = 'on';
	}

	if ( ! isset( $_SERVER['HTTP_HOST'] ) ) {
		$_SERVER['HTTP_HOST'] = 'localhost';
	}

	/**
	 * Get --env option value if passed with a command.
	 */
	global $argv;

	foreach ( $argv as $arg ) {
		if ( preg_match( '/--env=(.+)/', $arg, $m ) ) {
			define( 'WP_ENV', preg_replace( '/[^a-z]/', '', $m[1] ) );
			break;
		}
	}

	/**
	 * Get environment from .env file if it exist. Required in order to get WP CLI to work on Kinsta.
	 */
	if ( ! defined( 'WP_ENV' ) ) {
		if ( file_exists( __DIR__ . '/.env' ) ) {
			$environment = trim( file_get_contents( __DIR__ . '/.env' ) ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
			define( 'WP_ENV', preg_replace( '/[^a-z]/', '', $environment ) );
		}
	}
}

/**
 * Define hostname.
 */
// phpcs:disable WordPress.Security.ValidatedSanitizedInput.MissingUnslash, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
if ( isset( $_SERVER['HTTP_X_FORWARDED_HOST'] ) && ! empty( $_SERVER['HTTP_X_FORWARDED_HOST'] ) ) {
	$hostname = $_SERVER['HTTP_X_FORWARDED_HOST'];
} else {
	$hostname = $_SERVER['HTTP_HOST'];
}
// phpcs:enable WordPress.Security.ValidatedSanitizedInput.MissingUnslash, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized

// Sanitize $hostname.
$hostname = strtolower( filter_var( $hostname, FILTER_SANITIZE_STRING ) );

/**
 * Check for SSL.
 */
if ( ( ! empty( $_SERVER['HTTPS'] ) && 'off' !== $_SERVER['HTTPS'] ) ||
( ! empty( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && 'https' === $_SERVER['HTTP_X_FORWARDED_PROTO'] ) ) {
	$protocol = 'https://';
} else {
	$protocol = 'http://';
}

/**
 * Add list of environments.
 */
if ( ! defined( 'WP_ENV' ) ) {
	require __DIR__ . '/wp-config-env.php';
}

/**
 * Default config used in every environment.
 */
require __DIR__ . '/wp-config-default.php';

/**
 * Environment config based on WP_ENV value.
 */
require __DIR__ . '/wp-config-' . WP_ENV . '.php';

/**
 * Clean up.
 */
unset( $hostname, $protocol );
