<?php
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'shinotec_wp856' );

/** MySQL database username */
define( 'DB_USER', 'shinotec_wp856' );

/** MySQL database password */
define( 'DB_PASSWORD', '8vpE9--S0z' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'e6dw7grq1pq5sohh6wrwnhe279kpa987hp6bluhufxbv0iejfbq34oi1rwwqrher' );
define( 'SECURE_AUTH_KEY',  'qlizhr43vc3mivtak4viybwckoa8rv72dvq0y3bzhs0byfmsmwofawkpxhj9vvvd' );
define( 'LOGGED_IN_KEY',    'tlkjlbut9tqucoh8x3oof58hd35j018a5izzebmfhzscdfdudndbrd56ujthagra' );
define( 'NONCE_KEY',        'afycxeq6khtzxshfi7un9qeaudazblvgqcm6eqamo06ornmqvo9o0srgwpdiuxzj' );
define( 'AUTH_SALT',        'ejzavufl87ajiyvqjulcnzozb5zcgvgqepcxpceq5j1ssptemvlbzhso0af1y3os' );
define( 'SECURE_AUTH_SALT', '4drdzju1tfibq35jwmxau0wzu07wj5fp29q8yofdggrdnniagy8iswgtgjuakrjc' );
define( 'LOGGED_IN_SALT',   '773npllglukqxaddgojiqlqynvvn8fkxdptay1gzkdlghknqzcjcv2lmokjz2t78' );
define( 'NONCE_SALT',       'l98gcifuo2xjjhwh5kpqpmlzjcd0ysatqcnm4htvkydqdi4p2qkw8rurfoti6hgw' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp1b_';

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
