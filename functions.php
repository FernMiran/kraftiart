<?php
/**
 * kraftiart functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kraftiart
 */

if ( ! defined( 'kraftiart_version' ) ) {
	// Replace the version number of the theme on each release.
	define( 'kraftiart_version', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kraftiart_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	/* Register WP3+ menus */
	register_nav_menu( 'header-menu', esc_html__( 'Main Menu', 'kraftiart' ) );
	register_nav_menu( 'hamburger-menu', esc_html__( 'Hamburger Menu', 'kraftiart' ) );
	register_nav_menu( 'footer-menu', esc_html__( 'Footer Menu', 'kraftiart' ) );
	

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);


	function add_post_formats() {
		add_theme_support( 
			'post-formats',
			array( 
				'gallery', 
				'quote', 
				'video', 
				'aside', 
				'image', 
				'link' 
			) 
		);
	}
	 
	add_action( 'after_setup_theme', 'add_post_formats', 20 );


	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'kraftiart_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'kraftiart_setup' );

/**
 * Load theme textdomain for translations.
 * This is loaded on 'init' action to comply with WordPress 6.7.0+ requirements.
 */
function kraftiart_load_textdomain() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on kraftiart, use a find and replace
		* to change 'kraftiart' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'kraftiart', get_template_directory() . '/languages' );
}
add_action( 'init', 'kraftiart_load_textdomain' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kraftiart_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kraftiart_content_width', 640 );
}
add_action( 'after_setup_theme', 'kraftiart_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function kraftiart_scripts() {
	wp_enqueue_style( 'kraftiart-style', get_stylesheet_uri(), array(), 'kraftiart_version' );
	wp_style_add_data( 'kraftiart-style', 'rtl', 'kraftiart_version' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kraftiart_scripts' );

function kraftiart_get_comments_number_text( $zero = false, $one = false, $more = false, $post_id = 0 ) {
	$number = get_comments_number( $post_id );

	if ( $number > 1 ) {
		if ( false === $more ) {
			/* translators: %s: Number of comments. */
			$output = sprintf( esc_html_x( '%s', '%s Comments', $number, 'kraftiart' ), number_format_i18n( $number ) );
		} else {
			// % Comments
			/*
			 * translators: If comment number in your language requires declension,
			 * translate this to 'on'. Do not translate into your own language.
			 */
			if ( 'on' === _x( 'off', 'Comment number declension: on or off', 'kraftiart' ) ) {
				$text = preg_replace( '#<span class="screen-reader-text">.+?</span>#', '', $more );
				$text = preg_replace( '/&.+?;/', '', $text ); // Kill entities.
				$text = trim( strip_tags( $text ), '% ' );

				// Replace '% Comments' with a proper plural form.
				if ( $text && ! preg_match( '/[0-9]+/', $text ) && false !== strpos( $more, '%' ) ) {
					/* translators: %s: Number of comments. */
					$new_text = _n( '%s Comment', '%s Comments', $number, 'kraftiart' );
					$new_text = trim( sprintf( $new_text, '' ) );

					$more = str_replace( $text, $new_text, $more );
					if ( false === strpos( $more, '%' ) ) {
						$more = '% ' . $more;
					}
				}
			}

			$output = str_replace( '%', number_format_i18n( $number ), $more );
		}
	} elseif ( 0 == $number ) {
		$output = ( false === $zero ) ? esc_html__( '0', 'kraftiart' ) : $zero;
	} else { // Must be one.
		$output = ( false === $one ) ? esc_html__( '1', 'kraftiart' ) : $one;
	}
	/**
	 * Filters the comments count for display.
	 *
	 * @since 1.5.0
	 *
	 * @see _n()
	 *
	 * @param string $output A translatable string formatted based on whether the count
	 *                       is equal to 0, 1, or 1+.
	 * @param int    $number The number of post comments.
	 */
	return apply_filters( 'comments_number', $output, $number );
}

require_once get_template_directory() . '/inc/init.php';

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_filter( 'woocommerce_layered_nav_count', function( $text, $count ) {
    return '<span class="count">' . absint( $count ) . '</span>';
}, 10, 2 );


add_filter (  'woocommerce_layered_nav_any_label' ,  'remove_any_from_filter_dropdown' ,  10 ,  3  ) ; 

function remove_any_from_filter_dropdown (  $sprintf ,  $taxonomy_label ,  $taxonomy  ) { 
	// filter ...
	$sprintf = sprintf ( __ (  '%s' ,  'kraftiart'  ) ,  $taxonomy_label  );
	return  $sprintf ; 
}

add_filter( 'woocommerce_single_product_zoom_options', 'custom_single_product_zoom_options' );
function custom_single_product_zoom_options( $zoom_options ) {
    // Changing the magnification level:
    $zoom_options['magnify'] = 0.9;

    return $zoom_options;
}

/* Empty cart */
add_action( 'init', 'woocommerce_clear_cart_url' );
function woocommerce_clear_cart_url() {
    global $woocommerce;
    if ( isset( $_GET['empty-cart'] ) && $_GET['empty-cart'] == 'yes' ) {
        $woocommerce->cart->empty_cart();
    }
}
add_action( 'woocommerce_cart_coupon', 'woocommerce_empty_cart_button' );
function woocommerce_empty_cart_button() {
    global $woocommerce;
    $cart_url = $woocommerce->cart->get_cart_url();
    echo '<a href="'.$cart_url.'?empty-cart=yes" class="button btn btn-primary order-1 empty_cart" title="' . esc_attr( 'Empty Cart', 'woocommerce' ) . '">' . esc_html( 'Empty Cart', 'woocommerce' ) . '</a>';
}

function custom_scripts(){
    ?>
    <script type="text/javascript">
        (function($){
            $(document).ready(function(){
                $(document).on('click','.empty_cart',function(e){
                    e.preventDefault();
                    if(confirm('Are you sure want to empty cart?')){
                        var url = $(this).attr('href');
                        window.location = url;
                    }
                });
            });
        })(jQuery);
    </script>
    <?php
}

add_action( 'wp_footer', 'custom_scripts', 10, 1 );

function kraftiart_gradient_background() {
	$kraftiart_options = get_option( 'kraftiart_options' );
	$custom_css = '';

	$first_color   = $kraftiart_options['first-color'];
	$second_color = $kraftiart_options['second-color'];

	echo 'background: linear-gradient(' . $first_color . ',' . $second_color . ' 100%);';
}
add_action( 'kraftiart_gradient_bg', 'kraftiart_gradient_background' );

function custom_buy_now_button() {
    global $product;

    if ( !$product->is_in_stock() ) {
        echo '<a class="button alt out-of-stock">' . __('Buy Now', 'woocommerce') . '</a>';
    }
}




add_action( 'woocommerce_single_product_summary', 'custom_buy_now_button', 20 );


function set_default_quantity($args, $product) {
    $args['input_value'] = 1; // Set the default quantity to 1
    return $args;
}
add_filter('woocommerce_quantity_input_args', 'set_default_quantity', 10, 2);



// Categorias 
function portfolio_custom_taxonomy() {
    register_taxonomy(
        'portfolio_category',  // Taxonomía personalizada
        'tt-portfolio',           // Nombre del CPT al que se aplica
        array(
            'label' => 'Categorías de Portafolio', // Nombre de la taxonomía
            'hierarchical' => true, // True para comportamiento tipo categoría
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            'meta_box_cb' => true,
            'show_admin_column' => true, // Mostrar columna en el admin
            'show_in_quick_edit' => true,
        )
    );
}
add_action( 'init', 'portfolio_custom_taxonomy', 0 );

function registrar_categoria_portfolio() {
    $labels = array(
        'name'              => _x( 'Categorías de Portafolio', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Categoría de Portafolio', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Buscar Categorías de Portafolio', 'textdomain' ),
        'all_items'         => __( 'Todas las Categorías de Portafolio', 'textdomain' ),
        'parent_item'       => __( 'Categoría Padre de Portafolio', 'textdomain' ),
        'parent_item_colon' => __( 'Categoría Padre de Portafolio:', 'textdomain' ),
        'edit_item'         => __( 'Editar Categoría de Portafolio', 'textdomain' ),
        'update_item'       => __( 'Actualizar Categoría de Portafolio', 'textdomain' ),
        'add_new_item'      => __( 'Añadir Nueva Categoría de Portafolio', 'textdomain' ),
        'new_item_name'     => __( 'Nuevo Nombre de Categoría de Portafolio', 'textdomain' ),
        'menu_name'         => __( 'Categoría de Portafolio', 'textdomain' ),
    );
    $args = array(
        'hierarchical'      => true, // true para categorías tipo jerarquía, false para etiquetas tipo plano
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'portfolio_category' ),
    );

    register_taxonomy( 'portfolio_category', array( 'tt-portfolio' ), $args );
}
add_action( 'init', 'registrar_categoria_portfolio' );


add_filter('get_the_archive_title', function ($title) {
    if (is_post_type_archive('product')) {
        $title = post_type_archive_title('', false);
    }
    return $title;
});

// Precio variable 

function custom_variable_price_display( $price, $product ) {
    // Si es un producto variable y está en la página de un solo producto
    if( $product->is_type( 'variable' ) && is_product() ) {
        // Obtén el precio mínimo
        $min_price = $product->get_variation_price( 'min', true );
        
        // Configura el precio para que muestre "Desde: [precio mínimo]"
        //$price = ' ' . wc_price( $min_price ) . 'Desde: ' ;
        $price = ' ';
    }
    return $price;
}
add_filter( 'woocommerce_get_price_html', 'custom_variable_price_display', 10, 2 );

// Iconos a pestañas 
add_filter( 'woocommerce_product_tabs', 'custom_woocommerce_product_tabs' );
function custom_woocommerce_product_tabs( $tabs ) {
    // Agregar clase para íconos
    $tabs['description']['class'][] = 'icon-descripcion';
    $tabs['additional_information']['class'][] = 'icon-info-adicional';
    $tabs['reviews']['class'][] = 'icon-valoraciones';
    $tabs['shipping_notes']['class'][] = 'icon-nota-envio'; // Esta es la clase que se agregará para "Nota de envío"

    return $tabs;
}


// pestaña adicional 
add_filter( 'woocommerce_product_tabs', 'new_shipping_notes_tab' );
function new_shipping_notes_tab( $tabs ) {
    // Añadir la nueva pestaña
    $tabs['shipping_notes'] = array(
        'title'    => __( 'Shipping Notes', 'text-domain' ),
        'priority' => 50,
        'callback' => 'shipping_notes_tab_content'
    );
    
    return $tabs;
}

// Contenido de la nueva pestaña
add_filter( 'woocommerce_product_tabs', 'new_custom_tab', 120 );
function new_custom_tab( $tabs ) {
    // Inserta la nueva pestaña antes de la de valoraciones (que usualmente tiene una prioridad de 50)
    $tabs['shipping_notes'] = array(
        'title'    => __( 'Nota de envío', 'text-domain' ),
        'priority' => 90, // Prioridad menor que valoraciones pero mayor que la anterior a valoraciones
        'callback' => 'shipping_notes_tab_content'
    );

    return $tabs;
}


add_action( 'woocommerce_product_additional_information', 'print_custom_html' );
function print_custom_html()
{
	global $product;

    // Listado de IDs de las categorías de productos originales
    $original_categories_ids = array( 238, 326, 325, 327 );
    $is_original = false;

    // Revisamos si el producto está en alguna de las categorías de productos originales
    foreach ( $original_categories_ids as $cat_id ) {
        if ( has_term( $cat_id, 'product_cat', $product->get_id() ) ) {
            $is_original = true;
            break; // Salimos del ciclo si encontramos que el producto está en una categoría original
        }
    }
	if ( !$is_original ) {
	?>

	<p>🖼️Todas las obras se envían sin marco para mayor protección durante el envío. 
Si deseas recibir tu obra enmarcada, este servicio tiene un costo adicional y debe solicitarse previamente.
Por favor, comunícate directamente con el equipo de Raquel, para más detalles y opciones disponibles.
</p>
	<?php
	}
}

function shipping_notes_tab_content() {
    global $product;

    // Listado de IDs de las categorías de productos originales
    $original_categories_ids = array( 238, 326, 325, 327 );
    $is_original = false;

    // Revisamos si el producto está en alguna de las categorías de productos originales
    foreach ( $original_categories_ids as $cat_id ) {
        if ( has_term( $cat_id, 'product_cat', $product->get_id() ) ) {
            $is_original = true;
            break; // Salimos del ciclo si encontramos que el producto está en una categoría original
        }
    }

   

    // Contenido personalizado para las categorías de productos originales
    if ( $is_original ) { 
        echo '<h2>' . __( 'Contacto para Piezas Originales', 'text-domain' ) . '</h2>';
        // Todo el texto en una línea, con "Raquel Cheja" como enlace
        echo '<p>Por ser una pieza original, contacta a:  <a style="color: #25d366!important; margin-left: 0px;" class="btn_cheja" id="l" href="https://wa.me/525624030405" target="_blank"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-whatsapp"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" /><path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" /></svg> Raquel Cheja </a></p> <p>Y dependiendo el lugar de la República Mexicana se te dará el tiempo de entrega personalmente.</p>';
    } else {
         echo '<h2>' . __( 'Tiempos de Envío', 'text-domain' ) . '</h2>';
    echo '<p>' . __( '¡Cada impresión se realiza bajo pedido! Por favor, permítenos hasta 15 días hábiles para que nuestro equipo, dirigido por nuestra familia, cree tu impresión con amor y cuidado.', 'text-domain' ) . '</p><br>';
        // Encabezado para Cómo Empaquetamos (para todas las otras categorías)
        echo '<h2>' . __( 'Cómo Empaquetamos', 'text-domain' ) . '</h2>';
        echo '<p>' . __( 'Protegido con papel de vidrio biodegradable de grado conservación y asegurado en un tubo postal de alta resistencia para la entrega. Nos encanta el embalaje simple y ecológico que no es super llamativo. ¡Lo que cuenta es el interior!', 'text-domain' ) . '</p>';
    }
    echo '<h2>' . __( 'Tiempos de Entrega', 'text-domain' ) . '</h2>';
    echo '<p>' . __( 'Enviado desde México ✈️<br/>El tiempo estimado de entrega es de  15 días hábiles', 'text-domain' ) . '</p>';
    echo '<p>' . __( 'Envíos internacionales: El tiempo estimado de tránsito es de 10 a 25 días hábiles, dependiendo del país de destino. Ten en cuenta que, en algunos casos, el proceso aduanal puede extender la entrega hasta por 15 días adicionales.', 'text-domain' ) . '</p>';
}


// traducir delivery estimado 

function cambiar_texto_delivery_estimado( $translated_text, $untranslated_text, $domain ) {
    if ( ! is_admin() && $translated_text == 'Estimated Delivery' ) {
        return 'Entrega Estimada';
    }
    return $translated_text;
}
add_filter( 'gettext', 'cambiar_texto_delivery_estimado', 20, 3 );


// Traducir stock
function cambiar_texto_stock_woocommerce( $text ) {
    if ( strpos( $text, 'Only' ) !== false && strpos( $text, 'left in stock' ) !== false ) {
        $text = str_replace( 'Only', 'Solo quedan', $text );
        $text = str_replace( 'left in stock', 'artículos en inventario!', $text );
    }
    return $text;
}
add_filter( 'woocommerce_get_stock_html', 'cambiar_texto_stock_woocommerce' );


// tamaños de menor a mayor 
add_filter( 'woocommerce_dropdown_variation_attribute_options_args', 'ordenar_opciones_variacion_medidas_asc' );

function ordenar_opciones_variacion_medidas_asc( $args ) {
    if( isset( $args['attribute'] ) && $args['attribute'] == 'pa_medidas' ) {
        $options = $args['options'];
        usort($options, 'comparar_medidas');
        $args['options'] = $options;
    }
    return $args;
}

function comparar_medidas( $a, $b ) {
    $num_a = extraer_numero_medida($a);
    $num_b = extraer_numero_medida($b);

    return $num_a - $num_b;
}

function extraer_numero_medida( $medida ) {
    // Asume que la medida está en el formato 'Ancho X Alto'.
    $partes = explode(' X ', $medida);
    // Asegúrate de que siempre estás extrayendo números.
    $ancho = intval($partes[0]);
    return $ancho;
}


// Categorias personalizadas 

add_filter( 'woocommerce_product_categories_widget_args', 'custom_woocommerce_product_categories_widget_args', 20, 1 );

function custom_woocommerce_product_categories_widget_args( $args ) {
    $args['include'] = array( 20, 32, 98 ); // Asegúrate de que los IDs sean correctos
    return $args;
}


// Moneda 
add_filter('woocommerce_currency_symbol', 'change_currency_symbol', 10, 2);

function change_currency_symbol( $currency_symbol, $currency ) {
   switch( $currency ) {
       case 'MXN': $currency_symbol = 'MXN $'; break;
   }
   return $currency_symbol;
}

add_action( 'woocommerce_single_product_summary', 'remove_add_to_cart_button_from_single_products', 1 );

function remove_add_to_cart_button_from_single_products() {
    global $product;
    if ( has_term( 'canva-print', 'product_cat', $product->get_id() ) ) {
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
    }
}

add_action('after_setup_theme', 'modify_image_sizes');
function modify_image_sizes() {
    // Cambiar tamaño de miniatura de WordPress
    set_post_thumbnail_size(600, 600, true);
    
    // Actualizar opciones de tamaño de miniatura
    update_option('thumbnail_size_w', 600);
    update_option('thumbnail_size_h', 600);
    
    // Cambiar tamaño de miniatura de WooCommerce
    add_filter('woocommerce_get_image_size_thumbnail', 'update_woocommerce_image_size_thumbnail');
    
    // Actualizar otros tamaños de imagen
    update_option('medium_size_w', 462);
    update_option('medium_size_h', 600);
    update_option('medium_large_size_w', 768);
    update_option('medium_large_size_h', 0); // 0 significa sin límite, mantendrá la proporción
    update_option('large_size_w', 1024);
    update_option('large_size_h', 1024);
}

function update_woocommerce_image_size_thumbnail($size) {
    return array(
        'width' => 462,
        'height' => 600,
        'crop' => 0, // 0 para mantener la proporción
    );
}

// Asegurarse de que WooCommerce use el nuevo tamaño de miniatura
add_filter('woocommerce_gallery_thumbnail_size', function($size) {
    return 'woocommerce_thumbnail';
});

// Añadir soporte para tamaños de imagen personalizados
add_image_size('woocommerce_thumbnail', 462, 600);
add_image_size('shop_catalog', 462, 600);
add_image_size('shop_single', 600, 800);

// Filtro para asegurar que las imágenes de producto usen el nuevo tamaño
add_filter('woocommerce_gallery_image_size', function($size) {
    return 'shop_single';
});

/**
 * Enqueue Swiper.js for testimonials carousel
 */
function enqueue_swiper_testimonials() {
    // Swiper CSS
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');
    
    // Swiper JS
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);
    
    // Custom testimonials carousel styles
    wp_add_inline_style('swiper-css', '
        .testimonials-carousel-wrapper {
            padding: 20px 0;
            overflow: hidden;
            position: relative;
            width: 100%;
            max-width: 100%;
        }
        .testimonials-carousel-wrapper .swiper {
            width: 100%;
            padding: 20px 10px 60px;
            overflow: visible;
        }
        .testimonials-carousel-wrapper .swiper-slide {
            height: auto !important;
            display: flex;
            box-sizing: border-box;
        }
        .testimonial-slide {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .testimonial-slide:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        .testimonial-image {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 15px;
            border: 3px solid #f0f0f0;
        }
        .testimonial-content {
            flex-grow: 1;
            margin-bottom: 15px;
        }
        .testimonial-text {
            font-size: 15px;
            line-height: 1.5;
            color: #333;
            font-style: italic;
            margin-bottom: 15px;
        }
        .testimonial-author {
            font-weight: 600;
            color: #222;
            font-size: 16px;
            margin-bottom: 5px;
        }
        .testimonial-role {
            font-size: 13px;
            color: #666;
        }
        .testimonial-rating {
            color: #ffc107;
            font-size: 16px;
            margin-bottom: 12px;
            text-align: center;
        }
        .testimonials-carousel-wrapper .swiper-pagination {
            bottom: 20px !important;
        }
        .testimonials-carousel-wrapper .swiper-pagination-bullet {
            background: #333;
            opacity: 0.5;
            width: 8px;
            height: 8px;
            margin: 0 4px !important;
        }
        .testimonials-carousel-wrapper .swiper-pagination-bullet-active {
            background: var(--primary-color, #ff6b6b);
            opacity: 1;
        }
        .testimonials-carousel-wrapper .swiper-button-next,
        .testimonials-carousel-wrapper .swiper-button-prev {
            color: #333 !important;
            background: #fff !important;
            width: 45px !important;
            height: 45px !important;
            border-radius: 50% !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15) !important;
            transition: all 0.3s ease !important;
            z-index: 10 !important;
        }
        .testimonials-carousel-wrapper .swiper-button-next:hover,
        .testimonials-carousel-wrapper .swiper-button-prev:hover {
            color: #fff !important;
            background: var(--primary-color, #ff6b6b) !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25) !important;
        }
        .testimonials-carousel-wrapper .swiper-button-next:after,
        .testimonials-carousel-wrapper .swiper-button-prev:after {
            font-size: 18px !important;
            font-weight: bold !important;
        }
        .testimonials-carousel-wrapper .swiper-button-next {
            right: 5px !important;
        }
        .testimonials-carousel-wrapper .swiper-button-prev {
            left: 5px !important;
        }
        .testimonials-carousel-wrapper .swiper-button-disabled {
            opacity: 0.35 !important;
            pointer-events: none !important;
        }
        
        /* Mobile Optimizations */
        @media (max-width: 767px) {
            .testimonials-carousel-wrapper {
                padding: 15px 0;
            }
            .testimonials-carousel-wrapper .swiper {
                padding: 15px 5px 50px;
            }
            .testimonial-slide {
                padding: 20px 15px;
            }
            .testimonial-image {
                width: 60px;
                height: 60px;
                margin-bottom: 12px;
            }
            .testimonial-text {
                font-size: 14px;
                line-height: 1.4;
            }
            .testimonial-author {
                font-size: 15px;
            }
            .testimonial-role {
                font-size: 12px;
            }
            .testimonial-rating {
                font-size: 14px;
            }
            .testimonials-carousel-wrapper .swiper-button-next,
            .testimonials-carousel-wrapper .swiper-button-prev {
                width: 35px !important;
                height: 35px !important;
            }
            .testimonials-carousel-wrapper .swiper-button-next:after,
            .testimonials-carousel-wrapper .swiper-button-prev:after {
                font-size: 14px !important;
            }
            .testimonials-carousel-wrapper .swiper-button-next {
                right: 2px !important;
            }
            .testimonials-carousel-wrapper .swiper-button-prev {
                left: 2px !important;
            }
        }
    ');
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_testimonials');

/**
 * Testimonials Carousel Shortcode
 * Usage: [testimonials_carousel slides_per_view="3" space_between="30" autoplay_delay="3000"]
 */
function testimonials_carousel_shortcode($atts) {
    // Parse shortcode attributes
    $atts = shortcode_atts(array(
        'slides_per_view' => '3',
        'space_between' => '30',
        'autoplay_delay' => '3000',
        'show_pagination' => 'true',
        'show_navigation' => 'true',
        'loop' => 'true',
        'speed' => '600',
    ), $atts);
    
    // Query testimonials
    $args = array(
        'post_type' => 'tt-testimonial',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    $testimonials = new WP_Query($args);
    
    if (!$testimonials->have_posts()) {
        return '<p>' . __('No testimonials found.', 'kraftiart') . '</p>';
    }
    
    // Generate unique ID for this carousel instance
    $carousel_id = 'testimonials-swiper-' . uniqid();
    
    ob_start();
    ?>
    
    <div class="testimonials-carousel-wrapper">
        <div class="swiper <?php echo esc_attr($carousel_id); ?>">
            <div class="swiper-wrapper">
                <?php while ($testimonials->have_posts()) : $testimonials->the_post(); 
                    // Get custom fields
                    $author_name = get_post_meta(get_the_ID(), 'kraftiart_testimonial_name', true);
                    $author_role = get_post_meta(get_the_ID(), 'kraftiart_testimonial_designation', true);
                    $rating = get_post_meta(get_the_ID(), 'kraftiart_testimonial_rating', true);
                    $image = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                    
                    // If no custom name, use post title
                    if (empty($author_name)) {
                        $author_name = get_the_title();
                    }
                ?>
                <div class="swiper-slide">
                    <div class="testimonial-slide">
                        <?php if ($image) : ?>
                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($author_name); ?>" class="testimonial-image">
                        <?php endif; ?>
                        
                        <?php if ($rating) : ?>
                            <div class="testimonial-rating">
                                <?php 
                                for ($i = 0; $i < intval($rating); $i++) {
                                    echo '★';
                                }
                                ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="testimonial-content">
                            <div class="testimonial-text">
                                <?php echo wp_kses_post(get_the_content()); ?>
                            </div>
                        </div>
                        
                        <div class="testimonial-author-info">
                            <?php if ($author_name) : ?>
                                <div class="testimonial-author"><?php echo esc_html($author_name); ?></div>
                            <?php endif; ?>
                            
                            <?php if ($author_role) : ?>
                                <div class="testimonial-role"><?php echo esc_html($author_role); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            
            <?php if ($atts['show_pagination'] === 'true') : ?>
                <div class="swiper-pagination"></div>
            <?php endif; ?>
            
            <?php if ($atts['show_navigation'] === 'true') : ?>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            <?php endif; ?>
        </div>
    </div>
    
    <script>
    (function() {
        function initTestimonialsSwiper() {
            if (typeof Swiper === 'undefined') {
                setTimeout(initTestimonialsSwiper, 100);
                return;
            }
            
            var swiperEl = document.querySelector('.<?php echo esc_js($carousel_id); ?>');
            if (!swiperEl) return;
            
            var testimonialSwiper = new Swiper('.<?php echo esc_js($carousel_id); ?>', {
                slidesPerView: 1,
                spaceBetween: 15,
                loop: true,
                speed: 600,
                autoplay: {
                    delay: <?php echo intval($atts['autoplay_delay']); ?>,
                    disableOnInteraction: false,
                    reverseDirection: true,
                },
                pagination: {
                    el: '.<?php echo esc_js($carousel_id); ?> .swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.<?php echo esc_js($carousel_id); ?> .swiper-button-next',
                    prevEl: '.<?php echo esc_js($carousel_id); ?> .swiper-button-prev',
                },
                grabCursor: true,
                touchRatio: 1,
                touchAngle: 45,
                longSwipesRatio: 0.5,
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 25,
                    },
                    1024: {
                        slidesPerView: <?php echo intval($atts['slides_per_view']); ?>,
                        spaceBetween: <?php echo intval($atts['space_between']); ?>,
                    },
                },
            });
        }
        
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initTestimonialsSwiper);
        } else {
            initTestimonialsSwiper();
        }
    })();
    </script>
    
    <?php
    return ob_get_clean();
}
add_shortcode('testimonials_carousel', 'testimonials_carousel_shortcode');

/**
 * Frame Carousel Shortcode - Pure CSS/JS Implementation
 * Usage: [frame_carousel post_type="tt-portfolio" posts_per_page="5"]
 */
function frame_carousel_shortcode($atts) {
    // Parse shortcode attributes
    $atts = shortcode_atts(array(
        'post_type' => 'tt-portfolio',
        'posts_per_page' => '5',
        'autoplay' => 'true',
        'autoplay_delay' => '4000',
        'category' => '',
    ), $atts);
    
    // Query posts
    $args = array(
        'post_type' => $atts['post_type'],
        'posts_per_page' => intval($atts['posts_per_page']),
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    // Add category filter if specified
    if (!empty($atts['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'portfolio_category',
                'field' => 'slug',
                'terms' => $atts['category']
            )
        );
    }
    
    $posts_query = new WP_Query($args);
    
    if (!$posts_query->have_posts()) {
        return '<p>' . __('No items found.', 'kraftiart') . '</p>';
    }
    
    // Generate unique ID for this carousel instance
    $carousel_id = 'frame-carousel-' . uniqid();
    
    ob_start();
    ?>
    
    <div class="frame-carousel-wrapper <?php echo esc_attr($carousel_id); ?>" data-autoplay="<?php echo esc_attr($atts['autoplay']); ?>" data-delay="<?php echo esc_attr($atts['autoplay_delay']); ?>">
        <div class="frame-carousel-track">
            <?php 
            while ($posts_query->have_posts()) : $posts_query->the_post();
                // Get post data
                $title = get_the_title();
                $excerpt = get_the_excerpt();
                $content = get_the_content();
                
                // For description, use full content first, fall back to excerpt
                $description = !empty($content) ? $content : $excerpt;
                // Strip all HTML tags and shortcodes
                $description = strip_tags($description);
                
                $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                
                // Get categories
                $terms = get_the_terms(get_the_ID(), 'portfolio_category');
                $category = '';
                if ($terms && !is_wp_error($terms)) {
                    $term_names = array();
                    foreach ($terms as $term) {
                        $term_names[] = $term->name;
                    }
                    $category = implode(', ', $term_names);
                }
                
                $permalink = get_permalink();
                ?>
                    <div class="frame-slide">
                        <div class="frame-slide-content">
                            <?php if ($featured_image) : ?>
                                <div class="frame-slide-image">
                                    <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($title); ?>">
                                </div>
                            <?php endif; ?>
                            
                            <div class="frame-slide-text">
                                <?php if (!empty($category)) : ?>
                                    <div class="frame-slide-category"><?php echo esc_html($category); ?></div>
                                <?php endif; ?>
                                
                                <h3 class="frame-slide-title"><?php echo esc_html($title); ?></h3>
                                
                                <?php if (!empty($description)) : ?>
                                    <p class="frame-slide-description"><?php echo esc_html($description); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php endwhile; 
            wp_reset_postdata();
            ?>
        </div>
        
        <button class="frame-carousel-nav frame-carousel-prev" aria-label="Previous slide">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <button class="frame-carousel-nav frame-carousel-next" aria-label="Next slide">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        
        <div class="frame-carousel-dots"></div>
    </div>
    
    <style>
    /* Force visibility on all devices - Debug */
    .<?php echo esc_attr($carousel_id); ?> .frame-carousel-nav {
        display: flex !important;
        visibility: visible !important;
        opacity: 1 !important;
        z-index: 9999 !important;
    }
    
    .frame-carousel-wrapper {
        position: relative;
        width: 100%;
        max-width: 100%;
        overflow: hidden;
        padding: 0 16px 80px;
        margin: 0;
        background: transparent;
        isolation: isolate;
    }
    
    .frame-carousel-track {
        display: flex;
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        width: 100%;
        align-items: stretch;
        position: relative;
        z-index: 1;
    }
    
    .frame-slide {
        flex: 0 0 100%;
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
        display: flex;
    }
    .frame-slide-content {
        background: linear-gradient(135deg, #f8f4f5 0%, #f3e5e8 100%);
        border-radius: 24px;
        box-shadow: 0 10px 40px rgba(114, 47, 55, 0.15), 0 4px 12px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        position: relative;
        width: 100%;
        display: flex;
        flex-direction: column;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid rgba(255, 255, 255, 0.8);
        height: 100%;
        z-index: 1;
    }
    
    .frame-slide-content:active {
        transform: scale(0.97);
        box-shadow: 0 8px 30px rgba(114, 47, 55, 0.2), 0 3px 10px rgba(0, 0, 0, 0.1);
    }
    
    .frame-slide-image {
        width: 96px;
        height: 96px;
        border-radius: 50%;
        overflow: hidden;
        border: 5px solid #fff;
        box-shadow: 0 8px 24px rgba(114, 47, 55, 0.25), 0 4px 12px rgba(0, 0, 0, 0.1);
        margin: 32px auto 24px;
        position: relative;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .frame-slide-image::before {
        content: '';
        position: absolute;
        inset: -5px;
        border-radius: 50%;
        background: linear-gradient(135deg, #722f37, #8b3a45);
        opacity: 0;
        z-index: -1;
        transition: opacity 0.3s ease;
    }
    
    .frame-slide-image:active {
        transform: scale(0.92);
        box-shadow: 0 6px 20px rgba(114, 47, 55, 0.3), 0 3px 10px rgba(0, 0, 0, 0.12);
    }
    
    .frame-slide-image:active::before {
        opacity: 0.3;
    }
    
    .frame-slide-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .frame-slide-text {
        padding: 0 24px 36px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        text-align: center;
        background: linear-gradient(to bottom, rgba(255, 255, 255, 0.5) 0%, rgba(255, 255, 255, 0.3) 100%);
    }
    
    .frame-slide-category {
        font-size: 12px;
        font-weight: 600;
        color: #722f37;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }
    
    .frame-slide-title {
        font-size: 24px;
        font-weight: 800;
        margin: 0 0 16px 0;
        line-height: 1.25;
        text-align: center;
        letter-spacing: -0.02em;
        text-shadow: 0 2px 4px rgba(131, 24, 67, 0.1);
        background: linear-gradient(135deg, #722f37 0%, #8b3a45 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .frame-slide-description {
        font-size: 15px;
        line-height: 1.7;
        color: #9f1239;
        margin: 0;
        text-align: center;
        flex-grow: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 400;
        padding: 0 4px;
    }
    
    .frame-carousel-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 100 !important;
        padding: 0;
        display: flex !important;
        justify-content: center;
        align-items: center;
        border: none;
        width: 48px;
        height: 48px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 50%;
        background: linear-gradient(135deg, #722f37 0%, #8b3a45 100%);
        box-shadow: 0 6px 20px rgba(114, 47, 55, 0.35), 0 3px 10px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        outline: none;
        -webkit-tap-highlight-color: transparent;
        border: 2px solid rgba(255, 255, 255, 0.9);
        pointer-events: auto;
        visibility: visible !important;
        opacity: 1 !important;
    }
    
    .frame-carousel-prev {
        left: 16px;
    }
    
    .frame-carousel-next {
        right: 16px;
    }
    
    .frame-carousel-nav:active {
        transform: translateY(-50%) scale(0.88);
        box-shadow: 0 4px 14px rgba(114, 47, 55, 0.4), 0 2px 8px rgba(0, 0, 0, 0.12);
    }
    
    .frame-carousel-nav svg {
        width: 22px !important;
        height: 22px !important;
        color: #fff !important;
        filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.1)) !important;
        display: block !important;
    }
    
    .frame-carousel-dots {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex !important;
        gap: 8px;
        z-index: 9999 !important;
        pointer-events: auto;
        visibility: visible !important;
    }
    
    .frame-carousel-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: rgba(114, 47, 55, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        padding: 0;
    }
    
    .frame-carousel-dot.active {
        width: 24px;
        border-radius: 4px;
        background: linear-gradient(135deg, #722f37, #8b3a45);
    }
    
    /* Desktop optimizations */
    @media (min-width: 768px) {
        .frame-slide-image {
            width: 96px;
            height: 96px;
        }
    }
    
    /* Mobile optimizations */
    @media (max-width: 767px) {
        .frame-carousel-nav {
            width: 40px !important;
            height: 40px !important;
            box-shadow: 0 4px 16px rgba(114, 47, 55, 0.3), 0 2px 8px rgba(0, 0, 0, 0.1) !important;
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        .frame-carousel-prev {
            left: 8px !important;
        }
        
        .frame-carousel-next {
            right: 8px !important;
        }
        
        .frame-carousel-nav svg {
            width: 18px !important;
            height: 18px !important;
        }
        
        .frame-carousel-wrapper {
            padding: 0 16px 70px;
            min-height: 420px;
        }
        
        .frame-carousel-track {
            min-height: 360px;
        }
        
        .frame-slide {
            min-height: 360px;
        }
        
        .frame-slide-content {
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(114, 47, 55, 0.18), 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .frame-slide-image {
            width: 88px;
            height: 88px;
            border-width: 4px;
            box-shadow: 0 6px 20px rgba(114, 47, 55, 0.28), 0 3px 10px rgba(0, 0, 0, 0.12);
            margin: 28px auto 20px;
            flex-shrink: 0;
        }
        
        .frame-slide-text {
            padding: 0 20px 32px;
        }
        
        .frame-slide-title {
            font-size: 22px;
            margin: 0 0 14px 0;
        }
        
        .frame-slide-description {
            font-size: 14.5px;
            line-height: 1.65;
        }
        
        .frame-carousel-dots {
            bottom: 30px;
        }
        
        .frame-carousel-dot {
            width: 10px;
            height: 10px;
        }
        
        .frame-carousel-dot.active {
            width: 28px;
        }
    }
    
    /* Extra small mobile devices */
    @media (max-width: 374px) {
        .frame-carousel-wrapper {
            min-height: 400px;
            padding: 0 12px 70px;
        }
        
        .frame-carousel-track {
            min-height: 340px;
        }
        
        .frame-slide {
            min-height: 340px;
        }
        
        .frame-slide-image {
            width: 80px;
            height: 80px;
        }
        
        .frame-slide-title {
            font-size: 20px;
        }
        
        .frame-slide-description {
            font-size: 14px;
        }
        
        .frame-slide-text {
            padding: 0 18px 30px;
        }
        
        .frame-carousel-nav {
            width: 36px !important;
            height: 36px !important;
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        .frame-carousel-prev {
            left: 4px !important;
        }
        
        .frame-carousel-next {
            right: 4px !important;
        }
        
        .frame-carousel-nav svg {
            width: 16px !important;
            height: 16px !important;
        }
    }
    </style>
    
    <script>
    (function() {
        function initFrameCarousel() {
            const wrapper = document.querySelector('.<?php echo esc_js($carousel_id); ?>');
            if (!wrapper) return;
            
            const track = wrapper.querySelector('.frame-carousel-track');
            const slides = Array.from(track.querySelectorAll('.frame-slide'));
            const prevBtn = wrapper.querySelector('.frame-carousel-prev');
            const nextBtn = wrapper.querySelector('.frame-carousel-next');
            const dotsContainer = wrapper.querySelector('.frame-carousel-dots');
            
            if (!track || slides.length === 0) return;
            
            let currentIndex = 0;
            let autoplayInterval = null;
            let touchStartX = 0;
            let touchEndX = 0;
            
            // Create dots
            slides.forEach((_, index) => {
                const dot = document.createElement('button');
                dot.className = 'frame-carousel-dot';
                dot.setAttribute('aria-label', 'Go to slide ' + (index + 1));
                if (index === 0) dot.classList.add('active');
                dot.addEventListener('click', () => goToSlide(index));
                dotsContainer.appendChild(dot);
            });
            
            const dots = Array.from(dotsContainer.querySelectorAll('.frame-carousel-dot'));
            
            function updateCarousel() {
                const offset = -currentIndex * 100;
                track.style.transform = `translateX(${offset}%)`;
                
                // Update dots
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            }
            
            function goToSlide(index) {
                currentIndex = index;
                updateCarousel();
                resetAutoplay();
            }
            
            function nextSlide() {
                currentIndex = (currentIndex + 1) % slides.length;
                updateCarousel();
            }
            
            function prevSlide() {
                currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                updateCarousel();
            }
            
            function startAutoplay() {
                const autoplay = wrapper.getAttribute('data-autoplay') === 'true';
                const delay = parseInt(wrapper.getAttribute('data-delay')) || 4000;
                
                if (autoplay) {
                    autoplayInterval = setInterval(nextSlide, delay);
                }
            }
            
            function stopAutoplay() {
                if (autoplayInterval) {
                    clearInterval(autoplayInterval);
                    autoplayInterval = null;
                }
            }
            
            function resetAutoplay() {
                stopAutoplay();
                startAutoplay();
            }
            
            // Touch events
            track.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
                stopAutoplay();
            }, { passive: true });
            
            track.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
                startAutoplay();
            }, { passive: true });
            
            function handleSwipe() {
                const swipeThreshold = 50;
                const diff = touchStartX - touchEndX;
                
                if (Math.abs(diff) > swipeThreshold) {
                    if (diff > 0) {
                        nextSlide();
                    } else {
                        prevSlide();
                    }
                }
            }
            
            // Button events
            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    nextSlide();
                    resetAutoplay();
                });
            }
            
            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    prevSlide();
                    resetAutoplay();
                });
            }
            
            // Keyboard navigation
            wrapper.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    prevSlide();
                    resetAutoplay();
                } else if (e.key === 'ArrowRight') {
                    nextSlide();
                    resetAutoplay();
                }
            });
            
            // Pause on hover (desktop only)
            if (window.innerWidth >= 768) {
                wrapper.addEventListener('mouseenter', stopAutoplay);
                wrapper.addEventListener('mouseleave', startAutoplay);
            }
            
            // Initialize
            updateCarousel();
            startAutoplay();
        }
        
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFrameCarousel);
        } else {
            initFrameCarousel();
        }
    })();
    </script>
    
    <?php
    return ob_get_clean();
}
add_shortcode('frame_carousel', 'frame_carousel_shortcode');

