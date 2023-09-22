<?php 

    namespace App\Theme;

	use \StoutLogic\AcfBuilder\FieldsBuilder;
    
	class Global_Options {
        
        function __construct() {

			add_action( 'acf/init', [ $this, 'register_page' ] );
			add_action( 'acf/init', [ $this, 'register_fields' ] );

		}

		function register_page() {

			if( function_exists('acf_add_options_page') ) {

				$parent = acf_add_options_page(array(
					'page_title'  => 'Astro Options',
					'menu_title'  => 'Astro Options',
					'menu_slug'   => 'astro-options',
					'capability'  => 'edit_posts',
					'redirect'    => false,
					'icon_url'    => 'dashicons-forms',
					'position'    => 24,
				));

			}

		}

		function register_fields () {

			if ( function_exists( 'acf_add_local_field_group' ) ) {

				$fields = new FieldsBuilder( 'theme_options' );
          $fields
          ->addTab('header')
            ->addText('menu_video', [
              'label' => 'Main menu video',
              'instructions' => 'Youtube video ID',
            ])
            ->addText('copyright')
            
					->addTab('socials')
						->addRepeater('socials')
							->addImage('icon', [
								'instructions' => 'SVG is preferable',
							])
							->addText('name')
							->addText('url')
						->endRepeater()

					->addTab('scripts')
						->addTextarea('scripts_head', [
							'label' => 'Script tags for &lt;head&gt;',
							'instructions' => 'When external scripts ask you to add code to the &lt;head&gt; tag, this is where you can paste it.',
						])
						->addTextarea('scripts_body', [
							'label' => 'Script tags for &lt;body&gt;',
							'instructions' => 'When external scripts ask you to add code just before the opening &lt;body&gt; tag, this is where you can paste it.',
						])
					
					->addTab('integrations')
						->addText('google_maps_api_key')
					
					->setLocation( 'options_page', '==', 'astro-options' );

				acf_add_local_field_group( $fields->build() );

			}

		}

	}
