<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <header class="entry-header">

        <?php if (has_post_thumbnail()) { ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
        <?php } //endif; ?>
        <h2 class="entry-title">Article: <?php the_title(); ?></h2>
 
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
        <div class="clearfix"></div>

        <?php
        /**
         * This wp_link_pages option adapt to use bootstrap pagination style.
         */
        wp_link_pages(array(
            'before' => '<div class="page-links">' . 'Pages:' . ' <ul class="pagination">',
            'after'  => '</ul></div>',
            'separator' => ''
        ));
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-meta">
 

    </footer><!-- .entry-meta -->

</article>
