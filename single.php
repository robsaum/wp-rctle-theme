<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package RCTLE_Theme
 */

get_header();
?>

	<main id="primary" class="container" role="main">

		<?php
		while ( have_posts() ) :
			the_post();
		?>
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



		<!-- Need to hide prev/next if at end 
			<h2>Page Navigation</h2>
			<ul class="nav">
			<?php
				// echo '<li class="nav-item">';
				// echo previous_post_link();
				// echo '</li>';
				// echo '<li class="nav-item">';
				// if ( get_next_post_link() ) : echo next_post_link();  endif;
				// echo '</li>';			
			?>
			</ul>
		-->

		<?php endwhile; // End of the loop. ?>

			<div class="col-md-4 order-md-2 mb-4">
				<?php get_sidebar(); ?>
			</div>



	</main><!-- #main -->

<?php
get_footer();
