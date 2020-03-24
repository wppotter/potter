<?php
/**
 * Theme customizer settings.
 *
 * @package Potter
 * @subpackage Customizer
 */

defined('ABSPATH') || die("Can't access directly");

// Textdomain. This is required, otherwise strings aren't translateable.
load_theme_textdomain('potter');

// Kirki global configuration.
function potter_kirki_config($config)
{
    return wp_parse_args(array(
        'disable_loader' => true,
    ), $config);
}
add_filter('kirki_config', 'potter_kirki_config');

// Default font choice.
function potter_default_font_choices()
{
    return array(
        'fonts' => apply_filters('potter_kirki_font_choices', array()),
    );
}

// Customizer setup.
function potter_customizer_setup($wp_customize)
{

    // Move sections.
    $wp_customize->get_section('title_tagline')->panel    = 'header_panel';
    $wp_customize->get_section('background_image')->panel = 'layout_panel';

    // Move controls.
    $wp_customize->get_control('background_color')->section = 'background_image';

    // Change section titles.
    $wp_customize->get_section('title_tagline')->title    = __('Logo And General Settings', 'potter');
    $wp_customize->get_section('background_image')->title = __('Background', 'potter');

    // Change panel priority.
    $wp_customize->get_panel('nav_menus')->priority = 40;

    // Change section priority.
    $wp_customize->get_section('background_image')->priority = 200;

    // Change control priorities.
    $wp_customize->get_control('custom_logo')->priority     = 0;
    $wp_customize->get_control('blogname')->priority        = 9;
    $wp_customize->get_control('blogdescription')->priority = 19;

    // Change control transport method.
    $wp_customize->get_setting('blogname')->transport = 'postMessage';

    // Partial refresh for custom logo.
    // This is faking a partial refresh to have an edit icon displayed for the logo.
    // A partial refresh isn't possible because the logo & mobile logo are different.
    // Unfortunately we can't pass multiple arrays with add_partial - this would solve the issue.
    $wp_customize->selective_refresh->add_partial('custom_logo', array(
        'selector' => '.potter-logo',
    ));

    // Partial refresh for blogname.
    $wp_customize->selective_refresh->add_partial('blogname', array(
        'selector' => '.site-title a',
        'render_callback' => function () {
            bloginfo('name');
        },
    ));
}
add_action('customize_register', 'potter_customizer_setup', 20);

// Kirki configuration.
Kirki::add_config('potter', array(
    'capability'        => 'edit_theme_options',
    'option_type'       => 'theme_mod',
    'gutenberg_support' => true,
    'disable_output'    => true,
));

/* Panels */

// General.
Kirki::add_panel('layout_panel', array(
    'priority' => 2,
    'title'    => __('General', 'potter'),
));

// Blog.
Kirki::add_panel('blog_panel', array(
    'priority' => 2,
    'title'    => __('Blog', 'potter'),
));

// Typography.
Kirki::add_section('typo_panel', array(
    'priority' => 3,
    'title'    => __('Typography', 'potter'),
    'panel'    => 'layout_panel',
));
// Typography.
Kirki::add_section('color_panel', array(
    'priority' => 4,
    'title'    => __('Color', 'potter'),
    'panel'    => 'layout_panel',
));

// Header.
Kirki::add_panel('header_panel', array(
    'priority' => 4,
    'title'    => __('Header', 'potter'),
));

Kirki::add_panel('woocommerce', array(
    'priority' => 5,
    'title'    => __('WooCommerce', 'potter'),
));

// Footer.
Kirki::add_panel('potter_footer_options', array(
    'title'    => __('Footer', 'potter'),
    'priority' => 6,
));

/* Sections – Typography */



/* Sections – General */

// Site layout.
Kirki::add_section('potter_page_options', array(
    'title'    => __('Layout', 'potter'),
    'panel'    => 'layout_panel',
    'priority' => 100,
));

// Buttons.
Kirki::add_section('potter_button_options', array(
    'title'    => __('Theme Buttons', 'potter'),
    'panel'    => 'layout_panel',
    'priority' => 300,
));

// Sidebar.
Kirki::add_section('potter_sidebar_options', array(
    'title'    => __('Sidebar', 'potter'),
    'panel'    => 'layout_panel',
    'priority' => 400,
));

// Breadcrumbs and Page Title bar.
Kirki::add_section('potter_breadcrumb_settings', array(
    'title'    => __('Page Header and Breadcrumbs', 'potter'),
    'panel'    => 'header_panel',
    'priority' => 600,
));

// 404.
Kirki::add_section('potter_404_options', array(
    'title'    => __('404 Page', 'potter'),
    'panel'    => 'layout_panel',
    'priority' => 700,
));

/* Sections – Blog */

// General.
Kirki::add_section('potter_blog_settings', array(
    'title'    => __('General', 'potter'),
    'panel'    => 'blog_panel',
    'priority' => 100,
));

// Pagination.
Kirki::add_section('potter_pagination_settings', array(
    'title'    => __('Pagination', 'potter'),
    'panel'    => 'blog_panel',
    'priority' => 100,
));

// Archive layout.
$archives = apply_filters('potter_archives', array( 'archive' ));

foreach ($archives as $archive) {
    $panel_title = $archive;

    if ('archive' === $panel_title) {
        $panel_title = __('Blog / Archive', 'potter');
    }

    if ('search' === $panel_title) {
        $panel_title = __('Search Results', 'potter');
    }

    Kirki::add_section('potter_' . $archive . '_options', array(
        'title'    => ucwords(str_replace('-', ' ', $panel_title)) . '&nbsp;' . __('Layout', 'potter'),
        'panel'    => 'blog_panel',
        'priority' => 100,
    ));
}

// Post layout.
$singles = apply_filters('potter_singles', array( 'single' ));

foreach ($singles as $single) {
    $panel_title = $single;

    if ('single' === $panel_title) {
        $panel_title = __('Post', 'potter');
    }

    Kirki::add_section('potter_' . $single . '_options', array(
        'title'    => ucwords($panel_title) . '&nbsp;' . __('Layout', 'potter'),
        'panel'    => 'blog_panel',
        'priority' => 200,
    ));
}

/* Sections – Header */

// Navigation.
Kirki::add_section('potter_menu_options', array(
    'title'    => __('Navigation', 'potter'),
    'panel'    => 'header_panel',
    'priority' => 200,
));


// Sub menu.
Kirki::add_section('potter_sub_menu_options', array(
    'title'    => __('Sub Menu', 'potter'),
    'panel'    => 'header_panel',
    'priority' => 600,
));

// Mobile menu.
Kirki::add_section('potter_mobile_menu_options', array(
    'title'    => __('Mobile Navigation', 'potter'),
    'panel'    => 'header_panel',
    'priority' => 700,
));

// Pre header.
Kirki::add_section('potter_pre_header_options', array(
    'title'    => __('Top Header', 'potter'),
    'panel'    => 'header_panel',
    'priority' => 800,
));
// Transparent Header.
Kirki::add_section('potter_transparent_header_options', array(
    'title'    => __('Transparent Header', 'potter'),
    'panel'    => 'header_panel',
    'priority' => 900,
));

Kirki::add_section('potter_sticky_header_options', array(
    'title'    => __('Sticky Header', 'potter'),
    'panel'    => 'header_panel',
    'priority' => 901,
));
Kirki::add_section('potter_offcanvas_menu_options', array(
    'title'    => __('Off Canvas Menu', 'potter'),
    'panel'    => 'header_panel',
    'priority' => 902,

));

//off canvas menu
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-103',
    'section'  => 'potter_offcanvas_menu_options',
    'default'  => '<h3 class="setting-header">' . esc_html__('Canvas Setting', 'potter') .  '</h3>',
    'priority' => 0,
    'active_callback' => array(
        array(
            'setting'  => 'menu_position',
            'operator' => '==',
            'value'    => 'menu-off-canvas',
        ),
    ),
));
Kirki::add_field('potter', array(
    'type'     => 'radio-image',
    'settings' => 'off_canvas_menu_position',
    'label'    => __('Canvas Menu Position', 'potter'),
    'section'  => 'potter_offcanvas_menu_options',
    'default'  => 'left',
    'priority' => 0,
    'choices'  => array(
        'left'   => POTTER_THEME_URI . '/inc/customizer/img/flyout-left.png',
        'right' => POTTER_THEME_URI . '/inc/customizer/img/flyout-right.png',
    ),

));



Kirki::add_field('potter', array(
    'type'      => 'slider',
    'settings'  => 'off_canvas_menu_width',
    'label'     => __('Canvas Width', 'potter'),
    'section'   => 'potter_offcanvas_menu_options',
    'priority'  => 1,
    'default'   => '300',
    'transport' => 'postMessage',
    'choices'   => array(
        'min'  => '150',
        'max'  => '800',
        'step' => '1',
    ),

));

Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'off_canvas_background_color',
    'label'           => __('Background Color', 'potter'),
    'section'         => 'potter_offcanvas_menu_options',
    'default'         => '#fff;',
    'priority'        => 2,
    'transport'       => 'postMessage',
    'choices'         => array(
        'alpha' => true,
    ),

));

Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'off_canvas_overlay_color',
    'label'           => __('Overlay Color', 'potter'),
    'section'         => 'potter_offcanvas_menu_options',
    'priority'        => 2,
    'transport'       => 'postMessage',
    'choices'         => array(
        'alpha' => true,
    ),

));
Kirki::add_field('potter', array(
    'type'        => 'dimensions',
    'settings'    => 'off_canvas_padding',
    'label'       => esc_html__('Canvas Padding', 'potter'),
    'description' => esc_html__('Set Canvas Padding for each side.', 'potter'),
  'priority'  => 2,
    'section'     => 'potter_offcanvas_menu_options',
    'default'     => array(
        'padding-top'    => '60px',
        'padding-bottom' => '40px',
        'padding-left'   => '40px',
        'padding-right'  => '40px',
    ),

));

Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'off_canvas_close_button_color',
    'label'           => __('Close Button Color', 'potter'),
    'section'         => 'potter_offcanvas_menu_options',
    'transport'       => 'postMessage',
    'priority'        => 2,
    'choices'         => array(
        'alpha' => true,
    ),

));
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-10245',
    'section'  => 'potter_offcanvas_menu_options',
    'default'  => '<h3 class="setting-header">' . esc_html__('Off Canvas Content Setting', 'potter') .  '</h3>',
    'priority' => 2,

));

Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'off_canvas_menu_color',
    'label'           => __('Menu Item Color', 'potter'),
    'section'         => 'potter_offcanvas_menu_options',
    'default'         => '#333;',
    'priority'        => 3,
    'transport'       => 'postMessage',
    'choices'         => array(
        'alpha' => true,
    ),

));

Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'off_canvas_menu_hover_color',
    'label'           => __('Menu Item Hover Color', 'potter'),
    'section'         => 'potter_offcanvas_menu_options',
    'priority'        => 3,
    'choices'         => array(
        'alpha' => true,
    ),

));

Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'off_canvas_menu_active_color',
    'label'           => __('Menu Item Active Color', 'potter'),
    'section'         => 'potter_offcanvas_menu_options',
    'transport'       => 'postMessage',
    'priority'        => 4,
    'choices'         => array(
        'alpha' => true,
    ),

));

Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'off_canvas_menu_separator_color',
    'label'           => __('Menu Separator Color', 'potter'),
    'section'         => 'potter_offcanvas_menu_options',
    'transport'       => 'postMessage',
    'priority'        => 7,
    'choices'         => array(
        'alpha' => true,
    ),

));

Kirki::add_field('potter', array(
    'type'      => 'slider',
    'settings'  => 'off_canvas_menu_item_spacing',
    'label'     => __('Menu Item spacing', 'potter'),
    'section'   => 'potter_offcanvas_menu_options',
    'priority'  => 8,
    'default'   => '10',
    'transport' => 'postMessage',
    'choices'   => array(
        'min'  => '5',
        'max'  => '50',
        'step' => '1',
    ),

));


Kirki::add_field('potter', array(
    'type'      => 'slider',
    'settings'  => 'off_canvas_menu_font_size',
    'label'     => __('Font Size', 'potter'),
    'section'   => 'potter_offcanvas_menu_options',
    'priority'  => 8,
    'default'   => '16',
    'transport' => 'postMessage',
    'choices'   => array(
        'min'  => '10',
        'max'  => '50',
        'step' => '1',
    ),

));



Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-101',
    'section'  => 'potter_offcanvas_menu_options',
    'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
    'priority' => 10,

));



Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-102',
    'section'  => 'potter_offcanvas_menu_options',
    'default'  => '<h3 class="setting-header">' . esc_html__('Burger Menu Setting', 'potter') .  '</h3>',
    'priority' => 10,

));


Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'burger_menu_color',
    'label'           => __('Burger Color', 'potter'),
    'section'         => 'potter_offcanvas_menu_options',
    'transport'       => 'postMessage',
    'priority'        => 11,
    'choices'         => array(
        'alpha' => true,
    ),

));
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'burger_menu_hover_color',
    'label'           => __('Burger Hover Color', 'potter'),
    'section'         => 'potter_offcanvas_menu_options',
    'priority'        => 12,
    'choices'         => array(
        'alpha' => true,
    ),

));

Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'burger_menu_background_color',
    'label'           => __('Burger Background Color', 'potter'),
    'section'         => 'potter_offcanvas_menu_options',
    'transport'       => 'postMessage',
    'priority'        => 13,
    'choices'         => array(
        'alpha' => true,
    ),

));

Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'burger_menu_background_hover_color',
    'label'           => __('Burger Background Hover Color', 'potter'),
    'section'         => 'potter_offcanvas_menu_options',
    'priority'        => 13,
    'choices'         => array(
        'alpha' => true,
    ),

));

Kirki::add_field('potter', array(
    'type'      => 'slider',
    'settings'  => 'burger_menu_border_radius',
    'label'     => __('Burger Menu Border Radius ', 'potter'),
    'section'   => 'potter_offcanvas_menu_options',
    'priority'  => 14,
    'default'   => '0',
    'transport' => 'postMessage',
    'choices'   => array(
        'min'  => '0',
        'max'  => '1000',
        'step' => '1',
    ),

));
Kirki::add_field('potter', array(
    'type'      => 'slider',
    'settings'  => 'burger_menu_size',
    'label'     => __('Burger Menu size ', 'potter'),
    'section'   => 'potter_offcanvas_menu_options',
    'priority'  => 14,
    'default'   => '16',
    'transport' => 'postMessage',
    'choices'   => array(
        'min'  => '0',
        'max'  => '200',
        'step' => '1',
    ),

));
Kirki::add_field('potter', array(
    'type'      => 'slider',
    'settings'  => 'burger_menu_padding',
    'label'     => __('Burger Menu padding ', 'potter'),
    'section'   => 'potter_offcanvas_menu_options',
    'priority'  => 14,
    'default'   => '10',
    'transport' => 'postMessage',
    'choices'   => array(
        'min'  => '0',
        'max'  => '200',
        'step' => '1',
    ),

));
// Widget area

Kirki::add_section('potter_footer_widgets', array(
    'title'    => __('Footer Widget', 'potter'),
    'panel'    => 'potter_footer_options',
    'priority' => 1,
));

Kirki::add_section('potter_bottom_footer', array(
    'title'    => __('Bottom Footer', 'potter'),
    'panel'    => 'potter_footer_options',
    'priority' => 2,
));

/* Fields – Page Header Breadcrumb Settings */

// Alignment.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-1024456',
    'section'  => 'potter_breadcrumb_settings',
    'default'  => '<h3 class="setting-header">' . esc_html__('Title Settings', 'potter') .  '</h3>',
    'priority' => 1,
));

Kirki::add_field('potter', array(
    'type'            => 'radio-image',
    'settings'        => 'page_title_alignment',
    'label'           => __('Page Title Alignment', 'potter'),
    'section'         => 'potter_breadcrumb_settings',
    'default'         => 'left',
    'priority'        => 2,
    'multiple'        => 1,
    'choices'         => array(
        'left'   => POTTER_THEME_URI . '/inc/customizer/img/align-left.png',
        'center' => POTTER_THEME_URI . '/inc/customizer/img/align-center.png',
        'right'  => POTTER_THEME_URI . '/inc/customizer/img/align-right.png',
    ),
));

Kirki::add_field('potter', array(
    'type'            => 'radio-image',
    'settings'        => 'breadcrumbs_alignment',
    'label'           => __('Breadcrumb Alignment', 'potter'),
    'section'         => 'potter_breadcrumb_settings',
    'default'         => 'left',
    'priority'        => 14,
    'multiple'        => 1,
    'choices'         => array(
        'left'   => POTTER_THEME_URI . '/inc/customizer/img/align-left.png',
        'center' => POTTER_THEME_URI . '/inc/customizer/img/align-center.png',
        'right'  => POTTER_THEME_URI . '/inc/customizer/img/align-right.png',
    ),
    'active_callback' => array(
      array(
          'setting'  => 'breadcrumbs_toggle',
          'operator' => '==',
          'value'    => 1,
      ),
        array(
            'setting'  => 'title_bar_position',
            'operator' => '==',
            'value'    => 'after-header',
        ),
    ),
));

// Background color.

Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'breadcrumbs_background_color',
    'label'           => __('Background Color', 'potter'),
    'section'         => 'potter_breadcrumb_settings',
    'priority'        => 14,
    'transport'       => 'postMessage',
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
      array(
          'setting'  => 'breadcrumbs_toggle',
          'operator' => '==',
          'value'    => 1,
      ),
        array(
            'setting'  => 'title_bar_position',
            'operator' => '==',
            'value'    => 'after-header',
        ),
    ),
));

// Font color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'breadcrumbs_font_color',
    'label'           => __('Font Color', 'potter'),
    'section'         => 'potter_breadcrumb_settings',
    'priority'        => 15,
    'transport'       => 'postMessage',
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
      array(
          'setting'  => 'breadcrumbs_toggle',
          'operator' => '==',
          'value'    => 1,
      ),
        array(
            'setting'  => 'title_bar_position',
            'operator' => '==',
            'value'    => 'after-header',
        ),
    ),
));

// Accent color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'breadcrumbs_accent_color',
    'label'           => __('Accent Color', 'potter'),
    'section'         => 'potter_breadcrumb_settings',
    'priority'        => 16,
    'transport'       => 'postMessage',
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
      array(
          'setting'  => 'breadcrumbs_toggle',
          'operator' => '==',
          'value'    => 1,
      ),
        array(
            'setting'  => 'title_bar_position',
            'operator' => '==',
            'value'    => 'after-header',
        ),
    ),
));

