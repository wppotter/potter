<?php
/**
 * Footer.
 *
 * Construct the theme footer.
 *
 * @package Potter
 * @subpackage Template Parts
 */

defined('ABSPATH') || die("Can't access directly");

$theme_author = apply_filters(
    'potter_theme_author',
    array(
        'name' => __('Potter', 'potter'),
        'url'  => 'https://wppotter.com/',
    )
);

$footer_layout            = get_theme_mod('footer_layout', 'two');
$layout                   = 'one' === $footer_layout ? ' potter-footer-one-column' : ' potter-footer-two-columns';
$inner_layout             = 'one' === $footer_layout ? 'potter-inner-footer-content' : 'potter-inner-footer-left';
$footer_column_one        = get_theme_mod('footer_column_one', '&copy; [year] - [blogname] | All rights reserved');
$footer_column_two        = get_theme_mod('footer_column_two', 'Powered by [theme_author]');
$search_for               = array( '[year]', '[blogname]', '[theme_author]' );
$replace_with             = array( date('Y'), get_option('blogname'), '<a href="' . esc_url($theme_author['url']) . '">' . $theme_author['name'] . '</a>' );
$footer_column_one        = str_replace($search_for, $replace_with, $footer_column_one);
$footer_column_two        = str_replace($search_for, $replace_with, $footer_column_two);
$footer_column_one_layout = get_theme_mod('footer_column_one_layout', 'text');
$footer_column_two_layout = get_theme_mod('footer_column_two_layout', 'text');

?>

<footer id="footer" class="potter-page-footer" itemscope="itemscope" itemtype="https://schema.org/WPFooter">

<?php do_action('potter_footer_open'); ?>
<?php potter_footer_widget_column_layout(); ?>
<?php if ('none' !== get_theme_mod('footer_layout')) { ?>
  <div class="bottom-footer">
	<div class="potter-inner-footer potter-container potter-container-center<?php echo esc_attr($layout); ?>">
		<div class="<?php echo esc_attr($inner_layout); ?>">
			<?php
            if ('text' === $footer_column_one_layout) {
                echo do_shortcode(apply_filters('footer-column-left', $footer_column_one));
            } elseif ('menu' === $footer_column_one_layout) {
                wp_nav_menu(array(
                    'theme_location' => 'footer_menu',
                    'container'      => false,
                    'menu_class'     => 'potter-menu',
                    'depth'          => '1',
                    'fallback_cb'    => 'potter_menu_fallback',
                ));
            } elseif ('iconlink' === $footer_column_one_layout) {
                echo '<div class="icon-links left-column">';
                potter_icon_fotter_bottom_colone();
                echo '</div>';
            }
            ?>
		</div>

		<?php if ('two' === $footer_layout) { ?>

		<div class="potter-inner-footer-right">

			<?php

            if ('text' === $footer_column_two_layout) {
                echo do_shortcode(apply_filters('footer-column-right', $footer_column_two));
            } elseif ('menu' === $footer_column_two_layout) {
                wp_nav_menu(array(
                    'theme_location' => 'footer_menu_right',
                    'container'      => false,
                    'menu_class'     => 'potter-menu',
                    'depth'          => '1',
                    'fallback_cb'    => 'potter_menu_fallback',
                ));
            } elseif ('iconlink' === $footer_column_two_layout) {
              echo '<div class="icon-links right-column">';
              potter_icon_fotter_bottom_coltwo();
              echo '</div>';
            }

            ?>

		</div>

		<?php } ?>

	</div></div>
<?php } ?>
	<?php do_action('potter_footer_close'); ?>

</footer>


