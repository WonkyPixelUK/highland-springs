<?php 

    namespace App\Blocks;
    
	class BlockCategories {
        
        function __construct() {

			add_action( 'block_categories_all', [$this, 'register_block_category'], 10, 2 );

		}

		function register_block_category( $categories ) {
			return array_merge(
				[
					[
						'slug'  => $GLOBALS['client_slug'],
						'title' => __( $GLOBALS['client_name'] . ' Blocks', $GLOBALS['client_slug'] ),
					],
				],
				$categories
			);
		}

	}