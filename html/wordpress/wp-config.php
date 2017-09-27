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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpressuser');

/** MySQL database password */
define('DB_PASSWORD', 'T4r920Pz@9Om');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'bpE By+x+9O/YYjhsLulM.K(@mgyCb|De-+%~x-PWk-&I  WBP^/3-$V;.K,[PF?');
define('SECURE_AUTH_KEY',  '0p%jP~Ubi 0>z0K*.~/+xTn/8gC7YK6M|--t|D wO+F#WbDdCT&A_-fxeIot-;aQ');
define('LOGGED_IN_KEY',    '-E<@73+{IDU_)oNl>[}MGSQ Y|~-@x>q-rA6-i5-H=a/VQb0|O8SFbg)4i=M0 ue');
define('NONCE_KEY',        'c<ljQtAi${L+Q/ P)H2IB6=_] #|&0=!JCMX%W++3M}^V6~=`jmiI/,.s~Y&/hj&');
define('AUTH_SALT',        'v]1K{s3oE}-9q[y3Hp?^n)(aVhx3,qPRsD*|aAoL-Z|NJxh9IJ+X=[y^L7JmNWdC');
define('SECURE_AUTH_SALT', 'KnTj#y+Ui:GW:CET5BT6IZs;D>&35(#wnR9GPjB.:0/J!FQ-en`^HDpX2uCP_XRr');
define('LOGGED_IN_SALT',   'H_$BV@_.y4krE)vws7*&Sa;KOwrt4Qt=jG%I==6e:Mo;q(5Q0uWqs>eBk}[n#Epa');
define('NONCE_SALT',       'fHBT#QbN@/X.O@aNDLZM5rn[|+.|W?`x{zsw.!/&hR0eTiNRD1-[Bx#-.{lNczbK');

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

/** define('FTP_PUBKEY','/home/wp-sftp/wp_rsa.pub');
/** define('FTP_PRIKEY','/home/wp-sftp/wp_rsa'); */
/** define('FTP_USER','wp-sftp'); */
/** define('FTP_PASS',''); */
/** define('FTP_HOST','127.0.0.1:21'); */
