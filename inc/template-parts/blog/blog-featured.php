<?php
/**
 * Featured image.
 *
 * Renders featured image on archives.
 *
 * @package Potter
 * @subpackage Template Parts
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

// Stop if there's no thumbnail.
if ( ! has_post_thumbnail() ) {
	return;
}

?>

<div class="potter-post-image-wrapper">
	<a class="potter-post-image-link" href="<?php echo esc_url( get_permalink() ); ?>">
		<span class="screen-reader-text"><?php the_title(); ?></span>
		<?php the_post_thumbnail( apply_filters( 'potter_blog_post_thumbnail_size', 'full' ), array( 'class' => 'potter-post-image', 'itemprop' => 'image' ) ); ?>
	</a>
</div>
