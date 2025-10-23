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
    .e-con-boxed.e-flex.reseña {
        margin-bottom: 0;
    }

    .e-con-boxed.e-flex {
        margin-bottom: 100px;
    }

    @media (max-width: 1400px) {
        .elementor-17 .elementor-element.elementor-element-5e80b72a {
            margin-top: 70px;
            margin-bottom: 70px;
        }
    }


    .e-con>.e-con-inner {
        gap: var(--gap);
        width: 100%;
        max-width: var(--content-width);
        margin: 0 auto -100px auto;
        padding-inline-start: 0;
        padding-inline-end: 0;
        height: 58%;
    }

    .elementor-17 .elementor-element.elementor-element-30399d2 .tt-section-title .section-heading {
        font-size: 53px !important;
    }


    .swiper-slide.reseña .tt-feature-box-containt p {
        /* Configuración inicial */
        max-height: 160px;
        /* Ajusta este valor al tamaño de 10 líneas aproximadamente */
        overflow: hidden;
        transition: max-height 0.5s ease, opacity 0.5s ease;
    }

    .swiper-slide.reseña .tt-feature-box-containt:hover p {
        max-height: 500px;
        /* Ajusta este valor para asegurar que pueda contener todo el texto */
        opacity: 1;
        /* Asegura que el texto es completamente opaco */
    }




    .tt-feature-box-icon.reseña::before {
        display: none;
    }

    .swiper-slide.reseña {
        padding: 20px;
        text-align: center;
        background: #f7c6d8;
    }

    .products {
        float: inherit;
        width: 100%;
        margin: 30px auto;
    }


    .elementor-17 .elementor-element.elementor-element-3b6dfaf {
        margin-top: 0px;
        margin-bottom: 0px;
        padding: 0 0px 0px 0px;
    }

    .service-block .swiper-wrapper.text-start .swiper-slide {
        padding: 10px 10px 30px 10px;
        margin-bottom: 19px;
        height: auto;
    }

    .elementor-17 .elementor-element.elementor-element-53c3730f .tt-section-title .section-heading {
        font-family: "Beau Rivage", Sans-serif;
        font-size: 53px;
        letter-spacing: 4.4px;
    }

    /* Eventos  */
    .eventos-container {
        display: flex;
        flex-wrap: wrap;
        /* Permite que los elementos pasen a la siguiente línea si no hay espacio */
        gap: 20px;
        /* Espacio entre los eventos */
    }

    .e-con-inner {
        flex: 1;
        /* Los elementos ocupan el espacio disponible de manera uniforme */
        min-width: 250px;
        /* Ancho mínimo para cada elemento, ajusta según necesites */
    }


    /* reseña  */
    .tt-feature-box-icon img {
        width: 30% !important;
    }

    /* Categorías  */
    .cat_desc .cat_image img {
        border-radius: 0px !important;
    }

    .cat_desc .cat_image {
        border-radius: 0px !important;
    }

    .cat_desc .cat_image .cat_image_box::before {
        border-radius: 0px !important;
    }

    .cat_desc .cat_image .cat_image_box {
        border-radius: 0px;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        -ms-border-radius: 0px;
        -o-border-radius: 0px;
    }

    /* fin de categorias  */

    .elementor-17 .elementor-element.elementor-element-c54f320 .tt-section-title .tt-section-sab,
    .elementor-17 .elementor-element.elementor-element-7651d848 .tt-section-title .tt-section-sab,
    .elementor-17 .elementor-element.elementor-element-ad20e1c .tt-section-title .tt-section-sab {
        color: #A53853 !important;
    }

    /*Galería */
    .portfolio-item {
        border: 1px solid #dbd8d8;
        padding: 20px;
    }

    .portfolio-item img {
        width: 100%;
        display: block;
        margin-bottom: 15px;
        /* Espacio entre la imagen y el título */
    }

    .portfolio-caption {
        font-size: 1.2rem;
        /* Ajusta el tamaño de la fuente según tu diseño */
        text-align: center;
        /* Centra el título */
        color: #333;
        /* Ajusta el color del texto según tu diseño */
        padding: 0;
        /* Si necesitas padding alrededor del título, ajusta aquí */
        margin: 0;
        /* Asegúrate de que no hay margen extra alrededor del título */
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
        color: #A53853 !important;
        background-color: #fff0;
        border-color: #dee2e6 #dee2e6 #fff;
        border-bottom: 1px solid #f7c6d8 !important;
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
    }




    .nav-tabs {
        border-bottom: none;
    }

    .post-excerpt ol,
    .post-excerpt ul {
        padding-left: 20px;
        display: flex;
        justify-content: center;
    }

    /*Fin de galería */


    .page .site-main a {
        color: #34373f !important;
    }

    .tt-feature-box-icon {
        left: 40% !important;
    }

    .home_06_banner .tt-banner .banner-text a.banner-button {
        color: #fff;
        background: #A53853;
        padding: 8px 20px;
        font-weight: 500;
        float: right;
        border-bottom: none;
        font-family: var(--primary-font);
    }

    .title-wrap .ui-tabs-nav {
        justify-content: center !important;
    }

    @media(max-width:940px) {

        #rev_slider_3_1_wrapper .persephone.tparrows {
            cursor: pointer;
            background: #a538532e !important;
            width: 45px;
            height: 45px;
            position: absolute;
            display: block;
            z-index: 1000;
            border: 1px solid rgba(255, 255, 255, 0);
        }

        .title-wrap .ui-tabs-nav {
            justify-content: center !important;
        }


        .tt-section-title.blog {
            float: left;
            width: 40% !important;
        }

        .elementor-17 .elementor-element.elementor-element-11dac5f .tt-section-title .section-heading.blog {
            font-size: 23px;
            line-height: 30px;
            width: 60%;
        }

    }

    .tt-section-title {
        float: left;
        width: 100%;
        margin: 80px 0;
    }

    .swiper-wrapper {
        margin-bottom: 120px;
    }

    .tt-section-sab {
        font-size: 18px !important;
        color: #A53853 !important;
    }

    .section-heading {
        font-family: "Beau Rivage", Sans-serif;
        font-size: 50px !important;
    }

    ul.social-media {
        display: flex;
        list-style: none;
        margin: 0;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
    }

    .page .site-main a.btn.btn-primary {
        color: #a63854 !important;
    }

    .social-media li a.btn.btn-primary:first-child {
        padding: 5px 5px 5px 5px;
    }