// Accent color hover.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'breadcrumbs_accent_color_alt',
    'label'           => __('Hover', 'potter'),
    'section'         => 'potter_breadcrumb_settings',
    'priority'        => 17,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
      array(
          'setting'  => 'breadcrumbs_toggle',
          'operator' => '==',
          'value'    => 1,
      ),
        array(
            'setting'  => 'title_bar_position',
            'operator' => '==',
            'value'    => 'after-header',
        ),
    ),
));

// padding.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'page_title_bar_top_padding',
    'label'           => __('Breadcrumb Bar Top Padding', 'potter'),
    'section'         => 'potter_breadcrumb_settings',
    'priority'        => 18,
    'default'         => '10',
    'transport' => 'postMessage',
    'choices'         => array(
        'min'  => '1',
        'max'  => '300',
        'step' => '1',
    ),
    'active_callback' => array(
      array(
          'setting'  => 'breadcrumbs_toggle',
          'operator' => '==',
          'value'    => 1,
      ),
        array(
            'setting'  => 'title_bar_position',
            'operator' => '==',
            'value'    => 'after-header',
        ),
    ),
));

Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'page_title_bar_bottom_padding',
    'label'           => __('Breadcrumb Bar Bottom Padding', 'potter'),
    'section'         => 'potter_breadcrumb_settings',
    'priority'        => 19,
    'default'         => '10',
    'transport' => 'postMessage',
    'choices'         => array(
        'min'  => '1',
        'max'  => '300',
        'step' => '1',
    ),
    'active_callback' => array(
      array(
          'setting'  => 'breadcrumbs_toggle',
          'operator' => '==',
          'value'    => 1,
      ),
        array(
            'setting'  => 'title_bar_position',
            'operator' => '==',
            'value'    => 'after-header',
        ),
    ),
));

Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'page_title_font_size',
    'label'           => __('Title Font Size', 'potter'),
    'section'         => 'potter_breadcrumb_settings',
    'priority'        => 9,
    'default'         => '32',
    'choices'         => array(
        'min'  => '1',
        'max'  => '300',
        'step' => '1',
    ),
));

Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-10244',
    'section'  => 'potter_breadcrumb_settings',
    'default'  => '<h3 class="setting-header">' . esc_html__('Breadcrumb Settings', 'potter') .  '</h3>',
    'priority' => 10,
));

// Toggle.
Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'breadcrumbs_toggle',
    'label'    => __('Breadcrumbs', 'potter'),
    'section'  => 'potter_breadcrumb_settings',
    'default'  => 0,
    'priority' => 12,
));

Kirki::add_field('potter', array(
    'type'            => 'checkbox',
    'settings'        => 'breadcrumb_on_archive_page',
    'label'           => __('Disable on Archive Page?', 'potter'),
    'section'         => 'potter_breadcrumb_settings',
    'default'         => false,
    'priority'        => 12,
    'active_callback' => array(
        array(
            'setting'  => 'breadcrumbs_toggle',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));
Kirki::add_field('potter', array(
    'type'            => 'checkbox',
    'settings'        => 'breadcrumb_on_blog_page',
    'label'           => __('Disable on Blog Page?', 'potter'),
    'section'         => 'potter_breadcrumb_settings',
    'default'         => false,
    'priority'        => 12,
    'active_callback' => array(
        array(
            'setting'  => 'breadcrumbs_toggle',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));

Kirki::add_field('potter', array(
    'type'            => 'checkbox',
    'settings'        => 'breadcrumb_on_search_page',
    'label'           => __('Disable on Search Pages?', 'potter'),
    'section'         => 'potter_breadcrumb_settings',
    'default'         => false,
    'priority'        => 12,
    'active_callback' => array(
        array(
            'setting'  => 'breadcrumbs_toggle',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));
Kirki::add_field('potter', array(
    'type'            => 'checkbox',
    'settings'        => 'breadcrumb_on_404_page',
    'label'           => __('Disable on 404  Pages?', 'potter'),
    'section'         => 'potter_breadcrumb_settings',
    'default'         => false,
    'priority'        => 12,
    'active_callback' => array(
        array(
            'setting'  => 'breadcrumbs_toggle',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));

Kirki::add_field('potter', array(
    'type'            => 'checkbox',
    'settings'        => 'breadcrumb_single_post_page',
    'label'           => __('Disable Single Post?', 'potter'),
    'section'         => 'potter_breadcrumb_settings',
    'default'         => false,
    'priority'        => 12,
    'active_callback' => array(
        array(
            'setting'  => 'breadcrumbs_toggle',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));

Kirki::add_field('potter', array(
    'type'            => 'radio',
    'settings'        => 'title_bar_position',
    'label'           => __('Breadcrumb  Position', 'potter'),
    'section'         => 'potter_breadcrumb_settings',
    'default'         => 'before-content',
    'priority'        => 13,
    'multiple'        => 1,
    'choices'         => array(
      'before-content'   => esc_html__('Before title', 'potter'),
      'after-header' => esc_html__('After Header', 'potter'),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'breadcrumbs_toggle',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));


// Separator.
Kirki::add_field('potter', array(
    'type'            => 'text',
    'settings'        => 'breadcrumbs_separator',
    'label'           => __('Separator', 'potter'),
    'section'         => 'potter_breadcrumb_settings',
    'default'         => '/',
    'priority'        => 13,
    'active_callback' => array(
        array(
            'setting'  => 'breadcrumbs_toggle',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));

/* Fields – Blog (General) */



// Meta sortable.
Kirki::add_field('potter', array(
    'type'     => 'sortable',
    'settings' => 'blog_sortable_meta',
    'label'    => __('Meta Data', 'potter'),
    'section'  => 'potter_blog_settings',
    'default'  => array(
        'author',
        'date',
    ),
    'choices'  => array(
        'author'   => __('Author', 'potter'),
        'date'     => __('Date', 'potter'),
        'comments' => __('Comments', 'potter'),
    ),
    'priority' => 1,
));

// Alt tag.
Kirki::add_field('potter', array(
    'type'     => 'text',
    'settings' => 'blog_meta_separator',
    'label'    => __('Separator', 'potter'),
    'section'  => 'potter_blog_settings',
    'priority' => 1,
    'default'  => '|',
));

// Alt tag.
Kirki::add_field('potter', array(
    'type'            => 'toggle',
    'settings'        => 'blog_author_avatar',
    'label'           => __('Author Avatar', 'potter'),
    'section'         => 'potter_blog_settings',
    'priority'        => 1,
    'active_callback' => array(
        array(
            'setting'  => 'blog_sortable_meta',
            'operator' => 'in',
            'value'    => 'author',
        ),
    ),
));

// Separator.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-101053674',
    'section'  => 'potter_blog_settings',
    'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
    'priority' => 1,
));

// Excerpt length.
Kirki::add_field('potter', array(
    'type'        => 'number',
    'settings'    => 'excerpt_lenght',
    'label'       => __('Excerpt Length', 'potter'),
    'description' => __('By default the excerpt length is set to return 55 words.', 'potter'),
    'default'     => '55',
    'section'     => 'potter_blog_settings',
    'priority'    => 1,
    'choices'     => array(
        'min'  => '0',
        'max'  => '100',
        'step' => '1',
    ),
));

// Read more button.
Kirki::add_field('potter', array(
    'type'     => 'radio',
    'settings' => 'blog_read_more_link',
    'label'    => __('Read More Link', 'potter'),
    'section'  => 'potter_blog_settings',
    'default'  => 'button',
    'priority' => 1,
    'multiple' => 1,
    'choices'  => array(
        'text'    => __('Text', 'potter'),
        'button'  => __('Button', 'potter'),
        'primary' => __('Button (Primary)', 'potter'),
    ),
));

// Read more text.
Kirki::add_field('potter', array(
    'type'     => 'text',
    'settings' => 'blog_read_more_text',
    'label'    => __('Read More Text', 'potter'),
    'section'  => 'potter_blog_settings',
    'default'  => 'Read more',
    'priority' => 2,
));

// Categories title.
Kirki::add_field('potter', array(
    'type'     => 'text',
    'settings' => 'blog_categories_title',
    'label'    => __('Categories Title', 'potter'),
    'section'  => 'potter_blog_settings',
    'default'  => 'Filed under:',
    'priority' => 2,
));

/* Fields - Blog (Pagination) */

// Border radius.
Kirki::add_field('potter', array(
    'type'      => 'slider',
    'settings'  => 'blog_pagination_border_radius',
    'label'     => __('Border Radius', 'potter'),
    'section'   => 'potter_pagination_settings',
    'priority'  => 2,
    'default'   => '0',
    'transport' => 'postMessage',
    'choices'   => array(
        'min'  => '0',
        'max'  => '100',
        'step' => '1',
    ),
));

// Pagination background color.
Kirki::add_field('potter', array(
    'type'      => 'color',
    'settings'  => 'blog_pagination_background_color',
    'label'     => __('Background Color', 'potter'),
    'section'   => 'potter_pagination_settings',
    'transport' => 'postMessage',
    'priority'  => 2,
    'choices'   => array(
        'alpha' => true,
    ),
));

// Pagination background color alt.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'blog_pagination_background_color_alt',
    'label'    => __('Hover', 'potter'),
    'section'  => 'potter_pagination_settings',
    'priority' => 2,
    'choices'  => array(
        'alpha' => true,
    ),
));

// Pagination background color active.
Kirki::add_field('potter', array(
    'type'      => 'color',
    'settings'  => 'blog_pagination_background_color_active',
    'label'     => __('Active', 'potter'),
    'section'   => 'potter_pagination_settings',
    'transport' => 'postMessage',
    'priority'  => 2,
    'choices'   => array(
        'alpha' => true,
    ),
));

// Pagination font color.
Kirki::add_field('potter', array(
    'type'      => 'color',
    'settings'  => 'blog_pagination_font_color',
    'label'     => __('Font Color', 'potter'),
    'section'   => 'potter_pagination_settings',
    'transport' => 'postMessage',
    'priority'  => 2,
    'choices'   => array(
        'alpha' => true,
    ),
));

// Pagination hover color.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'blog_pagination_font_color_alt',
    'label'    => __('Hover', 'potter'),
    'section'  => 'potter_pagination_settings',
    'default'  => '',
    'priority' => 2,
    'choices'  => array(
        'alpha' => true,
    ),
));

// Pagination active color.
Kirki::add_field('potter', array(
    'type'      => 'color',
    'settings'  => 'blog_pagination_font_color_active',
    'label'     => __('Active', 'potter'),
    'section'   => 'potter_pagination_settings',
    'transport' => 'postMessage',
    'default'   => '',
    'priority'  => 2,
    'choices'   => array(
        'alpha' => true,
    ),
));

// Pagination font size.
Kirki::add_field('potter', array(
    'type'      => 'input_slider',
    'label'     => __('Font Size', 'potter'),
    'settings'  => 'blog_pagination_font_size',
    'section'   => 'potter_pagination_settings',
    'transport' => 'postMessage',
    'priority'  => 2,
    'choices'   => array(
        'min'  => '0',
        'max'  => '100',
        'step' => '1',
    ),
));

/* Fields - Blog (Blog Layouts) */

foreach ($archives as $archive) {
    Kirki::add_field('potter', array(
      'type'     => 'custom',
      'settings' => 'separator-1096',
      'section'  => 'potter_' . $archive . '_options',
      'default'  => '<h3 class="setting-header">' . esc_html__('Blog Page Title', 'potter') .  '</h3>',
      'priority' => 0,
  ));

    Kirki::add_field('potter', array(
      'type'     => 'text',
      'settings' => 'blog_page_custom_title',
      'section'  => 'potter_' . $archive . '_options',
      'default'  => __('Just another WordPress blog', 'potter'),
      'priority' => 0,
  ));

    // Separator.
    Kirki::add_field('potter', array(
      'type'     => 'custom',
      'settings' => 'separator-109',
      'section'  => 'potter_' . $archive . '_options',
      'default'  => '<h3 class="setting-header">' . esc_html__('Archive Layout Setting', 'potter') .  '</h3>',
      'priority' => 0,
  ));
    // Width.
    Kirki::add_field('potter', array(
        'type'        => 'dimension',
        'label'       => __('Custom Content Width', 'potter'),
        'settings'    => $archive . '_custom_width',
        'section'     => 'potter_' . $archive . '_options',
        'description' => __('Default: 1200px', 'potter'),
        'priority'    => 0,
        'default'			=> '1200px',

    ));

    if ('blog' !== $archive && 'search' !== $archive) {

        // Headline.
        Kirki::add_field('potter', array(
            'type'     => 'radio',
            'settings' => $archive . '_headline',
            'label'    => ucwords(str_replace('-', ' ', $archive)) . '&nbsp;' . __('Headline', 'potter'),
            'section'  => 'potter_' . $archive . '_options',
            'default'  => 'show',
            'priority' => 0,
            'multiple' => 1,
            'choices'  => array(
                'show'        => __('Show', 'potter'),
                'hide'        => __('Hide', 'potter'),
                'hide_prefix' => __('Remove Prefix', 'potter'),
            ),
        ));
    }

    // Sidebar layout.

    // Alignment.
    Kirki::add_field('potter', array(
        'type'     => 'radio-image',
        'settings' => $archive . '_sidebar_layout',
        'label'    => __('Sidebar', 'potter'),
        'section'  => 'potter_' . $archive . '_options',
        'default'  => 'right',
        'priority' => 0,
        'multiple' => 1,
        'choices'  => array(
            'left'   => POTTER_THEME_URI . '/inc/customizer/img/left-sidebar.png',
            'right' => POTTER_THEME_URI . '/inc/customizer/img/right-sidebar.png',
            'none'  => POTTER_THEME_URI . '/inc/customizer/img/no-sidebar.png',
        ),
    ));

    // Separator.
    Kirki::add_field('potter', array(
        'type'     => 'custom',
        'settings' => $archive . '-separator-74767',
        'section'  => 'potter_' . $archive . '_options',
        'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
        'priority' => 0,
    ));

    // Header.
    Kirki::add_field('potter', array(
        'type'     => 'sortable',
        'settings' => $archive . '_sortable_header',
        'label'    => __('Header', 'potter'),
        'section'  => 'potter_' . $archive . '_options',
        'default'  => array(
            'title',
            'meta',
            'featured',
        ),
        'choices'  => array(
            'title'    => __('Title', 'potter'),
            'meta'     => __('Meta Data', 'potter'),
            'featured' => __('Featured Image', 'potter'),
        ),
        'priority' => 0,
    ));

    // Footer.
    Kirki::add_field('potter', array(
        'type'     => 'sortable',
        'settings' => $archive . '_sortable_footer',
        'label'    => __('Footer', 'potter'),
        'section'  => 'potter_' . $archive . '_options',
        'default'  => array(
            'readmore',
            'categories',
        ),
        'choices'  => array(
            'readmore'   => __('Read More', 'potter'),
            'categories' => __('Categories', 'potter'),
            'tags'       => __('Tags', 'potter'),
        ),
        'priority' => 0,
    ));

    // Separator.
    Kirki::add_field('potter', array(
        'type'     => 'custom',
        'settings' => $archive . '-separator-26125',
        'section'  => 'potter_' . $archive . '_options',
        'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
        'priority' => 0,
    ));

    // Layout.
    Kirki::add_field('potter', array(
        'type'     => 'radio-image',
        'settings' => $archive . '_layout',
        'label'    => __('Layout', 'potter'),
        'section'  => 'potter_' . $archive . '_options',
        'default'  => 'default',
        'priority' => 10,
        'multiple' => 1,
        'choices'  => apply_filters('potter_blog_layouts', array(
            'default' => POTTER_THEME_URI . '/inc/customizer/img/blog-style1.png',
            'beside'  => POTTER_THEME_URI . '/inc/customizer/img/blog-style2.png',
        )),
    ));

    // Style.
    Kirki::add_field('potter', array(
        'type'     => 'radio',
        'settings' => $archive . '_post_style',
        'label'    => __('Style', 'potter'),
        'section'  => 'potter_' . $archive . '_options',
        'default'  => 'plain',
        'priority' => 20,
        'multiple' => 1,
        'choices'  => array(
            'plain' => __('Plain', 'potter'),
            'boxed' => __('Boxed', 'potter'),
        ),
    ));

    // Stretch image.
    Kirki::add_field('potter', array(
        'type'            => 'toggle',
        'settings'        => $archive . '_boxed_image_streched',
        'label'           => __('Stretch Featured Image', 'potter'),
        'section'         => 'potter_' . $archive . '_options',
        'default'         => 0,
        'priority'        => 20,
        'active_callback' => array(
            array(
                'setting'  => $archive . '_post_style',
                'operator' => '==',
                'value'    => 'boxed',
            ),
            array(
                'setting'  => $archive . '_layout',
                'operator' => '!=',
                'value'    => 'beside',
            ),

        ),
    ));

    // Space between.
    Kirki::add_field('potter', array(
        'type'     => 'slider',
        'label'    => __('Space Between', 'potter'),
        'settings' => $archive . '_post_space_between',
        'section'  => 'potter_' . $archive . '_options',
        'priority' => 30,
        'default'  => 40,
        'choices'  => array(
            'min'  => '0',
            'max'  => '100',
            'step' => '1',
        ),
        'active_callback' => array(
            array(
                'setting'  => $archive . '_post_style',
                'operator' => '==',
                'value'    => 'boxed',
            ),
        ),
    ));

    /* All Layouts */

    // Alignment.
    Kirki::add_field('potter', array(
        'type'     => 'radio-image',
        'settings' => $archive . '_post_content_alignment',
        'label'    => __('Content Alignment', 'potter'),
        'section'  => 'potter_' . $archive . '_options',
        'default'  => 'left',
        'priority' => 40,
        'multiple' => 1,
        'choices'  => array(
            'left'   => POTTER_THEME_URI . '/inc/customizer/img/align-left.png',
            'center' => POTTER_THEME_URI . '/inc/customizer/img/align-center.png',
            'right'  => POTTER_THEME_URI . '/inc/customizer/img/align-right.png',
        ),
    ));

    // Background color.
    Kirki::add_field('potter', array(
        'type'            => 'color',
        'settings'        => $archive . '_post_background_color',
        'label'           => __('Background Color', 'potter'),
        'section'         => 'potter_' . $archive . '_options',
        'default'         => '#fff',
        'priority'        => 50,
        'choices'         => array(
            'alpha' => true,
        ),
        'active_callback' => array(
            array(
                'setting'  => $archive . '_post_style',
                'operator' => '==',
                'value'    => 'boxed',
            ),
        ),
    ));

    // Accent color.
    Kirki::add_field('potter', array(
        'type'     => 'color',
        'settings' => $archive . '_post_accent_color',
        'label'    => __('Accent Color', 'potter'),
        'section'  => 'potter_' . $archive . '_options',
        'priority' => 60,
        'choices'  => array(
            'alpha' => true,
        ),
    ));

    // Hover.
    Kirki::add_field('potter', array(
        'type'     => 'color',
        'settings' => $archive . '_post_accent_color_alt',
        'label'    => __('Hover', 'potter'),
        'section'  => 'potter_' . $archive . '_options',
        'priority' => 70,
        'choices'  => array(
            'alpha' => true,
        ),
    ));

    // Title size.
    Kirki::add_field('potter', array(
        'type'     => 'input_slider',
        'label'    => __('Title Font Size', 'potter'),
        'settings' => $archive . '_post_title_size',
        'section'  => 'potter_' . $archive . '_options',
        'priority' => 80,
        'choices'  => array(
            'min'  => '0',
            'max'  => '50',
            'step' => '1',
        ),
    ));

    // Font size.
    Kirki::add_field('potter', array(
        'type'     => 'input_slider',
        'label'    => __('Font Size', 'potter'),
        'settings' => $archive . '_post_font_size',
        'section'  => 'potter_' . $archive . '_options',
        'priority' => 90,
        'choices'  => array(
            'min'  => '0',
            'max'  => '50',
            'step' => '1',
        ),
    ));

    /* Beside */

    // Beside headline.
    Kirki::add_field('potter', array(
        'type'            => 'custom',
        'settings'        => $archive . '-separator-824021',
        'section'         => 'potter_' . $archive . '_options',
        'default'         => '<h3 style="padding:15px 10px; background:#fff; margin:0;">' . __('Image Beside Post Layout Settings', 'potter') . '</h3>',
        'priority'        => 100,
        'active_callback' => array(
            array(
                'setting'  => $archive . '_layout',
                'operator' => '==',
                'value'    => 'beside',
            ),
        ),
    ));

    // Image alignment.
    Kirki::add_field('potter', array(
        'type'            => 'radio-image',
        'settings'        => $archive . '_post_image_alignment',
        'label'           => __('Image Alignment', 'potter'),
        'section'         => 'potter_' . $archive . '_options',
        'default'         => 'left',
        'priority'        => 110,
        'multiple'        => 1,
        'choices'         => array(
            'left'  => POTTER_THEME_URI . '/inc/customizer/img/align-left.png',
            'right' => POTTER_THEME_URI . '/inc/customizer/img/align-right.png',
        ),
        'active_callback' => array(
            array(
                'setting'  => $archive . '_layout',
                'operator' => '==',
                'value'    => 'beside',
            ),
        ),
    ));

    // Image width.
    Kirki::add_field('potter', array(
        'type'            => 'slider',
        'settings'        => $archive . '_post_image_width',
        'label'           => __('Image Width', 'potter'),
        'section'         => 'potter_' . $archive . '_options',
        'priority'        => 120,
        'default'         => 40,
        'choices'         => array(
            'min'  => '20',
            'max'  => '80',
            'step' => '1',
        ),
        'active_callback' => array(
            array(
                'setting'  => $archive . '_layout',
                'operator' => '==',
                'value'    => 'beside',
            ),
        ),
    ));
}






/* Fields – Blog (Post Layout) */

foreach ($singles as $single) {
    Kirki::add_field('potter', array(
      'type'     => 'custom',
      'settings' => 'separator-1093',
      'section'  => 'potter_' . $single . '_options',
      'default'  => '<h3 class="setting-header">' . esc_html__('Post Layout Setting', 'potter') .  '</h3>',
      'priority' => 0,
  ));
    // Width.
    Kirki::add_field('potter', array(
        'type'        => 'dimension',
        'label'       => __('Custom Content Width', 'potter'),
        'settings'    => $single . '_custom_width',
        'section'     => 'potter_' . $single . '_options',
        'description' => __('Default: 1200px', 'potter'),
        'priority'    => 0,
        'default'			=> '1200px',
    ));

    // Sidebar layout.
    Kirki::add_field('potter', array(
        'type'     => 'radio-image',
        'settings' => $single . '_sidebar_layout',
        'label'    => __('Sidebar', 'potter'),
        'section'  => 'potter_' . $single . '_options',
        'default'  => 'right',
        'priority' => 0,
        'multiple' => 1,
        'choices'  => array(
            'left'   => POTTER_THEME_URI . '/inc/customizer/img/left-sidebar.png',
            'right'  => POTTER_THEME_URI . '/inc/customizer/img/right-sidebar.png',
            'none' => POTTER_THEME_URI . '/inc/customizer/img/no-sidebar.png',
        ),

    ));

    // Separator.
    Kirki::add_field('potter', array(
        'type'     => 'custom',
        'settings' => $single . '-separator-74767',
        'section'  => 'potter_' . $single . '_options',
        'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
        'priority' => 0,
    ));

    // Header.
    Kirki::add_field('potter', array(
        'type'     => 'sortable',
        'settings' => $single . '_sortable_header',
        'label'    => __('Header', 'potter'),
        'section'  => 'potter_' . $single . '_options',
        'default'  => array(
            'title',
            'meta',
            'featured',
        ),
        'choices'  => array(
            'title'    => __('Title', 'potter'),
            'meta'     => __('Meta Data', 'potter'),
            'featured' => __('Featured Image', 'potter'),
        ),
        'priority' => 0,
    ));

    // Footer.
    Kirki::add_field('potter', array(
        'type'     => 'sortable',
        'settings' => $single . '_sortable_footer',
        'label'    => __('Footer', 'potter'),
        'section'  => 'potter_' . $single . '_options',
        'default'  => array(
            'readmore',
            'categories',
        ),
        'choices'  => array(
            'readmore'   => __('Read More', 'potter'),
            'categories' => __('Categories', 'potter'),
            'tags'       => __('Tags', 'potter'),
        ),
        'priority' => 0,
    ));

    // Separator.
    Kirki::add_field('potter', array(
        'type'     => 'custom',
        'settings' => $single . '-separator-23124507',
        'section'  => 'potter_' . $single . '_options',
        'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
        'priority' => 0,
    ));

    // Post navigation.
    Kirki::add_field('potter', array(
        'type'     => 'radio',
        'settings' => $single . '_post_nav',
        'label'    => __('Post Navigation', 'potter'),
        'section'  => 'potter_' . $single . '_options',
        'default'  => 'show',
        'priority' => 0,
        'multiple' => 1,
        'choices'  => array(
            'show'    => __('Previous/Next Post', 'potter'),
            'default' => __('Post Title', 'potter'),
            'hide'    => __('Hide', 'potter'),
        ),
    ));

    // Style.
    Kirki::add_field('potter', array(
        'type'     => 'radio',
        'settings' => $single . '_post_style',
        'label'    => __('Style', 'potter'),
        'section'  => 'potter_' . $single . '_options',
        'default'  => 'plain',
        'priority' => 0,
        'multiple' => 1,
        'choices'  => array(
            'plain' => __('Plain', 'potter'),
            'boxed' => __('Boxed', 'potter'),
        ),
    ));

    // Stretch image.
    Kirki::add_field('potter', array(
        'type'            => 'toggle',
        'settings'        => $single . '_boxed_image_stretched',
        'label'           => __('Stretch Featured Image', 'potter'),
        'section'         => 'potter_' . $single . '_options',
        'default'         => 0,
        'priority'        => 0,
        'active_callback' => array(
            array(
                'setting'  => $single . '_post_style',
                'operator' => '==',
                'value'    => 'boxed',
            ),
        ),
    ));



    // Background color.
    Kirki::add_field('potter', array(
        'type'            => 'color',
        'settings'        => $single . '_post_background_color',
        'label'           => __('Background Color', 'potter'),
        'section'         => 'potter_single_options',
        'default'         => '#f5f5f7',
        'priority'        => 20,
        'choices'         => array(
            'alpha' => true,
        ),
        'active_callback' => array(
            array(
                'setting'  => $single . '_post_style',
                'operator' => '==',
                'value'    => 'boxed',
            ),
        ),
    ));

    // Title size.
    Kirki::add_field('potter', array(
        'type'     => 'input_slider',
        'label'    => __('Title Font Size', 'potter'),
        'settings' => $single . '_post_title_size',
        'section'  => 'potter_' . $single . '_options',
        'priority' => 20,
        'choices'  => array(
            'min'  => '0',
            'max'  => '50',
            'step' => '1',
        ),
    ));

    // Font size.
    Kirki::add_field('potter', array(
        'type'     => 'input_slider',
        'label'    => __('Font Size', 'potter'),
        'settings' => $single . '_post_font_size',
        'section'  => 'potter_' . $single . '_options',
        'priority' => 20,
        'choices'  => array(
            'min'  => '0',
            'max'  => '50',
            'step' => '1',
        ),
    ));
}


/* Fields – General */

// 404 title.
Kirki::add_field('potter', array(
    'type'     => 'text',
    'label'    => __('Title', 'potter'),
    'settings' => '404_headline',
    'section'  => 'potter_404_options',
    'default'  => __("404 - This page couldn't be found.", "potter"),
    'priority' => 1,
));

// 404 text.
Kirki::add_field('potter', array(
    'type'     => 'text',
    'label'    => __('Text', 'potter'),
    'settings' => '404_text',
    'section'  => 'potter_404_options',
    'default'  => __("Oops! We're sorry, this page couldn't be found!", "potter"),
    'priority' => 2,
));

// Search form.
Kirki::add_field('potter', array(
    'type'     => 'radio',
    'settings' => '404_search_form',
    'label'    => __('Search Form', 'potter'),
    'section'  => 'potter_404_options',
    'default'  => 'show',
    'priority' => 3,
    'multiple' => 1,
    'choices'  => array(
        'show' => __('Show', 'potter'),
        'hide' => __('Hide', 'potter'),
    ),
));

// Max width.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-105',
    'section'  => 'potter_page_options',
    'default'  => '<h3 class="setting-header">' . esc_html__('Layout Setting', 'potter') .  '</h3>',
    'priority' => 0,
));
Kirki::add_field('potter', array(
    'type'        => 'dimension',
    'label'       => __('Default Container Width', 'potter'),
    'settings'    => 'page_max_width',
    'section'     => 'potter_page_options',
    'description' => __('Default: 1200px', 'potter'),
    'priority'    => 1,
    'default'			=> '1200px',
    'transport'       => 'postMessage',
));

// Boxed.
Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'page_boxed',
    'label'    => __('Boxed', 'potter'),
    'section'  => 'potter_page_options',
    'default'  => 0,
    'priority' => 2,
));

// Boxed margin.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'page_boxed_margin',
    'label'           => __('Margin', 'potter'),
    'section'         => 'potter_page_options',
    'priority'        => 3,
    'default'         => 0,
    'transport'       => 'postMessage',
    'choices'         => array(
        'min'  => '0',
        'max'  => '80',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'page_boxed',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));

// Boxed padding.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'page_boxed_padding',
    'label'           => __('Padding', 'potter'),
    'section'         => 'potter_page_options',
    'priority'        => 4,
    'default'         => 20,
    'transport'       => 'postMessage',
    'choices'         => array(
        'min'  => '20',
        'max'  => '100',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'page_boxed',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));

// Background color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'page_boxed_background',
    'label'           => __('Background Color', 'potter'),
    'section'         => 'potter_page_options',
    'default'         => '#ffffff',
    'priority'        => 5,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'page_boxed',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));

