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

          <svg width="103px" height="122px" viewBox="0 0 103 122" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <defs>
                  <polygon id="path-1" points="0 0.0715545926 102.74172 0.0715545926 102.74172 121.961314 0 121.961314"></polygon>
              </defs>
              <g id="logo" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="Group-6" transform="translate(51.500000, 61.000000) scale(-1, -1) translate(-51.500000, -61.000000) ">
                      <g id="Group-3">
                          <mask id="mask-2" fill="white">
                              <use xlink:href="#path-1"></use>
                          </mask>
                          <g id="Clip-2"></g>
                          <path d="M47.3345473,1.7464715 C45.1060019,3.97930315 45.1060019,7.60140014 47.3345473,9.83423179 L79.6230966,42.184882 C87.1697973,49.7460975 91.3260814,59.7989216 91.3260814,70.4916521 C91.3260814,81.1847736 87.1697973,91.2375977 79.6230966,98.7984222 C72.076786,106.359247 62.0432595,110.523525 51.3706648,110.523525 C40.6984602,110.523525 30.6649337,106.359247 23.1186231,98.7984222 C15.5723125,91.2375977 11.4156383,81.1847736 11.4156383,70.4916521 C11.4156383,61.7295861 14.206392,53.3975121 19.366536,46.5137297 L27.560108,54.7226695 C20.2354034,65.8184199 21.4456534,80.9474961 31.1904678,90.7106619 C42.3179792,101.859575 60.4233504,101.859575 71.5512519,90.7106619 C76.9415852,85.3103522 79.9102481,78.1294843 79.9102481,70.4916521 C79.9102481,62.8542108 76.9415852,55.6733429 71.5512519,50.2726423 L55.4067822,34.0971217 C53.1778466,31.8638992 49.5638731,31.8638992 47.3345473,34.0971217 C45.1060019,36.3303443 45.1060019,39.9520504 47.3345473,42.184882 L63.479017,58.3604026 C66.7133731,61.6009793 68.4944148,65.9091092 68.4944148,70.4916521 C68.4944148,75.074586 66.7133731,79.3823249 63.479017,82.6229016 C56.8027443,89.3120149 45.9389754,89.3120149 39.2627027,82.6229016 C32.5860398,75.9337884 32.5860398,65.0495159 39.2627027,58.3604026 C41.4912481,56.1263982 41.4912481,52.5058649 39.2627027,50.2726423 L23.1186231,34.0971217 C22.0484375,33.0248778 20.5962936,32.422498 19.0825057,32.422498 C17.5687178,32.422498 16.116964,33.0248778 15.0463883,34.0971217 C5.34371023,43.818852 -0.000195075758,56.7436323 -0.000195075758,70.4916521 C-0.000195075758,84.2396719 5.34371023,97.1648432 15.0463883,106.885792 C24.7486761,116.607131 37.649036,121.961314 51.3706648,121.961314 C65.0922936,121.961314 77.9926534,116.607522 87.6953314,106.885792 C97.3980095,97.1648432 102.741915,84.2396719 102.741915,70.4916521 C102.741915,56.7436323 97.3983996,43.818852 87.6953314,34.0971217 L55.4067822,1.7464715 C53.1778466,-0.486751044 49.5638731,-0.486751044 47.3345473,1.7464715" id="Fill-1" fill="#FF6B6B" mask="url(#mask-2)"></path>
                      </g>
                      <path d="M36.5736464,27.8902706 C36.9255291,27.8199986 37.2691411,27.7140271 37.6033544,27.5776168 C37.9334324,27.437073 38.2541119,27.2702241 38.5537385,27.072185 C38.7033638,26.9707229 38.8484779,26.8655029 38.9845692,26.7508882 C39.1255479,26.6366494 39.2616393,26.5130159 39.3894599,26.3856245 C39.5172806,26.2627426 39.6360786,26.1263323 39.7503653,25.9857885 C39.864652,25.8490025 39.9748033,25.6998155 40.0714206,25.5502528 C40.2695426,25.2556368 40.4413486,24.93434 40.57744,24.6044001 C40.7139073,24.2703266 40.8195473,23.9272342 40.8898487,23.5754988 C40.9251873,23.3992553 40.9515033,23.2192539 40.973684,23.0388767 C40.9913533,22.863009 41,22.6781224 41,22.5026305 C41,21.0554796 40.4105213,19.6346338 39.3894599,18.6139997 C38.3642632,17.589232 36.9477097,17 35.499953,17 C35.3195003,17 35.1390477,17.0135283 34.9589709,17.0311902 C34.7785183,17.0484764 34.602201,17.0747814 34.4262596,17.1101052 C34.0743769,17.1803772 33.7266296,17.2859729 33.3965516,17.4223832 C33.0623382,17.5587934 32.7454182,17.7301517 32.4461675,17.9281908 C32.2965422,18.0292771 32.1514282,18.1348729 32.0108255,18.2491118 C31.8698468,18.3637264 31.7378908,18.4866084 31.6104461,18.6139997 C31.4826254,18.7417669 31.3593161,18.8740435 31.2450294,19.0145873 C31.1352541,19.1509975 31.0251027,19.3005603 30.9284854,19.450123 C30.7303634,19.744739 30.5589333,20.0660358 30.422466,20.4001093 C30.2814874,20.7300492 30.1758474,21.0772752 30.105546,21.424877 C30.0705833,21.600369 30.0438914,21.7811219 30.026222,21.961499 C29.9912593,22.3173681 29.9912593,22.6826319 30.026222,23.0388767 C30.0438914,23.2192539 30.0705833,23.3992553 30.105546,23.5754988 C30.1758474,23.9272342 30.2814874,24.2703266 30.422466,24.6044001 C30.5589333,24.93434 30.7303634,25.2556368 30.9284854,25.5502528 C31.0251027,25.6998155 31.1352541,25.8490025 31.2450294,25.9857885 C31.3593161,26.1263323 31.4826254,26.2627426 31.6104461,26.3856245 C31.7378908,26.5130159 31.8698468,26.6366494 32.0108255,26.7508882 C32.1514282,26.8655029 32.2965422,26.9707229 32.4461675,27.072185 C32.7454182,27.2702241 33.0623382,27.437073 33.3965516,27.5776168 C33.7266296,27.7140271 34.0743769,27.8199986 34.4262596,27.8902706 C34.602201,27.9248429 34.7785183,27.9515236 34.9589709,27.9691856 C35.1390477,27.9868475 35.3195003,28 35.499953,28 C35.6804057,28 35.8608583,27.9868475 36.041311,27.9691856 C36.2168764,27.9515236 36.397705,27.9248429 36.5736464,27.8902706" id="Fill-4" fill="#FF6B6B"></path>
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
