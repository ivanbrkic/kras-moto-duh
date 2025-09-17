<?php
/**
 * Default settings shared between environments.
 *
 * @version 1.0.3
 */

/**
 * Site URL's.
 */
define( 'WP_HOME', $protocol . $hostname );
define( 'WP_SITEURL', $protocol . $hostname );

/**
 * Database configuration.
 */
define( 'DB_CHARSET', 'utf8mb4' ); // Database Charset to use in creating database tables.
define( 'DB_COLLATE', '' ); // The Database Collate type. Don't change this if in doubt.

/**
 * WordPress Database Table prefix.
 */
$table_prefix = 'wp_'; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

/**
 * Authentication Unique Keys and Salts.
 *
 * @link https://api.wordpress.org/secret-key/1.1/salt/
 */
define('AUTH_KEY',         'I+l/ekOsTkXKN0eV13T0wCPG8VoDQ70QDHrR0bqBSnQ9hSpOx02gYudE1TpR4HW+WTPf8zucfbILUjkhLrIv7A==');
define('SECURE_AUTH_KEY',  '5yfVJ0ej74bte77ZxnNzIZgXj1qnb5/ntl7u1jlK1lqVkRbDmQ/lxmrquOFkVxOLoWF2ZDLTkInmyVbkna7zMg==');
define('LOGGED_IN_KEY',    'UKH7m1tKhVFaAJgr61ttrvt8r6AW2F8q7Y03nX/vujK8M2TrbE7ieASww3CvY/HPDsTTlRMhWH7Tv3lIfNeugg==');
define('NONCE_KEY',        'Y5OdcY1rb79nfWhuhVYdbqDk99ZJHaBE7GB4N64UE4b4TNQwlsKGzixPkhWL2/EJI5di521Gtw02dBDz+vPTZA==');
define('AUTH_SALT',        'G9DFqC/SnVlXsUNSMeUegDICVrsvqdfYQDT6GwOhaezcLrruPnsoftu2WbbyGVNxGK8VOHCNRJvQE4JPsmb/0Q==');
define('SECURE_AUTH_SALT', 'yS7jcyr6h/2H05BDX5GE9rMWFMYG24TAEh9XAAQ8jsUWAX1Xh1qXlKPxraZZ7AfUjkxz6HkRxzOyFhDnmrtjvw==');
define('LOGGED_IN_SALT',   'nIUO5DKlM7JZGqCRGyJVXXIUWM+eBVT4JfcWVM1m+W7jRYtMB0sxt2957lnlujlmukvZit3T/0LFTMfDlGhqpg==');
define('NONCE_SALT',       '2SZOxreUmWSw7pqm71PMIXxEfEiCe6sZ0Qy3xX6yxKnzQxd6MdN+k3mdroY8a+RzQkkoG/QJNxvBu0A4XN4PCQ==');


/**
 * Disable all automatic updates.
 */
define( 'AUTOMATIC_UPDATER_DISABLED', true );

/**
 * Remove Kinsta branding from Kinsta Must-use Plugins.
 */
define( 'KINSTAMU_WHITELABEL', true );

/**
 * Plugin licensees.
 */
// Advanced Custom Fields PRO.
define( 'ACF_PRO_LICENSE', 'b3JkZXJfaWQ9NzU0NDN8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE2LTAyLTE5IDA5OjU5OjEx' );
// FacetWP.
define( 'FACETWP_LICENSE_KEY', '5994ab8fb44014aaa3b9f7198f333ae5' );
// SearchWP.
define( 'SEARCHWP_LICENSE_KEY', 'aa1b2b881b238589422ddff4dbc56993' );
// WP Migrate DB Pro.
define( 'WPMDB_LICENCE', 'c8683779-3fc8-429e-82a3-987ef913ad48' );