// Box shadow.
Kirki::add_field('potter', array(
    'type'            => 'toggle',
    'settings'        => 'page_boxed_box_shadow',
    'label'           => __('Box Shadow', 'potter'),
    'section'         => 'potter_page_options',
    'default'         => 0,
    'priority'        => 6,
    'active_callback' => array(
        array(
            'setting'  => 'page_boxed',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));

// Box shadow blur.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'page_boxed_box_shadow_blur',
    'label'           => __('Blur', 'potter'),
    'section'         => 'potter_page_options',
    'priority'        => 7,
    'default'         => 25,
    'choices'         => array(
        'min'  => '0',
        'max'  => '100',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'page_boxed',
            'operator' => '==',
            'value'    => 1,
        ),
        array(
            'setting'  => 'page_boxed_box_shadow',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));

// Box shadow spread.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'page_boxed_box_shadow_spread',
    'label'           => __('Spread', 'potter'),
    'section'         => 'potter_page_options',
    'priority'        => 8,
    'default'         => 0,
    'choices'         => array(
        'min'  => '-100',
        'max'  => '100',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'page_boxed',
            'operator' => '==',
            'value'    => 1,
        ),
        array(
            'setting'  => 'page_boxed_box_shadow',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));

// Box shadow horizontal.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'page_boxed_box_shadow_horizontal',
    'label'           => __('Horizontal', 'potter'),
    'section'         => 'potter_page_options',
    'priority'        => 9,
    'default'         => 0,
    'choices'         => array(
        'min'  => '-100',
        'max'  => '100',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'page_boxed',
            'operator' => '==',
            'value'    => 1,
        ),
        array(
            'setting'  => 'page_boxed_box_shadow',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));

// Box shadow vertical.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'page_boxed_box_shadow_vertical',
    'label'           => __('Vertical', 'potter'),
    'section'         => 'potter_page_options',
    'priority'        => 10,
    'default'         => 0,
    'choices'         => array(
        'min'  => '-100',
        'max'  => '100',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'page_boxed',
            'operator' => '==',
            'value'    => 1,
        ),
        array(
            'setting'  => 'page_boxed_box_shadow',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));

// Box shadow color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'page_boxed_box_shadow_color',
    'label'           => __('Color', 'potter'),
    'section'         => 'potter_page_options',
    'default'         => 'rgba(0,0,0,.15)',
    'priority'        => 11,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'page_boxed',
            'operator' => '==',
            'value'    => 1,
        ),
        array(
            'setting'  => 'page_boxed_box_shadow',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));

// Separator.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-26125',
    'section'  => 'potter_page_options',
    'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
    'priority' => 12,
));

// Scrolltop.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-106',
    'section'  => 'potter_page_options',
    'default'  => '<h3 class="setting-header">' . esc_html__('Scroll to Top Setting', 'potter') .  '</h3>',
    'priority' => 13,
));
Kirki::add_field('potter', array(
    'type'        => 'toggle',
    'settings'    => 'layout_scrolltop',
    'label'       => __('ScrollTop', 'potter'),
    'description' => __('Select if you would like to display a scroll to top arrow', 'potter'),
    'section'     => 'potter_page_options',
    'default'     => '0',
    'priority'    => 13,
));

// Position.

Kirki::add_field('potter', array(
    'type'     => 'radio-image',
    'settings' => 'scrolltop_position',
    'label'    => __('Position', 'potter'),
    'section'  => 'potter_page_options',
    'default'  => 'right',
    'priority' => 14,
    'multiple' => 1,
    'choices'  => array(
        'left'   => POTTER_THEME_URI . '/inc/customizer/img/sroll-top-right-side.png',
        'right'  => POTTER_THEME_URI . '/inc/customizer/img/sroll-top-left-side.png',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'layout_scrolltop',
            'operator' => '==',
            'value'    => 1,
        ),
    ),

));


// Show after.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'scrolltop_value',
    'label'           => __('Show after (px)', 'potter'),
    'section'         => 'potter_page_options',
    'priority'        => 15,
    'default'         => '400',
    'choices'         => array(
        'min'  => '50',
        'max'  => '1000',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'layout_scrolltop',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));

// Background color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'scrolltop_bg_color',
    'label'           => __('Background Color', 'potter'),
    'section'         => 'potter_page_options',
    'priority'        => 16,
    'transport'       => 'postMessage',
    'default'         => 'rgba(62,67,73,.5)',
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'layout_scrolltop',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));

// Background color hover.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'scrolltop_bg_color_alt',
    'label'           => __('Hover', 'potter'),
    'section'         => 'potter_page_options',
    'priority'        => 17,
    'default'         => 'rgba(62,67,73,.7)',
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'layout_scrolltop',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));

// Border radius.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'scrolltop_border_radius',
    'label'           => __('Border Radius', 'potter'),
    'section'         => 'potter_page_options',
    'priority'        => 18,
    'default'         => '0',
    'transport'       => 'postMessage',
    'choices'         => array(
        'min'  => '0',
        'max'  => '100',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'layout_scrolltop',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));

/* Fields – Sidebar */

// Postion.
Kirki::add_field('potter', array(
    'type'     => 'radio-image',
    'settings' => 'sidebar_position',
    'label'    => __('Sidebar', 'potter'),
    'section'  => 'potter_sidebar_options',
    'default'  => 'right',
    'priority' => 1,
    'multiple' => 1,
    'choices'  => array(
        'left'   => POTTER_THEME_URI . '/inc/customizer/img/left-sidebar.png',
        'right'  => POTTER_THEME_URI . '/inc/customizer/img/right-sidebar.png',
        'none'  => POTTER_THEME_URI . '/inc/customizer/img/no-sidebar.png',
    ),
));

// Gap.
Kirki::add_field('potter', array(
    'type'     => 'radio',
    'settings' => 'sidebar_gap',
    'label'    => __('Gap', 'potter'),
    'section'  => 'potter_sidebar_options',
    'default'  => 'medium',
    'priority' => 2,
    'multiple' => 1,
    'choices'  => array(
        'divider'  => __('Divider', 'potter'),
        'xlarge'   => __('xLarge', 'potter'),
        'large'    => __('Large', 'potter'),
        'medium'   => __('Medium', 'potter'),
        'small'    => __('Small', 'potter'),
        'collapse' => __('Collapse', 'potter'),
    ),
));

