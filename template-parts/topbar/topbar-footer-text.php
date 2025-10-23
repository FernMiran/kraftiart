<?php
/**
 * kraftiart Header Text
 *
 * @package kraftiart
 * @subpackage kraftiart
 * @since kraftiart 1.0
 */

/**
 * Header Text
 */

$kraftiart_options= get_option( 'kraftiart_options' );
if ( $kraftiart_options['footer-top'] == 1 && ! empty( $kraftiart_options['footer-top-text'] ) ) {
	?>
	<li class="list-inline-item">
		<span><?php echo do_shortcode( $kraftiart_options['footer-top-text'] ); ?></span>
	</li>
	<?php
}
