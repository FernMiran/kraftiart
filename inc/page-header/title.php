<?php
/**
 * Page Header Title
 *
 * @package kraftiart
 * @subpackage kraftiart
 * @since kraftiart 1.0
 */

/**
 * Page Header Title Function
 */
function kraftiart_page_header_title() {

	$kraftiart_options= get_option( 'kraftiart_redux' );

	if ( is_archive() ) {
		?>
		<h1 class="title"><?php the_archive_title(); ?></h1>
		<?php
	} elseif ( is_search() ) {
		if ( have_posts() ) :
			?>
			<h1 class="title"><?php printf( esc_html__( 'Search Results for: %s', 'kraftiart' ), '<span>' . get_search_query() . '</span>' ); ?></span></h1>

		<?php else : ?>
			<h1 class="title"><?php esc_html_e( 'Nothing Found', 'kraftiart' ); ?></h1>

			<?php
		endif;
	} elseif ( is_404() ) {

		if ( isset( $kraftiart_options['404_title'] ) ) {
			?>
			<h2 class="title">
				<?php
				$title = $kraftiart_options['404_title'];
				echo esc_html( $title );
				?>
			</h2>
			<?php
		} else {
			?>
			<h2 class="title"><?php esc_html_e( 'Oops! That page can not be found.', 'kraftiart' ); ?></h2>
			<?php
		}
	} elseif ( is_home() ) {
		?>
		<h1 class="title"><?php esc_html_e( 'Blog', 'kraftiart' ); ?></h1>
		<?php
	} else {
		if( ! empty( get_the_title() ) ){ ?>
		<h1 class="title"><?php echo get_the_title(); ?></h1>
		<?php }
	}
}
