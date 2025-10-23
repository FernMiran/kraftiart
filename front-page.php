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
        font-size: 50px;
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
        background: #270621;
        color: white !important;
    }
    .swiper-slide > .tt-feature-box-title{
        color: white !important;
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
        font-family: "Raleway", Sans-serif;
        font-size: 50px;
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
        font-family: "Raleway", Sans-serif;
    }

    .title-wrap .ui-tabs-nav {
        justify-content: center !important;
    }


    @media(max-width:940px) {
        
        .products.bk {
    float: inherit;
    width: 100%;
    margin: 30px 0 auto!important;
}


        
        .product.bk .thumbnail-wrap a.thumbnail-img img, .product .thumbnail-wrap:not(.list-view .thumbnail-wrap, .short-view .thumbnail-wrap, .product .category-morden .thumbnail-wrap) {
    width: 100%;
    display: flex;
    justify-content: center;
}
        
        .owl-carousel.owl-drag.pad-to .owl-item { 
        padding: 20px;
        }

        #rev_slider_3_1[data-slideactive="rs-6"] .persephone.tparrows {
            background: #a5385354 !important;
            width: 45px !important;
            height: 45px !important;
            border: 1px solid rgba(255, 255, 255, 0) !important;
        }




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

   

    .elementor-17 .elementor-element.elementor-element-2acd5db2 .tt-section-title .section-heading {
        font-size: 15px;
    }
    
    .page .site-main a.bln {
    color: #34373f !important;
}

  .page .site-main a.bln:hover {
    color: #fff !important;
}

@media(min-width: 940px){
    .owl-carousel.pad .owl-stage-outer {
    position: relative;
    overflow: hidden;
    -webkit-transform: translate3d(0, 0, 0);
    display: flex;
    justify-content: center; 
}
}


.product-layout-morden.top .product .cart-wrap a {
    position: relative;
    z-index: 0;
    overflow: hidden;
    background: #34373f;
    height: auto;
    padding: 10px 0;
    width: 100%;
    height: auto;
    justify-content: center;
    display: flex;
    align-items: center;
    top: -61px!important;
}

