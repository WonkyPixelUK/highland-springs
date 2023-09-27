<?php 

  namespace App\Blocks;

	use App\Blocks\Base;
  use \StoutLogic\AcfBuilder\FieldsBuilder;
    
	class ProductSignposting extends Base {

		public $block_slug = 'product-signposting';
		public $block_path = __DIR__ . '/block.json';

    function register_fields () {

			if ( function_exists( 'acf_add_local_field_group' ) ) {

				$fields = new FieldsBuilder( $this->block_slug );

        $fields
          ->addButtonGroup( 'type', [
						'choices' => [
							'default' => 'wave taller on left',
              'wave-taller-on-right' => 'wave taller on right',
						],
						'default' => 'default'
					] )
					->addText( 'title', [
            'label' => 'Title',
            'required' => 1,
          ] )
          ->addText( 'intro', [
            'label' => 'Intro',
            'required' => 1,
          ] )
          ->addLink('button', [
            'label' => 'Button',
            'required' => 1,
          ] )
          ->addImage( 'image', [
            'label' => 'Image',
            'required' => 1,
          ] )


					->setLocation( 'block', '==', 'astro/' . $this->block_slug );

				acf_add_local_field_group( $fields->build() );

			}

		}

	}
	