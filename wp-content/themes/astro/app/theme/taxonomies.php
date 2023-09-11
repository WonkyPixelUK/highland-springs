<?php 

    namespace App\Theme;

	use \StoutLogic\AcfBuilder\FieldsBuilder;
    
	class Taxonomies {
        
        function __construct() {

			add_action( 'init', [ $this, 'create_taxonomies' ] );

		}

		function create_taxonomies() {

			// $category_name = 'Categories';
			// $category_name_singular = 'Category';
			// $category_slug = 'category_careers';

			// $labels = array(
			//     'name' => _x( $category_name, 'taxonomy general name' ),
			//     'singular_name' => _x( $category_name_singular, 'taxonomy singular name' ),
			//     'search_items' =>  __( 'Search '.$category_name ),
			//     'all_items' => __( 'All '.$category_name ),
			//     'parent_item' => __( 'Parent '.$category_name_singular ),
			//     'parent_item_colon' => __( 'Parent :'.$category_name_singular ),
			//     'edit_item' => __( 'Edit '.$category_name_singular ), 
			//     'update_item' => __( 'Update '.$category_name_singular ),
			//     'add_new_item' => __( 'Add New '.$category_name_singular ),
			//     'new_item_name' => __( 'New '.$category_name_singular.' Name' ),
			//     'menu_name' => __( $category_name ),
			// );    
			
			// register_taxonomy( $category_slug, array('career'), array(
			//     'hierarchical' => false,
			//     'labels' => $labels,
			//     'show_ui' => true,
			//     'show_in_rest' => true,
			//     'show_admin_column' => true,
			//     'query_var' => true
			// ));

		}

	}
