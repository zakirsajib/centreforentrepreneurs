<?php 
get_header();

global $post, $cur_post_id;

?>
<div class="home-container row-fluid" id="single-post">
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		   
      <?php while(have_posts()) : the_post();?>
      
      <?php $cur_post_id = $post->ID;?>
        
        <div class="row-fluid">
	       
	       <?php if(get_field('upload_header_image')):?>
	       <div class="researchbgimg" id="researchbgimgsingle-bgimg">
		       <style>
			   	.researchbgimg{
				   	background: url('<?php the_field('upload_header_image')?>') no-repeat center center;
				   	background-size:100%;
			   	}
			   </style>
	       </div> 
		   <?php else:?>
		   	<div class="researchbgimg" id="researchbgimgsingle-bgimg">
	       <style>
		   	.researchbgimg{
			   	background: url('http://placehold.it/1024x300') no-repeat center center;
			   	background-size:100%;
		   	}
		   </style>
        </div>
		   <?php endif;?>   
        </div>	
<!--
        <div class="row-fluid cfe-reports">
        	<div class="container">
	        	<?php //echo do_shortcode('[reportlist]')?>
        	</div>
        </div>
-->	
        <div class="container">
        	
        	<div class="entry-content research-single span12">
	        	<div id="research-heading" class="row-fluid">
	        		<div class="span8 research-single-title">
		        		<h2><?php the_title()?></h2>
		        	</div>
		        	<div class="research-url span4">
		        		<a href="<?php echo home_url();?>/research/"><i class="fa fa-arrow-circle-right"></i> Back to all research</a>
		    		</div>
        		</div> <! end row-fluid !>
	        	<div class="clearfix"></div>
		  		<div class="contents"><?php the_content();?></div>
        		<div class="clearfix"></div>
        	</div>
			<?php endwhile;?>
        </div>	<! end container !>
    </div>
</div>
<?php get_footer();?>