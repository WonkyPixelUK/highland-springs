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
					->addTextarea( 'title', [
						'label' => 'Title',
						'new_lines' => 'br',
						'rows' => '3'
					] )
					->addTextarea( 'subtitle', [
						'label' => 'Subtitle',
						'new_lines' => 'br',
						'rows' => '3'
					] )
					->addLink( 'link', [
						'label' => 'CTA Link'
					] )
					->addTrueFalse('text_color', [
						'label' => 'Alternate Text Colour?'
					] )
					->addImage('feature_image', [
						'label' => 'Feature Image'
					] )
					->addImage('background_image', [
						'label' => 'Background Image'
					] )

					->setLocation( 'block', '==', 'astro/' . $this->block_slug );

				acf_add_local_field_group( $fields->build() );

			}

		}

	}
	