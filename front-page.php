<?php 

/** Add support for Home Widgets **/
add_action( 'genesis_meta', 'childtheme_home_widgets' );
function childtheme_home_widgets() {
	if ( is_active_sidebar( 'hometop-area' ) || is_active_sidebar( 'homemiddle-area' ) || is_active_sidebar( 'homebottom-area' ) ) {

		remove_action( 'genesis_loop', 'genesis_do_loop' );
		add_action( 'genesis_after_header', 'childthemehomewidgets' );
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
	}
}

/** Display Widget Area on Home Page **/
function childthemehomewidgets() {

		if ( is_active_sidebar( 'hometop-area' ) ) {
			echo '<div id="hometop-area" class="hometop-wrap"><div class="hometop-inner">';
			dynamic_sidebar( 'hometop-area' );
			echo '</div><!-- end .hometop-inner --></div><!-- end .hometop-wrap -->';
		}

		if ( is_active_sidebar( 'homemiddle-area' ) ) {
			echo '<div id="homemiddle-area" class="homemiddle-wrap"><div class="homemiddle-inner">';
			dynamic_sidebar( 'homemiddle-area' );
			echo '</div><!-- end .homemiddle-inner --></div><!-- end .homemiddle-wrap -->';
		}

		if ( is_active_sidebar( 'homebottom-area' ) ) {
			echo '<div id="homebottom-area" class="homebottom-wrap"><div class="homebottom-inner">';
			dynamic_sidebar( 'homebottom-area' );
			echo '</div><!-- end .homebottom-inner --></div><!-- end .homebottom-wrap -->';
		}
} 

genesis();