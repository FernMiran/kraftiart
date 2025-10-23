<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kraftiart
 */

?>

<style>
    .autora{
        text-align: left;
        margin-top: 20px;
        
    }
    
    .autora_sec {
    line-height: 0.6;
    margin-bottom: 40px;
}
</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="tt-post-wrapper">
		<?php
		if ( is_single() ) :
			?>
			<div class="tt-post-meta-wrap float-start w-100">
				<div class="tt-post-category float-start cursor-pointer">
					<?php
					$categories = get_the_category();
					if ( ! empty( $categories ) ) {
						foreach ( $categories as $cat ) {
							echo '<a href="' . esc_url( get_category_link( $cat->cat_ID ) ) . '" class="position-relative d-inline-block">' . esc_html( $cat->name ) . '</a>';
						}
					}
					?>
				</div>
				
				<div class="tt-post-comment float-start cursor-pointer">
				    <div class="tt-post-date float-start cursor-pointer">
        <span><?php echo get_the_date(); ?></span>
    </div>
					<a href="<?php echo get_comments_link( $post->ID ); ?>">
						<span><?php echo kraftiart_get_comments_number_text(); ?></span>
					</a>
				</div>
			</div>
		<?php endif;
		if ( has_post_thumbnail() ) { ?>
			<div class="tt-post-thumbnail position-relative text-center">
				<?php the_post_thumbnail(); ?>
			</div>
			<div class="tt-post-title float-start w-100">
				<?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			</div>
		<?php } ?>
		<div class="tt-post-details float-start w-100">
			<?php
			if ( 'post' === get_post_type() &&  ! is_single() ){
				?>
				<div class="tt-post-meta-wrap float-start w-100">
					<?php
					if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
						$kraftiart_options = get_option( 'kraftiart_options' );
						if( $kraftiart_options['opt-author']['1'] == 1 ){ ?>
							<div class="tt-post-category float-start cursor-pointer">
								<?php
								$categories = get_the_category();
								if ( ! empty( $categories ) ) {
									foreach ( $categories as $cat ) {
										echo '<a href="' . esc_url( get_category_link( $cat->cat_ID ) ) . '" class="position-relative d-inline-block">' . esc_html( $cat->name ) . '</a>';
									}
								}
								?>
							</div>
						<?php }
						if( $kraftiart_options['opt-author']['2'] == 1 ){ ?>
							<div class="tt-post-author float-start cursor-pointer">
								<?php echo  kraftiart_posted_by(); ?>
							</div>
						<?php }
						if( $kraftiart_options['opt-author']['3'] == 1 ){ ?>
							<div class="tt-post-comment float-start cursor-pointer">
								<a href="<?php echo get_comments_link( $post->ID ); ?>">
									<span><?php echo kraftiart_get_comments_number_text(); ?></span>
								</a>
							</div>
						<?php }
					} else{ ?>
						<div class="tt-post-category float-start cursor-pointer">
							<?php
							$categories = get_the_category();
							if ( ! empty( $categories ) ) {
								foreach ( $categories as $cat ) {
									echo '<a href="' . esc_url( get_category_link( $cat->cat_ID ) ) . '" class="position-relative d-inline-block">' . esc_html( $cat->name ) . '</a>';
								}
							}
							?>
						</div>

						<div class="tt-post-author float-start cursor-pointer">
							<?php echo  kraftiart_posted_by(); ?>
						</div>
						
						<div class="tt-post-comment float-start cursor-pointer">
							<a href="<?php echo get_comments_link( $post->ID ); ?>">
								<span><?php echo kraftiart_get_comments_number_text(); ?></span>
							</a>
						</div>

					<?php } ?>
				</div>
			<?php }
			if( ! empty( get_the_content() ) ){ ?>
				<div class="tt-post-content float-start w-100">
					<?php
					if( is_single() ){
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kraftiart' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							)
						);
					}else{
						the_excerpt();
					}
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kraftiart' ),
							'after'  => '</div>',
						)
					);
					?>
				</div>
			<?php }
			if ( ! is_single() ) { ?>
				<div class="more-comment-wrap float-start w-100 d-none">
					<div class="tt-post-more float-start">
						<a href="<?php the_permalink(); ?>" class="position-relative"><?php esc_html_e('Read More','kraftiart'); ?></a>
					</div>
				</div>
			<?php } ?>
			
<?php if (is_single()) : ?>
    <div class="author-image-wrapper autora" >
        <img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="<?php echo get_the_author(); ?>" style="border-radius: 50%; width: 50px; height: 50px; object-fit: cover;">
        <p style="margin-top: 10px;"><?php echo get_the_author(); ?></p>
        <!-- Campos personalizados del post -->
        <div class="autora_sec">
            <p><?php the_field('titulo'); ?></p>
        <p><?php the_field('cargo'); ?></p>
        <?php
        // Obtener el número de WhatsApp del campo ACF
        $numero_whatsapp = get_field('whatsapp');
        // Si existe el número, mostrarlo como un enlace
        if (!empty($numero_whatsapp)) : ?>
            <p style="margin-bottom: 6px;"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-whatsapp" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#666666" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
  <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
</svg> <?php echo esc_html($numero_whatsapp); ?></a></p>
        <?php endif; ?>
        <!-- Asumiendo que 'whatsapp' es el nombre del campo y almacena el número completo -->
        <p style="margin-bottom: 6px;"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail-filled" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#682145" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M22 7.535v9.465a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-9.465l9.445 6.297l.116 .066a1 1 0 0 0 .878 0l.116 -.066l9.445 -6.297z" stroke-width="0" fill="currentColor" />
  <path d="M19 4c1.08 0 2.027 .57 2.555 1.427l-9.555 6.37l-9.555 -6.37a2.999 2.999 0 0 1 2.354 -1.42l.201 -.007h14z" stroke-width="0" fill="currentColor" />
</svg> 
    contacto@raquelcheja.com
</p>
        </div>
    </div>
<?php endif; ?>




		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
