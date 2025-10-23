<?php
/**
 * The template for displaying search results pages
 *
 * @package kraftiart
 */

get_header();

// Si la búsqueda es para productos, redirige a la página de la tienda con la consulta de búsqueda.
if ( isset($_GET['post_type']) && $_GET['post_type'] == 'product' ) {
    wp_safe_redirect( home_url( '/tienda/?s=' . urlencode( get_search_query() ) . '&post_type=product' ) );
    exit;
}

?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="row">
            <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                <div class="col-lg-8 col-sm-12">
                    <!-- Aquí iría el contenido de la barra lateral si existe -->
                </div>
                <div class="col-lg-4 col-sm-12">
                    <?php get_sidebar(); ?>
                </div>
            <?php else : ?>
                <div class="col-lg-12 col-sm-12">
            <?php endif; ?>

            <?php if ( have_posts() ) : ?>
                <!-- Loop para mostrar resultados de búsqueda -->
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content', 'search' );
                endwhile;
                kraftiart_pagination(); // Asegúrate de que esta función existe o reemplázala con la paginación predeterminada de WordPress.
            <?php else : ?>
                get_template_part( 'template-parts/content', 'none' );
            <?php endif; ?>
                </div>
        </div>
    </div>
</main><!-- #main -->

<?php
get_footer();
