<?php
/**
 * Enqueue all the custom script and style
 *
 * @package kraftiart
 */

/**
 * Enqueue script and style
 */
function kraftiart_custom_scripts(){
	
	global $wp_query;

	/**
	 * Enqueue script
	 */
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() .'/assets/js/bootstrap.min.js', array(), '5.0.2', true );
	wp_enqueue_script( 'font-awesome', get_template_directory_uri() .'/assets/js/all.min.js', array(), '5.15.4', true );
	wp_enqueue_script( 'ResizeSensor', get_template_directory_uri() .'/assets/js/ResizeSensor.min.js', array(), '1.7.0', true );
	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() .'/assets/js/theia-sticky-sidebar.min.js', array(), '1.7.0', true );
	wp_enqueue_script( 'threesixty', get_template_directory_uri() .'/assets/js/threesixty.min.js', array(), '2.3.0', true );
	wp_enqueue_script( 'jquery-magnific', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
	wp_enqueue_script( 'typed', get_template_directory_uri() .'/assets/js/typed.min.js', array(), '1.1.1', true );
	wp_enqueue_script( 'kursor', get_template_directory_uri() .'/assets/js/kursor.min.js', array(), '0.1.0', true );
	wp_enqueue_script( 'kraftiart-custom', get_template_directory_uri() .'/assets/js/custom.js', array(), '1.0.0', true );
	wp_enqueue_script( 'jquery-masonry' );
	
	/**
	 * Enqueue style
	 */
	wp_enqueue_style( 'summer-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Trirong:wght@100;200;300;400;500;600;700;800;900&family=Outfit:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" ', array(), null );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css', array(), '5.0.2', 'all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/css/all.min.css', array(), '5.15.4', 'all' );
	wp_enqueue_style( 'magnific', get_template_directory_uri() .'/assets/css/magnific-popup.css', array(), '1.1.0', 'all' );
	wp_enqueue_style( 'kursor', get_template_directory_uri() .'/assets/css/kursor.min.css', array(), '4.2.1', 'all' );
	
	$classes = get_body_class();

	if( class_exists( 'ReduxFramework' ) ) {
		$kraftiart_options = get_option( 'kraftiart_options' );
		$rtlmode = isset( $_GET['rtlmode'] ) ? sanitize_text_field( $_GET['rtlmode'] ) : '';
			if( $kraftiart_options['rtl'] == 'rtl' || $rtlmode == 'rtl' || in_array('rtl',$classes)){
			wp_enqueue_style( 'custom-rtl', get_template_directory_uri() .'/assets/css/custom-rtl.css', array(), '1.0.0', 'all' );
			wp_enqueue_style( 'responsive-rtl', get_template_directory_uri() .'/assets/css/responsive-rtl.css', array(), '1.0.0', 'all' );
	}
}
	wp_enqueue_style( 'kraftiart-custom', get_template_directory_uri() .'/assets/css/custom.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'kraftiart-responsive', get_template_directory_uri() .'/assets/css/responsive.css', array(), '1.0.0', 'all' );
 
	// register our main script but do not enqueue it yet
	wp_register_script( 'ajax_loadmore_post', get_template_directory_uri() . '/assets/js/custom-ajax.js', array('jquery') );
 
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'ajax_loadmore_post', 'kraftiart_loadmore_params', array(
		'ajaxurl' => home_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 
 	wp_enqueue_script( 'ajax_loadmore_post' );

}
add_action( 'wp_enqueue_scripts', 'kraftiart_custom_scripts', 10 );

/**
 * Enqueue adminSide script and style
 */
function kraftiart_custom_adminSide_scripts(){
	
	wp_enqueue_script( 'fontawesome', get_template_directory_uri() .'/assets/js/all.min.js', array(), '5.15.4', true );
	wp_enqueue_style( 'custom-admin', get_template_directory_uri() .'/assets/css/admin.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() .'/assets/css/all.min.css', array(), '5.15.4', 'all' );

}
add_action( 'admin_enqueue_scripts', 'kraftiart_custom_adminSide_scripts' );
