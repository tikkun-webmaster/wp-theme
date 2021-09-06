<?php

if ((is_single() || is_singular()) && !largo_is_sidebar_required())
	return;

$span_class = largo_sidebar_span_class();

do_action('largo_before_sidebar'); ?>
<aside id="sidebar" class="<?php echo $span_class; ?> nocontent">
	<?php do_action('largo_before_sidebar_content'); ?>
	<div class="widget-area" role="complementary">
		<?php
			do_action('largo_before_sidebar_widgets');

			if (is_page_template('page-rabbilerner.php')) {
				dynamic_sidebar( 'tikkun_rabbi_sidebar' );
			}

			if (is_category() && !is_category('tikkun-daily')) {
			    $this_category = get_category($cat);

			    	## this queries Wordpress to get the subcategories
				$subcat_query = wp_list_categories('orderby=true&depth=1&show_count=false
				     &title_li=&use_desc_for_title=1&child_of='.$this_category->cat_ID.
				     '&echo=0&show_count=false');

					## deliver widget with list of subcategories only if said WP query returns an actual list and not just empty <li> items
				if (($this_category) && (strpos($subcat_query, 'cat-item-none') == false)) { ?> 
				 	<aside class="subcategory-list-container widget">
						<ul class="subcategory-list">
							<h5>More in <?php echo get_cat_name($cat); ?></h5>
							<?php 
								echo $subcat_query; 
							?>
						</ul>
					</aside>
				<?php } elseif ($this_category) { 
					$parent = $this_category->parent;

					$parent_query = wp_list_categories('orderby=true&depth=1&show_count=false
				     &title_li=&use_desc_for_title=1&child_of='.$parent.
				     '&echo=0&show_count=false'); ?>

					<aside class="subcategory-list-container widget">
						<ul class="subcategory-list">
							<h5>More in <?php echo get_cat_name($parent); ?></h5>
							<?php 
								echo $parent_query; 
							?>
						</ul>
					</aside>
				<?php }
			}

			if (is_single()) { ?>
				<aside class="subcategory-list-container widget">
					<ul class="subcategory-list">
						<h5>Related Categories</h5>
						<li><?php the_category( '</li><li>' ); ?></li>
					</ul>
				</aside>
			<?php }

			include 'partials/social-icons.php';?>

			<?php if (of_get_option('donate_link')) {
				the_widget('largo_donate_widget', array(
					'title' => __('Support ' . get_bloginfo('name'), 'largo'),
					'cta_text' => __('We depend on your support. A generous gift in any amount helps us continue to bring you this service.', 'largo'),
					'button_text' => __('Donate Now', 'largo'),
					'button_url' => esc_url( of_get_option( 'donate_link' ) ),
					'widget_class' => 'default'
					)
				);
			}

			if (is_archive() && !is_date())
				get_template_part('partials/sidebar', 'archive');
			else
				get_template_part('partials/sidebar');

			do_action('largo_after_sidebar_widgets');
		?>
	</div>
	<?php do_action('largo_after_sidebar_content'); ?>
</aside>
<?php do_action('largo_after_sidebar');
