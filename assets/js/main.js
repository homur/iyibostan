jQuery(document).ready(function($) {
	"use strict";

	/* window */
	var window_width, window_height, scroll_top;
	
	/* admin bar */
	var adminbar = $('#wpadminbar');
	var adminbar_height = 0;
	
	/* header menu */
	var header = $('#cshero-header');
	var header_top = 0;
	
	/* scroll status */
	var scroll_status = '';
	
	/**i
	 * window load event.
	 * 
	 * Bind an event handler to the "load" JavaScript event.
	 * @author Fox
	 */
	$(window).on('load', function() {
		
		/** current scroll */
		scroll_top = $(window).scrollTop();
		
		/** current window width */
		window_width = $(window).width();
		
		/** current window height */
		window_height = $(window).height();
		
		/* get admin bar height */
		adminbar_height = adminbar.length > 0 ? adminbar.outerHeight(true) : 0 ;
		
		/* get top header menu */
		header_top = header.length > 0 ? header.offset().top - adminbar_height : 0 ;
		
		/* check sticky menu. */
		if(CMSOptions.menu_sticky == '1'){
			cms_stiky_menu(scroll_top);
		}
		
		/* check video size */
		cms_auto_video_width();

		/* check mobile menu */
		cms_mobile_menu();

		/* page loading */
		cms_page_loading();

		/* Encroll */
		cms_enscroll();
		/*same height*/
		same_height();
		arctect_load();

		/* CMS Owl Carousel */
		cms_owl_carousel();

		/* CMS Add Class */
		cms_add_class();

		/* rf */
		rf_sidebar();
		woocommerce_sidebar();
		/* check back to top */
		if(CMSOptions.back_to_top == '1'){
			/* add html. */
			$('body').append('<div id="back_to_top" class="back_to_top"><span class="go_up"></span></div><!-- #back-to-top -->');
			cms_back_to_top();
		}
		$(".cms-carousel-attorney-layout1").css('opacity','1');
		$(".vc_row-o-full-height").addClass('row-show').css('opacity','1');
		setTimeout(function(){ feature_product_carousel(); }, 400);
		setTimeout(function(){ cms_testimonial_layout1(); }, 400);
		setTimeout(function(){ cms_testimonial_layout3(); }, 400);
		setTimeout(function(){ cms_gallery_layout3(); }, 400);
		setTimeout(function(){ cms_carousel_layout_team5(); }, 400);
		setTimeout(function(){ cms_carousel_image(); }, 400);

	});
	/* jscroll */
		//$('.cms-grid-item').jscroll();

	/**
	 * reload event.
	 * 
	 * Bind an event handler to the "navigate".
	 */
	window.onbeforeunload = function(){ cms_page_loading(1); }

	/**
	 * resize event.
	 * 
	 * Bind an event handler to the "resize" JavaScript event, or trigger that event on an element.
	 * @author Fox
	 */
	$(window).on('resize', function(event, ui) {
		/** current window width */
		window_width = $(event.target).width();
		
		/** current window height */
		window_height = $(window).height();
		
		/** current scroll */
		scroll_top = $(window).scrollTop();
		
		/* check sticky menu. */
		if(CMSOptions.menu_sticky == '1'){
			cms_stiky_menu(scroll_top);
		}
		
		/* check mobile menu */
		cms_mobile_menu();

		/* check video size */
		cms_auto_video_width();

		/* Encroll */
		cms_enscroll();
		/*same height*/
		same_height();
		arctect_load();
	});
	
	/**
	 * scroll event.
	 * 
	 * Bind an event handler to the "scroll" JavaScript event, or trigger that event on an element.
	 * @author Fox
	 */
	var lastScrollTop = 0;
	
	$(window).on('scroll', function() {
		/** current scroll */
		scroll_top = $(window).scrollTop();
		/** check scroll up or down. */
		if(scroll_top < lastScrollTop) {
			/* scroll up. */
			scroll_status = 'up';
		} else {
			/* scroll down. */
			scroll_status = 'down';
		}
		
		lastScrollTop = scroll_top;
		
		/* check sticky menu. */
		if(CMSOptions.menu_sticky == '1'){
			cms_stiky_menu();
		}
		
		/* check back to top */
		cms_back_to_top();
	});
	

	/**
	 * Stiky menu
	 * 
	 * Show or hide sticky menu.
	 * @author Fox
	 * @since 1.0.0
	 */
	function cms_stiky_menu() {
		if (header_top < scroll_top) {
			switch (true) {
				case (window_width > 992):
					header.addClass('header-fixed');
					$('body').addClass('fixed-margin-top');
					break;
				case ((window_width <= 992 && window_width >= 768) && (CMSOptions.menu_sticky_tablets == '1')):
					header.addClass('header-fixed');
					$('body').addClass('fixed-margin-top');
					break;
				case ((window_width <= 768) && (CMSOptions.menu_sticky_mobile == '1')):
					header.addClass('header-fixed');
					$('body').addClass('fixed-margin-top');
					break;
			}
		} else {
			header.removeClass('header-fixed');
			$('body').removeClass('fixed-margin-top');
		}
	}
	
	/**
	 * Mobile menu
	 * 
	 * Show or hide mobile menu.
	 * @author Fox
	 * @since 1.0.0
	 */
	
	$('body').on('click', '#cshero-menu-mobile', function(){
		var navigation = $(this).parent().find('#cshero-header-navigation');
		if(!navigation.hasClass('collapse')){
			navigation.addClass('collapse');
		} else {
			navigation.removeClass('collapse');
		}
	});
	/*same height*/
	function same_height(){
		$('.vc_row-o-equal-height .wpb_column').matchHeight();
		$('.column-same-height > .vc_column_wrapper > .wpb_column').matchHeight();
		$('.modal-content .modal-content-child').matchHeight();
		$('.recipe-content-single .col-sameheight').matchHeight();
		$('.product-archive-style2.vc_column_container .product').matchHeight();
	}
	/**
	 * Page Loading.
	 */
	function cms_page_loading($load) {
		switch ($load) {
		case 1:
			$('#cms-loadding').css('display','block')
			break;
		default:
			$('#cms-loadding').css('display','none')
			break;
		}
	}
	/* check mobile screen. */
	function cms_mobile_menu() {
		var menu = $('#cshero-header-navigation');
		
		/* active mobile menu. */
		switch (true) {
		case (window_width < 991 && window_width >= 768):
			menu.removeClass('phones-nav').addClass('tablets-nav');
			/* */
			break;
		case (window_width <= 768):
			menu.removeClass('tablets-nav').addClass('phones-nav');
			cms_mobile_menu_group(menu);
			break;
		default:
			menu.removeClass('mobile-nav tablets-nav');
			menu.find('li').removeClass('mobile-group');
			break;
		}	
	}
	/**
	 * One page
	 * 
	 * @author Fox
	 */
	if(CMSOptions.one_page == true){
		
		var one_page_options = {'filter' : '.onepage'};
		
		if(CMSOptions.one_page_speed != undefined) one_page_options.speed = parseInt(CMSOptions.one_page_speed);
		if(CMSOptions.one_page_easing != undefined) one_page_options.easing =  CMSOptions.one_page_easing;
		$('#site-navigation').singlePageNav(one_page_options);
	}
	
	/* Group Sub Menu */
	function cms_mobile_menu_group(nav) {
		nav.each(function(){
			$(this).find('li').each(function(){
				if($(this).find('ul:first').length > 0){
					$(this).addClass('mobile-group');
				}
			});
		});
	}

	/* OWL Carousel */
	function cms_owl_carousel() {
		
	}

    /* CMS Gallery Popup */
    $('.cms-gallery-item').magnificPopup({
	  delegate: 'a.p-view', // child items selector, by clicking on it popup will open
	  type: 'image',
	  gallery: {
	     enabled: true
	  },
	  mainClass: 'mfp-fade'
	});
	/**
	 * Parallax.
	 * 
	 * @author Fox
	 * @since 1.0.0
	 */
	var cms_parallax = $('.cms_parallax');
	if(cms_parallax.length > 0){
		cms_parallax.each(function() {
			"use strict";
			var speed = $(this).attr('data-speed');
			
			speed = (speed != undefined && speed != '') ? speed : 0.1 ;
			
			$(this).parallax("50%", speed);
		});
	}

	/** smoothscroll */
	
	
	/**
	 * Back To Top
	 * 
	 * @author Fox
	 * @since 1.0.0
	 */
	$('body').on('click', '#back_to_top', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1500);
    });

    /* Show Tooltip */
    $('.cs-social.default [data-rel="tooltip"]').tooltip();
    $('.single-gallery-wrap [data-rel="tooltip"]').tooltip();
	/* Replae placeholder input mail newsletter */
	
	
	$('.cshero-popup-search #searchform').find("input[type='text']").each(function(ev) {
	    if(!$(this).val()) { 
	        $(this).attr("placeholder", "Type Words Then Press Enter To Search");
	    }
	});
	$('.price-add-to-cart').has("del").addClass('has_sale');
	$('.main-sidebar-3 #searchform').find("input[type='text']").each(function(ev) {
		if(!$(this).val()) {
			$(this).attr("placeholder", "Search");
		}
	});
	$('.vc_wp_search .searchform').find("input[type='text']").each(function(ev) {
		if(!$(this).val()) {
			$(this).attr("placeholder", "Find your answer quicker...");
		}
	});
	/* Show or Hide Buttom  */
	function cms_back_to_top(){
		/* Back To Top */
        if (scroll_top < window_height) {
        	$('#back_to_top').addClass('off').removeClass('on');
        } else {
        	$('#back_to_top').removeClass('off').addClass('on');
        }
	}
	
	/* Hide search form. */
	$(document).on('click',function(e){
		
		if(e.target.className == 'cshero-popup-search open')
		
		$('.cshero-popup-search').removeClass('open');
    });

	/**
	 * Auto width video iframe
	 * 
	 * Youtube Vimeo.
	 * @author Fox
	 */
	function cms_auto_video_width() {
		$('.entry-video iframe').each(function(){
			var v_width = $(this).width();
			
			v_width = v_width / (16/9);
			$(this).attr('height',v_width + 35);
		})
	}	
	/**
	 * Enscroll
	 * 
	 * 
	 * @author Fox
	 */
	function cms_enscroll() {
		$('.header-right-top .shop-cart .cart-info .widget_shopping_cart').enscroll();
		$('.cms-feature-post .cms-feature-post-wrapper').enscroll();
		$('.pt-single-recipe .single-recipe-wrap .entry-blog .recipe-right .content-tab .tab-pane').enscroll();

	}

	/**
	 * Add Class
	 * 
	 * 
	 * @author Fox
	 */
	function cms_add_class() {
	    $(".cart-contents").on('click',function(){
			$('.widget_shopping_cart').toggleClass('open');
	    })
	    $(".nav-button-icon .fa-search").on('click',function(){
			$('.cshero-popup-search').toggleClass('open');
	    })
	    $(".nav-button-icon .fa-shopping-cart").on('click',function(){
			$('.widget_shopping_cart').toggleClass('open');
	    })

	    $("#cshero-header-navigation .hidden-sidebar").on('click',function(){
			$('.cshero-hidden-sidebar').toggleClass('open');
			$('#cms-organic').toggleClass('hidden-sidebar-active');
	    })
	}
	/* Woo - Add class */

	$('.plus').click(function(){
		/* Declare the input object */
		var objQuantity = $(this).parents('.quantity').find('input[type="number"]');
		var number_value = $(this).parents('.quantity').find('input[type="number"]').val();

		number_value = ($.isNumeric(number_value)) ? (parseInt(number_value) + 1): 1;
		objQuantity.val(number_value);
	});

	$('.minus').click(function(){
		/* Declare the input object */
		var objQuantity  = $(this).parents('.quantity').find('input[type="number"]');
		var number_value = $(this).parents('.quantity').find('input[type="number"]').val();

		number_value = ($.isNumeric(number_value) && number_value > 0) ? (parseInt(number_value) - 1) : 0;

		objQuantity.val(number_value);
	});
	/* Remove Search Popup & Hidden Sidebar */
	$(document).on('keyup',function(evt) {
	    if (evt.keyCode == 27) {
	       $('.cshero-popup-search').removeClass('open');
	       $('.cshero-hidden-sidebar').removeClass('open');
	       $('#cms-organic').removeClass('hidden-sidebar-active');
	    }
	});
	$('.sidebar-close').on('click',function(){
    	$('.cshero-hidden-sidebar').removeClass('open');
    	$('#cms-organic').removeClass('hidden-sidebar-active');
    });
	$(".archive-show-category .cat-wrap").find('.images-cat').each(function(ev) {
		$(".archive-show-category .cat-wrap").addClass('has-images-cat');

	});
	/* Custom Owl Carousel*/
	function feature_product_carousel() {

		if($('.feature-product-carousel').length > 0) {
			$('.feature-product-carousel').owlCarousel({
				navigation: true,
				smartSpeed: 1000,
				paginationSpeed: 3000,
				rewindSpeed: 1000,
				singleItem: true,
				responsiveClass: true,
				dots: false,
				nav: false,
				loop: true,
				responsive: {
					0: {
						items: 1
					},
					768: {
						items: 2
					},
					992: {
						items: 3
					},
					1200: {
						items: 4
					}
				}
			});
		}
	}
	function cms_testimonial_layout1() {

		if($('.cms-testimonial-layout1').length > 0) {

			$('.cms-testimonial-layout1').slick({
				centerMode: true,
				centerPadding: '130px',
				slidesToShow: 3,
				dots:true,
				arrows: false,
				responsive: [
					{
						breakpoint: 1025,
						settings: {
							centerMode: true,
							centerPadding: '0px',
							slidesToShow: 3
						}
					},
					{
						breakpoint: 992,
						settings: {
							centerMode: true,
							centerPadding: '0px',
							slidesToShow: 2
						}
					},
					{
						breakpoint: 768,
						settings: {
							centerMode: true,
							centerPadding: '0px',
							slidesToShow: 1
						}
					},

				]
			});
		}
	}
	function cms_testimonial_layout3() {

		if($('.cms-testimonial-layout3').length > 0) {

			$('.cms-testimonial-layout3').slick({
				centerMode: true,
				centerPadding: '0px',
				slidesToShow: 3,
				dots:true,
				arrows: false,
				responsive: [
					{
						breakpoint: 992,
						settings: {
							centerMode: true,
							centerPadding: '0px',
							slidesToShow: 2
						}
					},
					{
						breakpoint: 768,
						settings: {
							centerMode: true,
							centerPadding: '0px',
							slidesToShow: 1
						}
					},

				]
			});
		}
	}
	/*content hidden*/
	$( ".more_content" ).click(function() {
		$( "#content_hidden" ).toggle("slow");
	});
	$( ".dropdown-toggle" ).click(function() {
		$( ".social-menu" ).toggle("slow");
	});

	/*cart header*/
	$( ".cart-product, .cart-img" ).on('click', function() {
		if($( ".cart-info" ).hasClass("slow")){
			$( ".cart-info" ).removeClass("slow");
		} else {
			$( ".cart-info" ).addClass("slow");
		}
	});

	$('body').on('click', function (e) {
		if($(e.target).parents('.shop-cart').length == 0){
			$( ".cart-info" ).removeClass("slow");
		}
	});

	/*cart hidden when click outside*/

	$(".cms-fancybox-item").hover(function(){
		if(!$(this).hasClass("hover")){
			$(this).addClass("hover")
		}
	},function(){
		if($(this).hasClass("hover")){
			$(this).removeClass("hover")
		}
	})
	$('.cart-info').find(".empty").each(function(ev) {
		$('.cart-info').addClass('no_product');
	});
	$(".cshere-woo-item-wrap").hover(function(){
		if(!$(this).hasClass("hover")){
			$(this).addClass("hover")
		}
	},function(){
		if($(this).hasClass("hover")){
			$(this).removeClass("hover")
		}
	});
	$(".cms-gallery-layout1 .cms-grid-item").hover(function(){
		if(!$(this).hasClass("hover")){
			$(this).addClass("hover")
		}
	},function(){
		if($(this).hasClass("hover")){
			$(this).removeClass("hover")
		}
	});

	var $newdiv1 = $( "<div class='slotholder-inner'/>" ),
		newdiv2 = document.createElement( "div" ),
		existingdiv1 = document.getElementById( "" );

	$( ".tp-bgimg" ).append( $newdiv1, [ newdiv2, existingdiv1 ] );
	$( '#cbp-qtrotator' ).cbpQTRotator();
	$('.panel-group .panel-collapse.in').prev().addClass('active');
	$('.panel-group')
		.on('show.bs.collapse', function(e) {
			$(e.target).prev('.panel-heading').addClass('active');
		})
		.on('hide.bs.collapse', function(e) {
			$(e.target).prev('.panel-heading').removeClass('active');
		});


	$(".user-press input").focus(function() {
		var parent = $(this).parent();
		parent.siblings().removeClass("focus");
		if(!parent.hasClass("focus")){
			parent.addClass("focus")
		}
	});
	/* Services Column */
	$('.cms-product-layout .cms-product-column').click(function(){
		$('.cms-product-layout .cms-product-list ').removeClass('active');
		$('.cms-product-layout .cms-product-column ').addClass('active');
		$('.product-archive-style2').removeClass('product-archive-list');
		$('.product-archive-style2').addClass('product-archive-3columns');

	});
	$('.cms-product-layout .cms-product-list').click(function(){
		$('.cms-product-layout .cms-product-column ').removeClass('active');
		$('.cms-product-layout .cms-product-list ').addClass('active');
		$('.product-archive-style2').removeClass('product-archive-3columns');
		$('.product-archive-style2').addClass('product-archive-list');

	});

	$('.wpcf7-submit').parent().addClass('p-last-child');

	/*masonry*/
	$('.masonry').masonry({
		// options
		itemSelector: '.item-masonry',
		//columnWidth: 50
	});

	$(function() {
		if($('.template-cms_grid--product-great').length > 0) {

			var $el, leftPos, newWidth,
				$mainNav = $(".template-cms_grid--product-great .cms-grid-filter ul");

			$mainNav.append("<li id='magic-line'></li>");
			var $magicLine = $("#magic-line");

			$magicLine
				.width($(".all_cat").width())
				.css("left", $(".all_cat a").position().left)
				.data("origLeft", $magicLine.position().left)
				.data("origWidth", $magicLine.width());

			$(".cms-grid-filter ul li a").click(function () {
				$el = $(this);
				leftPos = $el.position().left;
				newWidth = $el.parent().width();
				$magicLine.stop().animate({
					left: leftPos,
					width: newWidth
				});
			});


		}});
	function arctect_load(){
		if (window_width >= 768){
			$("#arctext").arctext({
				radius:600,
				dir:1,
			});
			$(".arctext").arctext({
				radius:300,
				dir:1,
			});
			$(".arctext2").arctext({
				radius:400,
				dir:1,
			});
		}
	}
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()

	})

	/* rf scripts */
	$('#rf_filter').on('change','.filter-content input, input[name="mode"], .recipe-categories input, #recipe-max-time', function () {
		$( "#rf_filter" ).submit();
	});

	$('#rf-sidebar').on('click', '.widget-title', function () {
		var rf_ul = $(this).parent().find('ul, .rf-cooking-time');

		if(rf_ul.hasClass('active')){
			$(this).removeClass('active');
			rf_ul.removeClass('active');
		} else {
			$(this).addClass('active');
			rf_ul.addClass('active');
		}
	});

	$('#rf_filter').on('click', '.filter-content label', function () {

		var _name = $(this).data('name');

		$('#rf-order-by').val(_name);

		if($(this).hasClass('active')){
			$(this).removeClass('active');
			$('#rf-order').val('DESC');
		} else {
			$(this).parent().find('label').removeClass('active');
			$(this).addClass('active');
			$('#rf-order').val('ASC');
		}

		$( "#rf_filter" ).submit();
	});

	function rf_sidebar() {
		$('#rf-sidebar aside').each(function (_index) {

			var rf_ul = $(this).find('ul');
			var rf_title = $(this).find('.widget-title');

			if((_index == 0 && window_width >=768) || $(this).find('input:checked').length > 0){
				rf_title.addClass('active');
				rf_ul.addClass('active');


			} else {
				rf_title.removeClass('active');
				rf_ul.removeClass('active');
			}
		});
	}
	function woocommerce_sidebar() {
		$('#sidebar.woocommerce-widget aside.widget_product_categories').on('click', '.widget-title', function () {
			var rf_ul = $(this).parent().find('ul, .product-categories');

			if(rf_ul.hasClass('active-close')){
				$(this).removeClass('active-close');
				rf_ul.removeClass('active-close');
			} else {
				$(this).addClass('active-close');
				rf_ul.addClass('active-close');
			}
		});
	}

	$( ".cms-step-layout1 .item-completed" ).last().addClass('last');
	$( ".cms-step-layout2 .item-completed" ).last().addClass('last');
	$( ".cms-step-layout3 .item-completed" ).last().addClass('last');

	$(".widget_newsletterwidget form .tnp-email").attr("placeholder", "Email");
	$(".vc_tta-container").find('.vc_tta-accordion.style1').each(function(ev) {
		if(!$(this).val()) {
			$(this).parent().addClass('vc_tta-container-style1');
		}
	});
	$(".vc_tta-container").find('.vc_tta-accordion.style2').each(function(ev) {
		if(!$(this).val()) {
			$(this).parent().addClass('vc_tta-container-style2');
		}
	});
	function cms_gallery_layout3() {

		if($('.cms-gallery-layout3').length > 0) {

			$('.cms-gallery-layout3').slick({
				centerMode: true,
				centerPadding: '190px',
				slidesToShow: 4,
				dots:false,
				arrows: true,
				responsive: [
					{
						breakpoint: 1201,
						settings: {
							centerPadding: '100px',
							slidesToShow: 4,
							centerMode: true,
							arrows: false,
						}
					},
					{
						breakpoint: 1025,
						settings: {
							centerPadding: '0px',
							slidesToShow: 3,
							centerMode: false,
							arrows: false,
						}
					},
					{
						breakpoint: 992,
						settings: {
							centerPadding: '0px',
							slidesToShow: 2,
							centerMode: false,
							arrows: false,
						}
					},
					{
						breakpoint: 768,
						settings: {
							centerMode: false,
							centerPadding: '0px',
							slidesToShow: 1,
							arrows: false,

						}
					},

				]
			});
		}
	}
	function cms_carousel_layout_team5() {

		if($('.cms_carousel--layout-team5').length > 0) {

			$('.cms_carousel--layout-team5').slick({
				centerMode: true,
				centerPadding: '187px',
				slidesToShow: 4,
				dots:true,
				arrows: false,
				responsive: [
					{
						breakpoint: 1601,
						settings: {
							centerPadding: '187px',
							slidesToShow: 3,
							centerMode: true,

						}
					},
					{
						breakpoint: 1201,
						settings: {
							centerPadding: '100px',
							slidesToShow: 4,
							centerMode: true,

						}
					},
					{
						breakpoint: 1025,
						settings: {
							centerPadding: '0px',
							slidesToShow: 3,
							centerMode: false,

						}
					},
					{
						breakpoint: 992,
						settings: {
							centerPadding: '0px',
							slidesToShow: 2,
							centerMode: false,

						}
					},
					{
						breakpoint: 768,
						settings: {
							centerMode: false,
							centerPadding: '0px',
							slidesToShow: 1,


						}
					},

				]
			});
		}
	}
	/*images crousel*/

	function cms_carousel_image() {
		if($('.cms-carousel-images .images-item-wrap').length > 0) {
			$(".cms-carousel-images .images-item-wrap").owlCarousel({
				navigation : true,
				smartSpeed : 1100,
				paginationSpeed : 3000,
				rewindSpeed: 1000,
				singleItem:true,
				items : 3,
				dots: true,
				nav: false,
				margin: 18,
			});
		}

	}
	$('.cms-slick-wrap').find('.cms-slider-default').each(function() {
		$('.cms-slider-wrap', $(this)).slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			dots: false,
			asNavFor: $('.cms-slider-nav', $(this))
		});
		$('.cms-slider-nav', $(this)).slick({
			slidesToShow: 5,
			slidesToScroll: 1,
			asNavFor: $('.cms-slider-wrap', $(this)),
			dots: false,
			arrows: true,
			focusOnSelect: true,
			responsive: [
				{
					breakpoint: 1201,
					settings: {
						centerPadding: '0px',
						slidesToShow: 4,
						arrows: false,
					}
				},
				{
					breakpoint: 1025,
					settings: {
						centerPadding: '0px',
						slidesToShow: 3,
						arrows: false,
					}
				},
				{
					breakpoint: 992,
					settings: {
						centerPadding: '0px',
						slidesToShow: 3,
						arrows: false,
					}
				},
				{
					breakpoint: 768,
					settings: {
						centerPadding: '0px',
						slidesToShow: 2,
						arrows: false,
						slidesToScroll: 1,

					}
				},
				{
					breakpoint: 321,
					settings: {
						centerPadding: '0px',
						slidesToShow: 1,
						arrows: false,
						slidesToScroll: 1,

					}
				},

			]
		});
	});

});

