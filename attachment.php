<?php

add_action( 'genesis_entry_content', 'child_attachment_image' );
function child_attachment_image() {

                global $post;

                        if (wp_attachment_is_image($post->id)) {
                                $att_image = wp_get_attachment_image_src( $post->id, "feature");
                                ?>
                                <p class="attachment">
                                        <a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>">
                                        <img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  class="attachment-medium" alt="<?php $post->post_excerpt; ?>" />
                                        </a>
                                </p>
                        <?php }

}

add_action( 'genesis_after_entry_content', 'child_attchment_page_navigation');

function child_attchment_page_navigation() { ?>
<div class="prev-next-image-navigation">
<div class="prev-image-navigation"><?php next_image_link($size = 'none', $text = 'Forrige bilde') ?></div>
<div class="next-image-navigation"><?php previous_image_link($size = 'none', $text = 'Neste bilde') ?></div>
</div>

<?php }

remove_action( 'genesis_before_comments', 'eo_prev_next_post_nav' );

add_action( 'genesis_before_comments', 'child_back_to_post' );
function child_back_to_post() {
  
	if ( is_single() ) {
		previous_post_link( '<div class="back-to-post">Tilbake til siden: <div class="back-to-post-link">%link</div></div>', '%title' );
	}
}

/* Delete text for Tags and Categories www.basicWP.com */
add_filter( 'genesis_post_meta', 'dmp_post_meta_filter' );
function dmp_post_meta_filter($post_meta) {
if (!is_page()) {
$post_meta = '[post_categories sep="/" before=""] [post_tags sep="/" before=""]';
return $post_meta;
} }


genesis();