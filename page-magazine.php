<?php
/**
 * Single Post Template: Magazine Page Two Column
 * Template Name: Magazine Page Two Column
 * Description: Shows the post and sidebar if specified.
 */

global $shown_ids;

add_filter('body_class', function($classes) {
	$classes[] = 'classic';
	return $classes;
});

get_header();
?>

<div id="content" class="span12" role="main">
	<?php
		while ( have_posts() ) : the_post();

			$shown_ids[] = get_the_ID();

			$partial = 'single-widgetizedpage';
			
			?>

			<div class="row-fluid clearfix tikkun_magazine_embed">
				<?php
					dynamic_sidebar( 'tikkun_magazine_embed' );
				?>
			</div>
			<div class="row-fluid clearfix">
				<?php
					dynamic_sidebar( 'tikkun_magazine_twocolumn' );
				?>
			</div>
			<div class="row-fluid clearfix">
				<?php
					dynamic_sidebar( 'tikkun_magazine_forms' );

					get_template_part( 'partials/content', $partial );
				?>
			</div>	
			<div id="tikkun_magazine_artists" class="row-fluid clearfix">
				<h2 class="sectionhead">The Artists of Tikkun</h2>
				<h3><?php get_the_ID();?></h3>
				<p>There's a reason that Tikkun's stories are so memorable.</p>
				<p>The publication marries art and words to deeply engage readers in the story.</p>
				<p>Thanks to the amazing Tikkun artists, the picture is clear.</p>
				<div class="grid_wrapper">
					<?php
						dynamic_sidebar( 'tikkun_magazine_artists' );
					?>
				</div>
			</div>
			<?php
				

			

		endwhile;
	?>
</div>

<?php do_action('largo_after_content'); ?>

<?php get_footer();
