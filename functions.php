<?php

// Required WordPress variable
if (!isset($content_width)) {
    $content_width = 1140;
}

// Configurations ----------------------------------------------------------------------------
// Left sidebar column size. Bootstrap have 12 columns this sidebar column size must not greater than 12.
if (!isset($bootstrapbasic4_sidebar_left_size)) {
    $bootstrapbasic4_sidebar_left_size = 3;
}
// Right sidebar column size.
if (!isset($bootstrapbasic4_sidebar_right_size)) {
    $bootstrapbasic4_sidebar_right_size = 3;
}
// Once you specified left and right column size, while widget was activated in all or some sidebar the main column size will be calculate automatically from these size and widgets activated.
// For example: you use only left sidebar (widgets activated) and left sidebar size is 4, the main column size will be 12 - 4 = 8.
//
// Title separator. Please note that this value maybe able overriden by other plugins.
if (!isset($bootstrapbasic4_title_separator)) {
    $bootstrapbasic4_title_separator = '|';
}


// Require, include files ---------------------------------------------------------------------
require get_template_directory() . '/inc/classes/Autoload.php';
require get_template_directory() . '/inc/functions/include-functions.php';

// Setup auto load for load the class files without manually include file by file.
$Autoload = new \BootstrapBasic4\Autoload();
$Autoload->register();
$Autoload->addNamespace('BootstrapBasic4', get_template_directory() . '/inc/classes');
unset($Autoload);

// Call to actions/filters of the theme to enable features, register sidebars, enqueue scripts and styles.
$BootstrapBasic4 = new \BootstrapBasic4\BootstrapBasic4();
$BootstrapBasic4->addActionsFilters();
unset($BootstrapBasic4);

// Call to actions/filters of theme hook to hook into WordPress and make changes to the theme.
$Bsb4Hooks = new \BootstrapBasic4\Hooks\Bsb4Hooks();
$Bsb4Hooks->addActionsFilters();
unset($Bsb4Hooks);

// Call to actions/filters of theme hook to hook into WordPress widgets.
$WidgetHooks = new \BootstrapBasic4\Hooks\WidgetHooks();
$WidgetHooks->addActionsFilters();
unset($WidgetHooks);

// Call to actions/filters of theme customizer.
require get_template_directory() . '/inc/classes/GMUCustomizer.php';
$customizer = new GMUCustomizer();
$customizer->addActionsFilters();
unset($customizer);




// Add custom google fonts
  // Add function to action hook
    add_action( 'wp_enqueue_scripts', 'gmuj_theme_custom_fonts' );
  // Function
    function gmuj_theme_custom_fonts() {
      //wp_enqueue_style( 'fonts', '//fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,400i,500,700' );
    }


// Custom dashboard widgets

// Add dashboard theme info widgets
  add_action('wp_dashboard_setup', 'gmuj_custom_dashboard_widgets');
    
  function gmuj_custom_dashboard_widgets() {
    /* Adds custom WordPress dashboard widgets */

    global $wp_meta_boxes;
    
    /* Add WordPress dashboard theme support widget */
    wp_add_dashboard_widget('gmuj_custom_dashboard_widget_theme_support', 'Mason WordPress Theme Support', 'gmuj_custom_dashboard_widget_help');

  }
  
  /* WordPress dashboard widget: theme support: content */
  function gmuj_custom_dashboard_widget_theme_support() {
    echo '<p>Welcome to the Mason WordPress Theme!</p>';
    echo '<p>Need help? Contact the Mason webmaster team at <a href="mailto:webmaster@gmu.edu">webmaster@gmu.edu</a>.</p>';
  }

// End custom dashboard widgets



// Fix admin dashboard footer
  add_filter('admin_footer_text', 'gmuj_replace_footer_admin');
  function gmuj_replace_footer_admin() {
    echo 'Designed by: George Mason University - Information Technology Services - Web Applications and Services</p>';
  }



// Enqueue appropriate color stylesheet, depending on the color theme selected in the theme customizer
  switch(get_theme_mod('gmuj_theme_color')) {
    case 1:
      wp_enqueue_style('gmuj_style_color_1',get_template_directory_uri().'/assets/css/color-1.css');
      break;
    case 2:
      wp_enqueue_style('gmuj_style_color_2',get_template_directory_uri().'/assets/css/color-2.css');
      break;
    case 3:
      wp_enqueue_style('gmuj_style_color_3',get_template_directory_uri().'/assets/css/color-3.css');
      break;
    case 4:
      wp_enqueue_style('gmuj_style_color_4',get_template_directory_uri().'/assets/css/color-4.css');
      break;
    default:
      // code block
  } 


add_action( 'admin_enqueue_scripts', 'enqueue_date_picker' );

function enqueue_date_picker(){
    wp_enqueue_style( 'bootstrap_css1', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css');
    wp_enqueue_script( 'bootstrap_js1', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js');
}


add_action('admin_footer',function(){ ?>

  <script type="text/javascript">
    (function($){
      var count = 0;
      $('input[name="acf[field_5b5ab0b4bdab4]"]').each(function(){
          $(this).attr('editor_id','editor'+count);
          count++;
      });
      $(document).on('change','input[name="acf[field_5b5ab0b4bdab4]"]',function(){
         if($(this).attr('editor_id')=='editor1'){
           $('#content').append($(this).val());
         }
         if($(this).attr('editor_id')=='editor2'){
           $('textarea[name="acf[field_5b599c42dc9ee]"]').append($(this).val());
         }
         if($(this).attr('editor_id')=='editor3'){
          $('textarea[name="acf[field_5b599c74dc9ef]"]').append($(this).val());
         }
      });
    }(jQuery));
  </script>

<?php });


if(!function_exists(p)){
    function p($d){
        echo "<pre>"; print_r($d); echo "</pre>";
    }
}

if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'gmu-icon',50,50, true );
}


if(!function_exists('_gmu_date')){
    function _gmu_date($time,$echo=true,$format='F d, Y g:i a'){
        $s = array('am','pm');
        $r = array('a.m.','p.m.');
        $date   = str_replace($s,$r,mysql2date($format, $time));
        if($echo) echo $date;
        return $date;
    }
}


function _cxc_excerpt_label($translation, $original){
    if ('Excerpt' == $original) {
        return __('Preview Text');
    } elseif (false !== strpos($original, 'Excerpts are optional hand-crafted summaries of your')) {
        return __('Preview Text are hand-crafted summaries of your content');
    }
    return $translation;
}
add_filter('gettext', '_cxc_excerpt_label', 10, 2);

function gmuj_admin_css() {
  echo '<style>
    /* Custom admin style rules */
  </style>';
}
add_action('admin_head', 'gmuj_admin_css');

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' 	=> 'Website Settings',
        'menu_title'	=> 'Website Settings',
        'menu_slug' 	=> 'website-settings'
    ));
}

if(!function_exists('_fo')) {
    function _fo($field,$echo=false){
        $f = get_field($field, 'option');
        if($echo) echo $f;
        return $f;
    }
}

if(!function_exists('_precede_zeros')) {
    function _precede_zeros($number){
        return str_pad($number,8,'0', STR_PAD_LEFT);
    }
}