<?php
/**
 * The template for displaying Category Archive pages
 *
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ): ?>

<div id="content-container">
		<div class="content-sep"></div>
		<div id="post-container">
<h1><?php echo single_cat_title( '', false ); ?></h1>
	<ol>
	<?php while ( have_posts() ) : the_post(); ?>
		<li>
			<article class="blog-post">
				<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
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


