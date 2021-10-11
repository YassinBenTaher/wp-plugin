<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

$cleardb_url = parse_url(getenv("mysql://ba9d6a2f9a0892:e3d65ca0@eu-cdbr-west-01.cleardb.com/heroku_5bd696e6eaef814?reconnect=true"));
$cleardb_server = $cleardb_url["eu-cdbr-west-01.cleardb.com"];
$cleardb_username = $cleardb_url["ba9d6a2f9a0892:e3d65ca0"];
$cleardb_password = $cleardb_url["e3d65ca0"];
$cleardb_db = substr($cleardb_url["heroku_5bd696e6eaef814"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'heroku_5bd696e6eaef814');

/** MySQL database username */
define( 'DB_USER', 'ba9d6a2f9a0892:e3d65ca0');

/** MySQL database password */
define( 'DB_PASSWORD', 'e3d65ca0');

/** MySQL hostname */
define( 'DB_HOST', 'eu-cdbr-west-01.cleardb.com');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '0726e41672f54578ec9404e6453a40af1eca03f1');
define( 'SECURE_AUTH_KEY',  '54e7aef216d53ab11064440b71efd804013bf24a');
define( 'LOGGED_IN_KEY',    'fb78ebf066fd48de300df82abada5ccc34998ca7');
define( 'NONCE_KEY',        'a063035ce31a2d9b083b1868ffaab7fde106b728');
define( 'AUTH_SALT',        'c599e36c0524acdf37f6129e8bf34591b738069c');
define( 'SECURE_AUTH_SALT', '34f569a809a4ce0646b2eda5683decd5706b7bf7');
define( 'LOGGED_IN_SALT',   'e044e1b7ba572414fdc2ba94c224df0d8d58381a');
define( 'NONCE_SALT',       '1d148e2b8de91a804da453495c2f3af0a9a0dcaf');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

// If we're behind a proxy server and using HTTPS, we need to alert WordPress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
