<?php 

    namespace App\Theme;

	use \StoutLogic\AcfBuilder\FieldsBuilder;
    
	class Post_Types {
        
        function __construct() {

			add_action( 'init', [ $this, 'create_post_types' ] );
			add_action( 'init', [ $this, 'register_fields' ] );

		}

		function create_post_types() {

			// $services_name = 'Services';
			// $services_name_singular = 'Service';
			// $services_slug = 'services';

			// $labels = array(
			// 	'name' => _x($services_name, 'Post Type General Name', $GLOBALS['client_slug']),
			// 	'singular_name' => _x($services_name_singular, 'Post Type Singular Name', $GLOBALS['client_slug']),
			// 	'menu_name' => __($services_name, $GLOBALS['client_slug']),
			// 	'name_admin_bar' => __($services_name, $GLOBALS['client_slug']),
			// 	'archives' => __($services_name.' Archives', $GLOBALS['client_slug']),
			// 	'parent_item_colon' => __('Parent '.$services_name_singular.':', $GLOBALS['client_slug']),
			// 	'all_items' => __('All '.$services_name, $GLOBALS['client_slug']),
			// 	'add_new_item' => __('Add New '.$services_name_singular, $GLOBALS['client_slug']),
			// 	'add_new' => __('Add New '.$services_name_singular, $GLOBALS['client_slug']),
			// 	'new_item' => __('New '.$services_name_singular, $GLOBALS['client_slug']),
			// 	'edit_item' => __('Edit '.$services_name_singular, $GLOBALS['client_slug']),
			// 	'update_item' => __('Update '.$services_name_singular, $GLOBALS['client_slug']),
			// 	'view_item' => __('View '.$services_name_singular, $GLOBALS['client_slug']),
			// 	'search_items' => __('Search '.$services_name, $GLOBALS['client_slug']),
			// 	'not_found' => __('Not found', $GLOBALS['client_slug']),
			// 	'not_found_in_trash' => __('Not found in Trash', $GLOBALS['client_slug']),
			// 	'featured_image' => __($services_name_singular.' Featured Image', $GLOBALS['client_slug']),
			// 	'set_featured_image' => __('Set '.$services_name_singular.' Featured image', $GLOBALS['client_slug']),
			// 	'remove_featured_image' => __('Remove '.$services_name_singular.' Featured image', $GLOBALS['client_slug']),
			// 	'use_featured_image' => __('Use as '.$services_name_singular.' Featured image', $GLOBALS['client_slug']),
			// 	'insert_into_item' => __('Insert into '.$services_name_singular, $GLOBALS['client_slug']),
			// 	'uploaded_to_this_item' => __('Uploaded to '.$services_name_singular, $GLOBALS['client_slug']),
			// 	'items_list' => __($services_name.' list', $GLOBALS['client_slug']),
			// 	'items_list_navigation' => __($services_name.' list navigation', $GLOBALS['client_slug']),
			// 	'filter_items_list' => __('Filter '.$services_name.' list', $GLOBALS['client_slug']),
			// );

			// $args = array(
			// 	'label' => __($services_name, $GLOBALS['client_slug']),
			// 	'description' => __($services_name, $GLOBALS['client_slug']),
			// 	'labels' => $labels,
			// 	'show_in_rest' => true,
			// 	'supports' => array('title', 'editor', 'thumbnail'),
			// 	'taxonomies' => array(),
			// 	'public' => true,
			// 	'menu_position' => 20,
			// 	'menu_icon' => 'dashicons-star-filled',
			// 	'has_archive' => false,
			// 	'capability_type' => 'post',
			// );

			// register_post_type($services_slug, $args);

		}

		function register_fields () {

			// Can register fields here for specific post types

		}

	}
