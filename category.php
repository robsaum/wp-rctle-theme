<?php
/**
 * The template for displaying category pages
 *
 * @package RCTLE_Theme
 */

get_header();
?>

<main id="primary" class="container" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title text-center">', '</h1>' );
				the_archive_description( '<div class="archive-description" style="font-weight:600; font-size:120%; background:#eee; padding:10px; border: 1px solid #000; margin-bottom:20px; width:80%; margin-left: auto;margin-right: auto;">', '</div>' );
				?>
			</header>
			
			<section class="category-section">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post(); ?>


				<div class="card" style="">
				  <div class="card-body">
				    <h2 class="card-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				    <small class="card-subtitle mb-2 text-muted"><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>
				    <p class="card-text"><?php the_excerpt() ?></p>
				  </div>
				</div>



			<?php 
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

										the_posts_navigation( 
											array(
										    	'mid_size'  => 1, // 1 = no dropdowns, 2 = with dropdowns.
										    	'prev_text' => __( '<i class="fas fa-arrow-circle-left"></i>  Back', 'textdomain' ),
										    	'next_text' => __( 'Onward  <i class="fas fa-arrow-circle-right"></i>', 'textdomain' ),
										    	'class'     => '',
										    	'screen_reader_text' => __( 'Post navigation' ),
												'aria_label'         => __( 'Posts' ),
										) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</section>

	</main>

<?php

//get_sidebar();

get_footer();
