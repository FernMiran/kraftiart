<?php
/**
 * kraftiart Header Top Address
 *
 * @package kraftiart
 * @subpackage kraftiart
 * @since kraftiart 1.0
 */

 /**
 * Header Top Address
 */
$kraftiart_options= get_option( 'kraftiart_options' );

if ( ! empty( $kraftiart_options['info-address'] ) ) {
	?>
	<li class="list-inline-item">
	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg><?php echo esc_html( $kraftiart_options['info-address'] ); ?>
	</li>
<?php }
