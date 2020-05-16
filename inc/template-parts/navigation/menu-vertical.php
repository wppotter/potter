<?php
/**
 * Right menu.
 *
 * @package Potter
 * @subpackage Template Parts
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

?>

<div class="potter-visible-large potter-nav-wrapper potter-menu-vertical">

	<div class="menu-vertical-container">

		<div class="potter-logo-container">

			<?php get_template_part( 'inc/template-parts/logo/logo' ); ?>

		</div>

		<div class="potter-menu-container">

			<?php do_action( 'potter_before_main_menu' ); ?>

			<nav id="navigation" class="potter-clearfix" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement" aria-label="<?php esc_attr_e( 'Site Navigation', 'potter' ); ?>">

				<?php do_action( 'potter_main_menu_open' ); ?>

				<?php do_action( 'potter_main_menu' ); ?>

				<?php do_action( 'potter_main_menu_close' ); ?>

			</nav>

			<?php do_action( 'potter_after_main_menu' ); ?>

		</div>

	</div>

</div>
