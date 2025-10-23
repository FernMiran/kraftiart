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
 <style>
 
 /*Lista check */
 .check ul li {
    list-style-type: none;
    padding-left: 1em;
}

.check ul li::before {
    content: "\2713"; /* Símbolo de check */
    display: inline-block;
    width: 1.1em; /* Ajustar el tamaño del icono */
    
    
    font-weight: bold; /* Hacer el símbolo más grueso */
    font-size: 1.5em; /* Ajustar el tamaño del icono */
    color: #f7c6d8 !important; /* Cambiar el color del icono */
}


  
 .btn-curso{
     background-color: #A53853;
 }
     .price-button-container .btn-flat {
    border-radius: 0;
    /* Elimina los estilos de sombra si los hay */
    box-shadow: none;
     }
    
    .bg-dark {
    background-color: #34373f !important;
}
     
     .bg-primary {
    background-color: #f7c6d8 !important;
}


/* Aumenta el margen inferior del precio para dar más espacio */
.price-button-container h3 {
    margin-top: 30rem !important;
}

.section-heading{
    font-family: "Beau Rivage", Sans-serif;
    font-size: 40px!important;
    letter-spacing: 3.1px;
    margin-bottom: 10px;
      
}

.section-heading_2{
     font-family: "Beau Rivage", Sans-serif;
    font-size: 40px!important;
    letter-spacing: 3.1px;
    margin-top: 0px!important;
   
    
}

.section-heading_title{
     font-family: "Beau Rivage", Sans-serif;
    font-size: 45px!important;
    letter-spacing: 3.1px;
    margin-top: 0px!important;
     margin-bottom: 0px!important;
    
}

 </style>
<main id="primary" class="site-main">
    <div class="container">
         <!-- Fila del curso -->
            <div class="row">
                <!-- Columna de información del curso -->
                <div class="col-md-8">
                    <div class="bg-dark  p-3 text-white">
                        <h2 class="text-white section-heading_title"><?php the_title(); ?></h2>
                        <p class="text-white"><?php the_field('sub_titulo'); ?></p>
                        <!-- Más datos del curso aquí -->
                    </div>
                    <!-- Sección de 'Lo que aprenderás' -->
                    <div class="p-4 border m-4 check">
                        <h3 class="section-heading">Lo que aprenderás</h3>
                         <?php the_field('aprenderas'); ?>
                    </div>
                    <!-- Requisitos del curso -->
                    <div class="p-4 border m-4 check">
                        <h3 class="section-heading">Requisitos</h3>
                         <?php the_field('requisitos'); ?>
                    </div>
                    <!-- Descripción del curso -->
                    <div class="p-4 border m-4">
                        <h3 class="section-heading">Descripción</h3>
                        <?php the_content(); // Este es el contenido del post ?>
                    </div>
                </div>

                <!-- Columna de imagen y compra del curso -->
                <div class="col-md-4">
                    
                    <div class="elementor-column elementor-col-33 elementor-top-column elementor-element" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-widget-Banner" data-element_type="widget" data-widget_type="Banner.default">
                        <div class="elementor-widget-container">
                            <div class="tt-banner">
                                <div   class="banner-image">
                                  <img decoding="async" src="<?php echo (has_post_thumbnail()) ? esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')) : 'https://via.placeholder.com/800x600'; ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" loading="eager">

                                </div>
                                <div class="banner-text tt-icon-bottom text-center">
                                    <div class="wpbanner-content">
                                        <div class="banner-sub-title"></div>
                                        
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    

                    <div class="bg-primary text-white p-4 mb-3 text-center price-button-container">
    <h3 class="text-center mt-4 mt-4 ">$/ <?php the_field('precio'); ?></h3>
    <a class="btn btn-success btn-block btn-flat btn-curso w-100 text-white" href="<?php echo esc_url( get_field('enlace') ); ?>" class="btn btn-success btn-block btn-flat btn-curso w-100">Muy pronto</a> 
    
    
</div>

                    <!-- Sección de 'Este curso incluye' -->
                   <div class="p-4 shadow">
    <div class="p-2 check">
        <h3 class="section-heading_2">Este curso incluye:</h3>
       <?php the_field('incluye'); ?>
    </div>
</div>

            </div>
    </div>
</main><!-- #main -->

<?php
get_footer();
