<?php
/**
 * Default mobile menu.
 *
 * @package Potter
 * @subpackage Template Parts
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

?>

<div class="potter-mobile-menu-default potter-hidden-large">

	<div class="potter-mobile-nav-wrapper potter-container">

		<div class="potter-mobile-logo-container">

			<?php get_template_part( 'inc/template-parts/logo/logo-mobile' ); ?>

		</div>

		<div class="potter-menu-toggle-container">

			<a id="potter-mobile-menu-toggle" href="javascript:void(0)" class="potter-mobile-menu-toggle potter-button potter-button-full" aria-label="<?php esc_attr_e( 'Site Navigation', 'potter' ); ?>" aria-controls="navigation" aria-expanded="false" aria-haspopup="true" role="button">
				<?php echo apply_filters( 'potter_mobile_menu_text', __( 'Menu', 'potter' ) ); ?>
			</a>

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

	</div>

</div>
