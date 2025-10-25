<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$sticky_content = '';
if( class_exists( 'ReduxFramework' ) ) {
	$kraftiart_options = get_option( 'kraftiart_options' );
	$thumbnail_slider = isset( $_GET['thumbnail_slider'] ) ? sanitize_text_field( $_GET['thumbnail_slider'] ) : '';

	if( $thumbnail_slider == 1 ){
		$sticky_content = "";
		$sticky_product_content = "";
	}elseif( $thumbnail_slider == 2 || $thumbnail_slider == 3 ){
		$sticky_content = "single-product-image";
		$sticky_product_content = "single-product-content";
	}elseif( $kraftiart_options['product-thumbnail-slider'] == "thumbnail-slider-style1" ){
		$sticky_content = "";
		$sticky_product_content = "";
	}else{
		$sticky_content = "single-product-image";
		$sticky_product_content = "single-product-content";
	}
	$sticky_content = "col-lg-7";
	$sticky_product_content = "col-lg-5";
	
}else{
	$sticky_content = "col-lg-5 single-product-default";
	$sticky_product_content = 'col-lg-7 single-content-default';
}
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<style>

.btn_cheja {
    /* Estilos básicos para el botón/enlace */
    text-decoration: none; /* Remueve el subrayado de los enlaces por defecto */
    color: #25d366!important; /* Color WhatsApp verde */
    background-color: transparent; /* Fondo transparente */
    cursor: pointer; /* Cambia el cursor a la mano al pasar por encima */
    display: inline-flex;
    align-items: center;
    padding: 8px 12px;
    border: 2px solid #25d366;
    border-radius: 25px;
    transition: all 0.3s ease;
    font-weight: 500;
}

.btn_cheja:hover {
    /* Estilos al pasar el cursor */
    background-color: #25d366;
    color: white !important;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(37, 211, 102, 0.3);
}

.btn_cheja svg {
    margin-right: 8px;
    transition: transform 0.3s ease;
}

.btn_cheja:hover svg {
    transform: scale(1.1);
}



.single-product.thumbnail-slider-style2 .woocommerce-tabs ul li:last-child, .single-product.thumbnail-slider-style3 .woocommerce-tabs ul li:last-child {
    border-top: none;
    overflow-y: auto;
    height: 300px;
    overflow-x: hidden;
}

.single-product.thumbnail-slider-style2 .woocommerce-tabs ul li a, .single-product.thumbnail-slider-style2 .woocommerce-tabs ul li a:not(.single-product.thumbnail-slider-style2 ul li #review_form a), .single-product.thumbnail-slider-style3 .woocommerce-tabs ul li a, .single-product.thumbnail-slider-style3 .woocommerce-tabs ul li a:not(.single-product.thumbnail-slider-style3 ul li #review_form a) {
 
    margin-left: 20px;
}

