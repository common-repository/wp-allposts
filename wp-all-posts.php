<?php
/*
Plugin Name: WP AllPosts
Description: WP AllPosts plugin
Version: 1.0
Author: Seitan
License: GPL
*/


function dump_posts( $atts )
{
    extract( shortcode_atts( array(
	    'category' => '1',
	    'orderby' => 'post_date',
	    'order' =>'DESC'
	    ), $atts ) );
	$args = array( 'numberposts' => -1,
		      'post_status'     => 'publish',
		      'category' => $category,
		      'orderby' =>$orderby,
		      'order'=> $order  );
	$myposts = get_posts($args);
	global $post;
	foreach( $myposts as $post ) :	setup_postdata($post);
	echo '<li><a href="';
	the_permalink();
	echo '">';
	the_title();
	echo "</a></li>";
		endforeach;
}
	
add_shortcode( 'wp-all-posts', 'dump_posts' );

?>