// Width.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'sidebar_width',
    'label'           => __('Width', 'potter'),
    'section'         => 'potter_sidebar_options',
    'priority'        => 2,
    'default'         => '33.3',
    'transport'       => 'postMessage',
    'choices'         => array(
        'min'  => '20',
        'max'  => '40',
        'step' => '.1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'sidebar_position',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
));

// Separator.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-481013',
    'section'  => 'potter_sidebar_options',
    'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
    'priority' => 2,
));


// Color.
Kirki::add_field('potter', array(
    'type'      => 'color',
    'settings'  => 'sidebar_bg_color',
    'label'     => __('Background Color', 'potter'),
    'section'   => 'potter_sidebar_options',
    'priority'  => 6,
    'transport' => 'postMessage',
    'choices'   => array(
        'alpha' => true,
    ),
));



/* Fields – Buttons */

// Background color.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'button_bg_color',
    'label'    => __('Background Color', 'potter'),
    'section'  => 'potter_button_options',
    'priority' => 1,
    'choices'  => array(
        'alpha' => true,
    ),
));

// Background color alt.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'button_bg_color_alt',
    'label'    => __('Hover', 'potter'),
    'section'  => 'potter_button_options',
    'priority' => 1,
    'choices'  => array(
        'alpha' => true,
    ),
));

// Text color.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'button_text_color',
    'label'    => __('Font Color', 'potter'),
    'section'  => 'potter_button_options',
    'priority' => 1,
    'choices'  => array(
        'alpha' => true,
    ),
));

// Text color alt.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'button_text_color_alt',
    'label'    => __('Hover', 'potter'),
    'section'  => 'potter_button_options',
    'priority' => 1,
    'choices'  => array(
        'alpha' => true,
    ),
));

// Separator.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-81461',
    'section'  => 'potter_button_options',
    'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
    'priority' => 1,
));

// Primary.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'button_primary_bg_color',
    'label'    => __('Primary Background Color', 'potter'),
    'section'  => 'potter_button_options',
    'priority' => 1,
    'choices'  => array(
        'alpha' => true,
    ),
));

// Primary background color alt.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'button_primary_bg_color_alt',
    'label'    => __('Hover', 'potter'),
    'section'  => 'potter_button_options',
    'priority' => 1,
    'choices'  => array(
        'alpha' => true,
    ),
));

// Primary text color.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'button_primary_text_color',
    'label'    => __('Primary Font Color', 'potter'),
    'section'  => 'potter_button_options',
    'priority' => 1,
    'choices'  => array(
        'alpha' => true,
    ),
));

// Primary text color alt.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'button_primary_text_color_alt',
    'label'    => __('Hover', 'potter'),
    'section'  => 'potter_button_options',
    'priority' => 1,
    'choices'  => array(
        'alpha' => true,
    ),
));

// Separator.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-33757',
    'section'  => 'potter_button_options',
    'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
    'priority' => 1,
));

// Border radius.
Kirki::add_field('potter', array(
    'type'      => 'slider',
    'settings'  => 'button_border_radius',
    'label'     => __('Border Radius', 'potter'),
    'section'   => 'potter_button_options',
    'priority'  => 1,
    'default'   => '0',
    'choices'   => array(
        'min'  => '0',
        'max'  => '100',
        'step' => '1',
    ),
));

// Border width.
Kirki::add_field('potter', array(
    'type'     => 'slider',
    'settings' => 'button_border_width',
    'label'    => __('Border Width', 'potter'),
    'section'  => 'potter_button_options',
    'priority' => 1,
    'default'  => '0',
    'choices'  => array(
        'min'  => '0',
        'max'  => '10',
        'step' => '1',
    ),
));

// Border color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'button_border_color',
    'label'           => __('Border Color', 'potter'),
    'section'         => 'potter_button_options',
    'priority'        => 1,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'button_border_width',
            'operator' => '!==',
            'value'    => '0',
        ),
    ),
));

// Border color alt.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'button_border_color_alt',
    'label'           => __('Hover', 'potter'),
    'section'         => 'potter_button_options',
    'priority'        => 1,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'button_border_width',
            'operator' => '!==',
            'value'    => '0',
        ),
    ),
));

// Primary border color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'button_primary_border_color',
    'label'           => __('Primary Border Color', 'potter'),
    'section'         => 'potter_button_options',
    'priority'        => 1,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'button_border_width',
            'operator' => '!==',
            'value'    => '0',
        ),
    ),
));

// Primary border color alt.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'button_primary_border_color_alt',
    'label'           => __('Hover', 'potter'),
    'section'         => 'potter_button_options',
    'priority'        => 1,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'button_border_width',
            'operator' => '!==',
            'value'    => '0',
        ),
    ),
));

/* Fields – Typography */
// Separator.

// Text font toggle.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-1023',
    'section'  => 'typo_panel',
    'default'  => '<h3 class="setting-header">' . esc_html__('Page Font Setting', 'potter') .  '</h3>',
    'priority' => 0,
));
Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'page_font_toggle',
    'label'    => __('Page Font Settings', 'potter'),
    'section'  => 'typo_panel',
    'default'  => 0,
    'priority' => 0,
));

// Font family.
Kirki::add_field('potter', array(
    'type'            => 'typography',
    'settings'        => 'page_font_family',
    'label'           => __('Font', 'potter'),
    'section'         => 'typo_panel',
    'default'         => array(
        'font-family' => 'Helvetica, Arial, sans-serif',
        'variant'     => 'regular',
        'text-transform'     => 'capitalize',
    ),
    'choices'         => potter_default_font_choices(),
    'active_callback' => array(
        array(
            'setting'  => 'page_font_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'priority'        => 1,
));

// Color.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-10234',
    'section'  => 'color_panel',
    'default'  => '<h3 class="setting-header">' . esc_html__('Global Color Setting', 'potter') .  '</h3>',
    'priority' => 2,
));
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'page_font_color',
    'label'    => __('Color', 'potter'),
    'section'  => 'color_panel',
    'default'  => '#666',
    'priority' => 2,
    'choices'  => array(
        'alpha' => true,
    ),
));

// Accent color.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'page_accent_color',
    'label'    => __('Accent Color', 'potter'),
    'section'  => 'color_panel',
    'priority' => 3,
    'choices'  => array(
        'alpha' => true,
    ),

));

// Accent color alt.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'page_accent_color_alt',
    'label'    => __('Hover', 'potter'),
    'section'  => 'color_panel',
    'priority' => 4,
    'default'  => '#333',
    'choices'  => array(
        'alpha' => true,
    ),
));

// Line height.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'page_font_line_height',
    'label'           => __('Line Height', 'potter'),
    'section'         => 'typo_panel',
    'priority'        => 1,
    'default'         => '1.7',
    'choices'         => array(
        'min'  => '1',
        'max'  => '10',
        'step' => '.1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'page_font_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));

Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-102345',
    'section'  => 'typo_panel',
    'default'  => '<h3 class="setting-header">' . esc_html__('Title and Tagline', 'potter') .  '</h3>',
    'priority' => 6,
));
// Title font toggle.
Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'menu_logo_font_toggle',
    'label'    => __('Site Title Font Settings', 'potter'),
    'section'  => 'typo_panel',
    'default'  => 0,
    'priority' => 6,
));

// Font family.
Kirki::add_field('potter', array(
    'type'            => 'typography',
    'settings'        => 'menu_logo_font_family',
    'label'           => __('Font', 'potter'),
    'section'         => 'typo_panel',
    'default'         => array(
        'font-family' => 'Raleway, Arial, sans-serif',
        'variant'     => '700',
        'text-transform'     => 'capitalize',
        'subsets'     => array( 'latin-ext' ),

    ),
    'choices'         => potter_default_font_choices(),
    'priority'        => 7,
    'active_callback' => array(
        array(
            'setting'  => 'menu_logo_font_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));



// Tagline font toggle.
Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'menu_logo_description_toggle',
    'label'    => __('Site Tagline Font Settings', 'potter'),
    'section'  => 'typo_panel',
    'default'  => 0,
    'priority' => 8,
));

// Font family.
Kirki::add_field('potter', array(
    'type'            => 'typography',
    'settings'        => 'menu_logo_description_font_family',
    'label'           => __('Font', 'potter'),
    'section'         => 'typo_panel',
    'default'         => array(
        'font-family' => 'Helvetica, Arial, sans-serif',
        'variant'     => '700',
        'subsets'     => array( 'latin-ext' ),
        'text-transform'     => 'capitalize',
    ),
    'choices'         => potter_default_font_choices(),
    'priority'        => 9,
    'active_callback' => array(
        array(
            'setting'  => 'menu_logo_description_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));
// Separator.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-1023456',
    'section'  => 'typo_panel',
    'default'  => '<h3 class="setting-header">' . esc_html__('Menu Font setting', 'potter') .  '</h3>',
    'priority' => 11,
));

// Menu font toggle.
Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'menu_font_family_toggle',
    'label'    => __('Menu Font Settings', 'potter'),
    'section'  => 'typo_panel',
    'default'  => 0,
    'priority' => 11,
));

// Font family.
Kirki::add_field('potter', array(
    'type'            => 'typography',
    'settings'        => 'menu_font_family',
    'label'           => __('Font', 'potter'),
    'section'         => 'typo_panel',
    'default'         => array(
        'font-family' => 'Helvetica, Arial, sans-serif',
        'variant'     => 'regular',
        'text-transform'     => 'capitalize',
    ),
    'choices'         => potter_default_font_choices(),
    'active_callback' => array(
        array(
            'setting'  => 'menu_font_family_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'priority'        => 12,
));
// Separator.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-10234568',
    'section'  => 'typo_panel',
    'default'  => '<h3 class="setting-header">' . esc_html__('Heading Font setting', 'potter') .  '</h3>',
    'priority' => 13,
));

// Separator.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-6025655',
    'section'  => 'typo_panel',
    'default'  => '<p>The settings below will apply to all headlines if not configured separately.</p>',
    'priority' => 13,
));
// H1 font toggle.
Kirki::add_field('potter', array(
    'type'        => 'toggle',
    'settings'    => 'page_h1_toggle',
    'label'       => __('H1 Settings', 'potter'),
    'section'     => 'typo_panel',
    'default'     => 0,
    'priority'    => 14,
));

// Font family.
Kirki::add_field('potter', array(
    'type'            => 'typography',
    'settings'        => 'page_h1_font_family',
    'label'           => __('Font', 'potter'),
    'section'         => 'typo_panel',
    'default'         => array(
        'font-family' => 'Helvetica, Arial, sans-serif',
        'variant'     => '700',
        'text-transform'     => 'capitalize',
    ),
    'choices'         => potter_default_font_choices(),
    'active_callback' => array(
        array(
            'setting'  => 'page_h1_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'priority'        => 15,
));


// H2 font toggle.
Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'page_h2_toggle',
    'label'    => __('H2 Settings', 'potter'),
    'section'  => 'typo_panel',
    'default'  => 0,
    'priority' => 16,
));

// Font family.
Kirki::add_field('potter', array(
    'type'            => 'typography',
    'settings'        => 'page_h2_font_family',
    'label'           => __('Font', 'potter'),
    'section'         => 'typo_panel',
    'default'         => array(
        'font-family' => 'Helvetica, Arial, sans-serif',
        'variant'     => '700',
        'text-transform'     => 'capitalize',
    ),
    'choices'         => potter_default_font_choices(),
    'active_callback' => array(
        array(
            'setting'  => 'page_h2_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'priority'        => 17,
));

// H3 font toggle.
Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'page_h3_toggle',
    'label'    => __('H3 Settings', 'potter'),
    'section'  => 'typo_panel',
    'default'  => 0,
    'priority' => 18,
));

// Font family.
Kirki::add_field('potter', array(
    'type'            => 'typography',
    'settings'        => 'page_h3_font_family',
    'label'           => __('Font', 'potter'),
    'section'         => 'typo_panel',
    'default'         => array(
        'font-family' => 'Helvetica, Arial, sans-serif',
        'variant'     => '700',
        'text-transform'     => 'capitalize',
    ),
    'choices'         => potter_default_font_choices(),
    'active_callback' => array(
        array(
            'setting'  => 'page_h3_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'priority'        => 19,
));

// H4 font toggle.
Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'page_h4_toggle',
    'label'    => __('H4 Settings', 'potter'),
    'section'  => 'typo_panel',
    'default'  => 0,
    'priority' => 20,
));

// Font family.
Kirki::add_field('potter', array(
    'type'            => 'typography',
    'settings'        => 'page_h4_font_family',
    'label'           => __('Font', 'potter'),
    'section'         => 'typo_panel',
    'default'         => array(
        'font-family' => 'Helvetica, Arial, sans-serif',
        'variant'     => '700',
        'text-transform'     => 'capitalize',
    ),
    'choices'         => potter_default_font_choices(),
    'active_callback' => array(
        array(
            'setting'  => 'page_h4_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'priority'        => 21,
));

// H5 font toggle.
Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'page_h5_toggle',
    'label'    => __('H5 Settings', 'potter'),
    'section'  => 'typo_panel',
    'default'  => 0,
    'priority' => 22,
));

// Font family.
Kirki::add_field('potter', array(
    'type'            => 'typography',
    'settings'        => 'page_h5_font_family',
    'label'           => __('Font', 'potter'),
    'section'         => 'typo_panel',
    'default'         => array(
        'font-family' => 'Helvetica, Arial, sans-serif',
        'variant'     => '700',
        'text-transform'     => 'capitalize',
    ),
    'choices'         => potter_default_font_choices(),
    'active_callback' => array(
        array(
            'setting'  => 'page_h5_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'priority'        => 23,
));


// H6 font toggle.
Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'page_h6_toggle',
    'label'    => __('H6 Settings', 'potter'),
    'section'  => 'typo_panel',
    'default'  => 0,
    'priority' => 24,
));

// Font family.
Kirki::add_field('potter', array(
    'type'            => 'typography',
    'settings'        => 'page_h6_font_family',
    'label'           => __('Font', 'potter'),
    'section'         => 'typo_panel',
    'default'         => array(
        'font-family' => 'Helvetica, Arial, sans-serif',
        'variant'     => '700',
        'text-transform'     => 'capitalize',
    ),
    'choices'         => potter_default_font_choices(),
    'active_callback' => array(
        array(
            'setting'  => 'page_h6_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'priority'        => 25,
));


// Separator.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-1023456878',
    'section'  => 'color_panel',
    'default'  => '<h3 class="setting-header">' . esc_html__('Heading Font Color Settings', 'potter') .  '</h3>',
    'priority' => 26,
));

Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'heading_font_color',
    'label'    => __('Color', 'potter'),
    'section'  => 'color_panel',
    'priority' => 27,
    'choices'  => array(
        'alpha' => true,
    ),
));

Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'heading_font_accent_color',
    'label'    => __('Accent Color', 'potter'),
    'section'  => 'color_panel',
    'priority' => 28,
    'choices'  => array(
        'alpha' => true,
    ),
));

Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'heading_font_accent_hover_color',
    'label'    => __('Accent Hover Color', 'potter'),
    'section'  => 'color_panel',
    'priority' => 29,
    'choices'  => array(
        'alpha' => true,
    ),
));

/* Fields – Pre Header */

// Pre header layout.
Kirki::add_field('potter', array(
    'type'     => 'radio-image',
    'settings' => 'pre_header_layout',
    'label'    => __('Layout', 'potter'),
    'section'  => 'potter_pre_header_options',
    'default'  => 'none',
    'priority' => 1,
    'choices'  => array(
      'none'  => POTTER_THEME_URI . '/inc/customizer/img/top-header-no-column.png',
      'one'  => POTTER_THEME_URI . '/inc/customizer/img/top-header-one-column.png',
      'two'  => POTTER_THEME_URI . '/inc/customizer/img/top-header-two-column.png',
    ),
));

// Column one layout.
Kirki::add_field('potter', array(
    'type'            => 'radio',
    'settings'        => 'pre_header_column_one_layout',
    'label'           => __('Column 1 Content', 'potter'),
    'section'         => 'potter_pre_header_options',
    'default'         => 'text',
    'priority'        => 2,
    'choices'         => array(
        'none' => __('None', 'potter'),
        'text' => __('Text', 'potter'),
        'menu' => __('Menu', 'potter'),
        'iconlink' => __('Icon Link', 'potter'),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'pre_header_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
));

// Column one.
Kirki::add_field('potter', array(
    'type'            => 'textarea',
    'settings'        => 'pre_header_column_one',
    'label'           => __('Text', 'potter'),
    'section'         => 'potter_pre_header_options',
    'default'         => __('Text For Column 1', 'potter'),
    'priority'        => 2,
    'active_callback' => array(
        array(
            'setting'  => 'pre_header_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
        array(
            'setting'  => 'pre_header_column_one_layout',
            'operator' => '==',
            'value'    => 'text',
        ),
    ),
));

Kirki::add_field('potter', array(
  'type'        => 'repeater',
    'label'       => esc_html__('Repeater Control', 'potter'),
    'section'     => 'potter_pre_header_options',
    'priority'    => 2,
    'row_label' => [
        'type'  => 'text',
        'value' => esc_html__('Custom Icon', 'potter'),
    ],
    'button_label' => esc_html__('+ New Icon', 'potter'),
    'settings'     => 'potter_icon_repeater_topbar',
    'default'      => [
        [
            'link_text' => esc_html__('pottericon-twitter', 'potter'),
            'link_url'  => '#',
      'link_color'  => '#333333',
        ],
    ],
    'fields' => [
        'link_text' => [
            'type'        => 'text',
            'label'       => esc_html__('Icon Class', 'potter'),
            'description' => __('<a href="https://pottertheme.com/blog/docs/page-posts-settings/custom-icons/" target="_blank">Icon Class Refernce</a>', 'potter'),
            'default'     => '',
        ],
        'link_url'  => [
            'type'        => 'text',
            'label'       => esc_html__('Link URL', 'potter'),
            'description' => esc_html__('This will be the link URL', 'potter'),
            'default'     => '',
        ],
    'link_color'  => [
            'type'        => 'color',
            'label'       => esc_html__('Icon Color', 'potter'),
            'default'     => '#333333',
      'choices'         => array(
          'alpha' => true,
      ),
        ],
    ],
  'active_callback' => array(
      array(
          'setting'  => 'pre_header_layout',
          'operator' => '!=',
          'value'    => 'none',
      ),
      array(
          'setting'  => 'pre_header_column_one_layout',
          'operator' => '==',
          'value'    => 'iconlink',
      ),
  ),
));

// Width.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'label'           => __('Icon Size', 'potter'),
    'settings'        => 'col_one_icon_link_size',
    'section'         => 'potter_pre_header_options',
    'priority'        => 2,
    'transport'       => 'postMessage',
    'default'			=> 16,
    'choices'         => array(
        'min'  => '10',
        'max'  => '50',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'pre_header_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
        array(
            'setting'  => 'pre_header_column_one_layout',
            'operator' => '==',
            'value'    => 'iconlink',
        ),
    ),
));

