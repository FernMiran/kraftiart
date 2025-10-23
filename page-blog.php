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

.page .site-main a.read_more {
    color: #fff !important;
}

.page .site-main a.read_more:hover {
    color: #666 !important;
}
.elementor-5104 .elementor-element.elementor-element-4baaad0 .tt-section-title .tt-section-sab {
    color: #A63854;
}
.elementor-5104 .elementor-element.elementor-element-0720ebe {
    margin-top: 80px;
    margin-bottom: 0px;
}
.elementor-5104 .elementor-element.elementor-element-5ba572a:not(.elementor-motion-effects-element-type-background), .elementor-5104 .elementor-element.elementor-element-5ba572a > .elementor-motion-effects-container > .elementor-motion-effects-layer {
    background-color: #F8F5EF;
}
.elementor-5104 .elementor-element.elementor-element-5ba572a {
    transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
    margin-top: -50px;
    margin-bottom: 0px;
    padding: 80px 0px 80px 0px;
}

.page .site-main a {
    color: #666!important;
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
    
    .section-heading{
     font-family: "Raleway", Sans-serif;
    font-size: 50px!important;
    letter-spacing: 3.1px;
    margin-top: 20px!important;
     margin-bottom: 0px!important;
     line-height: 1;
}
</style>
<main id="primary" class="site-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">

                <div id="post-5104" class="post-5104 page type-page status-publish hentry grid-item left-slider">
                    <div class="post-excerpt">
                        <div data-elementor-type="wp-page" data-elementor-id="5104" class="elementor elementor-5104">
                            <section class="elementor-section elementor-top-section elementor-element elementor-element-5ba572a elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5ba572a" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-952df72" data-id="952df72" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-4baaad0 elementor-widget__width-initial elementor-widget elementor-widget-Section Title" data-id="4baaad0" data-element_type="widget" data-widget_type="Section Title.default">
                                                <div class="elementor-widget-container">
                                                    <div class="tt-section-title text-center">
                                                        <span class="tt-section-sab">Blog: Pinceladas de inspiración</span>
                                                        <h2 class="section-heading">Cada trazo de pincel puede <br> contar una historia única
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <?php
                            // Argumentos para consultar los posts de la categoría 'prensa'
                            $args = array(
                                'category_name' => 'blog', // Asegúrate de que el slug de la categoría esté correcto
                                'posts_per_page' => -1, // Cambia el número de posts por página según necesites
                            );

                            // La consulta
                            $query = new WP_Query($args);

                            // Comprobamos si la consulta tiene posts
                            if ($query->have_posts()) : ?>

                                <section class="elementor-section elementor-top-section elementor-element elementor-element-0720ebe elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="0720ebe" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4ec321e" data-id="4ec321e" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-73ac5a7 elementor-widget elementor-widget-Blog" data-id="73ac5a7" data-element_type="widget" data-widget_type="Blog.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="swiper blog-section swiper-slider blog-style blog-style-1 swiper-bul swiper-initialized swiper-pointer-events swiper-backface-hidden" data-id="blog-section">
                                                            <div>
                                                                <div class="row">
                                                                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                                                                        <div class="tt-post-wrapper grid-item float-start col-md-6">
                                                                            <div class="tt-post-thumbnail position-relative">

                                                                                <a href="<?php the_permalink(); ?>">
                                                                                    <?php if (has_post_thumbnail()) : ?>
                                                                                        <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>
                                                                                    <?php endif; ?>
                                                                                </a>
                                                                                <div class="post-meta-wrap position-absolute">
                                                                                    <div class="tt-post-meta"><?php echo get_the_date(); ?></div> <!-- Muestra la fecha del post -->
                                                                                    <div class="tt-post-author"><?php the_author(); ?></div> <!-- Muestra el autor del post -->
                                                                                    <!-- Muestra el autor del post -->
                                                                                </div>

                                                                            </div>
                                                                            <div class="tt-post-details">
                                                                                <div class="post-meta-wrap">
                                                                                <?php
                                                                                    $categories = get_the_category();
                                                                                    $separator = ', '; // Define el separador entre las categorías
                                                                                    $output = '';

                                                                                    if (!empty($categories)) {
                                                                                        foreach ($categories as $category) {
                                                                                            $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
                                                                                        }
                                                                                        $output = trim($output, $separator); // Quita el último separador
                                                                                    }
                                                                                    ?>
                                                                                    <div class="tt-post-meta"><?php echo get_the_date(); ?></div>
                                                                                    <div class="tt-post-author"><?php the_author();  ?> | <?php echo $output; ?></div>
                        
 
                                                                                </div>
                                                                                <div class="tt-post-title">
                                                                                    <h6><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h6>
                                                                                </div>
                                                                                <div class="tt-post-content"><?php the_excerpt(); ?></div>
                                                                                <div class="tt-post-more float-start"><a href="<?php the_permalink(); ?>" class="position-relative btn btn-primary read_more">Leer más</a></div>
                                                                                <div class="testi-social d-flex"></div>
                                                                            </div>
                                                                        </div>

                                                                    <?php endwhile;
                                                                    wp_reset_postdata(); ?>
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <div class="pagination justify-content-center">
                                                                            <nav aria-label="Page navigation"></nav>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            <?php else : ?>
                                <p class="text-center">No se encontraron posts en la categoría blog.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- .entry-content -->
                </div><!-- #post-5104 -->
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
