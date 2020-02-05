<?php
/**
 * Contains methods for customizing the theme customization screen.
 * 
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since MyTheme 1.0
 */

class GMUCustomizer {

   /**
    * This will output the custom WordPress settings to the live theme's WP head.
    * 
    * Used by hook: 'wp_head'
    * 
    * @see add_action('wp_head',$func)
    * @since MyTheme 1.0
    */
   public static function header_output() {
      ?>
      <!--Customizer CSS--> 
      <style type="text/css">
         <?php self::generate_css('#content .banner-section', 'background-image', 'default_header', 'url(\'', '\')'); ?> 
      </style> 
      <!--/Customizer CSS-->
      <?php
   }
   
   /**
    * This outputs the javascript needed to automate the live settings preview.
    * Also keep in mind that this function isn't necessary unless your settings 
    * are using 'transport'=>'postMessage' instead of the default 'transport'
    * => 'refresh'
    * 
    * Used by hook: 'customize_preview_init'
    * 
    * @see add_action('customize_preview_init',$func)
    * @since MyTheme 1.0
    */
   public static function live_preview() {
      wp_enqueue_script( 
           'gmu-customizer',
           get_template_directory_uri() . '/assets/js/theme-customizer.js', // Define the path to the JS file
           array(  'jquery', 'customize-preview' ), // Define dependencies
           '', // Define a version (optional) 
           true // Specify whether to put in footer (leave this true)
      );
   }

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     * 
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since MyTheme 1.0
     */
    public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
      $return = '';
      $mod = get_theme_mod($mod_name);
      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
         );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
    }

    /**
     * Add actions and filters to make main theme functional works.
     */
    public function addActionsFilters()
    {
        // Output custom CSS to live site
        add_action( 'wp_head' , array( &$this , 'header_output' ) );

        // Enqueue live preview javascript in Theme Customizer admin screen
        add_action( 'customize_preview_init' , array( &$this , 'live_preview' ) );
    }
}

// Configure the theme customizer
add_action('customize_register','gmuj_theme_customizer_register');

