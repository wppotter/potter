<?php
/**
 * Theme Footer.
 *
 * See also inc/template-parts/footer.php.
 *
 * @package Potter
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

		do_action( 'potter_before_footer' );
		do_action( 'potter_footer' );
		do_action( 'potter_after_footer' );

		?>

	</div>

<?php do_action( 'potter_body_close' ); ?>

<?php wp_footer(); ?>

</body>

</html>
