<?php
/**
 * Header.
 *
 * Construct the theme header.
 *
 * @package Potter
 * @subpackage Template Parts
 */
defined( 'ABSPATH' ) || die( "Can't access directly" );
?>
<?php
	$menu_position             = get_theme_mod( 'menu_position', 'menu-left' );
 ?>
<header id="header" class="potter-page-header <?php potter_transparent_header_class(); ?> <?php echo esc_attr($menu_position); ?>" itemscope="itemscope" itemtype="https://schema.org/WPHeader">

	<?php do_action( 'potter_header_open' ); ?>

	<?php do_action( 'potter_pre_header' ); ?>
<?php
	$sticky_navbar             = get_theme_mod( 'sticky_navbar' );
 ?>
	<div id="<?php if ( $sticky_navbar  ) { echo 'main-navbar'; } ?>" class="potter-navigation">

		<?php do_action( 'potter_before_main_navigation' ); ?>

		<?php get_template_part( 'inc/template-parts/navigation/' . potter_menu() ); ?>

		<?php get_template_part( 'inc/template-parts/navigation/' . potter_mobile_menu() ); ?>

		<?php do_action( 'potter_after_main_navigation' ); ?>

	</div>

	<?php do_action( 'potter_header_close' ); ?>

</header>