// Column two layout.
Kirki::add_field('potter', array(
    'type'            => 'radio',
    'settings'        => 'pre_header_column_two_layout',
    'label'           => __('Column 2 Content', 'potter'),
    'section'         => 'potter_pre_header_options',
    'default'         => 'text',
    'priority'        => 2,
    'choices'         => array(
        'none' => __('None', 'potter'),
        'text' => __('Text', 'potter'),
        'menu' => __('Menu', 'potter'),
        'iconlink' => __('Icon Link', 'potter'),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'pre_header_layout',
            'operator' => '==',
            'value'    => 'two',
        ),
    ),
));

Kirki::add_field('potter', array(
  'type'        => 'repeater',
    'label'       => esc_html__('Repeater Control', 'potter'),
    'section'     => 'potter_pre_header_options',
    'priority'    => 2,
    'row_label' => [
        'type'  => 'text',
        'value' => esc_html__('Custom Icon', 'potter'),
    ],
    'button_label' => esc_html__('+ New Icon', 'potter'),
    'settings'     => 'potter_icon_repeater_topbar_col2',
    'default'      => [
        [
            'link_text' => esc_html__('pottericon-twitter', 'potter'),
            'link_url'  => '#',
      'link_color'  => '#333333',
        ],
    ],
    'fields' => [
        'link_text' => [
            'type'        => 'text',
            'label'       => esc_html__('Icon Class', 'potter'),
            'description' => __('<a href="https://pottertheme.com/blog/docs/page-posts-settings/custom-icons/" target="_blank">Icon Class Refernce</a>', 'potter'),
            'default'     => '',
        ],
        'link_url'  => [
            'type'        => 'text',
            'label'       => esc_html__('Link URL', 'potter'),
            'description' => esc_html__('This will be the link URL', 'potter'),
            'default'     => '',
        ],
    'link_color'  => [
            'type'        => 'color',
            'label'       => esc_html__('Icon Color', 'potter'),
            'default'     => '#333333',
      'choices'         => array(
          'alpha' => true,
      ),
        ],
    ],
  'active_callback' => array(
      array(
          'setting'  => 'pre_header_layout',
          'operator' => '!=',
          'value'    => 'none',
      ),
      array(
          'setting'  => 'pre_header_column_two_layout',
          'operator' => '==',
          'value'    => 'iconlink',
      ),
  ),
));

// Width.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'label'           => __('Icon Size', 'potter'),
    'settings'        => 'col_one_icon_link_size_col2',
    'section'         => 'potter_pre_header_options',
    'priority'        => 2,
    'transport'       => 'postMessage',
    'default'			=> 16,
    'choices'         => array(
        'min'  => '10',
        'max'  => '50',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'pre_header_layout',
            'operator' => '==',
            'value'    => 'two',
        ),
        array(
            'setting'  => 'pre_header_column_two_layout',
            'operator' => '==',
            'value'    => 'iconlink',
        ),
    ),
));

// Column two.
Kirki::add_field('potter', array(
    'type'            => 'textarea',
    'settings'        => 'pre_header_column_two',
    'label'           => __('Text', 'potter'),
    'section'         => 'potter_pre_header_options',
    'default'         => __('Coloum 2 content', 'potter'),
    'priority'        => 2,
    'active_callback' => array(
        array(
            'setting'  => 'pre_header_layout',
            'operator' => '==',
            'value'    => 'two',
        ),
        array(
            'setting'  => 'pre_header_column_two_layout',
            'operator' => '==',
            'value'    => 'text',
        ),
    ),
));



// Separator.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-264356125',
    'section'  => 'potter_pre_header_options',
    'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
    'priority' => 3,
    'active_callback' => array(
        array(
            'setting'  => 'pre_header_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
));




// Width.
Kirki::add_field('potter', array(
    'type'            => 'dimension',
    'label'           => __('Pre Header Width', 'potter'),
    'description'     => __('Default: 1200px', 'potter'),
    'settings'        => 'pre_header_width',
    'section'         => 'potter_pre_header_options',
    'priority'        => 3,
    'transport'       => 'postMessage',
    'default'			=> '1200px',
    'choices'         => array(
        'min'  => '500',
        'max'  => '2000',
        'step' => '10',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'pre_header_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
));

// Height.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'pre_header_height',
    'label'           => __('Height', 'potter'),
    'section'         => 'potter_pre_header_options',
    'priority'        => 3,
    'default'         => '10',
    'transport'       => 'postMessage',
    'choices'         => array(
        'min'  => '1',
        'max'  => '25',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'pre_header_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
));

// Background color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'pre_header_bg_color',
    'label'           => __('Background Color', 'potter'),
    'section'         => 'potter_pre_header_options',
    'default'         => '#ffffff',
    'priority'        => 4,
    'transport'       => 'postMessage',
    'active_callback' => array(
        array(
            'setting'  => 'pre_header_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
    'choices'         => array(
        'alpha' => true,
    ),
));

// Font color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'pre_header_font_color',
    'label'           => __('Font Color', 'potter'),
    'section'         => 'potter_pre_header_options',
    'default'         => '#6d7680',
    'priority'        => 4,
    'transport'       => 'postMessage',
    'active_callback' => array(
        array(
            'setting'  => 'pre_header_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
    'choices'         => array(
        'alpha' => true,
    ),
));

// Accent color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'pre_header_accent_color',
    'label'           => __('Accent Color', 'potter'),
    'section'         => 'potter_pre_header_options',
    'priority'        => 4,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'pre_header_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
));

// Accent color alt.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'pre_header_accent_color_alt',
    'label'           => __('Hover', 'potter'),
    'section'         => 'potter_pre_header_options',
    'priority'        => 4,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'pre_header_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
));

// Font size.
Kirki::add_field('potter', array(
    'type'            => 'input_slider',
    'label'           => __('Font Size', 'potter'),
    'settings'        => 'pre_header_font_size',
    'section'         => 'potter_pre_header_options',
    'priority'        => 4,
    'default'         => '14px',
    'transport'       => 'postMessage',
    'active_callback' => array(
        array(
            'setting'  => 'pre_header_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
    'choices'         => array(
        'min'  => '10',
        'max'  => '30',
        'step' => '1',
    ),
));


// Separator.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-2643561256',
    'section'  => 'potter_pre_header_options',
    'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
    'priority' => 6,
    'active_callback' => array(
        array(
            'setting'  => 'pre_header_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
));


// Pre header border.
Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'top_header_border_top',
    'label'    => __('Border Top', 'potter'),
    'section'  => 'potter_pre_header_options',
    'priority' => 7,
    'active_callback' => array(
        array(
            'setting'  => 'pre_header_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
));

// Height.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'pre_header_border_top_width',
    'label'           => __('Border Width', 'potter'),
    'section'         => 'potter_pre_header_options',
    'priority'        => 8,
    'default'         => '5',
    'transport'       => 'postMessage',
    'choices'         => array(
        'min'  => '0',
        'max'  => '25',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'top_header_border_top',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));

// border color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'pre_header_top_border_color',
    'label'           => __('Border Color', 'potter'),
    'section'         => 'potter_pre_header_options',
    'priority'        => 9,
    'active_callback' => array(
        array(
            'setting'  => 'top_header_border_top',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'choices'         => array(
        'alpha' => true,
    ),
));

Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'top_header_border_bottom',
    'label'    => __('Border Bottom', 'potter'),
    'section'  => 'potter_pre_header_options',
    'priority' => 10,
    'active_callback' => array(
        array(
            'setting'  => 'pre_header_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
));

// Height.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'pre_header_border_bottom_width',
    'label'           => __('Border Width', 'potter'),
    'section'         => 'potter_pre_header_options',
    'priority'        => 11,
    'default'         => '1',
    'choices'         => array(
        'min'  => '0',
        'max'  => '25',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'top_header_border_bottom',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));

// border color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'pre_header_bottom_border_color',
    'label'           => __('Border Color', 'potter'),
    'section'         => 'potter_pre_header_options',
    'priority'        => 12,
    'active_callback' => array(
        array(
            'setting'  => 'top_header_border_bottom',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'choices'         => array(
        'alpha' => true,
    ),
));


/* Fields – Logo */

// Mobile logo.
Kirki::add_field('potter', array(
    'type'            => 'image',
    'settings'        => 'menu_mobile_logo',
    'label'           => __('Mobile Logo', 'potter'),
    'section'         => 'title_tagline',
    'priority'        => 1,
    'partial_refresh' => array(
        'mobile_logo' => array(
            'selector'        => '.potter-mobile-logo',
            'render_callback' => function () {
                get_template_part('inc/template-parts/logo/logo-mobile');
            }
        ),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'custom_logo',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));



// Separator.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-05198',
    'section'  => 'title_tagline',
    'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
    'priority' => 4,
));

// Color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'menu_logo_color',
    'label'           => __('Color', 'potter'),
    'section'         => 'title_tagline',
    'priority'        => 11,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'custom_logo',
            'operator' => '==',
            'value'    => '',
        ),
    ),
));

// Hover color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'menu_logo_color_alt',
    'label'           => __('Hover', 'potter'),
    'section'         => 'title_tagline',
    'priority'        => 12,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'custom_logo',
            'operator' => '==',
            'value'    => '',
        ),
    ),
));

// Separator.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-898067',
    'section'  => 'title_tagline',
    'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
    'priority' => 14,
));

/* Fields – Tagline */

// Toggle.
Kirki::add_field('potter', array(
    'type'            => 'checkbox',
    'settings'        => 'menu_logo_description',
    'label'           => __('Display Tagline', 'potter'),
    'section'         => 'title_tagline',
    'default'         => '0',
    'priority'        => 20,
    'active_callback' => array(
        array(
            'setting'  => 'custom_logo',
            'operator' => '==',
            'value'    => '',
        ),
    ),
));

// Mobile toggle.
Kirki::add_field('potter', array(
    'type'            => 'checkbox',
    'settings'        => 'menu_logo_description_mobile',
    'label'           => __('Display Tagline on Mobile', 'potter'),
    'section'         => 'title_tagline',
    'default'         => '0',
    'priority'        => 20,
    'active_callback' => array(
        array(
            'setting'  => 'custom_logo',
            'operator' => '==',
            'value'    => '',
        ),
        array(
            'setting'  => 'menu_logo_description',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));

// Color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'menu_logo_description_color',
    'label'           => __('Color', 'potter'),
    'section'         => 'title_tagline',
    'priority'        => 22,
    'transport'       => 'postMessage',
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'custom_logo',
            'operator' => '==',
            'value'    => '',
        ),
        array(
            'setting'  => 'menu_logo_description',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));

// Separator.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-212074',
    'section'  => 'title_tagline',
    'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
    'priority' => 24,
));

/* Fields – Logo Settings */

// Logo URL.
Kirki::add_field('potter', array(
    'type'      => 'link',
    'settings'  => 'menu_logo_url',
    'label'     => __('Custom Logo URL', 'potter'),
    'section'   => 'title_tagline',
    'transport' => 'postMessage',
    'priority'  => 30,
));

// Alt tag.
Kirki::add_field('potter', array(
    'type'            => 'text',
    'settings'        => 'menu_logo_alt',
    'label'           => __('Custom "alt" Tag', 'potter'),
    'section'         => 'title_tagline',
    'priority'        => 31,
    'transport'       => 'postMessage',
    'active_callback' => array(
        array(
            'setting'  => 'custom_logo',
            'operator' => '!==',
            'value'    => '',
        ),
    ),
));

// Title tag.
Kirki::add_field('potter', array(
    'type'            => 'text',
    'settings'        => 'menu_logo_title',
    'label'           => __('Custom "title" Tag', 'potter'),
    'section'         => 'title_tagline',
    'priority'        => 32,
    'transport'       => 'postMessage',
    'active_callback' => array(
        array(
            'setting'  => 'custom_logo',
            'operator' => '!==',
            'value'    => '',
        ),
    ),
));

// Separator.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-791190',
    'section'  => 'title_tagline',
    'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
    'priority' => 33,
));

/* Fields – Logo Container Width */

// Container width.
Kirki::add_field('potter', array(
    'type'        => 'slider',
    'settings'    => 'menu_logo_container_width',
    'label'       => __('Logo Container Width', 'potter'),
    'description' => __('Defines the space in % the logo area takes in the navigation', 'potter'),
    'section'     => 'title_tagline',
    'priority'    => 40,
    'default'     => '25',
    'transport'   => 'postMessage',
    'choices'     => array(
        'min'  => '10',
        'max'  => '40',
        'step' => '1',
    ),
));

// Mobile container width.
Kirki::add_field('potter', array(
    'type'        => 'slider',
    'settings'    => 'mobile_menu_logo_container_width',
    'label'       => __('Logo Container Width (Mobile)', 'potter'),
    'description' => __('Defines the space in % the logo area takes in the navigation', 'potter'),
    'section'     => 'title_tagline',
    'priority'    => 41,
    'default'     => '66',
    'transport'   => 'postMessage',
    'choices'     => array(
        'min'  => '10',
        'max'  => '80',
        'step' => '1',
    ),
));

// Separator.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-44545',
    'section'  => 'title_tagline',
    'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
    'priority' => 42,
));

/* Fields – Navigation */

// Variations.

Kirki::add_field('potter', array(
    'type'     => 'radio-image',
    'settings' => 'menu_position',
    'label'    => __('Menu Bar', 'potter'),
    'section'  => 'potter_menu_options',
    'default'  => 'menu-right',
    'priority' => 0,
    'multiple' => 1,
    'choices'  => array(
        'menu-right'   => POTTER_THEME_URI . '/inc/customizer/img/nav-right.png',
        'menu-left'  => POTTER_THEME_URI . '/inc/customizer/img/nav-left.png',
        'menu-centered'  => POTTER_THEME_URI . '/inc/customizer/img/nav-center.png',
        'menu-stacked'  => POTTER_THEME_URI . '/inc/customizer/img/nav-stacked.png',
        'menu-off-canvas'  => POTTER_THEME_URI . '/inc/customizer/img/nav-off-canvas.png',
    ),
));
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-445498923',
    'section'  => 'potter_menu_options',
    'default'  => __('<p style="Background: #FFD186; padding: 10px;">Please setup the menu at <strong>Customizer-> Header -> Off Canvas Menu.</strong></p>', 'potter'),
    'priority' => 1,
    'active_callback' => array(
        array(
            'setting'  => 'menu_position',
            'operator' => '==',
            'value'    => 'menu-off-canvas',
        ),
    ),
));
// Width.
Kirki::add_field('potter', array(
    'type'        => 'dimension',
    'label'       => __('Navigation Width', 'potter'),
    'description' => __('Default: 1200px', 'potter'),
    'settings'    => 'menu_width',
    'section'     => 'potter_menu_options',
    'transport' => 'postMessage',
    'priority'    => 1,
));
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-4454989',
    'section'  => 'potter_menu_options',
    'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
    'priority' => 2,
));
// Search icon.
Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'menu_search_icon',
    'label'    => __('Search Icon', 'potter'),
    'section'  => 'potter_menu_options',
    'priority' => 2,
));
Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'menu_html_button',
    'label'    => __('HTML Button', 'potter'),
    'section'  => 'potter_menu_options',
    'priority' => 3,
));
Kirki::add_field('potter', array(
    'type'     => 'textarea',
    'settings' => 'menu_html_button_content',
    'label'    => __('Content', 'potter'),
    'section'  => 'potter_menu_options',
    'default'  => '<a href="#">Contact Us</a>',
    'priority' => 4,
    'active_callback' => array(
        array(
            'setting'  => 'menu_html_button',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));



// Background color.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'nav_button_bg_color',
    'label'    => __('Background Color', 'potter'),
    'section'  => 'potter_menu_options',
    'default'  => '#0056FF',
    'priority' => 4,
    'choices'  => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'menu_html_button',
            'operator' => '==',
            'value'    => true,
        ),

    ),
));

// Background color.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'nav_button_bg_hover_color',
    'label'    => __('Background Hover Color', 'potter'),
    'section'  => 'potter_menu_options',
    'default'  => '#6592E9',
    'priority' => 4,
    'choices'  => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'menu_html_button',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));

// Font color.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'nav_button_font_color',
    'label'    => __('Font Color', 'potter'),
    'section'  => 'potter_menu_options',
    'default'  => '#fff',
    'priority' => 4,
    'choices'  => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'menu_html_button',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));

// Font color alt.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'nav_button_font_color_alt',
    'label'    => __('Hover', 'potter'),
    'section'  => 'potter_menu_options',
    'default'  => '#fff',
    'priority' => 4,
    'choices'  => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'menu_html_button',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));


Kirki::add_field('potter', array(
    'type'     => 'slider',
    'label'    => __('Border Width', 'potter'),
    'settings' => 'nav_button_border_width',
    'section'  => 'potter_menu_options',
    'priority' => 4,
    'default'  => '0',
    'choices'  => array(
        'min'  => '0',
        'max'  => '100',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'menu_html_button',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));


Kirki::add_field('potter', array(
    'type'     => 'slider',
    'label'    => __('Border Radius', 'potter'),
    'settings' => 'nav_button_border_radius',
    'section'  => 'potter_menu_options',
    'priority' => 4,
    'default'  => '0',
    'choices'  => array(
        'min'  => '0',
        'max'  => '100',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'menu_html_button',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));


// Border color alt.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'nav_button_border_color',
    'label'    => __('Button Border Color', 'potter'),
    'section'  => 'potter_menu_options',
    'priority' => 4,
    'choices'  => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'menu_html_button',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));

Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'nav_button_border_color_alt',
    'label'    => __('Button Border Hover Color', 'potter'),
    'section'  => 'potter_menu_options',
    'default'  => '#6592E9',
    'priority' => 4,
    'choices'  => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'menu_html_button',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));

Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'menu_icon_link',
    'label'    => __('Icon Link', 'potter'),
    'section'  => 'potter_menu_options',
    'priority' => 4,
));


