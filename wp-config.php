<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'solidweb' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'q-:R,h77^hma]JC3wc+^&@u%in9O+*d`qFOYfI_$;7>`eeGB/J9Y]: Y)5NW^c{B' );
define( 'SECURE_AUTH_KEY',  'TITS4$ygc)~zESI8GL2TbFkNKn_P#A|K<aK$e>.gI5N7XUfc0WflF:~g1Zp&hBC!' );
define( 'LOGGED_IN_KEY',    'U88GJGm1Hb+=Zq;.`d!qk;O4akT%,`0V=oUD[AKJ=8eo/1HWrw<a5Rf~uFFY(AD7' );
define( 'NONCE_KEY',        ';5FDx~y}JE.[<;I2e7o*k0gX|Y|`>4T`}$.zo({4?xe>!H3-Cob&yr53q* n.RX%' );
define( 'AUTH_SALT',        '|>+c6_L4=J`sD:s}NiZ5Pn>r/bKOwIq@<:#,I@%/}f4.93=n+og^[;I]W&l/W3k9' );
define( 'SECURE_AUTH_SALT', 'st%@Z*{J9l;m_7R=wu@rx)a{t?tH3m)M< c8+7?}$dW^{iU6Yr+I{gBcSnhkholk' );
define( 'LOGGED_IN_SALT',   '2C)1OU1wtN&@=6v0d.t.*|%q0~5^lKg+4[!?R.6}k;_s<hZJzQ|j1(5gk?Ee2q6o' );
define( 'NONCE_SALT',       'V|:A+Z7-QUf6!R-aav@h>tRJJRp-Gb.!F:N2eh]ap h.^`u870U.b<U$Ym}QFK| ' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
