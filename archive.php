<!-- Main template -->

<!--
* To override home page (for listing latest post) add home.php into the theme.<br>
* If front page displays is set to static, the index.php file will be used.<br>
* If front-page.php exists, it will be override any home page file such as home.php, index.php.<br>
* To learn more please go to https://developer.wordpress.org/themes/basics/template-hierarchy/ .
-->

<!-- Header -->
<?php get_header(); ?> 

<!-- Main body -->
<main id="main" class="col-md-<?php echo \BootstrapBasic4\Bootstrap4Utilities::getMainColumnSize(); ?> site-main" role="main">
    <?php
    // Do we have posts?
        if (have_posts()) {
            // Loop through posts
                while (have_posts()) {
                    // Display posts
                    the_post();
                    get_template_part('template-parts/content-archive');
                }
            // Pagination
                $Bsb4Design = new \BootstrapBasic4\Bsb4Design();
                $Bsb4Design->pagination();
                unset($Bsb4Design);
        } else {
            // Show no posts content
                get_template_part('template-parts/content', 'no-posts');
        }
    ?> 
</main>

<!-- Sidebar -->
<?php get_sidebar(); ?>

<!-- Footer -->
<?php get_footer();