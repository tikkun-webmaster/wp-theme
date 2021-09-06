<?php

include_once get_template_directory() . '/homepages/homepage-class.php';

class TikkunLayout extends Homepage {
	function __construct( $options = array() ) {
		$suffix = (LARGO_DEBUG)? '' : '.min';
		$defaults = array(
			'name' => __( 'Tikkun Custom Layout', 'tikkun' ),
			'description' => __( 'A custom homepage layout for Tikkun based loosely on the Largo top stories homepage layout', 'tikkun' ),
			'template' => get_stylesheet_directory() . '/homepages/templates/tikkun-layout.php',
			'assets' => array(
				array( 'homepage-single', get_stylesheet_directory_uri() . '/homepages/assets/css/homepage' . $suffix . '.css', array() ),
			)
		);
		$options = array_merge( $defaults, $options );
		parent::__construct( $options );
	}
}

function register_my_custom_homepage_layout() {
	    register_homepage_layout('TikkunLayout');
}
add_action('init', 'register_my_custom_homepage_layout', 0);

/**
 *  Add tikkun homepage widget areas
 */
function tikkun_add_homepage_widget_areas() {
	$sidebars = array(
		array(
			'name' => __( 'Home Slider', 'tikkun' ),
			'id' => 'home-slider',
			'description' => __( 'This widget area powers the slider.', 'tikkun' ),
			'before_widget' => '<aside id="%1$s" class="%2$s clearfix homepage-slider">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		),
		array(
			'name' => __( 'Home Mission Statement', 'tikkun' ),
			'id' => 'homepage-interstitial-1',
			'description' => __( 'This widget area appears directly below the top stories section.', 'tikkun' ),
			'before_widget' => '<aside id="%1$s" class="%2$s clearfix homepage-interstitial-1">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		),
		array(
			'name' => __( 'Home Newsletter Form', 'tikkun' ),
			'id' => 'homepage-interstitial-2',
			'description' => __( 'This widget area appears directly above the featured story section.', 'tikkun' ),
			'before_widget' => '<aside id="%1$s" class="%2$s clearfix homepage-interstitial-2">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		),
		array(
			'name' => __( 'Home Three Strategies', 'tikkun' ),
			'id' => 'home-three-strategies',
			'description' => __( 'This widget area appears directly below the featured story section.', 'tikkun' ),
			'before_widget' => '<aside id="%1$s" class="%2$s clearfix">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		),
		array(
			'name' => __( 'Home Category Grid', 'tikkun' ),
			'id' => 'home-category-grid',
			'description' => __( 'This area should be filled with three Largo Recent Posts widgets.', 'tikkun' ),
			'before_widget' => '<aside id="%1$s" class="%2$s clearfix span4">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		),
		array(
			'name' => __( 'Home Media', 'tikkun' ),
			'id' => 'home-network',
			'description' => __( 'This area should be filled with three widgets.', 'tikkun' ),
			'before_widget' => '<aside id="%1$s" class="%2$s clearfix">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		),
		array(
			'name' => __( 'Home How to Activist', 'tikkun' ),
			'id' => 'home-activist',
			'description' => __( 'This area should be filled with one widget.', 'tikkun' ),
			'before_widget' => '<aside id="%1$s" class="%2$s clearfix">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		),
		array(
			'name' => __( 'Home Ask the Rabbi', 'tikkun' ),
			'id' => 'home-ask-the-rabbi',
			'description' => __( 'This area should be filled with one Largo Recent Posts widget.', 'tikkun' ),
			'before_widget' => '<aside id="%1$s" class="%2$s clearfix span4">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		),
		array(
			'name' => __( 'Home Tikkun Institute', 'tikkun' ),
			'id' => 'home-tikkun-institute',
			'description' => __( 'This area should be filled with one Largo Recent Posts widget.', 'tikkun' ),
			'before_widget' => '<aside id="%1$s" class="%2$s clearfix">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		),
		array(
			'name' => __( 'Home Support', 'tikkun' ),
			'id' => 'home-support',
			'description' => __( 'This area should be filled with one Largo Recent Posts widget.', 'tikkun' ),
			'before_widget' => '<aside id="%1$s" class="%2$s clearfix">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		),
		array(
			'name' => __( 'Home Donate', 'tikkun' ),
			'id' => 'home-donate',
			'description' => __( 'This area should be filled with one Largo Recent Posts widget.', 'tikkun' ),
			'before_widget' => '<aside id="%1$s" class="%2$s clearfix grid_box">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		),
		array(
			'name' => __( 'Home Donor Quotes', 'tikkun' ),
			'id' => 'home-donor-quotes',
			'description' => __( 'This area should be filled with two Largo Recent Posts widget.', 'tikkun' ),
			'before_widget' => '<aside id="%1$s" class="%2$s clearfix span4">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		),
	);

	foreach ( $sidebars as $sidebar ) {
		register_sidebar( $sidebar );
	}
}
add_action( 'widgets_init', 'tikkun_add_homepage_widget_areas' );
