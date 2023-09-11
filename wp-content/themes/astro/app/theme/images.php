<?php 

    namespace App\Theme;

	use WP_Customize_Image_Control;
    
	class Images {
        
        function __construct() {

			add_action( 'after_setup_theme', [ $this, 'image_sizes' ] );
			add_action( 'customize_register', [ $this, 'customize_register' ] );

			$logo_defaults = array(
				'height'               => 140,
				'width'                => 240,
				'flex-height'          => true,
				'flex-width'           => true
			);
			add_theme_support( 'custom-logo', $logo_defaults );

			add_theme_support( "title-tag" );
			add_theme_support( 'post-thumbnails' );

		}

		function image_sizes() {

			// add_image_size( 'hero', 1980 );

		}

		function customize_register( $wp_customize ) {

			$wp_customize->add_setting('footer_logo');
		
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'footer_logo',
					array(
					   'label'      => __( 'Upload footer logo', $GLOBALS['client_slug'] ),
					   'section'    => 'title_tagline',
					   'settings'   => 'footer_logo' 
					)
				)
			);
		
		}

	}
