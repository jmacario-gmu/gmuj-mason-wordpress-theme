<?php
/**
 * Theme header file.
 */

if(session_id() == '')
    session_start();
?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

    <head>
        <!-- Meta Tags -->
            <meta charset="<?php bloginfo('charset'); ?>" />
                <!-- The charset value comes from the WordPress function bloginfo(), which in this case pulls the value from the wp_options table. SQL: SELECT * FROM wp_options where option_name='blog_charset' -->
            <meta http-equiv="x-ua-compatible" content="ie=edge" />
                <!-- The X-UA-Compatible meta tag allows you to choose what version of Internet Explorer the page should be rendered as when viewed in IE. -->
            <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
                <!-- Set the meta viewport settings. We can probably just about remove the shrink-to-fit bit, but as of 2019-10-02 we were getting ~324 sessions/week using versions of iOS below 9.3. More info here: https://www.scottohara.me/blog/2018/12/11/shrink-to-fit.html-->
        <!-- Theme Customizable Meta Tags -->
            <?php if (get_theme_mod('gmuj_mason_unit')) { echo '<meta name="mason-unit" content="'.get_theme_mod('gmuj_mason_unit').'" />'.PHP_EOL; } ?>
            <?php if (get_theme_mod('gmuj_mason_department')) { echo '<meta name="mason-department" content="'.get_theme_mod('gmuj_mason_department').'" />'.PHP_EOL; } ?>
            <?php if (get_theme_mod('gmuj_website_contact')) { echo '<meta name="mason-website-technical-contact" content="'.get_theme_mod('gmuj_website_contact').'" />'.PHP_EOL; } ?>

<!-- Fire the wp_head action -->

            <?php wp_head(); ?>

