<?php
/**
 * The template for displaying tags
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RCTLE_Theme
*/

get_header();
?>

<main id="primary" class="container" role="main">
            
    <?php if ( have_posts() ) : ?>

	<header class="page-header">
		<?php the_archive_title( '<h1 class="page-title text-center">', '</h1>' );	?>
	</header><!-- .page-header -->

	<div class="row">
		<div class="col-md-8 order-md-1">
			<section class="page-section">

	        <?php
                // Start the Loop.
                while ( have_posts() ) : the_post(); ?>
                	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                	<?php
                	// Display the excerpt unless empty, then display the first 40 words 
					if ( has_excerpt() ) { the_excerpt(); } else { echo wp_trim_words( get_the_content(), 40, '...' ); } 
            	endwhile;

            	the_posts_navigation( 
					array(
				    	'mid_size'  => 1, // 1 = no dropdowns, 2 = with dropdowns.
				    	'prev_text' => __( '<i class="fas fa-arrow-circle-left"></i>  Older Posts', 'textdomain' ),
				    	'next_text' => __( 'Newer Posts  <i class="fas fa-arrow-circle-right"></i>', 'textdomain' ),
				    	'class'     => '',
				    	'screen_reader_text' => __( 'Post navigation' ),
						'aria_label'         => __( 'Posts' ),
				) );
        
        		else :
         			echo '<p>No posts found.</p>';
                endif;
            ?>
			</section><!-- #primary -->
		</div>

		<div class="col-md-4 order-md-2 mb-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>

<?php

get_footer();