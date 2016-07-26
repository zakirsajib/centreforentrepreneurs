<?php 
get_header();
?>
<div class="home-container row-fluid" id="single-post">
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<?php while(have_posts()) : the_post();?>   
        <div class="row-fluid">
		   	<div class="bgimg">
		       <div class="container">
			       <h1 class="heading-title"><?php the_title()?></h1>
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
	        <div class="team-url"><a href="<?php echo home_url();?>/cfe-team/"><i class="fa fa-arrow-circle-right"></i> The team</a></div>
        </div>
        <div class="container">
        	<div class="entry-content single-blog-content span8" id="single-team-content">
	        	<div class="span3">
		        	<?php if(has_post_thumbnail() ) : ?>
	  					<?php the_post_thumbnail('medium', array('alt'=>get_the_title($post->ID), 'title'=>get_the_title($post->ID))); ?>
	  					<?php else:?>
	  						<img class="left" src="http://placehold.it/486x243" alt="default image" />
	  				<?php endif;?>
	        	</div>
	        	<div class="allcontents span9">
	        		<b><?php the_title()?></b>
		  			<div class="contents" id="team-single"><?php the_content();?></div>
        		</div> <! end contents !>
        	</div>
			<?php endwhile;?>
			<div class="span4 sidebar">
				<?php if ( is_active_sidebar( 'team_single_sidebar' ) ) : ?>
			        	<?php dynamic_sidebar( 'team_single_sidebar' );  ?>
			    <?php endif;?>
			</div>
        </div>	<! end container !>
    </div>
</div>
<?php get_footer();?>