<?php
// footer widget
function potter_footer_four_column()
{
    ?>
    <div class="potter-1-4 potter-padding-medium">
      <?php if (! dynamic_sidebar('sidebar-footer-1')) { ?>
        <?php if (current_user_can('edit_theme_options')) { ?>
          <div class="widget no-widgets">
            <?php _e('Your Footer Widgets will appear here.', 'potter'); ?><br>
            <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php _e('Add Widgets', 'potter'); ?></a>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
    <div class="potter-1-4 potter-padding-medium">
      <?php if (! dynamic_sidebar('sidebar-footer-2')) { ?>
        <?php if (current_user_can('edit_theme_options')) { ?>
          <div class="widget no-widgets">
            <?php _e('Your Footer Widgets will appear here.', 'potter'); ?><br>
            <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php _e('Add Widgets', 'potter'); ?></a>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
    <div class="potter-1-4 potter-padding-medium">
      <?php if (! dynamic_sidebar('sidebar-footer-3')) { ?>
        <?php if (current_user_can('edit_theme_options')) { ?>
          <div class="widget no-widgets">
            <?php _e('Your Footer Widgets will appear here.', 'potter'); ?><br>
            <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php _e('Add Widgets', 'potter'); ?></a>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
    <div class="potter-1-4 potter-padding-medium">
      <?php if (! dynamic_sidebar('sidebar-footer-4')) { ?>
        <?php if (current_user_can('edit_theme_options')) { ?>
          <div class="widget no-widgets">
            <?php _e('Your Footer Widgets will appear here.', 'potter'); ?><br>
            <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php _e('Add Widgets', 'potter'); ?></a>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  <?php
}

function potter_footer_three_column()
{
    ?>
    <div class="potter-1-3 potter-padding-medium">
      <?php if (! dynamic_sidebar('sidebar-footer-1')) { ?>
        <?php if (current_user_can('edit_theme_options')) { ?>
          <div class="widget no-widgets">
            <?php _e('Your Footer Widgets will appear here.', 'potter'); ?><br>
            <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php _e('Add Widgets', 'potter'); ?></a>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
    <div class="potter-1-3 potter-padding-medium">
      <?php if (! dynamic_sidebar('sidebar-footer-2')) { ?>
        <?php if (current_user_can('edit_theme_options')) { ?>
          <div class="widget no-widgets">
            <?php _e('Your Footer Widgets will appear here.', 'potter'); ?><br>
            <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php _e('Add Widgets', 'potter'); ?></a>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
    <div class="potter-1-3 potter-padding-medium">
      <?php if (! dynamic_sidebar('sidebar-footer-3')) { ?>
        <?php if (current_user_can('edit_theme_options')) { ?>
          <div class="widget no-widgets">
            <?php _e('Your Footer Widgets will appear here.', 'potter'); ?><br>
            <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php _e('Add Widgets', 'potter'); ?></a>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  <?php
}

function potter_footer_two_column()
{
    ?>
    <div class="potter-1-2 potter-padding-medium">
      <?php if (! dynamic_sidebar('sidebar-footer-1')) { ?>
        <?php if (current_user_can('edit_theme_options')) { ?>
          <div class="widget no-widgets">
            <?php _e('Your Footer Widgets will appear here.', 'potter'); ?><br>
            <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php _e('Add Widgets', 'potter'); ?></a>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
    <div class="potter-1-2 potter-padding-medium">
      <?php if (! dynamic_sidebar('sidebar-footer-2')) { ?>
        <?php if (current_user_can('edit_theme_options')) { ?>
          <div class="widget no-widgets">
            <?php _e('Your Footer Widgets will appear here.', 'potter'); ?><br>
            <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php _e('Add Widgets', 'potter'); ?></a>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  <?php
}

function potter_footer_one_column()
{
    ?>
    <div class="potter-1-1 potter-padding-medium">
      <?php if (! dynamic_sidebar('sidebar-footer-1')) { ?>
        <?php if (current_user_can('edit_theme_options')) { ?>
          <div class="widget no-widgets">
            <?php _e('Your Footer Widgets will appear here.', 'potter'); ?><br>
            <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php _e('Add Widgets', 'potter'); ?></a>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  <?php
}


function potter_footer_three_column_right()
{
    ?>
    <div class="potter-1-4 potter-padding-medium">
      <?php if (! dynamic_sidebar('sidebar-footer-1')) { ?>
        <?php if (current_user_can('edit_theme_options')) { ?>
          <div class="widget no-widgets">
            <?php _e('Your Footer Widgets will appear here.', 'potter'); ?><br>
            <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php _e('Add Widgets', 'potter'); ?></a>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
    <div class="potter-1-4 potter-padding-medium">
      <?php if (! dynamic_sidebar('sidebar-footer-2')) { ?>
        <?php if (current_user_can('edit_theme_options')) { ?>
          <div class="widget no-widgets">
            <?php _e('Your Footer Widgets will appear here.', 'potter'); ?><br>
            <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php _e('Add Widgets', 'potter'); ?></a>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
    <div class="potter-1-2 potter-padding-medium">
      <?php if (! dynamic_sidebar('sidebar-footer-3')) { ?>
        <?php if (current_user_can('edit_theme_options')) { ?>
          <div class="widget no-widgets">
            <?php _e('Your Footer Widgets will appear here.', 'potter'); ?><br>
            <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php _e('Add Widgets', 'potter'); ?></a>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  <?php
}

function potter_footer_three_column_left()
{
    ?>
    <div class="potter-1-2 potter-padding-medium">
      <?php if (! dynamic_sidebar('sidebar-footer-1')) { ?>
        <?php if (current_user_can('edit_theme_options')) { ?>
          <div class="widget no-widgets">
            <?php _e('Your Footer Widgets will appear here.', 'potter'); ?><br>
            <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php _e('Add Widgets', 'potter'); ?></a>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
    <div class="potter-1-4 potter-padding-medium">
      <?php if (! dynamic_sidebar('sidebar-footer-2')) { ?>
        <?php if (current_user_can('edit_theme_options')) { ?>
          <div class="widget no-widgets">
            <?php _e('Your Footer Widgets will appear here.', 'potter'); ?><br>
            <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php _e('Add Widgets', 'potter'); ?></a>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
    <div class="potter-1-4 potter-padding-medium">
      <?php if (! dynamic_sidebar('sidebar-footer-3')) { ?>
        <?php if (current_user_can('edit_theme_options')) { ?>
          <div class="widget no-widgets">
            <?php _e('Your Footer Widgets will appear here.', 'potter'); ?><br>
            <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php _e('Add Widgets', 'potter'); ?></a>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  <?php
}

function potter_footer_three_column_middle()
{
    ?>
    <div class="potter-1-4 potter-padding-medium">
      <?php if (! dynamic_sidebar('sidebar-footer-1')) { ?>
        <?php if (current_user_can('edit_theme_options')) { ?>
          <div class="widget no-widgets">
            <?php _e('Your Footer Widgets will appear here.', 'potter'); ?><br>
            <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php _e('Add Widgets', 'potter'); ?></a>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
    <div class="potter-1-2 potter-padding-medium">
      <?php if (! dynamic_sidebar('sidebar-footer-2')) { ?>
        <?php if (current_user_can('edit_theme_options')) { ?>
          <div class="widget no-widgets">
            <?php _e('Your Footer Widgets will appear here.', 'potter'); ?><br>
            <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php _e('Add Widgets', 'potter'); ?></a>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
    <div class="potter-1-4 potter-padding-medium">
      <?php if (! dynamic_sidebar('sidebar-footer-3')) { ?>
        <?php if (current_user_can('edit_theme_options')) { ?>
          <div class="widget no-widgets">
            <?php _e('Your Footer Widgets will appear here.', 'potter'); ?><br>
            <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php _e('Add Widgets', 'potter'); ?></a>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  <?php
}

//footer widget layout_panel
function potter_footer_widget_column_layout()
{
    $active_footer_widget = get_theme_mod('active_footer_widget');
    $top_footer_widget_layout = get_theme_mod('top_footer_widget_layout', 'three-column');
    if ($active_footer_widget) {
        echo '<div class="footer-widget-area"><div class="potter-inner-footer potter-container potter-container-center">
  	  <div class="potter-grid footer-widget-container">';
        if ('four-column' === $top_footer_widget_layout) {
            potter_footer_four_column();
        } elseif ('three-column'  === $top_footer_widget_layout) {
            potter_footer_three_column();
        } elseif ('two-column'  === $top_footer_widget_layout) {
            potter_footer_two_column();
        } elseif ('one-column'  === $top_footer_widget_layout) {
            potter_footer_one_column();
        } elseif ('three-column-right'  === $top_footer_widget_layout) {
            potter_footer_three_column_right();
        } elseif ('three-column-left'  === $top_footer_widget_layout) {
            potter_footer_three_column_left();
        } elseif ('three-column-middle'  === $top_footer_widget_layout) {
            potter_footer_three_column_middle();
        }
        echo '</div></div></div>';
    }
}
