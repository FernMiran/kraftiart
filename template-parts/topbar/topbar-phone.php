<?php
/**
 * kraftiart Header Top Phone
 *
 * @package kraftiart
 * @subpackage kraftiart
 * @since kraftiart 1.0
 */

/**
 * Header Top Phone
 */
$kraftiart_options= get_option( 'kraftiart_options' );
if ( ! empty( $kraftiart_options['info-phone'] ) ) {
	?>
	<li class="list-inline-item header-top-tel"><a href="tel:<?php echo str_replace( str_split( '(),-" ' ), '', $kraftiart_options['info-phone'] ); ?>">
		<i class="fas fa-phone-alt"></i><?php echo esc_html( $kraftiart_options['info-phone'] ); ?></a>
	</li>
<?php }
