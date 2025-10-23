<?php
/**
 * kraftiart Header Social Media
 *
 * @package kraftiart
 * @subpackage kraftiart
 * @since kraftiart 1.0
 */

/**
 * Header Social Media
 */
$kraftiart_options= get_option( 'kraftiart_options' );
$data      = $kraftiart_options['info-social'];
?>
<li class="header-social-media">
	<ul>
		<?php
		foreach ( $data as $key => $value ) {
			$a = 1;
			if ( $a < 9 ) {
				if ( $value ) {
					echo '<li class="d-inline media-box"><a href="' . $value . '" target="_blank"><i class="fab fa-' . $key . '"></i></a></li>';
				}
				$a++;
			}
		}
		?>
	</ul>
</li>
