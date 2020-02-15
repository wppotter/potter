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
                echo do_shortcode($pre_header_column_two);
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