/**
 * Frame Carousel Simple Shortcode - Images Only (No Title/Description)
 * Usage: [frame_carousel_simple post_type="tt-portfolio" posts_per_page="5"]
 */
function frame_carousel_simple_shortcode($atts) {
    // Parse shortcode attributes
    $atts = shortcode_atts(array(
        'post_type' => 'tt-portfolio',
        'posts_per_page' => '5',
        'autoplay' => 'true',
        'autoplay_delay' => '4000',
        'category' => '',
    ), $atts);
    
    // Query posts
    $args = array(
        'post_type' => $atts['post_type'],
        'posts_per_page' => intval($atts['posts_per_page']),
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    // Add category filter if specified
    if (!empty($atts['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'portfolio_category',
                'field' => 'slug',
                'terms' => $atts['category']
            )
        );
    }
    
    $posts_query = new WP_Query($args);
    
    if (!$posts_query->have_posts()) {
        return '<p>' . __('No items found.', 'kraftiart') . '</p>';
    }
    
    // Generate unique ID for this carousel instance
    $carousel_id = 'frame-carousel-simple-' . uniqid();
    
    ob_start();
    ?>
    
    <div class="frame-carousel-simple-wrapper <?php echo esc_attr($carousel_id); ?>" data-autoplay="<?php echo esc_attr($atts['autoplay']); ?>" data-delay="<?php echo esc_attr($atts['autoplay_delay']); ?>">
        <div class="frame-carousel-simple-track">
            <?php 
            while ($posts_query->have_posts()) : $posts_query->the_post();
                $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                $title = get_the_title();
                ?>
                    <div class="frame-slide-simple">
                        <div class="frame-slide-simple-content">
                            <?php if ($featured_image) : ?>
                                <div class="frame-slide-simple-image">
                                    <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($title); ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
            <?php endwhile; 
            wp_reset_postdata();
            ?>
        </div>
        
        <button class="frame-carousel-simple-nav frame-carousel-simple-prev" aria-label="Previous slide">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <button class="frame-carousel-simple-nav frame-carousel-simple-next" aria-label="Next slide">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        
        <div class="frame-carousel-simple-dots"></div>
    </div>
    
    <style>
    /* Force visibility on all devices - Debug */
    .<?php echo esc_attr($carousel_id); ?> .frame-carousel-simple-nav {
        display: flex !important;
        visibility: visible !important;
        opacity: 1 !important;
        z-index: 9999 !important;
    }
    
    .frame-carousel-simple-wrapper {
        position: relative;
        width: 100%;
        max-width: 100%;
        overflow: hidden;
        padding: 0 16px 80px;
        margin: 0;
        background: transparent;
        isolation: isolate;
    }
    
    .frame-carousel-simple-track {
        display: flex;
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        width: 100%;
        align-items: stretch;
        position: relative;
        z-index: 1;
    }
    
    .frame-slide-simple {
        flex: 0 0 100%;
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
        display: flex;
    }
    
    .frame-slide-simple-content {
        background: linear-gradient(135deg, #f8f4f5 0%, #f3e5e8 100%);
        border-radius: 24px;
        box-shadow: 0 10px 40px rgba(114, 47, 55, 0.15), 0 4px 12px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        position: relative;
        width: 100%;
        display: flex;
        flex-direction: column;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid rgba(255, 255, 255, 0.8);
        height: 100%;
        z-index: 1;
    }
    
    .frame-slide-simple-content:active {
        transform: scale(0.98);
        box-shadow: 0 8px 30px rgba(114, 47, 55, 0.2), 0 3px 10px rgba(0, 0, 0, 0.1);
    }
    
    .frame-slide-simple-image {
        width: 100%;
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    
    .frame-slide-simple-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .frame-slide-simple-content:active .frame-slide-simple-image img {
        transform: scale(1.02);
    }
    
    .frame-carousel-simple-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 100 !important;
        padding: 0;
        display: flex !important;
        justify-content: center;
        align-items: center;
        border: none;
        width: 48px;
        height: 48px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 50%;
        background: linear-gradient(135deg, #722f37 0%, #8b3a45 100%);
        box-shadow: 0 6px 20px rgba(114, 47, 55, 0.35), 0 3px 10px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        outline: none;
        -webkit-tap-highlight-color: transparent;
        border: 2px solid rgba(255, 255, 255, 0.9);
        pointer-events: auto;
        visibility: visible !important;
        opacity: 1 !important;
    }
    
    .frame-carousel-simple-prev {
        left: 16px;
    }
    
    .frame-carousel-simple-next {
        right: 16px;
    }
    
    .frame-carousel-simple-nav:active {
        transform: translateY(-50%) scale(0.88);
        box-shadow: 0 4px 14px rgba(114, 47, 55, 0.4), 0 2px 8px rgba(0, 0, 0, 0.12);
    }
    
    .frame-carousel-simple-nav svg {
        width: 22px !important;
        height: 22px !important;
        color: #fff !important;
        filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.1)) !important;
        display: block !important;
    }
    
    .frame-carousel-simple-dots {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex !important;
        gap: 8px;
        z-index: 9999 !important;
        pointer-events: auto;
        visibility: visible !important;
    }
    
    .frame-carousel-simple-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: rgba(114, 47, 55, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        padding: 0;
    }
    
    .frame-carousel-simple-dot.active {
        width: 24px;
        border-radius: 4px;
        background: linear-gradient(135deg, #722f37, #8b3a45);
    }
    
    /* Desktop optimizations */
    @media (min-width: 768px) {
        .frame-carousel-simple-wrapper {
            min-height: 500px;
        }
        
        .frame-carousel-simple-track {
            min-height: 420px;
        }
        
        .frame-slide-simple {
            min-height: 420px;
        }
    }
    
    /* Mobile optimizations */
    @media (max-width: 767px) {
        .frame-carousel-simple-nav {
            width: 40px !important;
            height: 40px !important;
            box-shadow: 0 4px 16px rgba(114, 47, 55, 0.3), 0 2px 8px rgba(0, 0, 0, 0.1) !important;
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        .frame-carousel-simple-prev {
            left: 8px !important;
        }
        
        .frame-carousel-simple-next {
            right: 8px !important;
        }
        
        .frame-carousel-simple-nav svg {
            width: 18px !important;
            height: 18px !important;
        }
        
        .frame-carousel-simple-wrapper {
            padding: 0 16px 70px;
            min-height: 380px;
        }
        
        .frame-carousel-simple-track {
            min-height: 300px;
        }
        
        .frame-slide-simple {
            min-height: 300px;
        }
        
        .frame-slide-simple-content {
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(114, 47, 55, 0.18), 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .frame-carousel-simple-dots {
            bottom: 30px;
        }
        
        .frame-carousel-simple-dot {
            width: 10px;
            height: 10px;
        }
        
        .frame-carousel-simple-dot.active {
            width: 28px;
        }
    }
    
    /* Extra small mobile devices */
    @media (max-width: 374px) {
        .frame-carousel-simple-wrapper {
            min-height: 340px;
            padding: 0 12px 70px;
        }
        
        .frame-carousel-simple-track {
            min-height: 260px;
        }
        
        .frame-slide-simple {
            min-height: 260px;
        }
        
        .frame-carousel-simple-nav {
            width: 36px !important;
            height: 36px !important;
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        .frame-carousel-simple-prev {
            left: 4px !important;
        }
        
        .frame-carousel-simple-next {
            right: 4px !important;
        }
        
        .frame-carousel-simple-nav svg {
            width: 16px !important;
            height: 16px !important;
        }
    }
    </style>
    
    <script>
    (function() {
        function initFrameCarouselSimple() {
            const wrapper = document.querySelector('.<?php echo esc_js($carousel_id); ?>');
            console.log('Simple Carousel: Wrapper found:', wrapper);
            if (!wrapper) return;
            
            const track = wrapper.querySelector('.frame-carousel-simple-track');
            const slides = Array.from(track.querySelectorAll('.frame-slide-simple'));
            const prevBtn = wrapper.querySelector('.frame-carousel-simple-prev');
            const nextBtn = wrapper.querySelector('.frame-carousel-simple-next');
            const dotsContainer = wrapper.querySelector('.frame-carousel-simple-dots');
            
            console.log('Simple Carousel: Buttons found - Prev:', prevBtn, 'Next:', nextBtn);
            console.log('Simple Carousel: Dots container:', dotsContainer);
            console.log('Simple Carousel: Slides count:', slides.length);
            
            if (!track || slides.length === 0) return;
            
            let currentIndex = 0;
            let autoplayInterval = null;
            let touchStartX = 0;
            let touchEndX = 0;
            
            // Create dots
            slides.forEach((_, index) => {
                const dot = document.createElement('button');
                dot.className = 'frame-carousel-simple-dot';
                dot.setAttribute('aria-label', 'Go to slide ' + (index + 1));
                if (index === 0) dot.classList.add('active');
                dot.addEventListener('click', () => goToSlide(index));
                dotsContainer.appendChild(dot);
            });
            
            const dots = Array.from(dotsContainer.querySelectorAll('.frame-carousel-simple-dot'));
            
            function updateCarousel() {
                const offset = -currentIndex * 100;
                track.style.transform = `translateX(${offset}%)`;
                
                // Update dots
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            }
            
            function goToSlide(index) {
                currentIndex = index;
                updateCarousel();
                resetAutoplay();
            }
            
            function nextSlide() {
                currentIndex = (currentIndex + 1) % slides.length;
                updateCarousel();
            }
            
            function prevSlide() {
                currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                updateCarousel();
            }
            
            function startAutoplay() {
                const autoplay = wrapper.getAttribute('data-autoplay') === 'true';
                const delay = parseInt(wrapper.getAttribute('data-delay')) || 4000;
                
                if (autoplay) {
                    autoplayInterval = setInterval(nextSlide, delay);
                }
            }
            
            function stopAutoplay() {
                if (autoplayInterval) {
                    clearInterval(autoplayInterval);
                    autoplayInterval = null;
                }
            }
            
            function resetAutoplay() {
                stopAutoplay();
                startAutoplay();
            }
            
            // Touch events
            track.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
                stopAutoplay();
            }, { passive: true });
            
            track.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
                startAutoplay();
            }, { passive: true });
            
            function handleSwipe() {
                const swipeThreshold = 50;
                const diff = touchStartX - touchEndX;
                
                if (Math.abs(diff) > swipeThreshold) {
                    if (diff > 0) {
                        nextSlide();
                    } else {
                        prevSlide();
                    }
                }
            }
            
            // Button events
            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    nextSlide();
                    resetAutoplay();
                });
            }
            
            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    prevSlide();
                    resetAutoplay();
                });
            }
            
            // Keyboard navigation
            wrapper.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    prevSlide();
                    resetAutoplay();
                } else if (e.key === 'ArrowRight') {
                    nextSlide();
                    resetAutoplay();
                }
            });
            
            // Pause on hover (desktop only)
            if (window.innerWidth >= 768) {
                wrapper.addEventListener('mouseenter', stopAutoplay);
                wrapper.addEventListener('mouseleave', startAutoplay);
            }
            
            // Initialize
            updateCarousel();
            startAutoplay();
        }
        
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFrameCarouselSimple);
        } else {
            initFrameCarouselSimple();
        }
    })();
    </script>
    
    <?php
    return ob_get_clean();
}
add_shortcode('frame_carousel_simple', 'frame_carousel_simple_shortcode');

