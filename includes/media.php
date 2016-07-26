<?php
// create shortcode to list all blog posts
add_shortcode( 'media-posts', 'rmcc_media_listing_shortcode1' );
function rmcc_media_listing_shortcode1( $atts ) {
	global $wp_query;
    ob_start();?>
    
     		<div class="row-fluid coverage-section">
				<div class="container">
					<div class="span6">
						<div class="coverage-url"><a href="<?php echo home_url();?>/coverage/"><i class="fa fa-arrow-circle-right"></i> Media Coverage</a></div>
					</div>
					<div class="span6">
						<div class="pull-right see-more"><a href="<?php echo home_url();?>/coverage">see more</a></div>
					</div>
				</div>
     		</div>	<!end coverage-section !>
				<div class="clearfix"></div>
			<div class="row-fluid">	
				<div class="container">
					<?php $query = new WP_Query( array(
				        'post_type' => 'wp_coverage',
				        'posts_per_page' => 6,
				        'order' => 'DESC',
				        'orderby' => 'post_date'
				    ) );
					 if ( $query->have_posts() ):
						while ( $query->have_posts() ) : $query->the_post(); ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class('span4')?>>
								<div class="blog-date"><?php the_time('d/m/Y') ?></div>
								<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
								<div class="entry-content <?php echo $count?>">
					                <?php the_excerpt()?><a class="read-report" href="<?php the_permalink(); ?>"><i class="fa fa-arrow-circle-o-right"></i> read more</a>
					            </div>
				            </div>
						<?php endwhile;
						wp_reset_postdata();
					endif;?>
				</div>
			</div> 
			
			<div class="clearfix"></div>
			<div class="row-fluid press-section">
				<div class="container">
					<div class="span6">
						<div class="press-url"><a href="<?php echo home_url();?>/releases"><i class="fa fa-arrow-circle-right"></i> Press releases</a></div>
					</div>
					<div class="span6">
						<div class="pull-right see-more"><a href="<?php echo home_url();?>/releases">see more</a></div>
					</div>
				</div>
			</div>	<! end press section !>
			
				<div class="clearfix"></div>
			<div class="row-fluid">
				<div class="container">
					<?php $query_releases = new WP_Query( array(
				        'post_type' => 'wp_releases',
				        'posts_per_page' => 6,
				        'order' => 'DESC',
				        'orderby' => 'post_date'
				    ) );
					 if ( $query_releases->have_posts() ):
						while ( $query_releases->have_posts() ) : $query_releases->the_post(); ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class('span4'); ?>>
								<div class="blog-date"><?php the_time('d/m/Y') ?></div>
								<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
								<div class="entry-content <?php echo $count?>">
					                <?php the_excerpt()?><a class="read-report" href="<?php the_permalink(); ?>"><i class="fa fa-arrow-circle-o-right"></i> read more</a>
					            </div>
				            </div>
						<?php endwhile;
						wp_reset_postdata();
					endif;?>
				</div>
			</div> 

	<?php $myvariable = ob_get_clean();
    return $myvariable;
}?>    
			
			