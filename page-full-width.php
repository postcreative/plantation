<?php
/**
 * Template Name: Full width
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div id="content-container">
		<div class="content-sep"></div>
	<h1><?php the_title(); ?></h1>				

<?php the_content(); ?>

<?php endwhile; ?>
		

</div><!-- /content-container -->
<?php get_footer(); ?>