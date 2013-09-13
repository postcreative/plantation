<?php
/**
 * Template Name: Contact page
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?>
<?php get_header(); ?>
<div id="content-container">
		<div class="content-sep"></div>	
		<h1><?php the_title(); ?></h1>	
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<div id="post-container">

<article class="blog-post">			

<?php the_content(); ?>
</article>
<?php endwhile; ?>
		</div>
<div id="sidebar">
<?php dynamic_sidebar('contact'); ?>
</div>
</div><!-- /content-container -->
<?php get_footer(); ?>