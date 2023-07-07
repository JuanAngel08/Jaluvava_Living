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
define( 'DB_NAME', 'jaluvava_living' );

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
define( 'AUTH_KEY',         'SK^3b|U6]vreuVVbJ$ 9~~]rmuPYrWrwk#W_h0P/b,dgo9c;E)(E9:?;ljG^60m^' );
define( 'SECURE_AUTH_KEY',  '&Rb]ECp9?xryScK6.FtF3=00NQgPo*XPSu1k`[`x1pmYJT(i&$s`Cnf9(8*^QcXW' );
define( 'LOGGED_IN_KEY',    'f#{V^|Fb4b_)D/_*re#_R[UWJJ(L1kc-k%8?a&t.Q_RJ J@@>Opai`cwH0Olyd6C' );
define( 'NONCE_KEY',        'qh@GB^0>FtsVm/RY~N<oSOFD;LDUHdc)m]ubV7nNfu*s|TbHMIi(=}C7*L(izA8:' );
define( 'AUTH_SALT',        '^dt56w.|!:8L[]A~dce1$P.;gNolq98|^p$jZ4t5MDQ N+WO/-/pME;|>F>=|C0m' );
define( 'SECURE_AUTH_SALT', 'e{gB1)b0[_~daXM;;y;*~Te81<q3!gklv+RyK0I5x7r(LXQ0.`fPfD]]NqR]oSmp' );
define( 'LOGGED_IN_SALT',   'nA&b +kZ[i)xqx1x&L~l 0oEz@9-:I_H4];g4_]eJ5:M<3.KvG_ieqLccs7ke_W2' );
define( 'NONCE_SALT',       ' HKn2|UC~5Ic*gL+3LH^!k+CNsD.kU:9{F1:d?*mpSxFj*lFb/OATuox<&)p`14L' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
