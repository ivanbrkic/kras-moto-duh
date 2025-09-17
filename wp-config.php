<?php
/**
 * Neuralab WP config.
 *
 * @version 1.0.3
 */

/**
 * Absolute path to the WordPress directory
 */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/**
 * Config loader.
 */
require_once ABSPATH . 'wp-config-load.php';

/**
 * Sets up WordPress vars and included files.
 */
require_once ABSPATH . 'wp-settings.php';
