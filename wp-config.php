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
define( 'DB_NAME', 'db_phoenixherbals' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'ydU%!A3J%/Xfu6ne.+OuAvw:gFm{6!#,x.[@yFj5*!9NUvi%r:cznA S^H<LEvA ' );
define( 'SECURE_AUTH_KEY',  '77xaY/]}Y%<#Vc`{~3Ud67;.>GDmKpnhtF}acm[wR`64&6$<`$3$x-2~g3/+{fb3' );
define( 'LOGGED_IN_KEY',    ':b+v _MZ<~%e)jdZHoibp53yd$O^r3JaxBF{}t:!~Wncuk}M^Hniy=<@zl(V]9Eg' );
define( 'NONCE_KEY',        'naFzOz?VE-:,g#^ci/ydCrWNO<wVGt{oeMkVxI;%f6/y-;$~3F9fE02t3_<2/P0P' );
define( 'AUTH_SALT',        'n=O~ArM?!vlDu097B!fo%;LzGZ&4%bDcIRc!%Bp;s~N<4v0N#W+*L%?P)39ThxGq' );
define( 'SECURE_AUTH_SALT', 'yG7>WDG=;JDKHwt:I2X3`HhUg`2;!3 8yuVht8X3(dX7#;kd0POQuR10?H8f,?t7' );
define( 'LOGGED_IN_SALT',   'g9^yLi`)&.3Zuc_[ZjV(Fy8$@{~II0S1f!_Q_$Sw.?ru^mv*m`>}x`1NsRHYk=DP' );
define( 'NONCE_SALT',       'xSL|$Pm7DTakM OI66viHImioi$:ux_ina%P9/s%ypt$o5uwV{DU~hjg6C<i1A(u' );

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