Kirki::add_field('potter', array(
  'type'        => 'repeater',
    'label'       => esc_html__('Menu Icon', 'potter'),
    'section'     => 'potter_menu_options',
    'priority'    => 4,
    'row_label' => [
        'type'  => 'text',
        'value' => esc_html__('Custom Icon', 'potter'),
    ],
    'button_label' => esc_html__('+ New Icon', 'potter'),
    'settings'     => 'potter_icon_nav_bar',
    'default'      => [
        [
            'link_text' => esc_html__('pottericon-twitter', 'potter'),
            'link_url'  => '#',
      'link_color'  => '#333333',
        ],
    ],
    'fields' => [
        'link_text' => [
            'type'        => 'text',
            'label'       => esc_html__('Icon Class', 'potter'),
            'description' => __('<a href="https://pottertheme.com/blog/docs/page-posts-settings/custom-icons/" target="_blank">Icon Class Refernce</a>', 'potter'),
            'default'     => '',
        ],
        'link_url'  => [
            'type'        => 'text',
            'label'       => esc_html__('Link URL', 'potter'),
            'description' => esc_html__('This will be the link URL', 'potter'),
            'default'     => '',
        ],
    'link_color'  => [
            'type'        => 'color',
            'label'       => esc_html__('Icon Color', 'potter'),
            'default'     => '#333333',
      'choices'         => array(
          'alpha' => true,
      ),
        ],
    ],
  'active_callback' => array(
      array(
          'setting'  => 'menu_icon_link',
          'operator' => '!=',
          'value'    => '',
      ),
  ),
));

// Separator.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-4454590',
    'section'  => 'potter_menu_options',
    'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
    'priority' => 4,
));

// Height.
Kirki::add_field('potter', array(
    'type'     => 'input_slider',
    'label'    => __('Menu Height', 'potter'),
    'settings' => 'menu_height',
    'section'  => 'potter_menu_options',
    'priority' => 4,
    'default'  => '20px',
    'choices'  => array(
        'min'  => '0',
        'max'  => '80',
        'step' => '1',
    ),
));

// Padding.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'label'           => __('Menu Item Spacing', 'potter'),
    'settings'        => 'menu_padding',
    'section'         => 'potter_menu_options',
    'priority'        => 5,
    'default'         => '10',
    'choices'         => array(
        'min'  => '5',
        'max'  => '40',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'menu_position',
            'operator' => '!=',
            'value'    => 'menu-off-canvas',
        ),
        array(
            'setting'  => 'menu_position',
            'operator' => '!=',
            'value'    => 'menu-full-screen',
        ),
    ),
));

// Background color.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'menu_bg_color',
    'label'    => __('Background Color', 'potter'),
    'section'  => 'potter_menu_options',
    'default'  => '#fff',
    'priority' => 6,
    'choices'  => array(
        'alpha' => true,
    ),
));

// Font color.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'menu_font_color',
    'label'    => __('Font Color', 'potter'),
    'section'  => 'potter_menu_options',
    'priority' => 7,
    'choices'  => array(
        'alpha' => true,
    ),
));

// Font color alt.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'menu_font_color_alt',
    'label'    => __('Hover', 'potter'),
    'section'  => 'potter_menu_options',
    'priority' => 8,
    'choices'  => array(
        'alpha' => true,
    ),
));

// Font size.
Kirki::add_field('potter', array(
    'type'      => 'input_slider',
    'label'     => __('Font Size', 'potter'),
    'settings'  => 'menu_font_size',
    'section'   => 'potter_menu_options',
    'priority'  => 9,
    'default'   => '16px',
    'transport' => 'postMessage',
    'choices'   => array(
        'min'  => '0',
        'max'  => '100',
        'step' => '1',
    ),
));

Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-44549',
    'section'  => 'potter_menu_options',
    'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
    'priority' => 10,
));

// Sticky Navbar.
Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'sticky_navbar',
    'label'    => __('Sticky Navbar', 'potter'),
    'section'  => 'potter_sticky_header_options',
    'priority' => 11,
));


// Background color.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'sticky_menu_bg_color',
    'label'    => __('Background Color', 'potter'),
    'section'  => 'potter_sticky_header_options',
    'priority' => 12,
    'choices'  => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'sticky_navbar',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));

// Font color.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'sticky_menu_font_color',
    'label'    => __('Font Color', 'potter'),
    'section'  => 'potter_sticky_header_options',
    'priority' => 13,
    'choices'  => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'sticky_navbar',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));

// Font color alt.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'sticky_menu_font_color_alt',
    'label'    => __('Hover', 'potter'),
    'section'  => 'potter_sticky_header_options',
    'priority' => 14,
    'choices'  => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'sticky_navbar',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));

// Sticky logo.
Kirki::add_field('potter', array(
    'type'            => 'image',
    'settings'        => 'menu_sticky_logo',
    'label'           => __('Separate Logo for Sticky Nav', 'potter'),
    'section'         => 'potter_sticky_header_options',
    'priority'        => 15,
    'partial_refresh' => array(
        'sticky_logo' => array(
            'selector'        => '.potter-sticky-logo',
            'render_callback' => function () {
                get_template_part('inc/template-parts/logo/transparent-header-mobile');
            }
        ),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'sticky_navbar',
            'operator' => '!=',
            'value'    => '',
        ),
        array(
            'setting'  => 'custom_logo',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));



// Height.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'sticky_nav_height',
    'label'           => __('Menu Bar Height', 'potter'),
    'section'         => 'potter_sticky_header_options',
    'priority'        => 25,
    'default'         => '20',
    'choices'         => array(
        'min'  => '0',
        'max'  => '100',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'sticky_navbar',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));

// width.
Kirki::add_field('potter', array(
    'type'            => 'dimension',
    'settings'        => 'sticky_nav_width',
    'label'           => __('Menu Bar Width', 'potter'),
    'description'           => __('Default 1200px', 'potter'),
    'section'         => 'potter_sticky_header_options',
    'priority'        => 26,
    'default'         => '1200px',
    'active_callback' => array(
        array(
            'setting'  => 'sticky_navbar',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));

Kirki::add_field('potter', array(
    'type'     => 'checkbox',
    'settings' => 'sickynav_bar_box_shadow',
    'label'    => __('Box Shadow', 'potter'),
    'section'  => 'potter_sticky_header_options',
    'priority' => 27,
    'active_callback' => array(
        array(
            'setting'  => 'sticky_navbar',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));


Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-445486',
    'section'  => 'potter_menu_options',
    'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
    'priority' => 16,
));



// Pre header border.
Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'nav_bar_border_top',
    'label'    => __('Border Top', 'potter'),
    'section'  => 'potter_menu_options',
    'priority' => 19,
));

// Height.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'nav_bar_border_top_width',
    'label'           => __('Border Width', 'potter'),
    'section'         => 'potter_menu_options',
    'priority'        => 20,
    'default'         => '5',
    'transport'       => 'postMessage',
    'choices'         => array(
        'min'  => '0',
        'max'  => '25',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'nav_bar_border_top',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));

// border color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'nav_bar_top_border_color',
    'label'           => __('Border Color', 'potter'),
    'section'         => 'potter_menu_options',
    'priority'        => 20,
    'transport'       => 'postMessage',
    'active_callback' => array(
        array(
            'setting'  => 'nav_bar_border_top',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'choices'         => array(
        'alpha' => true,
    ),
));

// Height.
Kirki::add_field('potter', array(
    'type'            => 'input_slider',
    'settings'        => 'nav_bar_border_bottom_width',
    'label'           => __('Border Bottom Width', 'potter'),
    'section'         => 'potter_menu_options',
    'priority'        => 22,
    'default'         => '1px',
    'transport'       => 'postMessage',
    'choices'         => array(
        'min'  => '0',
        'max'  => '25',
        'step' => '1',
    ),
));

// border color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'nav_bar_bottom_border_color',
    'label'           => __('Border Color', 'potter'),
    'section'         => 'potter_menu_options',
    'priority'        => 23,
    'default'         => '#ececec',
    'transport'       => 'postMessage',
    'active_callback' => array(
        array(
            'setting'  => 'nav_bar_border_bottom',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'choices'         => array(
        'alpha' => true,
    ),
));


Kirki::add_field('potter', array(
    'type'     => 'checkbox',
    'settings' => 'nav_bar_box_shadow_none',
    'label'    => __('Box Shadow', 'potter'),
    'section'  => 'potter_menu_options',
    'priority' => 24,
));



// Transparent Header.
Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'transparent_header',
    'label'    => __('Header Transparent', 'potter'),
    'section'  => 'potter_transparent_header_options',
    'priority' => 1,
));

Kirki::add_field('potter', array(
    'type'            => 'checkbox',
    'settings'        => 'dtheader_archive',
    'label'           => __('Disable on Archive Page?', 'potter'),
    'section'         => 'potter_transparent_header_options',
    'default'         => false,
    'priority'        => 3,
    'active_callback' => array(
        array(
            'setting'  => 'transparent_header',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));
Kirki::add_field('potter', array(
    'type'            => 'checkbox',
    'settings'        => 'dtheader_blog',
    'label'           => __('Disable on Blog Page?', 'potter'),
    'section'         => 'potter_transparent_header_options',
    'default'         => false,
    'priority'        => 3,
    'active_callback' => array(
        array(
            'setting'  => 'transparent_header',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));

Kirki::add_field('potter', array(
    'type'            => 'checkbox',
    'settings'        => 'dtheader_search_404',
    'label'           => __('Disable on 404 and Search Pages?', 'potter'),
    'section'         => 'potter_transparent_header_options',
    'default'         => false,
    'priority'        => 3,
    'active_callback' => array(
        array(
            'setting'  => 'transparent_header',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));

Kirki::add_field('potter', array(
    'type'            => 'checkbox',
    'settings'        => 'dtheader_single_post',
    'label'           => __('Disable Single Post?', 'potter'),
    'section'         => 'potter_transparent_header_options',
    'default'         => false,
    'priority'        => 4,
    'active_callback' => array(
        array(
            'setting'  => 'transparent_header',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));


// Font  color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'transparent_header_color',
    'label'           => __('Font Color', 'potter'),
    'section'         => 'potter_transparent_header_options',
    'default'         => '#666',
    'priority'        => 13,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'transparent_header',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));
// Font  color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'transparent_header_hover_color',
    'label'           => __('Hover Color', 'potter'),
    'section'         => 'potter_transparent_header_options',
    'default'         => '#cccccc',
    'priority'        => 14,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'transparent_header',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));

// Tranparent logo.
Kirki::add_field('potter', array(
    'type'            => 'image',
    'settings'        => 'transparent_header_logo',
    'label'           => __('Separate Logo For Tranparent Header', 'potter'),
    'section'         => 'potter_transparent_header_options',
    'priority'        => 8,
    'partial_refresh' => array(
        'mobile_logo' => array(
            'selector'        => '.transparent-header-logo',
            'render_callback' => function () {
                get_template_part('inc/template-parts/logo/transparent-header-mobile');
            }
        ),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'transparent_header',
            'operator' => '!=',
            'value'    => '',
        ),
        array(
            'setting'  => 'custom_logo',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));
// Separator.

Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-1023',
    'section'  => 'potter_transparent_header_options',
    'default'  => '<h3 class="setting-header">' . esc_html__('Setting for nav HTML Button', 'potter') .  '</h3>',
    'priority' => 18,
    'active_callback' => array(
        array(
            'setting'  => 'menu_html_button',
            'operator' => '==',
            'value'    => true,
        ),
        array(
            'setting'  => 'transparent_header',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));

// Background color.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'nav_button_trans_bg_color',
    'label'    => __('Background Color', 'potter'),
    'section'  => 'potter_transparent_header_options',
    'default'  => '#0056FF',
    'priority' => 20,
    'choices'  => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'menu_html_button',
            'operator' => '==',
            'value'    => true,
        ),
        array(
            'setting'  => 'transparent_header',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));

// Background color.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'nav_button_trans_bg_hover_color',
    'label'    => __('Background Hover Color', 'potter'),
    'section'  => 'potter_transparent_header_options',
    'default'  => '#6592E9',
    'priority' => 20,
    'choices'  => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'menu_html_button',
            'operator' => '==',
            'value'    => true,
        ),
        array(
            'setting'  => 'transparent_header',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));

// Font color.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'nav_button_trans_font_color',
    'label'    => __('Font Color', 'potter'),
    'section'  => 'potter_transparent_header_options',
    'default'  => '#fff',
    'priority' => 20,
    'choices'  => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'menu_html_button',
            'operator' => '==',
            'value'    => true,
        ),
        array(
            'setting'  => 'transparent_header',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));

// Font color alt.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'nav_button_trans_font_color_alt',
    'label'    => __('Hover', 'potter'),
    'section'  => 'potter_transparent_header_options',
    'default'  => '#fff',
    'priority' => 20,
    'choices'  => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'menu_html_button',
            'operator' => '==',
            'value'    => true,
        ),
        array(
            'setting'  => 'transparent_header',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));


Kirki::add_field('potter', array(
    'type'     => 'slider',
    'label'    => __('Border Width', 'potter'),
    'settings' => 'nav_button_trans_border_width',
    'section'  => 'potter_transparent_header_options',
    'priority' => 20,
    'default'  => '0',
    'choices'  => array(
        'min'  => '0',
        'max'  => '100',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'menu_html_button',
            'operator' => '==',
            'value'    => true,
        ),
        array(
            'setting'  => 'transparent_header',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));


Kirki::add_field('potter', array(
    'type'     => 'slider',
    'label'    => __('Border Radius', 'potter'),
    'settings' => 'nav_button_trans_border_radius',
    'section'  => 'potter_transparent_header_options',
    'priority' => 20,
    'default'  => '0',
    'choices'  => array(
        'min'  => '0',
        'max'  => '100',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'menu_html_button',
            'operator' => '==',
            'value'    => true,
        ),
        array(
            'setting'  => 'transparent_header',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));


// Border color alt.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'nav_button_trans_border_color',
    'label'    => __('Button Border Color', 'potter'),
    'section'  => 'potter_transparent_header_options',
    'priority' => 20,
    'choices'  => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'menu_html_button',
            'operator' => '==',
            'value'    => true,
        ),
        array(
            'setting'  => 'transparent_header',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));

Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'nav_button_trans_border_color_alt',
    'label'    => __('Button Border Hover Color', 'potter'),
    'section'  => 'potter_transparent_header_options',
    'default'  => '#6592E9',
    'priority' => 20,
    'choices'  => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'menu_html_button',
            'operator' => '==',
            'value'    => true,
        ),
        array(
            'setting'  => 'transparent_header',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));


/* Fields – Sub Menu */

// Alignment.
Kirki::add_field('potter', array(
    'type'     => 'radio-image',
    'settings' => 'sub_menu_alignment',
    'label'    => __('Sub Menu Alignment', 'potter'),
    'section'  => 'potter_sub_menu_options',
    'default'  => 'left',
    'priority' => 1,
    'multiple' => 1,
    'choices'  => array(
        'left'   => POTTER_THEME_URI . '/inc/customizer/img/align-left.png',
        'center' => POTTER_THEME_URI . '/inc/customizer/img/align-center.png',
        'right'  => POTTER_THEME_URI . '/inc/customizer/img/align-right.png',
    ),
));

// Width.
Kirki::add_field('potter', array(
    'type'     => 'slider',
    'settings' => 'sub_menu_width',
    'label'    => __('Width', 'potter'),
    'section'  => 'potter_sub_menu_options',
    'priority' => 1,
    'default'  => '220',
    'choices'  => array(
        'min'  => '100',
        'max'  => '400',
        'step' => '1',
    ),
));

// Background color.
Kirki::add_field('potter', array(
    'type'      => 'color',
    'settings'  => 'sub_menu_bg_color',
    'label'     => __('Background Color', 'potter'),
    'section'   => 'potter_sub_menu_options',
    'default'   => '#ffffff',
    'transport' => 'postMessage',
    'priority'  => 2,
    'choices'   => array(
        'alpha' => true,
    ),
));

// Background color alt.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'sub_menu_bg_color_alt',
    'label'    => __('Hover', 'potter'),
    'section'  => 'potter_sub_menu_options',
    'default'  => '#ffffff',
    'priority' => 3,
    'choices'  => array(
        'alpha' => true,
    ),
));

// Accent color.
Kirki::add_field('potter', array(
    'type'      => 'color',
    'settings'  => 'sub_menu_accent_color',
    'label'     => __('Font Color', 'potter'),
    'section'   => 'potter_sub_menu_options',
    'transport' => 'postMessage',
    'priority'  => 4,
));

// Accent color alt.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'sub_menu_accent_color_alt',
    'label'    => __('Hover', 'potter'),
    'section'  => 'potter_sub_menu_options',
    'priority' => 5,
    'choices'  => array(
        'alpha' => true,
    ),
));

// Font size.
Kirki::add_field('potter', array(
    'type'      => 'input_slider',
    'label'     => __('Font Size', 'potter'),
    'settings'  => 'sub_menu_font_size',
    'section'   => 'potter_sub_menu_options',
    'priority'  => 6,
    'transport' => 'postMessage',
    'choices'   => array(
        'min'  => '0',
        'max'  => '100',
        'step' => '1',
    ),
));

// Separator toggle.
Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'sub_menu_separator',
    'label'    => __('Sub Menu Separator', 'potter'),
    'section'  => 'potter_sub_menu_options',
    'default'  => 0,
    'priority' => 6,
));

// Separator color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'sub_menu_separator_color',
    'label'           => __('Color', 'potter'),
    'section'         => 'potter_sub_menu_options',
    'default'         => '#f5f5f7',
    'priority'        => 6,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'sub_menu_separator',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));


/* Fields – Mobile Navigation */

// Variations.
Kirki::add_field('potter', array(
    'type'     => 'radio',
    'settings' => 'mobile_menu_options',
    'label'    => __('Menu', 'potter'),
    'section'  => 'potter_mobile_menu_options',
    'default'  => 'menu-mobile-hamburger',
    'priority' => 1,
    'multiple' => 1,
    'choices'  => apply_filters('potter_mobile_menu_options', array(
        'menu-mobile-default'   => __('Default', 'potter'),
        'menu-mobile-hamburger' => __('Hamburger', 'potter'),
    )),
));

