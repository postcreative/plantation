<?php
/**
 * The Template for displaying all single film posts
 */
?>
<?php get_header(); ?>

<div id="content-container">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<article>
			<div class="content-sep"></div>

			<h1><?php the_title(); ?></h1>	
			<div class="video-embed">
				<?php echo get_video_embed_code('vimeo', types_render_field('video_url', array('raw' => true)), 940, 528); ?>
			</div>

			<div class="content-sep"></div>

			<div class="info-container">
				<div class="video-information">
					<div class="video-info">
						<?php the_content(); ?>	
					</div><!-- /video-info -->
					<div class="title-info">
						<dl>
							<dt>Director:</dt>
							<dd><?php  echo types_render_field('directors_name', array('raw' => true)); ?></dd>
							<dt>Running Time:</dt>
							<dd><?php  echo types_render_field('running_time', array('raw' => true)); ?></dd>
							<dt>Production Company:</dt>
							<dd><?php  echo types_render_field('production_company', array('raw' => true)); ?></dd>
							<dt>Category:</dt>
							<dd>
								<?php
									$film_category = get_the_terms( get_the_ID(), 'film-category');
									echo ($film_category && !is_wp_error( $film_category )) ? array_shift($film_category)->name : '';
								?>
							</dd>
							<dt>Rating:</dt>
							<dd><?php echo get_video_rating(types_render_field('rating', array('raw' => true))); ?></dd>
							<dt>Year:</dt>
							<dd><?php echo types_render_field('year', array('raw' => true)) ?></dd>
						</dl>
					</div>
				</div><!-- /title-info -->

				
					<!--
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, aliquam, laudantium, ea vel dolorem doloribus at numquam totam laboriosam dolores repudiandae ipsa suscipit pariatur. Eaque, tenetur dolorum laudantium voluptas saepe!</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, enim, voluptas, animi nesciunt rerum quisquam recusandae earum alias amet voluptates error laudantium aut veniam quod ipsum nulla atque consequuntur suscipit.</p>
					<a href="#"><div class="project-btn films">Making of video</div></a>
				-->


				<div class="project-info">
					<?php
						$current_post_id = $post->ID;

						$related = new WP_Query( array(
						  'connected_type' => 'project_films',
						  'connected_items' => $post,
						  'nopaging' => true
						) );


						if ( $related->have_posts() ) :

							while ( $related->have_posts() ) : $related->the_post();
								the_title('<h2>PROJECT: ','</h2>');
								the_content();
								echo '<a href="' . get_permalink() . '"><div class="project-btn films" title="' . the_title_attribute('echo=0') . '">Making of video</div></a>';

								
								//related 

								//our current nested $post  
								$related_post = $post;


								//nested loop, we are currently looping through wine-vintages. Now loop through the wine associated with this vintage and get it's region
								$related2 = new WP_Query( array(
								  'connected_type' => 'project_films',
								  'connected_items' => get_post(get_the_ID()),
								  'nopaging' => true,
						  		  'post__not_in' => array($current_post_id),
								) );

								echo '<h3>RELATED FILMS</h3>';
													
								if ( $related2->have_posts() ) : 
									
									//wines
									while ( $related2->have_posts() ) : $related2->the_post();
										the_title('<a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a><br />');
										//$region = get_the_terms( get_the_ID(), 'region');
										//$region = ($region && !is_wp_error( $region )) ? array_shift($region)->name : '';
									endwhile;
								else:
									echo '<p>Sorry, there are currently no related films.</p>';
									
								endif;
								
								//reset our $post after the nested loop
								$post = $related_post;

								//$critic = get_the_terms(get_the_ID(), 'critic');
								//$critic = ($critic && !is_wp_error( $critic )) ? array_shift($critic)->name : '...';


								//echo '<div style="clear: both;"><pre>C1: ' . print_r(get_the_terms(get_the_ID(), 'Critic'),1) . '</pre>';
								//echo '<pre>C2: ' . print_r(get_the_terms(get_the_ID(), 'critic'),1) . '</pre></div>';
								

							endwhile;
							wp_reset_postdata();
						endif
					?>
				</div><!-- /project-info -->




			</div><!-- /info-container -->
				
			<?php //comments_template( '', true ); ?>
		</article>
	<?php endwhile; ?>
</div><!-- /content-container -->
<?php get_footer(); ?>



