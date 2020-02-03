<?php

?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header"><?php
		if (is_single()): ?>
			<h1 class="entry-title"><?php the_title(); ?></h1><?php
		else: ?>
			<h3 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h3>
		<?php endif; ?>
		<span class="post-date"><!--post date?--></span>
	</header>
	<div class="entry-summary">
		<?php
		if (is_single()) { the_content(); }
		else { the_excerpt();  }
		?>
	</div>
	<div class="clearfix"></div><?php
	if (!is_single()): ?>
		<span class="post-date"><?php echo get_the_date('m/d/Y g:i a'); ?></span>

	<?php
	endif;
?>
</article><!-- #post-## -->