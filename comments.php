<?php
/**
 * The template for displaying Comments.
 
 	Taken from Net tuts tutorial http://net.tutsplus.com/tutorials/wordpress/unraveling-the-secrets-of-wordpress-commentsphp-file/
 */

?>
<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>  	
	<?php die('You can not access this page directly!'); ?>  
<?php endif; ?>

<?php if(!empty($post->post_password)) : ?>
  	<?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
		<p>This post is password protected. Enter the password to view comments.</p>
  	<?php endif; ?>
<?php endif; ?>

<?php if($comments) : ?>
  	<ol class="blog-post">
    	<?php foreach($comments as $comment) : ?>
  		<li id="comment-<?php comment_ID(); ?>">
  			<?php if ($comment->comment_approved == '0') : ?>
  				
  				<p>Your comment is awaiting approval</p>
  			<?php endif; ?>
  			<span class="alignright"><?php echo get_avatar($author_email, $size, $default_avatar ); ?></span><?php comment_text(); ?>
  			<p class="meta"><?php comment_type(); ?> by <?php comment_author_link(); ?> on <?php comment_date(); ?> at <?php comment_time(); ?> - <?php edit_comment_link($link_text, $before_link, $after_link); ?></p>
  			
  		</li>
		<?php endforeach; ?>
	</ol>

<?php endif; ?>
<section class="blog-post">
<?php if(comments_open()) : ?>
		<?php comment_form(); ?> 

<?php else : ?>
	<p>The comments are closed.</p>
<?php endif; ?>
</section>