<?php

if ( ! class_exists( 'Timber' ) ) {
	echo 'Timber not activated. Make sure you activate the plugin in <a href="/wordpress/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
	return;
}

if ( ! class_exists( 'acf' ) ) {
	echo '<p>Advanced Custom Fields not activated. Make sure you activate the plugin in <a href="/wordpress/wp-admin/plugins.php#advanced-custom-fields-pro">/wp-admin/plugins.php</a>';
	return;
}

$context = Timber::context();
$context['post'] = new Timber\Post();

$block_content = do_blocks('
	<!-- wp:astro/content {"name":"astro/content","data":{"field_content_content":"<h1>Welcome to Astro Theme</h1>"},"mode":"auto"} /-->
');

echo $block_content;

$template = 'views/index.twig';

Timber::render( $template, $context );
