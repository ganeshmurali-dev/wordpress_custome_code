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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'dFO3+<ERd]*@WVI#*wP`}Iu5?4y6$461l9B%*j#xam(RbJ(S&?m4f1$I7%&~=cDk' );
define( 'SECURE_AUTH_KEY',  'IJ#v4_=3,pMge d$[]Iyv@Y#bT`&07(= 5b^Gk=Fd>I9OV5N+9cpU8LH[F;S ikm' );
define( 'LOGGED_IN_KEY',    '+8GA&j(]7U<XtaO)V~;k,<@09OlzQD.m,r5SzL@134I5A/7Hc-@y%5N{>|8t{_Zb' );
define( 'NONCE_KEY',        'vi<ZXe?z:2J/~x?#_FnKkEVX,UyiDkL%<uctMeyrc?vS7tZ P]Yt-0)P=NtG5.jS' );
define( 'AUTH_SALT',        'wV?3aJQ{]!XpG2_ZS8OcDTGn+DbI-p6X:Z]<)SN)+2^H]DoCp:7{-b`6!oJLQtMV' );
define( 'SECURE_AUTH_SALT', '/zhhTU2e[YP.!Tol7n)Nq42a*ukG#4$Zfl{hptK2D;2KM+RPw4)w0,[yNP$o:d_=' );
define( 'LOGGED_IN_SALT',   'L&(ld-!:?g8oWqY=*!gfSZoU9I*IgbMlDh,ra,M] kDYE6dirFhY]_=?VQDUc[t ' );
define( 'NONCE_SALT',       'Ml0Vg?S7O-TkX!w$MOmQFC,i.y#bknI SZfJBZ^yO9]AnJh4sI{Hih`m>w^/QI(W' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
