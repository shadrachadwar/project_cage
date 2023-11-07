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
define( 'DB_NAME', 'pass' );

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
define( 'AUTH_KEY',         'qTE.DT-V@_x*E.O5DOMm9m$Xo**YR_2)-Kw@xm<TnhHEA(gCIW)-^|O; =,LON_g' );
define( 'SECURE_AUTH_KEY',  '7C, q/%Umt9y)n^Fj@^Tk8g<qYQ3b.uk{.(NJI pFouqud:43M8`#i*7V|@!8$j6' );
define( 'LOGGED_IN_KEY',    'y)KDiSFFbQB#6!g(qNs%]jU].vmSpxN^{DFD1Xc>^]%*{~lRTrB2!]Fq|*L_[u=-' );
define( 'NONCE_KEY',        '0_<npN%EF,alq{!C80<v.>ajs$Uk 2=FH.3H(G>m5F-=u(5$Z.1%.CUYbkYG(Jz1' );
define( 'AUTH_SALT',        '`sr|XmjvBBTuX:i@rp2KaeD&NlN3AD#GzP{wog=O%]}ed<xiZNwbjKqCo|rf?wsv' );
define( 'SECURE_AUTH_SALT', 'o=90&2NS)$Mp-!`c4H)veE+5R#W7ZvY{M@M,)OG<d?h5oCN$HB48%RD^L{26CvD`' );
define( 'LOGGED_IN_SALT',   '}Yxp[[d)cS+y:4Ygr<,`yH}z*%y>q*>%|D-Zb86sg[9ZfqVt:Dh3g;&?s5F1E*3;' );
define( 'NONCE_SALT',       '-K]5HV6K0{+w yi%tuERjj[>-Wj#tYu&ae_#_L;VLG}gt=*Oc{N6CwKT*|^N6;-6' );

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
