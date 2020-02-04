<!-- Search results section -->
<section class="search-results">

    <header class="intro">
        <h1 class="entry-title">Search Results for: <span><?php echo get_search_query(); ?></span></h1>
    </header>

    <div class="page-content row-with-vspace">

        <?php
        // Display search results
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/content');
        }
        ?>
        <div class="posts-pagination"><?php echo paginate_links()?></div>

    </div>

</section>