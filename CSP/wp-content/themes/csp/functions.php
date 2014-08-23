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

/*This function shows / hides Metaboxes based on the Template chosen by the user.*/
add_action('admin_enqueue_scripts', 'my_admin_script');
function my_admin_script()
{
 // The below stmnt means that we need jQuery (dependency) for this Script.
    wp_enqueue_script('my-admin', get_bloginfo('template_url').'/js/events.js', array('jquery'));
}
// Override the MetaBox.php File for the MetaBox Plugin.
include 'metabox.php';

/* This is to STRIP Images from the Cotnent Section. This is done for NEWS Section.*/
add_filter('the_content', 'strip_images',2);

function strip_images($content){
   return preg_replace('/<img[^>]+./','',$content);
}
?>