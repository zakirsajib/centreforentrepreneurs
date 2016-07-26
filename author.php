<?php get_header();
	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
	global $wp_query;
?>
<div class="page-container row-fluid">
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<div class="row-fluid">
		   	<div class="bgimg">
		       <div class="container">
			       <h1 class="heading-title">Posts by <?php echo $curauth->display_name; ?></h1>
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
						<?php 
						$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
					    $args = array(
					        'posts_per_page' => 10,
					        'order' => 'DESC',
					        'orderby' => 'post_date',
					        'author'	=> $curauth->ID,
					        'paged' => $paged
					    );
					    query_posts($args);
							while ( have_posts() ) : the_post(); ?>
			            	<div class="row-fluid empty-space-block">
				            	<div <?php post_class('span3'); ?>>
				            		<?php if(has_post_thumbnail() ) : ?>
				  						<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(225, 175), array('alt'=>get_the_title($post->ID), 'title'=>get_the_title($post->ID))); ?></a>
				  					<div class="clearfix"></div>
				  					<div class="empty-space"></div>
				  					<a class='st_twitter_custom' href="http://twitter.com/intent/tweet?status=<?php the_title_attribute(); ?>+<?php the_permalink(); ?>" target="_blank"></a>
				  					<a class='st_facebook_custom' href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&title=<?php the_title_attribute(); ?>" target="_blank"></a>
				  					<a class='st_linkedin_custom' href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title_attribute(); ?>&source=centreforentrepreneurs.org" target="_blank"></a>
				  					<a class='st_googleplus_custom' href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"></a>
							  		<?php else:?>
							  				<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><img class="left" src="http://placehold.it/225x175" alt="default image" /></a>
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
			            </div> <! end row-fluid !>
				  <?php endwhile;?>
				  
				  <?php next_posts_link( '<i class="fa fa-long-arrow-down"></i> Older Entries');
					  previous_posts_link( '<i class="fa fa-long-arrow-up"></i> Newer Entries');?>
            <?php wp_reset_query(); ?>
			<div class="vertical-border-blog"></div>
		</div> <! end main-blog-listing !>
				  
		<div class="span4 sidebar">
		  	<?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>
	        	<?php dynamic_sidebar( 'blog_sidebar' );  ?>
			<?php endif;?>
		</div>

		</div><! end container !>
	</div>    <! end post class !>
</div> <! end home container !>
<?php get_footer();?>