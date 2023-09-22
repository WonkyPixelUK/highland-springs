<?php 

    namespace App\Theme;

	use \StoutLogic\AcfBuilder\FieldsBuilder;
    
	class Menus {
        
        function __construct() {

			add_action('init', [ $this, 'register_menus'] );

		}

		function register_menus() {

			register_nav_menus(

				array(
					'menu_main' => __('Main Menu'),
					'menu_secondary' => __('Secondary Menu'),
					'menu_footer' => __('Footer Menu'),
          'menu_footer_policy' => __('Footer Policy Menu'),
				)

			);

		}

	}