<?php
/**
 * kraftiart Redux Dynamic CSS
 *
 * @package kraftiart
 * @subpackage kraftiart
 * @since kraftiart 1.0
 */

/**
 * Redux Dynamic CSS
 */
function kraftiart_dynamic_css() {
	
	if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {

		$kraftiart_options = get_option( 'kraftiart_options' );

		$dynamic_css = '';

		// Header Transparent.
		$header_tran_bg = '';
		if ( $kraftiart_options['header-transparent'] == '1' ) {
			if ( ! empty( $kraftiart_options['header_tran_bg']['rgba'] ) ) {
				$header_tran_bg = $kraftiart_options['header_tran_bg']['rgba'];
			}
		}

		$container = $kraftiart_options['container-width'];
		$dynamic_css .= 
			'@media (min-width: '. $container['width'] .') {
				.container{
					max-width: '. $container['width'] .';
					width:  100%;
				}
			}';
			

		// Footer Color.
		if ( ! empty( $kraftiart_options['css-code'] ) ) {
			$kraftiart_css    = $kraftiart_options['css-code'];
			$dynamic_css .= esc_attr( $kraftiart_css );
		}
		wp_add_inline_style( 'kraftiart-responsive', $dynamic_css );
	}
}
add_action( 'wp_enqueue_scripts', 'kraftiart_dynamic_css', 20 );
