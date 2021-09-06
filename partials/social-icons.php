<?php
/*
 * For single post and pages
 *
 * @package Largo
 */
?>
<aside class="widget sidebar-social">
	<?php 
		echo '<a href="' . esc_url( of_get_option( 'facebook_link' ) ) . '" title="facebook"><img src="' . get_stylesheet_directory_uri() . '/img/social-icons/facebook.svg" alt="Facebook">' . '</a>';
	 	echo '<a href="' . esc_url( of_get_option( 'twitter_link' ) ) . '" title="twitter"><img src="' . get_stylesheet_directory_uri() . '/img/social-icons/twitter.svg" alt="Twitter">' . '</a>';
	  	echo '<a href="' . esc_url( of_get_option( 'instagram_link' ) ) . '" title="instagram"><img src="' . get_stylesheet_directory_uri() . '/img/social-icons/instagram.svg" alt="Instagram">' . '</a>';
	?>
</aside>