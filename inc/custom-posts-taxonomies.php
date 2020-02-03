<?php

// Enqueue stylesheets related to custom post types and taxonomies
add_action( 'wp_enqueue_scripts', 'enqueue_custom_types_styles' );

function enqueue_custom_types_styles(){
  // People
  wp_enqueue_style('gmuj_custom_people',get_template_directory_uri().'/assets/css/custom-people.css');
  // Events
  wp_enqueue_style('gmuj_custom_events',get_template_directory_uri().'/assets/css/custom-events.css');
  // Articles
  wp_enqueue_style('gmuj_custom_articles',get_template_directory_uri().'/assets/css/custom-articles.css');
}