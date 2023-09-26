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
					->addText( 'title', [
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
					->addRepeater('tables')
						->addText('tab_title', [
							'label' => 'Table Title'
						])
						->addRepeater('table_content')
							->addRepeater('columns')
								->addText('text', [
									'label' => 'Column Content'
								])
							->endRepeater()
						->endRepeater()
					->endRepeater()

					->setLocation( 'block', '==', 'astro/' . $this->block_slug );

				acf_add_local_field_group( $fields->build() );

			}

		}

	}
	