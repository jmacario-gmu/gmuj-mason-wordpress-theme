<?php
/**
 * The Bootstrap Basic 4 main functional file.
 * 
 * @package bootstrap-basic4
 */


namespace BootstrapBasic4;

if (!class_exists('\\BootstrapBasic4\\BootstrapBasic4')) {
    /**
     * Bootstrap Basic 4 main functional in class style.
     * 
     * This class will be handle all the main hooks that work with theme features such as add theme support features, register widgets area or sidebar, enqueue scripts and styles.<br>
     * If you want to hook into WordPress and make changes or modification, please use \BootstrapBasic4\Hooks\Bsb4Hooks() class.<br>
     * To use, just code as follows:
     * 
     * $BootstrapBasic4 = new \BootstrapBasic4\BootstrapBasic4();
     * $BootstrapBasic4->addActionsFilters();
     * 
     * That's it.
     */
    class BootstrapBasic4
    {


        /**
         * Add actions and filters to make main theme functional works.
         */
        public function addActionsFilters()
        {
            // Change main content width up to columns available.
            add_action('template_redirect', array(&$this, 'detectContentWidth'));
            // Add theme feature.
            add_action('after_setup_theme', array(&$this, 'themeSetup'));
            // Register sidebars.
            add_action('widgets_init', array(&$this, 'registerSidebars'));
            // Enqueue scripts and styles.
            add_action('wp_enqueue_scripts', array(&$this, 'enqueueScriptsAndStyles'));
        }// addActionsFilters


        /**
         * Detect main content width upto columns available.
         */
        public function detectContentWidth()
        {
            global $content_width, $bootstrapbasic4_sidebar_left_size, $bootstrapbasic4_sidebar_right_size;

            if (is_active_sidebar('sidebar-left') && is_active_sidebar('sidebar-right')) {
                $content_width = 540;
            } elseif (is_active_sidebar('sidebar-left') || is_active_sidebar('sidebar-right')) {
                $content_width = 825;
            }

            $content_width = apply_filters('bootstrap_basic4_content_width', $content_width, $bootstrapbasic4_sidebar_left_size, $bootstrapbasic4_sidebar_right_size);
        }// detectContentWidth


        /**
         * Enqueue scripts and styles.
         * 
         * @access private Do not access this method directly. This is for hook callback not for direct call.
         */
        public function enqueueScriptsAndStyles(){
            $asset_version      = date('U');
            $wp_asset_version   = get_option('theme_asset_version');
            $difference = $asset_version - $wp_asset_version;
            if($difference > 900){
                update_option( 'theme_asset_version', $asset_version );
            } else {
                $asset_version = $wp_asset_version;
            }

            /*if(!$_COOKIE['asset_version']){
                $asset_version  = date('U');
                setcookie("asset_version", $asset_version, time()+900); // 1hr = 3600 secs
            } else {
                $asset_version  = $_COOKIE['asset_version'];
            }*/
            wp_enqueue_style('bootstrap-basic4-wp-main', get_stylesheet_uri(),array(),$asset_version);

            wp_enqueue_style('bootstrap4', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), $asset_version);
            wp_enqueue_style('font-awesome5', get_template_directory_uri() . '/assets/css/fontawesome-all.min.css', array(), $asset_version);
            wp_enqueue_style('bootstrap-basic4-main', get_template_directory_uri() . '/assets/css/main.css', array(), $asset_version);

            if (is_singular() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }
            wp_enqueue_script('bootstrap4-bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), $asset_version, true);// bundled with popper. see https://getbootstrap.com/docs/4.0/getting-started/contents/#comparison-of-css-files

            wp_enqueue_script('slick-slider', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), $asset_version, true);
            wp_enqueue_style('slick-slider', get_template_directory_uri() . '/assets/css/slick.css', array(), $asset_version);

            wp_enqueue_script('gmu-theme-script', get_template_directory_uri() . '/assets/js/theme.js', array('jquery', 'slick-slider'), $asset_version, true);
        }// enqueueScriptsAndStyles


        /**
         * Register sidebars
         * 
         * @access private Do not access this method directly. This is for hook callback not for direct call.
         */
        public function registerSidebars()
        {
            register_sidebar(array(
                'name'          => 'Sidebar',
                'id'            => 'sidebar',
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            ));

            register_sidebar(array(
                'name'          => 'Footer 1 Widget Area',
                'id'            => 'footer1',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            ));

            register_sidebar(array(
                'name'          => 'Footer 2 Widget Area',
                'id'            => 'footer2',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            ));

        }// registerSidebars


        /**
         * Add theme feature.
         * 
         * @access private Do not access this method directly. This is for hook callback not for direct call.
         */
        public function themeSetup()
        {
            // add theme support title-tag
            add_theme_support('title-tag');

            // add theme support post and comment automatic feed links
            add_theme_support('automatic-feed-links');

            // allow the use of html5 markup
            // @link https://codex.wordpress.org/Theme_Markup
            add_theme_support('html5', array('caption', 'comment-form', 'comment-list', 'gallery', 'search-form'));

            // add primary menu
            register_nav_menus(array(
                'primary' => 'Primary Menu',
                'utility' => 'Utility Menu',
                'prominent' => 'Prominent Links Menu',
                'calls-to-action' => 'Calls-to-Action Menu'
            ));

            // add post formats support
            add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

            // add post thumbnails support. **This is REQUIRED for post editor to show featured image field.**
            // To display featured image, please use post thumbnail functions.
            // See https://codex.wordpress.org/Post_Thumbnails for reference.
            add_theme_support('post-thumbnails');

            add_image_size( 'custom-small', 300, 300 );
        }// themeSetup


    }
}