<!-- End wp_head action -->



    </head>

    <body <?php body_class(); ?>>

        <!-- Debug stuff -->
        <div id="debug" style="display:none; background-color:#ccc;">
            <table>
                <tbody>
                    <tr>
                        <td colspan="2">Page Information</td>
                    </tr>
                    <tr>
                        <td>is_home?</td>
                        <td><?php echo is_home() ? "Yes" : "No" ?></td>
                    </tr>
                    <tr>
                        <td>is_front_page?</td>
                        <td><?php echo is_front_page() ? "Yes" : "No" ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Theme Information</td>
                    </tr>
                    <tr>
                        <td>Site Logo:</td>
                        <td><?php echo get_theme_mod('site_logo') ?></td>
                    </tr>
                    <tr>
                        <td>Theme Color:</td>
                        <td><?php echo get_theme_mod('gmuj_theme_color') ?></td>
                    </tr>
                    <tr>
                        <td>Homepage Mode:</td>
                        <td><?php echo get_theme_mod('gmuj_homepage_header_mode') ?></td>
                    </tr>
                    <tr>
                        <td>Show Utility Menu?:</td>
                        <td><?php echo get_theme_mod('gmuj_show_utility_menu') ?></td>
                    </tr>

                    <tr>
                        <td>Mason Unit:</td>
                        <td><?php echo get_theme_mod('gmuj_mason_unit') ?></td>
                    </tr>
                    <tr>
                        <td>Mason Department:</td>
                        <td><?php echo get_theme_mod('gmuj_mason_department') ?></td>
                    </tr>

                </tbody>
            </table>
        </div>


        <!-- Utility Links -->
        <?php if (get_theme_mod('gmuj_show_utility_menu')=='1') { ?>
            <div id="utility-links-bar">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'utility',
                        'menu_id' => 'utility-links',
                        'walker' => new \BootstrapBasic4\BootstrapBasic4WalkerNavMenu()
                    )
                );
                ?>            
                <div style="clear:both; height:1px;"></div>
            </div>
        <?php } ?>
    
        <!-- Mobile navigation -->
        <div id="mobile-nav">

            <!-- Top prominent items above menu -->
            <div class="top-header">

                <!-- Unit and department -->
                <ul id="university-breadcrumbs" class="links">
                    <li id="university">
                        <a href="https://www2.gmu.edu/">George Mason University</a></li>
                    <li id="unit">
                        <a href="<?php echo get_theme_mod('gmuj_mason_unit_url')?>"><?php echo get_theme_mod('gmuj_mason_unit')?></a>
                    </li>
                    <li id="department">
                        <a href="<?php echo get_theme_mod('gmuj_mason_department_url')?>"><?php echo get_theme_mod('gmuj_mason_department')?></a>
                    </li>
                </ul>

                <!-- Prominent Links -->
                <?php 
                wp_nav_menu(
                    array(
                        'theme_location' => 'prominent',
                        'container' => false,
                        'menu_id' => 'prominent-links',
                        'menu_class' => 'links',
                        'walker' => new \BootstrapBasic4\BootstrapBasic4WalkerNavMenu()
                    )
                );
                ?>      

                <!-- Search -->
                <div class="search-wrap">
                    <div class="search-inner"><?php get_search_form() ?></div>
                </div>

            </div>
            <!-- End top prominent items above menu -->

            <!-- Primary menu -->
            <?php
            wp_nav_menu(
                array(
                    'depth' => '2',
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'navbar-nav mr-auto',
                    'walker' => new \BootstrapBasic4\BootstrapBasic4WalkerNavMenu()
                )
            );
            ?>

        </div> 
        <!-- End mobile navigation -->


        <div id="page">

            <header class="page-header page-header-sitebrand-topbar">

                <!-- Top header -->
                <div class="top-header">
                    <div class="container wide clearfix">
                        <div class="left-side">
                            <!-- Unit and department -->
                            <ul id="university-breadcrumbs" class="links">
                                <li id="university">
                                    <a href="https://www2.gmu.edu"><span class="fa fa-chevron-circle-left"></span> George Mason University</a></li>
                                <li id="unit">
                                    <a href="<?php echo get_theme_mod('gmuj_mason_unit_url')?>"><?php echo get_theme_mod('gmuj_mason_unit')?></a>
                                </li>
                                <li id="department">
                                    <a href="<?php echo get_theme_mod('gmuj_mason_department_url')?>"><?php echo get_theme_mod('gmuj_mason_department')?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="right-side">

                            <!-- Prominent Links -->
                            <?php 
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'prominent',
                                    'container' => false,
                                    'menu_id' => 'prominent-links',
                                    'menu_class' => 'links',
                                    'walker' => new \BootstrapBasic4\BootstrapBasic4WalkerNavMenu()
                                )
                            );
                            ?>            

                            <!-- Search -->
                            <div class="search-wrap">
                                <div class="search-inner"><?php get_search_form() ?></div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End top header -->

                <!-- Main header -->
                <div class="main-header">
                    <div class="container wide clearfix">

                        <!-- Site title div. -->
                        <!-- We use PHP to add the 'image-logo' class if a site logo has been set in the theme customizer. -->
                        <div class="site-title <?php echo (get_theme_mod('site_logo') ? 'image-logo' : ''); ?>">
                            
                            <h1 class="site-title-heading">
                                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                                    
                                    <?php
                                        // If the site includes a logo,
                                            if (get_theme_mod('site_logo')) {
                                                // Display the logo
                                                    printf('<img src="%1$s" alt="%2$s">', get_theme_mod('site_logo'), get_bloginfo('name'));
                                            }
                                        // Display the site name
                                            echo "<div id='site-title-text'>";
                                            echo bloginfo('name');
                                            echo "</div>";
                                    ?>

                                </a>
                            </h1>

                        </div><!-- .site-title -->

                        <div class="main-navigation">
                            <div class="sr-only">
                                <a href="#content" title="<?php esc_attr_e('Skip to content', 'bootstrap-basic4'); ?>"><?php _e('Skip to content', 'bootstrap-basic4'); ?></a>
                            </div>
                            <nav class="navbar navbar-expand-xl">
                                <button class="navbar-toggler" type="button" aria-controls="bootstrap-basic4-topnavbar" aria-expanded="false" aria-label="<?php /*esc_attr_e('Toggle navigation', 'bootstrap-basic4'); */?>">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </button>

                                <div id="bootstrap-basic4-topnavbar" class="collapse navbar-collapse">
                                    <?php
                                    wp_nav_menu(
                                        array(
                                            // 'depth' => '2',
                                            'theme_location' => 'primary',
                                            'container' => false,
                                            'menu_id' => 'primary-menu',
                                            'menu_class' => 'navbar-nav mr-auto',
                                            'walker' => new \BootstrapBasic4\BootstrapBasic4WalkerNavMenu()
                                        )
                                    );
                                    ?>
                                </div><!--.navbar-collapse-->
                            </nav>
                        </div><!--.main-navigation-->
                    </div>
                </div>

            </header><!--.page-header-->

            <main id="content">

                <div class="banner-section">
                    
                    <div class="container">
                        <?php if (is_search() || is_front_page() || is_home() || is_page_template('templates/homepage.php')): ?>
                            <?php 
                                switch (get_theme_mod('gmuj_homepage_header_mode')) {
                                    case 'image':
                                        break;
                                    case 'rotator':
                                        ?>
                                        <h1>Image Rotator</h1>
                                        <?php
                                        break;
                                    case 'cta':
                                        ?>
                                        <div id="cta-header">
                                            <h1><?php echo get_theme_mod('cta_header_title') ?></h1>
                                            <div class="description"><?php echo wpautop(get_theme_mod('cta_header_description')) ?></div>
                                            <?php
                                            wp_nav_menu(
                                                array(
                                                    // 'depth' => '2',
                                                    'theme_location' => 'calls-to-action',
                                                    'container' => false,
                                                    'menu_id' => 'cta-wrapper',
                                                    'menu_class' => 'items' . gmuj_get_menu_items_count('calls-to-action'),
                                                    'link_after' => ' <span class="fa fa-chevron-circle-right"></span>',
                                                    'walker' => new \BootstrapBasic4\BootstrapBasic4WalkerNavMenu()
                                                )
                                            );
                                            ?>
                                            <div class="clear"></div>
                                        </div>
                                        <?php
                                        break;
                                    case 'search':
                                        ?>
                                        <div class="search-header">
                                            <h1><?php echo get_theme_mod('search_header_title') ?></h1>
                                            <div class="description"><?php echo wpautop(get_theme_mod('search_header_description')) ?></div>
                                            <div class="search-form-wrapper">
                                                <?php get_template_part('template-parts/content', 'search-form'); ?>
                                            </div>
                                        </div>
                                        <?php
                                        break;
                                    default:
                                        ?>
                                        <h1>No homepage mode selected.</h1>
                                        <?php
                                } 
                            ?>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="container page-container <?php echo gmu_theme_get_field('navigation_side_style') ? 'wide' : '' ?>">
                    <div class="site-content clearfix">
