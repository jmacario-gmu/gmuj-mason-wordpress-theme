<!-- Archive template -->

<!-- Header -->
<?php get_header(); ?> 

<!-- Archive body -->
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