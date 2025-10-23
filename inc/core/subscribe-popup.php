
<?php
/**
 * Subscribe Popup
 */

if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
	$kraftiart_options = get_option( 'kraftiart_options' );
	if( !empty( $kraftiart_options['subscribe-shortcode'] ) ){ ?>
		<div class="email-popup-con newsletter">
			<div class="email-popup-inner-con">
				<span class="nothanks"></span>

				<?php if( ! empty( $kraftiart_options['subscribe-image']['url'] ) ){ ?>
					<div class="email-popup-img-con col-12">		
						<div class="newsletter_01 newsletter">
							<img src="<?php echo esc_url( $kraftiart_options['subscribe-image']['url'] ); ?>" alt="<?php esc_attr__( 'Email Subscribe Image', 'kraftiart' ); ?>">
						</div>
					</div>
				<?php } ?>

				<div class="message-overlay-con col-12">
					<?php
					if( !empty( $kraftiart_options['subscribe-title'] ) ){ ?>
						<span class="message"><?php echo esc_html( $kraftiart_options['subscribe-title'] ); ?></span>
						<?php
					}
					if( !empty( $kraftiart_options['subscribe-title'] ) ){ ?>
						<span class="message-desc"><?php echo esc_html( $kraftiart_options['subscribe-text'] ); ?></span>
						<?php
					} ?>
				</div>
				<?php echo do_shortcode( $kraftiart_options['subscribe-shortcode'] ); ?>
			</div>
		</div>
		<?php
	}
}
