<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage kraftiart
 * @since kraftiart 1.0
 * @version 1.0
 */

$kraftiart_options = get_option( 'kraftiart_options' );
if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
	?>
	<div class="site-loader">
		<div id="loader-center">
			<?php 
			if ( ! empty( $kraftiart_options['site-loader']['url'] ) ) {
					$loader = $kraftiart_options['site-loader']['url'];
				?>
				<img src="<?php echo esc_url( $loader ); ?>" alt="<?php esc_attr_e( 'loader', 'kraftiart' ); ?>">
				<?php
			}
			?>
		</div>
	</div><!-- .site-branding -->
	<?php
} else {
	$loader = get_template_directory_uri() . '/assets/images/loader.gif';
	?>
	<div class="site-loader">
		<div id="loader-center">
			<img src="<?php echo esc_url( $loader ); ?>" alt="<?php esc_attr_e( 'loader', 'kraftiart' ); ?>">
		</div>
	</div><!-- .site-branding -->
	<?php
}
