<?php

    namespace App\Theme;
    
    /**
     * REQUIRE BLOCKS
     */
    require_once 'admin_settings.php';
    require_once 'custom_fields.php';
    require_once 'dashboard.php';
    require_once 'global_options.php';
    require_once 'images.php';
    require_once 'menus.php';
    require_once 'post_types.php';
    require_once 'scripts.php';
    require_once 'taxonomies.php';
    require_once 'timber.php';

    /**
     * INSTANTIATE BLOCKS
    */
    
    // Admin Settings
    new Admin_Settings();

    // Custom Fields
    new Custom_Fields();

    // Dashboard
    new Dashboard();

    // Global
    new Global_Options();
    
    // Images
    new Images();

    // Menus
    new Menus();

    // Post Types
    new Post_Types();

    // Scripts
    new Scripts();

    // Taxonomies
    new Taxonomies();

    // Timber Functions
    new TimberSettings();
    
?>