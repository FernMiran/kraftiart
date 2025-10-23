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
$layout1 = $kraftiart_options['footer-top-option']['footer-center'];

if ( ! empty( $layout1['center-title'] ) && ! empty( $kraftiart_options['footer-center-title'] ) ) {
	?>
	<li class="list-inline-item">
		<span><?php echo html_entity_decode( $kraftiart_options['footer-center-title'] ); ?></span>
	</li>
	<?php
}
