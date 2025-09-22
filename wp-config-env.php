<?php
/**
 * Setup environments.
 * Development environment is the default value and doesn't require a $hostname value.
 *
 * @version 1.0.3
 */

switch ( $hostname ) {
	case 'tkojepojeomoto.kras.hr':
	case 'www.tkojepojeomoto.kras.hr':
		define( 'WP_ENV', 'production' );
		break;

	default:
		define( 'WP_ENV', 'development' );
}