/**
 * Frame Carousel Sale Products - Images with Product Names (Sale Products Only)
 * Usage: [frame_carousel_sale posts_per_page="5"]
 */
function frame_carousel_sale_shortcode($atts) {
    // Check if WooCommerce is active
    if (!class_exists('WooCommerce')) {
        return '<p>' . __('WooCommerce is required for this carousel.', 'kraftiart') . '</p>';
    }
    
    // Parse shortcode attributes
    $atts = shortcode_atts(array(
        'posts_per_page' => '-1', // -1 means all products
        'autoplay' => 'true',
        'autoplay_delay' => '4000',
        'category' => '', // Product category slug
    ), $atts);
    
    // Get product IDs that are on sale using WooCommerce function
    $sale_product_ids = wc_get_product_ids_on_sale();
    
    // Query products on sale
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => intval($atts['posts_per_page']),
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'post__in' => !empty($sale_product_ids) ? $sale_product_ids : array(0), // If no sales, return 0 to show nothing
    );
    
    // Add category filter if specified
    if (!empty($atts['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $atts['category']
            )
        );
    }
    
    $products_query = new WP_Query($args);
    
    if (!$products_query->have_posts()) {
        return '<p>' . __('No sale products found.', 'kraftiart') . '</p>';
    }
    
    // Generate unique ID for this carousel instance
    $carousel_id = 'frame-carousel-sale-' . uniqid();
    
    ob_start();
    ?>
    
    <div class="frame-carousel-sale-wrapper <?php echo esc_attr($carousel_id); ?>" data-autoplay="<?php echo esc_attr($atts['autoplay']); ?>" data-delay="<?php echo esc_attr($atts['autoplay_delay']); ?>">
        <div class="frame-carousel-sale-track">
            <?php 
            while ($products_query->have_posts()) : $products_query->the_post();
                global $product;
                $product_id = get_the_ID();
                $product_image = get_the_post_thumbnail_url($product_id, 'medium');
                $product_name = get_the_title();
                $sale_badge = $product->is_on_sale();
                ?>
                    <div class="frame-slide-sale">
                        <div class="frame-slide-sale-content">
                            <?php if ($product_image) : ?>
                                <div class="frame-slide-sale-image">
                                    <img src="<?php echo esc_url($product_image); ?>" alt="<?php echo esc_attr($product_name); ?>">
                                    <?php if ($sale_badge) : ?>
                                        <span class="sale-badge"><?php _e('SALE', 'kraftiart'); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <div class="frame-slide-sale-name">
                                <h3><?php echo esc_html($product_name); ?></h3>
                            </div>
                        </div>
                    </div>
            <?php endwhile; 
            wp_reset_postdata();
            ?>
        </div>
        
        <button class="frame-carousel-sale-nav frame-carousel-sale-prev" aria-label="Previous slide">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <button class="frame-carousel-sale-nav frame-carousel-sale-next" aria-label="Next slide">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        
        <div class="frame-carousel-sale-dots"></div>
    </div>
    
    <style>
    /* Force visibility on all devices */
    .<?php echo esc_attr($carousel_id); ?> .frame-carousel-sale-nav {
        display: flex !important;
        visibility: visible !important;
        opacity: 1 !important;
        z-index: 9999 !important;
    }
    
    .frame-carousel-sale-wrapper {
        position: relative;
        width: 100%;
        max-width: 100%;
        overflow: hidden;
        padding: 0 16px 80px;
        margin: 0;
        background: transparent;
        isolation: isolate;
    }
    
    .frame-carousel-sale-track {
        display: flex;
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        width: 100%;
        align-items: stretch;
        position: relative;
        z-index: 1;
    }
    
    .frame-slide-sale {
        flex: 0 0 100%;
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
        display: flex;
    }
    
    .frame-slide-sale-content {
        background: linear-gradient(135deg, #f8f4f5 0%, #f3e5e8 100%);
        border-radius: 24px;
        box-shadow: 0 10px 40px rgba(114, 47, 55, 0.15), 0 4px 12px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        position: relative;
        width: 100%;
        display: flex;
        flex-direction: column;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid rgba(255, 255, 255, 0.8);
        height: 100%;
        z-index: 1;
    }
    
    .frame-slide-sale-content:active {
        transform: scale(0.98);
        box-shadow: 0 8px 30px rgba(114, 47, 55, 0.2), 0 3px 10px rgba(0, 0, 0, 0.1);
    }
    
    .frame-slide-sale-image {
        width: 100%;
        height: 300px;
        position: relative;
        overflow: hidden;
    }
    
    .frame-slide-sale-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .frame-slide-sale-content:active .frame-slide-sale-image img {
        transform: scale(1.05);
    }
    
    .sale-badge {
        position: absolute;
        top: 16px;
        right: 16px;
        background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
        color: #fff;
        font-weight: 700;
        font-size: 12px;
        letter-spacing: 1px;
        padding: 6px 14px;
        border-radius: 20px;
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.4);
        z-index: 10;
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }
    
    .frame-slide-sale-name {
        padding: 20px 24px;
        background: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }
    
    .frame-slide-sale-name h3 {
        margin: 0;
        font-size: 18px;
        font-weight: 600;
        color: #722f37;
        text-align: center;
        line-height: 1.4;
        text-shadow: 0 1px 2px rgba(255, 255, 255, 0.8);
    }
    
    .frame-carousel-sale-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 100 !important;
        padding: 0;
        display: flex !important;
        justify-content: center;
        align-items: center;
        border: none;
        width: 48px;
        height: 48px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 50%;
        background: linear-gradient(135deg, #722f37 0%, #8b3a45 100%);
        box-shadow: 0 6px 20px rgba(114, 47, 55, 0.35), 0 3px 10px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        outline: none;
        -webkit-tap-highlight-color: transparent;
        border: 2px solid rgba(255, 255, 255, 0.9);
        pointer-events: auto;
        visibility: visible !important;
        opacity: 1 !important;
    }
    
    .frame-carousel-sale-prev {
        left: 16px;
    }
    
    .frame-carousel-sale-next {
        right: 16px;
    }
    
    .frame-carousel-sale-nav:active {
        transform: translateY(-50%) scale(0.88);
        box-shadow: 0 4px 14px rgba(114, 47, 55, 0.4), 0 2px 8px rgba(0, 0, 0, 0.12);
    }
    
    .frame-carousel-sale-nav svg {
        width: 22px !important;
        height: 22px !important;
        color: #fff !important;
        filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.1)) !important;
        display: block !important;
    }
    
    .frame-carousel-sale-dots {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex !important;
        gap: 8px;
        z-index: 9999 !important;
        pointer-events: auto;
        visibility: visible !important;
    }
    
    .frame-carousel-sale-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: rgba(114, 47, 55, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        padding: 0;
    }
    
    .frame-carousel-sale-dot.active {
        width: 24px;
        border-radius: 4px;
        background: linear-gradient(135deg, #722f37, #8b3a45);
    }
    
    /* Desktop optimizations */
    @media (min-width: 768px) {
        .frame-carousel-sale-wrapper {
            min-height: 520px;
        }
        
        .frame-carousel-sale-track {
            min-height: 440px;
        }
        
        .frame-slide-sale {
            min-height: 440px;
        }
        
        .frame-slide-sale-image {
            height: 360px;
        }
        
        .frame-slide-sale-name h3 {
            font-size: 22px;
        }
    }
    
    /* Mobile optimizations */
    @media (max-width: 767px) {
        .frame-carousel-sale-nav {
            width: 40px !important;
            height: 40px !important;
            box-shadow: 0 4px 16px rgba(114, 47, 55, 0.3), 0 2px 8px rgba(0, 0, 0, 0.1) !important;
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        .frame-carousel-sale-prev {
            left: 8px !important;
        }
        
        .frame-carousel-sale-next {
            right: 8px !important;
        }
        
        .frame-carousel-sale-nav svg {
            width: 18px !important;
            height: 18px !important;
        }
        
        .frame-carousel-sale-wrapper {
            padding: 0 16px 70px;
            min-height: 420px;
        }
        
        .frame-carousel-sale-track {
            min-height: 340px;
        }
        
        .frame-slide-sale {
            min-height: 340px;
        }
        
        .frame-slide-sale-image {
            height: 260px;
        }
        
        .frame-slide-sale-content {
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(114, 47, 55, 0.18), 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .frame-slide-sale-name {
            padding: 16px 20px;
        }
        
        .frame-slide-sale-name h3 {
            font-size: 16px;
        }
        
        .sale-badge {
            top: 12px;
            right: 12px;
            font-size: 11px;
            padding: 5px 12px;
        }
        
        .frame-carousel-sale-dots {
            bottom: 30px;
        }
        
        .frame-carousel-sale-dot {
            width: 10px;
            height: 10px;
        }
        
        .frame-carousel-sale-dot.active {
            width: 28px;
        }
    }
    
    /* Extra small mobile devices */
    @media (max-width: 374px) {
        .frame-carousel-sale-wrapper {
            min-height: 380px;
            padding: 0 12px 70px;
        }
        
        .frame-carousel-sale-track {
            min-height: 300px;
        }
        
        .frame-slide-sale {
            min-height: 300px;
        }
        
        .frame-slide-sale-image {
            height: 220px;
        }
        
        .frame-carousel-sale-nav {
            width: 36px !important;
            height: 36px !important;
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        .frame-carousel-sale-prev {
            left: 4px !important;
        }
        
        .frame-carousel-sale-next {
            right: 4px !important;
        }
        
        .frame-carousel-sale-nav svg {
            width: 16px !important;
            height: 16px !important;
        }
        
        .frame-slide-sale-name h3 {
            font-size: 15px;
        }
    }
    </style>
    
    <script>
    (function() {
        function initFrameCarouselSale() {
            const wrapper = document.querySelector('.<?php echo esc_js($carousel_id); ?>');
            if (!wrapper) return;
            
            const track = wrapper.querySelector('.frame-carousel-sale-track');
            const slides = Array.from(track.querySelectorAll('.frame-slide-sale'));
            const prevBtn = wrapper.querySelector('.frame-carousel-sale-prev');
            const nextBtn = wrapper.querySelector('.frame-carousel-sale-next');
            const dotsContainer = wrapper.querySelector('.frame-carousel-sale-dots');
            
            if (!track || slides.length === 0) return;
            
            let currentIndex = 0;
            let autoplayInterval = null;
            let touchStartX = 0;
            let touchEndX = 0;
            
            // Create dots
            slides.forEach((_, index) => {
                const dot = document.createElement('button');
                dot.className = 'frame-carousel-sale-dot';
                dot.setAttribute('aria-label', 'Go to slide ' + (index + 1));
                if (index === 0) dot.classList.add('active');
                dot.addEventListener('click', () => goToSlide(index));
                dotsContainer.appendChild(dot);
            });
            
            const dots = Array.from(dotsContainer.querySelectorAll('.frame-carousel-sale-dot'));
            
            function updateCarousel() {
                const offset = -currentIndex * 100;
                track.style.transform = `translateX(${offset}%)`;
                
                // Update dots
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            }
            
            function goToSlide(index) {
                currentIndex = index;
                updateCarousel();
                resetAutoplay();
            }
            
            function nextSlide() {
                currentIndex = (currentIndex + 1) % slides.length;
                updateCarousel();
            }
            
            function prevSlide() {
                currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                updateCarousel();
            }
            
            function startAutoplay() {
                const autoplay = wrapper.getAttribute('data-autoplay') === 'true';
                const delay = parseInt(wrapper.getAttribute('data-delay')) || 4000;
                
                if (autoplay) {
                    autoplayInterval = setInterval(nextSlide, delay);
                }
            }
            
            function stopAutoplay() {
                if (autoplayInterval) {
                    clearInterval(autoplayInterval);
                    autoplayInterval = null;
                }
            }
            
            function resetAutoplay() {
                stopAutoplay();
                startAutoplay();
            }
            
            // Touch events
            track.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
                stopAutoplay();
            }, { passive: true });
            
            track.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
                startAutoplay();
            }, { passive: true });
            
            function handleSwipe() {
                const swipeThreshold = 50;
                const diff = touchStartX - touchEndX;
                
                if (Math.abs(diff) > swipeThreshold) {
                    if (diff > 0) {
                        nextSlide();
                    } else {
                        prevSlide();
                    }
                }
            }
            
            // Button events
            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    nextSlide();
                    resetAutoplay();
                });
            }
            
            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    prevSlide();
                    resetAutoplay();
                });
            }
            
            // Keyboard navigation
            wrapper.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    prevSlide();
                    resetAutoplay();
                } else if (e.key === 'ArrowRight') {
                    nextSlide();
                    resetAutoplay();
                }
            });
            
            // Pause on hover (desktop only)
            if (window.innerWidth >= 768) {
                wrapper.addEventListener('mouseenter', stopAutoplay);
                wrapper.addEventListener('mouseleave', startAutoplay);
            }
            
            // Initialize
            updateCarousel();
            startAutoplay();
        }
        
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFrameCarouselSale);
        } else {
            initFrameCarouselSale();
        }
    })();
    </script>
    
    <?php
    return ob_get_clean();
}
add_shortcode('frame_carousel_sale', 'frame_carousel_sale_shortcode');

