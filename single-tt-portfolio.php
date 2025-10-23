<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kraftiart
 */

get_header();
?>
<style>
    .section-heading {
    margin: 10px 0 0 0;
}

.section-heading {
    font-family: "Raleway", Sans-serif;
    font-size: 50px !important;
    letter-spacing: 3.1px;
    line-height: 80px!important;
}


</style>

	<main id="primary" class="site-main">
		<div class="container p-4">
			<div class="row">
			    <div class="container mt-2">
			        <div class="elementor-widget-container">
					<div class="tt-section-title text-start">
						<span class="tt-section-sab"><?php the_field('sub_titulo'); ?></span>
													<h2 class="section-heading"><?php the_title(); ?></h2>
								</div>  
				</div>
				
				<div class="subtitle-wrap">
				    <?php echo the_content() ?>
				</div>
								    
	
			

			</div>
			    </div>
			                <!-- Image Section -->
                    <!-- Image Section -->
<div class="container mt-2">
    <div class="row mt-4  mb-4">
       
        <!-- Image 1 -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="image-container  mb-3">
                <?php $image1 = get_field('imagen_1'); ?>
                <?php if($image1): ?>
                    <!-- Asegúrate de que la URL es accesible directamente en tu navegador -->
                    <img class="img-fluid" src="<?php echo esc_url($image1); ?>" alt="Descripción" style="height: 450px; width:100%; object-fit:cover" />
                <?php else: ?>
                    <!-- Si la imagen no se carga, aparecerá este mensaje -->
                    <p>Imagen 1 no disponible</p>
                <?php endif; ?>
            </div>
        </div>
        
         <!-- Image 1 -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 ">
            <div class="image-container mb-3">
                <?php $image1 = get_field('imagen_2'); ?>
                <?php if($image1): ?>
                    <!-- Asegúrate de que la URL es accesible directamente en tu navegador -->
                    <img class="img-fluid" src="<?php echo esc_url($image1); ?>" alt="Descripción" style="height: 450px; width:100%; object-fit:cover"/>
                <?php else: ?>
                    <!-- Si la imagen no se carga, aparecerá este mensaje -->
                    <p>Imagen 2 no disponible</p>
                <?php endif; ?>
            </div>
        </div>
        <!--  imagen_2  -->
         <!-- Image 1 -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="image-container mb-3">
                <?php $image1 = get_field('imagen_3'); ?>
                <?php if($image1): ?>
                    <!-- Asegúrate de que la URL es accesible directamente en tu navegador -->
                    <img class="img-fluid" src="<?php echo esc_url($image1); ?>" alt="Descripción" style="height: 450px; width:100%; object-fit:cover"/>
                <?php else: ?>
                    <!-- Si la imagen no se carga, aparecerá este mensaje -->
                    <p>Imagen 3 no disponible</p>
                <?php endif; ?>
            </div>
        </div>
         
    </div>
</div>


		</div>
	</main><!-- #main -->

<?php
get_footer();

