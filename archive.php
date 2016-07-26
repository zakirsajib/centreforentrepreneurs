<?php get_header();?>
<div class="home-container row-fluid" id="single-post">
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<div class="row-fluid">
				   	<div class="bgimg">
				       <div class="container">
					       <h1 class="heading-title">Team</h1>
					   </div>
					</div>
			       <style>
				   	.bgimg{
					   	background: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/header-blog.jpg') no-repeat center center;
					   	background-size:cover;
				   	}
				   </style>
        		</div>
        		 <div class="container">
				 	<div class="main-blog-listing span8" id="content">
						<?php while ( have_posts() ) : the_post(); ?>
			            	<div class="row-fluid empty-space-block">
				            	<div <?php post_class('span3'); ?>>
				            		<?php if(has_post_thumbnail() ) : ?>
				  						<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(105, 105), array('alt'=>get_the_title($post->ID), 'title'=>get_the_title($post->ID))); ?></a>
				  					<div class="clearfix"></div>
				  					<div class="empty-space"></div>
				  					<a class='st_twitter_custom' href="http://twitter.com/intent/tweet?status=<?php the_title_attribute(); ?>+<?php the_permalink(); ?>" target="_blank"></a>
				  					<a class='st_facebook_custom' href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&title=<?php the_title_attribute(); ?>" target="_blank"></a>
				  					<a class='st_linkedin_custom' href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title_attribute(); ?>&source=centreforentrepreneurs.org" target="_blank"></a>
				  					<a class='st_googleplus_custom' href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"></a>
							  		<?php else:?>
							  				<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><img class="left" src="http://placehold.it/105x105" alt="default image" /></a>
							  		<?php endif;?>
				            	</div>
				            <div id="post-<?php the_ID(); ?>" <?php post_class('span9'); ?>>
				                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
				                <div class="entry-content">
				                	<?php the_excerpt()?>
				                </div>
				            </div>
				            <div class="clearfix"></div>
				            <div class="horizontal-border"></div>
			            </div> <! end row-fluid !>
				  <?php endwhile;?>
				  <div class="vertical-border-blog"></div>
				  </div> <! end main-blog-listing !>
				<div class="span4 sidebar">
				  	<?php if ( is_active_sidebar( 'team_sidebar' ) ) : ?>
			        	<?php dynamic_sidebar( 'team_sidebar' );  ?>
					<?php endif;?>
				</div>
            </div>
	</div>
</div>
<?php get_footer();?>