<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kraftiart
 */

		if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
			$kraftiart_options = get_option( 'kraftiart_options' );
			$footer_style = isset( $_GET['footer_style'] ) ? sanitize_text_field( $_GET['footer_style'] ) : '';

			if( $footer_style == 1 ){
				get_template_part( 'template-parts/footer/footer', 'one' );
			}elseif( $footer_style == 2 ){
				get_template_part( 'template-parts/footer/footer', 'two' );
			}elseif( $footer_style == 3 ){
				get_template_part( 'template-parts/footer/footer', 'three' );
			}elseif( $kraftiart_options['footer-style'] == "footer-style-1" ){
				get_template_part( 'template-parts/footer/footer', 'one' );

			}elseif( $kraftiart_options['footer-style'] == "footer-style-2" ){
				get_template_part( 'template-parts/footer/footer', 'two' );

			}else{
				get_template_part( 'template-parts/footer/footer', 'main' );
			}

		} else{
			get_template_part( 'template-parts/footer/footer', 'main' );
		} ?>	
	</div><!-- #page -->
</div><!-- #viewport -->
<?php
if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
	$kraftiart_options = get_option( 'kraftiart_options' );

	if ( $kraftiart_options['opt-backtotop'] == 1 ) {
		if( ! empty( $kraftiart_options['backtotop-img']['url'] ) && $kraftiart_options['backtotop-de-img'] == 0 ){ ?>
			<a class="section-back-to-top back-to-top-img" id="section-top" href="javascript:void(0);">
				<img class="img-fluid logo" src="<?php echo esc_url( $kraftiart_options['backtotop-img']['url'] ); ?>" alt="<?php esc_attr_e( 'Top', 'kraftiart' ); ?>">
			</a>
			<?php
		} else { ?>
				<div class="back-to-top">
					<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
						<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
					</svg>
				</div>
			<?php
		}
	}
} else {
	?>
	<div class="back-to-top">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
		</svg>
	</div>
	<?php
}

get_template_part( 'inc/core/subscribe-popup' );
wp_footer();

?>



<!-- Dark - Light switch CODE -->

<?php
	$kraftiart_options = get_option( 'kraftiart_options' );
	if( $kraftiart_options['dark-light-option'] == 'dark-light-01' ){
	?>
				<label for="night-light-checkbox" class="night-light-label">
						<input type="checkbox" id="night-light-checkbox">
						<span class="night-light-ball"></span>

				<div class="sun-svg">	
				<i class="fa-solid fa-moon"></i>
				<h6>light</h6> 	
				</div>
				<div  class="moon-svg">	
				<i class="fa-solid fa-sun"></i>	
				<h6>dark</h6>
				</div>
					</label>


					<?php }else{ ?>
		
	<?php } ?>


</body>
</html>



<!-- Dark - Light switch JS -->
<script>



// document.addEventListener('DOMContentLoaded', function() {
//     setTimeout(function() {
//         var githubIcons = document.querySelectorAll('svg.fa-github');
//         console.log(`Encontrados ${githubIcons.length} íconos de GitHub para cambiar.`);

//         githubIcons.forEach(function(icon) {
//             // Remueve el ícono de GitHub.
//             icon.classList.remove('fa-github');
//             // Actualiza el atributo data-icon a "tiktok".
//             icon.setAttribute('data-icon', 'tiktok');
//             // Asegura que data-prefix sea "fab".
//             icon.setAttribute('data-prefix', 'fab');
//             // Agrega la clase para el nuevo ícono de TikTok.
//             icon.classList.add('fa-tiktok');
//             console.log('Ícono de GitHub cambiado a TikTok');
//         });
//     }, 1000); // Espera 1 segundo antes de ejecutar este código
// });

