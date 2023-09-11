<?php 

    namespace App\Theme;

	use \StoutLogic\AcfBuilder\FieldsBuilder;
    
	class Custom_Fields {
        
        function __construct() {

			add_filter( 'mce_buttons', [ $this, 'tinymce_buttons'] );
			add_filter( 'mce_buttons_2', [ $this, 'tinymce_2_buttons'] );

			add_filter( 'tiny_mce_before_init', [ $this, 'tiny_mce_remove_unused_formats'] );

		}

		function tinymce_buttons( $buttons ) {

			unset($buttons[5]);
			unset($buttons[6]);
			unset($buttons[7]);
			unset($buttons[8]);
			unset($buttons[10]);
			unset($buttons[11]);
			unset($buttons[12]);
			unset($buttons[13]);
		
			return $buttons;

		}

		function tinymce_2_buttons( $buttons ) {

			$buttons = [];

			array_unshift( $buttons, 'styleselect' );

			return $buttons;

		}

		function tiny_mce_remove_unused_formats( $init ) {

			$init['block_formats'] = 'Paragraph=p; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5;';
			$init['paste_as_text'] = true;

			$style_formats = array(
				array(
					'title' => 'Paragraph - Intro',
					'selector' => 'p',
					'classes' => 'intro',
				),
				array(
					'title' => 'List - Column',
					'selector' => 'ul',
					'classes' => 'column',
				)
			);
		 
			$init['style_formats'] = json_encode( $style_formats );

			return $init;

		}

	}
