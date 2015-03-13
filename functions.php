<?php

/**
 * Adding required WP features and needed image sizes
 */
add_action('after_setup_theme', function(){
  // Let WordPress manage the document title.
  add_theme_support( 'title-tag' );

  // Enable support for Post Thumbnails on posts and pages.
  add_theme_support('post-thumbnails');

  // Menus
  add_theme_support('menus');

  register_nav_menus(array(
      'main' => __('Main menu', 'luveck')
  ));

  // Switch default core markup for search form, comment form, and comments
  // to output valid HTML5.
  add_theme_support('html5', array('comment-list', 'comment-form', 'search-form',
    'gallery', 'caption', 'widgets'));
});

/**
 * Enqueue scripts and styles.
 */
add_action('wp_enqueue_scripts', function(){
  // FontAwesome
  $uri = get_template_directory_uri() . '/assets/css/font-awesome.min.css';
  wp_enqueue_style('luveck-fontawesome', $uri, array(), '4.3.0');

  // Animate.css
  $uri = get_template_directory_uri() . '/assets/css/animate.min.css';
  wp_enqueue_style('luveck-animate', $uri, array(), '3.2.3');

  // Main CSS
  $file    = '/assets/css/main.min.css';
  $deps    = array('luveck-fontawesome', 'luveck-animate');
  $version = filemtime(get_template_directory() . $file);

  wp_enqueue_style('luveck-main', get_template_directory_uri() . $file, $deps, $version);

  // Modernizer
  $uri = '/assets/js/modernizr.js';
  wp_enqueue_script('luveck-modernizr', get_template_directory_uri() . $uri, array(), '2.8.3', FALSE);

  // jQuery tinycarousel
  $uri = '/assets/js/jquery.tinycarousel.min.js';
  wp_enqueue_script('luveck-tinycarousel', get_template_directory_uri() . $uri, array('jquery'), '2.1.7', TRUE);

  // jQuery scrollTo
  $uri = '/assets/js/jquery.scrollTo.min.js';
  wp_enqueue_script('luveck-scrollto', get_template_directory_uri() . $uri, array('jquery'), '1.4.14', TRUE);

  // jQuery scrollTo
  $uri = '/assets/js/jquery.nanoscroller.min.js';
  wp_enqueue_script('luveck-nanoscroller', get_template_directory_uri() . $uri, array('jquery'), '0.8.4', TRUE);

  // Main JS
  $file    = '/assets/js/main.js';
  $deps    = array('jquery', 'luveck-tinycarousel', 'luveck-scrollto', 'luveck-nanoscroller');
  $version = filemtime(get_template_directory() . $file);

  wp_enqueue_script('luveck-mainjs', get_template_directory_uri() . $file, $deps, $version, TRUE);
});