// Icon style.
Kirki::add_field('potter', array(
    'type'            => 'radio',
    'settings'        => 'mobile_menu_hamburger_style',
    'label'           => __('Hamburger Icon Style', 'potter'),
    'section'         => 'potter_mobile_menu_options',
    'default'         => 'default',
    'priority'        => 1,
    'multiple'        => 1,
    'choices'         => array(
        'default' => __('Default', 'potter'),
        'filled'  => __('Filled', 'potter'),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'mobile_menu_options',
            'operator' => 'in',
            'value'    => array( 'menu-mobile-hamburger', 'menu-mobile-off-canvas' ),
        ),
    ),
));

// Border radius.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'mobile_menu_hamburger_border_radius',
    'label'           => __('Border Radius', 'potter'),
    'section'         => 'potter_mobile_menu_options',
    'priority'        => 1,
    'default'         => '0',
    'transport'       => 'postMessage',
    'choices'         => array(
        'min'  => '0',
        'max'  => '50',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'mobile_menu_options',
            'operator' => 'in',
            'value'    => array( 'menu-mobile-hamburger', 'menu-mobile-off-canvas' ),
        ),
        array(
            'setting'  => 'mobile_menu_hamburger_style',
            'operator' => '==',
            'value'    => 'filled',
        ),
    ),
));

// Hamburger background color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'mobile_menu_hamburger_bg_color',
    'label'           => __('Hamburger Icon Color', 'potter'),
    'section'         => 'potter_mobile_menu_options',
    'priority'        => 1,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'mobile_menu_options',
            'operator' => 'in',
            'value'    => array( 'menu-mobile-hamburger', 'menu-mobile-off-canvas' ),
        ),
        array(
            'setting'  => 'mobile_menu_hamburger_style',
            'operator' => '==',
            'value'    => 'filled',
        ),
    ),
));

// Separator.
Kirki::add_field('potter', array(
    'type'            => 'custom',
    'settings'        => 'separator-680902',
    'section'         => 'potter_mobile_menu_options',
    'default'         => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
    'priority'        => 1,
    'active_callback' => array(
        array(
            'setting'  => 'mobile_menu_options',
            'operator' => 'in',
            'value'    => array( 'menu-mobile-hamburger', 'menu-mobile-off-canvas' ),
        ),
    ),
));

// Mobile search icon.
Kirki::add_field('potter', array(
    'type'            => 'toggle',
    'settings'        => 'mobile_menu_search_icon',
    'label'           => __('Search Icon', 'potter'),
    'section'         => 'potter_mobile_menu_options',
    'priority'        => 1,
    'active_callback' => array(
        array(
            'setting'  => 'mobile_menu_options',
            'operator' => '!==',
            'value'    => 'menu-mobile-default',
        ),
    ),
));

// Height.
Kirki::add_field('potter', array(
    'type'      => 'slider',
    'settings'  => 'mobile_menu_height',
    'label'     => __('Height', 'potter'),
    'section'   => 'potter_mobile_menu_options',
    'priority'  => 2,
    'default'   => '20',
    'transport' => 'postMessage',
    'choices'   => array(
        'min'  => '5',
        'max'  => '80',
        'step' => '1',
    ),
));

// Background color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'mobile_menu_background_color',
    'label'           => __('Background Color', 'potter'),
    'section'         => 'potter_mobile_menu_options',
    'priority'        => 3,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'mobile_menu_options',
            'operator' => '!=',
            'value'    => 'menu-mobile-elementor',
        ),
    ),
));

// Hamburger size.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'mobile_menu_hamburger_size',
    'label'           => __('Icon Size', 'potter'),
    'section'         => 'potter_mobile_menu_options',
    'default'         => '16',
    'priority'        => 4,
    'transport'       => 'postMessage',
    'choices'         => array(
        'min'  => '12',
        'max'  => '24',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'mobile_menu_options',
            'operator' => 'in',
            'value'    => array( 'menu-mobile-hamburger', 'menu-mobile-off-canvas' ),
        ),
    ),
));

// Hamburger color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'mobile_menu_hamburger_color',
    'label'           => __('Icon Color', 'potter'),
    'section'         => 'potter_mobile_menu_options',
    'default'         => '#6d7680',
    'priority'        => 5,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'mobile_menu_options',
            'operator' => 'in',
            'value'    => array( 'menu-mobile-hamburger', 'menu-mobile-off-canvas' ),
        ),
    ),
));

// Separator.
Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-71744',
    'section'  => 'potter_mobile_menu_options',
    'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
    'priority' => 6,
));

// Menu item background color.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'mobile_menu_bg_color',
    'label'    => __('Menu Item Background Color', 'potter'),
    'section'  => 'potter_mobile_menu_options',
    'default'  => '#ffffff',
    'priority' => 9,
    'choices'  => array(
        'alpha' => true,
    ),
));

// Menu item background color alt.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'mobile_menu_bg_color_alt',
    'label'    => __('Hover', 'potter'),
    'section'  => 'potter_mobile_menu_options',
    'default'  => '#ffffff',
    'priority' => 10,
    'choices'  => array(
        'alpha' => true,
    ),
));

// Font color.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'mobile_menu_font_color',
    'label'    => __('Font Color', 'potter'),
    'section'  => 'potter_mobile_menu_options',
    'priority' => 11,
));

// Font color hover.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'mobile_menu_font_color_alt',
    'label'    => __('Hover', 'potter'),
    'section'  => 'potter_mobile_menu_options',
    'priority' => 12,
    'choices'  => array(
        'alpha' => true,
    ),
));

// Divider color.
Kirki::add_field('potter', array(
    'type'     => 'color',
    'settings' => 'mobile_menu_border_color',
    'label'    => __('Divider Color', 'potter'),
    'section'  => 'potter_mobile_menu_options',
    'default'  => '#d9d9e0',
    'priority' => 13,
    'choices'  => array(
        'alpha' => true,
    ),
));

// Sub menu arrow color.
Kirki::add_field('potter', array(
    'type'      => 'color',
    'settings'  => 'mobile_menu_submenu_arrow_color',
    'label'     => __('Sub Menu Arrow Color', 'potter'),
    'section'   => 'potter_mobile_menu_options',
    'priority'  => 14,
    'transport' => 'postMessage',
    'choices'   => array(
        'alpha' => true,
    ),
));

// Font size.
Kirki::add_field('potter', array(
    'type'     => 'input_slider',
    'label'    => __('Font Size', 'potter'),
    'settings' => 'mobile_menu_font_size',
    'section'  => 'potter_mobile_menu_options',
    'priority' => 15,
    'default'  => '16px',
    'choices'  => array(
        'min'  => '0',
        'max'  => '50',
        'step' => '1',
    ),
));


/* Fields – Footer */

// widget footer
// footer widget tooggle.
Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'active_footer_widget',
    'label'    => __('Active Footer Widget Area', 'potter'),
    'section'  => 'potter_footer_widgets',
    'default'  => 0,
    'priority' => 0,
));

// Alignment.
Kirki::add_field('potter', array(
    'type'     => 'radio-image',
    'settings' => 'top_footer_widget_layout',
    'label'    => __('Widget Layout', 'potter'),
    'section'  => 'potter_footer_widgets',
    'default'  => 'four-column',
    'priority' => 1,
    'multiple' => 1,
    'choices'  => array(
      'four-column'  => POTTER_THEME_URI . '/inc/customizer/img/widget-four-column.png',
      'three-column'  => POTTER_THEME_URI . '/inc/customizer/img/widget-three-column.png',
      'two-column'  => POTTER_THEME_URI . '/inc/customizer/img/widget-two-column.png',
      'one-column'  => POTTER_THEME_URI . '/inc/customizer/img/widget-one-column.png',
      'three-column-right'  => POTTER_THEME_URI . '/inc/customizer/img/widget-three-column-right-big.png',
      'three-column-left'  => POTTER_THEME_URI . '/inc/customizer/img/widget-three-column-left-big.png',
      'three-column-middle'  => POTTER_THEME_URI . '/inc/customizer/img/widget-three-column-middle-big.png',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'active_footer_widget',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));
// Width.
Kirki::add_field('potter', array(
    'type'            => 'dimension',
    'settings'        => 'top_footer_width',
    'label'           => __('Footer Width', 'potter'),
    'description'     => __('Default: 1200px', 'potter'),
    'section'         => 'potter_footer_widgets',
    'default'         => '1200px',
    'transport'       => 'postMessage',
    'priority'        => 2,
    'active_callback' => array(
        array(
            'setting'  => 'active_footer_widget',
            'operator' => '!=',
            'value'    => '',
        ),
    ),

));

// Alignment.
Kirki::add_field('potter', array(
    'type'     => 'radio-image',
    'settings' => 'footer_widget_content_alignment',
    'label'    => __('Widget Content Alignment', 'potter'),
    'section'  => 'potter_footer_widgets',
    'default'  => 'left',
    'priority' => 3,
    'multiple' => 1,
    'choices'  => array(
        'left'   => POTTER_THEME_URI . '/inc/customizer/img/align-left.png',
        'center' => POTTER_THEME_URI . '/inc/customizer/img/align-center.png',
        'right'  => POTTER_THEME_URI . '/inc/customizer/img/align-right.png',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'active_footer_widget',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));


// Footer height.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'top_footer_height',
    'label'           => __('Height', 'potter'),
    'section'         => 'potter_footer_widgets',
    'priority'        => 4,
    'default'         => 20,
    'transport'       => 'postMessage',
    'choices'         => array(
        'min'  => '1',
        'max'  => '100',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'active_footer_widget',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));

// Background color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'top_footer_bg_color',
    'label'           => __('Background Color', 'potter'),
    'section'         => 'potter_footer_widgets',
    'default'         => '#f5f5f7',
    'transport'       => 'postMessage',
    'priority'        => 5,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'active_footer_widget',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));

// Font color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'top_footer_font_color',
    'label'           => __('Font Color', 'potter'),
    'section'         => 'potter_footer_widgets',
    'default'         => '#999999',
    'transport'       => 'postMessage',
    'priority'        => 6,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'active_footer_widget',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));

// Accent color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'top_footer_accent_color',
    'label'           => __('Accent Color', 'potter'),
    'section'         => 'potter_footer_widgets',
    'default'         => '#666666',
    'priority'        => 7,
    'transport'       => 'postMessage',
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'active_footer_widget',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));

// Accent color alt.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'top_footer_accent_color_alt',
    'label'           => __('Hover', 'potter'),
    'section'         => 'potter_footer_widgets',
    'priority'        => 8,
    'default'         => '#333333',
    'transport'       => 'postMessage',
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'active_footer_widget',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));

// Font size.
Kirki::add_field('potter', array(
    'type'            => 'input_slider',
    'label'           => __('Title Font Size', 'potter'),
    'settings'        => 'top_footer_title_font_size',
    'section'         => 'potter_footer_widgets',
    'priority'        => 9,
    'default'         => '20px',
    'transport'       => 'postMessage',
    'choices'         => array(
        'min'  => '0',
        'max'  => '50',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'active_footer_widget',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));

// Font size.
Kirki::add_field('potter', array(
    'type'            => 'input_slider',
    'label'           => __('Font Size', 'potter'),
    'settings'        => 'top_footer_font_size',
    'section'         => 'potter_footer_widgets',
    'priority'        => 10,
    'default'         => '14px',
    'transport'       => 'postMessage',
    'choices'         => array(
        'min'  => '0',
        'max'  => '50',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'active_footer_widget',
            'operator' => '!=',
            'value'    => '',
        ),
    ),

));


/*bottom footer */
// Layout.
Kirki::add_field('potter', array(
    'type'     => 'radio-image',
    'settings' => 'footer_layout',
    'label'    => __('Footer', 'potter'),
    'section'  => 'potter_bottom_footer',
    'default'  => 'two',
    'priority' => 16,
    'choices'  => array(
      'none'  => POTTER_THEME_URI . '/inc/customizer/img/footer-no-column.png',
      'one'  => POTTER_THEME_URI . '/inc/customizer/img/footer-one-column.png',
      'two'  => POTTER_THEME_URI . '/inc/customizer/img/footer-two-column.png',
    ),
));

// Column one layout.
Kirki::add_field('potter', array(
    'type'            => 'radio',
    'settings'        => 'footer_column_one_layout',
    'label'           => __('Column 1 Content', 'potter'),
    'section'         => 'potter_bottom_footer',
    'default'         => 'text',
    'priority'        => 17,
    'choices'         => array(
        'none' => __('None', 'potter'),
        'text' => __('Text', 'potter'),
        'menu' => __('Menu', 'potter'),
        'iconlink' => __('Icon Link', 'potter'),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'footer_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
));

// Column one.
Kirki::add_field('potter', array(
    'type'            => 'textarea',
    'settings'        => 'footer_column_one',
    'label'           => __('Text', 'potter'),
    'section'         => 'potter_bottom_footer',
    'default'         => __('&copy; [year] - [blogname] | All rights reserved', 'potter'),
    'priority'        => 18,
    'active_callback' => array(
        array(
            'setting'  => 'footer_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
        array(
            'setting'  => 'footer_column_one_layout',
            'operator' => '==',
            'value'    => 'text',
        ),
    ),
));


Kirki::add_field('potter', array(
  'type'        => 'repeater',
    'label'       => esc_html__('Custom Icon Links', 'potter'),
    'section'     => 'potter_bottom_footer',
    'priority'    => 18,
    'row_label' => [
        'type'  => 'text',
        'value' => esc_html__('Custom Icon', 'potter'),
    ],
    'button_label' => esc_html__('+ New Icon', 'potter'),
    'settings'     => 'potter_icon_bottom_footer_col1',
    'default'      => [
        [
            'link_text' => esc_html__('pottericon-twitter', 'potter'),
            'link_url'  => '#',
      'link_color'  => '#333333',
        ],
    ],
    'fields' => [
        'link_text' => [
            'type'        => 'text',
            'label'       => esc_html__('Icon Class', 'potter'),
            'description' => __('<a href="https://pottertheme.com/blog/docs/page-posts-settings/custom-icons/" target="_blank">Icon Class Refernce</a>', 'potter'),
            'default'     => '',
        ],
        'link_url'  => [
            'type'        => 'text',
            'label'       => esc_html__('Link URL', 'potter'),
            'description' => esc_html__('This will be the link URL', 'potter'),
            'default'     => '',
        ],
    'link_color'  => [
            'type'        => 'color',
            'label'       => esc_html__('Icon Color', 'potter'),
            'default'     => '#333333',
      'choices'         => array(
          'alpha' => true,
      ),
        ],
    ],
  'active_callback' => array(
      array(
          'setting'  => 'footer_layout',
          'operator' => '!=',
          'value'    => 'none',
      ),
      array(
          'setting'  => 'footer_column_one_layout',
          'operator' => '==',
          'value'    => 'iconlink',
      ),
  ),
));

// Width.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'label'           => __('Icon Size', 'potter'),
    'settings'        => 'icon_link_size_footer_col1',
    'section'         => 'potter_bottom_footer',
    'priority'        => 18,
    'transport'       => 'postMessage',
    'default'			=> 16,
    'choices'         => array(
        'min'  => '10',
        'max'  => '50',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'footer_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
        array(
            'setting'  => 'footer_column_one_layout',
            'operator' => '==',
            'value'    => 'iconlink',
        ),
    ),
));





// Column two layout.
Kirki::add_field('potter', array(
    'type'            => 'radio',
    'settings'        => 'footer_column_two_layout',
    'label'           => __('Column 2 Content', 'potter'),
    'section'         => 'potter_bottom_footer',
    'default'         => 'text',
    'priority'        => 19,
    'choices'         => array(
        'none' => __('None', 'potter'),
        'text' => __('Text', 'potter'),
        'menu' => __('Menu', 'potter'),
        'iconlink' => __('Icon Link', 'potter'),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'footer_layout',
            'operator' => '==',
            'value'    => 'two',
        ),
    ),
));





// Column two.
Kirki::add_field('potter', array(
    'type'            => 'textarea',
    'settings'        => 'footer_column_two',
    'label'           => __('Text', 'potter'),
    'section'         => 'potter_bottom_footer',
    'default'         => __('Powered by [theme_author]', 'potter'),
    'priority'        => 20,
    'active_callback' => array(
        array(
            'setting'  => 'footer_layout',
            'operator' => '==',
            'value'    => 'two',
        ),
        array(
            'setting'  => 'footer_column_two_layout',
            'operator' => '==',
            'value'    => 'text',
        ),
    ),
));

Kirki::add_field('potter', array(
  'type'        => 'repeater',
    'label'       => esc_html__('Custom Icon Links', 'potter'),
    'section'     => 'potter_bottom_footer',
    'priority'    => 20,
    'row_label' => [
        'type'  => 'text',
        'value' => esc_html__('Custom Icon', 'potter'),
    ],
    'button_label' => esc_html__('+ New Icon', 'potter'),
    'settings'     => 'potter_icon_bottom_footer_col2',
    'default'      => [
        [
            'link_text' => esc_html__('pottericon-twitter', 'potter'),
            'link_url'  => '#',
      'link_color'  => '#333333',
        ],
    ],
    'fields' => [
        'link_text' => [
            'type'        => 'text',
            'label'       => esc_html__('Icon Class', 'potter'),
            'description' => __('<a href="https://pottertheme.com/blog/docs/page-posts-settings/custom-icons/" target="_blank">Icon Class Refernce</a>', 'potter'),
            'default'     => '',
        ],
        'link_url'  => [
            'type'        => 'text',
            'label'       => esc_html__('Link URL', 'potter'),
            'description' => esc_html__('This will be the link URL', 'potter'),
            'default'     => '',
        ],
    'link_color'  => [
            'type'        => 'color',
            'label'       => esc_html__('Icon Color', 'potter'),
            'default'     => '#333333',
      'choices'         => array(
          'alpha' => true,
      ),
        ],
    ],
  'active_callback' => array(
      array(
          'setting'  => 'footer_layout',
          'operator' => '!=',
          'value'    => 'none',
      ),
      array(
          'setting'  => 'footer_column_two_layout',
          'operator' => '==',
          'value'    => 'iconlink',
      ),
  ),
));

