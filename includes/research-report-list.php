<?php
// create shortcode to list all report
add_shortcode( 'reportlist', 'rmcc_report_listing_shortcode1' );
function rmcc_report_listing_shortcode1( $atts ) {
    
    global $wp_query, $cur_post_id;
    
    ob_start(); 
    
    $args =  array( 'post_type' => 'wp_research', 
				'posts_per_page' => 3,
				'order' => 'DESC',
				'orderby' => 'post_date',
				'post__not_in' => array($cur_post_id)
			);
	query_posts( $args );
    
    if ( have_posts() ) { ?>
        <ul>
        	<li style="color:#d51067">Other CFE reports: </li>
        	<?php while ( have_posts() ) : the_post(); ?>
				<li class="menu-item-type-wp_research"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>            
			<?php endwhile; wp_reset_query();?>
        </ul>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}?>