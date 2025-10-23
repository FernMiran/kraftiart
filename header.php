<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kraftiart
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Beau+Rivage&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/erick.css">

	<?php	

	if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
		$kraftiart_options = get_option( 'kraftiart_options' );

		if ( ! empty( $kraftiart_options['site-fevicon'] ) ) { ?>
				<link rel="shortcut icon" href="<?php echo esc_url( $kraftiart_options['site-fevicon']['url'] ); ?>">
		<?php
		} else {
			if ( ! function_exists( 'has_site_icon' ) || ! wp_site_icon() ) {
				echo wp_site_icon();
			}
		}
	} else {
		if ( ! function_exists( 'has_site_icon' ) || ! wp_site_icon() ) {
			echo wp_site_icon();
		}
	}
	wp_head(); ?>
	
	<style>
	
	.product-data .product-price .regular-price {
    color: #A53853!important;
}
	
		    @media (max-width: 940px){

.search-icon .top-search .search-fix .container .product-search {
    flex-direction: column!important;
}
	    }
	    
	    @media (max-width: 575px){
	        .search-form input[type=search] {
    display: inherit !important;
}

.search-icon .top-search .search-fix .container .product-search {
    flex-direction: column;
}
	    }

	</style>
 
</head>
	
<body <?php body_class(); ?>>
<?php
	if( $kraftiart_options['mobile-header-option'] == 'mobile-header-01' ){
	?>
		
	<?php }else{ ?>
		<div class="">
	<?php } ?>


	<?php wp_body_open(); ?>

	<?php
	/**
	 * Loader
	 */
	get_template_part( 'template-parts/header/site', 'loader' );
	?>
	<div class="viewport">
	<div id="page" class="site overflow-hidden">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'kraftiart' ); ?></a>

		<?php
		if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
			$kraftiart_options = get_option( 'kraftiart_options' );
			$header_style = isset( $_GET['header_style'] ) ? sanitize_text_field( $_GET['header_style'] ) : '';
				
				if( $header_style == 1 ){
					get_template_part( 'template-parts/header/header', 'one' );
				}elseif( $header_style == 2 ){
					get_template_part( 'template-parts/header/header', 'two' );
				}elseif( $header_style == 3 ){
					get_template_part( 'template-parts/header/header', 'three' );
				}elseif( $header_style == 4 ){
					get_template_part( 'template-parts/header/header', 'four' );
				}elseif( $header_style == 5 ){
					get_template_part( 'template-parts/header/header', 'five' );
				}elseif( $header_style == 6 ){
					get_template_part( 'template-parts/header/header', 'six' );
				}elseif( $header_style == 7 ){
					get_template_part( 'template-parts/header/header', 'seven' );
				}
				
				elseif( $kraftiart_options['header-style'] == "header-style-1"){
					get_template_part( 'template-parts/header/header', 'one' );
				} elseif( $kraftiart_options['header-style'] == "header-style-2"){
					get_template_part( 'template-parts/header/header', 'two' );
				} elseif( $kraftiart_options['header-style'] == "header-style-3"){
					get_template_part( 'template-parts/header/header', 'three' );
				} elseif( $kraftiart_options['header-style'] == "header-style-4"){
					get_template_part( 'template-parts/header/header', 'four' );
				} elseif( $kraftiart_options['header-style'] == "header-style-5"){
					get_template_part( 'template-parts/header/header', 'five' );
				} elseif( $kraftiart_options['header-style'] == "header-style-6"){
					get_template_part( 'template-parts/header/header', 'six' );
				}elseif( $kraftiart_options['header-style'] == "header-style-7"){
					get_template_part( 'template-parts/header/header', 'seven' );
				}
				
		}else{

			get_template_part( 'template-parts/header/header', 'one' );
		
		}
		?>
	
		<?php
		$page_header = '1';
		if ( $page_header == 1 || is_search() || is_category() ) {
			kraftiart_page_header();
		}