/**
 * Frame Carousel Full Size - Full Size Images Only (No constraints)
 * Usage: [frame_carousel_fullsize post_type="tt-portfolio" posts_per_page="5"]
 */
function frame_carousel_fullsize_shortcode($atts) {
    // Parse shortcode attributes
    $atts = shortcode_atts(array(
        'post_type' => 'tt-portfolio',
        'posts_per_page' => '5',
        'autoplay' => 'true',
        'autoplay_delay' => '4000',
        'category' => '',
    ), $atts);
    
    // Query posts
    $args = array(
        'post_type' => $atts['post_type'],
        'posts_per_page' => intval($atts['posts_per_page']),
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    // Add category filter if specified
    if (!empty($atts['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'portfolio_category',
                'field' => 'slug',
                'terms' => $atts['category']
            )
        );
    }
    
    $posts_query = new WP_Query($args);
    
    if (!$posts_query->have_posts()) {
        return '<p>' . __('No items found.', 'kraftiart') . '</p>';
    }
    
    // Generate unique ID for this carousel instance
    $carousel_id = 'frame-carousel-fullsize-' . uniqid();
    
    ob_start();
    ?>
    
    <div class="frame-carousel-fullsize-wrapper <?php echo esc_attr($carousel_id); ?>" data-autoplay="<?php echo esc_attr($atts['autoplay']); ?>" data-delay="<?php echo esc_attr($atts['autoplay_delay']); ?>">
        <div class="frame-carousel-fullsize-track">
            <?php 
            while ($posts_query->have_posts()) : $posts_query->the_post();
                $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $title = get_the_title();
                ?>
                    <div class="frame-slide-fullsize">
                        <div class="frame-slide-fullsize-content">
                            <?php if ($featured_image) : ?>
                                <div class="frame-slide-fullsize-image">
                                    <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($title); ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
            <?php endwhile; 
            wp_reset_postdata();
            ?>
        </div>
        
        <button class="frame-carousel-fullsize-nav frame-carousel-fullsize-prev" aria-label="Previous slide">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <button class="frame-carousel-fullsize-nav frame-carousel-fullsize-next" aria-label="Next slide">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        
        <div class="frame-carousel-fullsize-dots"></div>
    </div>
    
    <style>
    /* Force visibility on all devices */
    .<?php echo esc_attr($carousel_id); ?> .frame-carousel-fullsize-nav {
        display: flex !important;
        visibility: visible !important;
        opacity: 1 !important;
        z-index: 9999 !important;
    }
    
    .frame-carousel-fullsize-wrapper {
        position: relative;
        width: 100%;
        max-width: 100%;
        overflow: hidden;
        padding: 0 0 80px;
        margin: 0;
        background: transparent;
        isolation: isolate;
    }
    
    .frame-carousel-fullsize-track {
        display: flex;
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        width: 100%;
        align-items: center;
        position: relative;
        z-index: 1;
    }
    
    .frame-slide-fullsize {
        flex: 0 0 100%;
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .frame-slide-fullsize-content {
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        z-index: 1;
    }
    
    .frame-slide-fullsize-image {
        width: 100%;
        height: auto;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .frame-slide-fullsize-image img {
        width: 100%;
        height: auto;
        max-width: 100%;
        display: block;
        object-fit: contain;
        transition: opacity 0.3s ease;
    }
    
    .frame-carousel-fullsize-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 100 !important;
        padding: 0;
        display: flex !important;
        justify-content: center;
        align-items: center;
        border: none;
        width: 48px;
        height: 48px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 50%;
        background: linear-gradient(135deg, #722f37 0%, #8b3a45 100%);
        box-shadow: 0 6px 20px rgba(114, 47, 55, 0.35), 0 3px 10px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        outline: none;
        -webkit-tap-highlight-color: transparent;
        border: 2px solid rgba(255, 255, 255, 0.9);
        pointer-events: auto;
        visibility: visible !important;
        opacity: 1 !important;
    }
    
    .frame-carousel-fullsize-prev {
        left: 16px;
    }
    
    .frame-carousel-fullsize-next {
        right: 16px;
    }
    
    .frame-carousel-fullsize-nav:active {
        transform: translateY(-50%) scale(0.88);
        box-shadow: 0 4px 14px rgba(114, 47, 55, 0.4), 0 2px 8px rgba(0, 0, 0, 0.12);
    }
    
    .frame-carousel-fullsize-nav svg {
        width: 22px !important;
        height: 22px !important;
        color: #fff !important;
        filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.1)) !important;
        display: block !important;
    }
    
    .frame-carousel-fullsize-dots {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex !important;
        gap: 8px;
        z-index: 9999 !important;
        pointer-events: auto;
        visibility: visible !important;
    }
    
    .frame-carousel-fullsize-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: rgba(114, 47, 55, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        padding: 0;
    }
    
    .frame-carousel-fullsize-dot.active {
        width: 24px;
        border-radius: 4px;
        background: linear-gradient(135deg, #722f37, #8b3a45);
    }
    
    /* Desktop optimizations */
    @media (min-width: 768px) {
        .frame-carousel-fullsize-wrapper {
            padding: 0 0 80px;
        }
    }
    
    /* Mobile optimizations */
    @media (max-width: 767px) {
        .frame-carousel-fullsize-nav {
            width: 40px !important;
            height: 40px !important;
            box-shadow: 0 4px 16px rgba(114, 47, 55, 0.3), 0 2px 8px rgba(0, 0, 0, 0.1) !important;
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        .frame-carousel-fullsize-prev {
            left: 8px !important;
        }
        
        .frame-carousel-fullsize-next {
            right: 8px !important;
        }
        
        .frame-carousel-fullsize-nav svg {
            width: 18px !important;
            height: 18px !important;
        }
        
        .frame-carousel-fullsize-wrapper {
            padding: 0 0 70px;
        }
        
        .frame-carousel-fullsize-dots {
            bottom: 30px;
        }
        
        .frame-carousel-fullsize-dot {
            width: 10px;
            height: 10px;
        }
        
        .frame-carousel-fullsize-dot.active {
            width: 28px;
        }
    }
    
    /* Extra small mobile devices */
    @media (max-width: 374px) {
        .frame-carousel-fullsize-wrapper {
            padding: 0 0 70px;
        }
        
        .frame-carousel-fullsize-nav {
            width: 36px !important;
            height: 36px !important;
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        .frame-carousel-fullsize-prev {
            left: 4px !important;
        }
        
        .frame-carousel-fullsize-next {
            right: 4px !important;
        }
        
        .frame-carousel-fullsize-nav svg {
            width: 16px !important;
            height: 16px !important;
        }
    }
    </style>
    
    <script>
    (function() {
        function initFrameCarouselFullsize() {
            const wrapper = document.querySelector('.<?php echo esc_js($carousel_id); ?>');
            if (!wrapper) return;
            
            const track = wrapper.querySelector('.frame-carousel-fullsize-track');
            const slides = Array.from(track.querySelectorAll('.frame-slide-fullsize'));
            const prevBtn = wrapper.querySelector('.frame-carousel-fullsize-prev');
            const nextBtn = wrapper.querySelector('.frame-carousel-fullsize-next');
            const dotsContainer = wrapper.querySelector('.frame-carousel-fullsize-dots');
            
            if (!track || slides.length === 0) return;
            
            let currentIndex = 0;
            let autoplayInterval = null;
            let touchStartX = 0;
            let touchEndX = 0;
            
            // Create dots
            slides.forEach((_, index) => {
                const dot = document.createElement('button');
                dot.className = 'frame-carousel-fullsize-dot';
                dot.setAttribute('aria-label', 'Go to slide ' + (index + 1));
                if (index === 0) dot.classList.add('active');
                dot.addEventListener('click', () => goToSlide(index));
                dotsContainer.appendChild(dot);
            });
            
            const dots = Array.from(dotsContainer.querySelectorAll('.frame-carousel-fullsize-dot'));
            
            function updateCarousel() {
                const offset = -currentIndex * 100;
                track.style.transform = `translateX(${offset}%)`;
                
                // Update dots
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            }
            
            function goToSlide(index) {
                currentIndex = index;
                updateCarousel();
                resetAutoplay();
            }
            
            function nextSlide() {
                currentIndex = (currentIndex + 1) % slides.length;
                updateCarousel();
            }
            
            function prevSlide() {
                currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                updateCarousel();
            }
            
            function startAutoplay() {
                const autoplay = wrapper.getAttribute('data-autoplay') === 'true';
                const delay = parseInt(wrapper.getAttribute('data-delay')) || 4000;
                
                if (autoplay) {
                    autoplayInterval = setInterval(nextSlide, delay);
                }
            }
            
            function stopAutoplay() {
                if (autoplayInterval) {
                    clearInterval(autoplayInterval);
                    autoplayInterval = null;
                }
            }
            
            function resetAutoplay() {
                stopAutoplay();
                startAutoplay();
            }
            
            // Touch events
            track.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
                stopAutoplay();
            }, { passive: true });
            
            track.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
                startAutoplay();
            }, { passive: true });
            
            function handleSwipe() {
                const swipeThreshold = 50;
                const diff = touchStartX - touchEndX;
                
                if (Math.abs(diff) > swipeThreshold) {
                    if (diff > 0) {
                        nextSlide();
                    } else {
                        prevSlide();
                    }
                }
            }
            
            // Button events
            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    nextSlide();
                    resetAutoplay();
                });
            }
            
            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    prevSlide();
                    resetAutoplay();
                });
            }
            
            // Keyboard navigation
            wrapper.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    prevSlide();
                    resetAutoplay();
                } else if (e.key === 'ArrowRight') {
                    nextSlide();
                    resetAutoplay();
                }
            });
            
            // Pause on hover (desktop only)
            if (window.innerWidth >= 768) {
                wrapper.addEventListener('mouseenter', stopAutoplay);
                wrapper.addEventListener('mouseleave', startAutoplay);
            }
            
            // Initialize
            updateCarousel();
            startAutoplay();
        }
        
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFrameCarouselFullsize);
        } else {
            initFrameCarouselFullsize();
        }
    })();
    </script>
    
    <?php
    return ob_get_clean();
}
add_shortcode('frame_carousel_fullsize', 'frame_carousel_fullsize_shortcode');

