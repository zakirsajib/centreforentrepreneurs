<?php 
get_header();
?>

<div class="page-container row-fluid">
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<?php if ( have_posts() ) : ?>
				<div class="container">
				<?php while(have_posts()) : the_post();?>    
			        	<div class="entry-content">
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