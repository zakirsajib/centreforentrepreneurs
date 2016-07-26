<?php global $data; ?>

<div class="footer row-fluid">
		<div class="footer-inner container">
		  	<div class="span6 col1">
		  		<?php if ( is_active_sidebar( 'f_sidebar_one' ) ) : ?>
		        	<?php dynamic_sidebar( 'f_sidebar_one' );  ?>
		        <?php endif;?>
		        <div class="vertical-border"></div>
		        
		  	</div>
		  	<div class="span6 col2">
		  		<?php if ( is_active_sidebar( 'f_sidebar_two' ) ) : ?>
		        	<?php dynamic_sidebar( 'f_sidebar_two' );  ?>
		        <?php endif;?>
		  	</div>
		</div>
</div>
<?//php get_template_part('js/custom', 'script');?>
<?php echo $data['space_body']; ?>
<?php echo $data['google_analytics']; ?>
<?php wp_footer();?>
</body>
</html>