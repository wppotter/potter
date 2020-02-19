<?php
/**
 * Search form template.
 *
 * @package Potter
 */

defined('ABSPATH') || die("Can't access directly");

global $potter_search_form_id;

if (! $potter_search_form_id) {
    $potter_search_form_id = 1;
}
$prefix = 'searchform-';
?>
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
	<label>
		<span class="screen-reader-text"><?php _e('Search for:', 'potter'); ?></span>
		<input type="search" id="<?php echo esc_attr($prefix) . (int) $potter_search_form_id++; ?>" name="s" value="" placeholder="<?php echo esc_attr(apply_filters('potter_search_placeholder', __('Search &hellip;', 'potter'))); ?>" title="<?php echo esc_attr(apply_filters('potter_search_title', __('Press enter to search', 'potter'))); ?>" />
	</label>
</form>
