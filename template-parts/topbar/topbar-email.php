<?php
/**
 * kraftiart Header Top Email
 *
 * @package kraftiart
 * @subpackage kraftiart
 * @since kraftiart 1.0
 */

/**
 * Header Top Email
 */
$kraftiart_options= get_option( 'kraftiart_options' );
if ( ! empty( $kraftiart_options['info-email'] ) ) {
	?>
	<li class="list-inline-item"><a href="mailto:<?php echo esc_attr( $kraftiart_options['info-email'] ); ?>">
		<i class="fas fa-envelope"></i><?php echo esc_html( $kraftiart_options['info-email'] ); ?></a>
	</li>
	<?php
}
