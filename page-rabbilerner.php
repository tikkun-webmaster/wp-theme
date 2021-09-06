<?php
/**
 * Single Post Template: Rabbi Lerner Page Two Column
 * Template Name: Rabbi Lerner Page Two Column
 * Description: Shows the post and sidebar if specified.
 */

global $shown_ids;

add_filter('body_class', function($classes) {
	$classes[] = 'classic';
	return $classes;
});

get_header();
?>

<div id="content" class="span8" role="main">
	<?php
		while ( have_posts() ) : the_post();

			$shown_ids[] = get_the_ID();

			$partial = 'single-widgetizedpage';
			
			?>

			

			<?php get_template_part( 'partials/content', $partial ); ?>

			<h2 class="sectionhead">Ask the Rabbi</h2>

			<div class="row-fluid clearfix">
				<?php
					dynamic_sidebar( 'home-ask-the-rabbi' );
				?>
			</div>	

			<div class="row-fluid clearfix">
				<?php
					dynamic_sidebar( 'tikkun_rabbi_2' );
				?>
			</div>	
			<h2>Books by Rabbi Lerner</h2>
			<div id="rabbi-lerner-books" class="row-fluid clearfix">
				<?php
					dynamic_sidebar( 'tikkun_rabbi_books' );
				?>
			</div>
			<?php
				

			

		endwhile;
	?>
</div>

<?php do_action('largo_after_content'); ?>

<?php get_sidebar(); ?>

<?php get_footer();
