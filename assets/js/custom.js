(function ($) {

	"use strict";

	/**
	 * Ready new
	 */
	jQuery(document).ready(function () {
		/**
		 * loader
		 */
		jQuery(".site-loader").delay(0).fadeOut("slow");
		primaryMenuToggle();
		toggleResize();
		ShopGrid();
		FilterToggle();
		stickyleft();
		stickyheader();
		stickymobileheader();

		jQuery(window).resize(function () {
			stickyheader();
			FilterToggle();
			footer_toggle();
			stickymobileheader();
		});

		// Fix mobile gallery scrolling
		function fixMobileGalleryScrolling() {
			if ($(window).width() <= 767) {
				// Remove any overflow styles that might block scrolling
				$('.single-product-thumbnail .images').css({
					'overflow': 'visible',
					'max-height': 'none',
					'height': 'auto'
				});

				// Enable touch events on the entire gallery area
				$('.single-product-thumbnail').css({
					'touch-action': 'pan-y',
					'-webkit-overflow-scrolling': 'auto'
				});

				// Make sure images don't block scrolling
				$('.single-product-thumbnail .images img').css({
					'pointer-events': 'none'
				});

				console.log('Mobile gallery scrolling fixed');
			}
		}

		// Run on page load
		fixMobileGalleryScrolling();

		// Run on window resize
		$(window).on('resize', function() {
			setTimeout(fixMobileGalleryScrolling, 100);
		});

		// Also run when the gallery is updated (for variable products, etc.)
		$(document).on('DOMNodeInserted', '.single-product-thumbnail', function() {
			setTimeout(fixMobileGalleryScrolling, 100);
		});
		
		/**
		 * Trigger on Enter press
		 */
		jQuery(".quantity .qty").on("keypress", function (e) {
			if ((e.which || e.keyCode) === 13) {
				jQuery(this).parents(".product").find(".add_to_cart_button").trigger("click");
			}
		});

		jQuery(".quantity .qty").on("change", function () {
			var add_to_cart_button = jQuery(this).parents(".product").find(".add_to_cart_button");
			// For AJAX add-to-cart actions
			add_to_cart_button.attr("data-quantity", jQuery(this).val());
			// For non-AJAX add-to-cart actions
			add_to_cart_button.attr("href", "?add-to-cart=" + add_to_cart_button.attr("data-product_id") + "&quantity=" + jQuery(this).val());
		});

		jQuery("#typed").typed({
			strings: ["Best Collection", "Global Brands", "Iconic Products"],
			typeSpeed: 100,
			startDelay: 0,
			backSpeed: 60,
			backDelay: 1000,
			loop: true,
			cursorChar: "",
			contentType: 'html'
		});

		/**
		 * select box down icon
		 */
		jQuery("select").wrap("<div class='select-wrap'></div>");

		/**
				 * hamburger-menu toggle
				 */
		jQuery('#hamburger-menu ul.sub-menu').before('<span class="toggle-sub-menu"></span>');
		jQuery('#hamburger-menu li.menu-item-has-children .toggle-sub-menu').on('click', function () {
			jQuery(this).next('ul.sub-menu').slideToggle();
			jQuery(this).parent().siblings().children('ul').slideUp();
			jQuery(this).parent().toggleClass('show').siblings().removeClass('show');
		});


		/**
		 * search bx and hamburger menu
		 */
		jQuery('.search-icon > .search-wrap').on('click', function () {
			jQuery(this).next().slideDown('slow');
			jQuery(".top-search").addClass("show");
			jQuery(".top-search form input").focus();
			event.stopPropagation();
			event.preventDefault();
		});

		jQuery('.head-hamburger-menu > svg').on('click', function () {
			jQuery(this).next().slideDown('slow');
			event.stopPropagation();
			event.preventDefault();
		});

		jQuery('.head-hamburger-menu .humburger-title').on('click', function () {
			jQuery(this).next().slideToggle('slow');
			event.stopPropagation();
			event.preventDefault();
		});

		jQuery('.head-hamburger-menu > svg').on('click', function () {
			jQuery('body').addClass("hamburger-silde-toggle");
		});

		jQuery('.search-icon .search-wrap').on('click', function () {
			jQuery('body').addClass("search-silde-toggle");
		});

		/**
		 * search close icon
		 */
		jQuery('.top-search .search-close-btn, .search-icon .top-search .search-fix .product-search-close').on('click', function () {
			jQuery('.top-search').slideUp('slow');
			jQuery(".top-search").removeClass("show");
			jQuery('body').removeClass("search-side-toggle");
		})

		jQuery(document).on("click", function (event) {
			var trigger = jQuery(".search-fix")[0];
			var dropdown = jQuery(".search-fix");

			if (dropdown !== event.target && !dropdown.has(event.target).length && trigger !== event.target) {
				jQuery('.top-search').slideUp('slow');
				jQuery(".top-search").removeClass("show");
				jQuery('body').removeClass("search-side-toggle");
			}
		});

		// jQuery('.head-hamburger-menu .humburger-icon-wrap').on('click', function () {
		// 	jQuery('body').addClass("hamburger-side-toggle");
		// });

		/**
		 * top header close icon
		 */
		jQuery('#hamburger-menu').before('<span class="hamburger-close"><div class="hamburger-close-wrap"></div></span>');
		jQuery('.hamburger-close').on("click", function () {
			jQuery('.navbar-hamburger').slideUp('slow');
			jQuery('body').removeClass("hamburger-silde-toggle");
		});

		jQuery(document).on("click", function (event) {
			var trigger = jQuery(".navbar-hamburger-main")[0];
			var dropdown = jQuery(".navbar-hamburger-main");

			if (dropdown !== event.target && !dropdown.has(event.target).length && trigger !== event.target) {
				jQuery('.navbar-hamburger').slideUp();
				jQuery('body').removeClass("hamburger-silde-toggle");
			}
		});


		/**
		 * Grid List View
		 */

		jQuery('.product-sort-view a.filter.grid').on('click', function () {
			jQuery(this).addClass('active').siblings().removeClass('active');
			jQuery('div.products').addClass('grid-view').removeClass('list-view');
		});
		jQuery('.product-sort-view a.filter.list').on('click', function () {
			jQuery(this).addClass('active').siblings().removeClass('active');
			jQuery('div.products').addClass('list-view').removeClass('grid-view');
		});

		/**
		 * Blog masonry
		 */
		if (jQuery('div').hasClass('.blog.grid')) {
			jQuery('.grid').masonry({
				columnWidth: 200,
				itemSelector: '.grid-item'
			});
		}


		/**
		 * Shop masonry
		 */
		if (jQuery('div').hasClass('shop grid')) {
			jQuery('.grid').masonry({
				itemSelector: '.grid-item',
			});
		}

		/**
		 * Filter
		 */

		jQuery('.filter.full').on('click', function () {
			jQuery('#post_sidebar').slideToggle();
		});

		jQuery('.filter.offside-left, .filter.offside-right').on('click', function () {
			jQuery('#post_sidebar').slideToggle();
			jQuery('body').addClass("filter-toggle");
			event.stopPropagation();
			event.preventDefault();
		});

		jQuery('.site-main .offsidebar-left .widget-area .widget_block:first-child, .site-main .offsidebar-right .widget-area .widget_block:first-child').before('<span class="filter-close"></span>');
		jQuery('.filter-close').on("click", function () {
			jQuery('body').removeClass("widget-area");
		});


		jQuery(window).resize(FilterToggle);
		function FilterToggle() {
			if (jQuery(window).width() <= 991) {
				jQuery('.site-main .widget-area .widget_block:first-child').before('<span class="filter-close"></span>');
				jQuery('.filter-close').on("click", function () {
					jQuery('body').removeClass("filter-toggle");
				});
			}
		}

		jQuery(document).on("click", function (event) {

			var trigger = jQuery(".offside .widget-area")[0];
			var dropdown = jQuery(".offside .widget-area");

			if (dropdown !== event.target && !dropdown.has(event.target).length && trigger !== event.target) {
				jQuery('body').removeClass("filter-toggle");
			}
		});



		jQuery('.filter.right, .filter.left').on('click', function () {
			jQuery('#post_sidebar').slideDown();
			jQuery('body').addClass("toggle-filter");
			event.stopPropagation();
			event.preventDefault();
		});

		jQuery('.shop-sidebar .widget-area .woocommerce:first-child').before('<span class="filter-close"></span>');
		jQuery('.filter-close').on("click", function () {
			jQuery('body').removeClass("toggle-filter");
		});

		jQuery(document).on("click", function (event) {

			var trigger = jQuery(".shop-sidebar .widget-area")[0];
			var dropdown = jQuery(".shop-sidebar .widget-area");

			if (dropdown !== event.target && !dropdown.has(event.target).length && trigger !== event.target) {
				jQuery('body').removeClass("toggle-filter");
			}
		});

		jQuery(window).resize(FilterToggle);

		function FilterToggle() {
			if (jQuery(window).width() <= 991) {
				jQuery('.site-main .widget-area .widget_block:first-child').before('<span class="filter-close"></span>');
				jQuery('.filter-close').on("click", function () {
					jQuery('body').removeClass("filter-toggle");
				});
			}
		}

		jQuery(document).on("click", function (event) {

			var trigger = jQuery(".shop-sidebar .widget-area")[0];
			var dropdown = jQuery(".shop-sidebar .widget-area");

			if (dropdown !== event.target && !dropdown.has(event.target).length && trigger !== event.target) {
				jQuery('body').removeClass("filter-toggle");
			}
		});

		jQuery('.shop-sidebar .widget-area .woocommerce:first-child').before('<span class="filter-close"></span>');
		jQuery('.filter-close').on("click", function () {
			jQuery('body').removeClass("toggle-filter");
		});

		/**
		 * minicart
		 */
		jQuery(".mini-cart a.dropdown-back").on("click", function (event) {
			jQuery('body').addClass("side-toggle");
			event.stopPropagation();
			event.preventDefault();
		});
		jQuery('.dropdown-menu-mini-cart .cart-close').on("click", function () {
			jQuery('body').removeClass("side-toggle");
		});

		jQuery(document).on("click", function (event) {

			var trigger = jQuery(".cart-slider")[0];
			var dropdown = jQuery(".cart-slider");

			if (dropdown !== event.target && !dropdown.has(event.target).length && trigger !== event.target) {
				jQuery('body').removeClass("side-toggle");
			}
		});

		/**
		 * close notice
		 */
		const Nsession = localStorage.getItem('noticeSession');
		if (Nsession == "notice") {
			jQuery('.temp-notice').hide();
		} else {
			jQuery('.temp-notice > svg').on('click', function () {
				localStorage.setItem('noticeSession', 'notice');
				jQuery(".temp-notice").fadeOut(500);
			});
		}

		stickyleft();

		/**
		 * Header Sticky
		 */


		var prevScrollpos = window.pageYOffset;
		window.onscroll = function (e) {
			var currentScrollPos = window.pageYOffset;
			if (prevScrollpos > currentScrollPos) {
				document.getElementById("headerspacing").style.top = "0";
				e.stopPropagation();
			} else {
				document.getElementById("headerspacing").style.top = "-150px";
			}
			prevScrollpos = currentScrollPos;
		};

		function stickyheader() {
			if (jQuery(document).height() > jQuery(window).height()) {
				jQuery(window).on('scroll', function () {
					if (jQuery(window).width() >= 992) {
						if (jQuery('.header-sticky').hasClass("site-header")) {
							if (jQuery(this).scrollTop() > 400) {
								jQuery('.header-sticky').addClass("sticky");
								jQuery(".header-style-1 .header-spacing .site-main-wrap .site-wrap").insertAfter(".header-style-1 .header-spacing .site-branding-wrap .site-branding .header-logo");
							} else {
								jQuery('.header-sticky').removeClass("sticky");
								jQuery(".header-style-1 .site-wrap").prependTo(".header-style-1 .site-main-wrap");
							}
						} else {
							jQuery('.header-sticky').removeClass("sticky");
							jQuery(".header-style-1 .site-wrap").prependTo(".header-style-1 .site-main-wrap");
						}
					} else {
						jQuery('.header-sticky').removeClass("sticky");
					}
				});
			}
		}


		function stickymobileheader() {
			if (jQuery(document).height() > jQuery(window).height()) {
				jQuery(window).on('scroll', function () {
					if (jQuery(window).width() <= 991) {
						if (jQuery('.mobile-header-sticky').hasClass("site-header")) {
							if (jQuery(this).scrollTop() > 500) {
								jQuery('.mobile-header-sticky').addClass("mobile-sticky");
								jQuery(".header-style-1 .header-spacing .site-main-wrap .site-wrap").insertAfter(".header-style-1 .header-spacing .site-branding-wrap .site-branding .header-logo");
							} else {
								jQuery('.mobile-header-sticky').removeClass("mobile-sticky");
								jQuery(".header-style-1 .site-wrap").prependTo(".header-style-1 .site-main-wrap");
							}
						} else {
							jQuery('.mobile-header-sticky').removeClass("mobile-sticky");
							jQuery(".header-style-1 .site-wrap").prependTo(".header-style-1 .site-main-wrap");
						}
					} else {
						jQuery('.mobile-header-sticky').removeClass("mobile-sticky");
					}
				});
			}
		}


		/**
		 * Set the date we're counting down to
		 */
		setInterval(swapImages, 1000);

		jQuery('.product-360-button a').magnificPopup({
			type: 'inline',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			disableOn: false,
			preloader: false,
			fixedContentPos: false,
			callbacks: {
				open: function () {
					jQuery(window).resize()
				}
			}
		});

		jQuery('.progress-bar > span, .rating-percentage-bar > span').each(function () {
			var $this = jQuery(this);
			var width = jQuery(this).data('percent');

			$this.css({
				'transition': 'width 2s'
			});
			setTimeout(function () {
				$this.css('width', width + '%');
			}, 500);
		});

		// jQuery('.navbar-woocommerce a.navbar-title').on('click', function () {
		// 	jQuery(this).next('ul#woocommerce-menu').slideToggle();
		// 	jQuery('body').toggleClass('show-user').siblings().removeClass('show-user');
		// 	event.stopPropagation();
		// 	event.preventDefault();
		// });

		jQuery(document).on("click", function (event) {
			var trigger = jQuery(".navbar-woocommerce #woocommerce-menu")[0];
			var dropdown = jQuery(".navbar-woocommerce #woocommerce-menu");

			if (dropdown !== event.target && !dropdown.has(event.target).length && trigger !== event.target) {
				jQuery('.navbar-woocommerce a').next('ul#woocommerce-menu').slideUp();
				jQuery('body').removeClass('show-user');
			}
		});


		/**
		 * back to top
		 */
		var back_top_btn = jQuery('#section-top');
		jQuery(window).on('scroll', function () {
			if (jQuery(window).scrollTop() > 300) {
				back_top_btn.addClass('show');
			} else {
				back_top_btn.removeClass('show');
			}
		});
		back_top_btn.on('click', function () {
			jQuery('html, body').animate({ scrollTop: 0 }, 0);
		});

		var progressPath = document.querySelector('.back-to-top path');
		var pathLength = progressPath.getTotalLength();
		progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
		progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
		progressPath.style.strokeDashoffset = pathLength;
		progressPath.getBoundingClientRect();
		progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
		var updateProgress = function () {
			var scroll = jQuery(window).scrollTop();
			var height = jQuery(document).height() - jQuery(window).height();
			var progress = pathLength - (scroll * pathLength / height);
			progressPath.style.strokeDashoffset = progress;
		}
		updateProgress();
		jQuery(window).scroll(updateProgress);
		var offset = 50;
		var duration = 550;

		jQuery(window).on('scroll', function () {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.back-to-top').addClass('active-progress');
			} else {
				jQuery('.back-to-top').removeClass('active-progress');
			}
		});

		jQuery('.back-to-top').on('click', function (event) {
			event.preventDefault();
			jQuery('html, body').animate({ scrollTop: 0 }, duration);
			return false;
		});

		/**
		 * subscribe ( Newslatter )
		 */
		const EmailpSession = localStorage.getItem('emailSession');
		if (EmailpSession == "on") {
			jQuery('.email-popup-con').hide();
		} else {
			jQuery('.email-popup-con').delay(1000).fadeIn();
			jQuery('.nothanks').on('click', function () {
				jQuery(".email-popup-con").fadeOut(500);
				localStorage.setItem('emailSession', 'on');
			});
		}

		jQuery(document).on("click", function (event) {

			var trigger = jQuery(".newsletter .email-popup-inner-con")[0];
			var dropdown = jQuery(".newsletter .email-popup-inner-con");

			if (dropdown !== event.target && !dropdown.has(event.target).length && trigger !== event.target) {
				jQuery(".email-popup-con").fadeOut(500);
				localStorage.setItem('emailSession', 'on');
			}
		});

	});

	jQuery(window).resize(primaryMenuToggle);
	jQuery(window).resize(toggleResize);
	/**
	 * Function
	 */

	function primaryMenuToggle() {
		if (jQuery(window).width() <= 991) {
			jQuery('button.navbar-toggler').on('click', function () {
				jQuery('#primary-menu').slideToggle();
			});
		}
	}

	function swapImages() {

		// Get today's date and time
		var now = new Date().getTime();
		jQuery(".timer").each(function (index) {

			var countDownDateFrom = jQuery(this).parent().find('.sale-to').data('from') * 1000;
			var countDownDateTo = jQuery(this).parent().find('.sale-to').data('to') * 1000;
			var timer_id = jQuery(this).data('id');
			var sale_id = jQuery(this).parent().find('.sale-to').data('id');

			// Find the distance between now and the count down date
			if (countDownDateFrom <= now) {
				var distance = countDownDateTo - now;
			}

			if (countDownDateFrom <= now) {
				var distance = countDownDateTo - now;
			}

			if (distance > 0 && countDownDateFrom <= now) {
				// Time calculations for days, hours, minutes and seconds
				var days = ("0" + Math.floor(distance / (1000 * 60 * 60 * 24))).slice(-2);
				var hours = ("0" + Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).slice(-2);
				var minutes = ("0" + Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).slice(-2);
				var seconds = ("0" + Math.floor((distance % (1000 * 60)) / 1000)).slice(-2);

				if (timer_id == sale_id) {
					jQuery(this).find(".days").each(function () {
						jQuery(this).html(days);
					})
					jQuery(this).find(".hours").each(function () {
						jQuery(this).html(hours);
					})
					jQuery(this).find(".minutes").each(function () {
						jQuery(this).html(minutes);
					})
					jQuery(this).find(".second").each(function () {
						jQuery(this).html(seconds);
					})
				}
			}
		});

		if (jQuery('div').hasClass('timer-datetime')) {

			var $timeDate = jQuery('.timer-datetime').attr('data');
			var countDownTimer = new Date($timeDate).getTime();

			// Find the distance between now and the count down date
			var distance = countDownTimer - now;
			if (distance > 0) {
				// Time calculations for days, hours, minutes and seconds
				var days = ("0" + Math.floor(distance / (1000 * 60 * 60 * 24))).slice(-2);
				var hours = ("0" + Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).slice(-2);
				var minutes = ("0" + Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).slice(-2);
				var seconds = ("0" + Math.floor((distance % (1000 * 60)) / 1000)).slice(-2);
			} else {
				var days = "00";
				var hours = "00";
				var minutes = "00";
				var seconds = '00';
			}
			jQuery('.timer-date .days').html(days);
			jQuery('.timer-date .hours').html(hours);
			jQuery('.timer-date .minutes').html(minutes);
			jQuery('.timer-date .second').html(seconds);
		}

		if (jQuery('div').hasClass('timer-date')) {

			$timeDate = jQuery('.timer-date').attr('data');
			var countDownTimer = new Date($timeDate).getTime();

			// Find the distance between now and the count down date
			var distance = countDownTimer - now;
			if (distance > 0) {
				// Time calculations for days, hours, minutes and seconds
				var days = ("0" + Math.floor(distance / (1000 * 60 * 60 * 24))).slice(-2);
				var hours = ("0" + Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).slice(-2);
				var minutes = ("0" + Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).slice(-2);
				var seconds = ("0" + Math.floor((distance % (1000 * 60)) / 1000)).slice(-2);
			} else {
				var days = "00";
				var hours = "00";
				var minutes = "00";
				var seconds = '00';
			}
			// jQuery('.timer-date').html(days + ' : ' + hours + ' : ' + minutes + ' : ' + seconds);
			jQuery('.timer-date .days').html(days);
			jQuery('.timer-date .hours').html(hours);
			jQuery('.timer-date .minutes').html(minutes);
			jQuery('.timer-date .second').html(seconds);
		}
	}

	function toggleResize() {
		if (jQuery(window).width() <= 991) {
			jQuery('#primary-menu .sub-menu').before('<span class="toggle-sub-menu"></span>');
			jQuery('li.menu-item-has-children .toggle-sub-menu').on('click', function () {
				jQuery(this).next('ul.sub-menu').slideToggle();
				jQuery(this).parent().siblings().children('ul').slideUp();
				jQuery(this).parent().toggleClass('show').siblings().removeClass('show');
			});
		}
	}



	jQuery(window).resize(stickyleft);

	function stickyleft() {
		if (jQuery(window).width() >= 992) {
			if (jQuery(document).width() <= 1199) {
				jQuery('#post_content, #post_sidebar, .single-product-image, .single-product-content, #tab-reviews .product-review-tab, .single-product.thumbnail-slider-style1 .woocommerce-tabs #tab-reviews #reviews').theiaStickySidebar({
					additionalMarginBottom: 30,
					additionalMarginTop: 60
				});
			} else if (jQuery(document).width() >= 1200) {
				jQuery('#post_content, #post_sidebar, .single-product-image, .single-product-content, #tab-reviews .product-review-tab, .single-product.thumbnail-slider-style1 .woocommerce-tabs #tab-reviews #reviews').theiaStickySidebar({
					additionalMarginBottom: 30,
					additionalMarginTop: 50
				});
			}
		} else {
			jQuery('#post_content, #post_sidebar, .single-product-image, .single-product-content, #tab-reviews .product-review-tab, .single-product.thumbnail-slider-style1 .woocommerce-tabs #tab-reviews #reviews').removeAttr("style");
		}
	}

	jQuery(window).on('scroll', function () {
		if (jQuery(this).scrollTop() > 600 && jQuery(this).scrollTop() < 2000) {
			jQuery('.email-popup-con').addClass('fixed');
			jQuery('.sticky-addToCart').addClass('sticky');
		}
		else {
			jQuery('.email-popup-con').removeClass('fixed');
			jQuery('.sticky-addToCart').removeClass('sticky');
		}
	});





	jQuery(window).resize(ShopGrid);
	jQuery(window).load(ShopGrid);

	function ShopGrid() {
		if (jQuery(window).width() > 1199) {
			jQuery(".body-grid-4 #grid").addClass('active').siblings().removeClass('active');
			jQuery(".body-grid-3 #grid-3").addClass('active').siblings().removeClass('active');
			jQuery(".body-grid-2 #grid-2").addClass('active').siblings().removeClass('active');
			jQuery(".body-list-view #list").addClass('active').siblings().removeClass('active');
			jQuery(".body-short-view #short").addClass('active').siblings().removeClass('active');
		}
		if (jQuery(window).width() <= 1199 && jQuery(window).width() >= 576) {
			jQuery(".body-grid-3 #grid-3, .body-grid-4 #grid-3, .body-grid-5 #grid-3, .body-grid-6 #grid-3").addClass('active').siblings().removeClass('active');
			jQuery(".body-grid-2 #grid-2").addClass('active').siblings().removeClass('active');
			jQuery(".body-list-view #list").addClass('active').siblings().removeClass('active');
			jQuery(".body-short-view #short").addClass('active').siblings().removeClass('active');
		}
		if (jQuery(window).width() <= 767) {
			jQuery(".body-grid-2 #grid-2, .body-grid-3 #grid-2, .body-grid-4 #grid-2, .body-grid-5 #grid-2, .body-grid-6 #grid-2").addClass('active').siblings().removeClass('active');
			jQuery(".body-list-view #list").addClass('active').siblings().removeClass('active');
			jQuery(".body-short-view #short").addClass('active').siblings().removeClass('active');
		}
		if (jQuery(window).width() <= 480) {
			jQuery(".body-list-view #short").addClass('active').siblings().removeClass('active');
		}
	}
	if (jQuery(window).width() <= 991) {
		footer_toggle();
	}
	jQuery(window).resize(footer_toggle);

	function footer_toggle() {
		if (jQuery(window).width() <= 991) {
			if (jQuery('.footer-click').length != 0) {
				jQuery(".footer-click").remove();
			}
			jQuery("footer .widget h2.widget-title").append("<span class='footer-click'></span>");
		} else {
			jQuery(".footer-click").remove();
		}
		jQuery('footer .widget h2.widget-title .footer-click').on('click', function () {
			jQuery(this).toggleClass('footer-clicked');
			jQuery(this).parent().next().slideToggle();
		});
	}

	jQuery(".elementor-accordion-item").on('click', function () {
		jQuery('.elementor-accordion-item .elementor-tab-content').removeAttr('hidden');
	});

	jQuery(".single-product .related.products .products").removeClass('columns-5');

	/**
		 * Coming Soon
		 */
	if (jQuery('div').hasClass('coming-soon-page')) {
		jQuery('body').addClass('coming-soon-mode');
		jQuery('.coming-soon-mode .site-header').remove();
		jQuery('.coming-soon-mode .header-top').remove();
		jQuery('.coming-soon-mode .page-header').remove();
		jQuery('.coming-soon-mode footer').remove();
	}
	jQuery('.sticky-close').on('click', function () {
		jQuery('.sticky-addToCart').removeClass('sticky');
	});

	/**
		 * currency lung
		 */
	jQuery('.wcml-dropdown li.wcml-cs-active-currency').on('click', function () {
		jQuery('.wcml-cs-submenu').slideToggle();
		jQuery('.wcml-cs-submenu').css('visibility', 'visible');
		jQuery('body').toggleClass('dropdownlscs');
		jQuery('.wpml-ls-sub-menu').slideUp();
		jQuery('body').removeClass('dropdowncsls');
		event.stopPropagation();
		event.preventDefault();
	});
	jQuery(document).on("click", function (event) {
		var trigger = jQuery(".wcml-dropdown li.wcml-cs-active-currency .wcml-cs-submenu")[0];
		var dropdown = jQuery(".wcml-dropdown li.wcml-cs-active-currency .wcml-cs-submenu");

		if (dropdown !== event.target && !dropdown.has(event.target).length && trigger !== event.target) {
			jQuery('.wcml-cs-submenu').slideUp();
			jQuery('body').removeClass('dropdownlscs');
		}
	});
	jQuery('.wpml-ls-legacy-dropdown li.wpml-ls-item-legacy-dropdown').on('click', function () {
		jQuery('.wpml-ls-sub-menu').slideToggle();
		jQuery('.wpml-ls-sub-menu').css('visibility', 'visible');
		jQuery('body').toggleClass('dropdowncsls');
		jQuery('.wcml-cs-submenu').slideUp();
		jQuery('body').removeClass('dropdownlscs');
		event.stopPropagation();
		event.preventDefault();
	});
	jQuery(document).on("click", function (event) {
		var trigger = jQuery(".wpml-ls-legacy-dropdown li.wpml-ls-item-legacy-dropdown .wpml-ls-sub-menu")[0];
		var dropdown = jQuery(".wpml-ls-legacy-dropdown li.wpml-ls-item-legacy-dropdown .wpml-ls-sub-menu");

		if (dropdown !== event.target && !dropdown.has(event.target).length && trigger !== event.target) {
			jQuery('.wpml-ls-sub-menu').slideUp();
			jQuery('body').removeClass('dropdowncsls');
		}
	});


	// * currency lung end




	jQuery('.sticky-close').on('click', function () {
		jQuery('body').addClass('nosticky');
	});
	jQuery('.topbar-close').on('click', function () {
		jQuery('body').removeClass('header-top');
	});
	jQuery('.topbar-close').on('click', function () {
		jQuery('body').addClass('nosticky');
	});

	jQuery(".elementor-accordion-item").on('click', function () {
		jQuery('.elementor-accordion-item .elementor-tab-content').removeAttr('hidden');
	});




	jQuery('.single-product.thumbnail-slider-style2 .woocommerce-tabs ul li:first-child').addClass('show');
	jQuery('.single-product.thumbnail-slider-style3 .woocommerce-tabs ul li:first-child').addClass('show');
	jQuery('.single-product.thumbnail-slider-style2 .woocommerce-tabs ul li > a, .single-product.thumbnail-slider-style3 .woocommerce-tabs ul li > a').on('click', function () {
		jQuery(this).next().slideToggle('slow');
		jQuery(this).parent().siblings().children('.woocommerce-Tabs-panel').slideUp();
		jQuery(this).parent().toggleClass('show').siblings().removeClass('show');
	});
	jQuery(".single-product.thumbnail-slider-style2 .woocommerce-tabs ul li > a").append("<span class='slide-click'></span>");
	jQuery('.single-product.thumbnail-slider-style2 .woocommerce-tabs ul li > a .slide-click').on('click', function () {
		jQuery(this).toggleClass('slide-clicked');
	});

	jQuery(".single-product.thumbnail-slider-style3 .woocommerce-tabs ul li > a").append("<span class='slide-click'></span>");
	jQuery('.single-product.thumbnail-slider-style3 .woocommerce-tabs ul li > a .slide-click').on('click', function () {
		jQuery(this).toggleClass('slide-clicked');
	});

	if (jQuery(window).width() <= 575) {
		header_toggle();
	}
	jQuery(window).resize(header_toggle);

	function header_toggle() {
		if (jQuery(window).width() <= 575) {
			jQuery(".header-stickybar-wrap").addClass('sticky');
		} else {
			jQuery(".header-stickybar-wrap").removeClass('sticky');
		}
	}

	// img loading
	var image = jQuery('img[loading="lazy"]');
	image.attr('loading', 'eager');


	// mouse hover
	var element = jQuery('.mega-menu-link');
	function addClassOnHover() {
		jQuery('body').addClass('header-link');
	}
	function removeClassOnHover() {
		jQuery('body').removeClass('header-link');
	}
	/**
			 * Top view animation
			 * */

	var maxDeltaX = 30,
		maxDeltaY = 30;

	var maxDeltaX_01 = 20,
		maxDeltaY_01 = 20;

	var maxDeltaX_02 = 10,
		maxDeltaY_02 = 10;

	// Bind mousemove event to document
	jQuery(".section-top").on('mousemove', function (e) {

		// Get viewport dimensions
		var viewportWidth = document.documentElement.clientWidth,
			viewportHeight = document.documentElement.clientHeight;

		// Output range: [-1, 1]
		var mouseX = e.pageX / viewportWidth * 2 - 1,
			mouseY = e.pageY / viewportHeight * 2 - 1;

		// Calculate how much to transform the image
		var translateX = mouseX * maxDeltaX,
			translateY = mouseY * maxDeltaY;
		var translateX_01 = mouseX * maxDeltaX_01,
			translateY_01 = mouseY * maxDeltaY_01;
		var translateX_02 = mouseX * maxDeltaX_02,
			translateY_02 = mouseY * maxDeltaY_02;

		jQuery('.section-img-01').css('transform', 'translate(' + translateX + 'px, ' + translateY + 'px)');
		jQuery('.section-img-02').css('transform', 'translate(' + translateX_01 + 'px, ' + translateY_01 + 'px)');
		jQuery('.section-img-03').css('transform', 'translate(' + translateX_02 + 'px, ' + translateY_02 + 'px)');
		jQuery('.section-img-04').css('transform', 'translate(' + translateX + 'px, ' + translateY + 'px)');
		jQuery('.section-img-05').css('transform', 'translate(' + translateX_01 + 'px, ' + translateY_01 + 'px)');
		jQuery('.section-img-06').css('transform', 'translate(' + translateX_02 + 'px, ' + translateY_02 + 'px)');
		jQuery('.section-img-07').css('transform', 'translate(' + translateX + 'px, ' + translateY + 'px)');
	});
	jQuery('.toggle-filter').on('click', function () {
		jQuery('.toggle-filter').toggleClass('filter-click');
	});



})(jQuery);

