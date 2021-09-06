<?php 
// Register Sidebar
function tikkun_rabbi_sidebar() {

	$args = array(
		'id'            => 'tikkun_rabbi_sidebar',
		'class'         => 'rabbi-sidebar',
		'name'          => __( 'Rabbi Lerner Page Sidebar', 'tikkun' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s rabbi-sidebar">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'tikkun_rabbi_sidebar', 99 );

function tikkun_rabbi_1() {

	$args = array(
		'id'            => 'tikkun_rabbi_1',
		'class'         => 'rabbi-1',
		'name'          => __( 'Rabbi Lerner Page Before Content', 'tikkun' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'tikkun_rabbi_1', 99 );

function tikkun_rabbi_2() {

	$args = array(
		'id'            => 'tikkun_rabbi_2',
		'class'         => 'rabbi-2',
		'name'          => __( 'Rabbi Lerner Page After Content', 'tikkun' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'tikkun_rabbi_2', 99 );

function tikkun_rabbi_books() {

	$args = array(
		'id'            => 'tikkun_rabbi_books',
		'class'         => 'rabbi-books',
		'name'          => __( 'Rabbi Lerner Page Books', 'tikkun' ),
		'before_widget' => '<div id="%1$s" class="widget span4 %2$s">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'tikkun_rabbi_books', 99 );



// ABOUT PAGE
function tikkun_about_posts() {
	$args = array(
		'id'            => 'tikkun_about_posts',
		'class'         => 'about_posts',
		'name'          => __( 'About Page Posts', 'tikkun' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );
}
add_action( 'widgets_init', 'tikkun_about_posts', 99 );

function tikkun_about_staff() {
	$args = array(
		'id'            => 'tikkun_about_staff',
		'class'         => 'about_staff',
		'name'          => __( 'About Page Staff', 'tikkun' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s span4">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );
}
add_action( 'widgets_init', 'tikkun_about_staff', 99 );

function tikkun_about_board() {
	$args = array(
		'id'            => 'tikkun_about_board',
		'class'         => 'about_staff',
		'name'          => __( 'About Page Board', 'tikkun' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s span4">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );
}
add_action( 'widgets_init', 'tikkun_about_board', 99 );




// ABOUT PAGE
function tikkun_magazine_embed() {
	$args = array(
		'id'            => 'tikkun_magazine_embed',
		'class'         => 'magazine_embed',
		'name'          => __( 'Magazine Embed', 'tikkun' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );
}
add_action( 'widgets_init', 'tikkun_magazine_embed', 99 );
function tikkun_magazine_twocolumn() {
	$args = array(
		'id'            => 'tikkun_magazine_twocolumn',
		'class'         => 'magazine_twocolumn',
		'name'          => __( 'Magazine Two-Column Zone', 'tikkun' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s span6">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );
}
add_action( 'widgets_init', 'tikkun_magazine_twocolumn', 99 );
function tikkun_magazine_forms() {
	$args = array(
		'id'            => 'tikkun_magazine_forms',
		'class'         => 'magazine_forms',
		'name'          => __( 'Magazine Forms', 'tikkun' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );
}
add_action( 'widgets_init', 'tikkun_magazine_forms', 99 );
function tikkun_magazine_artists() {
	$args = array(
		'id'            => 'tikkun_magazine_artists',
		'class'         => 'magazine_artists',
		'name'          => __( 'Magazine Artists', 'tikkun' ),
		'before_widget' => '<aside id="%1$s" class="%2$s clearfix grid_box">',
		'after_widget' => '</aside>'
	);
	register_sidebar( $args );
}
add_action( 'widgets_init', 'tikkun_magazine_artists', 99 );









?>