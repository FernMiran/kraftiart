<?php
/**
 * Footer One
 */
?>

<footer id="colophon" class="site-footer footer-style-2">
    <div class="widget-wrap">
        <?php get_template_part( 'template-parts/footer/footer', 'widgets'); ?>
        </div>
        
    <?php
    /**
     * Footer Bottom
     */
    if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
        $kraftiart_options = get_option( 'kraftiart_options' );
		// $footer_style = isset( $_GET['footer_style'] ) ? sanitize_text_field( $_GET['footer_style'] ) : 1;

        if( $kraftiart_options['footer-bottom'] == 1 ){
            get_template_part( 'template-parts/footer/footer', 'bottom' );
        }
    }
    /**
     * Copyright
     */
    ?>
        <?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
   
</footer><!-- #colophon -->
