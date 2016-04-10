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
define('DB_NAME', 'myblog');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '4@Jy:lh0O]7.XQMNnB]amK0MQ!&wtz:8,`rs+{JwgziCW+Q;2Dly~60q+VNt9%Y]');
define('SECURE_AUTH_KEY',  'Qsz&U%CjQCLOYmBq1Jh-+pg|`~Mr6m<9JVf/u,d2/h>;yL-<|(|OJ}f|^_w:|vOz');
define('LOGGED_IN_KEY',    '>=)[ef6i[b2oo)Dat/w1/b-j|-YLhDi=ez88U&mp[;aW*}[Bq{GzQM5|$! ?HPB+');
define('NONCE_KEY',        'ESIQ?Dl)Qt3`(%8} S^YD(H:S?M*< c4j<yA/,1T_P*4P-hJT`wQ[,6zm]Ima_Pb');
define('AUTH_SALT',        '{}JOa+wnpeMj,3gQCZxvCu9[XYP[goRHb5|/qV|U6h+K1Z^CIMx-p6d%R>|?k+RW');
define('SECURE_AUTH_SALT', 'zcFgv&=fH$c+N3y;wpFFl%h~Z+8oPq*6LyF%+^<12u+~v+ +qJ:&Q.OcT#r3!.fK');
define('LOGGED_IN_SALT',   'xqkT_7Czc(}|XM3D-V~l-hJ;Z?~{h-5e%f2:qd}CL|mMzEq}-T!7OKG~-8d.`USU');
define('NONCE_SALT',       '*U0wuyA5|N+Z$rd-IYa>{+OF25b|[j<Tz.&A-9KUjl4} -1:Srwk9sKwZXV8Pm}#');

/**#@-*/

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
