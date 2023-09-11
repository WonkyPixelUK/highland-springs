<?php 

    namespace App\Theme;
    
	class Scripts {
        
        function __construct() {

			add_action( 'wp_enqueue_scripts', [ $this, 'head'] );
			add_action( 'wp_enqueue_scripts', [ $this, 'footer'] );

			if ( getenv('LANDO') ) {
				add_filter( 'script_loader_tag',   [ $this, 'make_script_module'], 10, 3 );
			} else {
				add_filter( 'script_loader_tag', [ $this, 'add_defer_attribute'], 10, 2 );
			}

			// add_theme_support('editor-styles');
        	// add_editor_style( get_stylesheet_directory_uri() . '/dist/editor.css' );

		}

		function head () {

			if ( getenv('LANDO') ) {
				wp_enqueue_script( 'vite-client', 'http://127.0.0.1:5173/@vite/client', [], null );
				wp_enqueue_style( 'vite-sass', 'http://127.0.0.1:5173/wp-content/themes/astro/src/sass/style.scss', [], null );
			} else {
				wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/dist/style.css', false );
			}

		}

		function footer () {

			wp_deregister_script( 'wp-embed' );

			if ( getenv('LANDO') ) {
				wp_enqueue_script( 'vite-js', 'http://127.0.0.1:5173/wp-content/themes/astro/src/js/index.js', [], null );
			} else {
				wp_enqueue_script( 'main-js', get_template_directory_uri() . '/dist/index.js', [], '1.0.0', true );
			}

		}

		function make_script_module($tag, string $handle, string $src) {
			if (in_array($handle, ['vite-client', 'vite-sass', 'vite-js'])) {
				return "<script type='module' src='" . esc_url($src) . "' defer></script>";
			}
		
			return $tag;
		}

		function add_defer_attribute( $tag, $handle ) {

			if ( 'main-js' !== $handle ) {
				return $tag;
			}
		
			return str_replace( ' src', ' defer src', $tag );
			
		}

	}
