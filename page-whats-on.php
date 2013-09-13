<?php
/**
 * Template Name: What's on
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?>
<?php get_header(); ?>
<div id="content-container">
		<div class="content-sep"></div>
<h1>What's On</h1>
<div id="post-container">


<article class="blog-post">
<h2>This weeks schedule</h2>
<?php echo do_shortcode("[wcs]"); ?>
</article>

<?php if ( have_posts() ): ?>
<ol class="events">
		<?php query_posts( 'post_type=event'); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<li>
		<article class="blog-post">
			<h2><?php the_title(); ?><span class="label red"><?php  echo types_render_field('event_type', array('raw' => true)); ?></span></h2>
			
			<div class="event-details">
			<img src="http://79.170.44.155/plantation.org.uk/wp-content/uploads/2013/05/location.jpg" alt="location" width="18" height="24" class="alignnone size-full wp-image-383" /><span><?php  echo types_render_field('event_location', array('raw' => true)); ?></span>
						
			 <img src="http://79.170.44.155/plantation.org.uk/wp-content/uploads/2013/05/date.jpg" alt="date" width="25" height="25" class="alignnone size-large wp-image-382" /><span> <?php  echo types_render_field('date', array('raw' => true)); ?> </span>
			 
			 <img src="http://79.170.44.155/plantation.org.uk/wp-content/uploads/2013/05/time.jpg" alt="time" width="25" height="25" class="alignnone size-full wp-image-381" /> <span><?php  echo types_render_field('time', array('raw' => true)); ?></span>
			 

			</div>
				<?php the_content(); ?>
		</article>
	</li>
<?php endwhile; ?>
</ol>

<?php else: ?>
<h2>No posts to display</h2>	
<?php endif; ?>

</div>
<div id="sidebar">
<?php dynamic_sidebar('events'); ?>
</div>
</div>

<?php get_footer(); ?>	