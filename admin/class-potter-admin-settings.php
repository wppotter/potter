<?php
/**
 * Admin settings helper
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package     Potter
 * @author      wppotter
 * @copyright   Copyright (c) 2020, Potter
 * @link        https://wppotter.com
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
            $potter_visit_site_url = 'https://wppotter.com';
            $potter_wrapper_class  = apply_filters('potter_welcome_wrapper_class', array( $current_slug ));

            $potter_recommended_addons_screen = (isset($_GET['action']) && 'upgrade_to_pro' === $_GET['action']) ? true : false; //phpcs:ignore?>

			<div class="potter-menu-page-wrapper wrap potter-clear <?php echo esc_attr(implode(' ', $potter_wrapper_class)); ?>">
				<div class="potter-theme-page-header">
					<div class="potter-container potter-flex">
						<div class="potter-theme-title">
							<a href="<?php echo esc_url($potter_visit_site_url); ?>" target="_blank" rel="noopener" >
								<?php if ($potter_icon) { ?>
<svg width="180px" viewBox="0 0 492 135" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g id="logo" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Group-8">
            <g id="Group-7-Copy">
                <circle id="Oval" fill="#F15A24" cx="67.5" cy="67.5" r="67.5"></circle>
                <polygon id="Fill-1" fill="#20447E" points="64.1159496 23 49.347476 31.5644764 49 43.2749491 69.3284617 54.9854219 69.1543509 77.8824097 79.2315264 84 94 74.9108158 93.652524 40.3037303"></polygon>
                <polygon id="Fill-2" fill="#FFFFFF" points="41.1748199 112 66 97.6782336 65.8251801 75.6710686 41 61"></polygon>
            </g>
            <path d="M167.512821,125 L167.512821,87.3 C169.934473,90.4777778 173.131054,93.0055556 177.102564,94.8833333 C181.074074,96.7611111 185.239316,97.7 189.598291,97.7 C195.700855,97.7 201.222222,96.4 206.162393,93.8 C211.102564,91.2 214.977208,87.5166667 217.786325,82.75 C220.595442,77.9833333 222,72.4703704 222,66.2111111 C222,59.8555556 220.692308,54.2462963 218.076923,49.3833333 C215.461538,44.5203704 211.877493,40.7407407 207.324786,38.0444444 C202.77208,35.3481481 197.68661,34 192.068376,34 C187.031339,34 182.35755,35.0592593 178.047009,37.1777778 C173.736467,39.2962963 170.031339,42.0888889 166.931624,45.5555556 L166.931624,45.5555556 L165.769231,35.4444444 L154,35.4444444 L154,125 L167.512821,125 Z M187.142857,87 C182.285714,87 178.071429,85.5121951 174.5,82.5365854 C170.928571,79.5609756 168.761905,75.7317073 168,71.0487805 L168,71.0487805 L168,60.9512195 C169.142857,56.0731707 171.5,52.195122 175.071429,49.3170732 C178.642857,46.4390244 182.952381,45 188,45 C191.714286,45 195.095238,45.9268293 198.142857,47.7804878 C201.190476,49.6341463 203.595238,52.1707317 205.357143,55.3902439 C207.119048,58.6097561 208,62.2195122 208,66.2195122 C208,70.1219512 207.047619,73.6585366 205.142857,76.8292683 C203.238095,80 200.690476,82.4878049 197.5,84.2926829 C194.309524,86.097561 190.857143,87 187.142857,87 Z M259,98 C265.464912,98 271.20614,96.5971277 276.223684,93.7913832 C281.241228,90.9856387 285.125,87.1398337 287.875,82.2539683 C290.625,77.3681028 292,71.9259259 292,65.9274376 C292,59.9289494 290.625,54.5109599 287.875,49.6734694 C285.125,44.8359788 281.265351,41.0143613 276.296053,38.2086168 C271.326754,35.4028723 265.657895,34 259.289474,34 C252.921053,34 247.203947,35.4028723 242.138158,38.2086168 C237.072368,41.0143613 233.116228,44.8601663 230.269737,49.7460317 C227.423246,54.6318972 226,60.0256992 226,65.9274376 C226,72.3129252 227.423246,77.9244142 230.269737,82.7619048 C233.116228,87.5993953 237.048246,91.3484505 242.065789,94.0090703 C247.083333,96.6696901 252.72807,98 259,98 Z M259.426966,87 C255.82397,87 252.537453,86.0731707 249.567416,84.2195122 C246.597378,82.3658537 244.2603,79.8292683 242.55618,76.6097561 C240.85206,73.3902439 240,69.8780488 240,66.0731707 C240,62.2682927 240.85206,58.7560976 242.55618,55.5365854 C244.2603,52.3170732 246.573034,49.7560976 249.494382,47.8536585 C252.41573,45.9512195 255.726592,45 259.426966,45 C265.074906,45 269.749064,47.0243902 273.449438,51.0731707 C277.149813,55.1219512 279,60.1219512 279,66.0731707 C279,72.0243902 277.149813,77 273.449438,81 C269.749064,85 265.074906,87 259.426966,87 Z M320.628975,96 L320.628975,47.0838926 L337,47.0838926 L337,36.4060403 L320.628975,36.4060403 L320.628975,10 L307.010601,10 L307.010601,36.4060403 L296,36.4060403 L296,47.0838926 L307.010601,47.0838926 L307.010601,96 L320.628975,96 Z M364.628975,96 L364.628975,47.0838926 L381,47.0838926 L381,36.4060403 L364.628975,36.4060403 L364.628975,10 L351.010601,10 L351.010601,36.4060403 L340,36.4060403 L340,47.0838926 L351.010601,47.0838926 L351.010601,96 L364.628975,96 Z M416.163636,98 C419.654545,98 423.266667,97.3953137 427,96.185941 C430.733333,94.9765684 434.2,93.3076342 437.4,91.1791383 L437.4,91.1791383 L431.145455,81.1655329 C426.393939,84.6485261 421.49697,86.3900227 416.454545,86.3900227 C412.672727,86.3900227 409.30303,85.5434618 406.345455,83.8503401 C403.387879,82.1572184 401.036364,79.8110355 399.290909,76.8117914 L399.290909,76.8117914 L447,60.122449 C445.060606,51.898715 441.448485,45.4890401 436.163636,40.893424 C430.878788,36.297808 424.309091,34 416.454545,34 C410.345455,34 404.721212,35.4270597 399.581818,38.2811791 C394.442424,41.1352986 390.393939,45.005291 387.436364,49.8911565 C384.478788,54.7770219 383,60.1708239 383,66.0725624 C383,72.1678005 384.357576,77.6341648 387.072727,82.4716553 C389.787879,87.3091459 393.642424,91.106576 398.636364,93.8639456 C403.630303,96.6213152 409.472727,98 416.163636,98 Z M396.144628,68 C396.048209,67.2242424 396,66.1090909 396,64.6545455 C396,58.6424242 397.783747,53.6969697 401.35124,49.8181818 C404.918733,45.9393939 409.450413,44 414.946281,44 C418.899449,44 422.201791,45.0181818 424.853306,47.0545455 C427.504821,49.0909091 429.553719,51.7575758 431,55.0545455 L431,55.0545455 L396.144628,68 Z M468.441406,96 L468.441406,68.812065 C468.441406,64.9760247 469.429036,61.3557618 471.404297,57.9512761 C473.379557,54.5467904 476.125651,51.8855375 479.642578,49.9675174 C483.159505,48.0494973 487.085937,47.1863882 491.421875,47.3781903 L491.421875,47.3781903 L492,34 C489.591146,34.095901 486.796875,34.8151585 483.617187,36.1577726 C480.4375,37.5003867 477.426432,39.4184068 474.583984,41.9118329 C471.741536,44.4052591 469.549479,47.2822892 468.007812,50.5429234 L468.007812,50.5429234 L466.996094,36.4454756 L455,36.4454756 L455,96 L468.441406,96 Z" id="potter" fill="#20447E" fill-rule="nonzero"></path>
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

        public static function potter_welcome_page_potterkit_section() { }


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
					<span class="dashicons dashicons-format-chat"></span> <span><?php esc_html_e('Support', 'potter'); ?></span>
				</h2>
				<div class="inside">
					<p>
						<?php esc_html_e('Have questions? Get in touch with us. We\'ll be happy to help', 'potter'); ?>
					</p>
					<?php
            $potter_support_link           = 'https://wppotter.com/support/';
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
                        'quick_url' => 'https://wppotter.com/docs/page-posts-settings/layout-settings/',
                    ),
                    'typography'    => array(
                        'title'     => __('Customize fonts/typography', 'potter'),
                        'dashicon'  => 'dashicons-editor-textcolor',
                        'quick_url' => 'https://wppotter.com/docs/customize-potter/color-typography/',
                    ),
                    'logo-favicon'  => array(
                        'title'     => __('Upload logo & site icon', 'potter'),
                        'dashicon'  => 'dashicons-format-image',
                        'quick_url' => 'https://wppotter.com/docs/customize-potter/set-site-logo-and-icons/',
                    ),
                    'navigation'    => array(
                        'title'     => __('Add/edit navigation menu', 'potter'),
                        'dashicon'  => 'dashicons-menu',
                        'quick_url' => 'https://wppotter.com/docs/customize-potter/menu-settings/',
                    ),
                    'header'        => array(
                        'title'     => __('Customize header options', 'potter'),
                        'dashicon'  => 'dashicons-editor-table',
                        'quick_url' => 'https://wppotter.com/docs/customize-potter/header-settings/',
                    ),
                    'footer'        => array(
                        'title'     => __('Customize footer options', 'potter'),
                        'dashicon'  => 'dashicons-editor-table',
                        'quick_url' => 'https://wppotter.com/docs/customize-potter/footer-settings/',
                    ),
                    'blog-layout'   => array(
                        'title'     => __('Update blog layout', 'potter'),
                        'dashicon'  => 'dashicons-welcome-write-blog',
                        'quick_url' => 'https://wppotter.com/docs/customize-potter/blog-settings/',
                    ),
                    'page'          => array(
                        'title'     => __('Blog and Home page setuo', 'potter'),
                        'dashicon'  => 'dashicons-welcome-widgets-menus',
                        'quick_url' => 'https://wppotter.com/docs/customize-potter/setting-up-home-and-blog-pages/',
                    ),
                    'transparent-header'          => array(
                        'title'     => __('How To Set Transparent Header', 'potter'),
                        'dashicon'  => 'dashicons-welcome-widgets-menus',
                        'quick_url' => 'https://wppotter.com/docs/how-to/how-to-set-transparent-header/',
                    ),
                    'sgticky-header'          => array(
                        'title'     => __('How To Add A Sticky Header', 'potter'),
                        'dashicon'  => 'dashicons-welcome-widgets-menus',
                        'quick_url' => 'https://wppotter.com/docs/how-to/how-to-set-sticky-header/',
                    ),
                )
            ); ?>
			<div class="postbox potter-quick-setting-section">
				<h2 class="handle"><span class="dashicons dashicons-format-aside"></span> <span><?php esc_html_e('Resources:', 'potter'); ?></span></h2>
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
				<h2 class="handle"><span class="dashicons dashicons-format-chat"></span> <?php esc_html_e('Slack Community', 'potter'); ?></h2>
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
