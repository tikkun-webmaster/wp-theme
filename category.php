<?php
/**
 * Template for category archive pages
 *
 * @package Largo
 * @since 0.4
 * @filter largo_partial_by_post_type
 */
get_header();

global $tags, $paged, $post, $shown_ids;

$title = single_cat_title( '', false );
$description = category_description();
$rss_link = get_category_feed_link( get_queried_object_id() );
$posts_term = of_get_option( 'posts_term_plural', 'Stories' );
$queried_object = get_queried_object();
?>

<div class="clearfix">
	<header class="archive-background clearfix">
		<h1 class="page-title">
		<?php
			if ( $term_ids = get_ancestors( get_queried_object_id(), 'category', 'taxonomy' ) ) {
			    $crumbs = [];

			    foreach ( $term_ids as $term_id ) {
			        $term = get_term( $term_id, 'category' );

			        if ( $term && ! is_wp_error( $term ) ) {
			            $crumbs[] = sprintf( esc_html( $term->name ) );
			        }
			    }

			    echo implode( ': ', array_reverse( $crumbs ) );
			    echo ': ' . $title;
			} else {
				echo $title;
			}
		?></h1>

		<div class="archive-description"><?php echo $description; ?></div>
		<?php do_action( 'largo_category_after_description_in_header' ); ?>
	</header>

	
</div>

<div class="row-fluid clearfix">
	<div class="stories span8" role="main" id="content">

	<?php if ( $paged < 2 && of_get_option( 'hide_category_featured' ) == '0' ) {
		$featured = FALSE;
		$featured_posts = largo_get_featured_posts_in_category( $wp_query->query_vars['category_name'], 1 );
		$featured = FALSE;
		if ( count( $featured_posts ) > 0 ) {
			$top_featured = $featured_posts[0];
			$shown_ids[] = $top_featured->ID; ?>

				<?php largo_render_template(
					'partials/content', 
					'single',
					array( 'featured_post' => $top_featured )
				); ?>
		<?php }
	} ?>
		
	<?php 
		do_action( 'largo_before_category_river' );
		$featured = FALSE;
		if ( have_posts() ) {
			$counter = 1;
			$featured = FALSE;
			while ( have_posts() ) {
				the_post();
				$post_type = get_post_type();
				$partial = largo_get_partial_by_post_type( 'archive', $post_type, 'archive' );
				if ($counter == 1 ) {
					get_template_part( 'partials/archive-category-primary-feature' );
				} else {
					get_template_part( 'partials/content', $partial );
				}
				do_action( 'largo_loop_after_post_x', $counter, $context = 'archive' );
				$counter++;
			}
			largo_content_nav( 'nav-below' );
		} elseif ( count($featured_posts) > 0 ) {
			// do nothing
			// We have n > 1 posts in the featured header
			// It's not appropriate to display partials/content-not-found here.
		} else {
			get_template_part( 'partials/content', 'not-found' );
		}
		do_action( 'largo_after_category_river' );
	?>
	</div>
	<?php get_sidebar(); ?>
</div>

<?php get_footer();
