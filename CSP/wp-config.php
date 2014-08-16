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
define('DB_NAME', 'csp_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'iui>Lo`$[-zikM#x:+P9x0X~;*CcR9Qi|UMX/>W+Y}<D{JBuCx o;$vP2O3M?^?M');
define('SECURE_AUTH_KEY',  'sX*! 5k]9XppKv*&*!ob(=a^K@1-$Vz*|ILd1-Byh(Ho]Etm7;h66MAyJ6I8|l}6');
define('LOGGED_IN_KEY',    'm44L: MFZU.DD*dTRG|VOar4oQgY{CeA<;)#fF(*.u{fo~w>-^3##/i.s*JM4Z`R');
define('NONCE_KEY',        'X=//mNAxYl#Ral7#Oh6!4++y$c3wuu M [M[p]9&%Q|i,M%%i&c7S-A42j5%[][o');
define('AUTH_SALT',        'V.g|i70&rA!P>=B#JIHtOXv-}s&@D`&Wm[U|}(mxP|GtR_l_=aM?}4 $C^s7vOt5');
define('SECURE_AUTH_SALT', '9Tt}6n9q8T=3=X(n2225[C[lc-X]l4-e#|Zz#m K?td:W>k#dPITCy3m:,m|/9r?');
define('LOGGED_IN_SALT',   'E,<(qsf-!)D2?E*JCus1K,+~w*J2x5YcM#z|lF!er)A&SJPit 31GH~8buuxxrLh');
define('NONCE_SALT',       'Ncdoz5;[Rfc`./sL;U>2(3!S8)j2>|])j%^agJ5V&N:s3l?ci ]H,-(mQca8UqxG');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'csp_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
