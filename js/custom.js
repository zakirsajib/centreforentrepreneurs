$j = jQuery.noConflict();		
		$j( document ).ready(function() {	
				$j('.form-submit input#submit').addClass('btn');
				
				if ($j.browser.msie && $j.browser.version == 10) {
				  	$j("html").addClass("ie10");
				}
				
				
				var $mobileMenuButton = $j('.menu-button'), $mobileMenu = $j('.mobile-nav-menu'), $alreadyOpen = true;

			    if ($mobileMenu.length > 0) {
			
			        $mobileMenuButton.on('click', this, function (e) {
			            e.preventDefault();
			
			            $mobileMenuButton.toggleClass('open');
			
			            $alreadyOpen = false;
			            $mobileMenu.slideToggle(200, function () {
			
			            });
			
			        });
			    }
			    
			    
			    
	// Add a class to the header once scrolled down, so we can shrink the header.
    $j(window).on('scroll', function() {
        var scrollY = $j(this).scrollTop();
        if (scrollY > 20) {
            $j('#header').addClass('shrink');
            $j('.logo,.logo2').css('display','none');
            $j('.shrink-logo1,.shrink-logo2').css('display','inline');
            $j('.shrink-logo1').addClass('span1');
            $j('.shrink-logo2').addClass('span2');
        } else {
            $j('#header.shrink').removeClass('shrink');
            $j('.logo,.logo2').css('display','inline');
            $j('.shrink-logo1,.shrink-logo2').css('display','none');
            $j('.shrink-logo1').removeClass('span1');
			$j('.shrink-logo2').removeClass('span2');
        }

        // Find out which section is closest to the top of the screen
        // and give its nav link an active state.
        var $closestElem,
            closestDist,
            $menuItems = $j('#menu-main-menu .menu-item a');

        // Loop through each section and compare how close it is to the top.
        // Once we find an element further away than the previous one then we can stop, as we've found it
        $j('div[id], .banner').each(function() {
            var dist = Math.abs(($j(window).scrollTop() + $j('#header').height()) - $j(this).offset().top);
            if (!$closestElem || dist < closestDist) {
                $closestElem = $j(this);
                closestDist = dist;
            } else {
                // Previous elem is the closest element that has a nav item.
                return false;
            }
        });

        var id = $closestElem.attr('id');

        $menuItems.removeClass('active').filter('[href="/#'+id+'"]').addClass('active');

    });
	
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
	
	
	// Single page
	$j('.single-blog-content, #about-contents').append('<div class="vertical-border-single"></div>');	
	
	//back to top scroll function. Any link with a hash (#) will scroll to that id on the page
	$j('a[href*=#]').click(function() {
	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var $target = $j(this.hash);
			$target = $target.length && $target || $j('[name=' + this.hash.slice(1) +']');
			if ($target.length) {
				var targetOffset = $target.offset().top;
				targetOffset = targetOffset - 35;
				
				$j('html,body').animate({scrollTop: targetOffset}, 1000);
				return false;
			}
		}
	});
	
	$j('#main-nav ul li.menu-item-277 a').click(function(){
		$j(this).css('color','#d51067');	
	});				
});