/**
 * Frame Carousel New Products - Latest Products with Images (Limited to 10)
 * Usage: [frame_carousel_new]
 */
function frame_carousel_new_shortcode($atts) {
    // Check if WooCommerce is active
    if (!class_exists('WooCommerce')) {
        return '<p>' . __('WooCommerce is required for this carousel.', 'kraftiart') . '</p>';
    }
    
    // Parse shortcode attributes
    $atts = shortcode_atts(array(
        'posts_per_page' => '10',
        'autoplay' => 'true',
        'autoplay_delay' => '4000',
        'category' => '', // Product category slug
    ), $atts);
    
    // Query newest products
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => intval($atts['posts_per_page']),
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    );
    
    // Add category filter if specified
    if (!empty($atts['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $atts['category']
            )
        );
    }
    
    $products_query = new WP_Query($args);
    
    if (!$products_query->have_posts()) {
        return '<p>' . __('No products found.', 'kraftiart') . '</p>';
    }
    
    // Generate unique ID for this carousel instance
    $carousel_id = 'frame-carousel-new-' . uniqid();
    
    ob_start();
    ?>
    
    <div class="frame-carousel-new-wrapper <?php echo esc_attr($carousel_id); ?>" data-autoplay="<?php echo esc_attr($atts['autoplay']); ?>" data-delay="<?php echo esc_attr($atts['autoplay_delay']); ?>">
        <div class="frame-carousel-new-track">
            <?php 
            while ($products_query->have_posts()) : $products_query->the_post();
                global $product;
                $product_id = get_the_ID();
                $product_image = get_the_post_thumbnail_url($product_id, 'medium');
                $product_name = get_the_title();
                ?>
                    <div class="frame-slide-new">
                        <div class="frame-slide-new-content">
                            <?php if ($product_image) : ?>
                                <div class="frame-slide-new-image">
                                    <img src="<?php echo esc_url($product_image); ?>" alt="<?php echo esc_attr($product_name); ?>">
                                </div>
                            <?php endif; ?>
                            <div class="frame-slide-new-name">
                                <h3><?php echo esc_html($product_name); ?></h3>
                            </div>
                        </div>
                    </div>
            <?php endwhile; 
            wp_reset_postdata();
            ?>
        </div>
        
        <button class="frame-carousel-new-nav frame-carousel-new-prev" aria-label="Previous slide">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <button class="frame-carousel-new-nav frame-carousel-new-next" aria-label="Next slide">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        
        <div class="frame-carousel-new-dots"></div>
    </div>
    
    <style>
    /* Force visibility on all devices */
    .<?php echo esc_attr($carousel_id); ?> .frame-carousel-new-nav {
        display: flex !important;
        visibility: visible !important;
        opacity: 1 !important;
        z-index: 9999 !important;
    }
    
    .frame-carousel-new-wrapper {
        position: relative;
        width: 100%;
        max-width: 100%;
        overflow: hidden;
        padding: 0 16px 80px;
        margin: 0;
        background: transparent;
        isolation: isolate;
    }
    
    .frame-carousel-new-track {
        display: flex;
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        width: 100%;
        align-items: stretch;
        position: relative;
        z-index: 1;
    }
    
    .frame-slide-new {
        flex: 0 0 100%;
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
        display: flex;
    }
    
    .frame-slide-new-content {
        background: linear-gradient(135deg, #f8f4f5 0%, #f3e5e8 100%);
        border-radius: 24px;
        box-shadow: 0 10px 40px rgba(114, 47, 55, 0.15), 0 4px 12px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        position: relative;
        width: 100%;
        display: flex;
        flex-direction: column;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid rgba(255, 255, 255, 0.8);
        height: 100%;
        z-index: 1;
    }
    
    .frame-slide-new-content:active {
        transform: scale(0.98);
        box-shadow: 0 8px 30px rgba(114, 47, 55, 0.2), 0 3px 10px rgba(0, 0, 0, 0.1);
    }
    
    .frame-slide-new-image {
        width: 100%;
        height: 300px;
        position: relative;
        overflow: hidden;
    }
    
    .frame-slide-new-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .frame-slide-new-content:active .frame-slide-new-image img {
        transform: scale(1.05);
    }
    
    .new-badge {
        position: absolute;
        top: 16px;
        right: 16px;
        background: linear-gradient(135deg, #10b981 0%, #34d399 100%);
        color: #fff;
        font-weight: 700;
        font-size: 12px;
        letter-spacing: 1px;
        padding: 6px 14px;
        border-radius: 20px;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
        z-index: 10;
        animation: bounce 2s infinite;
    }
    
    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-5px);
        }
    }
    
    .frame-slide-new-name {
        padding: 20px 24px;
        background: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }
    
    .frame-slide-new-name h3 {
        margin: 0;
        font-size: 18px;
        font-weight: 600;
        color: #722f37;
        text-align: center;
        line-height: 1.4;
        text-shadow: 0 1px 2px rgba(255, 255, 255, 0.8);
    }
    
    .frame-carousel-new-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 100 !important;
        padding: 0;
        display: flex !important;
        justify-content: center;
        align-items: center;
        border: none;
        width: 48px;
        height: 48px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 50%;
        background: linear-gradient(135deg, #722f37 0%, #8b3a45 100%);
        box-shadow: 0 6px 20px rgba(114, 47, 55, 0.35), 0 3px 10px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        outline: none;
        -webkit-tap-highlight-color: transparent;
        border: 2px solid rgba(255, 255, 255, 0.9);
        pointer-events: auto;
        visibility: visible !important;
        opacity: 1 !important;
    }
    
    .frame-carousel-new-prev {
        left: 16px;
    }
    
    .frame-carousel-new-next {
        right: 16px;
    }
    
    .frame-carousel-new-nav:active {
        transform: translateY(-50%) scale(0.88);
        box-shadow: 0 4px 14px rgba(114, 47, 55, 0.4), 0 2px 8px rgba(0, 0, 0, 0.12);
    }
    
    .frame-carousel-new-nav svg {
        width: 22px !important;
        height: 22px !important;
        color: #fff !important;
        filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.1)) !important;
        display: block !important;
    }
    
    .frame-carousel-new-dots {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex !important;
        gap: 8px;
        z-index: 9999 !important;
        pointer-events: auto;
        visibility: visible !important;
    }
    
    .frame-carousel-new-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: rgba(114, 47, 55, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        padding: 0;
    }
    
    .frame-carousel-new-dot.active {
        width: 24px;
        border-radius: 4px;
        background: linear-gradient(135deg, #722f37, #8b3a45);
    }
    
    /* Desktop optimizations */
    @media (min-width: 768px) {
        .frame-carousel-new-wrapper {
            min-height: 520px;
        }
        
        .frame-carousel-new-track {
            min-height: 440px;
        }
        
        .frame-slide-new {
            min-height: 440px;
        }
        
        .frame-slide-new-image {
            height: 360px;
        }
        
        .frame-slide-new-name h3 {
            font-size: 22px;
        }
    }
    
    /* Mobile optimizations */
    @media (max-width: 767px) {
        .frame-carousel-new-nav {
            width: 40px !important;
            height: 40px !important;
            box-shadow: 0 4px 16px rgba(114, 47, 55, 0.3), 0 2px 8px rgba(0, 0, 0, 0.1) !important;
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        .frame-carousel-new-prev {
            left: 8px !important;
        }
        
        .frame-carousel-new-next {
            right: 8px !important;
        }
        
        .frame-carousel-new-nav svg {
            width: 18px !important;
            height: 18px !important;
        }
        
        .frame-carousel-new-wrapper {
            padding: 0 16px 70px;
            min-height: 420px;
        }
        
        .frame-carousel-new-track {
            min-height: 340px;
        }
        
        .frame-slide-new {
            min-height: 340px;
        }
        
        .frame-slide-new-image {
            height: 260px;
        }
        
        .frame-slide-new-content {
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(114, 47, 55, 0.18), 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .frame-slide-new-name {
            padding: 16px 20px;
        }
        
        .frame-slide-new-name h3 {
            font-size: 16px;
        }
        
        .new-badge {
            top: 12px;
            right: 12px;
            font-size: 11px;
            padding: 5px 12px;
        }
        
        .frame-carousel-new-dots {
            bottom: 30px;
        }
        
        .frame-carousel-new-dot {
            width: 10px;
            height: 10px;
        }
        
        .frame-carousel-new-dot.active {
            width: 28px;
        }
    }
    
    /* Extra small mobile devices */
    @media (max-width: 374px) {
        .frame-carousel-new-wrapper {
            min-height: 380px;
            padding: 0 12px 70px;
        }
        
        .frame-carousel-new-track {
            min-height: 300px;
        }
        
        .frame-slide-new {
            min-height: 300px;
        }
        
        .frame-slide-new-image {
            height: 220px;
        }
        
        .frame-carousel-new-nav {
            width: 36px !important;
            height: 36px !important;
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        .frame-carousel-new-prev {
            left: 4px !important;
        }
        
        .frame-carousel-new-next {
            right: 4px !important;
        }
        
        .frame-carousel-new-nav svg {
            width: 16px !important;
            height: 16px !important;
        }
        
        .frame-slide-new-name h3 {
            font-size: 15px;
        }
    }
    </style>
    
    <script>
    (function() {
        function initFrameCarouselNew() {
            const wrapper = document.querySelector('.<?php echo esc_js($carousel_id); ?>');
            if (!wrapper) return;
            
            const track = wrapper.querySelector('.frame-carousel-new-track');
            const slides = Array.from(track.querySelectorAll('.frame-slide-new'));
            const prevBtn = wrapper.querySelector('.frame-carousel-new-prev');
            const nextBtn = wrapper.querySelector('.frame-carousel-new-next');
            const dotsContainer = wrapper.querySelector('.frame-carousel-new-dots');
            
            if (!track || slides.length === 0) return;
            
            let currentIndex = 0;
            let autoplayInterval = null;
            let touchStartX = 0;
            let touchEndX = 0;
            
            // Create dots
            slides.forEach((_, index) => {
                const dot = document.createElement('button');
                dot.className = 'frame-carousel-new-dot';
                dot.setAttribute('aria-label', 'Go to slide ' + (index + 1));
                if (index === 0) dot.classList.add('active');
                dot.addEventListener('click', () => goToSlide(index));
                dotsContainer.appendChild(dot);
            });
            
            const dots = Array.from(dotsContainer.querySelectorAll('.frame-carousel-new-dot'));
            
            function updateCarousel() {
                const offset = -currentIndex * 100;
                track.style.transform = `translateX(${offset}%)`;
                
                // Update dots
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            }
            
            function goToSlide(index) {
                currentIndex = index;
                updateCarousel();
                resetAutoplay();
            }
            
            function nextSlide() {
                currentIndex = (currentIndex + 1) % slides.length;
                updateCarousel();
            }
            
            function prevSlide() {
                currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                updateCarousel();
            }
            
            function startAutoplay() {
                const autoplay = wrapper.getAttribute('data-autoplay') === 'true';
                const delay = parseInt(wrapper.getAttribute('data-delay')) || 4000;
                
                if (autoplay) {
                    autoplayInterval = setInterval(nextSlide, delay);
                }
            }
            
            function stopAutoplay() {
                if (autoplayInterval) {
                    clearInterval(autoplayInterval);
                    autoplayInterval = null;
                }
            }
            
            function resetAutoplay() {
                stopAutoplay();
                startAutoplay();
            }
            
            // Touch events
            track.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
                stopAutoplay();
            }, { passive: true });
            
            track.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
                startAutoplay();
            }, { passive: true });
            
            function handleSwipe() {
                const swipeThreshold = 50;
                const diff = touchStartX - touchEndX;
                
                if (Math.abs(diff) > swipeThreshold) {
                    if (diff > 0) {
                        nextSlide();
                    } else {
                        prevSlide();
                    }
                }
            }
            
            // Button events
            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    nextSlide();
                    resetAutoplay();
                });
            }
            
            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    prevSlide();
                    resetAutoplay();
                });
            }
            
            // Keyboard navigation
            wrapper.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    prevSlide();
                    resetAutoplay();
                } else if (e.key === 'ArrowRight') {
                    nextSlide();
                    resetAutoplay();
                }
            });
            
            // Pause on hover (desktop only)
            if (window.innerWidth >= 768) {
                wrapper.addEventListener('mouseenter', stopAutoplay);
                wrapper.addEventListener('mouseleave', startAutoplay);
            }
            
            // Initialize
            updateCarousel();
            startAutoplay();
        }
        
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFrameCarouselNew);
        } else {
            initFrameCarouselNew();
        }
    })();
    </script>
    
    <?php
    return ob_get_clean();
}
add_shortcode('frame_carousel_new', 'frame_carousel_new_shortcode');

