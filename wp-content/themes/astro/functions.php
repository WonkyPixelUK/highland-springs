<?php

	if (class_exists('Timber')) {

		if ( getenv('LANDO') ) {
			require_once ABSPATH . '../vendor/autoload.php';
		} else {
			require_once ABSPATH . 'vendor/autoload.php';
		}

		// Globals
		require_once 'app/globals.php';
		
		// Theme
		require_once 'app/theme/index.php';

		// Blocks
		require_once 'app/blocks/index.php';

	}
	