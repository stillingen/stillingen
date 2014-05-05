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
echo'<span class="single-post-nav previous-post-link">';
$prevpost = get_the_post_thumbnail( $prev_post->ID, 'medium', array('class' => 'pagination-previous')); 
previous_post_link( '%link',"$prevpost  <p>Previous Post in Category</p>", TRUE ); 
echo'</span>';
endif; 

if( $next_post = get_next_post() ): 
echo'<span class="single-post-nav next-post-link">';
$nextpost = get_the_post_thumbnail( $next_post->ID, 'medium', array('class' => 'pagination-next')); 
next_post_link( '%link',"$nextpost  <p>Next Post in Category</p>", TRUE ); 
echo'</span>';
endif; 
} 

add_action( 'genesis_before_comments', 'eo_prev_next_post_nav' );
 
function eo_prev_next_post_nav() {
  
	if ( is_single() ) {
 
		echo '<div class="prev-next-navigation">';
		previous_post_link( '<div class="previous">Forrige side: <div class="prev-link">%link</div></div>', '%title' );
		get_the_post_thumbnail();
		next_post_link( '<div class="next">Neste side: <div class="next-link">%link</div></div>', '%title' );
		echo '</div><!-- .prev-next-navigation -->';
 
	}
 
}