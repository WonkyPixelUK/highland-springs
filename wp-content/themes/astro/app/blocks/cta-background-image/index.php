<?php 

	namespace App\Blocks;

	use App\Blocks\Base;
	use \StoutLogic\AcfBuilder\FieldsBuilder;
    
	class CTABackgroundImage extends Base {

		public $block_slug = 'cta-background-image';
		public $block_path = __DIR__ . '/block.json';

    	function register_fields () {

			if ( function_exists( 'acf_add_local_field_group' ) ) {

				$fields = new FieldsBuilder( $this->block_slug );

				$fields
					->addText( 'title', [
						'label' => 'Title'
					] )

					->setLocation( 'block', '==', 'astro/' . $this->block_slug );

				acf_add_local_field_group( $fields->build() );

			}

		}

	}
	