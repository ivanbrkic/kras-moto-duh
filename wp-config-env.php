<?php
/**
 * Setup environments.
 * Development environment is the default value and doesn't require a $hostname value.
 *
 * @version 1.0.3
 */

switch ( $hostname ) {
	case 'motoljama.kras.hr':
		define( 'WP_ENV', 'production' );
		break;

	case 'staging.example.com':
		define( 'WP_ENV', 'staging' );
		break;

	default:
		define( 'WP_ENV', 'development' );
}
