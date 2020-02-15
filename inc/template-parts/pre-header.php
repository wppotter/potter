<?php
/**
 * Pre header.
 *
 * @package Potter
 * @subpackage Template Parts
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

$pre_header_layout            = get_theme_mod( 'pre_header_layout' );
$layout                       = 'one' === $pre_header_layout ? ' potter-pre-header-one-column' : ' potter-pre-header-two-columns';
$inner_layout                 = 'one' === $pre_header_layout ? 'potter-inner-pre-header-content' : 'potter-inner-pre-header-left';
$pre_header_hook_open         = 'one' === $pre_header_layout ? 'potter_pre_header_open' : 'potter_pre_header_left_open';
$pre_header_hook_close        = 'one' === $pre_header_layout ? 'potter_pre_header_close' : 'potter_pre_header_left_close';
$pre_header_column_one        = get_theme_mod( 'pre_header_column_one', __( 'Column 1', 'potter' ) );
$pre_header_column_two        = get_theme_mod( 'pre_header_column_two', __( 'Column 2', 'potter' ) );
$pre_header_column_one_layout = get_theme_mod( 'pre_header_column_one_layout', 'text' );
$pre_header_column_two_layout = get_theme_mod( 'pre_header_column_two_layout', 'text' );




// Stop here if pre header is disabled or not set.
if ( ! $pre_header_layout || 'none' === $pre_header_layout ) {
	return;
}

?>

<div id="potter-pre-header" class="potter-pre-header">

	<?php do_action( 'potter_before_pre_header' ); ?>

	<div class="potter-inner-pre-header potter-container potter-container-center<?php echo esc_attr( $layout ); ?>">

		<div class="<?php echo esc_attr( $inner_layout ); ?>">

			<?php

			do_action( $pre_header_hook_open );

			if ( 'text' === $pre_header_column_one_layout ) {
				echo do_shortcode( $pre_header_column_one );

			} elseif ( 'menu' === $pre_header_column_one_layout ) {

				wp_nav_menu( array(
					'theme_location' => 'pre_header_menu',
					'container'      => false,
					'menu_class'     => 'potter-menu potter-sub-menu potter-visible-large' . potter_sub_menu_alignment() . potter_sub_menu_animation(),
					'depth'          => '2',
					'fallback_cb'    => 'potter_menu_fallback',
				) );

			} elseif ( 'iconlink' === $pre_header_column_one_layout ) {
				echo '<div class="icon-links left-column">';
				potter_icon_link();
				echo '</div>';
			}


			do_action( $pre_header_hook_close );

			?>

		</div>

		<?php if ( 'two' === $pre_header_layout ) { ?>

		<div class="potter-inner-pre-header-right">

			<?php

			do_action( 'potter_pre_header_right_open' );

			if ( 'text' === $pre_header_column_two_layout ) {

				echo do_shortcode( $pre_header_column_two );

			} elseif ( 'menu' === $pre_header_column_two_layout ) {

				wp_nav_menu( array(
					'theme_location' => 'pre_header_menu_right',
					'container'      => false,
					'menu_class'     => 'potter-menu potter-sub-menu potter-visible-large' . potter_sub_menu_alignment() . potter_sub_menu_animation(),
					'depth'          => '2',
					'fallback_cb'    => 'potter_menu_fallback',
				) );

			} elseif ( 'iconlink' === $pre_header_column_two_layout ) {
				echo '<div class="icon-links right-column">';
				potter_icon_link_coltwo();
				echo '</div>';
			}

			do_action( 'potter_pre_header_right_close' );

			?>

		</div>

		<?php } ?>

    </div>

    <?php do_action( 'potter_after_pre_header' ); ?>

</div>
