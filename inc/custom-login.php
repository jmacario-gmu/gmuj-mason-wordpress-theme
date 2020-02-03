<?php

// Login page modifications

/**
 * Load custom stylesheet on login page.
 */
add_action('login_enqueue_scripts', 'gmuj_login_stylesheet' );
function gmuj_login_stylesheet() {
  // load stylesheet
  wp_enqueue_style('gmuj-custom-login-stylesheet', get_template_directory_uri() . '/assets/css/gmuj-login.css');
}

/**
 * Provide an alternate URL for the login header.
 */
add_filter('login_headerurl', 'mhtp_login_header_url');
function mhtp_login_header_url() {
  return 'https://www2.gmu.edu';
}

/**
 * Provide a custom login message.
 */
add_filter( 'login_message', 'gmuj_custom_login_message' );
function gmuj_custom_login_message() {
  return 'George Mason University WordPress';
}

/**
 * Returns a less-detailed error message for login problems.
 */
add_filter('login_errors', 'gmuj_login_error_message' );
function gmuj_login_error_message() {
  return 'Login information incorrect.';
}

/**
 * Remove the login page shake effect.
 */
add_action('login_head','mhtp_remove_login_shake');
function mhtp_remove_login_shake(){
  remove_action('login_head','wp_shake_js',12);
}