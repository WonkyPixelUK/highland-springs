<?php 

  namespace App\Blocks;

	use App\Blocks\Base;
  use \StoutLogic\AcfBuilder\FieldsBuilder;
    
	class Hero extends Base {

		public $block_slug = 'hero';
		public $block_path = __DIR__ . '/block.json';

        function register_fields () {

			if ( function_exists( 'acf_add_local_field_group' ) ) {

				$fields = new FieldsBuilder( $this->block_slug );

          $fields
          ->addButtonGroup('layout', [
            'label' => 'Layout',
            'choices' => [
              'default' => 'Default',
              'text-centered' => 'Centered text, small bottle at the bottom',
            ],
            'default_value' => 'default',
          ])


          ->addImage( 'background' )
					->addText( 'title')
          ->addText( 'subtitle' )
          ->addLink( 'link' )
            ->conditional('layout', '==', 'default')
          ->addImage('bottle')
            ->conditional('layout', '==', 'text-centered')

          // options for the bottom part of the hero - nothing, carousel or row of bottles
          ->addButtonGroup( 'type', [
						'choices' => [
							'with-carousel' => 'With Carousel',
							'without-carousel' => 'Without Carousel'
						],
						'default' => 'with-carousel'
					] )
          ->addText( 'carousel_title')
            ->conditional('type', '==', 'with-carousel')
          ->addText( 'carousel_subtitle' )
            ->conditional('type', '==', 'with-carousel')
          ->addLink( 'carousel_link' )
            ->conditional('type', '==', 'with-carousel')
          ->addGallery('carousel_images', [
            'label' => 'Carousel images',
            'instructions' => '',
            'required' => 1,
            'return_format' => 'array',
            'min' => '6',
            'max' => '6',
            'insert' => 'append',
            'library' => 'all',
          ])
          ->conditional('type', '==', 'with-carousel')
          						
					->setLocation( 'block', '==', 'astro/' . $this->block_slug );

				acf_add_local_field_group( $fields->build() );

			}

		}

	}
	