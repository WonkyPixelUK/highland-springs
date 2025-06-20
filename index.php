<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
if ( getenv('LANDO') ) {
	require __DIR__ . '/wp/wp-blog-header.php';
} else {
	require __DIR__ . '/wp-blog-header.php';
}
