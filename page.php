<?php 
get_header();
?>

<div class="page-container row-fluid">
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<?php if ( have_posts() ) : ?>
			<div class="row-fluid">
		       <?php if(get_field('upload_header_image')):?>
		       		<div class="bgimg">
				       <div class="container">
					       <h1 class="heading-title"><?php the_title()?></h1>
					   </div>
					</div>
			       <style>
				   	.bgimg{
					   	background: url('<?php the_field('upload_header_image')?>') no-repeat center center;
					   	background-size:cover;
				   	}
				   </style> 
			   <?php else:?>
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
			   <?php endif;?>   
			</div>
				
				<div class="container">
				<?php while(have_posts()) : the_post();?>    
			        	<div class="page-entry-content">
                    		<?php the_content();?>
			    		</div> <!-- end entry-content -->
			    <?php endwhile;?>
				</div>
		<?php else : ?>
				<?php get_template_part('not', 'found')?>
		<?php endif; // end have_posts() check ?>	
	</div>
</div><!-- end page-container -->
<?php get_footer();?>