// Add this to your custom.js file, after the existing code

jQuery(document).ready(function($) {
    
    // Function to convert slider to static gallery on mobile
    function convertSliderToGallery() {
        if ($(window).width() <= 767) {
            var $slider = $('.slider.nickx-slider-for');
            
            // Check if slider exists and hasn't been converted yet
            if ($slider.length && !$slider.hasClass('mobile-gallery-converted')) {
                
                // If it's a slick slider, destroy it
                if ($slider.hasClass('nslick-initialized')) {
                    $slider.slick('unslick');
                }
                
                // Mark as converted
                $slider.addClass('mobile-gallery-converted');
                
                // Remove slick classes
                $slider.removeClass('nslick-slider nslick-vertical nslick-initialized');
                
                // Get all slides
                var $slides = $slider.find('.nslick-slide');
                
                // Remove slick slide classes and inline styles
                $slides.each(function() {
                    $(this)
                        .removeClass('nslick-slide nslick-current nslick-active')
                        .removeAttr('data-nslick-index aria-hidden tabindex')
                        .css({
                            'width': '',
                            'position': '',
                            'overflow': ''
                        });
                    
                    // Remove zoom functionality on mobile
                    $(this).find('.zoom').removeClass('zoom');
                    
                    // Remove all zoomImg elements
                    $(this).find('.zoomImg').remove();
                });
                
                // Unwrap from slick-track and slick-list
                if ($slider.find('.nslick-track').length) {
                    $slider.find('.nslick-track').children().unwrap();
                }
                if ($slider.find('.nslick-list').length) {
                    $slider.find('.nslick-list').children().unwrap();
                }
                
                // Add gallery class
                $slider.addClass('mobile-static-gallery');
                
                // Hide navigation elements
                $('.product-popup-wrap, .slider-popup-wrap, .nslick-arrow, .nslick-dots').hide();
                
                // Enable natural scrolling
                $('.single-product-thumbnail .images').css({
                    'overflow': 'visible',
                    'max-height': 'none',
                    'height': 'auto',
                    'touch-action': 'pan-y'
                });
                
                console.log('Slider converted to mobile gallery');
            }
        }
    }
    
    // Function to restore slider on desktop
    function restoreSlider() {
        if ($(window).width() > 767) {
            var $slider = $('.slider.nickx-slider-for');
            
            if ($slider.hasClass('mobile-gallery-converted')) {
                // Remove mobile gallery class
                $slider.removeClass('mobile-gallery-converted mobile-static-gallery');
                
                // Show navigation elements
                $('.product-popup-wrap, .slider-popup-wrap').show();
                
                // Reload the page to reinitialize the slider properly
                // (or you can reinitialize the slick slider here if you have the settings)
                console.log('Desktop view detected - slider should be reinitialized');
            }
        }
    }
    
    // Run on page load
    convertSliderToGallery();
    
    // Run on window resize with debounce
    var resizeTimer;
    $(window).on('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            convertSliderToGallery();
            restoreSlider();
        }, 250);
    });
    
    // Disable zoom on mobile images
    if ($(window).width() <= 767) {
        $('.single-product .images .zoom').on('mousewheel DOMMouseScroll wheel touchmove touchstart', function(e) {
            // Allow natural scrolling, don't prevent default
            return true;
        });
        
        // Remove zoom initialization
        $('.single-product .images img').removeAttr('data-zoom-image');
    }
    
    // Ensure add to cart button is visible on mobile
    function ensureMobileCartButton() {
        if ($(window).width() <= 767) {
            // Force show the variation add to cart section
            $('.single-product .summary .woocommerce-variation-add-to-cart').show();
            $('.single-product .summary .cart').show();
            
            // Hide buy now buttons specifically
            $('.button-buy-now, .single_add_to_cart_button.button-buy-now').hide();
            
            // Show only main add to cart button
            $('.single_add_to_cart_button').not('.button-buy-now').first().show();
        }
    }
    
    ensureMobileCartButton();
    
    // Re-run when variations change
    $('form.variations_form').on('found_variation', function() {
        if ($(window).width() <= 767) {
            setTimeout(ensureMobileCartButton, 100);
        }
    });
});

