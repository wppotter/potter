<?php
/**
 * Custom menu.
 *
 * @package Potter
 * @subpackage Template Parts
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

echo '<div class="potter-menu-custom potter-visible-large">';

echo do_shortcode( get_theme_mod( 'menu_custom' ) );

echo '</div>';
