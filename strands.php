<?php
/*
 * Template Name: strands
 * Description: A Page Template for strands
 */
?>
<?php get_header(); ?>
	<div class="content-sep"></div>
	<?php while ( have_posts() ) : the_post(); ?>
	
		<h1><?php the_title(); ?></h1>
		<div class="video">
		
			<div class="project-image">
				<?php
					//get strand thumbnail
					if(has_post_thumbnail()){
						the_post_thumbnail('intro-620-340');
					} else {
						//???
					}
				?>
			</div>
	
			<div class="project-desc">
				<?php the_content(); ?>
			</div>
		</div>

	<?php endwhile; // end of the loop. ?>

	<ol class="films">
		<?php 

			$wp_query = new WP_Query(array(
				'post_type' => 'project',
				'taxonomy' => 'strand',
				'term' => $post->post_name/*,
				'paged' => $paged,
				'posts_per_page' => $post_per_page,
				'order' => 'ASC'*/
			));

			while ($wp_query->have_posts()) : $wp_query->the_post();

				//get film thumbnail
				if(has_post_thumbnail()){
					$bg_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $size = 'preview');
					$bg_image = 'background: url(' . $bg_image[0] . ') no-repeat 0 0;';
				} else {
					$bg_image = '';
				}
		?>
				<li>
					<?php the_title('<h2 class="entry-title"><a style="' . $bg_image . '" href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a></h2>'); ?>
					<span class="label blue"><?php
						$status = get_the_terms( get_the_ID(), 'status');
						echo ($status && !is_wp_error( $status )) ? array_shift($status)->name : '';
					?></span>
					<?php the_excerpt(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php comments_template( '', true ); ?>
				</li>
		<?php endwhile; // end of the loop. ?>
	</ol>
<?php get_footer(); ?>



