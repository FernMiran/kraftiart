<?php
/**
 * kraftiart Header Top Button
 *
 * @package kraftiart
 * @subpackage kraftiart
 * @since kraftiart 1.0
 */

/**
 * Header Top Button
 */

$kraftiart_options= get_option( 'kraftiart_options' );

if ( isset( $kraftiart_options['head-top-button'] ) ) {
	$opt = $kraftiart_options['head-top-button'];
	if ( 'on' === (string) $opt ) {
		if ( ( ! empty( $kraftiart_options['button-title'] ) ) && ( ! empty( $kraftiart_options['button-link'] ) ) ) {
			$link  = $kraftiart_options['button-link'];
			$title = $kraftiart_options['button-title'];
			?>
			<li class="button">
				<div class="top-button">
					<a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $title ); ?></a>
				</div>
			</li>
			<?php
		}
	}
}
