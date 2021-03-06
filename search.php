<?php
/**
 * Search results page
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ): ?>
<h2>Search Results for '<?php echo get_search_query(); ?>'</h2>	
<div id="page-container">
	<div id="post-container">
		<ol class="searchResults">
		<?php while ( have_posts() ) : the_post(); ?>
			<li <?php echo post_class();?>>
				<article>
					<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<!--<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>-->
					<?php the_excerpt(); ?>
				</article>
			</li>
		<?php endwhile; ?>
		</ol>
		<?php else: ?>
		<h2>No results found for '<?php echo get_search_query(); ?>'</h2>
		<?php endif; ?>
	</div>
	<div id="sidebar">
	<?php dynamic_sidebar('search'); ?>
	</div>
</div>

<?php get_footer(); ?>