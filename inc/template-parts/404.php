<?php
/**
 * 404.
 *
 * Construct the theme 404 page.
 *
 * @package Potter
 * @subpackage Template Parts
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

?>

<div id="content">

	<?php do_action( 'potter_content_open' ); ?>

	<?php potter_inner_content(); ?>

		<?php do_action( 'potter_inner_content_open' ); ?>

		<main id="main" class="potter-main<?php echo esc_attr(potter_singular_class()); ?>">

			<div class="potter-text-center">
				<?php do_action( 'potter_main_title_before' ); ?>
				<?php echo '<h1 class="entry-title" itemprop="headline">' . apply_filters( 'potter_404_headline', esc_html__( "404 - This page couldn't be found.", 'potter' ) ) . '</h1>'; ?>

				<div class="potter-container-center potter-medium-1-2" itemprop="text">

					<?php echo '<p>' . apply_filters( 'potter_404_text', esc_attr( "Oops! We're sorry, this page couldn't be found!", 'potter' ) ) . '</p>'; ?>

					<?php get_search_form(); ?>

				</div>

			</div>

		</main>

		<?php do_action( 'potter_inner_content_close' ); ?>

	<?php potter_inner_content_close(); ?>

	<?php do_action( 'potter_content_close' ); ?>

</div>
