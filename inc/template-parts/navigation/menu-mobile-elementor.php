<?php
/**
 * Custom mobile menu.
 *
 * @package Potter
 * @subpackage Template Parts
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

echo '<div class="potter-mobile-menu-custom potter-hidden-large">';

echo do_shortcode( get_theme_mod( 'menu_custom' ) );

echo '</div>';
