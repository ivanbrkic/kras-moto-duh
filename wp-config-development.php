<?php
/**
 * Development settings.
 *
 * @version 1.0.3
 */

/**
 * Database configuration.
 */
if ( getenv( 'IS_HOMESTEAD' ) ) {
	define( 'DB_NAME', basename( __DIR__ ) ); // The name of the database for WordPress.
	define( 'DB_USER', 'homestead' ); // MySQL database username.
	define( 'DB_PASSWORD', 'secret' ); // MySQL database password.
	define( 'DB_HOST', 'localhost' ); // MySQL hostname.
} else {
	define( 'DB_NAME', 'local' ); // The name of the database for WordPress.
	define( 'DB_USER', 'root' ); // MySQL database username.
	define( 'DB_PASSWORD', 'root' ); // MySQL database password.
	define( 'DB_HOST', 'localhost' ); // MySQL hostname.
}

/**
 * Debug.
 */
// WordPress debug.
define( 'SCRIPT_DEBUG', true );
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true );
define( 'WP_DISABLE_FATAL_ERROR_HANDLER', true );

// Neuralab debug.
define( 'SHOW_DEBUG_CONSOLE', true );
define( 'SHOW_RESPONSIVE_CONSOLE', true );

/**
 * Memory limit.
 */
define( 'WP_MEMORY_LIMIT', '4096M' );
define( 'WP_MAX_MEMORY_LIMIT', '4096M' );
