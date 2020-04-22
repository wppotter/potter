<?php
/**
 * View Get Started
 *
 * @package     Potter
 * @author      wppotter
 * @copyright   Copyright (c) 2020, Potter
 * @link        https://www.pottertheme.com
 * @since       Potter 1.1.3
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

?>

<div class="potter-container potter-welcome">
	<div id="poststuff">
		<div id="post-body" class="columns-2">
			<div id="post-body-content">
				<!-- All WordPress Notices below header -->
				<h1 class="screen-reader-text"> <?php esc_html_e('potter', 'potter'); ?> </h1>
				<?php do_action('potter_welcome_page_content_before'); ?>
				<?php do_action('potter_welcome_page_right_sidebar_content'); ?>

				<div class="postbox">
					<h2 class="handle"><?php esc_html_e('Feedback', 'potter'); ?></h2>
					<div class="potter-review-section">
						<div class="potter-review">
							<p>
								<?php esc_html_e('Hi! Thanks for using the Potter theme. Can you please do us a favor and give us a 5-star rating? Your feedback keeps us motivated and helps us grow the Potter community.', 'potter'); ?>
							</p>
							<?php
                            $potter_submit_review_link      = 'https://wordpress.org/support/theme/potter/reviews/#new-post';
                $potter_submit_review_link_text = __('Submit Review &raquo;', 'potter');

                printf(
                    '%1$s',
                    ! empty($potter_submit_review_link) ? '<a href=' . esc_url($potter_submit_review_link) . ' target="_blank" rel="noopener">' . esc_html($potter_submit_review_link_text) . '</a>' :
                                    esc_html($potter_submit_review_link_text)
                ); ?>
						</div>
					</div>
				</div>

				<?php do_action('potter_welcome_page_content_after'); ?>
			</div>
			<div class="postbox-container potter-sidebar" id="postbox-container-1">
				<div id="side-sortables">
					<?php do_action('potter_welcome_page_right_sidebar_before'); ?>

					<?php do_action('potter_welcome_page_content'); ?>

					<?php do_action('potter_welcome_page_right_sidebar_after'); ?>
				</div>
			</div>
		</div>
		<!-- /post-body -->
		<br class="clear">
	</div>


</div>
