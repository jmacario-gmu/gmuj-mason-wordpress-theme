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

// Set configuration settings
  // Title separator
  $config_title_separator = '|';
  // 'Read more' link text
  $config_read_more_link_text = '(READ MORE...)';

// Include files
require get_template_directory() . '/inc/classes/Autoload.php';

// Include functions
require get_template_directory() . '/inc/custom-functions.php';

// Setup auto load for load the class files without manually include file by file.
$Autoload = new \BootstrapBasic4\Autoload();
$Autoload->register();
$Autoload->addNamespace('BootstrapBasic4', get_template_directory() . '/inc/classes');
unset($Autoload);

// General theme setup
  require get_template_directory() . '/inc/custom-theme.php';

// Menus
  require get_template_directory() . '/inc/custom-menus.php';

// Sidebars/widget areas
  require get_template_directory() . '/inc/custom-sidebars.php';

// General display customizations
  require get_template_directory() . '/inc/custom-display.php';

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

