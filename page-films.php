<?php
/**
 * Template Name: Films Page
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?>
<?php get_header(); ?>
	<div class="content-sep"></div>

	<h1>Films</h1>

	<?php

		$wp_query = new WP_Query(array(
			'post_type' => 'film',
			'taxonomy' => 'feature',
			'term' => 'yes'/*,
			'paged' => $paged,
			'posts_per_page' => $post_per_page,
			'order' => 'ASC'*/
		));

		while ($wp_query->have_posts()) : $wp_query->the_post();
	?>
		<div class="video">

			<div class="video-picture">
				<?php
					if(has_post_thumbnail()){
						the_post_thumbnail('intro-620-340');
					} else {
						//$bg_image = '';
					}
				?>
				<div class="video-text">
				</div>
			</div>
			
			<div class="video-desc">
				<h2><?php the_title(); ?></h2>
				<?php the_excerpt(); ?>
				<?php
					echo '<div class="cat"><a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">View feature film</a></div>';
				?>
			</div>
		</div>
	<?php endwhile; ?>


	<ol class="films">
		<?php query_posts( 'post_type=film'); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php
				//get film thumbnail
				if(has_post_thumbnail()){
					$bg_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $size = 'preview');	
				} else {
					//418 = missing-film.jpg image
					$bg_image = wp_get_attachment_image_src(418, $size = 'preview');
				}

				$bg_image = 'background: url(' . $bg_image[0] . ') no-repeat 0 0;';
			?>

			<li style="<?php echo $bg_image; ?>">
				<?php the_title('<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a></h2>'); ?>
				<span class="label green"><?php
					$film_category = get_the_terms( get_the_ID(), 'film-category');
					echo ($film_category && !is_wp_error( $film_category )) ? array_shift($film_category)->name : '';
				?></span>
								
				<?php the_excerpt(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			</li>
		<?php endwhile; // end of the loop. ?>

	</ol>
<?php get_footer(); ?>