</style>
<main id="primary" class="site-main">

    <div style="background-image: url(https://cheja.clicme.marketing/wp-content/uploads/2024/02/bg-blog.png); background-repeat: no-repeat; background-size: cover; margin-top: -48px;" class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">

                <section class="elementor-section elementor-top-section elementor-element elementor-element-25d8bd2c elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="25d8bd2c" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-35605697" data-id="35605697" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-c54f320 elementor-widget__width-initial dark-section elementor-widget-laptop__width-initial elementor-widget elementor-widget-Section Title" data-id="c54f320" data-element_type="widget" data-widget_type="Section Title.default">
                                    <div class="elementor-widget-container">
                                        <div class="tt-section-title text-center">
                                            <span style="color: #A53853 !important" class="tt-section-sab ">COLABORADORES</span>
                                            <h2 class="section-heading "
                                            style="font-family: Raleway !important"
                                            >Equipo detrás de las pinceladas</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-d58c341 elementor-widget elementor-widget-Kraftiart Product Categories" data-id="d58c341" data-element_type="widget" data-widget_type="Kraftiart Product Categories.default">
                                    <div class="elementor-widget-container">
                                        <div class="swiper product-category category-slider category-style1 swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden" data-id="product-category">

                                        <div class="swiper-wrapper" data-direction="horizontal" data-dots="false" data-nav="false" data-speed="1500" data-desk="5" data-laptop="4" data-tablet="3" data-mobile="2" data-autoplay="false" data-loop="false" data-center="false" data-margin="30" id="swiper-wrapper-e65370e0a1647d3f" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
    <?php
    $args = array(
        'post_type' => 'colaborador', // Cambia 'colaborador' por tu custom post type real
        'posts_per_page' => -1, // Para mostrar todos los colaboradores
    );

    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) {
        $count = 1;
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $imagen_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Asume que quieres la imagen completa
            $nombre = get_field('nombre'); // Asume que el campo se llama 'nombre'
            $puesto = get_field('puesto'); // Asume que el campo se llama 'puesto'
            $facebook = get_field('facebook'); // Asume que el campo se llama 'facebook'
            $instagram = get_field('instagram'); // Verifica el nombre del campo
            $linkedin = get_field('linkedin'); // Asume que el campo se llama 'linkedin'
            ?>
            <div class="swiper-slide" role="group" aria-label="<?php echo $count; ?> / <?php echo $the_query->found_posts; ?>" style="width: 246px; margin-right: 30px;">
                <a style="cursor: default"  class="cat_desc">
                    <div class="cat_image">
                        <div class="cat_image_box"><img decoding="async" src="<?php echo esc_url($imagen_url); ?>" alt="<?php echo esc_attr($nombre); ?>">
                            <!-- Icono o SVG que quieras mantener aquí -->
                        </div>
                    </div>
                    <div class="wpcat-content">
                        <div class="cat_name"><?php echo esc_html($nombre); ?></div>
                        <div class="cat_total_product"><?php echo esc_html($puesto); ?></div>
                        <div class="cat-description">
                            <section class="widget widget_kraftiart_widget_social_media">
                                <ul class="social-media">
                                    <?php if ($facebook): ?>
                                    <li>
                                        <a href="<?php echo esc_url($facebook); ?>" class="btn btn-primary">
                                        <svg class="svg-inline--fa fa-facebook" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.8 90.69 226.4 209.3 245V327.7h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.3 482.4 504 379.8 504 256z"></path>
                                        </svg><!-- <i class="fab fa-facebook"></i> Font Awesome fontawesome.com -->
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if ($instagram): ?>
                                    <li><a href="<?php echo esc_url($instagram); ?>" class="btn btn-primary"><svg class="svg-inline--fa fa-instagram" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                                                    <path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                                                                                </svg><!-- <i class="fab fa-instagram"></i> Font Awesome fontawesome.com --></a></li>
                                    <?php endif; ?>
                                    <?php if ($linkedin): ?>
                                    <li><a href="<?php echo esc_url($linkedin); ?>" class="btn btn-primary"><svg class="svg-inline--fa fa-linkedin" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                                                    <path fill="currentColor" d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path>
                                                                                </svg><!-- <i class="fab fa-linkedin"></i> Font Awesome fontawesome.com --></a></li>
                                    <?php endif; ?>
                                </ul>
                            </section>
                        </div>
                    </div>
                </a>
            </div>
            <?php
            $count++;
        }
    }
    wp_reset_postdata();
    ?>
</div>


                                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

</main><!-- #main -->

<?php
get_footer();
