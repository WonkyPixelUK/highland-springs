<?php 

    namespace App\Blocks;

	use Timber;
	use \StoutLogic\AcfBuilder\FieldsBuilder;
    
	class Base {
        
        function __construct() {

			add_action( 'init', [ $this, 'register_block' ] );
			add_action( 'init', [ $this, 'register_fields' ] );

		}

		/**
		 * Register Block
		 * 
		 */
		function register_block () {
			register_block_type( 
				$this->block_path,
				[
					'render_callback' => fn( $block ) => $this->render_block( 'template.twig', $block )
				]
			);
		}

		function register_fields () {
			// This function needs to be made at block level
		}

		/**
		 * Render Block
		 * 
		 * @param string $path Path of template to render
		 * @param array $block Settings and attributes
		 * @param string $is_preview Description of what this block is
		 */
		function render_block ( $template, $block, $is_preview = false ) {
			$path = $block['path'] . '/' . $template;;
			$context = Timber::context();
			$context['post'] = new Timber\Post();
			$context['block'] = $block;
			$context['fields'] = get_fields();
			$context['is_preview'] = $is_preview;
			$context['is_editing'] = false;

			if ( is_admin() && is_string( get_current_screen()->id ) ) {
				$context['is_editing'] = true;
			}

			Timber::render( $path, $context );
		}

	}