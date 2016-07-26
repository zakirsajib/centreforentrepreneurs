<?php
// create shortcode to list all blog posts
add_shortcode( 'list-posts-basic', 'rmcc_post_listing_shortcode1' );
function rmcc_post_listing_shortcode1( $atts ) {
    ob_start();
    $query = new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'order' => 'DESC',
        'orderby' => 'publish_date',
    ) );
    if ( $query->have_posts() ) { ?>
        <div class="blog-listing">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            
            <div class="row-fluid empty-space">
	            <div <?php post_class('span4'); ?>>
	            	<?php if(has_post_thumbnail() ) : ?>
	  					<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', array('alt'=>get_the_title($post->ID), 'title'=>get_the_title($post->ID))); ?></a>
	  		<?php else:?>
	  				<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><img class="left" src="http://placehold.it/225x175" alt="default image" /></a>
	  		<?php endif;?>
	            </div>
	            <div id="post-<?php the_ID(); ?>" <?php post_class('span8'); ?>>
	                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
	                <div class="releases-date"><?php the_time(get_option( 'date_format' )) ?></div>
					<div class="author-link"><?php the_author_posts_link(); ?></div>
	                <div class="entry-content">
	                	<?php the_excerpt()?>
	                </div>
	            </div>
            </div>
            <div class="clearfix"></div>
            
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}

?>