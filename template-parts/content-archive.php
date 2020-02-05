<?php
/**
 * Display post title, excerpt and (optional) thumbnail in category archive.
 * This will be use in the loop.
 *
 * @package bootstrap-basic4
 */


$Bsb4Design = new \BootstrapBasic4\Bsb4Design();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <div class="entry-meta">
            <?php echo get_the_time(); ?>
            <?php $Bsb4Design->postOn(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class="archive-entry-summary">
        <?php if(has_post_thumbnail()) : ?>
        <div class="post-thumbnail flex-item">
            <?php the_post_thumbnail('medium'); ?>
        </div>
        <?php endif; ?>
        <div class="post-summary flex-item">
            <?php the_excerpt(); ?>
        </div>
        <div class="clearfix"></div>
    </div><!-- .archive-entry-summary -->
</article><!-- #post-## -->
<?php unset($Bsb4Design); ?>