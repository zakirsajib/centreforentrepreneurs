<?php 
add_shortcode( 'sharethisshortcode', 'share_this_shortcode' );	
function share_this_shortcode($atts){
	ob_start();?>
	<small><b>Share this post</b></small><br>
	<a class='st_twitter_custom' href="http://twitter.com/intent/tweet?status=<?php the_title_attribute(); ?>+<?php the_permalink(); ?>" target="_blank"></a>
	<a class='st_facebook_custom' href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&title=<?php the_title_attribute(); ?>" target="_blank"></a>
	<a class='st_linkedin_custom' href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title_attribute(); ?>&source=centreforentrepreneurs.org" target="_blank"></a>
	<a class='st_googleplus_custom' href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"></a>
	<?php 
	$myvariable = ob_get_clean();
    return $myvariable;	
}?>