<?php
/**
 * Admin settings helper
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package     Potter
 * @author      wppotter
 * @copyright   Copyright (c) 2020, Potter
 * @link        https://www.pottertheme.com
 * @since       Potter 1.1.3
 */

if (! defined('ABSPATH')) {
    exit;
}

if (! class_exists('Potter_Admin_Settings')) {


    /**
     * Potter Admin Settings
     */
    class Potter_Admin_Settings
    {

        /**
         * Menu page title
         *
         * @since 4.0.3
         * @var array $menu_page_title
         */
        public static $menu_page_title = 'Potter Theme';

        /**
         * Page title
         *
         * @since 4.0.3
         * @var array $page_title
         */
        public static $page_title = 'Potter';

        /**
         * Plugin slug
         *
         * @since 4.0.3
         * @var array $plugin_slug
         */
        public static $plugin_slug = 'potter';

        /**
         * Default Menu position
         *
         * @since 4.0.3
         * @var array $default_menu_position
         */
        public static $default_menu_position = 'themes.php';

        /**
         * Parent Page Slug
         *
         * @since 4.0.3
         * @var array $parent_page_slug
         */
        public static $parent_page_slug = 'general';

        /**
         * Current Slug
         *
         * @since 4.0.3
         * @var array $current_slug
         */
        public static $current_slug = 'general';

        /**
         * Constructor
         */
        public function __construct()
        {
            if (! is_admin()) {
                return;
            }

            add_action('after_setup_theme', __CLASS__ . '::init_admin_settings', 99);
        }

        /**
         * Admin settings init
         *
         * @since 4.0.3
         */
        public static function init_admin_settings()
        {
            self::$menu_page_title = apply_filters('potter_menu_page_title', __('Potter Options', 'potter'));
            self::$page_title      = apply_filters('potter_page_title', __('Potter', 'potter'));
            self::$plugin_slug     = self::get_theme_page_slug();

            if (isset($_REQUEST['page']) && strpos($_REQUEST['page'], self::$plugin_slug) !== false) {
                add_action('admin_enqueue_scripts', __CLASS__ . '::styles_scripts');
            }

            add_action('admin_menu', __CLASS__ . '::add_admin_menu', 99);

            add_action('potter_menu_general_action', __CLASS__ . '::general_page');

            add_action('potter_menu_upgrade_to_pro_action', __CLASS__ . '::upgrade_to_pro_page');

            add_action('potter_header_right_section', __CLASS__ . '::top_header_right_section');

            add_action('potter_welcome_page_right_sidebar_content', __CLASS__ . '::potter_welcome_page_starter_sites_section', 10);
            add_action('potter_welcome_page_right_sidebar_content', __CLASS__ . '::potter_welcome_page_potterkit_section', 11);
            add_action('potter_welcome_page_right_sidebar_content', __CLASS__ . '::potter_welcome_page_support_section', 12);

            add_action('potter_welcome_page_content', __CLASS__ . '::potter_welcome_page_content');
        }

        /**
         * Theme options page Slug getter including White Label string.
         *
         * @since 4.0.3
         * @return string Theme Options Page Slug.
         */
        public static function get_theme_page_slug()
        {
            return apply_filters('potter_theme_page_slug', self::$plugin_slug);
        }

        /**
         * Enqueues the needed CSS/JS for the builder's admin settings page.
         *
         * @since 1.0
         */
        public static function styles_scripts()
        {
            wp_enqueue_style('potter-admin-settings', POTTER_THEME_URI . '/admin/css/potter-admin-menu-page.css', array(), POTTER_VERSION);
        }

        /**
         * Add main menu
         *
         * @since 1.0
         */
        public static function add_admin_menu()
        {
            $parent_page    = self::$default_menu_position;
            $page_title     = self::$menu_page_title;
            $capability     = 'manage_options';
            $page_menu_slug = self::$plugin_slug;
            $page_menu_func = __CLASS__ . '::menu_callback';

            if (apply_filters('potter_dashboard_admin_menu', true)) {
                add_theme_page($page_title, $page_title, $capability, $page_menu_slug, $page_menu_func);
            } else {
                do_action('pottera_register_admin_menu', $parent_page, $page_title, $capability, $page_menu_slug, $page_menu_func);
            }
        }

        /**
         * Menu callback
         *
         * @since 1.0
         */
        public static function menu_callback()
        {
            $current_slug = isset($_GET['action']) ? esc_attr($_GET['action']) : self::$current_slug;

            $active_tab   = str_replace('_', '-', $current_slug);
            $current_slug = str_replace('-', '_', $current_slug);

            $potter_icon           = apply_filters('potter_page_top_icon', true);
            $potter_visit_site_url = 'https://www.pottertheme.com';
            $potter_wrapper_class  = apply_filters('potter_welcome_wrapper_class', array( $current_slug ));

            $potter_recommended_addons_screen = (isset($_GET['action']) && 'upgrade_to_pro' === $_GET['action']) ? true : false; //phpcs:ignore?>

			<div class="potter-menu-page-wrapper wrap potter-clear <?php echo esc_attr(implode(' ', $potter_wrapper_class)); ?>">
				<div class="potter-theme-page-header">
					<div class="potter-container potter-flex">
						<div class="potter-theme-title">
							<a href="<?php echo esc_url($potter_visit_site_url); ?>" target="_blank" rel="noopener" >
								<?php if ($potter_icon) { ?>
										<svg width="150px"  viewBox="0 0 803 205" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
  <g id="logo" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <g id="Group-131">
          <path d="M327,130.417323 C327,141.488244 325.036418,151.587881 321.109195,160.716535 C317.181973,169.84519 311.865934,177.662697 305.16092,184.169291 C298.455905,190.675886 290.505793,195.77426 281.310345,199.464567 C272.114897,203.154874 262.344879,205 252,205 C241.655121,205 231.885103,203.154874 222.689655,199.464567 C213.494207,195.77426 205.544095,190.675886 198.83908,184.169291 C192.134066,177.662697 186.818027,169.84519 182.890805,160.716535 C178.963582,151.587881 177,141.488244 177,130.417323 C177,119.346401 178.963582,109.295321 182.890805,100.26378 C186.818027,91.2322383 192.134066,83.5118431 198.83908,77.1023622 C205.544095,70.6928813 213.494207,65.740175 222.689655,62.2440945 C231.885103,58.748014 241.655121,57 252,57 C262.344879,57 272.114897,58.748014 281.310345,62.2440945 C290.505793,65.740175 298.455905,70.6928813 305.16092,77.1023622 C311.865934,83.5118431 317.181973,91.2322383 321.109195,100.26378 C325.036418,109.295321 327,119.346401 327,130.417323 Z M293,131.709677 C293,126.290295 292.18466,120.919381 290.553957,115.596774 C288.923253,110.274167 286.477235,105.483892 283.215827,101.225806 C279.95442,96.9677206 275.829761,93.5322711 270.841727,90.9193548 C265.853692,88.3064385 259.906509,87 253,87 C246.093491,87 240.146308,88.3064385 235.158273,90.9193548 C230.170239,93.5322711 226.04558,96.9677206 222.784173,101.225806 C219.522765,105.483892 217.076747,110.274167 215.446043,115.596774 C213.81534,120.919381 213,126.290295 213,131.709677 C213,137.129059 213.81534,142.54836 215.446043,147.967742 C217.076747,153.387124 219.522765,158.225785 222.784173,162.483871 C226.04558,166.741957 230.170239,170.225793 235.158273,172.935484 C240.146308,175.645175 246.093491,177 253,177 C259.906509,177 265.853692,175.645175 270.841727,172.935484 C275.829761,170.225793 279.95442,166.741957 283.215827,162.483871 C286.477235,158.225785 288.923253,153.387124 290.553957,147.967742 C292.18466,142.54836 293,137.129059 293,131.709677 Z M533.577558,200.230408 C528.543429,202.743482 505.405973,204 499.016502,204 C489.722726,204 482.171646,202.695154 476.363036,200.085423 C470.554426,197.475692 466.004417,193.899448 462.712871,189.356583 C459.421326,184.813718 457.146321,179.594335 455.887789,173.698276 C454.629257,167.802217 454,161.471298 454,154.705329 L454,89.7523511 L454,61.9153605 L454,37.8479624 C454,33.788381 454.629257,30.5504301 455.887789,28.1340125 C457.146321,25.717595 458.646856,23.8328176 460.389439,22.4796238 C462.132022,21.12643 463.971387,20.2082051 465.907591,19.7249216 C467.843794,19.2416381 469.586351,19 471.135314,19 C472.490656,19 474.184808,19.2416381 476.217822,19.7249216 C478.250835,20.2082051 480.138605,21.12643 481.881188,22.4796238 C483.623771,23.8328176 485.124306,25.717595 486.382838,28.1340125 C487.64137,30.5504301 488.270627,33.788381 488.270627,37.8479624 L488.270627,61.9153605 L521.669967,61.9153605 C524.961513,61.9153605 527.623752,62.4469644 529.656766,63.5101881 C531.689779,64.5734118 533.287123,65.8299301 534.448845,67.2797806 C535.610567,68.7296311 536.385037,70.2277875 536.772277,71.7742947 C537.159518,73.3208019 537.353135,74.6739754 537.353135,75.8338558 C537.353135,76.9937362 537.159518,78.3952373 536.772277,80.0384013 C536.385037,81.6815652 535.610567,83.2280492 534.448845,84.6778997 C533.287123,86.1277502 531.689779,87.3359408 529.656766,88.3025078 C527.623752,89.2690748 524.961513,89.7523511 521.669967,89.7523511 L488.270627,89.7523511 L488.270627,154.415361 C488.270627,183.702194 510.14957,175.293103 519.056106,175.293103 C519.830587,175.293103 520.701865,175.244776 521.669967,175.148119 C522.638069,175.051462 523.606156,174.90648 524.574257,174.713166 C525.735979,174.519853 526.558853,174.423197 527.042904,174.423197 L528.640264,174.423197 C533.093532,174.423197 536.433432,175.776371 538.660066,178.482759 C540.8867,181.189146 542,184.185459 542,187.471787 C542,193.271189 539.192547,197.52402 533.577558,200.230408 Z M428.577558,200.230408 C423.543429,202.743482 400.405973,204 394.016502,204 C384.722726,204 377.171646,202.695154 371.363036,200.085423 C365.554426,197.475692 361.004417,193.899448 357.712871,189.356583 C354.421326,184.813718 352.146321,179.594335 350.887789,173.698276 C349.629257,167.802217 349,161.471298 349,154.705329 L349,89.7523511 L349,61.9153605 L349,37.8479624 C349,33.788381 349.629257,30.5504301 350.887789,28.1340125 C352.146321,25.717595 353.646856,23.8328176 355.389439,22.4796238 C357.132022,21.12643 358.971387,20.2082051 360.907591,19.7249216 C362.843794,19.2416381 364.586351,19 366.135314,19 C367.490656,19 369.184808,19.2416381 371.217822,19.7249216 C373.250835,20.2082051 375.138605,21.12643 376.881188,22.4796238 C378.623771,23.8328176 380.124306,25.717595 381.382838,28.1340125 C382.64137,30.5504301 383.270627,33.788381 383.270627,37.8479624 L383.270627,61.9153605 L416.669967,61.9153605 C419.961513,61.9153605 422.623752,62.4469644 424.656766,63.5101881 C426.689779,64.5734118 428.287123,65.8299301 429.448845,67.2797806 C430.610567,68.7296311 431.385037,70.2277875 431.772277,71.7742947 C432.159518,73.3208019 432.353135,74.6739754 432.353135,75.8338558 C432.353135,76.9937362 432.159518,78.3952373 431.772277,80.0384013 C431.385037,81.6815652 430.610567,83.2280492 429.448845,84.6778997 C428.287123,86.1277502 426.689779,87.3359408 424.656766,88.3025078 C422.623752,89.2690748 419.961513,89.7523511 416.669967,89.7523511 L383.270627,89.7523511 L383.270627,154.415361 C383.270627,183.702194 405.14957,175.293103 414.056106,175.293103 C414.830587,175.293103 415.701865,175.244776 416.669967,175.148119 C417.638069,175.051462 418.606156,174.90648 419.574257,174.713166 C420.735979,174.519853 421.558853,174.423197 422.042904,174.423197 L423.640264,174.423197 C428.093532,174.423197 431.433432,175.776371 433.660066,178.482759 C435.8867,181.189146 437,184.185459 437,187.471787 C437,193.271189 434.192547,197.52402 428.577558,200.230408 Z M590.639175,142.070866 C591.024057,147.12076 592.323013,151.733575 594.536082,155.909449 C596.749152,160.085323 599.683831,163.678463 603.340206,166.688976 C606.996582,169.69949 611.133998,172.078731 615.752577,173.826772 C620.371157,175.574812 625.182106,176.448819 630.185567,176.448819 C637.498318,176.448819 643.512004,175.380588 648.226804,173.244094 C652.941604,171.107601 657.512005,168.194244 661.938144,164.503937 C664.439875,162.367443 666.556692,161.007877 668.28866,160.425197 C670.020627,159.842517 671.848788,159.551181 673.773196,159.551181 C677.622012,159.551181 680.893457,160.813636 683.587629,163.338583 C686.2818,165.86353 687.628866,169.262446 687.628866,173.535433 C687.628866,175.089247 687.24399,177.031484 686.474227,179.362205 C685.704464,181.692925 684.16496,183.926499 681.85567,186.062992 C675.120241,192.6667 667.663271,197.473738 659.484536,200.484252 C651.305801,203.494766 641.635795,205 630.474227,205 C619.697541,205 609.786987,203.300542 600.742268,199.901575 C591.697549,196.502608 583.855703,191.695569 577.216495,185.480315 C570.577286,179.265061 565.381462,171.641777 561.628866,162.610236 C557.87627,153.578695 556,143.333391 556,131.874016 C556,120.608868 557.87627,110.363563 561.628866,101.137795 C565.381462,91.9120274 570.529177,84.0459643 577.072165,77.5393701 C583.615153,71.0327759 591.36078,65.9829576 600.309278,62.3897638 C609.257777,58.79657 618.927783,57 629.319588,57 C637.594543,57 645.484499,58.2138986 652.989691,60.6417323 C660.494883,63.0695659 667.133992,66.7598178 672.907216,71.7125984 C678.680441,76.6653791 683.539499,82.929096 687.484536,90.503937 C691.429573,98.078778 694.075595,107.013072 695.42268,117.307087 C695.615121,118.8609 695.75945,120.171911 695.85567,121.240157 C695.951891,122.308404 696,123.425191 696,124.590551 C696,130.805805 694.412387,135.272952 691.237113,137.992126 C688.06184,140.7113 683.587658,142.070866 677.814433,142.070866 L590.639175,142.070866 Z M663,117 C663,112.637909 662.374667,108.465537 661.123984,104.482759 C659.8733,100.49998 657.901097,96.9913945 655.207317,93.9568966 C652.513537,90.9223986 649.098259,88.5043194 644.961382,86.7025862 C640.824505,84.9008531 635.966153,84 630.386179,84 C619.995883,84 611.193126,87.0818657 603.977642,93.2456897 C596.762159,99.4095136 592.769652,107.327538 592,117 L663,117 Z M749.736842,184.419483 C749.736842,188.510955 749.109655,191.871756 747.855263,194.501988 C746.600871,197.13222 745.057027,199.129218 743.223684,200.493042 C741.390342,201.856866 739.460536,202.782304 737.434211,203.269384 C735.407885,203.756464 733.719305,204 732.368421,204 C730.824554,204 729.087729,203.756464 727.157895,203.269384 C725.228061,202.782304 723.3465,201.856866 721.513158,200.493042 C719.679815,199.129218 718.135971,197.13222 716.881579,194.501988 C715.627187,191.871756 715,188.510955 715,184.419483 L715,77.1650099 C715,73.2683702 715.627187,70.1023979 716.881579,67.666998 C718.135971,65.2315982 719.63157,63.3320148 721.368421,61.9681909 C723.105272,60.6043669 724.890342,59.6789289 726.723684,59.1918489 C728.557027,58.7047689 730.149116,58.4612326 731.5,58.4612326 C732.850884,58.4612326 734.491218,58.7047689 736.421053,59.1918489 C738.350887,59.6789289 740.184202,60.6043669 741.921053,61.9681909 C743.657903,63.3320148 745.153503,65.2315982 746.407895,67.666998 C747.662287,70.1023979 748.289474,73.2683702 748.289474,77.1650099 L748.289474,84.471173 L748.868421,84.471173 C751.570189,76.8727254 756.153476,70.394659 762.618421,65.0367793 C769.083366,59.6788997 776.561361,57 785.052632,57 C790.263184,57 794.557001,58.3150962 797.934211,60.945328 C801.31142,63.5755599 803,67.4234339 803,72.4890656 C803,76.9702013 801.552646,80.9154899 798.657895,84.3250497 C795.763143,87.7346095 790.93863,89.4393638 784.184211,89.4393638 C773.184156,89.4393638 764.693012,93.1898233 758.710526,100.690855 C752.72804,108.191886 749.736842,117.787218 749.736842,129.477137 L749.736842,184.419483 Z" id="potter-copy-5" fill="#1F005E"></path>
          <g id="Group-128-Copy">
              <path d="M75.9762877,152 L75.9762877,198.033977 C75.9762877,198.033977 76.7724975,202.27377 69.137403,205 L41.3473893,205 C41.3473893,205 6.83841374,204.090823 4.09001565,184.708267 C4.09001565,184.708267 -0.185925584,154.120546 50.2033387,152 L75.9762877,152 Z" id="Fill-4" fill="#0F89FF"></path>
              <path d="M0,157 L0,34.6545192 C0,34.6545192 2.73160017,0.300685764 49.7777792,0 L89.5390398,0 C89.5390398,0 143.566626,3.013324 151.761427,61.4737495 C151.761427,61.4737495 159.349856,126.262802 88.9320175,136.810083 L44.9216011,136.810083 C44.9216011,136.810083 13.6586521,137.412747 0,157" id="Fill-1" fill="#07123B"></path>
                      </g>
                  </g>
              </g>
										</svg>
									<span class="potter-theme-version"><?php echo esc_html(POTTER_VERSION); ?></span>
								<?php } ?>
								<?php do_action('potter_welcome_page_header_title'); ?>
							</a>
						</div>

						<?php do_action('potter_header_right_section'); ?>

					</div>
				</div>
			</div>
			<div class="wrap potter-theme-options-page">
				<?php do_action('potter_menu_' . esc_attr($current_slug) . '_action'); ?>
			</div>
			<?php
        }

        /**
         * Include general page
         *
         * @since 4.0.3
         */
        public static function general_page()
        {
            require_once POTTER_THEME_DIR . '/admin/templates/get-started.php';
        }


        /**
         * Include Welcome page right starter sites content
         *
         * @since 4.0.3
         */
        public static function potter_welcome_page_starter_sites_section()
        {
            ?>

			<div class="potter-import-starter-sites-section">
				<div class="template-contente">
				<h2 class="template-heading">
					<span><?php echo esc_html(apply_filters('potter_sites_menu_page_title', __('Ready to use page builder templates', 'potter'))); ?></span>
				</h2>
			<!--	<img class="potter-starter-sites-img" src="<?php echo esc_url(POTTER_THEME_URI . 'images/potter-starter-sites.png'); ?>">-->
				<div class="inside">
					<p>
						<?php
              esc_html_e('Install Potter Kit for Gutenberg & Elementor to get ready-to-use website templates that can be imported with one click.', 'potter'); ?>
              <?php echo Potter_Plugin_Install_Helper::instance()->get_button_html('potter-kit'); //phpcs:ignore?>
								<?php
                    $potter_facebook_group_link      = 'https://wordpress.org/plugins/potter-kit';
            $potter_facebook_group_link_text = __('Learn More &raquo;', 'potter');

            printf(
                '%1$s',
                ! empty($potter_facebook_group_link) ? '<p><a href=' . esc_url($potter_facebook_group_link) . ' target="_blank" rel="noopener">' . esc_html($potter_facebook_group_link_text) . '</a></p>' :
                            esc_html($potter_facebook_group_link_text)
            ); ?>
					</p>
					<div>
					</div>
				</div>
			</div>
			</div>

			<?php
        }

        public static function potter_welcome_page_potterkit_section()
        {
            ?>

			<div class="postbox potter-support-section">
				<h2 class="handle">
					<span>

        <svg width="30px" viewBox="0 0 86 86" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display: inline-block; vertical-align: middle; margin-right: 10px; border-radius: 4px;">
            <g id="logo" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <path d="M0,0 L86,0 L86,86 L0,86 L0,0 Z M54.8461538,50.1641791 L54.8461538,36.7910448 L56.8455798,36.7910448 C60.0109133,36.7910448 62.5769231,34.225035 62.5769231,31.0597015 C62.5769231,27.894368 60.0109133,25.3283582 56.8455798,25.3283582 L27,25.3283582 L27,11 L57.4179104,11 C68.2327999,11 77,19.7672001 77,30.5820896 C77,35.4497103 75.2239703,39.902517 72.284574,43.3278469 C75.2208963,46.6869501 77,51.0834703 77,55.8955224 C77,66.446634 68.446634,75 57.8955224,75 L27,75 L27,61.6268657 L56.8455798,61.6268657 C60.0109133,61.6268657 62.5769231,59.0608559 62.5769231,55.8955224 C62.5769231,52.7301889 60.0109133,50.1641791 56.8455798,50.1641791 L54.8461538,50.1641791 Z M52,50.1641791 L27,50.1641791 L27,43.4776119 L27,36.7910448 L52,36.7910448 L52,50.1641791 Z M9,11 L24,11 L24,75 L9,75 L9,11 Z" id="Combined-Shape" fill="#E0105F"></path>
            </g>
        </svg>
            <?php esc_html_e('Elementor Blocks', 'potter'); ?></span>
				</h2>
				<div class="inside">
					<p>
						<?php esc_html_e('Elementor Blocks is a block building fetaure of Potter Kit. Using this feature you can create Block template with Elementor and publish them in non editable areas like above header and many more places. To use this feature you need to install and active Elementor plugin.', 'potter'); ?>
					</p>
					<?php
                    $potterkit_link           = 'https://wppotter.com/potter-kit';
            $potterkit_link_text = __('Know More &raquo;', 'potter');

            printf(
                        /* translators: %1$s: Potter Support link. */
                        '%1$s',
                ! empty($potterkit_link) ? '<a href=' . esc_url($potterkit_link) . ' target="_blank" rel="noopener">' . esc_html($potterkit_link_text) . '</a>' :
                            esc_html($potterkit_link_text)
            ); ?>
				</div>
			</div>
			<?php
        }


        /**
         * Include support section on right side of the Potter Options page
         *
         * @since 4.0.3
         */
        public static function potter_welcome_page_support_section()
        {
            ?>

			<div class="postbox potter-support-section">
				<h2 class="handle">
					<span><?php esc_html_e('Support', 'potter'); ?></span>
				</h2>
				<div class="inside">
					<p>
						<?php esc_html_e('Have questions? Get in touch with us. We\'ll be happy to help', 'potter'); ?>
					</p>
					<?php
                    $potter_support_link           = 'https://pottertheme.com/support/';
            $potter_support_link_link_text = __('Request Support &raquo;', 'potter');

            printf(
                        /* translators: %1$s: Potter Support link. */
                        '%1$s',
                ! empty($potter_support_link) ? '<a href=' . esc_url($potter_support_link) . ' target="_blank" rel="noopener">' . esc_html($potter_support_link_link_text) . '</a>' :
                            esc_html($potter_support_link_link_text)
            ); ?>
				</div>
			</div>
			<?php
        }

        /**
         * Include Welcome page content
         *
         * @since 1.2.4
         */
        public static function potter_welcome_page_content()
        {

            // Quick settings.
            $quick_settings = apply_filters(
                'potter_quick_settings',
                array(
                    'change-layout' => array(
                        'title'     => __('Change site layout', 'potter'),
                        'dashicon'  => 'dashicons-welcome-widgets-menus',
                        'quick_url' => 'https://pottertheme.com/blog/docs/page-posts-settings/layout-settings/',
                    ),
                    'typography'    => array(
                        'title'     => __('Customize fonts/typography', 'potter'),
                        'dashicon'  => 'dashicons-editor-textcolor',
                        'quick_url' => 'https://pottertheme.com/blog/docs/customize-potter/color-typography/',
                    ),
                    'logo-favicon'  => array(
                        'title'     => __('Upload logo & site icon', 'potter'),
                        'dashicon'  => 'dashicons-format-image',
                        'quick_url' => 'https://pottertheme.com/blog/docs/customize-potter/set-site-logo-and-icons/',
                    ),
                    'navigation'    => array(
                        'title'     => __('Add/edit navigation menu', 'potter'),
                        'dashicon'  => 'dashicons-menu',
                        'quick_url' => 'https://pottertheme.com/blog/docs/customize-potter/menu-settings/',
                    ),
                    'header'        => array(
                        'title'     => __('Customize header options', 'potter'),
                        'dashicon'  => 'dashicons-editor-table',
                        'quick_url' => 'https://pottertheme.com/blog/docs/customize-potter/header-settings/',
                    ),
                    'footer'        => array(
                        'title'     => __('Customize footer options', 'potter'),
                        'dashicon'  => 'dashicons-editor-table',
                        'quick_url' => 'https://pottertheme.com/blog/docs/customize-potter/footer-settings/',
                    ),
                    'blog-layout'   => array(
                        'title'     => __('Update blog layout', 'potter'),
                        'dashicon'  => 'dashicons-welcome-write-blog',
                        'quick_url' => 'https://pottertheme.com/blog/docs/customize-potter/blog-settings/',
                    ),
                    'page'          => array(
                        'title'     => __('Blog and Home page setuo', 'potter'),
                        'dashicon'  => 'dashicons-welcome-widgets-menus',
                        'quick_url' => 'https://pottertheme.com/blog/docs/customize-potter/setting-up-home-and-blog-pages/',
                    ),
                    'transparent-header'          => array(
                        'title'     => __('How To Set Transparent Header', 'potter'),
                        'dashicon'  => 'dashicons-welcome-widgets-menus',
                        'quick_url' => 'https://pottertheme.com/blog/docs/how-to/how-to-set-transparent-header/',
                    ),
                    'sgticky-header'          => array(
                        'title'     => __('How To Add A Sticky Header', 'potter'),
                        'dashicon'  => 'dashicons-welcome-widgets-menus',
                        'quick_url' => 'https://pottertheme.com/blog/docs/how-to/how-to-set-sticky-header/',
                    ),
                )
            ); ?>
			<div class="postbox potter-quick-setting-section">
				<h2 class="handle"><span><?php esc_html_e('Resources:', 'potter'); ?></span></h2>
				<div class="potter-quick-setting-section-inner">
					<?php
                    if (! empty($quick_settings)) :
                        ?>
						<div class="potter-quick-links">
							<ul class="potter-flex">
								<?php
                                foreach ((array) $quick_settings as $key => $link) {
                                    echo '<li class=""><span class="dashicons ' . esc_attr($link['dashicon']) . '"></span><a class="potter-quick-setting-title" href="' . esc_url($link['quick_url']) . '" target="_blank" rel="noopener">' . esc_html($link['title']) . '</a></li>';
                                } ?>
							</ul>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<div class="postbox">
				<h2 class="handle"><?php esc_html_e('Slack Community', 'potter'); ?></h2>
				<div class="potter-documentation-section">
					<div class="resposive-documentation">
						<p>
							<?php esc_html_e('Meet the Potter Power-users. Say hello, ask questions, give feedback, and help each other', 'potter'); ?>
						</p>
						<?php
                        $potter_facebook_group_link      = 'https://join.slack.com/t/potter-corp/shared_invite/enQtOTM1ODAyNjE1MjcxLWI4MjdlNDliOWQ4ZWQ0ZDQwZWY1NjYzZTRhY2RhNmQxY2IzYTIzMTdlZDQ1Mjk4MTdmOTc4NDg2YTYwNDgwZjY';
            $potter_facebook_group_link_text = __('Join Slack Channel &raquo;', 'potter');

            printf(
                '%1$s',
                ! empty($potter_facebook_group_link) ? '<a href=' . esc_url($potter_facebook_group_link) . ' target="_blank" rel="noopener">' . esc_html($potter_facebook_group_link_text) . '</a>' :
                                esc_html($potter_facebook_group_link_text)
            ); ?>
					</div>
				</div>
			</div>

			<?php
        }
        /**
         * Potter Header Right Section Links
         *
         * @since 4.0.3
         */
        public static function top_header_right_section()
        {
            $top_links = apply_filters(
                'potter_header_top_links',
                array(
                    'potter-theme-info' => array(
                        'title' => __('The fastest WordPress theme ever created', 'potter'),
                    ),
                )
            );

            if (! empty($top_links)) {
                ?>
				<div class="potter-top-links">
					<ul>
						<?php
                        foreach ((array) $top_links as $key => $info) {
                            if (isset($info['url'])) {
                                printf(
                                    /* translators: %1$s: Top Link URL wrapper, %2$s: Top Link URL, %3$s: Top Link URL target attribute */
                                    '<li><%1$s %2$s %3$s > %4$s </%1$s>',
                                    'a',
                                    'href="' . esc_url($info['url']) . '"',
                                    'target="_blank" rel="noopener"',
                                    esc_html($info['title'])
                                );
                            } else {
                                printf(
                                    /* translators: %1$s: Top Link URL wrapper, %2$s: Top Link URL, %3$s: Top Link URL target attribute */
                                    '<li><%1$s %2$s %3$s > %4$s </%1$s>',
                                    'span',
                                    '',
                                    '',
                                    esc_html($info['title'])
                                );
                            }
                        } ?>
					</ul>
				</div>
				<?php
            }
        }
    }

    new Potter_Admin_Settings();
}
