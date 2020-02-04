<!-- Search template -->

<!-- Header -->
<?php get_header(); ?> 

<!-- Search page body -->
<main id="main" class="site-main full-width" role="main">
    <?php
    // Do we have search results?
        if (have_posts()) { 
            // Display search results
            get_template_part('template-parts/content', 'search-results');
        } else {
            // Display 'no results' message
            get_template_part('template-parts/content', 'search-no-results');
        }
    ?> 
</main>

<!-- Footer -->
<?php get_footer();