<?php
/** 
 * The search template.
 * 
 * @package bootstrap-basic4
 */


// begins template. -------------------------------------------------------------------------
get_header();
?> 
                <main id="main" class="site-main full-width" role="main">
                    <?php
                    if (have_posts()) {
                    ?> 
                    <header class="intro">
                        <h1 class="entry-title"><?php printf(__('Search Results for: %s', 'bootstrap-basic4'), '<span>' . get_search_query() . '</span>'); ?></h1>
                    </header><!-- .page-header -->

                    <?php
                        while (have_posts()) {
                            the_post();
                            get_template_part('template-parts/content', get_post_format());
                        }// endwhile;

                        /*$Bsb4Design = new \BootstrapBasic4\Bsb4Design();
                        $Bsb4Design->pagination();
                        unset($Bsb4Design);*/
                        echo '<div class="posts-pagination">'.paginate_links().'</div>';

                    } else {
                        get_template_part('template-parts/section', 'no-results');
                    }// endif;
                    ?> 
                </main>
<?php
get_footer();