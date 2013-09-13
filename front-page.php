<?php
/**
 * Template Name: Home
 * Description: The template for displaying the Home page.
 *
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div id="slider-container">
		<?php echo get_new_royalslider(1); ?>
	<div class="slider">
			<?php /*<div class="slider-header">
				<p>Lorem ipsum dolor sit amet</p>
			</div>
			<div class="slider-desc">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
			</div> */ ?>
		</div><!-- /slider -->
	<div class="slider-sep"></div>
	</div><!-- /slider-container -->
	<div id="content-container">
		<div class="content-sep"></div>
		<div class="video">
			<div class="video-embed">
				<?php echo get_video_embed_code('vimeo', types_render_field('video_link', array('raw' => true)), 620, 349); ?>			
			</div>
			<div class="video-desc">
				<h3>About Plantation Productions</h3>
				<?php the_content(); ?>
				<div class="cat home"><a href="<?php echo types_render_field('link-to-feature-page', array('raw' => true)) ?>">More about the feature film</a></div>
			</div>
		</div><!-- /video -->
		<div class="content-sep"></div>
		<div class="content-boxes">
			<a href="http://plantation.org.uk/films/">
			<div class="box first film">
				<h3>Films</h3>
				<p>Watch our online channel, featuring a selection of films from the Plantation catalogue and other community based independent filmmakers.  </p>
			</div></a>
			
			<a href="http://plantation.org.uk/projects/">
			<div class="box plant">
				<h3>Projects</h3>
				<p>Have a browse through our projects, past and present, and find out how YOU and your family can get involved...</p>
			</div></a>
			
			<a href="http://plantation.org.uk/whats-on/">
			<div class="box calendar">
				<h3>What's on</h3>
				<p>Events calendar and at-a-glance timetable of regular workshops.</p>
			</div></a>
			
			<a href="http://plantation.org.uk/blog/">
			<div class="box pencil last">
				<h3>From the blog</h3>
				<p>Updates on our projects and what we've been up to.</p>
			</div></a>
			
		</div>
	</div><!-- /content-container -->
<?php endwhile; ?>

<?php get_footer(); ?>