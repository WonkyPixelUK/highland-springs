<?php

  namespace App\Blocks;

	use App\Blocks\Base;
  use \StoutLogic\AcfBuilder\FieldsBuilder;
    
	class Signposting extends Base {

		public $block_slug = 'signposting';
		public $block_path = __DIR__ . '/block.json';

    function register_fields () {

			if ( function_exists( 'acf_add_local_field_group' ) ) {

				$fields = new FieldsBuilder( $this->block_slug );

        $fields
          ->addButtonGroup( 'type', [
						'ui' => '1',
						'wrapper' => [
							'width' => '50'
            ],
						'choices' => [
							'linked' => 'Linked to a page or a post',
							'manual' => 'Curated text and image'
						],
						'default' => 'linked'
					] )
          ->addButtonGroup( 'skew', [
            'ui' => '1',
            'wrapper' => [
              'width' => '50'
            ],
            'choices' => [
              'none' => 'None',
              'left' => 'Left',
              'right' => 'Right'
            ],
          ])

          // linked
          ->addRelationship('link', [
						'post_type' => ['page', 'post'],
            'min' => 1,
            'max' => 2,
					])
            ->conditional('type', '==', 'linked')
          
            // manual
          ->addRepeater('cards', [
            'layout' => 'block',
            'button_label' => 'Add item',
            'max' => 2
          ])
            ->conditional('type', '==', 'manual')
            ->addImage( 'image', ['required'=>true] )
            ->addText( 'title', ['required'=>true])
            ->addTextarea('intro')
            ->addLink( 'button' )
          ->endRepeater()

          ->addTrueFalse( 'remove_bottom_spacing', [
						'ui' => '1',
						'wrapper' => [
							'width' => '50'
						]
					] )
					->addTrueFalse( 'remove_top_spacing', [
						'ui' => '1',
						'wrapper' => [
							'width' => '50'
						]
					] )

					->setLocation( 'block', '==', 'astro/' . $this->block_slug );

				acf_add_local_field_group( $fields->build() );

			}

		}

	}
	