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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// Database configuration for local development
define('DB_HOST', 'db:3306');
define('DB_NAME', 'nopula');
define('DB_USER', 'wordpress');
define('DB_PASSWORD', 'wordpress');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         'bDG<2hO_>0-H;~Gp<pd-ZB$Wkcgc6^AfAJWx^2$dcJd+ssb;:okPV9l}A93VI!+#');
define('SECURE_AUTH_KEY',  'xkbM,*aJxIZO@FC_F%_@<4LK%X~I5Fr@Juu}{cuV5^5|g@i:fi{5%Mj@=>F<x;||');
define('LOGGED_IN_KEY',    '0AW];|Bon>S$:gs1m:VE<@)4nSZ;t^jb*3wtT~Q~U3CSRH{X)A?:p9[qUEUNeG;:');
define('NONCE_KEY',        'c5GDMWvS6yi::@~BXDeQb9c)6cM#.Pp29H}ST3*s5vRz3{%K]4@Y;#a@Y@B:kSAd');
define('AUTH_SALT',        '##34>-eNyv$?hcROhJ_+Zt2Dfev;(8K%[Q(j[=q)OO5P3E#K-k}VR1Ko}.4UQjn^');
define('SECURE_AUTH_SALT', '*T.#t=:jO=i$3R{hI+e,oSra7S_5e{o@]BR1z,(!bM2d6YOc0lB.p6]9|uTwj$?$');
define('LOGGED_IN_SALT',   'pA*jPG2[~8u$>]!wEI@~Y_)RYU7{l]Uz<Gj0f>RMqS%%Uk-(n^UgwIYd)4;,18lf');
define('NONCE_SALT',       '-9G)q)M[=0||%_Lw3Ah(2Ra7DZRaT.}Xp-W;l~dCpCMOXi@Ij;m@C!Z2!XMO)$G*');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
if ( ! defined( 'WP_DEBUG') ) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
