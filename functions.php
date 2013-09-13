<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================
	
	Required external files*/
	

	require_once( 'external/starkers-utilities.php' );

	/* ======================================================================================================================== 
	
	Theme specific settings */
	

	add_theme_support('post-thumbnails');
	
	function register_my_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
    }
    add_action( 'init', 'register_my_menu' );


	/* ======================================================================================================================== 
	
	Actions and Filters */
	


	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ================================================================================================
	/* =========================================================================================
	
Sidebars */


// http://codex.wordpress.org/Function_Reference/register_sidebar

function roots_register_sidebars() {
  $sidebars = array('Blog', 'About', 'Events', 'Contact', 'Search');

  foreach($sidebars as $sidebar) {
    register_sidebar(
      array(
        'id'            => 'roots-' . sanitize_title($sidebar),
        'name'          => __($sidebar, 'roots'),
        'description'   => __($sidebar, 'roots'),
        'before_widget' => '<article id="%1$s" class="widget %2$s"><div class="widget-inner">',
        'after_widget'  => '</div></article>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
      )
    );
  }
}

add_action('widgets_init', 'roots_register_sidebars');

	

	
/*======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function starkers_script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}	






function my_connection_types() {

	p2p_register_connection_type( array(
		'name' => 'project_films',
		'from' => 'project',
		'to' => 'film',
		'cardinality' => 'one-to-many'/*,
		'admin_box' => array(
			'show' => 'any',
			'context' => 'advanced'
		)*/
	));


	p2p_register_connection_type( array(
		'name' => 'project_posts',
		'from' => 'project',
		'to' => 'post',
		'cardinality' => 'one-to-many'/*,
		'admin_box' => array(
			'show' => 'any',
			'context' => 'advanced'
		)*/
	));

	/*
	p2p_register_connection_type( array(
		'name' => 'related_films',
		'from' => 'film',
		'to' => 'film',
		'cardinality' => 'one-to-one'
	));
	*/
}
add_action( 'p2p_init', 'my_connection_types' );


if ( function_exists( 'add_theme_support' ) ) {
	set_post_thumbnail_size( 300, 180, true ); // default Post Thumbnail dimensions   
}


if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'preview', 300, 180, true );
	add_image_size( 'intro-620-340', 620, 340, true );
	add_image_size( 'intro-940-340', 940, 340, true );
	add_image_size( 'blog-581-520', 581, 520, true );
}




/* sjs helper functions */
function oot($prefix, $value){
	if(!$value){
		$value = $prefix;
		$prefix = '';
	}
	echo '<pre>' . $prefix . print_r($value, 1) . '</pre>';
}


// get video embed code
function get_video_embed_code($type, $video_url, $width, $height){

	$embed_code = '';

	switch($type){
		case 'youtube':
			break;
		default: //vimeo

			//the copy vimeo video url format doesn't work with the embed code so we'll need to reformat it e.g.
			//supplied format: http://vimeo.com/66164296
			//required format: http://player.vimeo.com/video/66164296
			$video_url = str_replace('//', '//player.', $video_url);
			$video_url = str_replace('.com/', '.com/video/', $video_url);

			$embed_code =  '<iframe src="' . $video_url . '" width="' . $width . '" height="' . $height . '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
	}

	return $embed_code;
}


function get_video_rating($rating){

	switch($rating){
		case 1:
			$rating = 'U';
			break;
		case 2:
			$rating = 'PG';
			break;
		case 3:
			$rating = '12A';
			break;
		case 4:
			$rating = '12';
			break;
		case 5:
			$rating = '15';
			break;
		case 6:
			$rating = '18';
			break;
		case 7:
			$rating = 'R18';
			break;
	}

	return $rating;

}

/* end sjs helper functions */