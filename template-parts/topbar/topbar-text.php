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
if ( $kraftiart_options['opt-top'] == 1 && ! empty( $kraftiart_options['header-info-text'] ) ) {
	?>
	<li class="list-inline-item">
		<span><i class="fa-brands fa-odnoklassniki"></i><?php echo do_shortcode( $kraftiart_options['header-info-text'] ); ?></span>
	</li>
	<?php
}
