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
if ( ! empty( $kraftiart_options['header-lang-menu'] ) ) {
	?>
	<li class="list-inline-item">
		<?php echo do_shortcode( $kraftiart_options['header-lang-menu'] ); ?>
	</li>
	<?php
}
