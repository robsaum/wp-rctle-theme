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

 ?>