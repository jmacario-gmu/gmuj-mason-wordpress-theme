<?php
/** 
 * Template Name: Homepage
 * 
 */


// begins template. -------------------------------------------------------------------------
get_header();
?> 
<main id="main" class="site-main full-width" role="main">
    <?php
    if (have_posts()) {
        while (have_posts()) { the_post();
            echo '<div class="flex-content-wrapper">';
            get_template_part('template-parts/flex/outages');
            echo '</div>';
            if (function_exists('have_rows') && have_rows('content')) { ?>
                <div class="flex-content-wrapper">
                    <?php
                      while( have_rows('content') ): the_row();
                        get_template_part('template-parts/flex/' . get_row_layout());
                      endwhile;
                    ?>
                </div>
            <?php
            }

        }// endwhile;
    } else {
        get_template_part('template-parts/section', 'no-results');
    }// endif;
    ?> 
</main>
<?php
get_footer();