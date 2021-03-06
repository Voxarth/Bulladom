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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Bulladom_DB' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Praline39!' );

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
define( 'AUTH_KEY',         ')IsSD@.w8x/S|g%d1QfuN|fdMdd:/)g;gZ43[@uf mLU>+h%[!t;(%&`pAl An~1' );
define( 'SECURE_AUTH_KEY',  '_w^FGEm,CLbR_>:aC+WgK0levC7~:6X?CCDJQK#YhW}blJZ8=/3:ttVivj~4x4fu' );
define( 'LOGGED_IN_KEY',    'Pg;{VO[%}<6ikRB-aOW?d+pkITgVrSjZQml^MZ2gW<4[vzys@VUC-_cm|GXU[(Bw' );
define( 'NONCE_KEY',        'KI}{}Xa;}Y>WO0!))w#3aN%[=aLypS@f)a1S]CjBTPM#)}}M<Li%k#sL}^2N++CR' );
define( 'AUTH_SALT',        '9WA`2]X0LifAZo::x2 QB6q2)1IiBuIA*vUJc* *]jD5MM}r<$VI1&66 Fcl]mu$' );
define( 'SECURE_AUTH_SALT', 'sYrinA]XL{KmfSaxxJjlMDa?}PJc;q*SeG,+b^-{a$VDp8dk}o2R9:`g<tXi^*ie' );
define( 'LOGGED_IN_SALT',   'Qe/@,JS?f%|Q$QP~QS`oO/P65,N=1nV~.uG:0sE5xh:Ao(fr_6xyX2L_QN=)DD^p' );
define( 'NONCE_SALT',       'bFsP^D:/y?;2m}Z1fAR#Lm9e`h2KHOL$%|s[1[=q&Z4]Dpu4{[ Ykw2SFBgw:eTj' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'bulladom_tables_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