document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        var githubIcons = document.querySelectorAll('svg.fa-github');
        console.log(`Encontrados ${githubIcons.length} íconos de GitHub para cambiar.`);

        githubIcons.forEach(function(icon) {
            // Crea un nuevo elemento SVG para el ícono de TikTok.
            var newIcon = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
            newIcon.classList.add('svg-inline--fa', 'fa-tiktok');
            newIcon.setAttribute('aria-hidden', 'true');
            newIcon.setAttribute('focusable', 'false');
            newIcon.setAttribute('data-prefix', 'fab');
            newIcon.setAttribute('data-icon', 'tiktok');
            newIcon.setAttribute('role', 'img');
            newIcon.setAttribute('xmlns', 'http://www.w3.org/2000/svg');
            newIcon.setAttribute('viewBox', '0 0 448 512');
            // Usa el path del SVG de TikTok que proporcionaste.
            newIcon.innerHTML = '<path fill="currentColor" d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.25V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.62 74.62 0 1 0 52.23 71.18V0l88 0a121.2 121.2 0 0 0 1.86 22.17h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.14z"></path>';

            // Reemplaza el ícono antiguo con el nuevo.
            icon.parentNode.replaceChild(newIcon, icon);
            console.log('Ícono de GitHub reemplazado por TikTok');
        });
    }, 100); // Espera 1 segundo antes de ejecutar este código.
});



 





// tik tok 
	
	const darkCheck = document.getElementById('night-light-checkbox');

	darkCheck.addEventListener('click', () => {
	if (darkCheck.checked) {
		document.body.classList.add('dark-mode');
		localStorage.setItem('dark-switcher', 'dark');
	} else {
		document.body.classList.remove('dark-mode');
		localStorage.removeItem('dark-switcher');
	}
	});

	if (localStorage.getItem('dark-switcher')) {
	document.body.classList.add('dark-mode');
	darkCheck.checked = true;
	}
	
	


</script>


<!-- Dark - Light switch CSS -->
<style>
.night-light-label #night-light-checkbox {
  position: absolute;
  visibility: hidden;
}

.night-light-label {
  position: fixed;
top: 70%;
bottom: auto;
left: 10px;
right: auto;
writing-mode: vertical-rl;
transform: rotate(180deg);
-webkit-transform: rotate(180deg);
-moz-transform: rotate(180deg);
-ms-transform: rotate(180deg);
-o-transform: rotate(180deg);
width: 33px;
height: 120px;
border-radius: 25px;
-moz-border-radius: 25px;
-webkit-border-radius: 25px;
-khtml-border-radius: 25px;
background: var(--color-text);
display: flex;
align-items: center;
justify-content: space-around;
z-index: 999;
border: none;
margin: 0;
overflow: hidden;
padding: 0 4px 0 0;
outline: #fff solid 2px;
padding: 10px 0;
	cursor:pointer;
}

.night-light-label .night-light-ball {
 position: absolute;
width: 23px;
height: 54px;
top: auto;
left: 5px;
border-radius: 25px;
background: var(--primary-color);
z-index: -1;
transition: 300ms;
bottom: 60px;
}

.night-light-label #night-light-checkbox:checked + .night-light-ball {
  transform: translateY(50px);
}
.moon-svg,.sun-svg{
display: flex;
align-items: center;
justify-content: center;
}
.moon-svg h6,.sun-svg h6{
color: #fff;
font-size: 14px;
margin: 0;
color: #fff;
font-size: 14px;
margin: 0;
font-family: var(--secondary-font);
text-transform: capitalize;	
}
.moon-svg svg,.sun-svg svg{
color: #fff;
font-size: 14px;
display: none;
}
@media (max-width:991px) {
.night-light-label{
height: 70px;
            width: 30px;
padding: 6px;
}
.moon-svg h6,.sun-svg h6 {
            font-size: 0;
            display: none;
        }
 .moon-svg svg,.sun-svg svg {
            display: block !important;
            margin: 0;
        }
.night-light-label .night-light-ball {
    height: 22px;
    width: 22px;
    top: 39px;
    border-radius: 50%;
    left: 4px;
}
.night-light-label #night-light-checkbox:checked + .night-light-ball {
    transform: translateY(-29px);
}
}

</style>
</body>
</html>
