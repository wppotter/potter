<?php
/**
 * Title.
 *
 * Renders the title on posts.
 *
 * @package Potter
 * @subpackage Template Parts
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

echo '<h1 class="entry-title">' . get_the_title() . '</h1>';
