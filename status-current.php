<?php
/*
 * Template Name: Current projects
 * Description: A Page Template for Current projects
 */
?>
<?php get_header(); ?>
	<div class="content-sep"></div>
	<h1><?php the_title(); ?></h1>
<ol class="films">
<?php
  query_posts( array( 'post_type' => 'project', 'taxonomy' => 'status', 'term' => 'current' ) );
  if ( have_posts() ) : while ( have_posts() ) : the_post();
?>


		<?php 
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
				</li>
		<?php endwhile; endif; wp_reset_query(); ?>
	</ol>
<?php get_footer(); ?>



