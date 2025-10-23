<?php

/**
 * The template for displaying all cursos post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kraftiart
 */

get_header();
?>
<script>
    (function() {
        var request, b = document.body,
            c = 'className',
            cs = 'customize-support',
            rcs = new RegExp('(^|\\s+)(no-)?' + cs + '(\\s+|$)');

        request = true;

        b[c] = b[c].replace(rcs, ' ');
        // The customizer requires postMessage and CORS (if the site is cross domain).
        b[c] += (window.postMessage && request ? ' ' : ' no-') + cs;
    }());
</script>
<style>
    .portfolio-item {
        border: 1px solid #f2f2f2;
        padding: 20px;
    }

    .portfolio-item img {
        width: 100%;
        display: block;
        margin-bottom: 15px;
        /* Espacio entre la imagen y el t��tulo */
    }

    .portfolio-caption {
        font-size: 1.2rem;
        /* Ajusta el tama�0�9o de la fuente seg��n tu dise�0�9o */
        text-align: center;
        /* Centra el t��tulo */
        color: #333;
        /* Ajusta el color del texto seg��n tu dise�0�9o */
        padding: 0;
        /* Si necesitas padding alrededor del t��tulo, ajusta aqu�� */
        margin: 0;
        /* Aseg��rate de que no hay margen extra alrededor del t��tulo */
    }



    .nav-tabs .nav-link {
        margin-bottom: -1px;
        background: 0 0;
        border: none !important;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #495057;
        background-color: #fff;
        border-color: #dee2e6 #dee2e6 #fff;
        border-bottom: 1px solid #f7c6d8 !important;
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
    }

    .nav-tabs {
        border-bottom: none;
    }

    .elementor-5104 .elementor-element.elementor-element-0720ebe {
        margin-top: 80px;
        margin-bottom: 0px;
    }

    .elementor-5104 .elementor-element.elementor-element-5ba572a:not(.elementor-motion-effects-element-type-background),
    .elementor-5104 .elementor-element.elementor-element-5ba572a>.elementor-motion-effects-container>.elementor-motion-effects-layer {
        background-color: #F8F5EF;
    }

    .elementor-5104 .elementor-element.elementor-element-5ba572a {
        transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
        margin-top: -50px;
        margin-bottom: 0px;
        padding: 80px 0px 80px 0px;
    }

    .elementor-widget-container {
        float: left;
        width: 100%;
        margin-top: 40px;
    }

    .single-post .tt-post-details a:not(.single-post #comments a):not(.wp-block-button a.wp-block-button__link):not(.wp-block-cover-text a):not(.wp-block-file .wp-block-file__button):not(.wp-block-archives-list a):not(.wp-calendar-nav .wp-calendar-nav-prev a):not(.wp-block-latest-comments__comment-meta a):not(.wp-block-latest-posts__list a):not(.wp-block-tag-cloud a):not(.wp-block-rss a):not(.page-links a):not(table tbody tr th a):not(blockquote cite a),
    .page .site-main a {
        color: #A63854;
    }

    .Portfolio-style-1 .grid {
        margin: 40px -15px;
    }

    .nav {
        display: flex;
        flex-wrap: wrap;
        padding-left: 0;
        margin-bottom: 0;
        justify-content: center;
    }
    
    .section-heading{
    font-family: "Raleway", Sans-serif;
    font-size: 50px!important;
    letter-spacing: 3.1px;
  
}

.tt-section-sab {
    color: #a63854;
}
</style>
<main id="primary" class="site-main">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-sm-12">

                <div id="post-408" class="post-408 page type-page status-publish hentry grid-item left-slider">
                    <div class="post-excerpt">
                        <div data-elementor-type="wp-page" data-elementor-id="408" class="elementor elementor-408">
                            <section class="elementor-section elementor-top-section elementor-element elementor-element-5ba572a elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5ba572a" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-952df72" data-id="952df72" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-4baaad0 elementor-widget__width-initial elementor-widget elementor-widget-Section Title" data-id="4baaad0" data-element_type="widget" data-widget_type="Section Title.default">
                                                <div class="elementor-widget-container">
                                                    <div class="tt-section-title text-center">
                                                        <span class="tt-section-sab">ARTE EN EVOLUCION</span>
                                                        <style>
                                                                .font-web {
                                                                    padding-left: 0px;
                                                                    padding-right: 0px;
                                                                    font-size: 2rem !important;
                                                                }
                                                            
                                                                @media (max-width: 768px) {
                                                                    .font-web {
                                                                        
                                                                    padding-left: 10px;
                                                                    padding-right: 10px;
                                                                        font-size: 1.5rem !imporant; /* Ajusta este tamaño según tus necesidades */
                                                                    }
                                                                }
                                                            </style>
                                                        <h2 class="section-heading font-web">Explora, admira, inspira, vive
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="elementor-section elementor-top-section elementor-element elementor-element-04e81d3 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="04e81d3" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-a691d6c" data-id="a691d6c" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">

                                            <div class="elementor-element elementor-element-dda194c elementor-widget elementor-widget-Product By Categories" data-id="dda194c" data-element_type="widget" data-widget_type="Product By Categories.default">
                                                <div class="elementor-widget-container">
                                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Ámbar , Energía Mística</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Figura y Pensamientos</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Pop Art y Realismo
</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                            <!-- Primero  -->
                                                            <?php
                                                            // Argumentos de la consulta
                                                            $args = array(
                                                                'post_type' => 'tt-portfolio', // Aseg��rate de que sea el tipo de post correcto
                                                                'posts_per_page' => -1, // Para obtener todos los posts
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => 'portfolio_category', // Usamos la taxonom��a personalizada
                                                                        'field'    => 'term_id',
                                                                        'terms'    => 134, // Usamos el ID de la categor��a
                                                                    ),
                                                                ),
                                                            );

                                                            // La consulta
                                                            $portfolio_query = new WP_Query($args);

                                                            // Comprobamos si la consulta tiene posts
                                                            if ($portfolio_query->have_posts()) : ?>
                                                                <div class="container py-4">
                                                                    <div class="row">
                                                                        <!-- Comienza el bucle (loop) de WordPress -->
                                                                        <?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
                                                                            <div class="col-md-4 mb-4">
                                                                                <div class="portfolio-item">
                                                                                    <a href="<?php the_permalink(); ?>" class="portfolio-link">
                                                                                        <figure class="mb-0">
                                                                                            <?php if (has_post_thumbnail()) : ?>
                                                                                                <img src="<?php the_post_thumbnail_url('full'); ?>" class="img-fluid" alt="<?php the_title_attribute(); ?>">
                                                                                            <?php endif; ?>
                                                                                            <figcaption class="portfolio-caption"><?php the_title(); ?></figcaption>
                                                                                        </figure>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        <?php endwhile;
                                                                        wp_reset_postdata(); ?>
                                                                        <!-- Finaliza el bucle (loop) de WordPress -->
                                                                    </div>
                                                                </div>
                                                            <?php else : ?>
                                                                <p>No se encontraron entradas en la categor��a ��mbar energ��a m��stica.</p>
                                                            <?php endif; ?>



                                                        </div>
                                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                            <!-- Primero  -->
                                                            <?php
                                                            // Argumentos de la consulta
                                                            $args = array(
                                                                'post_type' => 'tt-portfolio', // Aseg��rate de que sea el tipo de post correcto
                                                                'posts_per_page' => -1, // Para obtener todos los posts
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => 'portfolio_category', // Usamos la taxonom��a personalizada
                                                                        'field'    => 'term_id',
                                                                        'terms'    => 132, // Usamos el ID de la categor��a
                                                                    ),
                                                                ),
                                                            );

                                                            // La consulta
                                                            $portfolio_query = new WP_Query($args);

                                                            // Comprobamos si la consulta tiene posts
                                                            if ($portfolio_query->have_posts()) : ?>
                                                                <div class="container py-4">
                                                                    <div class="row">
                                                                        <!-- Comienza el bucle (loop) de WordPress -->
                                                                        <?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
                                                                            <div class="col-md-4 mb-4">
                                                                                <div class="portfolio-item">
                                                                                    <a href="<?php the_permalink(); ?>" class="portfolio-link">
                                                                                        <figure class="mb-0">
                                                                                            <?php if (has_post_thumbnail()) : ?>
                                                                                                <img src="<?php the_post_thumbnail_url('full'); ?>" class="img-fluid" alt="<?php the_title_attribute(); ?>">
                                                                                            <?php endif; ?>
                                                                                            <figcaption class="portfolio-caption"><?php the_title(); ?></figcaption>
                                                                                        </figure>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        <?php endwhile;
                                                                        wp_reset_postdata(); ?>
                                                                        <!-- Finaliza el bucle (loop) de WordPress -->
                                                                    </div>
                                                                </div>
                                                            <?php else : ?>
                                                                <p>No se encontraron entradas en la categor��a Figura y pensamientos</p>
                                                            <?php endif; ?>

                                                        </div>
                                                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                                            <!-- Primero  -->
                                                            <?php
                                                            // Argumentos de la consulta
                                                            $args = array(
                                                                'post_type' => 'tt-portfolio', // Aseg��rate de que sea el tipo de post correcto
                                                                'posts_per_page' => -1, // Para obtener todos los posts
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => 'portfolio_category', // Usamos la taxonom��a personalizada
                                                                        'field'    => 'term_id',
                                                                        'terms'    => 133, // Usamos el ID de la categor��a
                                                                    ),
                                                                ),
                                                            );

                                                            // La consulta
                                                            $portfolio_query = new WP_Query($args);

                                                            // Comprobamos si la consulta tiene posts
                                                            if ($portfolio_query->have_posts()) : ?>
                                                                <div class="container py-4">
                                                                    <div class="row">
                                                                        <!-- Comienza el bucle (loop) de WordPress -->
                                                                        <?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
                                                                            <div class="col-md-4 mb-4">
                                                                                <div class="portfolio-item">
                                                                                    <a href="<?php the_permalink(); ?>" class="portfolio-link">
                                                                                        <figure class="mb-0">
                                                                                            <?php if (has_post_thumbnail()) : ?>
                                                                                                <img src="<?php the_post_thumbnail_url('full'); ?>" class="img-fluid" alt="<?php the_title_attribute(); ?>">
                                                                                            <?php endif; ?>
                                                                                            <figcaption class="portfolio-caption"><?php the_title(); ?></figcaption>
                                                                                        </figure>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        <?php endwhile;
                                                                        wp_reset_postdata(); ?>
                                                                        <!-- Finaliza el bucle (loop) de WordPress -->
                                                                    </div>
                                                                </div>
                                                            <?php else : ?>
                                                                <p>No se encontraron entradas en la categor��a popart y realismo.</p>
                                                            <?php endif; ?>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                    <!-- .entry-content -->
                </div><!-- #post-408 -->
            </div>


        </div>
    </div>
</main><!-- #main -->

<?php
get_footer();
