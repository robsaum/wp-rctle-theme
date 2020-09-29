<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title><?php wp_title(' | ', 'echo', 'right'); ?><?php bloginfo('name'); ?></title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3e56e0b7a1.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  </head>
  <body>
    <header>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!-- options: bg-light navbar-light justify-content-center -->
  <div class="container-xl">
      <!-- Brand -->
      <a href="/" class="navbar-brand d-flex align-items-center">
          <i class="fas fa-chalkboard-teacher">&nbsp;&nbsp;</i>
          <h1>Rothwell Center for Teaching & Learning Excellence</h1>
      </a>



    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <!-- Navbar links -->
    <?php 
      //Notes:  https://wp-bootstrap.github.io/wp-bootstrap-navwalker/
      //        https://wp-bootstrap.github.io/wp-bootstrap-navwalker/
      //        https://github.com/wp-bootstrap/wp-bootstrap-navwalker
      wp_nav_menu( array(
                  'theme_location'    => 'header-menu',
                  'depth'             => 2,
                  'container'         => 'div',
                  'container_class'   => 'collapse navbar-collapse',
                  'container_id'      => 'collapsibleNavbar',
                  'menu_class'        => 'navbar-nav mr-auto',
                  'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                  'walker'            => new WP_Bootstrap_Navwalker()
          ) );
    ?>

      <form class="form-inline my-2 my-md-0">
        <input class="form-control" type="text" placeholder="Search" aria-label="Search">
      </form>
  </div>
</nav>



</header>
