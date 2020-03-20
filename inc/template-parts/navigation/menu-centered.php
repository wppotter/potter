<?php
/**
 * Centered menu.
 *
 * @package Potter
 * @subpackage Template Parts
 */

defined('ABSPATH') || die("Can't access directly");

?>

<div class="potter-container potter-container-center potter-visible-large potter-nav-wrapper potter-menu-centered">
	<div class="potter-grid">
			<div class="main-nav-left-menu potter-2-5 potter-4-10">
					<nav id="navigation-left" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement" aria-label="<?php esc_attr_e('Site Navigation', 'potter'); ?>">
						<?php potter_nav_left_menu();?>
 				  </nav>
				</div>
				<div class="potter-1-5 potter-2-10 logo-container-center-nav" > <?php get_template_part('inc/template-parts/logo/logo'); ?> </div>
					<div class="main-nav-right-menu potter-2-5 potter-4-10">
							<?php do_action('potter_before_main_menu'); ?>
							<nav id="navigation" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement" aria-label="<?php esc_attr_e('Site Navigation', 'potter'); ?>">

								<?php do_action('potter_main_menu_open'); ?>

								<?php do_action('potter_main_menu'); ?>

								<?php do_action('potter_main_menu_close'); ?>
							</nav>

							<?php do_action('potter_after_main_menu'); ?>

						</div>
					</div>

</div>
