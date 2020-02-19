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
      <div class="potter-core-sidebar">
        <div class="potter-core-sidebar-block"><div class="potter-admin-sidebar-logo">

        <svg width="198px" height="65px" viewBox="0 0 198 65" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-5" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Page"></g>
                <g id="Page"></g>
                <g id="Group-13">
                    <g id="Group-12">
                        <path d="M0,4.25929953e-15 L26.5,7.10542736e-15 C39.4786916,4.72128038e-15 50,10.5213084 50,23.5 C50,36.4786916 39.4786916,47 26.5,47 L0,47 L0,3.55271368e-15 Z" id="Combined-Shape" fill="#000000"></path>
                        <circle id="Oval" fill="#0056FF" cx="17.5" cy="50.5" r="14.5"></circle>
                    </g>
                    <g id="Group-11" transform="translate(59.000000, 11.000000)">
                        <path d="M0,7.62705008 L5.9361594,7.62705008 L5.9361594,10.5831465 L6.32225107,10.5831465 C6.90139147,9.5476725 7.80226302,8.66252254 9.02489275,7.92767005 C10.2475225,7.19281756 11.7596997,6.82539683 13.5614699,6.82539683 C15.0736698,6.82539683 16.5134556,7.1510652 17.8808704,7.80241173 C19.2482852,8.45375826 20.4548096,9.35560915 21.5004798,10.5079915 C22.54615,11.6603738 23.37463,13.0382015 23.9859449,14.6415161 C24.5972598,16.2448306 24.9029126,17.9984296 24.9029126,19.9023656 C24.9029126,21.8063016 24.5972598,23.5599005 23.9859449,25.1632151 C23.37463,26.7665296 22.54615,28.1443573 21.5004798,29.2967397 C20.4548096,30.449122 19.2482852,31.3509729 17.8808704,32.0023194 C16.5134556,32.6536659 15.0736698,32.9793343 13.5614699,32.9793343 C11.7596997,32.9793343 10.2475225,32.6119136 9.02489275,31.8770611 C7.80226302,31.1422086 6.90139147,30.2570586 6.32225107,29.2215847 L5.9361594,29.2215847 L6.32225107,32.7288177 L6.32225107,43 L0,43 L0,7.62705008 Z M12.1237864,27.3015873 C12.947551,27.3015873 13.7316998,27.1309541 14.4762562,26.7896825 C15.2208127,26.448411 15.8782303,25.970638 16.4485289,25.3563492 C17.0188274,24.7420604 17.4782277,23.9912743 17.8267435,23.1039683 C18.1752593,22.2166622 18.3495146,21.2269896 18.3495146,20.1349206 C18.3495146,19.0428517 18.1752593,18.053179 17.8267435,17.165873 C17.4782277,16.278567 17.0188274,15.5277808 16.4485289,14.9134921 C15.8782303,14.2992033 15.2208127,13.8214303 14.4762562,13.4801587 C13.7316998,13.1388872 12.947551,12.968254 12.1237864,12.968254 C11.3000218,12.968254 10.5158731,13.1303555 9.77131661,13.4545635 C9.02676015,13.7787715 8.36934251,14.2480128 7.79904395,14.8623016 C7.22874539,15.4765904 6.76934511,16.2273765 6.42082932,17.1146825 C6.07231353,18.0019886 5.89805825,19.0087245 5.89805825,20.1349206 C5.89805825,21.2611167 6.07231353,22.2678527 6.42082932,23.1551587 C6.76934511,24.0424648 7.22874539,24.7932509 7.79904395,25.4075397 C8.36934251,26.0218285 9.02676015,26.4910698 9.77131661,26.8152778 C10.5158731,27.1394857 11.3000218,27.3015873 12.1237864,27.3015873 Z M39.9757282,6.82539683 C41.7955655,6.82539683 43.4637247,7.15685675 44.9802558,7.81978654 C46.4967869,8.48271632 47.8057731,9.40060534 48.9072535,10.5734811 C50.008734,11.7463569 50.8707493,13.1486873 51.4933252,14.7805145 C52.1159012,16.4123417 52.4271845,18.1971259 52.4271845,20.1349206 C52.4271845,22.0727154 52.1159012,23.8574996 51.4933252,25.4893268 C50.8707493,27.1211539 50.008734,28.5234844 48.9072535,29.6963602 C47.8057731,30.8692359 46.4967869,31.7871249 44.9802558,32.4500547 C43.4637247,33.1129845 41.7955655,33.4444444 39.9757282,33.4444444 C38.1558908,33.4444444 36.4877316,33.1129845 34.9712005,32.4500547 C33.4546694,31.7871249 32.1456833,30.8692359 31.0442028,29.6963602 C29.9427223,28.5234844 29.080707,27.1211539 28.4581311,25.4893268 C27.8355551,23.8574996 27.5242718,22.0727154 27.5242718,20.1349206 C27.5242718,18.1971259 27.8355551,16.4123417 28.4581311,14.7805145 C29.080707,13.1486873 29.9427223,11.7463569 31.0442028,10.5734811 C32.1456833,9.40060534 33.4546694,8.48271632 34.9712005,7.81978654 C36.4877316,7.15685675 38.1558908,6.82539683 39.9757282,6.82539683 Z M39.6480583,27.3015873 C40.4524199,27.3015873 41.232639,27.1394857 41.988739,26.8152778 C42.744839,26.4910698 43.4124491,26.0218285 43.9915895,25.4075397 C44.5707299,24.7932509 45.0292092,24.0424648 45.3670411,23.1551587 C45.704873,22.2678527 45.8737864,21.2611167 45.8737864,20.1349206 C45.8737864,19.0087245 45.704873,18.0019886 45.3670411,17.1146825 C45.0292092,16.2273765 44.5707299,15.4765904 43.9915895,14.8623016 C43.4124491,14.2480128 42.744839,13.7787715 41.988739,13.4545635 C41.232639,13.1303555 40.4524199,12.968254 39.6480583,12.968254 C38.8115221,12.968254 38.0232595,13.1303555 37.2832468,13.4545635 C36.5432341,13.7787715 35.8836674,14.2480128 35.304527,14.8623016 C34.7253866,15.4765904 34.2669073,16.2273765 33.9290754,17.1146825 C33.5912435,18.0019886 33.4223301,19.0087245 33.4223301,20.1349206 C33.4223301,21.2611167 33.5912435,22.2678527 33.9290754,23.1551587 C34.2669073,24.0424648 34.7253866,24.7932509 35.304527,25.4075397 C35.8836674,26.0218285 36.5432341,26.4910698 37.2832468,26.8152778 C38.0232595,27.1394857 38.8115221,27.3015873 39.6480583,27.3015873 Z M65.5669415,22.8524397 C65.5669415,23.4254389 65.6234914,23.9562978 65.736593,24.4450323 C65.8496947,24.9337669 66.0678159,25.3466571 66.3909634,25.6837155 C66.8433699,26.2230088 67.4896551,26.4926514 68.3298386,26.4926514 C68.782245,26.4926514 69.1700162,26.4420934 69.4931637,26.3409759 C69.8163111,26.2398584 70.171768,26.1050371 70.559545,25.9365079 L70.9957919,32.1552028 C70.349497,32.3911436 69.7436045,32.5512439 69.1780965,32.6355085 C68.6125884,32.7197731 67.9259103,32.7619048 67.1180416,32.7619048 C65.9223959,32.7619048 64.8479467,32.5680991 63.8946616,32.1804821 C62.9413766,31.792865 62.1415986,31.2620061 61.4953036,30.5878895 C59.9765105,29.071127 59.2171253,26.9139862 59.2171253,24.1164021 L59.2171253,13.2463257 L55.0485437,13.2463257 L55.0485437,7.58377425 L59.2171253,7.58377425 L59.2171253,0 L65.5669415,0 L65.5669415,7.58377425 L74.6796547,7.58377425 L74.6796547,0 L81.0294709,0 L81.0294709,7.58377425 L86.8460964,7.58377425 L86.8460964,13.2463257 L81.0294709,13.2463257 L81.0294709,22.8524397 C81.0294709,23.4254389 81.0860209,23.9562978 81.1991225,24.4450323 C81.3122241,24.9337669 81.5303454,25.3466571 81.8534928,25.6837155 C82.3058993,26.2230088 82.9521846,26.4926514 83.792368,26.4926514 C84.3417187,26.4926514 84.7779613,26.4336671 85.1011087,26.3156966 C85.4242562,26.1977262 85.7312417,26.0376259 86.0220745,25.8353909 L87.815534,31.6496179 C87.0722948,32.020382 86.2725168,32.298451 85.416176,32.483833 C84.5598352,32.6692151 83.614643,32.7619048 82.580571,32.7619048 C81.3849254,32.7619048 80.3104761,32.5680991 79.3571911,32.1804821 C78.403906,31.792865 77.604128,31.2620061 76.9578331,30.5878895 C75.4390399,29.071127 74.6796547,26.9139862 74.6796547,24.1164021 L74.6796547,13.2463257 L65.5669415,13.2463257 L65.5669415,22.8524397 Z M114.296505,26.6112023 C113.197276,28.6509863 111.718189,30.2997869 109.859199,31.5576537 C108.000209,32.8155205 105.729043,33.4444444 103.045631,33.4444444 C101.235137,33.4444444 99.5620708,33.1129845 98.0263835,32.4500547 C96.4906962,31.7871249 95.157093,30.860737 94.025534,29.670863 C92.8939749,28.480989 92.0129886,27.0786586 91.3825485,25.4638296 C90.7521085,23.8490006 90.4368932,22.0727154 90.4368932,20.1349206 C90.4368932,18.3331115 90.7440261,16.624818 91.358301,15.0099891 C91.9725759,13.3951601 92.8293149,11.9843307 93.9285437,10.7774585 C95.0277725,9.57058631 96.3290459,8.61020244 97.8324029,7.89627805 C99.3357599,7.18235366 100.992661,6.82539683 102.803155,6.82539683 C104.710641,6.82539683 106.407954,7.15685675 107.895146,7.81978654 C109.382338,8.48271632 110.627034,9.40060534 111.629272,10.5734811 C112.63151,11.7463569 113.39126,13.1316894 113.908544,14.7295202 C114.425828,16.3273509 114.684466,18.0611413 114.684466,19.9309433 L114.684466,20.5428754 C114.652136,20.7468538 114.635971,20.9338312 114.635971,21.1038132 C114.603641,21.2737952 114.587476,21.4607726 114.587476,21.664751 L96.692767,21.664751 C96.822088,22.6846429 97.0888087,23.5600371 97.4929369,24.2909597 C97.8970651,25.0218823 98.3981766,25.6338083 98.9962864,26.1267561 C99.5943962,26.6197039 100.249074,26.9766607 100.96034,27.1976373 C101.671605,27.4186139 102.399025,27.5291005 103.142621,27.5291005 C104.597483,27.5291005 105.801767,27.1806427 106.75551,26.4837165 C107.709252,25.7867903 108.46092,24.9113961 109.010534,23.8575078 L114.296505,26.6112023 Z M108.131068,16.3809524 C108.099729,15.9259237 107.966543,15.4183992 107.731504,14.8583639 C107.496466,14.2983285 107.151747,13.7733032 106.697339,13.2832723 C106.242931,12.7932413 105.678847,12.390722 105.005069,12.0757021 C104.331292,11.7606822 103.524338,11.6031746 102.584183,11.6031746 C101.267967,11.6031746 100.10846,12.0231948 99.1056286,12.8632479 C98.102797,13.7033009 97.3976916,14.8758574 96.9902913,16.3809524 L108.131068,16.3809524 Z M117.961165,6.8633157 L124.000867,6.8633157 L124.000867,10.3626858 L124.393694,10.3626858 C124.688315,9.74514682 125.081137,9.17907791 125.572172,8.66446208 C126.063207,8.14984626 126.611522,7.70385256 127.217132,7.32646762 C127.822742,6.94908269 128.477445,6.65747142 129.181262,6.45162509 C129.885079,6.24577876 130.580702,6.14285714 131.268151,6.14285714 C132.119279,6.14285714 132.847637,6.22862516 133.453247,6.40016377 C134.058857,6.57170238 134.574436,6.79469922 135,7.069161 L133.281386,13.1930587 C132.888557,12.9872124 132.454816,12.8242531 131.980149,12.7041761 C131.505482,12.5840991 130.924432,12.5240615 130.236983,12.5240615 C129.353119,12.5240615 128.551107,12.7041743 127.830922,13.0644054 C127.110738,13.4246365 126.496953,13.9306678 125.98955,14.5825145 C125.482147,15.2343612 125.089325,15.9976966 124.811071,16.8725435 C124.532818,17.7473904 124.393694,18.6994154 124.393694,19.728647 L124.393694,32.0793651 L117.961165,32.0793651 L117.961165,6.8633157 Z" id="potter-copy-5" fill="#000000"></path>
                        <ellipse id="Oval" fill="#0056FF" cx="135" cy="27.5" rx="4" ry="4.5"></ellipse>
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
				<div class="potter-core-content-inner">
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
