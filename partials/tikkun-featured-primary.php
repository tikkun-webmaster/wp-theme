<?php
/**
 * Template for primary featured post, used on homepage and category headers
 */
?>
<div class="has-thumbnail">
	<a href="<?php the_permalink(); ?>" class="clickable"></a>
	<div class="has-thumbnail-inner">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php largo_excerpt( $post, 3) ?>
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'homepage-thumb' ); ?>
		</a>
	</div>
</div>
