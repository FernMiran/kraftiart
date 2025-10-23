<?php
/**
 * Displays footer widgets if assigned
 *
 * @package WordPress
 * @subpackage kraftiart
 * @since kraftiart 1.0
 * @version 1.0
 */

if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
	$kraftiart_options = get_option( 'kraftiart_options' );
	$footer_style = isset( $_GET['footer_style'] ) ? sanitize_text_field( $_GET['footer_style'] ) : '';

	if ( is_active_sidebar( 'footer-1' ) ||
		is_active_sidebar( 'footer-2' ) ||
		is_active_sidebar( 'footer-3' ) ||
		is_active_sidebar( 'footer-4' ) ||
		is_active_sidebar( 'footer-5' ) ) :
		?>
		<div class="main-footer footer-widget">
			<div class="container">
				<div class="row">
				<?php
				$options = $kraftiart_options['footer-layout'];

				if ( 1 === (int) $options ) {
					if ( is_active_sidebar( 'footer-1' ) ) {
						?>
					<div class="col-lg-12">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
						<?php
					}
				}
				if ( 2 === (int) $options ) {
					if ( is_active_sidebar( 'footer-1' ) ) {
						?>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-2' ) ) {
						?>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
						<?php
					}
				}
				if ( 3 === (int) $options) {
					if ( is_active_sidebar( 'footer-1' ) ) {
						?>
					<div class="col-lg-5 col-sm-12 footer-01">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-2' ) ) {
						?>
					<div class="col-lg-4 col-sm-12 footer-02">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-3' ) ) {
						?>
					<div class="col-lg-3 col-sm-12 footer-03">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
						<?php
					}
				}
				if ( 4 === (int) $options || $footer_style == 2 ) {
					if ( is_active_sidebar( 'footer-1' ) ) {
						?>
					<div class="col-lg-4 col-sm-12 footer-01">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-2' ) ) {
						?>
					<div class="col-lg-3 col-sm-12 footer-02">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-3' ) ) {
						?>
					<div class="col-lg-2 col-sm-12 footer-03">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-4' ) ) {
						?>
					<div class="col-lg-3 col-sm-12 footer-04">
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</div>
						<?php
					}
				}	

				if ( 5 === (int) $options && $footer_style != 2 && $footer_style != 3) {
					if ( is_active_sidebar( 'footer-1' ) ) {
						?>
					<div class="col-lg-3 col-sm-12 footer-01">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-2' ) ) {
						?>
					<div class="col-lg-2 col-sm-12 footer-02">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-3' ) ) {
						?>
					<div class="col-lg-2 col-sm-12 footer-03">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-4' ) ) {
						?>
					<div class="col-lg-2 col-sm-12 footer-04">
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-5' ) ) {
						?>
					<div class="col-lg-3 col-sm-12 footer-05">
						<?php dynamic_sidebar( 'footer-5' ); ?>
					</div>
						<?php
					}
				}			
				?>
				</div>
			</div>
		</div>	
		<?php
	endif;
} else {
	if ( is_active_sidebar( 'footer-1' ) ||
		is_active_sidebar( 'footer-2' ) ||
		is_active_sidebar( 'footer-3' ) ||
		is_active_sidebar( 'footer-4' ) ||
		is_active_sidebar( 'footer-5' ) ) :
		?>
		<div class="main-footer footer-widget">
			<div class="container">
				<div class="row">
					<?php
					if ( is_active_sidebar( 'footer-1' ) ) {
						?>
						<div class="col-lg-3 col-md-6 col-sm-12 footer-01">
						<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-2' ) ) {
						?>
						<div class="col-lg-3 col-md-6 col-sm-12">
						<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-3' ) ) {
						?>
						<div class="col-lg-3 col-md-6 col-sm-12">
						<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-5' ) ) {
						?>
					<div class="col-lg-12 col-sm-12 footer-05">
						<?php dynamic_sidebar( 'footer-5' ); ?>
					</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
<?php endif;
}
