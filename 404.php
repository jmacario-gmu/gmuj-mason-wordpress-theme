<!-- 404 template -->

<!-- Header -->
<?php get_header(); ?> 

<!-- 404 page body -->
<main id="main" class="site-main full-width" role="main">

    <section class="error-404 not-found">

        <header class="intro">
            <h1 class="entry-title">We&rsquo;re sorry, that page cannot be found.</h1>
        </header>

        <div class="page-content">
            <p>It looks like nothing was found at this location.</p>

            <!--search form-->
            <div class="row-with-vspace">
                <?php get_template_part('template-parts/content', 'search-form'); ?> 
            </div>
			
        </div>

    </section>

</main>

<!-- Footer -->
<?php get_footer();