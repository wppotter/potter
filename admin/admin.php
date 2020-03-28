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

  <svg width="100px" viewBox="0 0 508 657" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <defs>
          <polygon id="path-1" points="0.000250887204 0.514599158 505.612982 0.514599158 505.612982 361.11649 0.000250887204 361.11649"></polygon>
      </defs>
      <g id="logo" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g id="Group-9" transform="translate(254.000000, 328.500000) scale(1, -1) translate(-254.000000, -328.500000) ">
              <g id="Group-3" fill="#4660C4">
                  <path d="M66.843121,477.703371 L0.943655943,477.703371 L0.943655943,181.303026 C0.943655943,81.3319098 81.9026121,0.000506927218 181.412823,0.000506927218 C280.92051,0.000506927218 361.876943,81.3319098 361.876943,181.303026 L295.980001,181.303026 C295.980001,117.838273 244.584978,66.202667 181.412823,66.202667 C118.238144,66.202667 66.843121,117.838273 66.843121,181.303026 L66.843121,477.703371 Z" id="Fill-1"></path>
                  <path d="M179.030896,326.170205 C265.813865,326.170205 336.165361,302.0182 336.165361,209.468981 C336.165361,116.919762 265.813865,41.8937962 179.030896,41.8937962 C92.2479279,41.8937962 21.8964317,116.919762 21.8964317,209.468981 C21.8964317,252.797892 24.4461444,359.15822 49.7530168,377.044166 C78.5008437,397.362048 132.877245,326.170205 179.030896,326.170205 Z" id="Oval"></path>
              </g>
              <path d="M327.5,657 L327.5,590.899668 C390.686355,590.899668 442.090878,539.347988 442.090878,475.983278 L442.090878,328.016722 C442.090878,264.649481 390.686355,213.100332 327.5,213.100332 C264.316168,213.100332 212.911645,264.649481 212.911645,328.016722 L147,328.016722 C147,228.205726 227.97392,147 327.5,147 C427.028603,147 508,228.205726 508,328.016722 L508,475.983278 C508,575.796804 427.028603,657 327.5,657" id="Fill-4" fill="#4FCEC4"></path>
              <path d="M449.473768,359.830169 C508.914629,377.097622 466.053621,320.330966 466.053621,273.915085 C466.053621,227.499203 415.18857,188 334.505176,188 C253.821782,188 163,258.560423 163,304.976304 C163,351.392186 390.032907,342.562716 449.473768,359.830169 Z" id="Oval" fill="#4FCEC4"></path>
              <g id="Group-8" transform="translate(1.000000, 295.000000)">
                  <mask id="mask-2" fill="white">
                      <use xlink:href="#path-1"></use>
                  </mask>
                  <g id="Clip-7"></g>
                  <path d="M179.459868,66.3536037 C116.637712,66.3536037 65.5294797,117.701474 65.5294797,180.815671 C65.5294797,243.929868 116.637712,295.277738 179.459868,295.277738 L326.153616,295.277738 C388.973263,295.277738 440.081496,243.929868 440.081496,180.815671 C440.081496,117.701474 388.973263,66.3536037 326.153616,66.3536037 L179.459868,66.3536037 Z M326.153616,361.116742 L179.459868,361.116742 C80.5049369,361.116742 0.000250887204,280.234584 0.000250887204,180.815671 C0.000250887204,81.3967575 80.5049369,0.514599158 179.459868,0.514599158 L326.153616,0.514599158 C425.108547,0.514599158 505.613233,81.3967575 505.613233,180.815671 C505.613233,280.234584 425.108547,361.116742 326.153616,361.116742 Z" id="Fill-6" fill="#FF6B6B" mask="url(#mask-2)"></path>
              </g>
              <ellipse id="Oval" fill="#FF6B6B" cx="252" cy="480.5" rx="209" ry="146.5"></ellipse>
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
