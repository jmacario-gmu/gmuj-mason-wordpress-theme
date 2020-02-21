<?php

// Enqueue scripts and styles related to jQuery datepicker
add_action( 'admin_enqueue_scripts', 'enqueue_date_picker' );

function enqueue_date_picker(){
    wp_enqueue_style( 'css_jquery_datepicker', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css');
    wp_enqueue_script( 'js_jquery_datepicker', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js');
}