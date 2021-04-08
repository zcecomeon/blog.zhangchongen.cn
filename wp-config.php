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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'blog_zhangchong' );

/** MySQL database username */
define( 'DB_USER', 'blog_zhangchong' );

/** MySQL database password */
define( 'DB_PASSWORD', 'EHGkj4FWWc' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ' L^P+IToWs9=43a01[#CYtw(8/XY@LJ(:]OG+g#Tg,y{+Cd*/`B`OxAhNx;]wV^E' );
define( 'SECURE_AUTH_KEY',  ';R/p~xwsHS|zO*$EzT*F~8P9H^[RN=-?,32%0^nA]P3Ix{vCuXba7-aOD*n.=:-?' );
define( 'LOGGED_IN_KEY',    '/}?&#; }G}33tmofIO#`n([iG>~|r)wOiNN1#4nxM$5@^_z,-tH`q)C8fx!>mRJ!' );
define( 'NONCE_KEY',        'o7;GW.4|huPU(iQcg/Ned!pDQzit!+@Yt+$Vd/9*_oC:*[2EaB;BSOWA~,!_u:m/' );
define( 'AUTH_SALT',        'd}G_!1;Mva1lg=o3?@{E:IunPOvX)&Ei+;b6nk8,ZFwGim}BmD[yUN<-/= _xpZk' );
define( 'SECURE_AUTH_SALT', ':61@!mYlMyc)g^7E.VA|#+LKO{tM@eDDN9gE0ZT7X=re?4+G2@ZI,(g8.ENxW2Zg' );
define( 'LOGGED_IN_SALT',   '7j rD(^(nMCa<8@(Nh%Cg(H8ymMhlH~ZzzGtRH@V{4wwAQN/(Di1y,mdHbdqlK_0' );
define( 'NONCE_SALT',       '2^;y=+vBhV--89&YQMlNzaq7 ZH?{+JQpniI?j1#vlpBCJt@.{D!Jg,7(~X%Aq>d' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
