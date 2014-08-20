<?php

if (!isset($content_width))
    $content_width = 620;

/** Tell WordPress to run wpbootstrap_setup() when the 'after_setup_theme' hook is run. */
add_action('after_setup_theme', 'wpbootstrap_setup');

if (!function_exists('wpbootstrap_setup')):

    function wpbootstrap_setup() {

        // This theme uses post thumbnails
        add_theme_support('post-thumbnails');

        // Add default posts and comments RSS feed links to head
        add_theme_support('automatic-feed-links');

        // Add support for custom backgrounds
        $args = array(
            'default-color' => 'fffff',
            'wp-head-callback' => '_custom_background_cb'
        );
        add_theme_support('custom-background', $args);

        // Make theme available for translation
        // Translations can be filed in the /languages/ directory
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => __('Primary', 'wpbootstrap'),
        ));
    }

endif;

if ( ! function_exists( 'wpbootstrap_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own wpbootstrap_posted_on to override in a child theme
 *
 */
function  wpbootstrap_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'wpboostrap' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'wpbootstrap' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;



      /*
This function shows / hides Metaboxes based on the Template chosen by the user.
*/
add_action('admin_enqueue_scripts', 'my_admin_script');
function my_admin_script()
{
 // The below stmnt means that we need jQuery (dependency) for this Script.
    wp_enqueue_script('my-admin', get_bloginfo('template_url').'/js/events.js', array('jquery'));
}
// Override the MetaBox.php File for the MetaBox Plugin.
include 'metabox.php';

/* for get the X words from perticuler string */
function excerpt_read_more_link($output) {
 global $post;
 return $output . '<a href="'. get_permalink($post->ID) . '"> Read More...</a>';
}
add_filter('the_excerpt', 'excerpt_read_more_link');

/* This is to STRIP Images from the Cotnent Section. This is done for NEWS Section.*/
add_filter('the_content', 'strip_images',2);

function strip_images($content){
   return preg_replace('/<img[^>]+./','',$content);
}
?>