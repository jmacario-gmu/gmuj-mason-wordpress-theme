<?php

// Enqueue scripts and styles
add_action('wp_enqueue_scripts', 'enqueueScriptsAndStyles');

function enqueueScriptsAndStyles(){

    // Get asset version parameter based on current timestamp
        $asset_version      = date('U');
        $wp_asset_version   = get_option('theme_asset_version');
        $difference = $asset_version - $wp_asset_version;
        if($difference > 900){
            update_option( 'theme_asset_version', $asset_version );
        } else {
            $asset_version = $wp_asset_version;
        }

    // Enqueue styles
        // Base theme stylesheet
        wp_enqueue_style('bootstrap-basic4-wp-main', get_stylesheet_uri(),array(),$asset_version);
        // Bootstrap stylesheet
        wp_enqueue_style('bootstrap4', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), $asset_version);
        // Custom theme stylesheet
        wp_enqueue_style('bootstrap-basic4-main', get_template_directory_uri() . '/assets/css/main.css', array(), $asset_version);

        // FontAwesome
        wp_enqueue_style('font-awesome5', get_template_directory_uri() . '/assets/css/fontawesome-all.min.css', array(), $asset_version);

    // Enqueue scripts
        // Bootstrap
            wp_enqueue_script('bootstrap4-bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), $asset_version, true);
        // Slick Slider
            wp_enqueue_script('slick-slider', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), $asset_version, true);
            wp_enqueue_style('slick-slider', get_template_directory_uri() . '/assets/css/slick.css', array(), $asset_version);
        // Custom theme JS
            wp_enqueue_script('gmu-theme-script', get_template_directory_uri() . '/assets/js/theme.js', array('jquery', 'slick-slider'), $asset_version, true);

}

// Setup theme features
add_action('after_setup_theme', 'themeSetup');

function themeSetup(){

    // add theme support title-tag
    add_theme_support('title-tag');

    // add theme support post and comment automatic feed links
    add_theme_support('automatic-feed-links');

    // allow the use of html5 markup
    // @link https://codex.wordpress.org/Theme_Markup
    add_theme_support('html5', array('caption', 'comment-form', 'comment-list', 'gallery', 'search-form'));

    // add post formats support
    add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

    // add post thumbnails support. **This is REQUIRED for post editor to show featured image field.**
    // To display featured image, please use post thumbnail functions.
    // See https://codex.wordpress.org/Post_Thumbnails for reference.
    add_theme_support('post-thumbnails');

    add_image_size( 'custom-small', 300, 300 );

}