function gmuj_theme_customizer_register($wp_customize) {

  class Customize_Textarea_Control extends WP_Customize_Control {
      public $type = 'textarea';
   
      public function render_content() {
          ?>
          <label>
          <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
          <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
          </label>
          <?php
      }
  }

  $wp_customize->get_setting('blogname')->transport='postMessage';
  $wp_customize->get_setting('blogdescription')->transport='postMessage';

  // Setting: gmuj_mason_unit
    // Setting
      $wp_customize->add_setting('gmuj_mason_unit',
        array(
          'default' => ''
        ) 
      );
    // Control
      $wp_customize->add_control(
        new WP_Customize_Control(
          $wp_customize,
          'gmuj_mason_unit',
          array(
            'label'      => 'Mason Unit',
            'section'    => 'title_tagline',
            'settings'   => 'gmuj_mason_unit'
          )
        )
      );

  // Setting: gmuj_mason_unit_url
    // Setting
      $wp_customize->add_setting('gmuj_mason_unit_url',
        array(
          'default' => '',
          'sanitize_callback' => 'esc_url'
        ) 
      );
    // Control
      $wp_customize->add_control(
        new WP_Customize_Control(
          $wp_customize,
          'gmuj_mason_unit_url',
          array(
            'type'       => 'url',
            'label'      => 'Mason Unit URL',
            'section'    => 'title_tagline',
            'settings'   => 'gmuj_mason_unit_url'
          )
        )
      );

  // Setting: gmuj_mason_department
    // Setting
      $wp_customize->add_setting('gmuj_mason_department',
        array(
          'default' => ''
        ) 
      );
    // Control
      $wp_customize->add_control(
        new WP_Customize_Control(
          $wp_customize,
          'gmuj_mason_department',
          array(
            'label'      => 'Mason Department',
            'section'    => 'title_tagline',
            'settings'   => 'gmuj_mason_department'
          )
        )
      );

  // Setting: gmuj_mason_department_url
    // Setting
      $wp_customize->add_setting('gmuj_mason_department_url',
        array(
          'default' => '',
          'sanitize_callback' => 'esc_url'
        ) 
      );
    // Control
      $wp_customize->add_control(
        new WP_Customize_Control(
          $wp_customize,
          'gmuj_mason_department_url',
          array(
            'type'       => 'url',
            'label'      => 'Mason Department URL',
            'section'    => 'title_tagline',
            'settings'   => 'gmuj_mason_department_url'
          )
        )
      );
      
  // Setting: site logo
    // Setting
      $wp_customize->add_setting('site_logo',
        array(
          'default' => '',
          'transport' => 'postMessage'
        ) 
      );
    // Control
      $wp_customize->add_control(
        new WP_Customize_Image_Control(
          $wp_customize,
          'logo',
          array(
            'label'      => 'Upload a logo', 'GMU',
            'section'    => 'title_tagline',
            'settings'   => 'site_logo',
            'priority'   => 900
          )
        )
      );

  // Setting: theme color scheme (gmuj_theme_color)
    // Setting
      $wp_customize->add_setting(
        'gmuj_theme_color',
        array(
          'default'     => '1'
        )
      );
    // Control
      $wp_customize->add_control(
              'gmuj_theme_color',
              array(
                  'label'      => 'Theme Color Scheme',
                  'description' => '<p>Select a pre-defined color scheme consistent with the Mason brand: <a href="https://brand.gmu.edu/visual-identity-and-style/color/">brand.gmu.edu/visual-identity-and-style/color/</a></p>',
                  'section'    => 'colors',
                  'settings'   => 'gmuj_theme_color',
                  'type'       => 'select',
                  'choices' => array(
                    '1' => 'Option 1',
                    '2' => 'Option 2',
                    '3' => 'Option 3',
                    '4' => 'Option 4'
                  )
              )
      );

  // Add section: header_area 
    $wp_customize->add_section('header_area', 
       array(
          'title'       => 'Header Area','GMU',
          'priority'    => 149
       ) 
    );

    // Setting: show utility menu (gmuj_show_utility_menu)
      // Setting
        $wp_customize->add_setting(
          'gmuj_show_utility_menu',
          array(
            'default'     => '1'
          )
        );
      // Control
        $wp_customize->add_control(
                'gmuj_show_utility_menu',
                array(
                    'label'      => 'Show Utility Menu?:',
                    'description' => '<p>The utility menu is intended for the display of links to other university websites to aid in university navigation, and is only displayed on desktop view. It corresponds to the yellow menu bar at the top of the Mason core website (www2.gmu.edu). The links in this menu should correspond to the links on the Mason core website to ensure ease of navigation.</p>',
                    'section'    => 'header_area',
                    'settings'   => 'gmuj_show_utility_menu',
                    'type'       => 'radio',
                    'choices' => array(
                      '1' => 'Yes',
                      '0' => 'No'
                    )
                )
        );

  // Setting: default_header (image)
    // Setting
      $wp_customize->add_setting('default_header',
        array(
          'default' => ''
        )
      );

    // Control
      $wp_customize->add_control(
        new WP_Customize_Image_Control(
          $wp_customize,
          'default_header',
          array(
            'label'      => 'Default Header Image','GMU',
            'section'    => 'header_area',
            'settings'   => 'default_header'
          )
        )
      );

    // Setting: homepage mode (gmuj_homepage_mode)
      // Setting
        $wp_customize->add_setting(
          'gmuj_homepage_header_mode',
          array(
            'default'     => 'image'
          )
        );
      // Control
        $wp_customize->add_control(
                'gmuj_homepage_header_mode',
                array(
                    'label'      => 'Homepage Header Shows:',
                    'section'    => 'header_area',
                    'settings'   => 'gmuj_homepage_header_mode',
                    'type'       => 'radio',
                    'choices' => array(
                      'image' => 'Banner Image',
                      'rotator' => 'Rotator',
                      'cta' => 'Calls-to-Action',
                      'search' => 'Search'
                    )
                )
        );

  // Add section: search_header_settings
    $wp_customize->add_section('search_header_settings',
       array(
          'title'       => 'Header: Search',
          'priority'    => 150
       )
    );

  // Setting: search_header_title
    // Setting
      $wp_customize->add_setting('search_header_title',
        array(
          'default' => ''
        ) 
      );
    // Control
      $wp_customize->add_control(
        new WP_Customize_Control(
          $wp_customize,
          'search_header_title',
          array(
            'label'      => 'Search Header Title',
            'section'    => 'search_header_settings',
            'settings'   => 'search_header_title'
          )
        )
      );

  // Setting: search_header_description
    // Setting
      $wp_customize->add_setting('search_header_description',
        array(
          'default' => ''
        )
      );
    // Control
      $wp_customize->add_control(
        new Customize_Textarea_Control(
          $wp_customize,
          'search_header_description',
          array(
            'label'      => 'Search Header Description',
            'section'    => 'search_header_settings',
            'settings'   => 'search_header_description'
          )
        )
      );

  // Add section: cta_header_settings
    $wp_customize->add_section('cta_header_settings',
       array(
          'title'       => 'Header: Calls-to-Action',
          'priority'    => 150
       )
    );

  // Setting: cta_header_title
    // Setting
      $wp_customize->add_setting('cta_header_title',
        array(
          'default' => ''
        ) 
      );
    // Control
      $wp_customize->add_control(
        new WP_Customize_Control(
          $wp_customize,
          'cta_header_title',
          array(
            'label'      => 'Calls-to-Action Header Title',
            'section'    => 'cta_header_settings',
            'settings'   => 'cta_header_title'
          )
        )
      );

  // Setting: cta_header_description
    // Setting
      $wp_customize->add_setting('cta_header_description',
        array(
          'default' => ''
        ) 
      );
    // Control 
      $wp_customize->add_control(
        new Customize_Textarea_Control(
          $wp_customize,
          'cta_header_description',
          array(
            'label'      => 'Calls-to-Action Header Description',
            'section'    => 'cta_header_settings',
            'settings'   => 'cta_header_description'
          )
        )
      );

  // Add section: analytics/meta 
    $wp_customize->add_section('analytics_meta', 
       array(
          'title'       => 'Analytics/Meta',
          'priority'    => 151
       ) 
    );

  // Setting: gmuj_website_contact
    // Setting
      $wp_customize->add_setting('gmuj_website_contact',
        array(
          'default' => '',
          'sanitize_callback' => 'sanitize_email'
          //'validate_callback' => 'is_email'
        ) 
      );
    // Control
      $wp_customize->add_control(
        new WP_Customize_Control(
          $wp_customize,
          'gmuj_website_contact',
          array(
            'type'       => 'email',
            'label'      => 'Website Technical Contact (email)',
            'section'    => 'analytics_meta',
            'settings'   => 'gmuj_website_contact'
          )
        )
      );

}