<div class="primary-featured-post">
	<article id="post-<?php echo $featured_post->ID ?>" <?php post_class('clearfix row-fluid', $featured_post->ID); ?>>
	<?php if ( has_post_thumbnail($featured_post->ID) ) { ?>
		<div class="row-fluid <?php largo_hero_class($featured_post->ID); ?>">
			<a href="<?php echo post_permalink($featured_post->ID); ?>"><?php echo get_the_post_thumbnail($featured_post->ID, 'rect_thumb'); ?></a>
		</div>

		<div class="row-fluid">
	<?php } else { ?>
		<div class="row-fluid">
	<?php } ?>
			<header>
				<h2 class="entry-title">
					<a href="<?php echo post_permalink($featured_post->ID); ?>"
						title="<?php echo __( 'Permalink to', 'largo' ) . esc_attr(strip_tags(the_title())); ?>"
						rel="bookmark"><?php echo the_title(); ?></a>
				</h2>

				<h5 class="byline"><?php largo_byline(true, false, $featured_post); ?></h5>
			</header>

			<div class="entry-content">
				<?php largo_excerpt($featured_post, 2, null, null, true, false); ?>
			</div>
		</div>
	</article>
</div>