<?php
// create shortcode to list all research posts
add_shortcode( 'research-posts', 'research_listing_shortcode1' );
function research_listing_shortcode1( $atts ) {
    
    global $wp_query;
    ob_start();
    
    // important code for load more...
    //$max = $wp_query->max_num_pages;
 	//$paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
 	//$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
 	//
    
    $query_research = new WP_Query( array(
        'post_type' => 'wp_research',
        'posts_per_page' => -1,
        'order' => 'DESC',
        'orderby' => 'post_date'
        //'paged'	=> $paged
    ) );
    
    
    if ( $query_research->have_posts() ) { ?>
        <div class="main-blog-listing">
            <?php while ( $query_research->have_posts() ) : $query_research->the_post(); ?>
			            <div class="row-fluid empty-space-block">
				            <div <?php post_class('span3'); ?>>
				            	<?php if(has_post_thumbnail() ) : ?>
				  					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(225, 175), array('alt'=>get_the_title($post->ID), 'title'=>get_the_title($post->ID))); ?></a>
				  					
				  					<div class="clearfix"></div>
				  					<div class="empty-space"></div>
				  					<a class='st_twitter_custom' href="http://twitter.com/intent/tweet?status=<?php the_title_attribute(); ?>+<?php the_permalink(); ?>" target="_blank"></a>
				  					<a class='st_facebook_custom' href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&title=<?php the_title_attribute(); ?>" target="_blank"></a>
				  					<a class='st_linkedin_custom' href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title_attribute(); ?>&source=centreforentrepreneurs.org" target="_blank"></a>
				  					<a class='st_googleplus_custom' href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"></a>

				  		<?php else:?>
				  				<img class="left" src="http://placehold.it/225x175" alt="default image" />
				  		<?php endif;?>
				            </div>
				            <div id="post-<?php the_ID(); ?>" <?php post_class('span9'); ?>>
				                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
				                <div class="blog-date"><?php the_time(get_option( 'date_format' )) ?></div>
				                <div class="entry-content">
				                	<?php the_excerpt()?>
				                </div>
				            </div>
				            
				            <div class="clearfix"></div>
				            <div class="horizontal-border"></div>
				            
			  </div>
            <?php endwhile;?>
	        	<?php //next_posts_link( '<i class="fa fa-long-arrow-down"></i> Older Research', $query_research->max_num_pages );?>
				<?php //previous_posts_link( '<i class="fa fa-long-arrow-up"></i> Newer Research' );?>
            <?php wp_reset_postdata(); ?>
            <div class="vertical-border-blog"></div>
            
        </div>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}?>