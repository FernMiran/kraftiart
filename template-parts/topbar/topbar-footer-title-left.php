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
$layout1 = $kraftiart_options['footer-top-option']['footer-left'];

if ( ! empty( $layout1['left-title'] ) && ! empty( $kraftiart_options['footer-left-title'] ) ) {
	?>
	<li class="list-inline-item">
		<span><?php echo html_entity_decode( $kraftiart_options['footer-left-title'] ); ?></span>
	</li>
	<?php
}
