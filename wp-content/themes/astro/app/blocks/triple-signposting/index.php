<?php 

  namespace App\Blocks;

	use App\Blocks\Base;
  use \StoutLogic\AcfBuilder\FieldsBuilder;
    
	class TripleSignposting extends Base {

		public $block_slug = 'triple-signposting';
		public $block_path = __DIR__ . '/block.json';

    function register_fields () {

			if ( function_exists( 'acf_add_local_field_group' ) ) {

				$fields = new FieldsBuilder( $this->block_slug );

        $fields
          // linked
          ->addText('title')
          ->addLink('button')
          ->addRelationship('posts', [
						'post_type' => ['page', 'post'],
            'min' => 3,
            'max' => 3,
					])
            ->conditional('type', '==', 'linked')
        
					->setLocation( 'block', '==', 'astro/' . $this->block_slug );

				acf_add_local_field_group( $fields->build() );

			}

		}

	}
	