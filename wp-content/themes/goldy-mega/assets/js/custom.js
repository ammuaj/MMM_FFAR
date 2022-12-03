jQuery(document).ready(function() {
	if(goldy_mega_main_vars.img_autoplay === 'true'){
		var img_auto=true;		
	}else{
		var img_auto=false;
	}
	var img_autospeed = goldy_mega_main_vars.img_autoplayspped; 
	var img_autotimeout = goldy_mega_main_vars.img_autoplaytimeout; 
	jQuery('.featuredimage_slider').each(function() {
		jQuery(this).addClass('owl-loaded owl-drag').owlCarousel({
	    	navigation : true, // Show next and prev buttons 
	    	loop: true,	
		    slideSpeed : 300,
		    paginationSpeed : 400,	 
		    items : 1, 
		    itemsDesktop : false,
		    itemsDesktopSmall : false,
		    itemsTablet: false,
		    itemsMobile : false,
		    nav: true,
		    autoplay: img_auto,
	        autoplaySpeed: img_autospeed,
	        autoplayTimeout:img_autotimeout,
	    	navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		});
	});

	if(goldy_mega_main_vars.autoplay === 'true'){
		var auto=true;		
	}else{
		var auto=false;
	}
	var autospeed = goldy_mega_main_vars.autoplayspped;   
	var autotimeout = goldy_mega_main_vars.autoplaytimeout; 
	jQuery('.testinomial_owl_slider').each(function() {
		jQuery(this).addClass('owl-loaded owl-drag').owlCarousel({
	    	navigation : true, 
	    	loop: true,	
		    slideSpeed : 300,
		    paginationSpeed : 400,	 
		    items : 3, 
		    itemsDesktop : false,
		    itemsDesktopSmall : false,
		    itemsTablet: false,
		    itemsMobile : false,
	    	margin:10,
	    	// autoplay: auto,
	     //  	autoplaySpeed: autospeed,
	     //    autoplayTimeout:autotimeout,
	        responsive:{
		        0:{
		            items:1,
		            nav:true
		        },
		        600:{
		            items:3,
		            nav:false
		        }
		    }
		});	
	});
	if(goldy_mega_main_vars.sponsor_autoplay === 'true'){
		var sponsor_auto=true;		
	}else{
		var sponsor_auto=false;
	}
	var sponsor_autospped = goldy_mega_main_vars.sponsor_autoplayspped; 
	var sponsor_autoplaytimeout = goldy_mega_main_vars.sponsor_autoplaytimeout; 
	jQuery('.our_sponsors_demo').each(function() {
		jQuery(this).addClass('owl-loaded owl-drag').owlCarousel({
	    	navigation : true, // Show next and prev buttons 
	    	loop: true,	
		    slideSpeed : 300,
		    paginationSpeed : 400,	 
		    items : 5, 
		    itemsDesktop : false,
		    itemsDesktopSmall : false,
		    itemsTablet: false,
		    itemsMobile : false,
	    	margin:10,
	    	autoplay: sponsor_auto,
	        autoplaySpeed: sponsor_autospped,
	        autoplayTimeout:sponsor_autoplaytimeout,
	    	responsive:{
		        0:{
		            items:1,
		            nav:true
		        },
		        600:{
		            items:3,
		            nav:false
		        },
		        1000:{
		        	items:5,
		            nav:false
		        }
		    }
		});	
	});

	//left, right ,top and bottom annimation for scroll
		const scrollElements = document.querySelectorAll(".js-scroll");

	    const elementInView = (el, dividend = 1) => {
	      const elementTop = el.getBoundingClientRect().top;

	      return (
	        elementTop <=
	        (window.innerHeight || document.documentElement.clientHeight) / dividend
	      );
	    };

	    const elementOutofView = (el) => {
	      const elementTop = el.getBoundingClientRect().top;

	      return (
	        elementTop > (window.innerHeight || document.documentElement.clientHeight)
	      );
	    };

	    const displayScrollElement = (element) => {
	      element.classList.add("scrolled");
	    };

	    const hideScrollElement = (element) => {
	      element.classList.remove("scrolled");
	    };

	    const handleScrollAnimation = () => {
	      scrollElements.forEach((el) => {
	        if (elementInView(el, 1.25)) {
	          displayScrollElement(el);
	        } else if (elementOutofView(el)) {
	          hideScrollElement(el)
	        }
	      })
	    }

	    window.addEventListener("scroll", () => { 
	      handleScrollAnimation();
	    });
});