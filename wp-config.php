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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wp_user' );

/** Database password */
define( 'DB_PASSWORD', '.YWx2V[umqTwU!Ql' );

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
define( 'AUTH_KEY',         's{N6Q7U-#7+~=|$&FlXA<{8Y8o:;[LH8K` aU/kz}BA,k[=mgU?i3;,6NTZZ8-Ao' );
define( 'SECURE_AUTH_KEY',  'mYCdd<Z+!kN@3Mcfh3_0#%;_<i-k_!{BcPGS-PwoGOj!S/+SN^Fi<CK;-i}6=>D_' );
define( 'LOGGED_IN_KEY',    'Ebm/:FZt!heK=fyr%q:B0{w>9PsI!bBv>zU)w6ln-Znsz>0In6D+wQS1Q9}2vjl ' );
define( 'NONCE_KEY',        'ZKWvJV0Mi;K_?JR)sF D&lO9nU$mo7=Ej,)`2m)*|}5oeA$*>1mISO=w?0>JE>5F' );
define( 'AUTH_SALT',        'v#zNY}0](;hsIjMIA6>._vsWo!dpzk`~}OQFOGS!:,>D)?Wvm&bmieSXrw2GK,W8' );
define( 'SECURE_AUTH_SALT', '_~iM-M;+]8Ne|Oj Z:^ (<wn/BcbPS)<a!e}*.seFkf>`g_s$e^x$3sF1,GAMS0R' );
define( 'LOGGED_IN_SALT',   '#1/fJ:4[>hxTp.RRn? F3Tetz<~![Egy[7JHxLLet]Tr99xaI%.1TZ0vy$&}#;.<' );
define( 'NONCE_SALT',       'G;zLUTKBH_+Sxkuu@>.(-rMU|uC -xe<hD)wIUQ)EWU2@zs3;(2uaZU((nr$Nq&c' );

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

define('JWT_AUTH_SECRET_KEY', '],LutLw) G8OOi?i@2)2fVR,GI`cYmYOza;vT[fiW:66#5(w_7@F(UUIb{3sV[1P');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
