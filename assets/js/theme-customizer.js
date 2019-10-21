/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

  // Update the site title in real time...
  wp.customize( 'blogname', function( value ) {
    value.bind( function( newval ) {
      $( 'header .site-title .site-title-heading a' ).html( newval );
    } );
  } );
  
  //Update the site description in real time...
  wp.customize( 'blogdescription', function( value ) {
    value.bind( function( newval ) {
      $( 'header .site-title .site-description small' ).html( newval );
    } );
  } );

  wp.customize( 'site_logo', function( value ) {
    value.bind( function( newval ) {
      if (newval) {
        $( 'header .site-title').addClass('image-logo');
        $( 'header .site-title .site-title-heading a' ).html( '<img src="' + newval + '">' );
      } else {
        $( 'header .site-title').removeClass('image-logo');
        $( 'header .site-title .site-title-heading a' ).html( 'Site Title Here' );
      }
    } );
  } );

} )( jQuery );