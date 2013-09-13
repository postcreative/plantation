<?php
/**
 * Template Name: Blog Page
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ): ?>

<div id="content-container">
		<div class="content-sep"></div>
<h1>Latest posts</h1>
<div id="post-container">
<ol>
<?php $the_query = new WP_Query( 'showposts=5' ); ?>
<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
		<li>
			<article class="blog-post">
				<?php
					//get film thumbnail
					if(has_post_thumbnail()){
						the_post_thumbnail('blog-581-520');
						//$bg_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $size = 'preview');

						//$bg_image = 'background: url(' . $bg_image[0] . ') no-repeat 0 0;';
					} else {
						//$bg_image = '';
					}
				?>
				<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<p><span class="label purple"><?php
									$category = get_the_terms( get_the_ID(), 'category');
									echo ($category && !is_wp_error( $category )) ? array_shift($category)->name : '';
								?></span> By <?php echo get_the_author() ; ?> <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
				<?php the_content(); ?>
			</article>
		</li>
	<?php endwhile; ?>
	</ol>
<?php else: ?>
<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
<?php endif; ?>
		</div>
<div id="sidebar">
<?php dynamic_sidebar('blog'); ?>
</div>
</div><!-- /content-container -->
<?php get_footer(); ?>