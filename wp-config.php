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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', '3mffar' );

/** Database username */
define( 'DB_USER', 'amatin' );

/** Database password */
define( 'DB_PASSWORD', 'go3mffar' );

/** Database hostname */
define( 'DB_HOST', 'faure.cs.colostate.edu' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
/**
define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );
*/

define('AUTH_KEY',         '/|;dZ7]|TO<+:l?3^3DAzRgd$aoSBXe(|-t+K6sb.0[Dv}_`Xcga8l~|u?7x+ Lx');
define('SECURE_AUTH_KEY',  'tgWC# eQ&aj{+&4.bpidKu5s@Tq5hxJE}j>,|8O)|yq7<-}Wli6u2?|A;-lu01~j');
define('LOGGED_IN_KEY',    '/VL(!![VcH|;:txEGBZSUpA4Z&AI()Yuiu_Pq@W*(GpY-H[<]gZnseo4{3S!|)QI');
define('NONCE_KEY',        'rewHQ 6VCtBJgED668:m3K18o[`$(M^Qsc5l%=|y?d|+{U l1nL$45ij`@Lin[-g');
define('AUTH_SALT',        '6GtK~u!6!|E|y)>0I}7! 0H[Lti>nL)B2g:pEP_Q(f[rUwti#3K?g|^$SM{+L&n-');
define('SECURE_AUTH_SALT', 'g&iL/O )5mtC1^CX+1/`wEurC`tr9_(hWS&Mkq6+Z+cAm-`i}}77K2A6+E&xO+d`');
define('LOGGED_IN_SALT',   'W/OBc6^*.hm@$(rK-Dm d.pV>|Fb I|qX/99<+vbrt[R+`[7?n}z]5;V[z1OCG-3');
define('NONCE_SALT',       'G79~vZYUe;gC k7s/ULD{ 6eQZR0=Qr4$B->)]t->8*fqi]RNk>iRH-}A)v+&q>`');


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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', True );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define('DISALLOW_FILE_EDIT', false);
define('DISALLOW_FILE_MODS', false);
define('FS_METHOD', 'direct');
//define('FORCE_SSL_ADMIN', false);
//define('FORCE_SSL_LOGIN',false);
//define('WP_MEMORY_LIMIT','1024M');
