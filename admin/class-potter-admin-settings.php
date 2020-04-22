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
            add_action('potter_welcome_page_right_sidebar_content', __CLASS__ . '::potter_welcome_page_support_section', 11);

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
										<svg width="150px"  viewBox="0 0 427 127" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
										    <g id="logo" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										        <g id="Group-94" transform="translate(0.009766, 0.000000)">
										            <g id="Group-3-Copy-2" fill="#0056FF">
										                <path d="M112.564253,70.1937764 L112.742402,61.1321986 L112.719073,61.1549521 L112.719073,61.1506858 L99.8145926,73.9737001 L120.097404,43.2643087 L123.198042,63.0193162 L112.564253,70.1937764 Z M107.997421,108.093271 L54.4947991,93.0688564 L66.3819928,69.7671484 L87.7676305,91.4249167 L108.671135,70.6566677 L107.997421,108.093271 Z M86.8542642,120.251457 L76.7916823,112.303378 L85.4064514,109.667528 L69.2740838,101.266513 L104.57654,111.181346 L86.8542642,120.251457 Z M39.5486766,119.652756 L37.2178959,63.7950681 L62.9349541,67.9845546 L49.0902439,95.1486677 L75.149461,108.721125 L39.5486766,119.652756 Z M21.5188825,103.184916 L25.9280664,91.09428 L31.0802441,98.5311164 L31.0894343,98.4742327 L31.1127633,98.5083629 L34.0373735,80.5622579 L34.079083,81.5591452 L35.5721399,117.334744 L21.5188825,103.184916 Z M7.49743735,57.735529 L59.5472983,38.2521412 L63.5506987,64.1349484 L33.5813973,59.2657013 L28.8109671,88.3944361 L7.49743735,57.735529 Z M17.4971016,35.4001333 L30.2722118,35.8815119 L24.851397,43.1071674 L24.8549317,43.1064563 L24.8535178,43.1078784 L42.7914098,40.3646607 L8.46170332,53.2139837 L17.4971016,35.4001333 Z M56.1037942,7.92244866 L90.6236675,51.7250521 L69.3822456,62.5222947 L67.3816058,63.5390913 L62.712268,33.3729395 L33.7051118,37.8091592 L56.1037942,7.92244866 Z M80.3136566,10.5860292 L83.8087673,22.9646394 L75.2993322,20.0038414 L83.448228,36.3444032 L60.6762812,7.44675849 L80.3136566,10.5860292 Z M118.234618,39.0378477 L87.4784921,85.6050003 L69.131282,67.0182423 L96.2268728,53.2666011 L83.0459792,26.834866 L118.234618,39.0378477 Z M129.904074,61.2992945 L126.404722,38.9980291 C125.948038,36.0898485 123.945985,33.686511 121.179729,32.7265981 L90.747382,22.164712 L87.1186597,9.31396685 C86.280936,6.34961359 83.7847313,4.12190461 80.7597357,3.63839292 L58.5908087,0.0952477357 C55.7474966,-0.360533132 52.7811769,0.845401894 51.0463465,3.15630333 L31.6599348,28.9971587 L18.3991569,28.497293 C15.2999326,28.3792592 12.4679315,30.0637286 11.0667767,32.8261446 L0.864927604,52.9373866 C-0.464826269,55.5611485 -0.249209613,58.6883314 1.42835867,61.1009125 L19.8575738,87.6108628 L15.2702411,100.190699 C14.2147799,103.083237 14.9323238,106.361162 17.0976806,108.54123 L32.961411,124.514892 C34.454468,126.017334 36.4388482,126.844281 38.5504776,126.844281 C39.3309392,126.844281 40.1064522,126.72838 40.8536876,126.498712 L71.646574,117.051747 L82.0923173,125.303443 C83.4765056,126.397032 85.2099221,127 86.9709093,127 C88.2101748,127 89.4487335,126.70136 90.5529735,126.136078 L110.557958,115.896296 C113.166566,114.560951 114.820098,111.90377 114.874532,108.960037 L115.456344,76.5889295 L126.502986,69.1357391 C129.047263,67.4192726 130.381965,64.342574 129.904074,61.2992945 Z" id="Fill-1"></path>
										            </g>
										            <path d="M153.762207,103.708496 L153.762207,32.9951172 L167.781738,32.9951172 L167.781738,42.7993164 C171.381366,35.4737589 177.049115,31.8110352 184.785156,31.8110352 C191.037141,31.8110352 195.954979,34.1002375 199.538818,38.6787109 C203.122658,43.2571844 204.914551,49.5564378 204.914551,57.5766602 C204.914551,66.2915475 202.893738,73.2380926 198.852051,78.4165039 C194.810364,83.5949152 189.395216,86.184082 182.606445,86.184082 C177.143853,86.184082 172.202333,84.0369681 167.781738,79.7426758 L167.781738,103.708496 L153.762207,103.708496 Z M167.781738,71.4067383 C171.191912,75.1958197 174.82306,77.090332 178.675293,77.090332 C182.117042,77.090332 184.864085,75.42474 186.916504,72.0935059 C188.968923,68.7622718 189.995117,64.3180616 189.995117,58.7607422 C189.995117,48.1197385 186.569207,42.7993164 179.717285,42.7993164 C175.580871,42.7993164 171.602395,45.4674212 167.781738,50.8037109 L167.781738,71.4067383 Z M235.388652,86.184082 C227.273703,86.184082 220.824467,83.7291098 216.040752,78.8190918 C211.257037,73.9090738 208.865215,67.3019621 208.865215,58.9975586 C208.865215,50.5984281 211.272824,43.967635 216.088115,39.1049805 C220.903406,34.2423259 227.447367,31.8110352 235.720195,31.8110352 C244.024599,31.8110352 250.584348,34.2423259 255.399639,39.1049805 C260.21493,43.967635 262.622539,50.5668529 262.622539,58.902832 C262.622539,67.4282653 260.207036,74.1064212 255.375957,78.9375 C250.544878,83.7685788 243.88251,86.184082 235.388652,86.184082 Z M235.625469,77.421875 C243.677267,77.421875 247.703105,71.2489224 247.703105,58.902832 C247.703105,53.2507855 246.637442,48.782894 244.506084,45.4990234 C242.374726,42.2151529 239.446125,40.5732422 235.720195,40.5732422 C232.025841,40.5732422 229.113028,42.2151529 226.98167,45.4990234 C224.850312,48.782894 223.784648,53.2823607 223.784648,58.9975586 C223.784648,64.6496051 224.842418,69.1332842 226.957988,72.4487305 C229.073559,75.7641767 231.96269,77.421875 235.625469,77.421875 Z M297.832969,84.7158203 C294.485947,85.6946664 291.849417,86.184082 289.923301,86.184082 C277.766664,86.184082 271.688437,80.5005451 271.688437,69.1333008 L271.688437,41.7573242 L265.862754,41.7573242 L265.862754,32.9951172 L271.688437,32.9951172 L271.688437,24.2329102 L285.707969,22.6225586 L285.707969,32.9951172 L296.83834,32.9951172 L296.83834,41.7573242 L285.707969,41.7573242 L285.707969,67.2861328 C285.707969,73.6644199 288.312923,76.8535156 293.52291,76.8535156 C294.722786,76.8535156 296.159458,76.6324892 297.832969,76.1904297 L297.832969,84.7158203 Z M332.664492,84.7158203 C329.31747,85.6946664 326.680941,86.184082 324.754824,86.184082 C312.598188,86.184082 306.519961,80.5005451 306.519961,69.1333008 L306.519961,41.7573242 L300.694277,41.7573242 L300.694277,32.9951172 L306.519961,32.9951172 L306.519961,24.2329102 L320.539492,22.6225586 L320.539492,32.9951172 L331.669863,32.9951172 L331.669863,41.7573242 L320.539492,41.7573242 L320.539492,67.2861328 C320.539492,73.6644199 323.144447,76.8535156 328.354434,76.8535156 C329.554309,76.8535156 330.990981,76.6324892 332.664492,76.1904297 L332.664492,84.7158203 Z M383.031172,83.2475586 C376.368704,85.2052507 370.053663,86.184082 364.085859,86.184082 C355.402548,86.184082 348.550728,83.721216 343.530195,78.7954102 C338.509662,73.8696043 335.999434,67.1440856 335.999434,58.6186523 C335.999434,50.5668543 338.29653,44.0860434 342.890791,39.1760254 C347.485052,34.2660074 353.555385,31.8110352 361.101973,31.8110352 C368.711711,31.8110352 374.268947,34.2107507 377.773848,39.0102539 C381.278748,43.8097571 383.031172,51.4035939 383.031172,61.7919922 L350.776777,61.7919922 C351.724048,71.7067553 357.170771,76.6640625 367.117109,76.6640625 C371.821885,76.6640625 377.12652,75.5747179 383.031172,73.3959961 L383.031172,83.2475586 Z M350.587324,53.8823242 L369.248457,53.8823242 C369.248457,45.0095585 366.390901,40.5732422 360.675703,40.5732422 C354.865778,40.5732422 351.503019,45.0095585 350.587324,53.8823242 Z M393.044336,85 L393.044336,32.9951172 L407.063867,32.9951172 L407.063867,42.7993164 C410.69507,35.4737589 416.220731,31.8110352 423.641016,31.8110352 C424.525135,31.8110352 425.393453,31.9057608 426.245996,32.0952148 L426.245996,44.5991211 C424.256728,43.8728805 422.409579,43.5097656 420.704492,43.5097656 C415.115597,43.5097656 410.568767,46.3357465 407.063867,51.987793 L407.063867,85 L393.044336,85 Z" id="potter-copy-3" fill="#07123B"></path>
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
