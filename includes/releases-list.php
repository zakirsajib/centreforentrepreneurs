<?php
// create shortcode to list 2 Releases posts
add_shortcode( 'list-releases-basic', 'rmcc_releases_listing_shortcode1' );
function rmcc_releases_listing_shortcode1( $atts ) {
    ob_start();
    $query = new WP_Query( array(
        'post_type' => 'wp_releases',
        'posts_per_page' => 2,
        'order' => 'DESC',
        'orderby' => 'publish_date',
    ) );
    if ( $query->have_posts() ) { ?>
        <div class="releases-listing">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            
            <div class="row-fluid empty-space">
	            <div <?php post_class('span4'); ?>>
	            	<?php if(has_post_thumbnail() ) : ?>
	  					<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', array('alt'=>get_the_title($post->ID), 'title'=>get_the_title($post->ID))); ?></a>
	  		<?php else:?>
	  				<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><img class="left" src="http://placehold.it/86x86" alt="default image" /></a>
	  		<?php endif;?>
	            </div>
	            <div id="post-<?php the_ID(); ?>" <?php post_class('span8'); ?>>
	            	<div class="releases-date"><?php the_time(get_option( 'date_format' )) ?></div>
	                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
	                <a class="read-report" href="<?php the_permalink(); ?>"><i class="fa fa-arrow-circle-o-right"></i> read more</a>
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