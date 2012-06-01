<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'rooms_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'F9Qv{pjCZ`w+xjH-RD|AMHU;UkIl>A@l~Rt!NV1YLzzK*iS^jnYyT{f/aj[6pq**');
define('SECURE_AUTH_KEY',  '#|ZW-DJ=&5<To,6w:SxS=|cM>cEmDM,!e;jP<5$bu|+?@HvuZ6&MML%wxF+wDJ;6');
define('LOGGED_IN_KEY',    'e`}ABrKm<XWZl<{S~(Fy`/XR~_Lk%.4=HLy?l]8-%IhApd]U23W`z|Lt>u2,uLxA');
define('NONCE_KEY',        '`8iM$qKbL`3!,cmEAZW|Mz![%e){Gy_:EIh@=COAE6PA_@LQ-(nukIJgm:3P32w-');
define('AUTH_SALT',        'WdQX1.>7{|V]BxcdjY;z+R4C*,WAgEWl!+9d6Yd=AxvlmP-Rg%c>vfC).8KIrb~6');
define('SECURE_AUTH_SALT', 'SKr>RT2^c-Ziimam{%>^-gik+Rl>/qz1U3~wx^OJ..#:K)1de]ZO)~PuVNK/(C[R');
define('LOGGED_IN_SALT',   '|.,,XmL*nN2fl>Ouqb|-&7QYN9uB1s]()5]c.nVF,7`n;~NJCE[]6b,pHoKRWw|t');
define('NONCE_SALT',       'Wt a/(<.vZHr9&i3MAVipC6kC+wK[hA1J7969GiK&<E&35Kf1e6x2I3|w(d}EV<U');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
