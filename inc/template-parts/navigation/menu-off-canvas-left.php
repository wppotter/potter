<?php
/**
 * Off canvas menu left.
 *
 * @package Potter
 * @subpackage Template Parts
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );



?>

<div class="potter-container potter-container-center potter-visible-large potter-nav-wrapper potter-menu-left">

	<div class="potter-grid potter-grid-collapse">

		<div class="potter-3-4 potter-menu-container">

			<div class="potter-menu-toggle-container">

				<?php do_action( 'potter_before_menu_toggle' ); ?>

				<button id="potter-menu-toggle" class="potter-nav-item potter-menu-toggle potterf potterf-hamburger" aria-label="<?php _e( 'Site Navigation', 'potter' ); ?>" aria-controls="navigation" aria-expanded="false" aria-haspopup="true">
					<span class="screen-reader-text"><?php _e( 'Menu Toggle', 'potter' ); ?></span>
				</button>

				<?php do_action( 'potter_after_menu_toggle' ); ?>

			</div>

		</div>

		<div class="potter-1-4 potter-logo-container">

			<?php get_template_part( 'inc/template-parts/logo/logo' ); ?>

		</div>

	</div>

</div>

<div class="potter-menu-off-canvas potter-menu-off-canvas-left potter-visible-large">

	<?php do_action( 'potter_before_main_menu' ); ?>

	<nav id="navigation" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement" aria-labelledby="potter-menu-toggle">

		<?php do_action( 'potter_main_menu_open' ); ?>

		<?php do_action( 'potter_main_menu' ); ?>

		<?php do_action( 'potter_main_menu_close' ); ?>

	</nav>

	<?php do_action( 'potter_after_main_menu' ); ?>

	<i class="potter-close potterf potterf-times" aria-hidden="true"></i>

</div>
