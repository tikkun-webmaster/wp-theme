<?php
/**
 * The template for displaying content in the single.php template
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'hnews item' ); ?> itemscope itemtype="http://schema.org/Article">

	<?php if (is_page( array( 'magazine') )) { 

	} else {
	?>

		<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>

		<?php
			do_action( 'largo_after_post_header' );

			if (is_page( array( 'rabbi-michael-lerner') )) { 
				?>
				<h2 class="entry-subtitle"><?php the_subtitle(); ?></h2>
				<div class="row-fluid clearfix">
				<?php
					dynamic_sidebar( 'tikkun_rabbi_1' );
				?>
				</div>	
				<?php
				
			} else {
				largo_hero( null,'' ); 
				?>
				<h2 class="entry-subtitle"><?php the_subtitle(); ?></h2>
				<?php
			}
		?>

		

		<?php
			do_action( 'largo_after_hero' );
		?>

	<?php
	}
	?>

	<div class="entry-content clearfix" itemprop="articleBody">
		<?php largo_entry_content( $post ); ?>
	</div><!-- .entry-content -->

	<?php do_action( 'largo_after_post_content' ); ?>

	<footer class="post-meta bottom-meta">

		<?php
			if ( !of_get_option( 'single_social_icons' ) == false ) {
				largo_post_social_links();
			}
		?>

	</footer><!-- /.post-meta -->

	<?php do_action( 'largo_after_post_footer' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->
