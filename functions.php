<?php

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


require_once get_template_directory() . '/nav/class-wp-bootstrap-navwalker.php';





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


?>