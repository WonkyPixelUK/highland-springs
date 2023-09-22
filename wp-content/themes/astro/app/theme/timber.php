<?php 

    namespace App\Theme;

	use Timber;
	use TimberSite;
	use TimberMenu;

	use Twig_Extension_StringLoader;
	
	use WP_Term_Query;
    
	class TimberSettings extends TimberSite {
        
        function __construct() {

			add_filter('timber_context', [ $this, 'add_to_context'] );
    		add_filter('get_twig', [ $this, 'add_to_twig'] );

		}

		function add_to_context( $context ) {

			if ( has_nav_menu('menu_main') ) {
			  	$context['menu_main'] = new TimberMenu('menu_main');
			}

			if ( has_nav_menu('menu_secondary') ) {
				$context['menu_secondary'] = new TimberMenu('menu_secondary');
			}

			if ( has_nav_menu('menu_footer') ) {
				$context['menu_footer'] = new TimberMenu('menu_footer');
			}

      if ( has_nav_menu('menu_footer_policy') ){
        $context['menu_footer_policy'] = new TimberMenu('menu_footer_policy');
      }
		
			$context['options'] = get_fields('options');

			$custom_logo_url = wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' );
     		$context['logo'] = $custom_logo_url; 
		
			return $context;
		}

		function add_to_twig( $twig ) {
			$twig->addExtension(new Twig_Extension_StringLoader());

			$twig->addFunction( new Timber\Twig_Function( 'get_posts', function( $post_type ) {
				$args = array(
					'post_type' => $post_type,
					'numberposts' => -1
				);

				return get_posts($args); 
			} ));
		
			return $twig;
		  }

	}