@media (max-width: 940px){
    .elementor-17 .elementor-element.elementor-element-5e80b72a {
     margin-bottom: 0; 
}

.elementor-17 .elementor-element.elementor-element-30399d2 > .elementor-widget-container {
    padding: 0px 0px 0px 0px;
}
    
}

 
</style>
<main id="primary" class="site-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">

                <div id="post-17" class="post-17 page type-page status-publish hentry grid-item left-slider">
                    <div class="post-excerpt">
                        <div data-elementor-type="wp-page" data-elementor-id="17" class="elementor elementor-17">
                            <section class="elementor-section elementor-top-section elementor-element elementor-element-62f92e15 elementor-section-full_width slider-01 elementor-section-height-default elementor-section-height-default" data-id="62f92e15" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-69f6b4f4" data-id="69f6b4f4" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-307a3dec elementor-widget elementor-widget-slider_revolution" data-id="307a3dec" data-element_type="widget" data-widget_type="slider_revolution.default">
                                                <div class="elementor-widget-container">

                                                    <div class="wp-block-themepunch-revslider">
                                                        <?php echo do_shortcode('[rev_slider alias="slider-01" slidertitle="Slider 01"][/rev_slider]');
                                                        ?>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="elementor-section elementor-top-section elementor-element elementor-element-80fbc4b about_section elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="80fbc4b" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-1ae02036" data-id="1ae02036" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-1e301cc7 elementor-widget-tablet_extra__width-initial elementor-widget__width-initial cms-img-hover elementor-widget elementor-widget-image" data-id="1e301cc7" data-element_type="widget" data-widget_type="image.default">
                                                <div class="elementor-widget-container">
                                                    <style>
                                                        /*! elementor - v3.19.0 - 29-01-2024 */
                                                        .elementor-widget-image {
                                                            text-align: center
                                                        }

                                                        .elementor-widget-image a {
                                                            display: inline-block
                                                        }

                                                        .elementor-widget-image a img[src$=".svg"] {
                                                            width: 48px
                                                        }

                                                        .elementor-widget-image img {
                                                            vertical-align: middle;
                                                            display: inline-block
                                                        }
                                                    </style> <img decoding="async" width="464" height="699" src="https://raquelcheja.com/wp-content/uploads/2024/02/Sin-titulo-1-24.png" class="attachment-full size-full wp-image-3989" alt="" srcset="https://raquelcheja.com/wp-content/uploads/2024/02/Sin-titulo-1-24.png 464w, https://raquelcheja.com/wp-content/uploads/2024/02/Sin-titulo-1-24-199x300.png 199w" sizes="(max-width: 464px) 100vw, 464px">
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-496d4c1b elementor-widget__width-initial elementor-absolute home_page_01_cms cms-img-hover elementor-widget elementor-widget-image" data-id="496d4c1b" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="image.default">
                                                <div class="elementor-widget-container">
                                                    <figure class="wp-caption">
                                                        <img decoding="async" width="262" height="300" src="https://raquelcheja.com/wp-content/uploads/2024/02/foto-1-262x300.jpg" class="attachment-medium size-medium wp-image-3993" alt="" srcset="https://raquelcheja.com/wp-content/uploads/2024/02/foto-1-262x300.jpg 262w, https://raquelcheja.com/wp-content/uploads/2024/02/foto-1-600x686.jpg 600w, https://raquelcheja.com/wp-content/uploads/2024/02/foto-1-895x1024.jpg 895w, https://raquelcheja.com/wp-content/uploads/2024/02/foto-1-768x878.jpg 768w, https://raquelcheja.com/wp-content/uploads/2024/02/foto-1.jpg 1066w" sizes="(max-width: 262px) 100vw, 262px">
                                                        <figcaption class="widget-image-caption wp-caption-text">
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-430add21" data-id="430add21" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-7651d848 elementor-widget elementor-widget-Section Title" data-id="7651d848" data-element_type="widget" data-widget_type="Section Title.default">
                                                <div class="elementor-widget-container">
                                                    <div class="tt-section-title  text-start">
                                                        <span class="tt-section-sab">Raquel Cheja</span>
                                                        <h2 class="section-heading oferta">Un viaje artístico que
                                                            fusiona
                                                            pasión y negocios</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-a7ff31d elementor-widget elementor-widget-heading" data-id="a7ff31d" data-element_type="widget" data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <style>
                                                        /*! elementor - v3.19.0 - 29-01-2024 */
                                                        .elementor-heading-title {
                                                            padding: 0;
                                                            margin: 0;
                                                            line-height: 1
                                                        }

                                                        .elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a {
                                                            color: inherit;
                                                            font-size: inherit;
                                                            line-height: inherit
                                                        }

                                                        .elementor-widget-heading .elementor-heading-title.elementor-size-small {
                                                            font-size: 15px
                                                        }

                                                        .elementor-widget-heading .elementor-heading-title.elementor-size-medium {
                                                            font-size: 19px
                                                        }

                                                        .elementor-widget-heading .elementor-heading-title.elementor-size-large {
                                                            font-size: 29px
                                                        }

                                                        .elementor-widget-heading .elementor-heading-title.elementor-size-xl {
                                                            font-size: 39px
                                                        }

                                                        .elementor-widget-heading .elementor-heading-title.elementor-size-xxl {
                                                            font-size: 59px
                                                        }
                                                    </style>
                                                    <h3 class="elementor-heading-title elementor-size-default">Raquel
                                                        Cheja, se alza como una destacada artista contemporánea cuya obra va más
                                                        allá de las fronteras convencionales. Su reconocimiento se
                                                        fundamenta en la contribución al empoderamiento femenino.</h3>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-549996cd elementor-widget elementor-widget-button" data-id="549996cd" data-element_type="widget" data-widget_type="button.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-button-wrapper">
                                                        <a class="elementor-button elementor-button-link elementor-size-sm" href="https://raquelcheja.com/index.php/conoceme/">
                                                            <span class="elementor-button-content-wrapper">
                                                                <span class="elementor-button-text">Conocer más</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section style="background-image: url(https://raquelcheja.com//wp-content/uploads/2024/05/block3-1.jpg); background-color: #f5cbd2; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;" class="elementor-section elementor-top-section elementor-element elementor-element-25d8bd2c elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="25d8bd2c" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-35605697" data-id="35605697" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-c54f320 elementor-widget__width-initial dark-section elementor-widget-laptop__width-initial elementor-widget elementor-widget-Section Title" data-id="c54f320" data-element_type="widget" data-widget_type="Section Title.default">
                                                <div class="elementor-widget-container">
                                                    <div class="tt-section-title text-center">
                                                        <span class="tt-section-sab">MI COLECCIÓN</span>
                                                        <h2 class="section-heading">Una variedad de estilos plasmando mi
                                                            interior</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-d58c341 elementor-widget elementor-widget-Kraftiart Product Categories" data-id="d58c341" data-element_type="widget" data-widget_type="Kraftiart Product Categories.default">
                                                <div class="elementor-widget-container">
                                                    <div class="owl-carousel pad product-category category-slider category-style1" data-id="product-category">
    <?php
    $categorias = [
        ['nombre' => 'Figura y Pensamientos', 'tag_ID' => 20, 'imagen' => 'https://raquelcheja.com//wp-content/uploads/2024/04/raquel-cheja-art.webp'],
        ['nombre' => 'Pop Art y Realismo', 'tag_ID' => 32, 'imagen' => 'https://raquelcheja.com/wp-content/uploads/2024/03/1-3.jpg'],
        ['nombre' => 'Ambar, Energía Mística', 'tag_ID' => 98, 'imagen' => 'https://raquelcheja.com//wp-content/uploads/2024/04/raquel-cheja-art-2.webp'],
    ];

    foreach ($categorias as $categoria) {
        $term = get_term($categoria['tag_ID'], 'product_cat');
        $term_link = get_term_link($term);
        $count = $term->count;
    ?>
        <div class="item">
            <a href="<?php echo esc_url($term_link); ?>" class="cat_desc">
                <div class="cat_image">
                    <div class="cat_image_box">
                        <img decoding="async" src="<?php echo esc_url($categoria['imagen']); ?>" alt="<?php echo esc_attr($categoria['nombre']); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up-right">
                            <line x1="7" y1="17" x2="17" y2="7">
                            </line>
                            <polyline points="7 7 17 7 17 17">
                            </polyline>
                        </svg>
                    </div>
                </div>
                <div class="wpcat-content">
                    <div class="cat_name">
                        <?php echo esc_html($categoria['nombre']); ?>
                    </div>
                    <div class="cat_total_product">
                        <?php echo esc_html($count) . ' ' . _n('Producto', 'Productos', $count, 'text-domain'); ?>
                    </div>
                </div>
            </a>
        </div>
    <?php
    }
    ?>
