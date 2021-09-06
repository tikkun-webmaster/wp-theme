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
	    $post_id = get_the_ID();
	    
	    $tikkun_meta_box_facebook_url = get_post_meta($post_id, 'tikkun_meta_box_facebook_url', true);
	    $has_facebook_url = isset($tikkun_meta_box_facebook_url) && $tikkun_meta_box_facebook_url !== '';
	    
	    $tikkun_meta_box_twitter_url = get_post_meta($post_id, 'tikkun_meta_box_twitter_url', true);
	    $has_twitter_url = isset($tikkun_meta_box_twitter_url) && $tikkun_meta_box_twitter_url !== '';
	    
	    $tikkun_meta_box_linkedin_url = get_post_meta($post_id, 'tikkun_meta_box_linkedin_url', true);
	    $has_linkedin_url = isset($tikkun_meta_box_linkedin_url) && $tikkun_meta_box_linkedin_url !== '';
	    
	    if ($has_facebook_url || $has_twitter_url || $has_linkedin_url) {
            $output = '<div class="largo-follow post-social clearfix"><h2>Share on Social Media</h2>';
            
            if ($has_facebook_url) {
                $output .= '<span class="facebook"><a target="_blank" href="' . $tikkun_meta_box_facebook_url . '"><i class="icon-facebook"></i><span class="hidden-phone">Share</span></a></span>';
            }
            
            if ($has_twitter_url) { 
                $output .= '<span class="twitter"><a target="_blank" href="' . $tikkun_meta_box_twitter_url . '"><i class="icon-twitter"></i><span class="hidden-phone">Tweet</span></a></span>';
            }
            
            if ($has_linkedin_url) {
                $output .= '<span class="linkedin"><a target="_blank" href="' . $tikkun_meta_box_linkedin_url . '"><i class="icon-linkedin"></i><span class="hidden-phone">Share</span></a></span>';
            }
            
            $output .= '</div>';

	        echo($output);
	    }
	    
		else if ( !of_get_option( 'single_social_icons' ) == false ) {
				largo_post_social_links();
			}
	}
}
