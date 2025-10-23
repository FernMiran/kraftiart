<?php
/**
 * Page Header
 *
 * @package kraftiart
 * @subpackage kraftiart
 * @since kraftiart 1.0
 */

/**
 * Page Header Function
 */
function kraftiart_page_header() {
	if ( ! is_front_page() && empty( $_GET['home'] ) && !is_page( '2075' ) && !is_page( '1096' ) && !is_page( '1394' )  && !is_page( '1774' ) && !is_page( '2679' )  && !is_page( '406' )&& !is_page( '408' )&& !is_page( '410' )&& !is_page( '261' )) {
			?>
		<div class="page-header inner-header-opacity">
			<div class="container">
				<?php
				if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
					$kraftiart_option = get_option( 'kraftiart_options' );
					$op_align = $kraftiart_option['ph-alignment'];
					if( '1' === $op_align ){ $align = 'start'; } 
					elseif( '2' === $op_align ) { $align = 'end'; }
					elseif( '3' === $op_align ) { $align = 'center'; }
					else { $align = 'center'; } 
				} else { $align = 'center'; }
				?>
				<div class="row kraftiart-page-title text-<?php echo esc_html( $align ); ?> align-items-<?php echo esc_html( $align ); ?> breadcrumb-items-<?php echo esc_html( $align ); ?>">
					<?php if( kraftiart_page_header_title()  !== null ){ ?>
					<div class="breadcrumb-title col-sm-12">
						<h1 class="title"><?php  kraftiart_page_header_title(); ?></h1>
					</div>
					<?php }
					if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
						$opt = $kraftiart_option['opt-breadcrumbs'];
						if ( $opt == 1 ) { ?>
							<div class="breadcrumbs col-sm-12">
								<ul class="page-breadcrumb">	
									<li class="home">
										<?php kraftiart_breadcrumbs(); ?>
									</li>
								</ul>
							</div>
						<?php }
					} else { ?>
						<div class="breadcrumbs col-sm-12">
							<ul class="page-breadcrumb">	
								<li class="home">
									<?php kraftiart_breadcrumbs(); ?>
								</li>
							</ul>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
<?php }
}
