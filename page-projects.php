<?php
/**
 * Template Name: Projects
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div id="content-container">
		<div class="content-sep"></div>
	<h1><?php the_title(); ?></h1>				

		<div class="video">
		
			<div class="project-image">
				<?php
					//get strand thumbnail
					if(has_post_thumbnail()){
						the_post_thumbnail('intro-620-340');
					} else {
						//???
					}
				?>
			</div>
	
			<div class="project-desc">
				<?php the_content(); ?>
			</div>
		</div>

<?php endwhile; ?>

<!-- /project-container -->
<div class="projects">
<div class="projects-container">
<div class="project-box">
<div class="project-circle">
<a href="http://plantation.org.uk/projects/children-and-families/" class="project-pimg"><img alt="Projects" src="http://plantation.org.uk/wp-content/themes/plantation-productions/images/pchildren.png" /></a>
</div>
<a href="http://plantation.org.uk/projects/children-and-families/"><h3>Children + Families</h3></a>
</div>
<!-- /project-box -->
<div class="project-box">
<div class="project-circle">
<a href="http://plantation.org.uk/projects/young-people/" class="project-pimg"><img alt="Projects" src="http://plantation.org.uk/wp-content/themes/plantation-productions/images/pyoung.png" /></a>
</div>
<a href="http://plantation.org.uk/projects/young-people/"><h3>Young People</h3></a>
</div>
<!-- /project-box -->
<div class="project-box">
<div class="project-circle">
<a href="http://plantation.org.uk/projects/seniors-and-intergen/" class="project-pimg"><img alt="Projects" src="http://plantation.org.uk/wp-content/themes/plantation-productions/images/pold.png" /></a>
</div>
<a href="http://plantation.org.uk/projects/seniors-and-intergen/"><h3>Seniors + Intergen</h3></a>
</div>
<!-- /project-box -->
<div class="project-box">
<div class="project-circle">
<a href="http://plantation.org.uk/projects/arts-and-wellbeing/" class="project-pimg"><img alt="Projects" src="http://plantation.org.uk/wp-content/themes/plantation-productions/images/parts.png" /></a>
</div>
<a href="http://plantation.org.uk/projects/arts-and-wellbeing/"><h3>Arts + Wellbeing</h3></a>
</div>
<!-- /project-box -->
<div class="project-box">
<div class="project-circle">
<a href="http://plantation.org.uk/projects/artists-in-residence/" class="project-pimg"><img alt="Projects" src="http://plantation.org.uk/wp-content/themes/plantation-productions/images/presidence.png" /></a>
</div>
<a href="http://plantation.org.uk/projects/artists-in-residence/"><h3>Artists In Residence</h3></a>
</div>
<!-- /project-box -->
<div class="project-box">
<div class="project-circle">
<a href="http://plantation.org.uk/projects/crafts-programme/" class="project-pimg"><img alt="Projects" src="http://plantation.org.uk/wp-content/themes/plantation-productions/images/pcrafts.png" /></a>
</div>
<a href="http://plantation.org.uk/projects/crafts-programme/"><h3>Crafts programmes</h3></a>
</div>
<!-- /project-box -->
<div class="project-box">
<div class="project-circle">
<a href="http://plantation.org.uk/projects/skills-and-training/" class="project-pimg"><img alt="Projects" src="http://plantation.org.uk/wp-content/themes/plantation-productions/images/pskills.png" /></a>
</div>
<a href="http://plantation.org.uk/projects/skills-and-training/"><h3>Skills + Training</h3></a>
</div>
<!-- /project-box -->
<div class="project-box">
<div class="project-circle">
<a href="http://plantation.org.uk/projects/events-and-festivals/" class="project-pimg"><img alt="Projects" src="http://plantation.org.uk/wp-content/themes/plantation-productions/images/pevents.png" /></a>
</div>
<a href="http://plantation.org.uk/projects/events-and-festivals/"><h3>Events + Festivals</h3></a>
</div>
<!-- /project-box -->
<div class="project-box">
<div class="project-circle">
<a href="http://plantation.org.uk/projects/commissions/" class="project-pimg"><img alt="Projects" src="http://plantation.org.uk/wp-content/themes/plantation-productions/images/pcommissions.png" /></a>
</div>
<a href="http://plantation.org.uk/projects/commissions/"><h3>Commissions</h3>
</div></a>
<!-- /project-box -->

</div>
</div>		

</div><!-- /content-container -->
<?php get_footer(); ?>