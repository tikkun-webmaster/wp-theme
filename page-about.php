<?php
/**
 * Single Post Template: About Page Two Column
 * Template Name: About Page Two Column
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

			get_template_part( 'partials/content', $partial );
			
			?>
			<div class="row-fluid clearfix">
				<h2 class="sectionhead">Tikkun Staff</h2>
			</div>
			<div class="row-fluid clearfix">
				<?php
					dynamic_sidebar( 'tikkun_about_staff' );
				?>
			</div>
			<div class="row-fluid clearfix">
				<h2 class="sectionhead">Editorial Board</h2>
			</div>
			<div class="row-fluid clearfix">
				<?php
					dynamic_sidebar( 'tikkun_about_board' );
				?>
			</div>	
			<div class="row-fluid clearfix">
				<?php
					dynamic_sidebar( 'tikkun_about_posts' );
				?>
			</div>
			<?php
				

			

		endwhile;
	?>
</div>

<?php do_action('largo_after_content'); ?>

<?php get_sidebar(); ?>

<?php get_footer();
