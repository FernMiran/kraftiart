<?php
/**
 * One Click Demo
 *
 * @package kraftiart
 * @subpackage kraftiart
 * @since kraftiart 1.0
 */

/**
 * One Click Demo Import Array
 */
function kraftiart_import_files() {
	return array(
		array(
			'import_file_name'             => esc_html__( 'Demo 1', 'kraftiart' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-01/kraftiart.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-01/kraftiart-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-01/kraftiart-export.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-01/kraftiart_options.json',
					'option_name' => 'kraftiart_options',
				),
			),
			'import_preview_image_url'     => get_template_directory_uri() . '/inc/demo/demo-01/demo-01.jpg',
			'preview_url'                  => 'https://wordpress.templatetrip.com/WCMTM01/WCMTM020_kraftiart/',
		),
		array(
			'import_file_name'             => esc_html__( 'Demo 2', 'kraftiart' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-02/kraftiart.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-02/kraftiart-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-02/kraftiart-export.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-02/kraftiart_options.json',
					'option_name' => 'kraftiart_options',
				),
			),
			'import_preview_image_url'     => get_template_directory_uri() . '/inc/demo/demo-02/demo-02.jpg',
			'preview_url'                  => 'https://wordpress.templatetrip.com/WCMTM01/WCMTM029_kraftiart/home-page-02/?header_style=2&footer_style=2',
		),
		array(
			'import_file_name'             => esc_html__( 'Demo 3', 'kraftiart' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-03/kraftiart.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-03/kraftiart-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-03/kraftiart-export.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-03/kraftiart_options.json',
					'option_name' => 'kraftiart_options',
				),
			),
			'import_preview_image_url'     => get_template_directory_uri() . '/inc/demo/demo-03/demo-03.jpg',
			'preview_url'                  => 'https://wordpress.templatetrip.com/WCMTM01/WCMTM029_kraftiart/home-page-03/?header_style=3',
		),
		array(
			'import_file_name'             => esc_html__( 'Demo 4', 'kraftiart' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-04/kraftiart.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-04/kraftiart-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-04/kraftiart-export.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-04/kraftiart_options.json',
					'option_name' => 'kraftiart_options',
				),
			),
			'import_preview_image_url'     => get_template_directory_uri() . '/inc/demo/demo-04/demo-04.jpg',
			'preview_url'                  => 'https://wordpress.templatetrip.com/WCMTM01/WCMTM029_kraftiart/home-page-04/?header_style=4&footer_style=2',
		),
		array(
			'import_file_name'             => esc_html__( 'Demo 5', 'kraftiart' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-05/kraftiart.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-05/kraftiart-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-05/kraftiart-export.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-05/kraftiart_options.json',
					'option_name' => 'kraftiart_options',
				),
			),
			'import_preview_image_url'     => get_template_directory_uri() . '/inc/demo/demo-05/demo-05.jpg',
			'preview_url'                  => 'https://wordpress.templatetrip.com/WCMTM01/WCMTM029_kraftiart/home-page-05/?header_style=5',
		),
		array(
			'import_file_name'             => esc_html__( 'Demo 6', 'kraftiart' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-06/kraftiart.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-06/kraftiart-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-06/kraftiart-export.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-06/kraftiart_options.json',
					'option_name' => 'kraftiart_options',
				),
			),
			'import_preview_image_url'     => get_template_directory_uri() . '/inc/demo/demo-06/demo-06.jpg',
			'preview_url'                  => 'https://wordpress.templatetrip.com/WCMTM01/WCMTM029_kraftiart/kraftiart02/home-page-06/',
		),
		array(
			'import_file_name'             => esc_html__( 'Demo 7', 'kraftiart' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-07/kraftiart.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-07/kraftiart-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-07/kraftiart-export.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-07/kraftiart_options.json',
					'option_name' => 'kraftiart_options',
				),
			),
			'import_preview_image_url'     => get_template_directory_uri() . '/inc/demo/demo-07/demo-07.jpg',
			'preview_url'                  => 'https://wordpress.templatetrip.com/WCMTM01/WCMTM029_kraftiart/home-page-07/?header_style=7&footer_style=2',
		),
		array(
			'import_file_name'             => esc_html__( 'Demo 8', 'kraftiart' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-08/kraftiart.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-08/kraftiart-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-08/kraftiart-export.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-08/kraftiart_options.json',
					'option_name' => 'kraftiart_options',
				),
			),
			'import_preview_image_url'     => get_template_directory_uri() . '/inc/demo/demo-08/demo-08.jpg',
			'preview_url'                  => 'https://wordpress.templatetrip.com/WCMTM01/WCMTM029_kraftiart/kraftiart02/?header_style=2&footer_style=2',
		),
		array(
			'import_file_name'             => esc_html__( 'Demo 9', 'kraftiart' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-09/kraftiart.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-09/kraftiart-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-09/kraftiart-export.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-09/kraftiart_options.json',
					'option_name' => 'kraftiart_options',
				),
			),
			'import_preview_image_url'     => get_template_directory_uri() . '/inc/demo/demo-09/demo-09.jpg',
			'preview_url'                  => 'https://wordpress.templatetrip.com/WCMTM01/WCMTM029_kraftiart/kraftiart02/home-page-09/',
		),
		array(
			'import_file_name'             => esc_html__( 'Demo 10', 'kraftiart' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-10/kraftiart.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-10/kraftiart-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-10/kraftiart-export.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-10/kraftiart_options.json',
					'option_name' => 'kraftiart_options',
				),
			),
			'import_preview_image_url'     => get_template_directory_uri() . '/inc/demo/demo-10/demo-10.jpg',
			'preview_url'                  => 'https://wordpress.templatetrip.com/WCMTM01/WCMTM029_kraftiart/kraftiart02/home-page-10/?header_style=7&footer_style=2',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'kraftiart_import_files' );

