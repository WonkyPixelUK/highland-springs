<?php 

    namespace App\Blocks;

	use WP_Block_Type_Registry;
    
	class Defaults {
        
        function __construct() {

			add_filter( 'allowed_block_types_all', [ $this, 'default_blocks'] );

		}

		function default_blocks () {

			$registered_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();

			foreach ($registered_blocks as $key => $value) {
				if( strpos( $key, 'core/' ) === 0 ) {
					unset( $registered_blocks[$key] );
				}

				if( strpos( $key, 'gravityforms/' ) === 0 ) {
					unset( $registered_blocks[$key] );
				}

				if( strpos( $key, 'woocommerce/' ) === 0 ) {
					unset( $registered_blocks[$key] );
				}

				if( strpos( $key, 'safe-svg/' ) === 0 ) {
					unset( $registered_blocks[$key] );
				}
			}

			// Reregister what you need
			// $registered_blocks['core/paragraph'] = '';
			// $registered_blocks['core/heading'] = '';
			// $registered_blocks['core/list'] = '';
			// $registered_blocks['core/quote'] = '';
			// $registered_blocks['core/image'] = '';
			// $registered_blocks['core/video'] = '';
			// $registered_blocks['core/columns'] = '';
			// $registered_blocks['core/group'] = '';

			$registered_blocks = array_keys( $registered_blocks );

			return $registered_blocks;

		}

	}
