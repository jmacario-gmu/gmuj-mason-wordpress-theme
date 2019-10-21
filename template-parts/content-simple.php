<?php
$help_text  = ot_get_option('help_text');
$s = array('am','pm');
$r = array('a.m.','p.m.');
?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header"><?php
		if (is_single()): ?>
			<h1 class="entry-title"><?php the_title(); ?></h1><?php
		else: ?>
			<h3 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h3>
		<?php endif; ?>
		<span class="post-date"><?php _gmu_date(get_outage_date($post,true)); ?></span>
	</header>
	<div class="entry-summary">
		<?php
		$email_body = get_field( 'email_body' );
		if ( $email_body ) {
			?>
			<?php echo wp_kses_post( wp_trim_words( $email_body, 25 ) ); ?>
			<a class="moretag" href="<?php the_permalink(); ?>" rel="bookmark">(READ MORE)</a>
			<?php
		}
		?>

		<?php
		if (is_single())
			the_content();
		elseif($post->post_type!='phishing_alert')
			the_excerpt(); ?>
	</div>
	<div class="clearfix"></div><?php
	if (!is_single()): ?>
		<!-- <div class="post-date"><span>Posted On: </span><?php echo get_the_date('m/d/Y g:i a'); ?></div> --> <?php
	endif;
	if (is_single()):
		if($post->post_type == 'known_issue'){ ?>
			<div class="post-tags"><?php the_terms( $post->ID, 'issue_tags', 'Tags: ', ' / ' );; ?></div><?php
		}
	endif; ?>
</article><!-- #post-## -->