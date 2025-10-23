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
if ( ! empty( $kraftiart_options['header-clear-text'] ) ) {
	?>
	<li class="header-top-clear">
		<span><i class="fa-solid fa-percent"></i><?php echo do_shortcode( $kraftiart_options['header-clear-text'] ); ?></span>
	</li>
	<?php
}
