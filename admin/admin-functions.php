<?php
/**
 * Admin Functions.
 *
 * @package potter
 */

/**
 * Enqueue admin scipts.
 */
function potter_admin_scripts($hook)
{
    if ('appearance_page_potter' !== $hook) {
        return;
    }
    wp_enqueue_script('potter-admin-js', get_template_directory_uri() . '/admin/js/plugin-install.js', array( 'jquery' ), true, POTTER_VERSION);
    wp_enqueue_script('updates');
    wp_localize_script(
        'potter-admin-js',
        'potterAboutPluginInstall',
        array(
            'activating'            => esc_html__('Activating ', 'potter'),
            'verify_network'        => esc_html__('Not connect. Verify Network.', 'potter'),
            'page_not_found'        => esc_html__('Requested page not found. [404]', 'potter'),
            'internal_server_error' => esc_html__('Internal Server Error [500]', 'potter'),
            'json_parse_failed'     => esc_html__('Requested JSON parse failed', 'potter'),
            'timeout_error'         => esc_html__('Time out error', 'potter'),
            'ajax_req_aborted'      => esc_html__('Ajax request aborted', 'potter'),
            'uncaught_error'        => esc_html__('Uncaught Error', 'potter'),
        )
    );
}
add_action('admin_enqueue_scripts', 'potter_admin_scripts');
