<?php
/**
 * Sidebar.
 *
 * @package Potter
 */

defined('ABSPATH') || die("Can't access directly");

$sidebar = apply_filters('potter_do_sidebar', 'sidebar-1');

?>

<div class="potter-medium-1-3 potter-sidebar-wrapper">

	<?php do_action('potter_before_sidebar'); ?>

	<aside id="sidebar" class="potter-sidebar" itemscope="itemscope" itemtype="https://schema.org/WPSideBar">

	<?php do_action('potter_sidebar_open'); ?>

	<?php if (! dynamic_sidebar($sidebar)) { ?>

		<?php if (current_user_can('edit_theme_options')) { ?>

			<div class="widget no-widgets">
				<?php _e('Your Sidebar Widgets will appear here.', 'potter'); ?><br>
				<a href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php _e('Add Widgets', 'potter'); ?></a>
			</div>

		<?php } ?>

	<?php } ?>

	<?php do_action('potter_sidebar_close'); ?>

	</aside>

	<?php do_action('potter_after_sidebar'); ?>

</div>
