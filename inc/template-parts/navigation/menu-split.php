<?php
/**
 * Centered menu.
 *
 * @package Potter
 * @subpackage Template Parts
 */

defined('ABSPATH') || die("Can't access directly");

?>

<div class="potter-container potter-container-center potter-visible-large potter-nav-wrapper potter-menu-centered split-menu">
	<div class="potter-split-menu">
				<div class="logo-container-split" > <?php get_template_part('inc/template-parts/logo/logo'); ?> </div>
				<div class="main-nav-left-menu split-left-menu">
						<nav id="navigation-left" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement" aria-label="<?php esc_attr_e('Site Navigation', 'potter'); ?>">
							<?php potter_nav_left_menu();?>
	 				  </nav>


							<?php do_action('potter_before_main_menu'); ?>
							<nav id="navigation-right" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement" aria-label="<?php esc_attr_e('Site Navigation', 'potter'); ?>">

								<?php do_action('potter_main_menu_open'); ?>

								<?php do_action('potter_main_menu'); ?>

								<?php do_action('potter_main_menu_close'); ?>
							</nav>

							<?php do_action('potter_after_main_menu'); ?>

						</div>
					</div>
</div>