</div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="elementor-section elementor-top-section elementor-element elementor-element-48964357 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="48964357" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-461a40e6" data-id="461a40e6" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-83d6d45 elementor-widget elementor-widget-Section Title" data-id="83d6d45" data-element_type="widget" data-widget_type="Section Title.default">
                                                <div class="elementor-widget-container">
                                                    <div class="tt-section-title text-center">
                                                        <span class="tt-section-sab">más vendidos</span>
                                                        <h2 class="section-heading">Mi arte más solicitado</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-2d7d1c80 elementor-widget elementor-widget-kraftiart Trending Product" data-id="2d7d1c80" data-element_type="widget" data-widget_type="kraftiart Trending Product.default">
                                                <div class="elementor-widget-container">
                                                    <div class="product-trending product-layout-morden top home-default ui-tabs ui-corner-all ui-widget ui-widget-content" id="product-trending">
                                                        <div class="title-wrap">
                                                            <ul role="tablist" class="ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header">
                                                                <li role="tab" tabindex="0" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active" aria-controls="new-products" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true"><a href="#new-products" tabindex="-1" class="ui-tabs-anchor" id="ui-id-1">Nuevos productos </a></li>
                                                                <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="top-selling" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a href="#top-selling" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Ventas top</a></li>
                                                            </ul>
                                                        </div>

                                                        <div id="new-products" class="owl-carousel owl-loaded owl-drag">
                                                            <style>
                                                                .img_selector img {
                                                                    object-position:bottom;
                                                                }
                                                            </style>
                                                            <div class="owl-stage-outer">
                                                                <div class="owl-stage">
                                                                    <?php
                                                                    // Argumentos para obtener productos
                                                                    $args = array(
                                                                        'post_type' => 'product',
                                                                        'posts_per_page' => 10, // Ajusta este número para limitar la cantidad de posts mostrados
                                                                        'orderby' => 'date',
                                                                        'order' => 'DESC'
                                                                    );

                                                                    // La consulta de productos
                                                                    $productos = new WP_Query($args);

                                                                    // Verificamos si hay productos
                                                                    if ($productos->have_posts()) :
                                                                        // Bucle a través de los productos
                                                                        while ($productos->have_posts()) : $productos->the_post();
                                                                            global $product;
                                                                    ?>
                                                                            <!-- Contenido del slide individual para cada producto -->
                                                                            <div class="owl-item" style="width: 100%; margin-right: 4px;">
                                                                                <section class="grid-item left-slider product type-product post-<?php the_ID(); ?>">
                                                                                    <div class="product-content-wrap">
                                                                                        <div class="thumbnail-wrap">
                                                                                            <a href="<?php the_permalink(); ?>" class="thumbnail-img img_selector">
                                                                                                <?php if (has_post_thumbnail()) {
                                                                                                    the_post_thumbnail('woocommerce_thumbnail', array('class' => 'product-thumbnail-main', 'alt' => 'Thumbnail'));
                                                                                                } ?>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="content-wrap">
                                                                                            <a href="<?php the_permalink(); ?>">
                                                                                                <h2 class="woocommerce-loop-product__title">
                                                                                                    <?php the_title(); ?></h2>
                                                                                            </a>
                                                                                            <span class="price"><?php echo $product->get_price_html(); ?></span>
                                                                                            <?php woocommerce_template_loop_add_to_cart(); // Botón de añadir al carrito 
                                                                                            ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </section>
                                                                            </div>
                                                                    <?php
                                                                        endwhile;
                                                                    else :
                                                                        echo '<p>No hay productos nuevos para mostrar.</p>';
                                                                    endif;

                                                                    // Restaurar el objeto post global a su estado previo
                                                                    wp_reset_postdata();
                                                                    ?>
                                                                </div>
                                                            </div>

                                                            <div class="owl-dots"></div>
                                                        </div>




                                                        <!-- Top selling -->
                                                        <!-- Top selling -->
                                                        <div id="top-selling" class="owl-carousel owl-loaded owl-drag">
                                                            <div class="owl-stage-outer">
                                                                <div class="owl-stage">
                                                                    <?php
                                                                    // Argumentos para obtener productos
                                                                    $args = array(
                                                                        'post_type' => 'product',
                                                                        'posts_per_page' => 10,
                                                                        'orderby' => 'date',
                                                                        'order' => 'DESC',
                                                                        'tax_query' => array(
                                                                            array(
                                                                                'taxonomy' => 'product_cat', // Nombre de la taxonomía de categorías de productos
                                                                                'field'    => 'term_id', // Campo para comparar (puede ser 'term_id', 'slug' o 'name')
                                                                                'terms'    => 324, // ID de la categoría que deseas listar
                                                                            ),
                                                                        ),
                                                                    );

                                                                    // La consulta de productos
                                                                    $productos_top = new WP_Query($args);

                                                                    // Verificamos si hay productos
                                                                    if ($productos_top->have_posts()) :
                                                                        // Bucle a través de los productos
                                                                        while ($productos_top->have_posts()) : $productos_top->the_post();
                                                                            global $product;
                                                                    ?>
                                                                            <!-- Contenido del slide individual para cada producto -->
                                                                            <div class="owl-item" style="width: 100%; margin-right: 4px;">
                                                                                <section class="grid-item left-slider product type-product post-<?php the_ID(); ?>">
                                                                                    <div class="product-content-wrap">
                                                                                        <div class="thumbnail-wrap">
                                                                                            <a href="<?php the_permalink(); ?>" class="thumbnail-img">
                                                                                                <?php if (has_post_thumbnail()) {
                                                                                                    the_post_thumbnail('woocommerce_thumbnail', array('class' => 'product-thumbnail-main', 'alt' => 'Thumbnail'));
                                                                                                } ?>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="content-wrap">
                                                                                            <a href="<?php the_permalink(); ?>">
                                                                                                <h2 class="woocommerce-loop-product__title">
                                                                                                    <?php the_title(); ?></h2>
                                                                                            </a>
                                                                                            <span class="price"><?php echo $product->get_price_html(); ?></span>
                                                                                            <?php woocommerce_template_loop_add_to_cart(); // Botón de añadir al carrito 
                                                                                            ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </section>
                                                                            </div>
                                                                    <?php
                                                                        endwhile;
                                                                    else :
                                                                        echo '<p>No hay productos nuevos para mostrar.</p>';
                                                                    endif;

                                                                    // Restaurar el objeto post global a su estado previo
                                                                    wp_reset_postdata();
                                                                    ?>
                                                                </div>
                                                            </div>

                                                            <div class="owl-dots"></div>
                                                        </div>





                                                    </div>
                                                    <!-- echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section style="background-image: url(https://raquelcheja.com//wp-content/uploads/2024/05/block3-1.jpg);  background-repeat: no-repeat; background-size: cover; background-attachment: fixed;" class="elementor-section elementor-top-section elementor-element elementor-element-42a3f262 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="42a3f262" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-b342117" data-id="b342117" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-79fce1a3 elementor-hidden-mobile zoom-in-out-box elementor-widget-tablet_extra__width-initial elementor-widget elementor-widget-image" data-id="79fce1a3" data-element_type="widget" data-widget_type="image.default">
                                                <div class="elementor-widget-container">
                                                    <img loading="eager" decoding="async" width="640" height="902" src="https://raquelcheja.com/wp-content/uploads/2024/03/cheja-300.jpg" class="attachment-medium_large size-medium_large wp-image-4020" alt="" srcset="https://raquelcheja.com/wp-content/uploads/2024/03/cheja-300.jpg, https://raquelcheja.com/wp-content/uploads/2024/03/cheja-300.jpg, https://raquelcheja.com/wp-content/uploads/2024/03/cheja-300.jpg, https://raquelcheja.com/wp-content/uploads/2024/03/cheja-300.jpg, https://raquelcheja.com/wp-content/uploads/2024/03/cheja-300.jpg" sizes="(max-width: 640px) 100vw, 640px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-1867c933" data-id="1867c933" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-9b4816e elementor-widget-laptop__width-initial elementor-widget-tablet_extra__width-initial elementor-widget elementor-widget-Section Title" data-id="9b4816e" data-element_type="widget" data-widget_type="Section Title.default">
                                                <div class="elementor-widget-container">
                                                    <div class="tt-section-title text-start">
                                                        <span class="tt-section-sab"></span>
                                                        <h2 style="line-height: 40px !important;" class="section-heading percent_70">A través de mis cursos
                                                            cientos de personas han
                                                            expresado sus emociones
                                                            y experiencias, en obras admirables</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-ff1e54b elementor-widget elementor-widget-button" data-id="ff1e54b" data-element_type="widget" data-widget_type="button.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-button-wrapper">
                                                        <a class="elementor-button elementor-button-link elementor-size-sm" href="https://raquelcheja.com/index.php/galeria/">
                                                            <span class="elementor-button-content-wrapper">
                                                                <span class="elementor-button-text">Ver galería</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="elementor-section elementor-top-section elementor-element elementor-element-23fd6568 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="23fd6568" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-9ae1d50" data-id="9ae1d50" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-520d2065 elementor-widget elementor-widget-ServiceBox" data-id="520d2065" data-element_type="widget" data-widget_type="ServiceBox.default">
                                                <div class="elementor-widget-container">
                                                    <div class="swiper-wrapper atention container   tt-icon-top text-center" data-direction="horizontal" data-dots="false" data-nav="false" data-desk="4" data-laptop="4" data-tablet="3" data-mobile="2" data-autoplay="false" data-loop="false" data-margin="10" id="swiper-wrapper-d897a0f8bb6ba520" aria-live="off">

                                                        <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev" role="group" aria-label="9 / 12" style="width: 325.5px; margin-right: 16px;" data-swiper-slide-index="0">
                                                            <div class="tt-feature-box-icon">
                                                                <img decoding="async" src="https://raquelcheja.com/wp-content/uploads/2024/02/icon-1.png" title="icon-1" alt="icon-1" loading="eager">
                                                            </div>
                                                            <div class="tt-feature-box-containt">
                                                                <h4 class="tt-feature-box-title">Horario de atención
                                                                </h4>
                                                                <p>24 / 7 </p>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" role="group" aria-label="10 / 12" style="width: 325.5px; margin-right: 16px;" data-swiper-slide-index="1">
                                                            <div class="tt-feature-box-icon">
                                                                <img decoding="async" src="https://raquelcheja.com/wp-content/uploads/2024/02/icon-2.png" title="icon-2" alt="icon-2" loading="eager">
                                                            </div>
                                                            <div class="tt-feature-box-containt">
                                                                <h4 class="tt-feature-box-title">Envíos a nivel Nacional </h4>
                                                                <p>Enviamos a todo México</p>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" role="group" aria-label="11 / 12" style="width: 325.5px; margin-right: 16px;" data-swiper-slide-index="2">
                                                            <div class="tt-feature-box-icon">
                                                                <img decoding="async" src="https://raquelcheja.com/wp-content/uploads/2024/02/icon-3.png" title="icon-3" alt="icon-3" loading="eager">
                                                            </div>
                                                            <div class="tt-feature-box-containt">
                                                                <h4 class="tt-feature-box-title">Nuestra ubicación</h4>
                                                                <p>
                                                                    Ciudad de México
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide swiper-slide-duplicate" role="group" aria-label="12 / 12" style="width: 325.5px; margin-right: 16px;" data-swiper-slide-index="3">
                                                            <div class="tt-feature-box-icon">
                                                                <img decoding="async" src="https://raquelcheja.com/wp-content/uploads/2024/02/icon-4.png" title="icon-4" alt="icon-4" loading="eager">
                                                            </div>
                                                            <div class="tt-feature-box-containt">
                                                                <h4 class="tt-feature-box-title">Pagos seguros</h4>
                                                                <p>Nuestro sitio cuenta con pagos seguros.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                          

                            <section style="background-image: url(https://raquelcheja.com/wp-content/uploads/2024/02/bg-2.jpg); background-color: #f5cbd2; margin-top:150px" class="elementor-section elementor-top-section elementor-element elementor-element-3b6dfaf elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3b6dfaf" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b175856" data-id="b175856" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-ad20e1c elementor-widget__width-initial dark-section elementor-widget-laptop__width-initial elementor-widget elementor-widget-Section Title" data-id="ad20e1c" data-element_type="widget" data-widget_type="Section Title.default">
                                                <div class="elementor-widget-container">
                                                    <div class="tt-section-title text-center">
                                                        <span class="tt-section-sab">CERTIFICADOS</span>
                                                        <style>
                                                            .font-web {
                                                                font-size: 2.5rem !important;
                                                            }
                                                            @media (max-width: 768px) {
                                                                .font-web {
                                                                    font-size: 1.8rem !important; /* Ajusta este tamaño según tus necesidades */
                                                                }
                                                            }
                                                        </style>
                                                        <h2 class="section-heading font-web">Reconocimientos que dibujan una
                                                            carrera</h2>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Comienza carrusel de productos  -->
                                            <section class="related products list-btn-block">

                                                <div class="products grid-view">
                                                    <div class="row">
                                                        <div class="owl-carousel owl-loaded owl-drag">
                                                            <div class="owl-stage-outer">
                                                                <div class="owl-stage" style="transform: translate3d(-867px, 0px, 0px); transition: all 0.25s ease 0s; width: 2023px;">
                                                                    <?php
                                                                    $args = array(
                                                                        'post_type' => 'certificado', // 
                                                                        'posts_per_page' => -1, // Selecciona todos los posts
                                                                    );
                                                                    $the_query = new WP_Query($args);
                                                                    if ($the_query->have_posts()) :
                                                                        while ($the_query->have_posts()) : $the_query->the_post();
                                                                            $post_id = get_the_ID(); // Obtiene el ID del post actual
                                                                            $thumbnail_id = get_post_thumbnail_id($post_id); // Obtiene el ID de la imagen destacada
                                                                            $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'full', true)[0]; // Obtiene la URL de la imagen destacada
                                                                    ?>
                                                                            <div class="owl-item" style="width: 259px; margin-right: 4px;">
                                                                                <section class="grid-item left-slider product bk type-product post-<?php echo $post_id; ?> status-publish instock product_cat-figura-y-pensamientos has-post-thumbnail shipping-taxable purchasable product-type-variable has-default-attributes">
                                                                                    <div class="product-content-wrap">
                                                                                        <div class="thumbnail-wrap">
                                                                                            <a href="<?php the_permalink(); ?>" class="thumbnail-img">
                                                                                                <img alt="Thumbnail" src="<?php echo esc_url($thumbnail_url); ?>" data-id="<?php echo $post_id; ?>" class="product-thumbnail-main">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </section>
                                                                            </div>
                                                                    <?php
                                                                        endwhile;
                                                                    endif;
                                                                    wp_reset_postdata();
                                                                    ?>
                                                                </div>

                                                            </div>
                                                            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next disabled"><span aria-label="Next">›</span></button></div>
                                                            <div class="owl-dots disabled"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!--
                            <section class="elementor-section elementor-top-section elementor-element elementor-element-2231b97 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2231b97" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-16837ac" data-id="16837ac" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-71751c8 elementor-widget elementor-widget-Section Title" data-id="71751c8" data-element_type="widget" data-widget_type="Section Title.default">
                                                <div class="elementor-widget-container">
                                                    <div class="tt-section-title text-center">
                                                        <span class="tt-section-sab"></span>
                                                        <h2 class="section-heading">Próximos eventos</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="elementor-element elementor-element-15dc693 e-flex e-con-boxed e-con e-parent" data-id="15dc693" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                                <?php
                                $args = array(
                                    'post_type' => 'evento',
                                    'posts_per_page' => -1,
                                );

                                $eventos_query = new WP_Query($args);

                                if ($eventos_query->have_posts()) : ?>

                                    <div class="elementor-element elementor-element-15dc693 e-flex e-con-boxed e-con e-parent eventos-container" data-id="15dc693" data-element_type="container" data-settings='{"content_width":"boxed"}' data-core-v316-plus="true">
                                        <div class="e-con-inner">
                                            <?php while ($eventos_query->have_posts()) : $eventos_query->the_post();
                                                $enlace_acf = get_field('enlace');
                                                $imagen_destacada = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : 'https://raquelcheja.com/wp-content/uploads/2024/02/1-2.jpg';
                                            ?>


                                                <div class="elementor-element elementor-element-f8a5d28 e-con-full e-flex e-con e-child" data-id="f8a5d28" data-element_type="container" data-settings='{"content_width":"full"}'>
                                                    <div class="elementor-element elementor-element-8774ded elementor-widget elementor-widget-Banner" data-id="8774ded" data-element_type="widget" data-widget_type="Banner.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="tt-banner"><a href="<?php echo esc_url($enlace_acf); ?>" class="banner-image"><img decoding="async" src="<?php echo esc_url($imagen_destacada); ?>" title="Evento" alt="Evento" loading="eager"></a>
                                                                <div class="banner-text tt-icon-top text-center">
                                                                    <div class="wpbanner-content">
                                                                        <div class="banner-sub-title"></div>
                                                                        <div class="banner-title"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            <?php endwhile; ?>
                                        </div>

                                    </div>

                                <?php else :
                                    echo '<p>No hay eventos disponibles en este momento.</p>';
                                endif;
                                wp_reset_postdata();
                                ?>




                            </div>
                            -->

                            <section class="elementor-section elementor-top-section elementor-element elementor-element-44a6146 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="44a6146" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-12bf15f" data-id="12bf15f" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated e-swiper-container">
                                            <div class="elementor-element elementor-element-b82109d elementor-widget elementor-widget-Section Title" data-id="b82109d" data-element_type="widget" data-widget_type="Section Title.default">
                                                <div class="elementor-widget-container">
                                                    <div class="tt-section-title text-center">
                                                        <span class="tt-section-sab">Pinceladas de Genialidad</span>
                                                        <h2 class="section-heading">Galería</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-ed287e3 elementor-pagination-position-outside elementor-widget elementor-widget-image-carousel e-widget-swiper" data-id="ed287e3" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;dots&quot;,&quot;lazyload&quot;:&quot;yes&quot;,&quot;image_spacing_custom&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;autoplay&quot;:&quot;no&quot;,&quot;infinite&quot;:&quot;no&quot;,&quot;speed&quot;:500,&quot;image_spacing_custom_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;image_spacing_custom_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;image_spacing_custom_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;image_spacing_custom_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;image_spacing_custom_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="image-carousel.default" aria-roledescription="carousel" aria-label="Carrusel | Scroll horizontal: Flecha izquierda y derecha">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-a691d6c" data-id="a691d6c" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">

                                                            <div class="elementor-element elementor-element-dda194c elementor-widget elementor-widget-Product By Categories" data-id="dda194c" data-element_type="widget" data-widget_type="Product By Categories.default">
                                                                <div class="elementor-widget-container">
                                                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Figura y
                                                                                Pensamientos</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Pop Art y
                                                                                Realismo</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Ámbar, Energía
                                                                                Mística</a>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="tab-content" id="myTabContent">
                                                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                                            <!-- Primero  -->
                                                                            <?php
                                                                            // Argumentos de la consulta
                                                                            $args = array(
                                                                                'post_type' => 'tt-portfolio', // Asegúrate de que sea el tipo de post correcto
                                                                                'posts_per_page' => -1, // Para obtener todos los posts
                                                                                'tax_query' => array(
                                                                                    array(
                                                                                        'taxonomy' => 'portfolio_category', // Usamos la taxonomía personalizada
                                                                                        'field'    => 'term_id',
                                                                                        'terms'    => 132, // Usamos el ID de la categoría
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
                                                                                                            <figcaption class="portfolio-caption">
                                                                                                                <?php the_title(); ?>
                                                                                                            </figcaption>
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
                                                                                <p>No se encontraron entradas en la
                                                                                    categoría figura y pensamientos.</p>
                                                                            <?php endif; ?>



                                                                        </div>
                                                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                                            <!-- Primero  -->
                                                                            <?php
                                                                            // Argumentos de la consulta
                                                                            $args = array(
                                                                                'post_type' => 'tt-portfolio', // Asegúrate de que sea el tipo de post correcto
                                                                                'posts_per_page' => -1, // Para obtener todos los posts
                                                                                'tax_query' => array(
                                                                                    array(
                                                                                        'taxonomy' => 'portfolio_category', // Usamos la taxonomía personalizada
                                                                                        'field'    => 'term_id',
                                                                                        'terms'    => 133, // Usamos el ID de la categoría
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
                                                                                                            <figcaption class="portfolio-caption">
                                                                                                                <?php the_title(); ?>
                                                                                                            </figcaption>
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
                                                                                <p>No se encontraron entradas en la
                                                                                    categoría Pop y Realismo</p>
                                                                            <?php endif; ?>

                                                                        </div>
                                                                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                                                            <!-- Primero  -->
                                                                            <?php
                                                                            // Argumentos de la consulta
                                                                            $args = array(
                                                                                'post_type' => 'tt-portfolio', // Asegúrate de que sea el tipo de post correcto
                                                                                'posts_per_page' => -1, // Para obtener todos los posts
                                                                                'tax_query' => array(
                                                                                    array(
                                                                                        'taxonomy' => 'portfolio_category', // Usamos la taxonomía personalizada
                                                                                        'field'    => 'term_id',
                                                                                        'terms'    => 134, // Usamos el ID de la categoría
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
                                                                                                            <figcaption class="portfolio-caption">
                                                                                                                <?php the_title(); ?>
                                                                                                            </figcaption>
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
                                                                                <p>No se encontraron entradas en la
                                                                                    categoría Ámbar energía mística.
                                                                                </p>
                                                                            <?php endif; ?>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section style="background-image: url(https://raquelcheja.com//wp-content/uploads/2024/05/block3-1.jpg); background-color: #f5cbd2; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;" class="elementor-section elementor-top-section elementor-element elementor-element-5e80b72a elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5e80b72a" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1790bfdc" data-id="1790bfdc" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-53c3730f elementor-widget-tablet_extra__width-initial elementor-widget elementor-widget-Section Title" data-id="53c3730f" data-element_type="widget" data-widget_type="Section Title.default">
                                                <div class="elementor-widget-container">
                                                    <div class="tt-section-title blog text-center">
                                                        <span class="tt-section-sab">Blog</span>
                                                        <h2 class="section-heading">Raquel en letras</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-4fa8983 e-con-full e-flex e-con e-parent" data-id="4fa8983" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}" data-core-v316-plus="true">
                                                <div class="elementor-element elementor-element-3cf3a99 elementor-widget elementor-widget-heading" data-id="3cf3a99" data-element_type="widget" data-widget_type="heading.default">
                                                    <div class="elementor-widget-container">
                                                        <h4 class="elementor-heading-title elementor-size-default">Desde
                                                            mis inicios artísticos, he plasmado emociones profundas en
                                                            el arte y ahora, mi obra se transforma en un reflejo de
                                                            visiones actuales, acontecimientos y datos significativos en
                                                            mi blog.</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-carousel owl-loaded pad-to owl-drag">
                                                <div class="owl-stage-outer">
                                                    <div class="owl-stage">
                                                        <?php
                                                        // Argumentos para obtener posts de tipo 'post'
                                                        $args = array(
                                                            'post_type' => 'post',
                                                            'posts_per_page' => 10, // Ajusta este número para limitar la cantidad de posts mostrados
                                                            'orderby' => 'date',
                                                            'order' => 'DESC'
                                                        );

                                                        // La consulta
                                                        $consulta_posts = new WP_Query($args);

                                                        // Verificamos si hay posts
                                                        if ($consulta_posts->have_posts()) :
                                                            // Bucle a través de los posts
                                                            while ($consulta_posts->have_posts()) : $consulta_posts->the_post();
                                                        ?>
                                                                <!-- Contenido del slide individual para cada post -->
                                                                <div class="owl-item" style="width: 100%; margin-right: 4px;">
                                                                    <section class="grid-item left-slider post type-post post-<?php the_ID(); ?>">
                                                                        <div class="post-content-wrap">
                                                                            <div class="thumbnail-wrap">
                                                                                <a href="<?php the_permalink(); ?>" class="thumbnail-img">
                                                                                    <?php if (has_post_thumbnail()) {
                                                                                        the_post_thumbnail('full', array('class' => 'post-thumbnail-main', 'alt' => 'Thumbnail'));
                                                                                    } ?>
                                                                                </a>
                                                                            </div>
                                                                            <div class="content-wrap">
                                                                                <a href="<?php the_permalink(); ?>">
                                                                                    <h2 style="font-size: 20px; margin-top: 20px;" class="post-title"><?php the_title(); ?>
                                                                                    </h2>
                                                                                </a>
                                                                                <div class="post-meta">
                                                                                    <?php echo get_the_date(); ?> |
                                                                                    <?php the_author(); ?></div>
                                                                                <div class="post-excerpt">
                                                                                    <?php the_excerpt(); ?></div>
                                                                                <a href="<?php the_permalink(); ?>" class="read-more">Leer más</a>
                                                                            </div>
                                                                        </div>
                                                                    </section>
                                                                </div>
                                                        <?php
                                                            endwhile;
                                                        else :
                                                            echo '<p>No hay posts nuevos para mostrar.</p>';
                                                        endif;
                                                        // Restaurar el objeto post global a su estado previo
                                                        wp_reset_postdata();
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="owl-dots"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="elementor-element elementor-element-2395cdee e-flex e-con-boxed reseña e-con e-parent" data-id="2395cdee" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
                                <div class="e-con-inner">
                                    <div class="elementor-element elementor-element-30399d2 elementor-widget-laptop__width-initial elementor-widget elementor-widget-Section Title" data-id="30399d2" data-element_type="widget" data-widget_type="Section Title.default">
                                        <div class="elementor-widget-container">
                                            <div class="tt-section-title text-start">
                                                <span class="tt-section-sab"></span>
                                                <h2 class="section-heading">Reseñas</h2>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Reseñas 2  -->
                                    <!-- Comienza carrusel de productos  -->
                                    <section class="related products list-btn-block">

                                        <div class="products grid-view">
                                            <div class="row">
                                                <div class="owl-carousel owl-loaded owl-drag">
                                                    <div class="owl-stage-outer">
                                                        <div class="owl-stage" style="transform: translate3d(-867px, 0px, 0px); transition: all 0.25s ease 0s; width: 2023px;">
                                                            <?php
                                                            // Argumentos para obtener posts de tipo 'resena'
                                                            $args = array(
                                                                'post_type' => 'resena',
                                                                'posts_per_page' => -1, // Ajusta este número para limitar la cantidad de posts mostrados
                                                            );

                                                            // La consulta
                                                            $consulta_resenas = new WP_Query($args);

                                                            // Verificamos si hay posts
                                                            if ($consulta_resenas->have_posts()) :
                                                                // Bucle a través de los posts
                                                                while ($consulta_resenas->have_posts()) : $consulta_resenas->the_post();
                                                            ?>
                                                                    <div class="owl-item" style="width: 100%; margin-right: 4px;">
                                                                        <section class="grid-item left-slider product type-product post-<?php the_ID(); ?> status-publish instock product_cat-figura-y-pensamientos has-post-thumbnail shipping-taxable purchasable product-type-variable">
                                                                            <div class="product-content-wrap">
                                                                                <div class="thumbnail-wrap">
                                                                                    <div class="swiper-slide reseña" role="group" style="width: 100%; margin-right: 16px;" data-swiper-slide-index="<?php echo get_the_ID(); ?>">
                                                                                        <div class="tt-feature-box-icon reseña">
                                                                                            <img decoding="async" src="https://raquelcheja.com/wp-content/uploads/2024/03/comillas-coment.png" title="<?php echo get_the_title(); ?>" alt="<?php echo get_the_title(); ?>" loading="eager">
                                                                                        </div>
                                                                                        <div class="tt-feature-box-containt">
                                                                                            <h4 class="tt-feature-box-title">
                                                                                                <?php the_title(); ?></h4>
                                                                                            <p><?php the_content(); ?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </section>
                                                                    </div>
                                                            <?php
                                                                endwhile;
                                                            endif;
                                                            // Restaurar el objeto post global a su estado previo
                                                            wp_reset_postdata();
                                                            ?>
                                                        </div>

                                                    </div>
                                                    <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next disabled"><span aria-label="Next">›</span></button></div>
                                                    <div class="owl-dots disabled"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .entry-content -->
                </div><!-- #post-17 -->
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
