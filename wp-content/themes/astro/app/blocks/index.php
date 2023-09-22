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
    require_once __DIR__ . '/single-signposting/index.php';
    require_once __DIR__ . '/triple-signposting/index.php';
    require_once __DIR__ . '/sliding-gallery/index.php';

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
    new SingleSignposting();

    // Triple signposting
    new TripleSignposting();

    // sliding gallery
    new SlidingGallery();
?>