/**
 * Frame Carousel Tabs - New Products & Best Sellers with Tabs
 * Usage: [frame_carousel_tabs]
 */
function frame_carousel_tabs_shortcode($atts) {
    // Check if WooCommerce is active
    if (!class_exists('WooCommerce')) {
        return '<p>' . __('WooCommerce is required for this carousel.', 'kraftiart') . '</p>';
    }
    
    // Parse shortcode attributes
    $atts = shortcode_atts(array(
        'posts_per_page' => '10',
        'autoplay' => 'true',
        'autoplay_delay' => '4000',
        'category' => '', // Product category slug
    ), $atts);
    
    // Query newest products
    $args_new = array(
        'post_type' => 'product',
        'posts_per_page' => intval($atts['posts_per_page']),
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    );
    
    // Add category filter if specified
    if (!empty($atts['category'])) {
        $tax_query = array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $atts['category']
            )
        );
        $args_new['tax_query'] = $tax_query;
    }
    
    $products_new = new WP_Query($args_new);
    
    if (!$products_new->have_posts()) {
        return '<p>' . __('No products found.', 'kraftiart') . '</p>';
    }
    
    // Generate unique ID for this carousel instance
    $carousel_id = 'frame-carousel-tabs-' . uniqid();
    
    ob_start();
    ?>
    
    <div class="frame-carousel-tabs-wrapper <?php echo esc_attr($carousel_id); ?>" data-autoplay="<?php echo esc_attr($atts['autoplay']); ?>" data-delay="<?php echo esc_attr($atts['autoplay_delay']); ?>">
        <!-- Tab Content: New Products -->
        <div class="frame-tab-content active" data-content="new">
            <div class="frame-carousel-tabs-track" data-carousel="new">
                <?php 
                if ($products_new->have_posts()) :
                    while ($products_new->have_posts()) : $products_new->the_post();
                        global $product;
                        $product_id = get_the_ID();
                        $product_image = get_the_post_thumbnail_url($product_id, 'medium');
                        $product_name = get_the_title();
                        ?>
                            <div class="frame-slide-tabs">
                                <div class="frame-slide-tabs-content">
                                    <?php if ($product_image) : ?>
                                        <div class="frame-slide-tabs-image">
                                            <img src="<?php echo esc_url($product_image); ?>" alt="<?php echo esc_attr($product_name); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <div class="frame-slide-tabs-name">
                                        <h3><?php echo esc_html($product_name); ?></h3>
                                    </div>
                                </div>
                            </div>
                    <?php endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
            
            <button class="frame-carousel-tabs-nav frame-carousel-tabs-prev" data-carousel="new" aria-label="Previous slide">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <button class="frame-carousel-tabs-nav frame-carousel-tabs-next" data-carousel="new" aria-label="Next slide">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            
            <div class="frame-carousel-tabs-dots" data-carousel="new"></div>
        </div>
    </div>
    
    <style>
    /* Force visibility on all devices */
    .<?php echo esc_attr($carousel_id); ?> .frame-carousel-tabs-nav {
        display: flex !important;
        visibility: visible !important;
        opacity: 1 !important;
        z-index: 9999 !important;
    }
    
    .frame-carousel-tabs-wrapper {
        position: relative;
        width: 100%;
        max-width: 100%;
        overflow: visible;
        padding: 0;
        margin: 0;
        background: transparent;
        isolation: isolate;
    }
    
    /* Tabs Navigation */
    .frame-tabs-nav {
        display: flex !important;
        gap: 12px;
        margin-bottom: 24px;
        justify-content: center;
        flex-wrap: wrap;
        visibility: visible !important;
        opacity: 1 !important;
        z-index: 10;
        padding: 0 16px;
    }
    
    .frame-tab-btn {
        padding: 12px 28px;
        border: 2px solid rgba(114, 47, 55, 0.3);
        background: rgba(248, 244, 245, 0.5);
        border-radius: 30px;
        font-size: 16px;
        font-weight: 600;
        color: #722f37;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: center;
        gap: 8px;
        outline: none;
        -webkit-tap-highlight-color: transparent;
    }
    
    .frame-tab-btn svg {
        transition: transform 0.3s ease;
    }
    
    .frame-tab-btn:hover {
        border-color: #722f37;
        background: rgba(243, 229, 232, 0.8);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(114, 47, 55, 0.2);
    }
    
    .frame-tab-btn.active {
        background: linear-gradient(135deg, #722f37 0%, #8b3a45 100%);
        color: #fff;
        border-color: transparent;
        box-shadow: 0 6px 20px rgba(114, 47, 55, 0.35);
    }
    
    .frame-tab-btn.active svg {
        transform: scale(1.1);
    }
    
    .frame-tab-btn:active {
        transform: translateY(0) scale(0.96);
    }
    
    /* Tab Content */
    .frame-tab-content {
        display: none;
        position: relative;
        padding: 0 16px 80px;
        animation: fadeIn 0.3s ease;
    }
    
    .frame-tab-content.active {
        display: block;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .frame-carousel-tabs-track {
        display: flex;
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        width: 100%;
        align-items: stretch;
        position: relative;
        z-index: 1;
    }
    
    .frame-slide-tabs {
        flex: 0 0 100%;
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
        display: flex;
    }
    
    /* Desktop: 3 slides per view */
    @media (min-width: 768px) {
        .frame-carousel-tabs-track {
            gap: 20px;
        }
        
        .frame-slide-tabs {
            flex: 0 0 calc((100% - 40px) / 3);
            width: calc((100% - 40px) / 3);
            max-width: calc((100% - 40px) / 3);
        }
    }
    
    .frame-slide-tabs-content {
        background: linear-gradient(135deg, #f8f4f5 0%, #f3e5e8 100%);
        border-radius: 24px;
        box-shadow: 0 10px 40px rgba(114, 47, 55, 0.15), 0 4px 12px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        position: relative;
        width: 100%;
        display: flex;
        flex-direction: column;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid rgba(255, 255, 255, 0.8);
        height: 100%;
        z-index: 1;
    }
    
    .frame-slide-tabs-content:active {
        transform: scale(0.98);
        box-shadow: 0 8px 30px rgba(114, 47, 55, 0.2), 0 3px 10px rgba(0, 0, 0, 0.1);
    }
    
    .frame-slide-tabs-image {
        width: 100%;
        height: 300px;
        position: relative;
        overflow: hidden;
    }
    
    .frame-slide-tabs-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .frame-slide-tabs-content:active .frame-slide-tabs-image img {
        transform: scale(1.05);
    }
    
    .new-badge {
        position: absolute;
        top: 16px;
        right: 16px;
        background: linear-gradient(135deg, #10b981 0%, #34d399 100%);
        color: #fff;
        font-weight: 700;
        font-size: 12px;
        letter-spacing: 1px;
        padding: 6px 14px;
        border-radius: 20px;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
        z-index: 10;
        animation: bounce 2s infinite;
    }
    
    .bestseller-badge {
        position: absolute;
        top: 16px;
        right: 16px;
        background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
        color: #fff;
        font-weight: 700;
        font-size: 12px;
        letter-spacing: 1px;
        padding: 6px 14px;
        border-radius: 20px;
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.4);
        z-index: 10;
        display: flex;
        align-items: center;
        gap: 4px;
        animation: pulse 2s infinite;
    }
    
    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-5px);
        }
    }
    
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }
    
    .frame-slide-tabs-name {
        padding: 20px 24px;
        background: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }
    
    .frame-slide-tabs-name h3 {
        margin: 0;
        font-size: 18px;
        font-weight: 600;
        color: #722f37;
        text-align: center;
        line-height: 1.4;
        text-shadow: 0 1px 2px rgba(255, 255, 255, 0.8);
    }
    
    .frame-carousel-tabs-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 100 !important;
        padding: 0;
        display: flex !important;
        justify-content: center;
        align-items: center;
        border: none;
        width: 48px;
        height: 48px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 50%;
        background: linear-gradient(135deg, #722f37 0%, #8b3a45 100%);
        box-shadow: 0 6px 20px rgba(114, 47, 55, 0.35), 0 3px 10px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        outline: none;
        -webkit-tap-highlight-color: transparent;
        border: 2px solid rgba(255, 255, 255, 0.9);
        pointer-events: auto;
        visibility: visible !important;
        opacity: 1 !important;
    }
    
    .frame-carousel-tabs-prev {
        left: 16px;
    }
    
    .frame-carousel-tabs-next {
        right: 16px;
    }
    
    .frame-carousel-tabs-nav:active {
        transform: translateY(-50%) scale(0.88);
        box-shadow: 0 4px 14px rgba(114, 47, 55, 0.4), 0 2px 8px rgba(0, 0, 0, 0.12);
    }
    
    .frame-carousel-tabs-nav svg {
        width: 22px !important;
        height: 22px !important;
        color: #fff !important;
        filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.1)) !important;
        display: block !important;
    }
    
    .frame-carousel-tabs-dots {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex !important;
        gap: 8px;
        z-index: 9999 !important;
        pointer-events: auto;
        visibility: visible !important;
    }
    
    .frame-carousel-tabs-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: rgba(114, 47, 55, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        padding: 0;
    }
    
    .frame-carousel-tabs-dot.active {
        width: 24px;
        border-radius: 4px;
        background: linear-gradient(135deg, #722f37, #8b3a45);
    }
    
    /* Desktop optimizations */
    @media (min-width: 768px) {
        .frame-carousel-tabs-track {
            min-height: 380px;
        }
        
        .frame-slide-tabs {
            min-height: 380px;
        }
        
        .frame-slide-tabs-image {
            height: 280px;
        }
        
        .frame-slide-tabs-name h3 {
            font-size: 18px;
        }
        
        .frame-tab-btn {
            font-size: 18px;
            padding: 14px 32px;
        }
        
        .frame-tab-content {
            padding: 0 60px 80px;
        }
    }
    
    /* Large desktop optimizations */
    @media (min-width: 1024px) {
        .frame-slide-tabs-image {
            height: 320px;
        }
        
        .frame-slide-tabs-name h3 {
            font-size: 20px;
        }
    }
    
    /* Mobile optimizations */
    @media (max-width: 767px) {
        .frame-carousel-tabs-nav {
            width: 40px !important;
            height: 40px !important;
            box-shadow: 0 4px 16px rgba(114, 47, 55, 0.3), 0 2px 8px rgba(0, 0, 0, 0.1) !important;
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        .frame-carousel-tabs-prev {
            left: 8px !important;
        }
        
        .frame-carousel-tabs-next {
            right: 8px !important;
        }
        
        .frame-carousel-tabs-nav svg {
            width: 18px !important;
            height: 18px !important;
        }
        
        .frame-tab-content {
            padding: 0 16px 70px;
        }
        
        .frame-carousel-tabs-track {
            min-height: 340px;
        }
        
        .frame-slide-tabs {
            min-height: 340px;
        }
        
        .frame-slide-tabs-image {
            height: 260px;
        }
        
        .frame-slide-tabs-content {
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(114, 47, 55, 0.18), 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .frame-slide-tabs-name {
            padding: 16px 20px;
        }
        
        .frame-slide-tabs-name h3 {
            font-size: 16px;
        }
        
        .new-badge,
        .bestseller-badge {
            top: 12px;
            right: 12px;
            font-size: 11px;
            padding: 5px 12px;
        }
        
        .frame-carousel-tabs-dots {
            bottom: 30px;
        }
        
        .frame-carousel-tabs-dot {
            width: 10px;
            height: 10px;
        }
        
        .frame-carousel-tabs-dot.active {
            width: 28px;
        }
        
        .frame-tab-btn {
            font-size: 14px;
            padding: 10px 20px;
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        .frame-tab-btn svg {
            width: 18px;
            height: 18px;
        }
        
        .frame-tabs-nav {
            gap: 8px;
            margin-bottom: 20px;
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
    }
    
    /* Extra small mobile devices */
    @media (max-width: 374px) {
        .frame-tab-content {
            padding: 0 12px 70px;
        }
        
        .frame-carousel-tabs-track {
            min-height: 300px;
        }
        
        .frame-slide-tabs {
            min-height: 300px;
        }
        
        .frame-slide-tabs-image {
            height: 220px;
        }
        
        .frame-carousel-tabs-nav {
            width: 36px !important;
            height: 36px !important;
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        .frame-carousel-tabs-prev {
            left: 4px !important;
        }
        
        .frame-carousel-tabs-next {
            right: 4px !important;
        }
        
        .frame-carousel-tabs-nav svg {
            width: 16px !important;
            height: 16px !important;
        }
        
        .frame-slide-tabs-name h3 {
            font-size: 15px;
        }
        
        .frame-tab-btn {
            font-size: 13px;
            padding: 8px 16px;
            display: flex !important;
            visibility: visible !important;
        }
        
        .frame-tabs-nav {
            display: flex !important;
            visibility: visible !important;
            margin-bottom: 16px;
        }
    }
    </style>
    
    <script>
    (function() {
        function initFrameCarouselTabs() {
            const wrapper = document.querySelector('.<?php echo esc_js($carousel_id); ?>');
            if (!wrapper) return;
            
            const tabBtns = wrapper.querySelectorAll('.frame-tab-btn');
            const tabContents = wrapper.querySelectorAll('.frame-tab-content');
            
            // Carousel instances storage
            const carousels = {};
            
            // Initialize each carousel
            function initCarousel(carouselType) {
                const tabContent = wrapper.querySelector(`[data-content="${carouselType}"]`);
                if (!tabContent) return;
                
                const track = tabContent.querySelector('.frame-carousel-tabs-track');
                const slides = Array.from(track.querySelectorAll('.frame-slide-tabs'));
                const prevBtn = tabContent.querySelector('.frame-carousel-tabs-prev');
                const nextBtn = tabContent.querySelector('.frame-carousel-tabs-next');
                const dotsContainer = tabContent.querySelector('.frame-carousel-tabs-dots');
                
                if (!track || slides.length === 0) return;
                
                let currentIndex = 0;
                let autoplayInterval = null;
                let touchStartX = 0;
                let touchEndX = 0;
                
                // Create dots
                dotsContainer.innerHTML = '';
                slides.forEach((_, index) => {
                    const dot = document.createElement('button');
                    dot.className = 'frame-carousel-tabs-dot';
                    dot.setAttribute('aria-label', 'Go to slide ' + (index + 1));
                    if (index === 0) dot.classList.add('active');
                    dot.addEventListener('click', () => goToSlide(index));
                    dotsContainer.appendChild(dot);
                });
                
                const dots = Array.from(dotsContainer.querySelectorAll('.frame-carousel-tabs-dot'));
                
                function updateCarousel() {
                    const isDesktop = window.innerWidth >= 768;
                    const slidesToShow = isDesktop ? 3 : 1;
                    const slideWidth = isDesktop ? (100 / slidesToShow) : 100;
                    const gap = isDesktop ? (20 / slides.length) : 0;
                    const offset = -currentIndex * (slideWidth + gap);
                    
                    track.style.transform = `translateX(${offset}%)`;
                    
                    // Update dots
                    dots.forEach((dot, index) => {
                        dot.classList.toggle('active', index === currentIndex);
                    });
                }
                
                function goToSlide(index) {
                    currentIndex = index;
                    updateCarousel();
                    resetAutoplay();
                }
                
                function nextSlide() {
                    const isDesktop = window.innerWidth >= 768;
                    const slidesToShow = isDesktop ? 3 : 1;
                    const maxIndex = Math.max(0, slides.length - slidesToShow);
                    
                    if (isDesktop && slides.length > slidesToShow) {
                        // Infinite loop on desktop
                        currentIndex = currentIndex + 1;
                        if (currentIndex > maxIndex) {
                            currentIndex = 0;
                        }
                    } else {
                        currentIndex = (currentIndex + 1) % slides.length;
                    }
                    updateCarousel();
                }
                
                function prevSlide() {
                    const isDesktop = window.innerWidth >= 768;
                    const slidesToShow = isDesktop ? 3 : 1;
                    const maxIndex = Math.max(0, slides.length - slidesToShow);
                    
                    if (isDesktop && slides.length > slidesToShow) {
                        // Infinite loop on desktop
                        currentIndex = currentIndex - 1;
                        if (currentIndex < 0) {
                            currentIndex = maxIndex;
                        }
                    } else {
                        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                    }
                    updateCarousel();
                }
                
                function startAutoplay() {
                    const autoplay = wrapper.getAttribute('data-autoplay') === 'true';
                    const delay = parseInt(wrapper.getAttribute('data-delay')) || 4000;
                    
                    if (autoplay && tabContent.classList.contains('active')) {
                        autoplayInterval = setInterval(nextSlide, delay);
                    }
                }
                
                function stopAutoplay() {
                    if (autoplayInterval) {
                        clearInterval(autoplayInterval);
                        autoplayInterval = null;
                    }
                }
                
                function resetAutoplay() {
                    stopAutoplay();
                    startAutoplay();
                }
                
                // Touch events
                track.addEventListener('touchstart', (e) => {
                    touchStartX = e.changedTouches[0].screenX;
                    stopAutoplay();
                }, { passive: true });
                
                track.addEventListener('touchend', (e) => {
                    touchEndX = e.changedTouches[0].screenX;
                    handleSwipe();
                    startAutoplay();
                }, { passive: true });
                
                function handleSwipe() {
                    const swipeThreshold = 50;
                    const diff = touchStartX - touchEndX;
                    
                    if (Math.abs(diff) > swipeThreshold) {
                        if (diff > 0) {
                            nextSlide();
                        } else {
                            prevSlide();
                        }
                    }
                }
                
                // Button events
                if (nextBtn) {
                    nextBtn.addEventListener('click', () => {
                        nextSlide();
                        resetAutoplay();
                    });
                }
                
                if (prevBtn) {
                    prevBtn.addEventListener('click', () => {
                        prevSlide();
                        resetAutoplay();
                    });
                }
                
                // Keyboard navigation
                tabContent.addEventListener('keydown', (e) => {
                    if (e.key === 'ArrowLeft') {
                        prevSlide();
                        resetAutoplay();
                    } else if (e.key === 'ArrowRight') {
                        nextSlide();
                        resetAutoplay();
                    }
                });
                
                // Pause on hover (desktop only)
                if (window.innerWidth >= 768) {
                    tabContent.addEventListener('mouseenter', stopAutoplay);
                    tabContent.addEventListener('mouseleave', startAutoplay);
                }
                
                // Store carousel instance
                carousels[carouselType] = {
                    updateCarousel,
                    startAutoplay,
                    stopAutoplay,
                    resetAutoplay
                };
                
                // Handle window resize
                let resizeTimeout;
                window.addEventListener('resize', () => {
                    clearTimeout(resizeTimeout);
                    resizeTimeout = setTimeout(() => {
                        currentIndex = 0; // Reset to first slide on resize
                        updateCarousel();
                    }, 250);
                });
                
                // Initialize
                updateCarousel();
                if (tabContent.classList.contains('active')) {
                    startAutoplay();
                }
            }
            
            // Initialize only the new products carousel
            initCarousel('new');
        }
        
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFrameCarouselTabs);
        } else {
            initFrameCarouselTabs();
        }
    })();
    </script>
    
    <?php
    return ob_get_clean();
}
add_shortcode('frame_carousel_tabs', 'frame_carousel_tabs_shortcode');

/**
 * Frame Carousel Blog Posts - Blog Posts Carousel
 * Usage: [frame_carousel_blog posts_per_page="10"]
 */
function frame_carousel_blog_shortcode($atts) {
    // Parse shortcode attributes
    $atts = shortcode_atts(array(
        'posts_per_page' => '10',
        'autoplay' => 'true',
        'autoplay_delay' => '4000',
        'category' => '', // Blog category slug
    ), $atts);
    
    // Query blog posts
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => intval($atts['posts_per_page']),
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    );
    
    // Add category filter if specified
    if (!empty($atts['category'])) {
        $args['category_name'] = $atts['category'];
    }
    
    $posts_query = new WP_Query($args);
    
    if (!$posts_query->have_posts()) {
        return '<p>' . __('No blog posts found.', 'kraftiart') . '</p>';
    }
    
    // Generate unique ID for this carousel instance
    $carousel_id = 'frame-carousel-blog-' . uniqid();
    
    ob_start();
    ?>
    
    <div class="frame-carousel-blog-wrapper <?php echo esc_attr($carousel_id); ?>" data-autoplay="<?php echo esc_attr($atts['autoplay']); ?>" data-delay="<?php echo esc_attr($atts['autoplay_delay']); ?>">
        <div class="frame-carousel-blog-track">
            <?php 
            while ($posts_query->have_posts()) : $posts_query->the_post();
                $post_id = get_the_ID();
                $featured_image = get_the_post_thumbnail_url($post_id, 'medium');
                $title = get_the_title();
                $excerpt = get_the_excerpt();
                $post_date = get_the_date('M d, Y');
                $author = get_the_author();
                $categories = get_the_category();
                $post_link = get_permalink();
                ?>
                    <div class="frame-slide-blog">
                        <a href="<?php echo esc_url($post_link); ?>" class="frame-slide-blog-content">
                            <?php if ($featured_image) : ?>
                                <div class="frame-slide-blog-image">
                                    <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($title); ?>">
                                    <div class="frame-blog-overlay"></div>
                                </div>
                            <?php endif; ?>
                            <div class="frame-slide-blog-info">
                                <?php if (!empty($categories)) : ?>
                                    <span class="frame-blog-category"><?php echo esc_html($categories[0]->name); ?></span>
                                <?php endif; ?>
                                <h3 class="frame-blog-title"><?php echo esc_html($title); ?></h3>
                                <?php if ($excerpt) : ?>
                                    <p class="frame-blog-excerpt"><?php echo wp_trim_words($excerpt, 15, '...'); ?></p>
                                <?php endif; ?>
                                <div class="frame-blog-meta">
                                    <span class="frame-blog-author">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <?php echo esc_html($author); ?>
                                    </span>
                                    <span class="frame-blog-date">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/>
                                            <line x1="16" y1="2" x2="16" y2="6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                            <line x1="8" y1="2" x2="8" y2="6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                            <line x1="3" y1="10" x2="21" y2="10" stroke="currentColor" stroke-width="2"/>
                                        </svg>
                                        <?php echo esc_html($post_date); ?>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
            <?php endwhile; 
            wp_reset_postdata();
            ?>
        </div>
        
        <button class="frame-carousel-blog-nav frame-carousel-blog-prev" aria-label="Previous slide">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <button class="frame-carousel-blog-nav frame-carousel-blog-next" aria-label="Next slide">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        
        <div class="frame-carousel-blog-dots"></div>
    </div>
    
    <style>
    /* Force visibility on all devices */
    .<?php echo esc_attr($carousel_id); ?> .frame-carousel-blog-nav {
        display: flex !important;
        visibility: visible !important;
        opacity: 1 !important;
        z-index: 9999 !important;
    }
    
    .frame-carousel-blog-wrapper {
        position: relative;
        width: 100%;
        max-width: 100%;
        overflow: hidden;
        padding: 0 16px 80px;
        margin: 0;
        background: transparent;
        isolation: isolate;
    }
    
    .frame-carousel-blog-track {
        display: flex;
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        width: 100%;
        align-items: stretch;
        position: relative;
        z-index: 1;
    }
    
    .frame-slide-blog {
        flex: 0 0 100%;
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
        display: flex;
    }
    
    .frame-slide-blog-content {
        background: linear-gradient(135deg, #f8f4f5 0%, #f3e5e8 100%);
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(114, 47, 55, 0.15), 0 4px 12px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        position: relative;
        width: 100%;
        display: flex;
        flex-direction: column;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid rgba(255, 255, 255, 0.8);
        height: 100%;
        z-index: 1;
        text-decoration: none;
        color: inherit;
    }
    
    .frame-slide-blog-content:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 50px rgba(114, 47, 55, 0.25), 0 6px 16px rgba(0, 0, 0, 0.12);
        border-color: #722f37;
    }
    
    .frame-slide-blog-content:active {
        transform: translateY(-4px) scale(0.98);
    }
    
    .frame-slide-blog-image {
        width: 100%;
        height: 240px;
        position: relative;
        overflow: hidden;
    }
    
    .frame-slide-blog-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .frame-slide-blog-content:hover .frame-slide-blog-image img {
        transform: scale(1.08);
    }
    
    .frame-blog-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.3) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .frame-slide-blog-content:hover .frame-blog-overlay {
        opacity: 1;
    }
    
    .frame-slide-blog-info {
        padding: 24px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        flex: 1;
    }
    
    .frame-blog-category {
        display: inline-block;
        background: linear-gradient(135deg, #722f37 0%, #8b3a45 100%);
        color: #fff;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 6px 14px;
        border-radius: 20px;
        align-self: flex-start;
        box-shadow: 0 2px 8px rgba(114, 47, 55, 0.3);
    }
    
    .frame-blog-title {
        margin: 0;
        font-size: 20px;
        font-weight: 700;
        color: #722f37;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        transition: color 0.3s ease;
    }
    
    .frame-slide-blog-content:hover .frame-blog-title {
        color: #8b3a45;
    }
    
    .frame-blog-excerpt {
        margin: 0;
        font-size: 14px;
        color: #666;
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .frame-blog-meta {
        display: flex;
        gap: 16px;
        align-items: center;
        margin-top: auto;
        padding-top: 12px;
        border-top: 1px solid rgba(114, 47, 55, 0.1);
        font-size: 13px;
        color: #888;
    }
    
    .frame-blog-author,
    .frame-blog-date {
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    .frame-blog-meta svg {
        opacity: 0.7;
    }
    
    .frame-carousel-blog-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 100 !important;
        padding: 0;
        display: flex !important;
        justify-content: center;
        align-items: center;
        border: none;
        width: 48px;
        height: 48px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 50%;
        background: linear-gradient(135deg, #722f37 0%, #8b3a45 100%);
        box-shadow: 0 6px 20px rgba(114, 47, 55, 0.35), 0 3px 10px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        outline: none;
        -webkit-tap-highlight-color: transparent;
        border: 2px solid rgba(255, 255, 255, 0.9);
        pointer-events: auto;
        visibility: visible !important;
        opacity: 1 !important;
    }
    
    .frame-carousel-blog-prev {
        left: 16px;
    }
    
    .frame-carousel-blog-next {
        right: 16px;
    }
    
    .frame-carousel-blog-nav:active {
        transform: translateY(-50%) scale(0.88);
        box-shadow: 0 4px 14px rgba(114, 47, 55, 0.4), 0 2px 8px rgba(0, 0, 0, 0.12);
    }
    
    .frame-carousel-blog-nav svg {
        width: 22px !important;
        height: 22px !important;
        color: #fff !important;
        filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.1)) !important;
        display: block !important;
    }
    
    .frame-carousel-blog-dots {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex !important;
        gap: 8px;
        z-index: 9999 !important;
        pointer-events: auto;
        visibility: visible !important;
    }
    
    .frame-carousel-blog-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: rgba(114, 47, 55, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        padding: 0;
    }
    
    .frame-carousel-blog-dot.active {
        width: 24px;
        border-radius: 4px;
        background: linear-gradient(135deg, #722f37, #8b3a45);
    }
    
    /* Desktop: 3 slides per view */
    @media (min-width: 768px) {
        .frame-carousel-blog-track {
            gap: 20px;
            min-height: 480px;
        }
        
        .frame-slide-blog {
            flex: 0 0 calc((100% - 40px) / 3);
            width: calc((100% - 40px) / 3);
            max-width: calc((100% - 40px) / 3);
            min-height: 480px;
        }
        
        .frame-carousel-blog-wrapper {
            padding: 0 60px 80px;
        }
        
        .frame-slide-blog-image {
            height: 200px;
        }
        
        .frame-blog-title {
            font-size: 18px;
        }
        
        .frame-slide-blog-info {
            padding: 20px;
        }
    }
    
    /* Large desktop */
    @media (min-width: 1024px) {
        .frame-slide-blog-image {
            height: 220px;
        }
        
        .frame-blog-title {
            font-size: 19px;
        }
    }
    
    /* Mobile optimizations */
    @media (max-width: 767px) {
        .frame-carousel-blog-nav {
            width: 40px !important;
            height: 40px !important;
            box-shadow: 0 4px 16px rgba(114, 47, 55, 0.3), 0 2px 8px rgba(0, 0, 0, 0.1) !important;
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        .frame-carousel-blog-prev {
            left: 8px !important;
        }
        
        .frame-carousel-blog-next {
            right: 8px !important;
        }
        
        .frame-carousel-blog-nav svg {
            width: 18px !important;
            height: 18px !important;
        }
        
        .frame-carousel-blog-wrapper {
            padding: 0 16px 70px;
        }
        
        .frame-carousel-blog-track {
            min-height: 440px;
        }
        
        .frame-slide-blog {
            min-height: 440px;
        }
        
        .frame-slide-blog-content {
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(114, 47, 55, 0.18), 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .frame-slide-blog-image {
            height: 220px;
        }
        
        .frame-slide-blog-info {
            padding: 20px;
        }
        
        .frame-blog-title {
            font-size: 18px;
        }
        
        .frame-blog-excerpt {
            font-size: 13px;
        }
        
        .frame-carousel-blog-dots {
            bottom: 30px;
        }
        
        .frame-carousel-blog-dot {
            width: 10px;
            height: 10px;
        }
        
        .frame-carousel-blog-dot.active {
            width: 28px;
        }
    }
    
    /* Extra small mobile devices */
    @media (max-width: 374px) {
        .frame-carousel-blog-wrapper {
            padding: 0 12px 70px;
        }
        
        .frame-carousel-blog-track {
            min-height: 420px;
        }
        
        .frame-slide-blog {
            min-height: 420px;
        }
        
        .frame-slide-blog-image {
            height: 200px;
        }
        
        .frame-carousel-blog-nav {
            width: 36px !important;
            height: 36px !important;
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        .frame-carousel-blog-prev {
            left: 4px !important;
        }
        
        .frame-carousel-blog-next {
            right: 4px !important;
        }
        
        .frame-carousel-blog-nav svg {
            width: 16px !important;
            height: 16px !important;
        }
        
        .frame-blog-title {
            font-size: 17px;
        }
        
        .frame-slide-blog-info {
            padding: 18px;
        }
    }
    </style>
    
    <script>
    (function() {
        function initFrameCarouselBlog() {
            const wrapper = document.querySelector('.<?php echo esc_js($carousel_id); ?>');
            if (!wrapper) return;
            
            const track = wrapper.querySelector('.frame-carousel-blog-track');
            const slides = Array.from(track.querySelectorAll('.frame-slide-blog'));
            const prevBtn = wrapper.querySelector('.frame-carousel-blog-prev');
            const nextBtn = wrapper.querySelector('.frame-carousel-blog-next');
            const dotsContainer = wrapper.querySelector('.frame-carousel-blog-dots');
            
            if (!track || slides.length === 0) return;
            
            let currentIndex = 0;
            let autoplayInterval = null;
            let touchStartX = 0;
            let touchEndX = 0;
            
            // Create dots
            slides.forEach((_, index) => {
                const dot = document.createElement('button');
                dot.className = 'frame-carousel-blog-dot';
                dot.setAttribute('aria-label', 'Go to slide ' + (index + 1));
                if (index === 0) dot.classList.add('active');
                dot.addEventListener('click', () => goToSlide(index));
                dotsContainer.appendChild(dot);
            });
            
            const dots = Array.from(dotsContainer.querySelectorAll('.frame-carousel-blog-dot'));
            
            function updateCarousel() {
                const isDesktop = window.innerWidth >= 768;
                const slidesToShow = isDesktop ? 3 : 1;
                const slideWidth = isDesktop ? (100 / slidesToShow) : 100;
                const gap = isDesktop ? (20 / slides.length) : 0;
                const offset = -currentIndex * (slideWidth + gap);
                
                track.style.transform = `translateX(${offset}%)`;
                
                // Update dots
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            }
            
            function goToSlide(index) {
                currentIndex = index;
                updateCarousel();
                resetAutoplay();
            }
            
            function nextSlide() {
                const isDesktop = window.innerWidth >= 768;
                const slidesToShow = isDesktop ? 3 : 1;
                const maxIndex = Math.max(0, slides.length - slidesToShow);
                
                if (isDesktop && slides.length > slidesToShow) {
                    // Infinite loop on desktop
                    currentIndex = currentIndex + 1;
                    if (currentIndex > maxIndex) {
                        currentIndex = 0;
                    }
                } else {
                    currentIndex = (currentIndex + 1) % slides.length;
                }
                updateCarousel();
            }
            
            function prevSlide() {
                const isDesktop = window.innerWidth >= 768;
                const slidesToShow = isDesktop ? 3 : 1;
                const maxIndex = Math.max(0, slides.length - slidesToShow);
                
                if (isDesktop && slides.length > slidesToShow) {
                    // Infinite loop on desktop
                    currentIndex = currentIndex - 1;
                    if (currentIndex < 0) {
                        currentIndex = maxIndex;
                    }
                } else {
                    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                }
                updateCarousel();
            }
            
            function startAutoplay() {
                const autoplay = wrapper.getAttribute('data-autoplay') === 'true';
                const delay = parseInt(wrapper.getAttribute('data-delay')) || 4000;
                
                if (autoplay) {
                    autoplayInterval = setInterval(nextSlide, delay);
                }
            }
            
            function stopAutoplay() {
                if (autoplayInterval) {
                    clearInterval(autoplayInterval);
                    autoplayInterval = null;
                }
            }
            
            function resetAutoplay() {
                stopAutoplay();
                startAutoplay();
            }
            
            // Touch events
            track.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
                stopAutoplay();
            }, { passive: true });
            
            track.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
                startAutoplay();
            }, { passive: true });
            
            function handleSwipe() {
                const swipeThreshold = 50;
                const diff = touchStartX - touchEndX;
                
                if (Math.abs(diff) > swipeThreshold) {
                    if (diff > 0) {
                        nextSlide();
                    } else {
                        prevSlide();
                    }
                }
            }
            
            // Button events
            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    nextSlide();
                    resetAutoplay();
                });
            }
            
            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    prevSlide();
                    resetAutoplay();
                });
            }
            
            // Keyboard navigation
            wrapper.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    prevSlide();
                    resetAutoplay();
                } else if (e.key === 'ArrowRight') {
                    nextSlide();
                    resetAutoplay();
                }
            });
            
            // Pause on hover (desktop only)
            if (window.innerWidth >= 768) {
                wrapper.addEventListener('mouseenter', stopAutoplay);
                wrapper.addEventListener('mouseleave', startAutoplay);
            }
            
            // Handle window resize
            let resizeTimeout;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(() => {
                    currentIndex = 0;
                    updateCarousel();
                }, 250);
            });
            
            // Initialize
            updateCarousel();
            startAutoplay();
        }
        
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFrameCarouselBlog);
        } else {
            initFrameCarouselBlog();
        }
    })();
    </script>
    
    <?php
    return ob_get_clean();
}
add_shortcode('frame_carousel_blog', 'frame_carousel_blog_shortcode');