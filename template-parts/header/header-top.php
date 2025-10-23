<?php
/**
 * Header top
 *
 * @package WordPress
 * @subpackage kraftiart
 * @since 1.0
 * @version 1.1
 */

 if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
	$kraftiart_opt = get_option( 'kraftiart_options' );
	if( ! empty( $kraftiart_opt['top-nav-bar'] ) ){
		?><span class="temp-notice"><?php echo esc_html( $kraftiart_opt['top-nav-bar'] ); ?><i class="fas fa-times"></i></span><?php
	}
	if ( isset( $kraftiart_opt['opt-top'] ) ) {
		$opt = $kraftiart_opt['opt-top'];
		if ( $opt == 1 ) {
			?>
			<div class="header-top row">
				<div class="header-top-left col-xl-4 col-6">
					<ul>
						<?php
						$layout1 = $kraftiart_opt['header-top']['Left'];
						if ( $layout1 ) :
							foreach ( $layout1 as $key => $value ) {
								switch ( $key ) {
									case 'email':
										get_template_part( 'template-parts/topbar/topbar', 'email' );
										break;
									case 'phone':
										get_template_part( 'template-parts/topbar/topbar', 'phone' );
										break;
									case 'social-media':
										get_template_part( 'template-parts/topbar/topbar', 'social-media' );
										break;
									case 'text':
										get_template_part( 'template-parts/topbar/topbar', 'text' );
										break;
									case 'search':
										get_template_part( 'template-parts/topbar/topbar', 'search' );
										break;
									case 'address':
										get_template_part( 'template-parts/topbar/topbar', 'address' );
										break;
									case 'clear':
										get_template_part( 'template-parts/topbar/topbar', 'clear' );
										break;
								}
							}
						endif;
						?>
					</ul>
				</div>
				<div class="header-top-center col-sm-4">
					<ul>
						<?php
						$layout1 = $kraftiart_opt['header-top']['center'];
						if ( $layout1 ) :
							foreach ( $layout1 as $key => $value ) {
								switch ( $key ) {
									case 'email':
										get_template_part( 'template-parts/topbar/topbar', 'email' );
										break;
									case 'phone':
										get_template_part( 'template-parts/topbar/topbar', 'phone' );
										break;
									case 'social-media':
										get_template_part( 'template-parts/topbar/topbar', 'social-media' );
										break;
									case 'text':
										get_template_part( 'template-parts/topbar/topbar', 'text' );
										break;
									case 'search':
										get_template_part( 'template-parts/topbar/topbar', 'search' );
										break;
									case 'address':
										get_template_part( 'template-parts/topbar/topbar', 'address' );
										break;
									case 'clear':
										get_template_part( 'template-parts/topbar/topbar', 'clear' );
										break;
								}
							}
						endif;
						?>
					</ul>
				</div>
				<div class="header-top-right col-xl-6 col-6">
					<ul>
						<li>
						<?php
						$layout2 = $kraftiart_opt['header-top']['Right'];
						if ( $layout2 ) :
							foreach ( $layout2 as $key => $value ) {
								switch ( $key ) {
									case 'email':
										get_template_part( 'template-parts/topbar/topbar', 'email' );
										break;
									case 'phone':
										get_template_part( 'template-parts/topbar/topbar', 'phone' );
										break;
									case 'social-media':
										get_template_part( 'template-parts/topbar/topbar', 'social-media' );
										break;
									case 'text':
										get_template_part( 'template-parts/topbar/topbar', 'text' );
										break;
									case 'search':
										get_template_part( 'template-parts/topbar/topbar', 'search' );
										break;
									case 'address':
										get_template_part( 'template-parts/topbar/topbar', 'address' );
										break;
									case 'clear':
										get_template_part( 'template-parts/topbar/topbar', 'clear' );
										break;
								}
							}
						endif;
						?>
						</li>
						<li>
						<?php
						$kraftiart_opt = get_option( 'kraftiart_options' );
						$layout1 = $kraftiart_opt['header-top']['Right'];
						if ( $layout1 ) :
							foreach ( $layout1 as $key => $value ) {
								switch ( $key ) {
									case 'lang-menu':
										get_template_part( 'template-parts/topbar/topbar', 'language-menu' );
										break;
									case 'currency-menu':
										get_template_part( 'template-parts/topbar/topbar', 'currency-menu' );
										break;
								}
							}
						endif;
						?>
						</li>
					</ul>
				</div>
			</div>
			<?php
		}
	}
}
