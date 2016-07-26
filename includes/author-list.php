<?php
// create shortcode to list all team members
add_shortcode( 'list-author', 'rmcc_author_listing_shortcode1' );
function rmcc_author_listing_shortcode1( $atts ) {
    
    global $wp_query;
    ob_start();?>
	<div class="list-author">
		<?php wp_list_authors('show_fullname=1&optioncount=0&orderby=post_count&order=DESC');?>
	</div>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
}?>