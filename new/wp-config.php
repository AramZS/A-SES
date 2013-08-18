<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bitnami_wordpress');

/** MySQL database username */
define('DB_USER', 'bn_wordpress');

/** MySQL database password */
define('DB_PASSWORD', '4a7ede006b');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
/* Substitution already done */
define('AUTH_KEY', 'eb760795bc724b8d0eefb6047b0202be36b95448afa4c01190e79ba4eaa74dda');
define('SECURE_AUTH_KEY', 'ff3f1054b36d7caffa1c5fcd3be17bcdaffb9d092796639c98586b0f15d056d9');
define('LOGGED_IN_KEY', 'f1ad8e8716d306e7fbd5ac894b6fd6c5a59d6cb363d5d3f073d17eb1f5529662');
define('NONCE_KEY', '4838fb90d4c56fa28df1c6fc47b11daae19edba93a242c2420fb66cb6ec8beff');
define('AUTH_SALT', '2fe38638de1da78c40dd3ac311be8a7a326565820b313086461b1c07a140602b');
define('SECURE_AUTH_SALT', '2679ce02bf2198ab870b60b91a99c81474854d7d5b08a951d6d812034d60293b');
define('LOGGED_IN_SALT', '5670ee8256f502a7995823441a6484465d13a9dc4922af663b47e823d9e6b738');
define('NONCE_SALT', '5bfd1d2ac84c870a7bc2bd9297d7e6f25b5df55dfaf7c8e718243c258d113a05');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
*/

define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/wordpress');
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/wordpress');


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('FS_METHOD', 'ftpext');
define('FTP_BASE', '/opt/bitnami/apps/wordpress/htdocs/');
define('FTP_USER', 'bitnami');
define('FTP_PASS', 'Iz43HbMA7WlKrHBMXRFkxyf8u5QdSUs4XM7uJrn1PLDu61XV0b');
define('FTP_HOST', '127.0.0.1');
define('FTP_SSL', false);

