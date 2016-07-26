$j = jQuery.noConflict();		
		$j( document ).ready(function() {					
			$j('#rcs-42').owlCarousel({
			items: 3,
			itemsDesktop : [1199,2],
			itemsDesktopSmall : [980,1],
			itemsTablet: [768,1],
			pagination:false,
			navigation:true,
			responsive: true,
			autoPlay : true
	});
	
	
	// Version 1.3.3
	$j(".owl-carousel-twitter").owlCarousel({
		items: 2,
		loop: true,
		autoPlay:true,
		navigation:true,
		navigationText:["<i class='fa fa-arrow-circle-left'></i>","<i class='fa fa-arrow-circle-right'></i>"],
		pagination:false,
		responsive: true,
		stopOnHover : true,
		lazyLoad : true,
		itemsDesktop : [1199,2],
		itemsDesktopSmall : [980,1],
		itemsTablet: [768,1]
	});			
});