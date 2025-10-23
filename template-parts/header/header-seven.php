<?php
/**
 * Headr One
 */

get_template_part( 'template-parts/header/header', 'top' ); ?>

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

			<div class="site-branding d-flex align-items-center flex-shrink-0">
				<?php
				/** 
				* Logo
				*/
				?>
				<div class="site-logo">
					<?php
					if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
						$kraftiart_options = get_option( 'kraftiart_options' );
						if( has_custom_logo() ) {
							the_custom_logo();
						}
						elseif( $kraftiart_options['opt-logo'] == "1" ){
							$dark_logo_url = $kraftiart_options['site-logo']['url'];
							$light_logo_url = $kraftiart_options['light-site-logo']['url'];
							if( ! empty( $dark_logo_url ) ){ ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php if( $kraftiart_options['dark-light-mode'] == 0 ){ ?>
									<img class="img-fluid logo" src="<?php echo esc_url( $light_logo_url ); ?>" alt="<?php esc_attr_e( 'kraftiart', 'kraftiart' ); ?>">
								<?php }else{ ?>
									<img class="img-fluid logo" src="<?php echo esc_url( $dark_logo_url ); ?>" alt="<?php esc_attr_e( 'kraftiart', 'kraftiart' ); ?>">
								<?php } ?>
								</a>
							<?php }
						}else{
							$logo_text = $kraftiart_options['text-logo'];
							if( ! empty( $logo_text ) ){
								?><h1 class="logo" alt="<?php esc_attr_e( 'kraftiart', 'kraftiart' ); ?>">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( $logo_text ); ?></a>
								</h1><?php
							}
						}
					} else { ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo logo-dummy">
							<img class="img-fluid logo" src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/logo.png" alt="<?php esc_attr_e( 'kraftiart', 'kraftiart' ); ?>">
						</a>
					<?php } ?>
				</div>
				<?php?>
	<?php
	/**
	 * Search
	 */
	if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
		$kraftiart_options = get_option( 'kraftiart_options' );
		if( $kraftiart_options['opt-search'] == 1 ){
			?>
			<div class="search-icon d-flex">
				<!-- <div class="search-wrap cursor-pointer d-flex align-items-center">
					<i class="fa-solid fa-magnifying-glass"></i>
					<div class="search-text"><?php esc_html_e( 'Search', 'kraftiart' ); ?></div>
				</div>  -->
				<div class="top-search">
					<div class="search-fix">
						<!-- <div class="product-search-close"><i class="fa-solid fa-xmark"></i></div> -->
							<div class="product-search">
								<form name="product-search" method="get" class="search-form search__form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<div class="search-wrapper">
										<input type="search" name="s" class="search" placeholder="<?php echo esc_attr__( 'Search for product...', 'kraftiart' ); ?>" value="">
										<button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i><?php esc_html_e( 'Search', 'kraftiart' ); ?></button>
										<input type="hidden" name="product-search" value="1" />
										<?php echo svg_loading(); ?>
									</div>
								</form>
								<div class="search-results"></div>
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
			<div class="top-search">
				<div class="search-fix">
					<div class="container">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	} 
?>

<?php 
						if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
							$kraftiart_options = get_option( 'kraftiart_options' );
							if( ! empty( $kraftiart_options['info-phone'] ) ){ ?>
								<div class="head-top-call">
								<div class="head-top-call-icon">
								<a href="tel:<?php echo str_replace( str_split( '(),-" ' ), '', $kraftiart_options['info-phone'] ); ?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-headphones"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/></svg>
									</a>
								</div>
									<div class="contact-text">
									
										<a class="contact-no" href="tel:<?php echo str_replace( str_split( '(),-" ' ), '', $kraftiart_options['info-phone'] ); ?>"><?php echo $kraftiart_options['info-phone']; ?></a>
									<span class="contact-detail">Call Us Now</span>
									</div>
								</div>
							<?php } 
						}?>
						

						</div>
			<div class="site-main-wrap">
				<?php $kraftiart_options = get_option( 'kraftiart_options' );

				if( $kraftiart_options['container-option'] == 'container-01' ){
				?>
					<div class="container">
				<?php }else{ ?>
					<div class="container-fluid">
				<?php } ?>
						
					<div class="site-wrap float-start w-100">

					<?php
						/**
						 * hamburger-menu
						 */
						if ( has_nav_menu( 'hamburger-menu' ) ) : ?>
							<div class="head-hamburger-menu cursor-pointer d-lg-flex d-none">
							<div class="humburger-title">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
								<div class="humberger-category">Shop Categories</div>
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 65.000000 65.000000" preserveAspectRatio="xMidYMid meet">
								<g transform="translate(0.000000,65.000000) scale(0.100000,-0.100000)" fill="currentColor" stroke="none">
								<path d="M510 575 l0 -65 65 0 65 0 0 65 0 65 -65 0 -65 0 0 -65z"></path><path d="M260 325 l0 -65 65 0 65 0 0 65 0 65 -65 0 -65 0 0 -65z"></path><path d="M510 325 l0 -65 65 0 65 0 0 65 0 65 -65 0 -65 0 0 -65z"></path>
								<path d="M10 75 l0 -65 65 0 65 0 0 65 0 65 -65 0 -65 0 0 -65z"></path><path d="M260 75 l0 -65 65 0 65 0 0 65 0 65 -65 0 -65 0 0 -65z"></path><path d="M510 75 l0 -65 65 0 65 0 0 65 0 65 -65 0 -65 0 0 -65z"></path>
								</g>
								</svg>
							</div>
							<div class="navbar-hamburger-main">
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

								<!-- <div class="navbar-hamburger">
									
								</div> -->
							</div>			
						<?php endif; ?>

						<?php
						/**
						 * Navigation Manu
						 */
						?>
						<nav id="site-navigation" class="main-navigation navbar-expand-lg">
							<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
								<button class="navbar-toggler b-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
				if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
					$kraftiart_options = get_option( 'kraftiart_options' );
					
					
				

				?>	
		


					<div class="wishlist-wrap">
					<div class="wishlist cursor-pointer d-flex align-items-center">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>wishlist" title="<?php esc_attr_e('wishlist','kraftiart'); ?>"  class="d-flex"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
				</a>
						
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
?>
<?php
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
				</div>
			</div><!-- .site-branding -->
		</div>

				

						<?php if( class_exists( 'YITH_WCWL_Privacy' ) ) { ?>
						<!-- <div class="wishlist-wrap">
			<div class="wishlist cursor-pointer d-flex align-items-center">
							<a href=",//'kraftiart'); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></a>
						</div>
	</div> -->
						<?php } ?>
			
				
				</div>
				</div><!-- .site-branding -->
				</div>
			</div>
</header><!-- #masthead -->
