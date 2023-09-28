<?php

    namespace App\Blocks;

    /**
     * REQUIRE BASE
     */    
    require_once __DIR__ . '/block-categories.php';
    require_once __DIR__ . '/defaults.php';
    require_once __DIR__ . '/base.php';
    
    /**
     * REQUIRE BLOCKS
     */
    require_once __DIR__ . '/content/index.php';
    require_once __DIR__ . '/hero/index.php';
    require_once __DIR__ . '/marquee/index.php';
    require_once __DIR__ . '/signposting/index.php';
    require_once __DIR__ . '/triple-signposting/index.php';
    require_once __DIR__ . '/sliding-gallery/index.php';
    require_once __DIR__ . '/nutrition-table/index.php';
    require_once __DIR__ . '/product-signposting/index.php';
    require_once __DIR__ . '/cta-background-image/index.php';

    /**
     * INSTANTIATE BLOCKS
    */
    
    // Block Categories
    new BlockCategories();

    // Defaults
    new Defaults();
    
    // Content
    new Content();

    // Hero
    new Hero();

    // Marquee
    new Marquee();

    // Single signposting
    new Signposting();

    // Triple signposting
    new TripleSignposting();

    // Sliding Gallery
    new SlidingGallery();

    // Nutrition Table
    new NutritionTable();

    // Product Signposting
    new ProductSignposting();

    // CTA Background Image
    new CTABackgroundImage();

?>