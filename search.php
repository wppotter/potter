<?php
/**
 * Search template.
 *
 * @package Potter
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

$grid_gap = get_theme_mod( 'sidebar_gap', 'medium' );

get_header();

?>

<div id="content">

	<?php do_action( 'potter_content_open' ); ?>

	<?php potter_inner_content(); ?>
	<?php do_action( 'potter_main_title_before' ); ?>
		<?php do_action( 'potter_inner_content_open' ); ?>

		<div class="potter-grid potter-main-grid potter-grid-<?php echo esc_attr( $grid_gap ); ?>">

			<?php do_action( 'potter_sidebar_left' ); ?>

			<main id="main" class="potter-main potter-medium-2-3<?php echo esc_attr(potter_archive_class()); ?>">

				<?php do_action( 'potter_main_content_open' ); ?>

				<?php if( have_posts() ) : ?>

				<h1 class="page-title">
					<?php
					printf(
						/* translators: Search query */
						__( 'Search Results for: %s', 'potter' ),
						'<span>' . get_search_query() . '</span>'
					);
					?>
				</h1>

				<?php do_action( 'potter_before_loop' ); ?>

				<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'inc/template-parts/article' ); ?>

				<?php endwhile; ?>

				<?php do_action( 'potter_after_loop' ); ?>

				<?php else : ?>

				<?php get_template_part( 'inc/template-parts/article-none' ); ?>

				<?php endif; ?>

				<?php
				the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => __( '&larr; Previous', 'potter' ),
					'next_text' => __( 'Next &rarr;', 'potter' ),
				) );
				?>

				<?php do_action( 'potter_main_content_close' ); ?>

			</main>

			<?php do_action( 'potter_sidebar_right' ); ?>

		</div>

		<?php do_action( 'potter_inner_content_close' ); ?>

	<?php potter_inner_content_close(); ?>

	<?php do_action( 'potter_content_close' ); ?>

</div>

<?php get_footer(); ?>
