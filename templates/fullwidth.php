<?php
/** 
 * Template Name: Full Width
 * 
 */


// begins template. -------------------------------------------------------------------------
get_header();
?> 
                <main id="main" class="site-main full-width" role="main">
                    <?php
                    if (have_posts()) {
                        $Bsb4Design = new \BootstrapBasic4\Bsb4Design();
                        while (have_posts()) {
                            the_post();


                            gmu_theme_content_subnav();


                            get_template_part('template-parts/content', 'page');
                            echo "\n\n";

                            $Bsb4Design->pagination();
                            echo "\n\n";

                            // If comments are open or we have at least one comment, load up the comment template
                            if (comments_open() || '0' != get_comments_number()) {
                                comments_template();
                            }
                            echo "\n\n";
                        }// endwhile;

                        
                        unset($Bsb4Design);
                    } else {
                        get_template_part('template-parts/section', 'no-results');
                    }// endif;
                    ?> 
                </main>
<?php
get_footer();