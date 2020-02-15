<?php
/**
 * 404.
 *
 * See also inc/template-parts/404.php.
 *
 * @package Potter
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

get_header();

do_action( 'potter_404' );

get_footer();
