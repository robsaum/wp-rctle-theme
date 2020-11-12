<?php

remove_action('wp_head', 'rsd_link'); //removes EditURI/RSD (Really Simple Discovery) link.
remove_action('wp_head', 'wlwmanifest_link'); //removes wlwmanifest (Windows Live Writer) link.
remove_action('wp_head', 'wp_generator'); //removes meta name generator.
remove_action('wp_head', 'wp_shortlink_wp_head'); //removes shortlink.
remove_action( 'wp_head', 'feed_links', 2 ); //removes feed links.
remove_action('wp_head', 'feed_links_extra', 3 );  //removes comments feed. 

/*Removes prev and next links*/
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');



function register_my_menus() {
  register_nav_menus( array(
    	'header-menu' => __( 'Header Menu', 'my-custom-theme' ),
		)
	);
 }

 add_action( 'init', 'register_my_menus' );


function my_custom_theme_sidebar() {
    register_sidebar( array(
        'name' => __( 'Primary Sidebar', 'my-custom-theme' ),
        'id'   => 'sidebar-1',
    ) );
}
add_action( 'widgets_init', 'my_custom_theme_sidebar' );


function filter_single_post_pagination($output, $format, $link, $post){
    $title = '<i class="fas fa-arrow-left"></i>&nbsp;&nbsp;' . get_the_title($post);
    $url   = get_permalink($post->ID);
    $class = 'nav-link btn btn-secondary btn-lg text-limit';
    $rel   = 'prev';
 
    if('next_post_link' === current_filter()){
        $class = 'nav-link btn btn-secondary btn-lg text-limit';
        $rel   = 'next';
        $title = get_the_title($post) . '&nbsp;&nbsp;<i class="fas fa-arrow-right"></i>';
    }
    return "<a href='$url' rel='$rel' class='$class'>$title</a>";
}
add_filter( 'previous_post_link', 'filter_single_post_pagination', 10, 4);
add_filter( 'next_post_link', 'filter_single_post_pagination', 10, 4);


function hook_nocache() {
    ?>
  <meta http-equiv="cache-control" content="max-age=0" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="0" />
  <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
  <meta http-equiv="pragma" content="no-cache" />
    <?php
}
add_action('wp_head', 'hook_nocache');



// Add Google Analytics to header
function rctle_google_analytics() { 
    ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KQ2C73M4MQ"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-KQ2C73M4MQ');
    </script>
    <?php
}      
add_action( 'wp_head', 'rctle_google_analytics', 10 );

add_theme_support( 'align-wide' );    

// Enable post thumbnails
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 50, 50);
// Image size for single posts
// add_image_size( 'single-post-thumbnail', 590, 180 );

function rctle_register_query_vars( $vars ) {
    $vars[] = 'author';
    $vars[] = 'editor';
    return $vars;
}
add_filter( 'query_vars', 'rctle_register_query_vars' );

// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
       global $post;
  return '...<br><a class="btn btn-primary" role="button" href="'. get_permalink($post->ID) . '"> Read More...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


function add_taxonomies_to_pages() {
 register_taxonomy_for_object_type( 'post_tag', 'page' );
 register_taxonomy_for_object_type( 'category', 'page' );
 }
add_action( 'init', 'add_taxonomies_to_pages' );
 if ( ! is_admin() ) {
 add_action( 'pre_get_posts', 'category_and_tag_archives' );
 
 }
function category_and_tag_archives( $wp_query ) {
$my_post_array = array('post','page');
 
 if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )
 $wp_query->set( 'post_type', $my_post_array );
 
 if ( $wp_query->get( 'tag' ) )
 $wp_query->set( 'post_type', $my_post_array );
}

?>