<?php
/**
 * Featured image.
 *
 * Renders the featured image on posts.
 *
 * @package Potter
 * @subpackage Template Parts
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

// Stop if there's no thumbnail.
if ( ! has_post_thumbnail() ) {
	return;
}

$options = get_post_meta( get_the_ID(), 'potter_options', true );

$remove_featured = $options ? in_array( 'remove-featured', $options ) : false;

// Stop here if featured image has been disabled.
if ( $remove_featured ) {
	return;
}

?>

<div class="potter-post-image-wrapper">
	<?php the_post_thumbnail( apply_filters( 'potter_single_post_thumbnail_size', 'large' ), array( 'class' => 'potter-post-image', 'itemprop' => 'image' ) ); ?>
</div>