if ( ! function_exists( 'kraftiart_after_import' ) ) :

	$args = array(
		'post_type'   => 'elementor_library',
		'meta_query'  => array(
			array(
				'key'   => '_elementor_template_type',
				'value' => 'kit',
			),
		),
	);
	
	$query = get_posts( $args );
	
	if ( ! empty( $query ) && isset( $query[1] ) && isset( $query[1]->ID ) ) {
		update_option( 'elementor_active_kit', $query[1]->ID );
	}


	/**
	 * Menu Setting
	 *
	 * @param array $selected_import .
	 */
	function kraftiart_after_import( $selected_import ) {

		// Assign menus to their locations.
		$locations = get_theme_mod( 'nav_menu_locations' ); // registered menu locations in theme
		$menus     = wp_get_nav_menus(); // registered menus

		if ( $menus ) {
			foreach ( $menus as $menu ) { // assign menus to theme locations

				if ( $menu->name == 'Main Menu' ) {
					$locations['header-menu'] = $menu->term_id;
				}

				if ( $menu->name == 'Humbarger Menu' ) {
					$locations['hamburger-menu'] = $menu->term_id;
				}

				if ( $menu->name == 'Information' ) {
					$locations['footer-menu'] = $menu->term_id;
				}
			}
		}
		set_theme_mod( 'nav_menu_locations', $locations );

		if ( 'Demo 1' === $selected_import['import_file_name'] ) {

			// Assign front page and posts page (blog page).
			$front_page_id = get_page_by_title( 'Home' );
			$blog_page_id  = get_page_by_title( 'Blog' );

			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_page_id->ID );
			update_option( 'page_for_posts', $blog_page_id->ID );

			// Import Revolution Slider.
			if ( class_exists( 'RevSlider' ) ) {
				$slider_array = array(
					get_template_directory() . '/inc/demo/demo-01/slider-01.zip',
				);

				$slider = new RevSlider();

				foreach ( $slider_array as $filepath ) {
					$slider->importSliderFromPost( true, true, $filepath );
				}
			}
		} elseif ( 'Demo 2' === $selected_import['import_file_name'] ) {

			// Assign front page and posts page (blog page).
			$front_page_id = get_page_by_title( 'Home page 02' );
			$blog_page_id  = get_page_by_title( 'Blog' );

			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_page_id->ID );
			update_option( 'page_for_posts', $blog_page_id->ID );

			// Import Revolution Slider.
			if ( class_exists( 'RevSlider' ) ) {
				$slider_array = array(
					get_template_directory() . '/inc/demo/demo-02/slider-02.zip',
				);

				$slider = new RevSlider();

				foreach ( $slider_array as $filepath ) {
					$slider->importSliderFromPost( true, true, $filepath );
				}
			}
		}elseif ( 'Demo 3' === $selected_import['import_file_name'] ) {

			// Assign front page and posts page (blog page).
			$front_page_id = get_page_by_title( 'Home page 03' );
			$blog_page_id  = get_page_by_title( 'Blog' );

			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_page_id->ID );
			update_option( 'page_for_posts', $blog_page_id->ID );

			// Import Revolution Slider.
			if ( class_exists( 'RevSlider' ) ) {
				$slider_array = array(
					get_template_directory() . '/inc/demo/demo-03/slider-03.zip',
				);

				$slider = new RevSlider();

				foreach ( $slider_array as $filepath ) {
					$slider->importSliderFromPost( true, true, $filepath );
				}
			}
		}elseif ( 'Demo 4' === $selected_import['import_file_name'] ) {

			// Assign front page and posts page (blog page).
			$front_page_id = get_page_by_title( 'Home page 04' );
			$blog_page_id  = get_page_by_title( 'Blog' );

			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_page_id->ID );
			update_option( 'page_for_posts', $blog_page_id->ID );

			// Import Revolution Slider.
			if ( class_exists( 'RevSlider' ) ) {
				$slider_array = array(
					get_template_directory() . '/inc/demo/demo-04/slider-04.zip',
				);

				$slider = new RevSlider();

				foreach ( $slider_array as $filepath ) {
					$slider->importSliderFromPost( true, true, $filepath );
				}
			}
		}elseif ( 'Demo 5' === $selected_import['import_file_name'] ) {

			// Assign front page and posts page (blog page).
			$front_page_id = get_page_by_title( 'Home page 05' );
			$blog_page_id  = get_page_by_title( 'Blog' );

			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_page_id->ID );
			update_option( 'page_for_posts', $blog_page_id->ID );

			// Import Revolution Slider.
			if ( class_exists( 'RevSlider' ) ) {
				$slider_array = array(
					get_template_directory() . '/inc/demo/demo-05/slider-05.zip',
				);

				$slider = new RevSlider();

				foreach ( $slider_array as $filepath ) {
					$slider->importSliderFromPost( true, true, $filepath );
				}
			}
		}elseif ( 'Demo 6' === $selected_import['import_file_name'] ) {

			// Assign front page and posts page (blog page).
			$front_page_id = get_page_by_title( 'Home page 06' );
			$blog_page_id  = get_page_by_title( 'Blog' );

			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_page_id->ID );
			update_option( 'page_for_posts', $blog_page_id->ID );

			// Import Revolution Slider.
			if ( class_exists( 'RevSlider' ) ) {
				$slider_array = array(
					get_template_directory() . '/inc/demo/demo-06/slider-06.zip',
				);

				$slider = new RevSlider();

				foreach ( $slider_array as $filepath ) {
					$slider->importSliderFromPost( true, true, $filepath );
				}
			}
		}elseif ( 'Demo 7' === $selected_import['import_file_name'] ) {

			// Assign front page and posts page (blog page).
			$front_page_id = get_page_by_title( 'Home page 07' );
			$blog_page_id  = get_page_by_title( 'Blog' );

			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_page_id->ID );
			update_option( 'page_for_posts', $blog_page_id->ID );

			// Import Revolution Slider.
			if ( class_exists( 'RevSlider' ) ) {
				$slider_array = array(
					get_template_directory() . '/inc/demo/demo-07/slider-07.zip',
				);

				$slider = new RevSlider();

				foreach ( $slider_array as $filepath ) {
					$slider->importSliderFromPost( true, true, $filepath );
				}
			}
		}elseif ( 'Demo 8' === $selected_import['import_file_name'] ) {

			// Assign front page and posts page (blog page).
			$front_page_id = get_page_by_title( 'Home page 08' );
			$blog_page_id  = get_page_by_title( 'Blog' );

			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_page_id->ID );
			update_option( 'page_for_posts', $blog_page_id->ID );

			// Import Revolution Slider.
			if ( class_exists( 'RevSlider' ) ) {
				$slider_array = array(
					get_template_directory() . '/inc/demo/demo-08/slider-08.zip',
				);

				$slider = new RevSlider();

				foreach ( $slider_array as $filepath ) {
					$slider->importSliderFromPost( true, true, $filepath );
				}
			}
		}elseif ( 'Demo 9' === $selected_import['import_file_name'] ) {

			// Assign front page and posts page (blog page).
			$front_page_id = get_page_by_title( 'Home page 09' );
			$blog_page_id  = get_page_by_title( 'Blog' );

			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_page_id->ID );
			update_option( 'page_for_posts', $blog_page_id->ID );
		}elseif ( 'Demo 10' === $selected_import['import_file_name'] ) {

			// Assign front page and posts page (blog page).	
			$front_page_id = get_page_by_title( 'Home page 10' );
			$blog_page_id  = get_page_by_title( 'Blog' );

			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_page_id->ID );
			update_option( 'page_for_posts', $blog_page_id->ID );

			// Import Revolution Slider.
			if ( class_exists( 'RevSlider' ) ) {
				$slider_array = array(
					get_template_directory() . '/inc/demo/demo-10/slider-10.zip',
				);

				$slider = new RevSlider();

				foreach ( $slider_array as $filepath ) {
					$slider->importSliderFromPost( true, true, $filepath );
				}
			}
		}
		// remove default post
		wp_delete_post( 1 );

	}
	add_action( 'pt-ocdi/after_import', 'kraftiart_after_import' );
endif;

