<div class="search-form">	  	
	<form method="get" class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="input-append">
			<input class="span12" id="appendedInputButton" type="text" name="s" required="required" placeholder="<?php esc_attr_e( 'Search', THEMENAME ); ?>" />
			<input class="btn" type="submit" name="submit" value="<?php esc_attr_e( 'Go', THEMENAME ); ?>" />
		</div>
	</form>
	  		
</div><!-- #search-form -->