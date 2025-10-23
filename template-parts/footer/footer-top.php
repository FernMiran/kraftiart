<?php
/**
 * Footer Top
 */
?>
<?php 

if( class_exists( 'ReduxFramework' ) ) {  ?>

    <div id="footer-top" class="footer-top-section">
        <?php
        $kraftiart_options = get_option( 'kraftiart_options' );
        $count = count( $kraftiart_options['title_field'] );
        if( $count <= 4 ){ $col = 12 / $count; }else{ $col = 4; }
        echo '<div class="container">';
            echo '<div class="row footer-top-row">';
                for( $i=0; $i<$count; $i++ ){
                    echo '<div class="col-lg-'.$col.' footer-top-columns">';
                        echo '<div class="footer-top-content">';
                            echo '<div>'. $kraftiart_options['title_field'][$i] .'</div>';
                            echo do_shortcode( $kraftiart_options['text_field'][$i] );
                        echo '</div>';
                    echo '</div>';
                }
            echo '</div>';
        echo '</div>';
        ?>
    </div><!-- #footer-top -->

<?php
}
