<?php
/**
 * The Template for displaying all single posts
 */
?>

<?php get_header(); ?>

<?php if ( have_posts() ): ?>

<div id="content-container">
		<div class="content-sep"></div>
		<h1><?php the_title(); ?></h1>
		<div id="post-container">

	<?php while ( have_posts() ) : the_post(); ?>
	
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
				<p><span class="label purple"><?php
									$category = get_the_terms( get_the_ID(), 'category');
									echo ($category && !is_wp_error( $category )) ? array_shift($category)->name : '';
								?></span></p>
				<?php the_content(); ?>
				<p>By <?php echo get_the_author() ; ?> <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> 
				
				
				
			</article>
			

	<?php endwhile; ?>
<?php else: ?>
<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
<?php endif; ?>

<?php comments_template( '', true ); ?>	
</div>		
		
		
<div id="sidebar">
<?php dynamic_sidebar('blog'); ?>

</div>
</div><!-- /content-container -->
<?php get_footer(); ?>
