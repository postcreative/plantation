<?php
/*
 * Template Name: strand senior and intergen
 * Description: A Page Template for specific strand
 */
?>
<?php get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?><?php echo $post->post_name; ?>
	
		<h2><?php the_title(); ?></h2>
		<div class="video">
			<a href="video.html">
			<div class="project-image">
				<?php
					//get sttrand thumbnail
					if(has_post_thumbnail()){
						the_post_thumbnail('intro-620-340');
					} else {
						//???
					}
				?>
			</div>
			</a>
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
				'term' => 'seniors-and-intergen'/*,
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
					<?php the_excerpt(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php comments_template( '', true ); ?>
				</li>
		<?php endwhile; // end of the loop. ?>
	</ol>
<?php get_footer(); ?>



