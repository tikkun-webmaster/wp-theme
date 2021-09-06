<?php

// Author name
if ( is_author() ) {
	echo '<h1 class="fn n">' . $author_obj->display_name . '</h1>';
} else {
	printf( __( '<h3 class="widgettitle">About <span class="fn n"><a class="url" href="%1$s" rel="author" title="See all posts by %2$s">%2$s</a></span></h3>', 'largo' ),
		get_author_posts_url( $author_obj->ID, $author_obj->user_nicename ),
		esc_attr( $author_obj->display_name )
	);
}

// Avatar
if ( largo_has_avatar( $author_obj->user_email ) ) {
	echo '<div class="photo">' . get_avatar( $author_obj->ID, 96, '', $author_obj->display_name ) . '</div>';
} elseif ( $author_obj->type == 'guest-author' && get_the_post_thumbnail( $author_obj->ID ) ) {
	$photo = get_the_post_thumbnail( $author_obj->ID, array( 96,96 ) );
	$photo = str_replace( 'attachment-96x96 wp-post-image', 'avatar avatar-96 photo', $photo );
	echo '<div class="photo">' . $photo . '</div>';
}

// Job!
$show_job_titles = of_get_option('show_job_titles');
if ( $job = $author_obj->job_title && $show_job_titles ) {
	echo '<p class="job-title">' . esc_attr( $author_obj->job_title ) . '</p>';
}
// Description
if ( $author_obj->description ) {
	echo '<p>' . $author_obj->description  . '</p>';
}
