<?php
/**
 * Page template.
 *
 * @package Potter
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

get_header();

?>
<?php do_action( 'potter_before_content_open' ); ?>
<div id="content">

	<?php do_action( 'potter_content_open' ); ?>

	<?php potter_inner_content(); ?>

		<?php do_action( 'potter_inner_content_open' ); ?>

		<main id="main" class="potter-main<?php echo esc_attr(potter_singular_class()); ?>">

			<?php do_action( 'potter_main_content_open' ); ?>
			<?php do_action( 'potter_main_title_before' ); ?>
			<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div class="entry-content" itemprop="text">
				<?php	potter_title(); ?>
				<?php do_action( 'potter_entry_content_open' ); ?>

				<?php the_content(); ?>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'potter' ),
					'after'  => '</div>',
				) );
				?>
				<?php do_action( 'potter_entry_content_close' ); ?>
			</div>
			<?php endwhile; endif; ?>

			<?php comments_template(); ?>

			<?php do_action( 'potter_main_content_close' ); ?>

		</main>

		<?php do_action( 'potter_inner_content_close' ); ?>

	<?php potter_inner_content_close(); ?>

	<?php do_action( 'potter_content_close' ); ?>

</div>

<?php get_footer(); ?>
