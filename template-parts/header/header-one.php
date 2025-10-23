/**
 * Headr One
 */

get_template_part('template-parts/header/header', 'top'); ?>
<header id="masthead" <?php kraftiart_header_class(); ?>>
    <div class="header-line">
        <div id="headerspacing" class="header-spacing">
            <?php $kraftiart_options = get_option('kraftiart_options');
            if ($kraftiart_options['container-option'] == 'container-01') {
            ?>
                <div class="container">
                <?php } else { ?>
                    <div class="container-fluid">
                    <?php } ?>
                    <?php
                    /**
                     * Logo
                     */
                    ?>


                    <div class="site-branding-wrap fload-start w-100">
                        <div class="site-branding d-lg-flex align-items-center justify-content-start justify-content-lg-between w-100">
                            <!-- Logo o imagen del sitio -->
                            <?php if (class_exists('ReduxFramework') && function_exists('loadmore_postSC')) {
                                $kraftiart_options = get_option('kraftiart_options');
                                if (has_custom_logo()) {
                                    the_custom_logo();
                                } elseif ($kraftiart_options['opt-logo'] == "1") {
                                    $logo_url = $kraftiart_options['dark-light-mode'] == 0 ? $kraftiart_options['light-site-logo']['url'] : $kraftiart_options['site-logo']['url'];
                            ?>
                                    <div class="header-logo">
                                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                            <img class="img-fluid logo" loading="lazy" src="<?php echo esc_url($logo_url); ?>" alt="<?php esc_attr_e('Logo', 'kraftiart'); ?>">
                                        </a>
                                    </div>
                                <?php
                                } else if (!empty($kraftiart_options['text-logo'])) {
                                ?>
                                    <h1 class="logo">
                                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php echo esc_html($kraftiart_options['text-logo']); ?></a>
                                    </h1>
                            <?php
                                }
                            } ?>

                            <!-- Buscador -->
                            <div class=" d-flex">
                                <div class="product-search">
                                    <form style="display: flex;" name="product-search" method="get" class="search-form search__form" action="<?php echo esc_url(home_url('/')); ?>">
                                      
                                        <div class="search-wrapper">
                                            <input type="search" name="s" class="search" placeholder="<?php echo esc_attr__('Buscar producto...', 'kraftiart'); ?>" value="">
                                            <input type="hidden" name="product-search" value="1">
                                            <?php echo svg_loading(); ?>
                                        </div>
                                        <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                            </svg></button>
                                    </form>
                                    <div class="search-results"></div>
                                </div>
                            </div>

                            <!-- Contenido a la derecha -->
                            <div class="right-header">
                                <?php
                                /**
                                 * Search
                                 */
                                get_template_part('template-parts/topbar/topbar', 'clear');


                                if (class_exists('ReduxFramework') && function_exists('loadmore_postSC')) {
                                    $kraftiart_options = get_option('kraftiart_options');
                                    if ($kraftiart_options['opt-search'] == 1) {
                                ?>
                                     <div class=" d-flex">
                                     <div class="search-icon d-flex">
                                       
                                        <div class="top-search float-start w-100">
                                            <div class="search-fix position-fixed d-flex align-items-center w-100 start-0 top-0 end-0 m-auto">
                                                <div class="container">
                                                    <?php get_search_form(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                                    <?php
                                    }
                                } else {
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
                                if (class_exists('ReduxFramework') && function_exists('loadmore_postSC')) {
                                    $kraftiart_options = get_option('kraftiart_options');
                                ?>
                                    <div class="wishlist-wrap">
                                        <div class="wishlist cursor-pointer d-flex align-items-center">
                                            <a href="<?php echo esc_url(home_url('/')); ?>wishlist" title="<?php esc_attr_e('wishlist', 'kraftiart'); ?>" class="d-flex"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                                                </svg>
                                                </a>

                                        </div>
                                    </div>
                                    <?php
                                    /**
                                     * Woocomerce Menu
                                     */
                                    if (class_exists('ReduxFramework') && function_exists('loadmore_postSC')) { ?>
                                        <nav class="navbar-woocommerce">
                                            <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" title="<?php esc_attr_e('My Account', 'kraftiart'); ?>" class="navbar-title position-relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="#222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                            </a>

                                        </nav>
                                    <?php
                                    }
                                    /**
                                     * Mini cart
                                     */
                                    if (class_exists('WooCommerce')) { ?>
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
                                if (has_nav_menu('hamburger-menu')) : ?>
                                    <div class="head-hamburger-menu cursor-pointer d-lg-flex d-none">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                                            <line x1="3" y1="12" x2="21" y2="12" />
                                            <line x1="3" y1="6" x2="21" y2="6" />
                                            <line x1="3" y1="18" x2="21" y2="18" />
                                        </svg>
                                        <div class="navbar-hamburger">
                                            <div class="navbar-hamburger-main">
                                                <?php
                                                wp_nav_menu(
                                                    array(
                                                        'container'      => 'div',
                                                        'container_class' => 'navbar-hamburger-container',
                                                        'theme_location' => 'hamburger-menu',
                                                        'menu_id'        => 'hamburger-menu',
                                                        'menu_class'     => 'hamburger-nav',
                                                    )
                                                );
                                                ?>
                                                <div class="navbar-hamburger-content">
                                                    <?php
                                                    if (class_exists('ReduxFramework') && function_exists('loadmore_postSC')) {
                                                        $kraftiart_options = get_option('kraftiart_options');
                                                        if (!empty($kraftiart_options['hamburger-content'])) {
                                                            echo html_entity_decode($kraftiart_options['hamburger-content']);
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endif;
                                ?>
                            </div>
                        </div><!-- .site-branding -->
                    </div>

                    <div class="site-main-wrap">
                        <div class="site-wrap d-lg-flex align-items-lg-center position-relative">
                            <?php
                            /**
                             * Navigation Manu
                             */
                            ?>
                            <nav id="site-navigation" class="main-navigation navbar-expand-lg navbar-light d-lg-flex text-center justify-content-center flex-lg-grow-1 p-lg-0 m-lg-0 me-3">
                                <?php if (has_nav_menu('header-menu')) : ?>
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


                        </div>
                    </div>

                    <div>
                    </div>
</header><!-- #masthead -->