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

.section-heading{
    font-family: "Beau Rivage", Sans-serif;
    font-size: 50px!important;
    letter-spacing: 3.1px;
    margin-bottom: 30px;
      
}

.tt-section-sab {
    color: #a63854;
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

@media screen and (max-width: 960px) {
    .row {
        padding-right: 0px !important;
        padding-left: 0px !important;
        margin-right: 0px !important;
        margin-left: 0px !important;
    }
}

</style>
<main id="primary" class="site-main">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-lg-12 col-sm-12">

                    <div id="post-410" class="post-410 page type-page status-publish hentry grid-item left-slider">
                        <div class="post-excerpt">
                            <div data-elementor-type="wp-page" data-elementor-id="410" class="elementor elementor-410">
                                <section class="elementor-section elementor-top-section elementor-element elementor-element-4f5934a elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="4f5934a" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-af78c3a" data-id="af78c3a" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-bf215fd elementor-widget elementor-widget-slider_revolution" data-id="bf215fd" data-element_type="widget" data-widget_type="slider_revolution.default">
                                                    <div class="elementor-widget-container">
                                                        <?php echo do_shortcode('[rev_slider alias="slider-10" slidertitle="Slider 10"]'); ?>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="elementor-section elementor-top-section elementor-element elementor-element-d70a409 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="d70a409" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-74b61e2" data-id="74b61e2" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-00bb2f4 elementor-widget__width-initial elementor-widget elementor-widget-Section Title" data-id="00bb2f4" data-element_type="widget" data-widget_type="Section Title.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="tt-section-title text-center">
                                                            <span class="tt-section-sab">Cursos</span>
                                                            <h2 class="section-heading">Explora tu creatividad: Curso de
                                                                pintura </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <?php
// Argumentos para la consulta personalizada
$args = array(
    'post_type' => 'curso', // Asegúrate de cambiar esto por el tipo de contenido real que estés usando
    'posts_per_page' => 3, // Cantidad de cursos a mostrar
);

// La consulta personalizada
$cursos_query = new WP_Query($args);
?>

<section class="elementor-section elementor-top-section elementor-element elementor-element-067b790 home_06_banner Home_5_banner elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="067b790" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <?php if ($cursos_query->have_posts()) : while ($cursos_query->have_posts()) : $cursos_query->the_post(); ?>
            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-widget-Banner" data-element_type="widget" data-widget_type="Banner.default">
                        <div class="elementor-widget-container">
                            <div class="tt-banner">
                                <a href="<?php the_permalink(); ?>" class="banner-image">
                                    <img decoding="async" src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" loading="eager">
                                </a>
                                <div class="banner-text tt-icon-bottom text-center">
                                    <div class="wpbanner-content">
                                        <div class="banner-sub-title"></div>
                                        <div class="banner-title text-white"><?php the_title(); ?></div>
                                        <div class="button-banner-wrap "><a class="banner-button btn btn-primary" href="/contacto">Contáctame</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
</section>

                            </div>
                        </div>
                        <!-- .entry-content -->
                    </div><!-- #post-410 -->
                </div>
            </div>

        </div>
    </div>
</main><!-- #main -->

<?php
get_footer();
