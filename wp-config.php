<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'cafepec' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'abcd1234' );

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
define( 'AUTH_KEY',         'Kn?67>L7(,uyDx:.?0B&,}pr=21)S3T9SG^U;e%IP/4Vg?W0lP!WOysp+Hqt9iAm' );
define( 'SECURE_AUTH_KEY',  '+0}ng6sZd.<vxe42_[ k7OCxb6m*|;P/Kx[JZ|c^LzX5vL<g8{Ns+DG}UxWPyke}' );
define( 'LOGGED_IN_KEY',    '?XRV]9lsAK;00&Mv]PO<)%CUcPh14(;HF<@b+,D}/!}ar1BW#,ep],|O(C9;|^IE' );
define( 'NONCE_KEY',        '6+vt{VJ8<nnzd_HL`* gY^P2x<a?x2JoL3%Ya#^|/lPu ZzzA2r~l;{Lh.c;,mzE' );
define( 'AUTH_SALT',        'VK$u[kgnuJFbIf,wRZ7I?j:XN7G WhcF+:_oT5%ON#)7gg(JQ6[GmEj{0m9Mzw[f' );
define( 'SECURE_AUTH_SALT', 'Knf0u1-Cj)1xEq0W6dR_H<0TLn<V.!8So^l{KYyiwXb&tx*Ef+mQ)e8w*7(uI;sk' );
define( 'LOGGED_IN_SALT',   '9WX)0>e86s2!3&Oa&T>FHqjYt;JAbiH_zf|CCv&K%tC)~wgtu]@%:Pnuq{7B+Umi' );
define( 'NONCE_SALT',       '7p`[}x-yR0Q4S0eKpW/}nC*^f>K3N!jC_EOsX<B^yDq^}`bYF%[*rYI +N 2w15{' );

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
