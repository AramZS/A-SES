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
define('DB_NAME', 'db133999_ses_gs_wpdb');

/** MySQL database username */
define('DB_USER', 'db133999');

/** MySQL database password */
define('DB_PASSWORD', '4HEtr4keZuXe');

/** MySQL hostname */
define('DB_HOST', 'internal-db.s133999.gridserver.com');

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
define('AUTH_KEY',         'RYcl+H3Iay`^6E|@^(kZEm3LkElgiTc$Y(NuovjDdR/4$xo|Ir/!*C6Cu:VX7uT$');
define('SECURE_AUTH_KEY',  '7f?~^@P;m:z9vrjO9X3n$KLutbasg_&W@SHSz:8:NWDrM1@)twX%gc/qUXiG(YS?');
define('LOGGED_IN_KEY',    '7brmH$_T1*%X;Sn~!%v0SPrWHs(Uif%OHx;Tl!9ag0Q|e1xyNBPy%(KQgUhO%#GH');
define('NONCE_KEY',        'sHVLQ5OM";d^"INY)s55TNE4h5+h((/3B#~DB8FGDHubr2B;E(XK$`KByFPA"r3C');
define('AUTH_SALT',        'W1M5"HEQe4rfPSH(olNpq1_g7C|dCz|D+BK27;mPQ0OJH?3zcq$%ueaiBevyN*)T');
define('SECURE_AUTH_SALT', 't0sR`E25l5sXKh0MPu$uLXYQV:aRC#9@M34/tX/M$Y"@(#A*`ri5Pg1e4LW5G(so');
define('LOGGED_IN_SALT',   'hmT7ik0Q|AAGrVtZqGJS8JIW5p!YkkJNT50I&8p~tB`%i3a(te5OjUIp_RV9j`PN');
define('NONCE_SALT',       '89e5iJ2@l4Z(fw"crj^Aqa"N|;C@_eIX(3Us#/MJJ12$k#a((PAHkL)lqQK8KhBb');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
//define('WP_POST_REVISIONS',  10);

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
define('WP_DEBUG', FALSE);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

// fix for open_basedir restriction in effect
define('WP_TEMP_DIR', ini_get('upload_tmp_dir'));