.description_tab:before {
    content: '';
    background: url(https://cheja.clicme.marketing/wp-content/uploads/2024/03/4.png) no-repeat center center;
    background-size: 20px 20px;
    display: inline-flex;
    width: 20px;
    height: 20px;
    margin-right: 79px;
    vertical-align: middle;
    position: relative;
    left: -7px;
    top: 26px;
}

.additional_information_tab:before {
     content: '';
   background: url(https://cheja.clicme.marketing/wp-content/uploads/2024/03/3.png); /* Ruta al archivo SVG o imagen del ��cono */
    background-size: 20px 20px;
    display: inline-flex;
    width: 20px;
    height: 20px;
    margin-right: 79px;
    vertical-align: middle;
    position: relative;
    left: -7px;
    top: 26px;
}

.reviews_tab:before {
     content: '';
    background: url(https://cheja.clicme.marketing/wp-content/uploads/2024/03/1.png); /* Ruta al archivo SVG o imagen del ��cono */
     background-size: 20px 20px;
    display: inline-flex;
    width: 20px;
    height: 20px;
    margin-right: 79px;
    vertical-align: middle;
    position: relative;
    left: -7px;
    top: 26px;
}

.shipping_notes_tab:before {
     content: '';
    background: url(https://cheja.clicme.marketing/wp-content/uploads/2024/03/2.png); /* Ruta al archivo SVG o imagen del ��cono */
    background-size: 20px 20px;
    display: inline-flex;
    width: 20px;
    height: 20px;
    margin-right: 79px;
    vertical-align: middle;
    position: relative;
    left: -7px;
    top: 26px;
}

.single-product.thumbnail-slider-style2 .woocommerce-tabs ul li a .slide-click::after, .single-product.thumbnail-slider-style3 .woocommerce-tabs ul li a .slide-click::after {
   
    position: relative;
    left: -30px;
}



.single-product.thumbnail-slider-style2 .woocommerce-tabs ul li, .single-product.thumbnail-slider-style3 .woocommerce-tabs ul li {
    padding: 15px;
    border-top: 1px solid var(--border-color)!important;
    
}

.single-product.thumbnail-slider-style2 .woocommerce-tabs ul li, .single-product.thumbnail-slider-style3 .woocommerce-tabs ul li {
    padding: 15px;
    border: none;
}

.single-product .product-estimate .delivery-shipping-wrap .estimated-delivery {
    margin: 0 0 7px;
    padding: 0 0 0 15px;
    font-size: 20px;
    position: relative;
    left: 10px;
    font-weight: 600;
}

.single-product .product-estimate .delivery-shipping-wrap span {
    font-size: 20px;
    color: var(--color-text);
    font-weight: 500;
    margin: -1px 5px 0 5px;
}


.single-product .product-estimate .delivery-shipping-wrap .estimated-delivery::after {
    top: 2px!important;
    bottom: 0;
    margin: auto;
    font-size: 19px;
    color: var(--color-text);
}
/*Finde  icons */

/*Nota de env��o */

.woocommerce-tabs .panel h2 {
    margin-bottom: 0.5em;
    font-size: 20px;
    margin-top: 0.5em;
}

.woocommerce-tabs .panel p {
    line-height: 2.5;
}
/*Finde  notas de env��o */

.single-product .entry-summary .woocommerce-product-details__short-description {
    padding: 0 0 12px;
    border-bottom: 1px solid #e5e5e5;
    margin: 0 0 12px;
    display: none!important;
}

.single-product .product-type-variable .product_meta {
    border-bottom: none;
}

#nickx-gallery {
  transition: visibility 0.5s, opacity 0.5s ease-in-out;
  opacity: 1;
}


#pa_medidas option:hover {
  background-color: #f0f0f0 !important; /* Asegurar que este estilo tenga prioridad */
}



.nslick-track {
    position: sticky;
    top: 0;
    left: 0;
    display: block;
}

.single-product .summary .single_variation_wrap .woocommerce-variation-add-to-cart .single_add_to_cart_button.button-buy-now {
    background: #a63854 !important;
    display: none !important;
}

/* Hide all buy now buttons */
.button-buy-now,
.single_add_to_cart_button.button-buy-now,
.woocommerce-variation-add-to-cart .button-buy-now {
    display: none !important;
}

/* Hide any secondary add to cart buttons */
.single-product .summary .cart .single_add_to_cart_button:not(:first-of-type) {
    display: none !important;
}

    

    .single-product .single-product-thumbnail .images {
        float: left;
        width: 100%;
        overflow: scroll;
        height: auto;
        max-height: 1200px;
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }

    .attached.enabled {
        padding: 100px 0 !important;

    }

    .entry-summary .variations_form .variations tr td.value select {
        font-size: 14px;
        padding: 17px 50px 14px 16px;
        width: 100%;
    }

    .entry-summary .variations_form .variations tr td.value select {
        font-size: 20px;
        padding: 17px 50px 14px 16px;
        width: 100%;
    }

    .single-product.thumbnail-slider-style2 .woocommerce-tabs ul li a,
    .single-product.thumbnail-slider-style2 .woocommerce-tabs ul li a:not(.single-product.thumbnail-slider-style2 ul li #review_form a),
    .single-product.thumbnail-slider-style3 .woocommerce-tabs ul li a,
    .single-product.thumbnail-slider-style3 .woocommerce-tabs ul li a:not(.single-product.thumbnail-slider-style3 ul li #review_form a) {
        justify-content: space-between;
        display: flex;
        font-size: 20px;
    }
    
    .single-product.thumbnail-slider-style2 .woocommerce-tabs ul li:hover, .single-product.thumbnail-slider-style2 .woocommerce-tabs ul li a:hover, .single-product.thumbnail-slider-style3 .woocommerce-tabs ul li:hover, .single-product.thumbnail-slider-style3 .woocommerce-tabs ul li a:hover {
    color: #a63854;
}

.single-product .woocommerce-product-details__short-description p {
    margin: 0;
    color: #555;
    display: none;
}

.single-product .entry-summary .woocommerce-product-rating {
    display: none;
    align-items: center;
    margin: 0 0 10px;
    float: left;
    width: 100%;
}

.single-product .product .entry-summary .price {
    margin: 0 0 12px;
    font-size: 15px;
    border-bottom: 1px solid var(--border-color);
    padding: 0 0 12px;
    justify-content: start;
    gap: 10px;
}

.product .price .amount bdi, .product .price ins {
    text-decoration: none;
    font-weight: 500;
    font-size: 24px;
    font-family: var(--primary-font);
    line-height: 20px;
    display: flex;
}

.single-product.thumbnail-slider-style2 .woocommerce-tabs ul li:last-child, .single-product.thumbnail-slider-style3 .woocommerce-tabs ul li:last-child {
    border-top: none;
    overflow-y: auto;
    height: 300px;
    overflow-x: hidden;

    /* Oculta la barra de desplazamiento en navegadores WebKit */
    ::-webkit-scrollbar {
        display: none;
    }

    /* Oculta la barra de desplazamiento en Firefox */
    scrollbar-width: none;
}

@media(max-width:900px){
    .single-product .single-product-thumbnail .images {
        float: left;
        width: 100%;
        overflow: visible !important; /* Changed from scroll to visible */
        height: auto;
        max-height: none !important; /* Remove max-height restriction */
        -ms-overflow-style: none;
        scrollbar-width: none;
        touch-action: pan-y; /* Enable vertical scrolling */
    }
    
    /* Ensure all children don't block scrolling */
    .single-product .single-product-thumbnail .images * {
        touch-action: pan-y;
    }
}

@media(max-width:767px){
	/* General mobile fixes */
    /* Override any display:none that might hide the add to cart button */
    .single-product .summary .woocommerce-variation-add-to-cart,
    .single-product .summary .cart,
    .single-product .summary form.cart {
        display: block !important;
    }
    
    /* Ensure the add to cart section is visible */
    .single-product .summary .cart {
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px solid #e5e5e5;
    }
    
    /* Reset any theme-specific hiding */
    .single-product .product .entry-summary .product-button-wrap {
        display: block !important;
    }
    .single-product .single-product-thumb-content {
        flex-direction: column;
    }
    
    .single-product .single-product-thumb,
    .single-product .single-product-detail {
        max-width: 100% !important;
        flex: none !important;
        padding: 0 15px;
    }
    
    .single-product .single-product-thumbnail .images {
        float: left;
        width: 100%;
        overflow: visible !important;
        height: auto;
        max-height: none !important;
        overflow-x: hidden;
        overflow-y: visible !important;
        -webkit-overflow-scrolling: auto; /* Remove special scrolling */
        touch-action: pan-y;
    }
    
    .single-product .summary.entry-summary {
        margin-top: 20px;
        padding: 20px 0;
    }
    
    .single-product .product .entry-summary .price {
        font-size: 20px;
        margin-bottom: 15px;
        padding-bottom: 15px;
    }
    
    .product .price .amount bdi, .product .price ins {
        font-size: 22px;
    }
    
    .entry-summary .variations_form .variations tr td.value select {
        padding: 15px 40px 12px 15px;
        font-size: 16px;
        min-height: 50px;
        -webkit-appearance: none;
        background-image: url('data:image/svg+xml;charset=US-ASCII,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4 5"><path fill="%23333" d="M2 0L0 2h4zm0 5L0 3h4z"/></svg>');
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 12px;
    }
    
    .single-product .woocommerce-tabs ul.tabs {
        border-bottom: 1px solid #e5e5e5;
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
    }
    
    .single-product .woocommerce-tabs ul.tabs li {
        margin-bottom: 10px;
        border: 1px solid #e5e5e5;
        border-radius: 8px;
        overflow: hidden;
        width: 100%;
    }
    
    .single-product .woocommerce-tabs ul.tabs li a {
        padding: 15px 20px;
        font-size: 16px;
        line-height: 1.4;
        display: block;
        width: 100%;
        text-align: left;
        touch-action: manipulation; /* Disable double-tap zoom */
    }
    
    .single-product .woocommerce-tabs .panel {
        padding: 20px 15px;
        line-height: 1.6;
    }
    
    .woocommerce-tabs .panel h2 {
        font-size: 18px;
        margin-bottom: 15px;
    }
    
    .woocommerce-tabs .panel p {
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 15px;
    }
    
    /* Fix icon positioning on mobile */
    .description_tab:before,
    .additional_information_tab:before,
    .reviews_tab:before,
    .shipping_notes_tab:before {
        position: relative;
        top: 0;
        left: 0;
        margin-right: 10px;
        display: inline-block;
        vertical-align: middle;
    }
    
    /* Add to cart button mobile optimization */
    .single-product .summary .single_variation_wrap .woocommerce-variation-add-to-cart .single_add_to_cart_button {
        padding: 15px 20px;
        font-size: 16px;
        width: 100%;
        margin-top: 15px;
        border-radius: 6px;
        touch-action: manipulation;
        display: block !important; /* Force display on mobile */
        background-color: #a63854;
        color: white;
        border: none;
        text-transform: uppercase;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .single-product .summary .single_variation_wrap .woocommerce-variation-add-to-cart .single_add_to_cart_button:hover {
        background-color: #8b2e46;
        transform: translateY(-1px);
        box-shadow: 0 4px 10px rgba(166, 56, 84, 0.3);
    }
    
    /* Ensure simple products also show add to cart button */
    .single-product .summary .cart .single_add_to_cart_button {
        padding: 15px 20px;
        font-size: 16px;
        width: 100%;
        margin-top: 15px;
        border-radius: 6px;
        touch-action: manipulation;
        display: block !important;
        background-color: #a63854;
        color: white;
        border: none;
        text-transform: uppercase;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .single-product .summary .cart .single_add_to_cart_button:hover {
        background-color: #8b2e46;
        transform: translateY(-1px);
        box-shadow: 0 4px 10px rgba(166, 56, 84, 0.3);
    }
    
    /* Quantity selector mobile optimization */
    .single-product .summary .cart .quantity {
        margin-bottom: 15px;
        width: 100%;
    }
    
    .single-product .summary .cart .quantity input.qty {
        width: 100%;
        padding: 12px 15px;
        font-size: 16px;
        border: 2px solid #e5e5e5;
        border-radius: 6px;
        text-align: center;
        -webkit-appearance: none;
        -moz-appearance: textfield;
        touch-action: manipulation;
    }
    
    .single-product .summary .cart .quantity input.qty:focus {
        border-color: #a63854;
        outline: none;
        box-shadow: 0 0 0 3px rgba(166, 56, 84, 0.1);
    }
    
    /* Hide quantity buttons on mobile, use number input instead */
    .single-product .summary .cart .quantity .qty-btn {
        display: none;
    }
    
    /* Product meta mobile styling */
    .single-product .product_meta {
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px solid #e5e5e5;
    }
    
    /* Image zoom fix for mobile */
    .woocommerce-product-gallery__trigger {
        display: none !important; /* Hide zoom trigger on mobile */
    }
    
    .woocommerce-product-gallery {
        opacity: 1 !important;
    }
	
    /* Remove any sticky positioning that might interfere */
    .nslick-track {
        position: relative !important;
        top: auto !important;
        left: auto !important;
    }
    
    /* Ensure images don't block touch events */
    .single-product .single-product-thumbnail .images img {
        pointer-events: none; /* Allow touch events to pass through */
        -webkit-user-drag: none;
        user-select: none;
    }
    
    /* But allow clicking on links/buttons */
    .single-product .single-product-thumbnail .images a,
    .single-product .single-product-thumbnail .images button {
        pointer-events: auto;
    }
}

@media(max-width:480px){
    .single-product .single-product-thumbnail .images {
        max-height: none !important;
        overflow: visible !important;
    }
    
    .single-product .summary.entry-summary {
        padding: 15px 0;
    }
    
    .entry-summary .variations_form .variations tr td.value select {
        font-size: 14px;
        padding: 12px 35px 10px 12px;
        min-height: 45px;
    }
    
    .single-product .woocommerce-tabs ul.tabs li a {
        padding: 12px 15px;
        font-size: 14px;
    }
    
    .woocommerce-tabs .panel {
        padding: 15px 10px;
    }
    
    .woocommerce-tabs .panel h2 {
        font-size: 16px;
    }
    
    .woocommerce-tabs .panel p {
        font-size: 13px;
    }
    
    /* Smaller WhatsApp button for very small screens */
    .btn_cheja {
        padding: 6px 10px;
        font-size: 13px;
        border-radius: 20px;
    }
    
    .btn_cheja svg {
        width: 18px;
        height: 18px;
        margin-right: 6px;
    }
    
    /* Fix container padding on very small screens */
    .container {
        padding-left: 10px;
        padding-right: 10px;
    }
    
    /* Force add to cart button visibility on small screens */
    .single-product .summary .single_variation_wrap .woocommerce-variation-add-to-cart .single_add_to_cart_button,
    .single-product .summary .cart .single_add_to_cart_button {
        display: block !important;
        padding: 12px 18px;
        font-size: 14px;
        min-height: 48px;
    }
}

/* Touch optimization for all mobile devices */
@media (hover: none) and (pointer: coarse) {
    .single-product .woocommerce-tabs ul.tabs li a {
        min-height: 44px; /* Minimum touch target size */
        touch-action: manipulation;
    }
    
    .btn_cheja {
        min-height: 44px;
        touch-action: manipulation;
    }
    
    .entry-summary .variations_form .variations tr td.value select {
        min-height: 44px;
        touch-action: manipulation;
    }
}

.nslick-list {
    height: auto !important;
}


.single-product .product_meta { 
    display: none;
}

/* Note: Removed display:none from product-button-wrap to show add to cart button on mobile */

.woocommerce-product-attributes.shop_attributes tr:nth-of-type(2) {
    display: none;
}

.single-product.thumbnail-slider-style2 .woocommerce-tabs ul li a, .single-product.thumbnail-slider-style2 .woocommerce-tabs ul li a:not(.single-product.thumbnail-slider-style2 ul li #review_form a), .single-product.thumbnail-slider-style3 .woocommerce-tabs ul li a, .single-product.thumbnail-slider-style3 .woocommerce-tabs ul li a:not(.single-product.thumbnail-slider-style3 ul li #review_form a) {
    justify-content: start;
    display: flex;
    font-size: 20px;
    align-items: center;
}


 
.kraftiart-static-gallery {
    position: relative;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.kraftiart-static-gallery__badge {
    position: absolute;
    top: 18px;
    left: 18px;
    z-index: 5;
}

.kraftiart-static-gallery__primary,
.kraftiart-static-gallery__item {
    margin: 0;
}


.kraftiart-static-gallery__image {
    width: 100%;
    aspect-ratio: 1/1;
    object-fit: cover;
    display: block;
    border-radius: 8px;
    max-width: 100%;
    height: auto;
    background: #f7f7f7;
}


.kraftiart-static-gallery__secondary {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
    gap: 12px;
}

@media(max-width: 767px){
    .kraftiart-static-gallery {
        gap: 16px;
    }

    .kraftiart-static-gallery__secondary {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    .kraftiart-static-gallery__item {
        width: 100%;
    }
    .kraftiart-static-gallery__image {
        aspect-ratio: 1/1;
        width: 100%;
        height: auto;
        max-width: 100%;
        object-fit: cover;
    }
}

@media(max-width: 767px){
    .kraftiart-static-gallery {
        gap: 16px;
    }

    .kraftiart-static-gallery__secondary {
        grid-template-columns: repeat(2, 1fr);
    }
}


</style>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

<div class="container">
   
	<div class="single-product-thumb-content row">
		<?php
			do_action( 'woocommerce_single_product_prev_next' );
		?>
		<div class="col-12 col-md-7 <?php echo esc_attr( $sticky_content ); ?> single-product-thumb">
			<div class="single-product-thumbnail">
                <?php
                $gallery_image_ids = array();
                if ( $product && is_a( $product, 'WC_Product' ) ) {
                    $featured_image_id = $product->get_image_id();
                    if ( $featured_image_id ) {
                        $gallery_image_ids[] = $featured_image_id;
                    }
                    $additional_images = $product->get_gallery_image_ids();
                    if ( ! empty( $additional_images ) ) {
                        $gallery_image_ids = array_merge( $gallery_image_ids, $additional_images );
                    }
                }

                $gallery_image_ids = array_values( array_unique( array_filter( $gallery_image_ids ) ) );
                $primary_image_id = $gallery_image_ids ? array_shift( $gallery_image_ids ) : 0;

                $badge_markup = '';
                if ( has_action( 'woocommerce_before_single_product_summary_pl' ) ) {
                    ob_start();
                    do_action( 'woocommerce_before_single_product_summary_pl' );
                    $badge_markup = trim( ob_get_clean() );
                }
                ?>
                <div class="kraftiart-static-gallery single-product-image">
                    <?php if ( $badge_markup ) : ?>
                        <div class="kraftiart-static-gallery__badge"><?php echo $badge_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
                    <?php endif; ?>
                    <div class="kraftiart-static-gallery__primary">
                        <?php
                        if ( $primary_image_id ) {
                            echo wp_get_attachment_image( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                $primary_image_id,
                                'woocommerce_single',
                                false,
                                array(
                                    'class'   => 'kraftiart-static-gallery__image',
                                    'loading' => 'eager',
                                )
                            );
                        } else {
                            echo sprintf(
                                '<img src="%1$s" alt="%2$s" class="kraftiart-static-gallery__image" />',
                                esc_url( wc_placeholder_img_src() ),
                                esc_attr__( 'Awaiting product image', 'woocommerce' )
                            );
                        }
                        ?>
                    </div>
                    <?php if ( ! empty( $gallery_image_ids ) ) : ?>
                        <div class="kraftiart-static-gallery__secondary">
                            <?php foreach ( $gallery_image_ids as $image_id ) : ?>
                                <figure class="kraftiart-static-gallery__item">
                                    <?php echo wp_get_attachment_image( $image_id, 'woocommerce_thumbnail', false, array( 'class' => 'kraftiart-static-gallery__image', 'loading' => 'lazy' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </figure>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
			</div>
		</div>
		
		<div class="col-12 col-md-5 <?php echo esc_attr( $sticky_product_content ); ?> single-product-detail">
			<section class="summary entry-summary">
				<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked bbloomer_prev_next_product - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
			     * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				
				do_action( 'woocommerce_single_product_summary' );

				/**
				 * Hook: woocommerce_product_button.
				 *
				 * @hooked product_wishlist_quickview_compare - 10
				 */
				do_action( 'woocommerce_product_button' );

				/**
				 * Meta
				 */
				do_action( 'woocommerce_single_product_meta_summary' );
					
				/**
				 * Estimated Delivery Date
				 */
				if( class_exists( 'ReduxFramework' ) ) {
					$kraftiart_options = get_option( 'kraftiart_options' );
					if( $kraftiart_options['single-estimate-shiping'] == 1 ){
						echo '<div class="product-estimate">';
							do_action( 'woocommerce_product_estimated_delivery' );
						echo '</div>';
					}
				}
				
				if( class_exists( 'ReduxFramework' ) ) {
					if( $thumbnail_slider == 2 || $thumbnail_slider == 3 ){
						do_action( 'custom_single_products_summary' );
					}elseif( $kraftiart_options['product-thumbnail-slider'] == 'thumbnail-slider-style2' || $kraftiart_options['product-thumbnail-slider'] == 'thumbnail-slider-style3' ){
						do_action( 'custom_single_products_summary' );
					}
				}
				?>
				
			</section>
		</div>

		<?php if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) { ?>
			<div class="sticky-addToCart">
				<div class="sticky-close"></div>
				<div class="container">
					<div class="stickycart-popup">
						<?php
							do_action( 'add_to_cart_information' );
						?>

						<div class="stickycart-wrap">
							<?php 
								if ( 'grouped' == $product->get_type() ) {
									do_action( 'woocommerce_grouped_add_to_cart' );
								}elseif ( 'variable' == $product->get_type() ) {
									do_action( 'woocommerce_variable_add_to_cart' );
								}elseif ( 'external' == $product->get_type() ) {
									do_action( 'woocommerce_external_add_to_cart' );
								}elseif ( 'simple' == $product->get_type() ) {
									do_action( 'woocommerce_simple_add_to_cart' );
								}
							?>
						</div>
					</div>
				</div>
				
				<script>
	    document.addEventListener('DOMContentLoaded', function() {
	  var select = document.getElementById('pa_medidas');

	  if (!select) {
	    return;
	  }

	  function hoverBackgroundColor(event) {
	    if (event.target.tagName === 'OPTION') {
	      event.target.style.backgroundColor = '#f0f0f0';
	    }
	  }

	  function resetBackgroundColor(event) {
	    if (event.target.tagName === 'OPTION') {
	      event.target.style.backgroundColor = '';
	    }
	  }

	  Array.prototype.forEach.call(select.options, function(option) {
	    option.addEventListener('mouseover', hoverBackgroundColor);
	    option.addEventListener('mouseout', resetBackgroundColor);
	  });
	});

	// Traducir
	jQuery(document).ready(function($) {
  // Cambia "Estimated Delivery" a "Entrega Estimada"
   // Cambia "Estimated Delivery" a "<span>Env��o (estimado)</span>"
  $('.estimated-delivery').each(function() {
    var html = $(this).html();
    if (html.includes('Estimated Delivery')) {
      $(this).html(html.replace('Estimated Delivery', '<span>Entrega</span>'));
    }
  });

  // Cambia "Related Products" a "Productos Relacionados" solo para el producto con ID espec��fico
  $('#product-5371 .related.products h3').each(function() {
    var texto = $(this).text();
    if (texto.includes('Related Products')) {
      $(this).text(texto.replace('Related Products', 'Productos Relacionados'));
    }
  });
  
  // Force show add to cart button on mobile
  function ensureAddToCartVisible() {
    if ($(window).width() <= 767) {
      // Show add to cart forms
      $('.single-product .summary .cart, .single-product .summary .woocommerce-variation-add-to-cart').show();
      
      // Hide buy now buttons specifically
      $('.button-buy-now, .single_add_to_cart_button.button-buy-now').hide();
      
      // Show only the main add to cart button
      $('.single_add_to_cart_button').not('.button-buy-now').css({
        'display': 'block !important',
        'visibility': 'visible',
        'opacity': '1'
      });
      
      // Show product button wrap
      $('.product-button-wrap').show();
      
      // Remove any hiding styles from main add to cart button only
      $('.single_add_to_cart_button').not('.button-buy-now').removeClass('hidden').attr('style', function(i, style) {
        return style ? style.replace(/display\s*:\s*none\s*!important/g, '') : '';
      });
      
      // Hide duplicate buttons - keep only the first add to cart button
      $('.single_add_to_cart_button').not(':first').not('.button-buy-now').hide();
    }
  }
  
  // Run on page load
  ensureAddToCartVisible();
  
  // Hide buy now buttons on page load
  $('.button-buy-now, .single_add_to_cart_button.button-buy-now, .woocommerce-variation-add-to-cart .button-buy-now').hide();
  
  // Remove duplicate add to cart buttons, keep only one
  $('.single_add_to_cart_button').not(':first').not('.button-buy-now').each(function(index) {
    if (index > 0) {
      $(this).remove();
    }
  });
  
  // Run when variations change
  $('form.variations_form').on('found_variation', function() {
    setTimeout(ensureAddToCartVisible, 100);
  });
  
  // Run on window resize
  $(window).on('resize', function() {
    ensureAddToCartVisible();
  });
});








	</script>
	
			</div> 
		<?php } ?>
		<?php
			/**
			* Social Share
			*/
			do_action( 'kraftiart_social_share' );
		?>
	</div>	
</div>

<?php 
	if( class_exists( 'ReduxFramework' ) ) {
		if( $thumbnail_slider == 2 || $thumbnail_slider == 3 ||  $kraftiart_options['product-thumbnail-slider'] == 'thumbnail-slider-style2' || $kraftiart_options['product-thumbnail-slider'] == 'thumbnail-slider-style3' ){ 
		?>
			<div class="product-border"></div>
		<?php
		}
	}
?>

	<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		if( class_exists( 'ReduxFramework' ) ) {
			if( $thumbnail_slider == 1 ){
				do_action( 'custom_single_products_summary' );
			}elseif( $kraftiart_options['product-thumbnail-slider'] == 'thumbnail-slider-style1' && $thumbnail_slider != 2 && $thumbnail_slider != 3 ){
				do_action( 'custom_single_products_summary' );
			}

			if( $thumbnail_slider == 2 || $thumbnail_slider == 3 ){
				do_action( 'woocommerce_after_single_product_summary_style2' );
			}elseif( $kraftiart_options['product-thumbnail-slider'] == 'thumbnail-slider-style2' || $kraftiart_options['product-thumbnail-slider'] == 'thumbnail-slider-style3' && $thumbnail_slider != 1 ){
				do_action( 'woocommerce_after_single_product_summary_style2' );
			}
		}else{
			do_action( 'custom_single_products_summary' );
		}
	?>
</div>
<div class="container">
	<div class="recent-product <?php single_list_class(); ?>">
		<?php do_action( 'woocommerce_after_single_product' ); ?>
	</div>
	
</div>
