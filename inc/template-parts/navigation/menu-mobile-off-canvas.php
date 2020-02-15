<?php
/**
 * Off canvas mobile menu.
 *
 * @package Potter
 * @subpackage Template Parts
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );



?>

<div class="potter-mobile-menu-off-canvas potter-hidden-large">

	<div class="potter-mobile-nav-wrapper potter-container">

		<div class="potter-mobile-logo-container potter-2-3">

			<?php get_template_part( 'inc/template-parts/logo/logo-mobile' ); ?>

		</div>

		<div class="potter-menu-toggle-container potter-1-3">

			<?php do_action( 'potter_before_mobile_toggle' ); ?>

			<button id="potter-mobile-menu-toggle" class="potter-mobile-nav-item potter-mobile-menu-toggle potterf potterf-hamburger" aria-label="<?php _e( 'Site Navigation', 'potter' ); ?>" aria-controls="navigation" aria-expanded="false" aria-haspopup="true">
				<span class="screen-reader-text"><?php _e( 'Menu Toggle', 'potter' ); ?></span>
			</button>

			<?php do_action( 'potter_after_mobile_toggle' ); ?>

		</div>

	</div>

	<div class="potter-mobile-menu-container">

		<?php do_action( 'potter_before_mobile_menu' ); ?>

		<nav id="navigation" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement" aria-labelledby="potter-mobile-menu-toggle">

			<?php do_action( 'potter_mobile_menu_open' ); ?>

			<?php
			wp_nav_menu( array(
				'theme_location' => 'mobile_menu',
				'container'      => false,
				'menu_class'     => 'potter-mobile-menu',
				'depth'          => 4,
				'fallback_cb'    => 'potter_mobile_menu_fallback',
			) );
			?>

			<?php do_action( 'potter_mobile_menu_close' ); ?>

		</nav>

		<?php do_action( 'potter_after_mobile_menu' ); ?>

		<i class="potter-close potterf potterf-times" aria-hidden="true"></i>

	</div>

</div>
