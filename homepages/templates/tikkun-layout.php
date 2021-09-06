<?php
/**
 * Home Template: Tikkun
 * Description: Custom homepage template for Tikkun
 */

global $largo, $shown_ids, $tags;
?>
<div class="home-slider" class="home-zone">
  <?php
			dynamic_sidebar( __( 'Home Slider', 'tikkun' ) );
		?>
</div>

<div id="home-interstitial-1" class="home-zone">
	<h2 class="sectionhead">Tikkun Mission Statement</h2>
	<?php
		dynamic_sidebar( __( 'Home Mission Statement', 'tikkun' ) );
	?>
</div>

<div id="home-interstitial-2" class="home-zone">
	<?php
		dynamic_sidebar( __( 'Home Newsletter Form', 'tikkun' ) );
	?>
</div> 

<div id="home-featured" class="row-fluid clearfix home-zone">
	<div class="top-story span12">
	<h3 class="widgettitle">Featured Story</h3>
	<?php
		$topstory = largo_get_featured_posts( array(
			'tax_query' => array(
				array(
					'taxonomy' 	=> 'prominence',
					'field' 	=> 'slug',
					'terms' 	=> 'homepage-featured'
				)
			),
			'posts_per_page' => 1
		) );
		if ( $topstory->have_posts() ) :
			while ( $topstory->have_posts() ) : $topstory->the_post(); $shown_ids[] = get_the_ID();
				get_template_part( 'partials/tikkun-featured', 'primary' );
			endwhile;
		endif; // end top story ?>
	</div>
</div>

<div id="home-three-strategies"  class="home-zone">
	<h2 class="sectionhead">Tikkun Embodies Three Powerful Strategies to Catalyze a Loving and Just World</h2>
	<div class="row-fluid">
		<?php
			dynamic_sidebar( __( 'Home Three Strategies', 'tikkun' ) );
		?>
	</div>
</div>

<div id="home-category-grid"  class="home-zone">
	<h2 class="sectionhead">Tikkun Articles Decipher Today's Complex Social Issues</h2>
	<div class="row-fluid">
		<?php if ( !dynamic_sidebar( 'Home Category Grid' ) ) { ?>
			<aside class="span4" style="display:block;margin-left: auto;margin-right: auto;background-color:#ddd;color:#bb0000; text-align: center;"> Add some widgets to the Home Category widget area.</aside>
		<?php } ?>
	</div>
</div>

<div id="home-network" class="home-zone">
	<div class="row-fluid">
		<?php if ( !dynamic_sidebar( 'Home Media' ) ) { ?>
			<aside class="span4" style="display:block;margin-left: auto;margin-right: auto;background-color:#ddd;color:#bb0000; text-align: center;"> Add some widgets to the Home Network widget area.</aside>
		<?php } ?>
	</div>
</div>

<div id="home-ask-the-rabbi" class="home-zone">
	<h2 class="sectionhead">Ask the Rabbi</h2>
	<div class="row-fluid">
		<?php if ( !dynamic_sidebar( 'Home Ask the Rabbi' ) ) { ?>
			<aside class="span4" style="display:block;margin-left: auto;margin-right: auto;background-color:#ddd;color:#bb0000; text-align: center;"> Add some widgets to the Home Ask the Rabbi widget area.</aside>
		<?php } ?>
	</div>
</div>

<div id="home-how-to-activist" class="home-zone color-background">
	<h2 class="sectionhead">How to Be an Activist</h2>
	<div class="row-fluid">
		<?php if ( !dynamic_sidebar( 'Home How to Activist' ) ) { ?>
			<aside class="span4" style="display:block;margin-left: auto;margin-right: auto;background-color:#ddd;color:#bb0000; text-align: center;"> Add some widgets to the Home How to Activist widget area.</aside>
		<?php } ?>
	</div>
</div>

<div id="home-institute" class="home-zone color-background">
	<h2 class="sectionhead">Tikkun Institute</h2>
	<div class="row-fluid">
		<?php if ( !dynamic_sidebar( 'Home Tikkun Institute' ) ) { ?>
			<aside class="span4" style="display:block;margin-left: auto;margin-right: auto;background-color:#ddd;color:#bb0000; text-align: center;"> Add some widgets to the Home Tikkun Institute widget area.</aside>
		<?php } ?>
	</div>
</div>

<div id="home-support" class="home-zone color-background">
	<h2 class="sectionhead">Support Our Work</h2>
	<div class="row-fluid">
		<?php if ( !dynamic_sidebar( 'Home Support' ) ) { ?>
			<aside class="span4" style="display:block;margin-left: auto;margin-right: auto;background-color:#ddd;color:#bb0000; text-align: center;"> Add some widgets to the Home Support widget area.</aside>
		<?php } ?>
	</div>
</div>

<div id="home-donate" class="home-zone">
	<h2 class="sectionhead">Why Donate to Tikkun?</h2>
	<div class="grid_wrapper">
		<?php if ( !dynamic_sidebar( 'Home Donate' ) ) { ?>
			<aside class="span4" style="display:block;margin-left: auto;margin-right: auto;background-color:#ddd;color:#bb0000; text-align: center;"> Add some widgets to the Home Donate widget area.</aside>
		<?php } ?>
	</div>
</div>

<div id="home-donor-quotes">
	<div class="row-fluid">
		<?php if ( !dynamic_sidebar( 'Home Donor Quotes' ) ) { ?>
			<aside class="span4" style="display:block;margin-left: auto;margin-right: auto;background-color:#ddd;color:#bb0000; text-align: center;"> Add some widgets to the Home Donor Quotes widget area.</aside>
		<?php } ?>
	</div>
</div>
