<?php 

  namespace App\Blocks;

	use App\Blocks\Base;
  use \StoutLogic\AcfBuilder\FieldsBuilder;
    
	class SingleSignposting extends Base {

		public $block_slug = 'single-signposting';
		public $block_path = __DIR__ . '/block.json';

    function register_fields () {

			if ( function_exists( 'acf_add_local_field_group' ) ) {

				$fields = new FieldsBuilder( $this->block_slug );

        $fields
          ->addButtonGroup( 'type', [
						'choices' => [
							'linked' => 'Linked to a page or a post',
							'manual' => 'Curated text and image'
						],
						'default' => 'linked'
					] )

          // linked
          ->addRelationship('link', [
						'post_type' => ['page', 'post'],
            'min' => 1,
            'max' => 1,
					])
            ->conditional('type', '==', 'linked')
          
            // manual
          ->addImage( 'image' )
            ->conditional('type', '==', 'manual')
					->addText( 'title')
            ->conditional('type', '==', 'manual')
          ->addTextarea( 'intro' )
            ->conditional('type', '==', 'manual')
          ->addLink( 'button' )
            ->conditional('type', '==', 'manual')

					->setLocation( 'block', '==', 'astro/' . $this->block_slug );

				acf_add_local_field_group( $fields->build() );

			}

		}

	}
	