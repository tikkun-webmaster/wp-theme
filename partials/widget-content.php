<?php

// The top term
if ( isset( $instance['show_top_term'] ) && $instance['show_top_term'] == 1 && largo_has_categories_or_tags() ) {
	largo_maybe_top_term();
} ?>



<?php
// the thumbnail image (if we're using one)
if ($thumb == 'small') {
	?><div class="span4 pull-right"><?php
	$img_location = $instance['image_align'] != '' ? $instance['image_align'] : 'left';
	$img_attr = array('class' => $img_location . '-align');
	$img_attr['class'] .= " attachment-small"; ?>
	<a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), '60x60', $img_attr); ?></a>
	</div>
	<div class="span7 pull-left">
<?php } elseif ($thumb == 'medium') {
	?><div class="span4 pull-right"><?php
	$img_location = $instance['image_align'] != '' ? $instance['image_align'] : 'left';
	$img_attr = array('class' => $img_location . '-align');
	$img_attr['class'] .= " attachment-thumbnail"; ?>
	<a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), 'post-thumbnail', $img_attr); ?></a>
	</div>
	<div class="span7 pull-left">
<?php } elseif ($thumb == 'large') {
	?><div class="span12"><?php
	$img_attr = array();
	$img_attr['class'] .= " attachment-large"; ?>
	<a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), 'large', $img_attr); ?></a>
	</div>
	<div class="span12 clearfix">
<?php }

// the headline and optionally the post-type icon
?>

<h5>
	<a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?>
	<?php
		if ( isset( $instance['show_icon'] ) && $instance['show_icon'] == true ) { 
			post_type_icon();
		}
	?>
	</a>
</h5>

<?php // byline on posts
if ( isset( $instance['show_byline'] ) && $instance['show_byline'] == true) { ?>
	<span class="byline"><?php echo largo_byline( false, $instance['hide_byline_date'] ); ?></span>
<?php }

// the excerpt
if ($excerpt == 'num_sentences') { ?>
	<p><?php echo largo_trim_sentences( get_the_content(), $instance['num_sentences'] ); ?> <a href="<?php echo get_permalink(); ?>">Read more...</a></p></div>
<?php } elseif ($excerpt == 'custom_excerpt') { ?>
	<p><?php echo get_the_excerpt(); ?> <a href="<?php echo get_permalink(); ?>">Read more...</a></p></div>
<?php }
