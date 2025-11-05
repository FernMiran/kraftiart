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