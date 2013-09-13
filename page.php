<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
<?php dynamic_sidebar('about'); ?>
</div>
</div><!-- /content-container -->
<?php get_footer(); ?>