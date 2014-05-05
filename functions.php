<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'stillingen' );
define( 'CHILD_THEME_URL', 'http://www.stillingen.com/' );
define( 'CHILD_THEME_VERSION', '2.0.1' );

//* Enqueue Lato Google font
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {
	wp_enqueue_style( 'google-font-lato', '//fonts.googleapis.com/css?family=Lato:300,700', array(), CHILD_THEME_VERSION );
}

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

add_action('genesis_entry_footer', 'wpsites_image_nav_links', 25 );
/**
 * @author    Brad Dalton
 * @example   http://wpsites.net/web-design/add-featured-images-to-previous-next-post-nav-links/
 * @copyright 2014 WP Sites
 */
add_action('genesis_entry_footer', 'wpsites_image_nav_links', 25 );

function wpsites_image_nav_links() {

if( !is_singular('post') ) 
      return;

if( $prev_post = get_previous_post() ): 
echo'<div class="single-post-nav previous-post-link">';
echo'<h2>Forrige innlegg</h2>';
$prevpost = get_the_post_thumbnail( $prev_post->ID, 'medium', array('class' => 'pagination-previous')); 
previous_post_link( '%link',"$prevpost", TRUE ); 
previous_post_link( '<div class="prev-link">%link</div>', '%title' );
echo'</div>';
endif; 

if( $next_post = get_next_post() ): 
echo'<div class="single-post-nav next-post-link">';
echo'<h2>Neste innlegg</h2>';
$nextpost = get_the_post_thumbnail( $next_post->ID, 'medium', array('class' => 'pagination-next')); 
next_post_link( '%link',"$nextpost", TRUE );
next_post_link( '<div class="next-link">%link</div>', '%title' );
echo'</div>';
endif; 
} 

//* Customize the credits
add_filter( 'genesis_footer_creds_text', 'sp_footer_creds_text' );
function sp_footer_creds_text() {
	echo '<div class="creds"><p>';
	echo 'Copyright &copy; ';
	echo date('Y');
	echo ' &middot; <a href="http://stillingen.com">stillingen.com</a> &middot; Built on the <a href="http://www.studiopress.com/themes/genesis" title="Genesis Framework">Genesis Framework</a>';
	echo '</p></div>';
}

//* Adding image size feature
add_image_size('feature', 1060, 706, true);


//* Remove the author box on single posts
remove_action( 'genesis_after_post', 'genesis_do_author_box_single' );

//* Remove jetpack open graph
add_filter( 'jetpack_enable_opengraph', '__return_false', 99 );

/** Register Homepage Sidebar Areas */

genesis_register_sidebar( 
    array(
        'id'            => 'hometop-area',
        'name'          => __( 'hometop Area' ),
        'description'   => __( 'This is the area to show off your facebook likes' ),
) );

genesis_register_sidebar( 
    array(
        'id'            => 'homemiddle-area',
        'name'          => __( 'homemiddle Area' ),
        'description'   => __( 'This is the area below the social area on the homepage.' ),
) );

genesis_register_sidebar( 
    array(
        'id'            => 'homebottom-area',
        'name'          => __( 'homebottom Area' ),
        'description'   => __( 'This is the area below the Under social area on the homepage' ),
) );

add_theme_support( 'genesis-structural-wraps', array( 'header', 'nav', 'subnav', 'inner', 'footer-widgets', 'footer' ) );

//* Forcing read more link regardless off excerpt length
function themprefix_excerpt_read_more_link($output) {
    global $post;
    return $output . ' <a href="' . get_permalink($post->ID) . '" class="more-link" title="Les mer">Les mer</a>';
}
add_filter( 'the_excerpt', 'themprefix_excerpt_read_more_link' );

//* Remove the post meta function
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

?>
