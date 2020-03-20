<?php
/**
 * Stacked menu.
 *
 * @package Potter
 * @subpackage Template Parts
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

?>

<div class="potter-container potter-container-center potter-visible-large potter-nav-wrapper potter-menu-stacked">

<?php get_template_part( 'inc/template-parts/logo/logo' ); ?>

	<?php do_action( 'potter_before_main_menu' ); ?>

	<nav id="navigation" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement" aria-label="<?php esc_attr_e( 'Site Navigation', 'potter' ); ?>">

		<?php do_action( 'potter_main_menu_open' ); ?>

		<?php do_action( 'potter_main_menu' ); ?>

		<?php do_action( 'potter_main_menu_close' ); ?>

	</nav>

	<?php do_action( 'potter_after_main_menu' ); ?>

</div>
