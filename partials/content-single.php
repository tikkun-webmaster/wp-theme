<?php
/**
 * The template for displaying content in the single.php template
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'hnews item' ); ?> itemscope itemtype="http://schema.org/Article">

	<?php do_action('largo_before_post_header'); ?>

	<header>

		<?php largo_maybe_top_term(); ?>

		<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>
		<h2 class="entry-subtitle"><?php the_subtitle(); ?></h2>
		<h5 class="byline"><?php largo_byline(); ?></h5>

<?php largo_post_metadata( $post->ID ); ?>

	</header><!-- / entry header -->

	<?php
		do_action('largo_after_post_header');

		largo_hero(null,'span12');


		do_action('largo_after_hero');
	?>

	<h2 class="entry-subtitle"><?php the_subtitle(); ?></h2>

	<?php get_sidebar(); ?>

	<section class="entry-content clearfix" itemprop="articleBody">
		
		<?php largo_entry_content( $post ); ?>
		
	</section>

	<?php do_action('largo_after_post_content'); ?>

	<?php
			if ( !of_get_option( 'single_social_icons' ) == false ) {
				largo_post_social_links();
			}
		?>

</article>
