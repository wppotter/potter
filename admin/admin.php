<?php

/**
 * Defining admin page of potter
 */

class Potter_Admin
{
    protected $theme;
    protected $installer;
    public function __construct()
    {
        // init vars
        $this->theme = wp_get_theme();
        // actions
        add_action('admin_menu', array($this, 'potter_admin_menu'));
        add_action('admin_enqueue_scripts', array($this, 'potter_admin_enqueue_scripts'));
    }

    /**
     * Load required files.
     *
     * @since     1.0.4
     */

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.4
     */
    public function potter_admin_enqueue_scripts()
    {
        wp_enqueue_style('potter', get_template_directory_uri() . '/admin/css/potter-admin.css', array(), $this->theme->version);
    }

    /**
     * Create Dashboard Pages
     *
     * @since     1.0.4
     */
    public function potter_admin_menu()
    {
        if (class_exists('Potter_Core')) {
            do_action('potter_admin_menu', $this);
        } else {
            add_theme_page(
                'Potter',
                'Potter',
                'manage_options',
                'potter',
                array($this, 'potter_dashboard_page')
            );
        }
    }

    public function potter_dashboard_page()
    {
        echo '<div class="potter-core-admin-wrapper">

			<div class="potter-core-content">

				<div class="potter-core-content-inner">
        <div class="potter-core-sidebar">
          <div class="potter-core-sidebar-block"><div class="potter-admin-sidebar-logo">
        <svg width="80px" height="80px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
                <rect id="path-1" x="0" y="0" width="41" height="41" rx="5"></rect>
            </defs>
            <g id="logo" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Artboard" transform="translate(-909.000000, -460.000000)">
                    <g id="Group-4" transform="translate(909.000000, 460.000000)">
                        <g id="Group-22-Copy">
                            <g id="Group-6">
                                <g id="Group-19">
                                    <rect id="Rectangle-Copy-9" fill="#4FCEC4" x="7" y="0" width="41" height="41" rx="5"></rect>
                                    <g id="Group" transform="translate(0.000000, 7.000000)">
                                        <mask id="mask-2" fill="white">
                                            <use xlink:href="#path-1"></use>
                                        </mask>
                                        <use id="Rectangle-Copy-9" fill="#1A535C" xlink:href="#path-1"></use>
                                    </g>
                                </g>
                                <g id="Group-2-Copy" transform="translate(9.000000, 12.000000)">
                                    <circle id="Oval" fill="#FF6B6B" cx="12" cy="22" r="9"></circle>
                                    <path d="M12,24 C5.372583,24 0,18.627417 0,12 C0,5.372583 5.372583,0 12,0 C18.627417,0 24,5.372583 24,12 C24,18.627417 18.627417,24 12,24 Z M12,21 C16.9705627,21 21,16.9705627 21,12 C21,7.02943725 16.9705627,3 12,3 C7.02943725,3 3,7.02943725 3,12 C3,16.9705627 7.02943725,21 12,21 Z" id="Combined-Shape" fill="#FFFFFF"></path>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
            </g>
        </svg>
          <p class="theme-content">
          ' . sprintf(__('Potter is a super fast, gutenberg ready fully customizable & beautiful theme suitable for blog, personal portfolio, business website and WooCommerce storefront.', 'potter')) . '
          </p>
            </div>
            <div class="potter-admin-sidebar-cta">
              <a href="https://pottertheme.com/" target="_blank"><span class="dashicons dashicons-admin-site-alt3"></span>   ' . sprintf(__('Home Page', 'potter')) . ' </a>
            </div></div>
        </div>
					<div class="potter-core-admin-block-wrapper">
						<div class="potter-core-admin-block potter-core-admin-block-customize">
							<header class="potter-core-admin-block-header">
								<div class="potter-core-admin-block-header-icon">
									<span class="dashicons dashicons-admin-settings"></span>
								</div>
								<h4 class="potter-core-admin-title">
                ' . sprintf(__('Customize Potter', 'potter')) . '
                </h4>
							</header>
							<div class="potter-core-admin-block-content">
								<p>
                ' . sprintf(__('Potter got lots of customization options to achieve almost anything you want. Take a minute to explore the power of Potter.', 'potter')) . '</p>
								<a href="' . esc_url(admin_url('customize.php')) . '" class="customize-potter button button-primary" target="_blank">
                ' . sprintf(__('Customize Potter', 'potter')) . '
                </a>
							</div>
						</div>
						<div class="potter-core-admin-block potter-core-admin-block-docs">
							<header class="potter-core-admin-block-header">
								<div class="potter-core-admin-block-header-icon">
								<span class="dashicons dashicons-media-text"></span>
								</div>
								<h4 class="potter-core-admin-title">
                ' . sprintf(__('Documentation', 'potter')) . '
                </h4>
							</header>
							<div class="potter-core-admin-block-content">
								<p>
                ' . sprintf(__('Get started by spending some time with the documentation to get familiar with Potter. Build awesome websites for you or your clients with ease.', 'potter')) . '
                </a></p>
								<a href="https://pottertheme.com/docs-2/" class="potter-docs-btn button button-primary" target="_blank">' . sprintf(__('Documentation', 'potter')) . '</a>
							</div>
						</div>
						<div class="potter-core-admin-block potter-core-admin-block-contribution">
							<header class="potter-core-admin-block-header">
								<div class="potter-core-admin-block-header-icon">
									<span class="dashicons dashicons-awards"></span>
								</div>
								<h4 class="potter-core-admin-title">
                ' . sprintf(__('Contribute to Potter', 'potter')) . '
                </h4>
							</header>
							<div class="potter-core-admin-block-content">
								<p>
                ' . sprintf(__('Potter is a free theme and always will be. You can contribute to make it better reporting bugs, creating issues, pull requests at ', 'potter')) . '
                <a href="https://github.com/wppotter/potter" target="_blank">' . sprintf(__('Github.', 'potter')) . '</a></p>
								<a href="https://github.com/wppotter/potter/issues/new" class="potter-report-bug button button-primary" target="_blank">' . sprintf(__('Report a bug', 'potter')) . '</a>
							</div>
						</div>
						<div class="potter-core-admin-block potter-core-admin-block-support">
							<header class="potter-core-admin-block-header">
								<div class="potter-core-admin-block-header-icon">
									<span class="dashicons dashicons-format-chat"></span>
								</div>
								<h4 class="potter-core-admin-title">
                ' . sprintf(__('Need Help?', 'potter')) . '
                </h4>
							</header>
							<div class="potter-core-admin-block-content">
								<p>
                ' . sprintf(__('Stuck with something? Get help from the community on ', 'potter')) . '
                <a href="https://wordpress.org/support/theme/potter" target="_blank">' . sprintf(__('WordPress Support Forum.</a> In case of emergency, contact us at ', 'potter')) . '<a href="https://pottertheme.com/contact" target="_blank">' . sprintf(__('Potter Website', 'potter')) . '</a></p>
								<a href="https://wordpress.org/support/theme/potter" class="potter-support-btn button button-primary" target="_blank">' . sprintf(__('Get Community Support', 'potter')) . '</a>
							</div>
						</div>
						<div class="potter-core-admin-block potter-core-admin-block-review">
							<header class="potter-core-admin-block-header">
								<div class="potter-core-admin-block-header-icon">
									<span class="dashicons dashicons-heart"></span>
								</div>
								<h4 class="potter-core-admin-title">
                ' . sprintf(__('Show your Love', 'potter')) . '
                </h4>
							</header>
							<div class="potter-core-admin-block-content">
								<p>
                ' . sprintf(__('We love to have you in Potter family. We are making it more awesome everyday. Take your 2 minutes to review the theme and spread the love to encourage us to keep it going.', 'potter')) . '
                </p>
								<a href="https://wordpress.org/support/theme/potter/reviews/#new-post" class="review-potter button button-primary" target="_blank">
                ' . sprintf(__('Leave a Review', 'potter')) . '
                </a>
							</div>
						</div>
					</div>';

        do_action('potter_core_after_admin_helper_box');

        echo '</div>

			</div>

		</div>';
    }

}
