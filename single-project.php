<?php
/**
 * The Template for displaying all single project posts
 */
?>
<?php get_header(); ?>
<div id="content-container">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<article>
			<div class="content-sep"></div>

			<h1><?php the_title(); ?></h1>
			<?php
				//get film thumbnail
				if(has_post_thumbnail()){
					the_post_thumbnail('intro-940-340');
					//$bg_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $size = 'preview');

					//$bg_image = 'background: url(' . $bg_image[0] . ') no-repeat 0 0;';
				} else {
					//$bg_image = '';
				}
			?>

			<div class="info-container">
				<div class="video-information">
					<div class="video-info">
						<?php the_content(); ?>	
						<?php
							$related = new WP_Query( array(
							  'connected_type' => 'project_films',
							  'connected_items' => $post,
							  'nopaging' => true
							) );

							echo '<h3 class="rel-films">RELATED FILMS</h3>';

							if ( $related->have_posts() ) :
								while ( $related->have_posts() ) : $related->the_post();
									the_title('<a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a><br />');
								endwhile;
								wp_reset_postdata();
							else:
								echo '<p>Sorry, there are currently no related films.</p>';
							endif
						
						?>
					</div><!-- /video-info -->
					
				</div><!-- /video-information -->


				<div class="project-info">
					<?php
						$related = new WP_Query( array(
						  'connected_type' => 'project_posts',
						  'connected_items' => $post,
						  'nopaging' => true
						) );

						echo '<h2>RELATED POSTS</h2>';

						if ( $related->have_posts() ) :

							while ( $related->have_posts() ) : $related->the_post();
								the_title('<a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a><br />');
							endwhile;
							wp_reset_postdata();
						else:
							echo '<p>Sorry, there are currently no related posts.</p>';
						endif
					?>
				</div><!-- /project-info -->




			</div><!-- /info-container -->
				
			<?php // comments_template( '', true ); ?>
		</article>
	<?php endwhile; ?>
</div><!-- /content-container -->
<?php get_footer(); ?>



