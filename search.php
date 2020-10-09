<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package RCTLE_Theme
 *
 */

get_header(); ?>

<main id="primary" class="container" role="main">
			<?php if ( have_posts() ) : ?>
		            <header class="page-header">
		            	<h1 class="search-title">
							<?php echo $wp_query->found_posts; ?> <?php _e( 'Search Results Found For', 'locale' ); ?>: "<?php the_search_query(); ?>"
						</h1>
		            </header><!-- .page-header -->
					
					<div class="row">
						<div class="col-md-8 order-md-1">
							<section class="page-section">
	     					
	     					<?php /* Start the Loop */
	            				while ( have_posts() ) : the_post(); ?>
	            					<?php // get_template_part( 'content', 'search' ); ?>
		            				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		            				<p class="search-post-excerpt"><?php the_excerpt(); ?></p>
	    	        				
	        	    			<?php endwhile; ?>
	        	    			<br>
	            					<?php the_posts_navigation(); ?>
								<br><br>
	            			</section>
	            		</div>
					
					 
			        <?php else : ?>		
			        	<header class="page-header">
		    				<h1 class="search-title">Nothing Found</h1>
						</header> 
						<div class="row">
							<div class="col-md-8 order-md-1">
								<section class="page-section">
			            			<?php //get_template_part( 'template-parts/content', 'none' ); ?>
										<p>Try searching for another term.</p>
									<?php get_search_form( true ); ?>
								</section>
							</div>
			        <?php endif; ?>

	            	<div class="col-md-4 order-md-2 mb-4">
						<?php get_sidebar(); ?>
					</div>

</main><!-- #main -->
<div class="clearboth"></div>

<?php // input_pagination(); ?>
<?php get_footer(); ?>