/* KRAFTIART — simple static gallery on mobile (add to custom.js) */
(function($){
  "use strict";

  var KraftiStaticGallery = (function(){
    var MOBILE_MAX = 767;
    var selector = '.woocommerce-product-gallery'; // common WooCommerce product gallery root

    // store original HTML so we can restore it when switching back to desktop
    function ensureStoreOriginal($g){
      if (!$g.data('krafti-original-html')) {
        $g.data('krafti-original-html', $g.html());
      }
    }

    // destroy slick instances inside a gallery safely
    function destroySlickIfAny($g){
      try {
        // look for any slick-initialized elements in the gallery and unslick them
        $g.find('.slick-initialized').each(function(){
          if ($.fn.slick) {
            try { $(this).slick('unslick'); } catch(e){}
          }
        });
      } catch(e){}
    }

    // build static UI: main image + horizontal thumbs
    function buildStaticGallery($g){
      // already converted?
      if ($g.data('krafti-static')) return;

      ensureStoreOriginal($g);
      destroySlickIfAny($g);

      // collect images (try a few possible selectors used by themes)
      var $imgItems = $g.find('.woocommerce-product-gallery__image');
      if ($imgItems.length === 0) {
        // fallback: any img inside gallery
        $imgItems = $g.find('img').closest('figure, div');
      }
      if ($imgItems.length === 0) return;

      // build containers
      var $mainWrap = $('<div class="krafti-static-main" />');
      var $thumbWrap = $('<div class="krafti-static-thumbs" />');

      // clone and append: first image becomes main, all become possible thumbs
      $imgItems.each(function(idx){
        var $clone = $(this).clone(true, true); // clone events/attributes where possible
        $clone.addClass('krafti-thumb-item').attr('data-krafti-index', idx);

        // normalize image HTML so main always shows a full-size img element/link
        // if WooCommerce has <a href="..."><img ...></a> keep that structure in clones
        if (idx === 0) {
          $clone.addClass('krafti-main-item active');
          $mainWrap.append($clone);
        }
        // add as thumb (we will keep the first also as a thumb for consistent UX)
        var $small = $clone.clone(true, true).addClass('krafti-thumb-small');
        $thumbWrap.append($small);
      });

      // replace gallery content
      $g.empty().append($mainWrap).append($thumbWrap);
      $g.data('krafti-static', true);

      // bind click/tap on thumbs -> swap main
      $g.off('click.krafti').on('click.krafti', '.krafti-thumb-small, .krafti-thumb-item', function(e){
        e.preventDefault();
        var $clicked = $(this);
        var $newMain = $clicked.clone(true, true).removeClass('krafti-thumb-small').addClass('krafti-main-item active');
        $g.find('.krafti-static-main').empty().append($newMain);

        // add an "active" class to the clicked thumb for styling
        $g.find('.krafti-static-thumbs .krafti-thumb-small').removeClass('active');
        $clicked.addClass('active');

        // if theme uses zoom/magnifier on the big image, try to re-init (best-effort)
        if ($.fn.elevateZoom) {
          try {
            $g.find('.krafti-static-main img').removeData('elevateZoom');
            $g.find('.krafti-static-main img').elevateZoom();
          } catch(e){}
        }
      });

      // mark first thumb active
      $g.find('.krafti-static-thumbs .krafti-thumb-small').first().addClass('active');
    }

    // restore original HTML (when switching to desktop)
    function restoreOriginalGallery($g){
      if (!$g.data('krafti-static')) return;
      var original = $g.data('krafti-original-html') || '';
      if (original) {
        // unbind our events first
        $g.off('click.krafti');
        $g.empty().html(original);
        $g.removeData('krafti-static');
        // trigger a custom event so other scripts (e.g. the original slick initializer) can re-run
        $g.trigger('krafti:restored');
      }
    }

    function updateAll(){
      // if mobile -> build static, else restore
      var isMobile = window.matchMedia('(max-width: ' + MOBILE_MAX + 'px)').matches;
      $(selector).each(function(){
        var $g = $(this);
        if (isMobile) {
          buildStaticGallery($g);
        } else {
          restoreOriginalGallery($g);
        }
      });
    }

    // public init
    function init(){
      // run on ready
      $(document).ready(function(){
        updateAll();
      });
      // run on resize (debounced)
      var resizeTimer;
      $(window).on('resize.krafti', function(){
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(updateAll, 150);
      });
      // also watch orientationchange (phones)
      window.addEventListener('orientationchange', function(){
        setTimeout(updateAll, 200);
      });
    }

    return {
      init: init
    };
  })();

  // initialize
  KraftiStaticGallery.init();

})(jQuery);
