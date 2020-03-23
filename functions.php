<?php
/**
 * Functions.
 *
 * @package Potter
 */

defined('ABSPATH') || die("Can't access directly");

// Constants
define('POTTER_THEME_DIR', get_template_directory());
define('POTTER_THEME_URI', get_template_directory_uri());
define('POTTER_CHILD_THEME_DIR', get_stylesheet_directory());
define('POTTER_CHILD_THEME_URI', get_stylesheet_directory_uri());
define('POTTER_VERSION', wp_get_theme('potter')->get('Version'));
define('POTTER_CHILD_VERSION', '1.0');
/**
 * Theme setup.
 */
function potter_theme_setup()
{

    // Textdomain.
    load_theme_textdomain('potter', POTTER_THEME_DIR . '/languages');

    // Custom logo.
    add_theme_support(
        'custom-logo',
        array(
            'width'       => 180,
            'height'      => 48,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );

    // Custom background.
    add_theme_support(
        'custom-background',
        array(
            'default-color'      => 'ffffff',
            'default-image'      => '',
            'default-repeat'     => 'repeat',
            'default-position-x' => 'left',
            'default-position-y' => 'top',
            'default-size'       => 'auto',
            'default-attachment' => 'scroll',
        )
    );

    // Content width.
    if (! isset($content_width)) {
        $content_width = 1200;
    }


    /* image size */
    add_image_size('post-thumbnail', 800, 240);
    add_image_size('potter-homepage-thumb', 220, 180);
    add_image_size('potter-fullpage-thumb', 1000, 800);

    // Title tag.
    add_theme_support('title-tag');

    // Post thumbnails.
    add_theme_support('post-thumbnails');

    // Automatic feed links.
    add_theme_support('automatic-feed-links');

    // HTML5 support.
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        )
    );

    // Selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Register nav menu's.
    register_nav_menus(array(
        'main_menu'             => __('Main Menu', 'potter'),
        'nav_left_menu'             => __('Nav Left Menu', 'potter'),
        'mobile_menu'           => __('Mobile Menu', 'potter'),
        'off_canvas_menu'           => __('Off Canvas Menu', 'potter'),
        'pre_header_menu'       => __('Pre Header Left', 'potter'),
        'pre_header_menu_right' => __('Pre Header Right', 'potter'),
        'footer_menu'           => __('Footer Left', 'potter'),
        'footer_menu_right'     => __('Footer Right', 'potter'),
    ));
}
add_action('after_setup_theme', 'potter_theme_setup');


/**
 * Register sidebars.
 */
function potter_sidebars()
{
    register_sidebar(array(
        'name'          => __('Sidebar', 'potter'),
        'id'            => 'sidebar-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="potter-widgettitle">',
        'after_title'   => '</h4>',
    ));
    register_sidebar(array(
        'name'          => __('Footer 1 ', 'potter'),
        'id'            => 'sidebar-footer-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="potter-widgettitle">',
        'after_title'   => '</h4>',
    ));
    register_sidebar(array(
        'name'          => __('Footer 2', 'potter'),
        'id'            => 'sidebar-footer-2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="potter-widgettitle">',
        'after_title'   => '</h4>',
    ));
    register_sidebar(array(
        'name'          => __('Footer 3', 'potter'),
        'id'            => 'sidebar-footer-3',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="potter-widgettitle">',
        'after_title'   => '</h4>',
    ));
    register_sidebar(array(
        'name'          => __('Footer 4', 'potter'),
        'id'            => 'sidebar-footer-4',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="potter-widgettitle">',
        'after_title'   => '</h4>',
    ));

}
add_action('widgets_init', 'potter_sidebars');
remove_action('edd_after_download_content', 'edd_append_purchase_link');
/**
 * Enqueue scripts & styles.
 */
function potter_scripts()
{

    // Main JS file.
    wp_enqueue_script('potter-site', get_template_directory_uri() . '/js/min/site-min.js', array( 'jquery' ), POTTER_VERSION, true);

    if (! get_theme_mod('mobile_menu_options') || 'menu-mobile-hamburger' === get_theme_mod('mobile_menu_options')) {

        // Hamburger mobile menu.
        wp_enqueue_script('potter-mobile-menu-hamburger', get_template_directory_uri() . '/js/min/mobile-hamburger-min.js', array( 'jquery', 'potter-site' ), POTTER_VERSION, true);
    } elseif ('menu-mobile-default' === get_theme_mod('mobile_menu_options')) {

        // Default mobile menu.
        wp_enqueue_script('potter-mobile-menu-default', get_template_directory_uri() . '/js/min/mobile-default-min.js', array( 'jquery', 'potter-site' ), POTTER_VERSION, true);
    }

    // Main stylesheet.
    wp_enqueue_style('potter-style', get_template_directory_uri() . '/style.css', '', POTTER_VERSION);

    // Responsive styles.
    wp_enqueue_style('potter-responsive', get_template_directory_uri() . '/css/min/responsive-min.css', '', POTTER_VERSION);
    // icon styles.
    wp_enqueue_style('potter-icons', get_template_directory_uri() . '/assets/pottericon/pottericon-min.css', '', POTTER_VERSION);

    // Comment reply.
    if (is_singular()) {
        wp_enqueue_script('comment-reply');
    }

    if (is_rtl()) {

        // RTL.
        wp_enqueue_style('potter-rtl', get_template_directory_uri() . '/css/min/rtl-min.css', '', POTTER_VERSION);
    }
}
add_action('wp_enqueue_scripts', 'potter_scripts', 10);

// Init.
require_once POTTER_THEME_DIR . '/inc/includes.php';

// Admin functionalities
if (is_admin()) {
    require_once get_template_directory() . '/admin/admin.php';
    new Potter_Admin();
}
// Is blog
function potter_is_blog()
{
    return (is_archive() || is_author() || is_category() || is_tag()) && 'post' == get_post_type();
}
