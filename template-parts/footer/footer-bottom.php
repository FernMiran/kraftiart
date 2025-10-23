<?php
/**
 * Footer Top
 */
?>
<?php 

if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {  ?>

    <div id="footer-bottom" class="footer-bottom">
        <?php
        $kraftiart_options = get_option( 'kraftiart_options' );
        if( !empty( $kraftiart_options['footer-bottom-content'] ) ){
            echo do_shortcode( $kraftiart_options['footer-bottom-content'] );
        }
        ?>
    </div><!-- #colophon -->

<?php
}
