<?php 

  namespace App\Blocks;

	use App\Blocks\Base;
  use \StoutLogic\AcfBuilder\FieldsBuilder;
    
	class NutritionTable extends Base {

		public $block_slug = 'nutrition-table';
		public $block_path = __DIR__ . '/block.json';

    function register_fields () {

			if ( function_exists( 'acf_add_local_field_group' ) ) {

				$fields = new FieldsBuilder( $this->block_slug );

				$fields
					->addText( 'text', [
						'label' => 'Title'
					] )
					->addTextArea( 'subtitle', [
						'label' => 'Subtitle'
					] )
					->addText( 'background_text', [
						'label' => 'Background Text'
					] )
					->addImage( 'image', [
						'label' => 'Image'
					] )
					->setLocation( 'block', '==', 'astro/' . $this->block_slug );

				acf_add_local_field_group( $fields->build() );

			}

		}

	}
	