<?php

/** Local config  */
if (file_exists(dirname(__FILE__) . '/wp-config-local.php') && getenv('LANDO')) {
	require_once(dirname(__FILE__) . '/wp-config-local.php');

/** Production config */
} elseif (file_exists(dirname(__FILE__) . '/wp-config-production.php') && !getenv('LANDO')){
	require_once(dirname(__FILE__) . '/wp-config-production.php');
}

define('AUTH_KEY',         'I7AhaR+q,fTJaI@=K9uWo,*5 !nD+c{-:+-fTC4Y7l]oj4#Z|X_QyFZnM;hxJW29');
define('SECURE_AUTH_KEY',  '5{p(/+~kNaiAW7B$6|Hf)9n}D<}[o**_P+(ac]i3{/p,HsDnuW@qM,JfwW|h#pD)');
define('LOGGED_IN_KEY',    '5q9EiB7xe#B)xoqQb(@=*.q9SFMO+Ir$7eHaVXL_A/+2&xWF1h1w@.N/@q,i|!xb');
define('NONCE_KEY',        'hOTO3 y`S6ZI@J6.Vx_(v8r%.B7ePMW?.e4q|D;fl;g S//8QSR##8| uxeQu|9c');
define('AUTH_SALT',        'Cd,+zAe5cPMOT&GF674OpcO3V:4O6mC[h{ :.jdY#W00h^%G?LF&i2xV;z/oc17s');
define('SECURE_AUTH_SALT', '1_2yiW$|I^eP$hfebkhn7`a=25WZL_O?wc:uY6qv5qD!K/TyrcmB_QJ<J!=gAsVK');
define('LOGGED_IN_SALT',   '!>A~jMV(Ug#+duq;!-_sG^*/T-74EzgAti5e11uS$P@!0GA{7k~Z``cPLSH ;,ix');
define('NONCE_SALT',       'z!8=](K&Fp$+APZtw6~lWA.-Dz=u.iSCh1`tB=[*e,oL~C(Jq:;#j|,tUmQn,(D-');

/** Standard wp-config.php stuff from here on down. **/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'astro_wp_';

define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
if (isset($_SERVER['HTTP_HOST'])) {
	define( 'WP_CONTENT_URL', '//' . $_SERVER['HTTP_HOST'] . '/wp-content' );
}

/* That's all, stop editing! Happy Pressing. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/wp/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
