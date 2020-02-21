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


// Include files
require get_template_directory() . '/inc/classes/Autoload.php';

// Include functions
require get_template_directory() . '/inc/custom-functions.php';

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

// Date-picker
  require get_template_directory() . '/inc/custom-datepicker.php';

// Custom google fonts
  require get_template_directory() . '/inc/custom-fonts.php';

// WordPress login page customizations
  require get_template_directory() . '/inc/custom-login.php';

// Custom WordPress dashboard content
  require get_template_directory() . '/inc/custom-dashboard.php';

// Enqueue appropriate color stylesheet, depending on the color theme selected in the theme customizer 
  require get_template_directory() . '/inc/custom-color.php';

// Enqueue stylesheets related to custom post types and taxonomies
  require get_template_directory() . '/inc/custom-posts-taxonomies.php';

// Custom widgets
  require get_template_directory() . '/inc/custom-widgets.php';

// WordPress theme customizer
  require get_template_directory() . '/inc/custom-customizer.php';

// Calendar
  require get_template_directory() . '/inc/custom-calendar.php';

