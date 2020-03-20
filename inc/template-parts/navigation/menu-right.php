<?php
/**
 * Right menu.
 *
 * @package Potter
 * @subpackage Template Parts
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

?>

<div class="potter-container potter-container-center potter-visible-large potter-nav-wrapper potter-menu-right">

	<div class="potter-grid potter-grid-collapse">

		<div class="potter-1-4 potter-logo-container">

			<?php get_template_part( 'inc/template-parts/logo/logo' ); ?>

		</div>

		<div class="potter-3-4 potter-menu-container">

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
