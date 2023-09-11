<?php 

    namespace App\Theme;
    
	class Admin_Settings {
        
        function __construct() {

			add_action( 'admin_menu', [ $this, 'remove_admin_menus']);
			add_filter( 'admin_footer_text', [ $this, 'footer_admin'] );
			add_filter( 'login_headerurl', [ $this, 'astro_loginlogo_url' ] );
			add_action( 'login_enqueue_scripts', [ $this, 'astro_login_logo'] );
			add_filter( 'get_user_option_admin_color', [ $this, 'astro_update_user_option_admin_color' ], 5 );
			add_post_type_support( 'page', 'excerpt' );

			// Gravity Forms
			add_filter( 'gform_plugin_settings_fields', [ $this, 'astro_gf_default_settings'], 10, 2 );

		}

		function remove_admin_menus () {

			if( !is_admin() && !current_user_can('administrator') ) {
			
				remove_menu_page( 'plugins.php' );
				remove_menu_page( 'edit-comments.php' );
				remove_menu_page( 'customize.php' );
				remove_menu_page( 'tools.php' );
				remove_menu_page( 'options-general.php' );

				remove_menu_page( 'edit.php?post_type=acf-field-group' );

				// GF
				remove_menu_page( 'admin.php?page=gf_settings' );
				remove_menu_page( 'admin.php?page=gf_export' );
				remove_menu_page( 'admin.php?page=gf_addons' );
				remove_menu_page( 'admin.php?page=gf_system_status' );
				remove_menu_page( 'admin.php?page=gf_help' );

			}

		}

		function footer_admin () {
			echo 'Made awesome by: <a href="https://astroagency.uk/" target="_blank">Astro Agency</a>. Need support, <a href="mailto:support@astroagency.uk" target="_blank">email us!</a>';
		}

		function astro_loginlogo_url( $url ) {
			return 'https://astroagency.uk/';
	   	}

		function astro_login_logo() { ?>
			<style type="text/css">
				body {
					background-image: url('https://astroagency.uk/wp-content/themes/astroagency/images/rocket.png') !important;
					background-repeat: no-repeat !important;
					background-position: right bottom !important;
				}

				#login {
					max-width: 480px;
					width: 100% !important;
				}

				#login #loginform {
					border: none;
					border-radius: 15px;
					box-shadow: 2px 2px 8px 0px rgba(0,0,0,0.2);
				}

        		#login h1 a, .login h1 a {
					background-image: url('https://astroagency.uk/wp-content/themes/astroagency/images/header-logo.png');
					height:100px;
					width:300px;
					background-size: contain;
					background-repeat: no-repeat;
					padding-bottom: 10px;
				}

				#login .button-primary {
					background-color: #2f284e;
					border-color: #2f284e;
				}
					#login .button-primary:hover {
						background-color: #211D37;
						border-color: #211D37;
					}

				#login #nav a:hover,
				#login #backtoblog a:hover {
					color: #2f284e;
				}
			</style>
		<?php }

		function astro_update_user_option_admin_color( $color_scheme ) {
			$color_scheme = 'midnight';

			return $color_scheme;
		}

		// Gravity Forms
		function astro_gf_default_settings ( $fields ) {
			unset( $fields['license_key_details'] );
			unset( $fields['no_conflict_mode'] );
			unset( $fields['html5'] );
		  
			return $fields;
		}

	}
