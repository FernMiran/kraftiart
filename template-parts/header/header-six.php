<?php get_template_part( 'template-parts/header/header', 'top' ); ?><?php
/**
 * Headr One
 */ ?>
<header id="masthead" <?php kraftiart_header_class(); ?>>
<div class="header-line">
	<div id="headerspacing" class="header-spacing">
	<?php $kraftiart_options = get_option( 'kraftiart_options' );
	if( $kraftiart_options['container-option'] == 'container-01' ){
	?>
	<div class="container">
<?php }else{ ?>
	<div class="container-fluid">
	<?php } ?>
	<div class="site-branding d-flex align-items-center floadt-start w-100">
		<?php
			if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
			$kraftiart_options = get_option( 'kraftiart_options' );
			if( has_custom_logo() ) {
				the_custom_logo();
			}
			elseif( $kraftiart_options['opt-logo'] == "1" ){
				$dark_logo_url = $kraftiart_options['site-logo-03']['url'];
				$light_logo_url = $kraftiart_options['light-site-logo']['url'];
				if( ! empty( $dark_logo_url ) ){ ?>
				<div class="header-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php if( $kraftiart_options['dark-light-mode'] == 0 ){ ?>
							<img class="img-fluid logo" loading="lazy" src="<?php echo esc_url( $light_logo_url ); ?>" alt="<?php esc_attr_e( 'Logo', 'kraftiart' ); ?>">
						<?php }else{ ?>
							<img class="img-fluid logo" loading="lazy" src="<?php echo esc_url( $dark_logo_url ); ?>" alt="<?php esc_attr_e( 'Logo', 'kraftiart' ); ?>">
						<?php } ?>
					</a>
				</div>
		<?php }
			}else{
				$logo_text = $kraftiart_options['text-logo'];
				if( ! empty( $logo_text ) ){
		?>
			<h1 class="logo" alt="<?php esc_attr_e( 'Logo', 'kraftiart' ); ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( $logo_text ); ?></a>
			</h1>
		<?php
				}
			}
		} else { 
		?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
				<img class="img-fluid logo" loading="lazy" src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/logo.png" alt="<?php esc_attr_e( 'Logo', 'kraftiart' ); ?>">
			</a>
		<?php }
		?>


			<nav id="site-navigation" class="main-navigation navbar-expand-lg navbar-light text-center justify-content-center flex-lg-grow-1 p-lg-0 m-lg-0 me-3">
				<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
					<button class="navbar-toggler b-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fas fa-bars"></i>
					</button>
					
					<?php
					wp_nav_menu(
						array(
							'container'      => 'div',
							'theme_location' => 'header-menu',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'navbar-nav me-auto mb-2 mb-lg-0 d-lg-flex nav-menu flex-wrap',
						)
					);
					?>
				<?php endif; ?>
			</nav><!-- #site-navigation -->


			<div class="right-header">
			<?php
			/**
				 * Search
				 */
				get_template_part( 'template-parts/topbar/topbar', 'clear' );


				if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
					$kraftiart_options = get_option( 'kraftiart_options' );
					if( $kraftiart_options['opt-search'] == 1 ){
						?>
						<div class="search-icon d-flex">
							<div class="search-wrap cursor-pointer d-flex align-items-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
							</div>
							<div class="top-search">
								<div class="search-fix position-fixed d-flex align-items-center w-100 start-0 top-0 end-0 m-auto">
									<div class="product-search-close"><i class="fa-solid fa-xmark"></i></div>
									<div class="container">
										<div class="product-search">
											<form name="product-search" method="get" class="search-form search__form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
												<div class="search-title float-start w-100">What Are You Looking For?</div>
												<div class="search-wrapper">
													<input type="search" name="s" class="search" placeholder="<?php echo esc_attr__( 'Search for product...', 'kraftiart' ); ?>" value="">
													<input type="hidden" name="product-search" value="1">
													<?php echo svg_loading(); ?>
												</div>
												<button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
											</form>
											<div class="search-results"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
				} else{
					?>
					<div class="search-icon d-flex">
					<div class="search-wrap cursor-pointer d-flex align-items-center">
						<i class="fa-solid fa-magnifying-glass"></i>
					</div>
					<div class="top-search float-start w-100">
						<div class="search-fix position-fixed d-flex align-items-center w-100 start-0 top-0 end-0 m-auto">
							<div class="container">
								<?php get_search_form(); ?>
							</div>
						</div>
					</div>
				</div>
					<?php
				} ?>
				<?php 
				if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
					$kraftiart_options = get_option( 'kraftiart_options' );
					
					
						
				

				?>	
		<div class="wishlist-wrap">
			<div class="wishlist cursor-pointer d-flex align-items-center">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>wishlist" title="<?php esc_attr_e('wishlist','kraftiart'); ?>"  class="d-flex"></a>
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
			</div>
	</div>
	<?php
					/**
					 * Woocomerce Menu
					 */
					if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) { ?>
						<nav class="navbar-woocommerce">
							<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php esc_attr_e('My Account','kraftiart'); ?>" class="navbar-title position-relative">
							<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="#222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
							</a>
							
						</nav>
						<?php 
					}
					/**
					 * Mini cart
					 */
					if( class_exists( 'WooCommerce' ) ) { ?>
						<div class="mini-cart d-flex align-items-center">
							<?php custom_mini_cart(); ?>
						</div>
					<?php 
					}

				} ?>
				<?php

			
/**
 * hamburger-menu
 */
if ( has_nav_menu( 'hamburger-menu' ) ) : ?>
	<div class="head-hamburger-menu-wrap">
		<div class="head-hamburger-menu cursor-pointer d-lg-flex d-none">
			<div class="humburger-icon-wrap">
				<div class="humburger-icon"></div>
			</div>
			<div class="navbar-hamburger" id="navbar-hamburger1">
				<?php
					wp_nav_menu(
						array(
							'container'      => 'div',
							'container_class'=> 'navbar-hamburger-container',
							'theme_location' => 'hamburger-menu',
							'menu_id'        => 'hamburger-menu',
							'menu_class'     => 'hamburger-nav',
						)
					);
				?>

				<div class="navbar-hamburger-content">
					<?php
					if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
						$kraftiart_options = get_option( 'kraftiart_options' );
						if(  !empty( $kraftiart_options['hamburger-content'] ) ){
							echo html_entity_decode( $kraftiart_options['hamburger-content'] );
						}
					}
					?>
				</div>
			</div>
		</div>			
	</div>	

<?php endif;?>
			</div>

			</div><!-- .site-branding -->
	
	</div>
		</div><!-- .site-branding -->
	
</div>


	</div><!-- .site-branding -->
</header><!-- #masthead -->