// Width.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'label'           => __('Icon Size', 'potter'),
    'settings'        => 'icon_link_size_footer_col2',
    'section'         => 'potter_bottom_footer',
    'priority'        => 20,
    'transport'       => 'postMessage',
    'default'			=> 16,
    'choices'         => array(
        'min'  => '10',
        'max'  => '50',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'footer_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
        array(
            'setting'  => 'footer_column_two_layout',
            'operator' => '==',
            'value'    => 'iconlink',
        ),
    ),
));



Kirki::add_field('potter', array(
    'type'            => 'dimension',
    'settings'        => 'footer_width',
    'label'           => __('Footer Width', 'potter'),
    'description'     => __('Default: 1200px', 'potter'),
    'section'         => 'potter_bottom_footer',
    'default'         => '1200px',
    'transport'       => 'postMessage',
    'priority'        => 21,
    'active_callback' => array(
        array(
            'setting'  => 'footer_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),

));

// Footer height.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'footer_height',
    'label'           => __('Height', 'potter'),
    'section'         => 'potter_bottom_footer',
    'priority'        => 22,
    'default'         => 20,
    'transport'       => 'postMessage',
    'choices'         => array(
        'min'  => '1',
        'max'  => '100',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'footer_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
));

// Background color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'footer_bg_color',
    'label'           => __('Background Color', 'potter'),
    'section'         => 'potter_bottom_footer',
    'default'         => '#f5f5f7',
    'transport'       => 'postMessage',
    'priority'        => 23,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'footer_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
));

// Font color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'footer_font_color',
    'label'           => __('Font Color', 'potter'),
    'section'         => 'potter_bottom_footer',
    'transport'       => 'postMessage',
    'priority'        => 24,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'footer_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
));

// Accent color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'footer_accent_color',
    'label'           => __('Accent Color', 'potter'),
    'section'         => 'potter_bottom_footer',
    'priority'        => 25,
    'transport'       => 'postMessage',
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'footer_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
));

// Accent color alt.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'footer_accent_color_alt',
    'label'           => __('Hover', 'potter'),
    'section'         => 'potter_bottom_footer',
    'priority'        => 24,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'footer_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
));

// Font size.
Kirki::add_field('potter', array(
    'type'            => 'input_slider',
    'label'           => __('Font Size', 'potter'),
    'settings'        => 'footer_font_size',
    'section'         => 'potter_bottom_footer',
    'priority'        => 27,
    'default'         => '14px',
    'transport'       => 'postMessage',
    'active_callback' => array(
        array(
            'setting'  => 'footer_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
    'choices'         => array(
        'min'  => '0',
        'max'  => '50',
        'step' => '1',
    ),
));

Kirki::add_field('potter', array(
    'type'     => 'toggle',
    'settings' => 'bottom_footer_border',
    'label'    => __('Enable Bottom Footer Top Border', 'potter'),
    'section'  => 'potter_bottom_footer',
    'default'  => 0,
    'priority' => 28,
    'active_callback' => array(
        array(
            'setting'  => 'footer_layout',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
));

// Height.
Kirki::add_field('potter', array(
    'type'            => 'slider',
    'settings'        => 'bottom_footer_border_top_width',
    'label'           => __('Border Width', 'potter'),
    'section'         => 'potter_bottom_footer',
    'priority'        => 29,
    'default'         => '1',
    'choices'         => array(
        'min'  => '0',
        'max'  => '25',
        'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'bottom_footer_border',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));
// border-color.
Kirki::add_field('potter', array(
    'type'            => 'color',
    'settings'        => 'bottom_footer_border_color',
    'label'           => __('Border Color', 'potter'),
    'section'         => 'potter_bottom_footer',
    'priority'        => 30,
    'choices'         => array(
        'alpha' => true,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'bottom_footer_border',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));
/**
 * Custom controls.
 *
 * @param object $wp_customize The wp_customize object.
 */
function potter_custom_controls_default($wp_customize)
{

    // Logo size.
    $wp_customize->add_setting(
        'menu_logo_size_desktop',
        array(
            'sanitize_callback' => 'esc_textarea',
        )
    );

    $wp_customize->add_setting(
        'menu_logo_size_tablet',
        array(
            'sanitize_callback' => 'esc_textarea',
        )
    );

    $wp_customize->add_setting(
        'menu_logo_size_mobile',
        array(
            'sanitize_callback' => 'esc_textarea',
        )
    );

    $wp_customize->add_control(new POTTER_Customize_Responsive_Input_Slider(
        $wp_customize,
        'menu_logo_size',
        array(
            'label'           => __('Logo Width', 'potter'),
            'section'         => 'title_tagline',
            'settings'        => 'menu_logo_size_desktop',
            'priority'        => 2,
            'choices'         => array(
                'min'  => '0',
                'max'  => '500',
                'step' => '1',
            ),
            'active_callback' => function () {
                return get_theme_mod('custom_logo') ? true : false;
            },
        )
    ));

    $wp_customize->add_control(new POTTER_Customize_Responsive_Input_Slider(
        $wp_customize,
        'menu_logo_size',
        array(
            'label'           => __('Logo Width', 'potter'),
            'section'         => 'title_tagline',
            'settings'        => 'menu_logo_size_tablet',
            'priority'        => 2,
            'choices'         => array(
                'min'  => '0',
                'max'  => '500',
                'step' => '1',
            ),
            'active_callback' => function () {
                return get_theme_mod('custom_logo') ? true : false;
            },
        )
    ));

    $wp_customize->add_control(new POTTER_Customize_Responsive_Input_Slider(
        $wp_customize,
        'menu_logo_size',
        array(
            'label'           => __('Logo Width', 'potter'),
            'section'         => 'title_tagline',
            'settings'        => 'menu_logo_size_mobile',
            'priority'        => 2,
            'choices'         => array(
                'min'  => '0',
                'max'  => '500',
                'step' => '1',
            ),
            'active_callback' => function () {
                return get_theme_mod('custom_logo') ? true : false;
            },
        )
    ));

    // Site title font size.
    $wp_customize->add_setting(
        'menu_logo_font_size_desktop',
        array(
            'default'           => '22px',
            'sanitize_callback' => 'esc_textarea',
        )
    );

    $wp_customize->add_setting(
        'menu_logo_font_size_tablet',
        array(
            'sanitize_callback' => 'esc_textarea',
        )
    );

    $wp_customize->add_setting(
        'menu_logo_font_size_mobile',
        array(
            'sanitize_callback' => 'esc_textarea',
        )
    );

    $wp_customize->add_control(new POTTER_Customize_Font_Size_Control(
        $wp_customize,
        'menu_logo_font_size',
        array(
            'label'           => __('Font Size', 'potter'),
            'section'         => 'title_tagline',
            'settings'        => 'menu_logo_font_size_desktop',
            'priority'        => 13,
            'active_callback' => function () {
                return get_theme_mod('custom_logo') ? false : true;
            },
        )
    ));

    $wp_customize->add_control(new POTTER_Customize_Font_Size_Control(
        $wp_customize,
        'menu_logo_font_size',
        array(
            'label'           => __('Font Size', 'potter'),
            'section'         => 'title_tagline',
            'settings'        => 'menu_logo_font_size_tablet',
            'priority'        => 13,
            'active_callback' => function () {
                return get_theme_mod('custom_logo') ? false : true;
            },
        )
    ));

    $wp_customize->add_control(new POTTER_Customize_Font_Size_Control(
        $wp_customize,
        'menu_logo_font_size',
        array(
            'label'           => __('Font Size', 'potter'),
            'section'         => 'title_tagline',
            'settings'        => 'menu_logo_font_size_mobile',
            'priority'        => 13,
            'active_callback' => function () {
                return get_theme_mod('custom_logo') ? false : true;
            },
        )
    ));

    // Tagline font size.
    $wp_customize->add_setting(
        'menu_logo_description_font_size_desktop',
        array(
            'sanitize_callback' => 'esc_textarea',
        )
    );

    $wp_customize->add_setting(
        'menu_logo_description_font_size_tablet',
        array(
            'sanitize_callback' => 'esc_textarea',
        )
    );

    $wp_customize->add_setting(
        'menu_logo_description_font_size_mobile',
        array(
            'sanitize_callback' => 'esc_textarea',
        )
    );

    $wp_customize->add_control(new POTTER_Customize_Font_Size_Control(
        $wp_customize,
        'menu_logo_description_font_size',
        array(
            'label'           => __('Font Size', 'potter'),
            'section'         => 'title_tagline',
            'settings'        => 'menu_logo_description_font_size_desktop',
            'priority'        => 23,
            'active_callback' => function () {
                return ! get_theme_mod('custom_logo') && get_theme_mod('menu_logo_description') ? true : false;
            },
        )
    ));

    $wp_customize->add_control(new POTTER_Customize_Font_Size_Control(
        $wp_customize,
        'menu_logo_description_font_size',
        array(
            'label'           => __('Font Size', 'potter'),
            'section'         => 'title_tagline',
            'settings'        => 'menu_logo_description_font_size_tablet',
            'priority'        => 23,
            'active_callback' => function () {
                return ! get_theme_mod('custom_logo') && get_theme_mod('menu_logo_description') ? true : false;
            },
        )
    ));

    $wp_customize->add_control(new POTTER_Customize_Font_Size_Control(
        $wp_customize,
        'menu_logo_description_font_size',
        array(
            'label'           => __('Font Size', 'potter'),
            'section'         => 'title_tagline',
            'settings'        => 'menu_logo_description_font_size_mobile',
            'priority'        => 23,
            'active_callback' => function () {
                return ! get_theme_mod('custom_logo') && get_theme_mod('menu_logo_description') ? true : false;
            },
        )
    ));

    // Sub menu padding.
    $wp_customize->add_setting(
        'sub_menu_padding_top',
        array(
            'default'           => '10',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_setting(
        'sub_menu_padding_right',
        array(
            'default'           => '20',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_setting(
        'sub_menu_padding_bottom',
        array(
            'default'           => '10',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_setting(
        'sub_menu_padding_left',
        array(
            'default'           => '20',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(new POTTER_Customize_Padding_Control(
        $wp_customize,
        'sub_menu_padding',
        array(
            'label'    => __('Padding', 'potter'),
            'section'  => 'potter_sub_menu_options',
            'settings' => 'sub_menu_padding_top',
            'priority' => 2,
        )
    ));

    $wp_customize->add_control(new POTTER_Customize_Padding_Control(
        $wp_customize,
        'sub_menu_padding',
        array(
            'label'    => __('Padding', 'potter'),
            'section'  => 'potter_sub_menu_options',
            'settings' => 'sub_menu_padding_right',
            'priority' => 2,
        )
    ));

    $wp_customize->add_control(new POTTER_Customize_Padding_Control(
        $wp_customize,
        'sub_menu_padding',
        array(
            'label'    => __('Padding', 'potter'),
            'section'  => 'potter_sub_menu_options',
            'settings' => 'sub_menu_padding_bottom',
            'priority' => 2,
        )
    ));

    $wp_customize->add_control(new POTTER_Customize_Padding_Control(
        $wp_customize,
        'sub_menu_padding',
        array(
            'label'    => __('Padding', 'potter'),
            'section'  => 'potter_sub_menu_options',
            'settings' => 'sub_menu_padding_left',
            'priority' => 2,
        )
    ));

    // Mobile menu padding.
    $wp_customize->add_setting(
        'mobile_menu_padding_top',
        array(
            'default'           => '10',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_setting(
        'mobile_menu_padding_right',
        array(
            'default'           => '20',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_setting(
        'mobile_menu_padding_bottom',
        array(
            'default'           => '10',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_setting(
        'mobile_menu_padding_left',
        array(
            'default'           => '20',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(new POTTER_Customize_Padding_Control(
        $wp_customize,
        'mobile_menu_padding',
        array(
            'label'    => __('Menu Item Padding', 'potter'),
            'section'  => 'potter_mobile_menu_options',
            'settings' => 'mobile_menu_padding_top',
            'priority' => 8,
        )
    ));

    $wp_customize->add_control(new POTTER_Customize_Padding_Control(
        $wp_customize,
        'mobile_menu_padding',
        array(
            'label'    => __('Menu Item Padding', 'potter'),
            'section'  => 'potter_mobile_menu_options',
            'settings' => 'mobile_menu_padding_right',
            'priority' => 8,
        )
    ));

    $wp_customize->add_control(new POTTER_Customize_Padding_Control(
        $wp_customize,
        'mobile_menu_padding',
        array(
            'label'    => __('Menu Item Padding', 'potter'),
            'section'  => 'potter_mobile_menu_options',
            'settings' => 'mobile_menu_padding_bottom',
            'priority' => 8,
        )
    ));

    $wp_customize->add_control(new POTTER_Customize_Padding_Control(
        $wp_customize,
        'mobile_menu_padding',
        array(
            'label'    => __('Menu Item Padding', 'potter'),
            'section'  => 'potter_mobile_menu_options',
            'settings' => 'mobile_menu_padding_left',
            'priority' => 8,
        )
    ));

    // Responsive sidebar widget padding.
    $responsive_sidebar_padding_settings = array(
        'sidebar_widget_padding_top_desktop', 'sidebar_widget_padding_top_tablet', 'sidebar_widget_padding_top_mobile',
        'sidebar_widget_padding_right_desktop', 'sidebar_widget_padding_right_tablet', 'sidebar_widget_padding_right_mobile',
        'sidebar_widget_padding_bottom_desktop', 'sidebar_widget_padding_bottom_tablet', 'sidebar_widget_padding_bottom_mobile',
        'sidebar_widget_padding_left_desktop', 'sidebar_widget_padding_left_tablet', 'sidebar_widget_padding_left_mobile',
    );

    foreach ($responsive_sidebar_padding_settings as $responsive_sidebar_padding_setting) {
        $wp_customize->add_setting(
            $responsive_sidebar_padding_setting,
            array(
                'sanitize_callback' => 'absint',
            )
        );

        $wp_customize->add_control(new POTTER_Customize_Responsive_Padding_Control(
            $wp_customize,
            'sidebar_widget_padding',
            array(
                'label'    => __('Widget Padding', 'potter'),
                'section'  => 'potter_sidebar_options',
                'settings' => $responsive_sidebar_padding_setting,
                'priority' => 3,
            )
        ));
    }

    // Responsive post style settings.
    $archives = apply_filters('potter_archives', array( 'archive' ));

    foreach ($archives as $archive) {
        $responsive_boxed_style_post_settings = array(
            $archive . '_boxed_padding_top_desktop', $archive . '_boxed_padding_top_tablet', $archive . '_boxed_padding_top_mobile',
            $archive . '_boxed_padding_right_desktop', $archive . '_boxed_padding_right_tablet', $archive . '_boxed_padding_right_mobile',
            $archive . '_boxed_padding_bottom_desktop', $archive . '_boxed_padding_bottom_tablet', $archive . '_boxed_padding_bottom_mobile',
            $archive . '_boxed_padding_left_desktop', $archive . '_boxed_padding_left_tablet', $archive . '_boxed_padding_left_mobile',
        );

        foreach ($responsive_boxed_style_post_settings as $responsive_boxed_style_post_setting) {
            $wp_customize->add_setting(
                $responsive_boxed_style_post_setting,
                array(
                    'sanitize_callback' => 'absint',
                )
            );

            $wp_customize->add_control(new POTTER_Customize_Responsive_Padding_Control(
                $wp_customize,
                $archive . '_boxed_padding',
                array(
                    'label'           => __('Padding', 'potter'),
                    'section'         => 'potter_' . $archive . '_options',
                    'settings'        => $responsive_boxed_style_post_setting,
                    'priority'        => 25,
                    'active_callback' => function () use ($archive) {
                        return 'boxed' === get_theme_mod($archive . '_post_style') ? true : false;
                    },
                )
            ));
        }
    }

    // Responsive article style settings.
    $singles = apply_filters('potter_singles', array( 'single' ));

    foreach ($singles as $single) {
        $responsive_article_style_post_settings = array(
            $single . '_boxed_padding_top_desktop', $single . '_boxed_padding_top_tablet', $single . '_boxed_padding_top_mobile',
            $single . '_boxed_padding_right_desktop', $single . '_boxed_padding_right_tablet', $single . '_boxed_padding_right_mobile',
            $single . '_boxed_padding_bottom_desktop', $single . '_boxed_padding_bottom_tablet', $single . '_boxed_padding_bottom_mobile',
            $single . '_boxed_padding_left_desktop', $single . '_boxed_padding_left_tablet', $single . '_boxed_padding_left_mobile',
        );

        foreach ($responsive_article_style_post_settings as $responsive_article_style_post_setting) {
            $wp_customize->add_setting(
                $responsive_article_style_post_setting,
                array(
                    'sanitize_callback' => 'absint',
                )
            );

            $wp_customize->add_control(new POTTER_Customize_Responsive_Padding_Control(
                $wp_customize,
                $single . '_boxed_padding',
                array(
                    'label'           => __('Padding', 'potter'),
                    'section'         => 'potter_' . $single . '_options',
                    'settings'        => $responsive_article_style_post_setting,
                    'priority'        => 10,
                    'active_callback' => function () use ($single) {
                        return 'boxed' === get_theme_mod($single . '_post_style') ? true : false;
                    },
                )
            ));
        }
    }
}
add_action('customize_register', 'potter_custom_controls_default');

// Deprecated hook to load in Premium Add-On customizer settings.
// Will be removed at some point.
do_action('potter_kirki_premium');

/**
 * Custom Kirki default fonts.
 *
 * @param array $standard_fonts The standard fonts.
 *
 * @return array The updated standard fonts.
 */
function potter_custom_default_fonts($standard_fonts)
{
    $standard_fonts['helvetica_neue'] = array(
        'label'    => 'Helvetica Neue',
        'variants' => array( 'regular', 'italic', '700', '700italic' ),
        'stack'    => '"Helvetica Neue", Helvetica, Arial, sans-serif',
    );

    $standard_fonts['helvetica'] = array(
        'label'    => 'Helvetica',
        'variants' => array( 'regular', 'italic', '700', '700italic' ),
        'stack'    => 'Helvetica, Arial, sans-serif',
    );

    $standard_fonts['arial'] = array(
        'label'    => 'Arial',
        'variants' => array( 'regular', 'italic', '700', '700italic' ),
        'stack'    => 'Arial, Helvetica, sans-serif',
    );

    return $standard_fonts;
}
add_filter('kirki/fonts/standard_fonts', 'potter_custom_default_fonts', 0);
