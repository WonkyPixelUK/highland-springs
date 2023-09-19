<?php 

  namespace App\Blocks;

	use App\Blocks\Base;
  use \StoutLogic\AcfBuilder\FieldsBuilder;
    
	class Marquee extends Base {

		public $block_slug = 'marquee';
		public $block_path = __DIR__ . '/block.json';

    function register_fields () {

			if ( function_exists( 'acf_add_local_field_group' ) ) {

				$fields = new FieldsBuilder( $this->block_slug );

        $fields
					->addText( 'text', [
            'label' => 'Text',
            'required' => 1,
          ] )

					->setLocation( 'block', '==', 'astro/' . $this->block_slug );

				acf_add_local_field_group( $fields->build() );

			}

		}

	}
	