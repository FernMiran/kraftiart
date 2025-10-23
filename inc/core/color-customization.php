<?php
/**
 * kraftiart Redux Color Customization
 *
 * @package kraftiart
 * @subpackage kraftiart
 * @since kraftiart 1.0
 */

/**
 * Redux Color Customization Function
 */
function kraftiart_color_customization() {

	$kraftiart_options = get_option( 'kraftiart_options' );
	$custom_css = '';

	$primary_color   = $kraftiart_options['primery-color'];
	$secondary_color = $kraftiart_options['secondary-color'];
	$tertiary_color  = $kraftiart_options['tertiary-color'];
	$border_color  = $kraftiart_options['border-color'];
	if( ! empty( $kraftiart_options['opt-palette-color'] ) ){
		$color_palette = $kraftiart_options['opt-palette-color'];
		if( $color_palette == "palettes-1" ){
			$secondary_color = "#222222";	
		}elseif( $color_palette == "palettes-2" ){
			$primary_color   = "#da6647";
			$secondary_color = "#222222";
		}elseif( $color_palette == "palettes-3" ){
			$primary_color   = "#5b8567";
			$secondary_color = "#222222";	
		}elseif( $color_palette == "palettes-4" ){
			$primary_color   = "#567284";
			$secondary_color = "#222222";
		}elseif( $color_palette == "palettes-5" ){
			$primary_color   = "#e48531";
			$secondary_color = "#222222";
		}elseif( $color_palette == "palettes-6" ){																				
			$primary_color   = "#202220";
			$secondary_color = "#383b38";
		}
	}

	// Primary Color.
	if ( ! empty( $primary_color ) ) {

		$custom_css .= "
		.tt-post-details .tt-post-title h2 a:hover, #gallary_tabs .category-name-wrap li.category-name.active a,  .order_details .woocommerce-table__line-item .product-name a:hover, .category-item-02 .cat_desc .wpcat-content .cat_total_product, footer .main-footer a:hover, .tt-feature-box:hover .tt-feature-box-containt .tt-feature-box-title,.left-header .head-top-call a:hover,.site-header #site-navigation ul.nav-menu li.menu-item:hover a, .site-header #site-navigation ul.nav-menu li.menu-item:focus a, .site-header #site-navigation ul.nav-menu li.menu-item:active a,.site-header #site-navigation ul.nav-menu li.menu-item.menu-item-has-children:hover > a::before, .site-header #site-navigation ul.sub-menu li.menu-item.menu-item-has-children:hover > a::before,.site-header #site-navigation ul.nav-menu li.menu-item ul.sub-menu li.menu-item:hover > a,.tt-section-sab,.elementor-widget.elementor-widget-image-box:hover .elementor-image-box-content .elementor-image-box-title,.cat_desc .wpcat-content .cat_name:hover,.ui-tabs-nav .ui-tabs-tab.ui-state-active a,.ui-tabs-nav .ui-tabs-tab a:hover,.product .price,.blog-section .swiper-navigation .swiper-button.swiper-button-prev:hover svg, .blog-section .swiper-navigation .swiper-button.swiper-button-next:hover svg, .product-trending .swiper-navigation .swiper-button.swiper-button-next:hover svg, .products-trending.product-swiper .swiper-navigation .swiper-button.swiper-button-next:hover svg,.banner-timer .timer-date > div:last-child p,.tt-feature-box-containt:hover h4,.tt-banner .banner-text .banner-sub-title,#page .blog-style .tt-post-title a:hover,.swiper-navigation .swiper-button:hover svg,.footer-top-section .mc4wp-form .mc4wp-form-fields .news_letter button:hover svg,.social-media li a.btn.btn-primary:hover,footer.site-footer a:hover,footer.site-footer a:hover,footer .widget .contact-info li a:hover svg,.back-to-top::after,.woocommerce-active #primary .widget_block ul li a:hover,.contact-info .contact-text:hover svg,.site-header ul#hamburger-menu li a:hover,.right-header .mini-cart .dropdown-menu-mini-cart .widget_shopping_cart_content ul li .product-details .quantity .amount,.right-header .mini-cart .dropdown-menu-mini-cart .widget_shopping_cart_content .quantity .total,.right-header .mini-cart .dropdown-menu-mini-cart .widget_shopping_cart_content .total .amount,.right-header .mini-cart .dropdown-menu-mini-cart .widget_shopping_cart_content .buttons .button:hover,.wc-block-stock-filter .wc-block-stock-filter-list li label:hover .wc-block-components-checkbox__label, .woocommerce-active #primary .widget_block .wc-block-attribute-filter ul li:hover label .wc-block-components-checkbox__label, .woocommerce-active #primary .widget_block .wc-block-attribute-filter ul li:hover > label,.right-header .mini-cart .dropdown-menu-mini-cart .widget_shopping_cart_content ul li .product-details,.woocommerce-account #primary .woocommerce .woocommerce-MyAccount-navigation ul li.is-active a, .woocommerce-account #primary .woocommerce .woocommerce-MyAccount-navigation ul li a:hover, .woocommerce-account .woocommerce .woocommerce-MyAccount-content h3 strong,.woocommerce-account .woocommerce .woocommerce-MyAccount-content h3 span a,.woocommerce-account .woocommerce .woocommerce-MyAccount-content h3 span a,.woocommerce-account .woocommerce a:hover
		{
            color: $primary_color;
		}";


		$custom_css .= "
		.site-header ul li > a::after, #mega-menu-wrap-header-menu #mega-menu-header-menu > li.mega-menu-item > a.mega-menu-link::before,.ui-tabs-nav .ui-tabs-tab a::before,
		.night-light-label .night-light-ball,.elementor-button-link .elementor-button-content-wrapper::before,.cat_desc .cat_image .cat_image_box::before,
		.single-product .stickycart-popup .cart-wrap .product-button, .category-grid.product-category .swiper-wrapper .swiper-slide > a .wpcat-content .cat_name::after,.pagination .page-numbers li .current, .pagination .page-numbers li > a:hover, .pagination .page-numbers li > a:active, .pagination .page-numbers li > a:focus,  .slider-buttom-04 .elementor-button::after, .woocommerce-checkout .woocommerce .checkout .order_review-wrap .order_review-bg #payment .place-order .button, .page .cart-content-right .checkout-button, footer.footer-style-2 .footer-top-section, .btn-primary::after, .tt-banner .banner-tag a, .header-swiper, .product .product-button::after, .right-header .mini-cart .dropdown-back .basket-item-count #mini-cart-count, .pagination .page-numbers li .current, .pagination .page-numbers li > a:hover, .pagination .page-numbers li > a:active, .pagination .page-numbers li > a:focus, .section-back-to-top:hover, footer .widget_block input[type='submit']:hover, input[type='submit']:hover, .tt-post-more a:focus::before, .tt-post-more a:active::before, .right-header .mini-cart .dropdown-menu-mini-cart .widget_shopping_cart_content .buttons .button.checkout,.header-top,.header-style-1 .right-header .mini-cart .dropdown-back .basket-item-count #mini-cart-count,section.product .kraftiart-sale span,.return-to-shop .btn.btn-secondary::after, .product-layout-default section.product .cart-wrap a::after, .product .product-button-wrap .btn-hv a::after,.product-layout-morden .product .cart-wrap a::after,.product .product-button-wrap .compare a.added,.back-to-top:hover,.sidebar-filter li.wc-block-product-categories-list-item:hover .wc-block-product-categories-list-item-count,.navbar-hamburger ul.hamburger-nav li.show > span::before, .navbar-hamburger ul.hamburger-nav li:hover span::before,.site-header ul#hamburger-menu li a::after,.woocommerce-active.archive .products.short-view .product .list-cart-wrap .cart-wrap .product-button, .woocommerce-active.archive .products.list-view .product .list-cart-wrap .cart-wrap .product-button,.buy-now-wrap .btn-primary,.single-product .product .entry-summary .cart-wrap .product-button::after,.thumbnail-slider-style1 .left-slider .single-product-thumbnail #nickx-gallery i.thumb_arrow.btn-next:hover, .single-product-thumbnail #nickx-gallery i.thumb_arrow.btn-next:hover, .thumbnail-slider-style1 .left-slider .single-product-thumbnail #nickx-gallery i.thumb_arrow.btn-prev:hover, .single-product-thumbnail #nickx-gallery i.thumb_arrow.btn-prev:hover,.thumbnail-slider-style1 .single-product-thumbnail .images .product-360-slider-wrap .slider.nslick-slider i.nslick-arrow:hover,.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a::after,.woocommerce-account button.btn.btn-primary,.woocommerce-account button.btn.btn-secondary
		{
			background-color : $primary_color;
		}";
	
		$custom_css .= "
		.night-light-label .night-light-ball{
			background : $primary_color !important;
		}";

		$custom_css .= "
		.cat_desc:hover .cat_image::after,
	.pagination .page-numbers li .current, .pagination .page-numbers li > a:hover, .pagination .page-numbers li > a:active, .pagination .page-numbers li > a:focus, .pagination .page-numbers li .current, .pagination .page-numbers li > a:hover, .pagination .page-numbers li > a:active, .pagination .page-numbers li > a:focus,.right-header .mini-cart .dropdown-menu-mini-cart .widget_shopping_cart_content .buttons .button:hover,.woocommerce-active #primary .widget_block ul li:hover .wc-block-components-checkbox label .wc-block-components-checkbox__input
		{ 
			  border-color: $primary_color; 
		}";

		$custom_css .= "
		.back-to-top svg.progress-circle path,
		.navbar-woocommerce .navbar-title:hover > svg, .search-icon .search-wrap:hover svg, .right-header .mini-cart:hover .dropdown-back svg,
		.header_style .site-branding .right-header div a:hover svg,
		.mini-cart .empty-cart:hover svg, .head-hamburger-menu:hover svg{
			stroke: $primary_color; 
		}";

	}

	// Secondary Color.
	if ( ! empty( $secondary_color ) ) {

		$custom_css .= "
		#gallary_tabs .category-name-wrap li.category-name a, .tt-banner .banner-text a.banner-button, .tt-banner .banner-text, .site-wrap .main-navigation ul li a,.site-header #site-navigation ul.nav-menu li.menu-item a, .head-hamburger-menu svg, .more-comment-wrap .tt-post-more a, .item .wpcat-content a, .tt-feature-box .tt-feature-box-containt .tt-feature-box-title,.banner-timer .timer-head, .woocommerce.widget .widget-title,  .woocommerce-tabs ul li a,.thumbnail-wrap .timer p.saleend,  #gallary_tabs .category-name-wrap li a, #gallary_tabs .category-button a, .testimonial-wrap .testimonial-info-wrapper .testimonial-title,.single-product .product_meta .sku_wrapper, .single-categories span, .single-product .site-main .xs_social_share_widget ul li a span, .woocommerce .woocommerce-form-coupon-toggle .woocommerce-info a, woocommerce-additional-fields h3
		{ 
			color: $secondary_color; 
		}";


		$custom_css .= "
		.woocommerce-checkout .woocommerce .checkout .order_review-wrap .order_review-bg #payment .place-order .button::after, .page .cart-content-right .checkout-button::after, .tt-banner .banner-tag a::after, .right-header .mini-cart .dropdown-menu-mini-cart .widget_shopping_cart_content .buttons .button.checkout::before, #gallary_tabs .category-button a::after
		{
			background : $secondary_color;
		}";

	}

	// Tertiary Color.
	if ( ! empty( $tertiary_color ) ) {

		$custom_css .= " 
		 .tt-banner .banner-text.kraftiart-icon-center,  h1.title, .page-header .breadcrumbs #crumbs, .page-header .breadcrumbs #crumbs a
		{
			 color: $tertiary_color; 
		} ";

	}

	// Border Color.
	if ( ! empty( $border_color ) ) {

		$custom_css .= " 
		.single-product .entry-summary .list-timer, .tt-post-meta-wrap, .search-form input[type='search'], .widget.widget_search input[type='search'], .wp-block-search input[type='search'], .single-product .product .sticky-addToCart .quantity, .variations_form .variations td.value .select_box.attribute_pa_size .select_option span, table.wishlist_table tbody td, .woocommerce-account .woocommerce-MyAccount-content .edit-account fieldset, .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation, .woocommerce-account .woocommerce #customer_login .u-column1, .woocommerce-checkout .woocommerce .checkout .order_review-wrap .shop_table th, .woocommerce-checkout .woocommerce .checkout .order_review-wrap .shop_table td, .woocommerce-cart .cart-content-left th, .woocommerce-cart .cart-content-left td, .woocommerce-cart .woocommerce-cart-form .product-quantity .quantity, .single-product .product .sticky-addToCart .quantity, .single-product.thumbnail-slider-style2 .woocommerce-tabs ul li, .single-product.thumbnail-slider-style3 .woocommerce-tabs ul li, .single-product .product .entry-summary .price, .single-product .product_meta, .single-product .woocommerce-tabs ul.tabs, .single-product .woocommerce-tabs, .woocommerce-active.archive .shop-sidebar .sidebar-filter .widget, .woocommerce-active.archive .shop-nosidebar .widget, .product-top-sorting .select-wrap select, .woocommerce .select2-container--default .select2-selection--single, .widget_block .wc-block-price-filter__title::after, .widget .wc-block-attribute-filter__title::after, .woocommerce.widget .widget-title::after, .widget .wc-block-attribute-filter .components-form-token-field, .product .product-button-wrap, .product .product-button-wrap .btn-hv::before, .right-header .mini-cart .dropdown-menu-mini-cart .cart-slider, .page-links a.post-page-numbers, .pagination .page-numbers li>a, .pagination .page-numbers li>span, .comment-list li.comment .comment-body, #post_sidebar .widget ul li, #post_sidebar .widget ol li, .single-post .tt-post-details ul.wp-block-archives-list li, footer.site-footer, .wp-block-table.is-style-stripes, blockquote, .wp-block-quote.is-style-large, table, table td, table th, .woocommerce-active.single-post .tt-post-wrapper, .widget-area .widget, .blog .format-standard .tt-post-wrapper,
		{
			 border-color: $border_color; 
		} ";

	}


	wp_add_inline_style( 'kraftiart-custom', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'kraftiart_color_customization', 10 );
