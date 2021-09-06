<?php
/**
 * This file contains tikkun functions related to social media buttons on posts.
 */


/**
 * Outputs facebook, twitter and print utility links on article pages
 *
 * The Twitter 'via' attribute output is set in the following order
 *
 * - The single coauthor's twitter handle, if it is set
 * - The site's twitter handle, if there are multiple coauthors and a site twitter handle
 * - The single user's twitter handle, if it is set
 * - The site's twitter handle, if it is set and if there is a custom byline
 * - The site's twitter handle, if it is set
 * - No 'via' attribute if no twitter handles are set or if there are multiple coauthors but no site twitter handle
 *
 * @param $echo bool echo the string or return it (default: echo)
 * @return string social icon area markup as formatted html
 * @since 0.3
 * @todo maybe let people re-arrange the order of the links or have more control over how they appear
 * @link https://github.com/INN/Largo/issues/1088
 */
if ( ! function_exists( 'tikkun_post_social_links' ) ) {
	function tikkun_post_social_links( $echo = true ) {
			if ( !of_get_option( 'single_social_icons' ) == false ) {
				largo_post_social_links();
			}
	}
}

/**
 * New floating social buttons
 *
 * Only displayed if the floating share icons option is checked.
 * Formerly only displayed if the post template was the single-column template.
 *
 * @since 0.5.4
 * @link https://github.com/INN/Largo/issues/961
 * @link http://jira.inn.org/browse/VO-10
 * @see largo_floating_social_button_width_json
 */
if ( ! function_exists( 'largo_floating_social_buttons' ) ) {
	function largo_floating_social_buttons() {
		if ( is_single() && of_get_option('single_floating_social_icons', '1') == '1' ) {
			echo '<script type="text/template" id="tmpl-floating-social-buttons">';
			largo_post_social_links();
			echo '</script>';
		}
	}
}
add_action('wp_footer', 'largo_floating_social_buttons');

/**
 * Responsive viewport information for the floating social buttons, in the form of JSON in a script tag, and the relevant javascript.
 *
 * @since 0.5.4
 * @see largo_floating_social_buttons
 * @see largo_floating_social_button_js
 */
if ( ! function_exists('largo_floating_social_button_width_json') ) {
	function largo_floating_social_button_width_json() {
		if ( is_single() && of_get_option('single_floating_social_icons', '1') == '1' ) {
			$template = get_post_template(null);

			if ( is_null( $template ) )
				$template = of_get_option( 'single_template' );

			$is_single_column = (bool) strstr( $template, 'single-one-column' ) || $template == 'normal' || is_null( $template );

			if ( $is_single_column ) {
				$config = array(
					'min' => '980',
					'max' => '9999',
				);
			} else {
				$config = array(
					'min' => '1400',
					'max' => '9999',
				);
			}

			$config = apply_filters( 'largo_floating_social_button_width_json', $config );
			?>
			<script type="text/javascript" id="floating-social-buttons-width-json">
				window.floating_social_buttons_width = <?php echo json_encode( $config ); ?>
			</script>
			<?php
		}
	}
}
add_action('wp_footer', 'largo_floating_social_button_width_json');

/**
 * Enqueue floating social button javascript
 *
 * @since 0.5.4
 * @see largo_floating_social_buttons
 * @see largo_floating_social_button_width_json
 * @global LARGO_DEBUG
 */
if ( ! function_exists('largo_floating_social_button_js') ) {
	function largo_floating_social_button_js() {
		if ( is_single() && of_get_option('single_floating_social_icons', '1') == '1' ) {
			?>
			<script type="text/javascript" src="<?php
				$suffix = (LARGO_DEBUG)? '' : '.min';
				$version = largo_version();
				echo get_template_directory_uri() . '/js/floating-social-buttons' . $suffix . '.js?ver=' . $version;
			?>" async></script>
			<?php
		}
	}
}
add_action('wp_footer', 'largo_floating_social_button_js');
