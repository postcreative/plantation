<?php
/**
 * The Template for displaying all single posts
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div id="content-container">
<article>

		<div class="content-sep"></div>
	<h2><?php the_title(); ?></h2>	
	<?php the_content(); ?>			

	<?php comments_template( '', true ); ?>

</article>
<?php endwhile; ?>
</div><!-- /content-container -->
<?php get_footer(); ?>
