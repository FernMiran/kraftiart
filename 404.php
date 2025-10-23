<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package kraftiart
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<section class="error-404 not-found">
						<?php
						if( class_exists( 'ReduxFramework' ) ) {
							$kraftiart_options = get_option( 'kraftiart_options' );
							if( ! empty( $kraftiart_options['404-image']['url'] ) ){
								printf( "<img src='%s' alt='%s'>", esc_url( $kraftiart_options['404-image']['url'] ), esc_attr__( '404','kraftiart' ) );
							} else {
								printf( "<h2>%s</h2>", esc_html__( '404','kraftiart' ) );
							}
							if( ! empty( $kraftiart_options['404-title'] ) ){
								printf( "<h3 class='page-title'>%s</h3>", esc_html( $kraftiart_options['404-title'] ) );
							} else {
								printf( "<h3 class='page-title'>%s</h3>", esc_html__( 'Oops! That page can&rsquo;t be found.', 'kraftiart' ) );
							}
							if( ! empty( $kraftiart_options['404-description'] ) ){ ?>
								<div class="page-content">
									<?php printf( "<p>%s</p>", esc_html( $kraftiart_options['404-description'] ) ); ?>
								</div><!-- .page-content -->
								<?php 
							}
							if( class_exists( 'woocommerce' ) ){
							?>
							<div class="product-search">
							<form name="product-search" method="get" class="search-form search__form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<div class="search-wrapper">
							
							<input type="search" name="s" class="search" placeholder="<?php echo esc_attr__( 'Search for product...', 'kraftiart' ); ?>" value="">
							<input type="hidden" name="product-search" value="1" />
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 471.701 471.701">
							<path d="M409.6,0c-9.426,0-17.067,7.641-17.067,17.067v62.344C304.667-5.656,164.478-3.386,79.411,84.479
							c-40.09,41.409-62.455,96.818-62.344,154.454c0,9.426,7.641,17.067,17.067,17.067S51.2,248.359,51.2,238.933
							c0.021-103.682,84.088-187.717,187.771-187.696c52.657,0.01,102.888,22.135,138.442,60.976l-75.605,25.207
							c-8.954,2.979-13.799,12.652-10.82,21.606s12.652,13.799,21.606,10.82l102.4-34.133c6.99-2.328,11.697-8.88,11.674-16.247v-102.4
							C426.667,7.641,419.026,0,409.6,0z"></path>
							<path d="M443.733,221.867c-9.426,0-17.067,7.641-17.067,17.067c-0.021,103.682-84.088,187.717-187.771,187.696
							c-52.657-0.01-102.888-22.135-138.442-60.976l75.605-25.207c8.954-2.979,13.799-12.652,10.82-21.606
							c-2.979-8.954-12.652-13.799-21.606-10.82l-102.4,34.133c-6.99,2.328-11.697,8.88-11.674,16.247v102.4
							c0,9.426,7.641,17.067,17.067,17.067s17.067-7.641,17.067-17.067v-62.345c87.866,85.067,228.056,82.798,313.122-5.068
							c40.09-41.409,62.455-96.818,62.344-154.454C460.8,229.508,453.159,221.867,443.733,221.867z"></path>
							</svg>
							
							<?php
							$wp_filesystem = new WP_Filesystem_Direct(null);
							$image_load = $wp_filesystem->get_contents( kraftiart_TH_ROOT .'assets/images/loading.svg' );
							echo html_entity_decode( $image_load ); ?>
							</div>
							<button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
							</form>
							<div class="search-results"></div>
							</div>
							<?php
							}else{
							get_search_form();
							}		
						} else {
							printf( '<h2>%s</h2>', esc_html__( '404','kraftiart' ) );
							printf( '<h3 class="page-title">%s</h3>', esc_html__( 'Oops! That page can&rsquo;t be found.', 'kraftiart' ) );
							?>					
							<div class="page-content">
								<?php printf( '<p>%s</p>', esc_html__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'kraftiart' ) ); ?>
							</div><!-- .page-content -->
						<?php } ?>
						<div class="back-home-button">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Back To Home', 'kraftiart' ); ?></a>
						</div>
					</section><!-- .error-404 -->
				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
