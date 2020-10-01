<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RCTLE_Theme
 */

get_header();
?>

	<main id="primary" class="container" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

    	<header class="page-header">
    		<h1><?php the_title(); ?></h1>
			<h4>Posted on <?php the_time('F jS, Y') ?></h4>
		</header>

		<div class="row">
			<div class="col-md-8 order-md-1">
				<section class="page-section">
				<?php 
					//Display the content
					the_content(__('(more...)')); 
				?>
				</section>
			</div>

		<?php endwhile; // End of the loop. ?>

			<div class="col-md-4 order-md-2 mb-4">
				<?php get_sidebar(); ?>
			</div>
		</div>

	</main><!-- #main -->

<?php get_footer(); ?>
