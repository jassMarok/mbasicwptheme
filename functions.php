<?php
/*
 *  Author: Jaspal Marok
 *  URL: 
 *  Custom functions, support, custom post types and more.
 */

    //Load Stylesheet
    function mbasic_styles()
    {
        wp_register_style('styles', get_template_directory_uri() . '/dist/main.css', array(), '1.0', 'all');
        wp_enqueue_style('styles');
    }
    add_action('wp_enqueue_scripts', 'mbasic_styles');

    //Load JS Script
    function mbasic_scripts()
    {
        if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
            wp_register_script('bundleJavascript', get_template_directory_uri() . '/dist/main.js', array(), '1.0.0', true);
            wp_enqueue_script('bundleJavascript');
        }
    }
    add_action('wp_enqueue_scripts', 'mbasic_scripts');

    //Add Image Thumbnail Support
    if (function_exists('add_theme_support'))
    {
        // Add Thumbnail Theme Support
        add_theme_support('post-thumbnails');
        add_image_size('large', 700, '', true); // Large Thumbnail
        add_image_size('medium', 250, '', true); // Medium Thumbnail
        add_image_size('small', 120, '', true); // Small Thumbnail
        //add_image_size('custom-size', 700, 200, true); 
        /* Custom Thumbnail Size call using the_post_thumbnail('custom-size');*/
    }

    // Register Navigation
    function register_mbasic_menus()
    {
        register_nav_menus(array( // Using array to specify more menus if needed
            'header-menu' => "Header Menu", // Main Navigation
        ));
    }
    add_action('init', 'register_mbasic_menus');

    // Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
    function remove_thumbnail_dimensions( $html )
    {
        $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
        return $html;
    }
    add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); 

    //Add Slug to Body Class
    function add_slug_to_body_class($classes)
    {
        global $post;
        if (is_home()) {
            $key = array_search('blog', $classes);
            if ($key > -1) {
                unset($classes[$key]);
            }
        } elseif (is_page()) {
            $classes[] = sanitize_html_class($post->post_name);
        } elseif (is_singular()) {
            $classes[] = sanitize_html_class($post->post_name);
        }

        return $classes;
    }
    add_filter('body_class', 'add_slug_to_body_class');

    // Remove Filters
    remove_filter('the_excerpt', 'wpautop'); 