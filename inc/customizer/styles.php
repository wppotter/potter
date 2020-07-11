<?php
/**
 * Dynamic customizer CSS.
 *
 * Holds Customizer CSS styles.
 *
 * @package Potter
 * @subpackage Customizer
 */

defined('ABSPATH') || die("Can't access directly");

do_action('potter_before_customizer_css');
/* background */
$background_color = get_theme_mod('background_color');
if ($background_color) {
    echo 'body {';
    echo sprintf('background-color: %s;', esc_attr($background_color));
    echo '}';
} else {
  echo 'body {';
  echo sprintf('background-color: #eee;');
  echo '}';
}


/* Typography */

// Page font settings.
$page_font_toggle       = get_theme_mod('page_font_toggle');
$page_font_family_value = get_theme_mod('page_font_family');
$page_font_color        = get_theme_mod('page_font_color');
$page_font_line_height        = get_theme_mod('page_font_line_height');
$page_font_letter_spacing        = get_theme_mod('page_font_letter_spacing');
$heading_font_color        = get_theme_mod('heading_font_color');
$heading_font_accent_color        = get_theme_mod('heading_font_accent_hover_color');
$heading_font_accent_hover_color        = get_theme_mod('heading_font_accent_color');

if ($page_font_line_height) {
    echo 'body, optgroup, textarea, h1, h2, h3, h4, h5, h6, ul li, ol {';
    echo sprintf('line-height: %s;', esc_attr($page_font_line_height));
    echo '}';
}
if ($page_font_letter_spacing) {
    echo '.entry-content *, .article-content * {';
    echo sprintf('letter-spacing: %spx;', esc_attr($page_font_letter_spacing));
    echo '}';
}

if ($page_font_toggle && $page_font_family_value) {
    echo 'body, button, input, optgroup, select, textarea, h1, h2, h3, h4, h5, h6 {';

    if (! empty($page_font_family_value['font-family'])) {
        echo sprintf('font-family: %s;', html_entity_decode(esc_attr($page_font_family_value['font-family']), ENT_QUOTES));
    }
    if (! empty($page_font_family_value['variant'])) {
        $page_font_family_font_weight = str_replace('italic', '', $page_font_family_value['variant']);
        $page_font_family_font_weight = (in_array($page_font_family_font_weight, array( '', 'regular' ))) ? '400' : $page_font_family_font_weight;

        $page_font_family_is_italic  = (false !== strpos($page_font_family_value['variant'], 'italic'));
        $page_font_family_font_style = $page_font_family_is_italic ? 'italic' : 'normal';

        echo sprintf('font-weight: %s;', esc_attr($page_font_family_font_weight));
        echo sprintf('font-style: %s;', esc_attr($page_font_family_font_style));
    }
    if (! empty($page_font_family_value['text-transform'])) {
        echo sprintf('text-transform: %s;', html_entity_decode(esc_attr($page_font_family_value['text-transform']), ENT_QUOTES));
    }
    echo '}';
}

if ($page_font_color) {
    echo 'body {';
    echo sprintf('color: %s;', esc_attr($page_font_color));
    echo '}';
}

if ($heading_font_color) {
    echo 'h1, h2, h3, h4, h5, h6  {';
    echo sprintf('color: %s;', esc_attr($heading_font_color));
    echo '}';
}
if ($heading_font_accent_color) {
    echo 'h1 a, h2 a, h3 a, h4 a, h5 a, h6 a  {';
    echo sprintf('color: %s;', esc_attr($heading_font_accent_color));
    echo '}';
}
if ($heading_font_accent_hover_color) {
    echo 'h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover  {';
    echo sprintf('color: %s;', esc_attr($heading_font_accent_hover_color));
    echo '}';
}

// Menu font settings.
$menu_font_family_toggle = get_theme_mod('menu_font_family_toggle');
$menu_font_family_value  = get_theme_mod('menu_font_family');

if ($menu_font_family_toggle && $menu_font_family_value) {
    echo '.potter-menu, .potter-mobile-menu {';

    if (! empty($menu_font_family_value['font-family'])) {
        echo sprintf('font-family: %s;', html_entity_decode(esc_attr($menu_font_family_value['font-family']), ENT_QUOTES));
    }

    if (! empty($menu_font_family_value['variant'])) {
        $menu_font_family_font_weight = str_replace('italic', '', $menu_font_family_value['variant']);
        $menu_font_family_font_weight = (in_array($menu_font_family_font_weight, array( '', 'regular' ))) ? '400' : $menu_font_family_font_weight;

        $menu_font_family_is_italic = (false !== strpos($menu_font_family_value['variant'], 'italic'));
        $menu_font_family_is_style  = $menu_font_family_is_italic ? 'italic' : 'normal';

        echo sprintf('font-weight: %s;', esc_attr($menu_font_family_font_weight));
        echo sprintf('font-style: %s;', esc_attr($menu_font_family_is_style));
    }

    if (! empty($menu_font_family_value['text-transform'])) {
        echo sprintf('text-transform: %s;', html_entity_decode(esc_attr($menu_font_family_value['text-transform']), ENT_QUOTES));
    }

    echo '}';
}

// H1 font settings.
$page_h1_toggle            = get_theme_mod('page_h1_toggle');
$page_h1_font_family_value = get_theme_mod('page_h1_font_family');

if ($page_h1_toggle && $page_h1_font_family_value) {
    echo 'h1, h2, h3, h4, h5, h6 {';

    if (! empty($page_h1_font_family_value['font-family'])) {
        echo sprintf('font-family: %s;', html_entity_decode(esc_attr($page_h1_font_family_value['font-family']), ENT_QUOTES));
    }

    if (! empty($page_h1_font_family_value['variant'])) {
        $page_h1_font_family_font_weight = str_replace('italic', '', $page_h1_font_family_value['variant']);
        $page_h1_font_family_font_weight = (in_array($page_h1_font_family_font_weight, array( '', 'regular' ))) ? '400' : $page_h1_font_family_font_weight;

        $page_h1_font_family_is_italic = (false !== strpos($page_h1_font_family_value['variant'], 'italic'));
        $page_h1_font_family_is_style  = $page_h1_font_family_is_italic ? 'italic' : 'normal';

        echo sprintf('font-weight: %s;', esc_attr($page_h1_font_family_font_weight));
        echo sprintf('font-style: %s;', esc_attr($page_h1_font_family_is_style));
    }
    if (! empty($page_h1_font_family_value['text-transform'])) {
        echo sprintf('text-transform: %s;', html_entity_decode(esc_attr($page_h1_font_family_value['text-transform']), ENT_QUOTES));
    }
    echo '}';
}

// H2 font settings.
$page_h2_font_family_value = get_theme_mod('page_h2_font_family');
$page_h2_toggle            = get_theme_mod('page_h2_toggle');

if ($page_h2_toggle && $page_h2_font_family_value) {
    echo 'h2 {';

    if (! empty($page_h2_font_family_value['font-family'])) {
        echo sprintf('font-family: %s;', html_entity_decode(esc_attr($page_h2_font_family_value['font-family']), ENT_QUOTES));
    }

    if (! empty($page_h2_font_family_value['variant'])) {
        $page_h2_font_family_font_weight = str_replace('italic', '', $page_h2_font_family_value['variant']);
        $page_h2_font_family_font_weight = (in_array($page_h2_font_family_font_weight, array( '', 'regular' ))) ? '400' : $page_h2_font_family_font_weight;

        $page_h2_font_family_is_italic = (false !== strpos($page_h2_font_family_value['variant'], 'italic'));
        $page_h2_font_family_is_style  = $page_h2_font_family_is_italic ? 'italic' : 'normal';

        echo sprintf('font-weight: %s;', esc_attr($page_h2_font_family_font_weight));
        echo sprintf('font-style: %s;', esc_attr($page_h2_font_family_is_style));
    }
    if (! empty($page_h2_font_family_value['text-transform'])) {
        echo sprintf('text-transform: %s;', html_entity_decode(esc_attr($page_h2_font_family_value['text-transform']), ENT_QUOTES));
    }

    echo '}';
}

// H3 font settings.
$page_h3_toggle            = get_theme_mod('page_h3_toggle');
$page_h3_font_family_value = get_theme_mod('page_h3_font_family');

if ($page_h3_toggle && $page_h3_font_family_value) {
    echo 'h3 {';

    if (! empty($page_h3_font_family_value['font-family'])) {
        echo sprintf('font-family: %s;', html_entity_decode(esc_attr($page_h3_font_family_value['font-family']), ENT_QUOTES));
    }

    if (! empty($page_h3_font_family_value['variant'])) {
        $page_h3_font_family_font_weight = str_replace('italic', '', $page_h3_font_family_value['variant']);
        $page_h3_font_family_font_weight = (in_array($page_h3_font_family_font_weight, array( '', 'regular' ))) ? '400' : $page_h3_font_family_font_weight;

        $page_h3_font_family_is_italic = (false !== strpos($page_h3_font_family_value['variant'], 'italic'));
        $page_h3_font_family_is_style  = $page_h3_font_family_is_italic ? 'italic' : 'normal';

        echo sprintf('font-weight: %s;', esc_attr($page_h3_font_family_font_weight));
        echo sprintf('font-style: %s;', esc_attr($page_h3_font_family_is_style));
    }
    if (! empty($page_h3_font_family_value['text-transform'])) {
        echo sprintf('text-transform: %s;', html_entity_decode(esc_attr($page_h3_font_family_value['text-transform']), ENT_QUOTES));
    }
    echo '}';
}

// H4 font settings.
$page_h4_toggle            = get_theme_mod('page_h4_toggle');
$page_h4_font_family_value = get_theme_mod('page_h4_font_family');

if ($page_h4_toggle && $page_h4_font_family_value) {
    echo 'h4 {';

    if (! empty($page_h4_font_family_value['font-family'])) {
        echo sprintf('font-family: %s;', html_entity_decode(esc_attr($page_h4_font_family_value['font-family']), ENT_QUOTES));
    }

    if (! empty($page_h4_font_family_value['variant'])) {
        $page_h4_font_family_font_weight = str_replace('italic', '', $page_h4_font_family_value['variant']);
        $page_h4_font_family_font_weight = (in_array($page_h4_font_family_font_weight, array( '', 'regular' ))) ? '400' : $page_h4_font_family_font_weight;

        $page_h4_font_family_is_italic = (false !== strpos($page_h4_font_family_value['variant'], 'italic'));
        $page_h4_font_family_is_style  = $page_h4_font_family_is_italic ? 'italic' : 'normal';

        echo sprintf('font-weight: %s;', esc_attr($page_h4_font_family_font_weight));
        echo sprintf('font-style: %s;', esc_attr($page_h4_font_family_is_style));
    }
    if (! empty($page_h4_font_family_value['text-transform'])) {
        echo sprintf('text-transform: %s;', html_entity_decode(esc_attr($page_h4_font_family_value['text-transform']), ENT_QUOTES));
    }
    echo '}';
}

// H5 font settings.
$page_h5_toggle            = get_theme_mod('page_h5_toggle');
$page_h5_font_family_value = get_theme_mod('page_h5_font_family');

if ($page_h5_toggle && $page_h5_font_family_value) {
    echo 'h5 {';

    if (! empty($page_h5_font_family_value['font-family'])) {
        echo sprintf('font-family: %s;', html_entity_decode(esc_attr($page_h5_font_family_value['font-family']), ENT_QUOTES));
    }

    if (! empty($page_h5_font_family_value['variant'])) {
        $page_h5_font_family_font_weight = str_replace('italic', '', $page_h5_font_family_value['variant']);
        $page_h5_font_family_font_weight = (in_array($page_h5_font_family_font_weight, array( '', 'regular' ))) ? '400' : $page_h5_font_family_font_weight;

        $page_h5_font_family_is_italic = (false !== strpos($page_h5_font_family_value['variant'], 'italic'));
        $page_h5_font_family_is_style  = $page_h5_font_family_is_italic ? 'italic' : 'normal';

        echo sprintf('font-weight: %s;', esc_attr($page_h5_font_family_font_weight));
        echo sprintf('font-style: %s;', esc_attr($page_h5_font_family_is_style));
    }
    if (! empty($page_h5_font_family_value['text-transform'])) {
        echo sprintf('text-transform: %s;', html_entity_decode(esc_attr($page_h5_font_family_value['text-transform']), ENT_QUOTES));
    }

    echo '}';
}

// H6 font settings.
$page_h6_toggle            = get_theme_mod('page_h6_toggle');
$page_h6_font_family_value = get_theme_mod('page_h6_font_family');

if ($page_h6_toggle && $page_h6_font_family_value) {
    echo 'h6 {';

    if (! empty($page_h6_font_family_value['font-family'])) {
        echo sprintf('font-family: %s;', html_entity_decode(esc_attr($page_h6_font_family_value['font-family']), ENT_QUOTES));
    }

    if (! empty($page_h6_font_family_value['variant'])) {
        $page_h6_font_family_font_weight = str_replace('italic', '', $page_h6_font_family_value['variant']);
        $page_h6_font_family_font_weight = (in_array($page_h6_font_family_font_weight, array( '', 'regular' ))) ? '400' : $page_h6_font_family_font_weight;

        $page_h6_font_family_is_italic = (false !== strpos($page_h6_font_family_value['variant'], 'italic'));
        $page_h6_font_family_is_style  = $page_h6_font_family_is_italic ? 'italic' : 'normal';

        echo sprintf('font-weight: %s;', esc_attr($page_h6_font_family_font_weight));
        echo sprintf('font-style: %s;', esc_attr($page_h6_font_family_is_style));
    }
    if (! empty($page_h6_font_family_value['text-transform'])) {
        echo sprintf('text-transform: %s;', html_entity_decode(esc_attr($page_h6_font_family_value['text-transform']), ENT_QUOTES));
    }
    echo '}';
}

/* General */

// Page settings.
$page_width                   = get_theme_mod('page_max_width');
$page_boxed                   = get_theme_mod('page_boxed');
$page_boxed_padding           = get_theme_mod('page_boxed_padding');
$page_boxed_margin            = get_theme_mod('page_boxed_margin');
$page_boxed_background        = get_theme_mod('page_boxed_background');
$page_boxed_shadow            = get_theme_mod('page_boxed_box_shadow');
$page_boxed_shadow_horizontal = ($val = get_theme_mod('page_boxed_box_shadow_horizontal')) ? $val . 'px' : '0px';
$page_boxed_shadow_vertical   = ($val = get_theme_mod('page_boxed_box_shadow_vertical')) ? $val . 'px' : '0px';
$page_boxed_shadow_blur       = ($val = get_theme_mod('page_boxed_box_shadow_blur')) ? $val . 'px' : '25px';
$page_boxed_shadow_spread     = ($val = get_theme_mod('page_boxed_box_shadow_spread')) ? $val . 'px' : '0px';
$page_boxed_shadow_color      = ($val = get_theme_mod('page_boxed_box_shadow_color')) ? $val : 'rgba(0,0,0,.15)';

if ($page_width) {
    echo '.potter-container {';
    echo sprintf('max-width: %s;', esc_attr($page_width));
    echo '}';
}
if ($page_boxed) {
    echo '.stickynav {';
    if ($page_width) {
        echo sprintf('max-width: %s;', esc_attr($page_width));
    } else {
        echo sprintf('max-width: 1200px;');
    }
    echo 'left: 50%;';
    echo 'transform: translateX(-50%);';
    echo '}';
}

if ($page_boxed) {
    echo '.potter-archive-content .potter-post, .potter-article-wrapper {';
    echo sprintf('background: none;');
    echo '}';
    echo '.potter-archive-content .potter-post-style-boxed.stretched .article-header>.potter-post-image-wrapper:first-child {';
    echo sprintf('margin-top: -40px;');
    echo '}';
    echo '.potter-page-content {';
    echo sprintf('padding: 0px !important;');
    echo sprintf('background: none;');
    echo '}';
    echo '.potter-container > .potter-grid-medium {';
    echo sprintf('margin-left: 0px;');
    echo '}';
    echo '.potter-archive-content .potter-post, .potter-article-wrapper {';
    echo sprintf('padding: 40px 0px;');
    echo '}';
    echo '.potter-archive-content .potter-post.potter-post-style-boxed, .potter-article-wrapper {';
    echo sprintf('padding: 40px 40px;');
    echo '}';
    echo '.potter-archive-content .potter-post-style-boxed.stretched .potter-post-image-wrapper {';
    echo sprintf('margin-left: -40px;');
    echo sprintf('margin-right: -40px;');
    echo '}';
    echo '.potter-container.potter-menu-stacked {';
    echo sprintf('padding-left: 0px;');
    echo sprintf('padding-right: 0px;');
    echo '}';

    if ($page_boxed_padding) {
        echo '.potter-container {';
        echo sprintf('padding-left: %s;', esc_attr($page_boxed_padding) . 'px');
        echo sprintf('padding-right: %s;', esc_attr($page_boxed_padding) . 'px');
        echo '}';
    }

    echo '.potter-page {';
    echo sprintf('background-color: #fff;');
    if ($page_width) {
        echo sprintf('max-width: %s;', esc_attr($page_width));
    } else {
        echo 'max-width: 1200px;';
    }

    echo 'margin: 0 auto;';
    echo 'float: none !important;';

    if ($page_boxed_margin) {
        echo sprintf('margin-top: %s;', esc_attr($page_boxed_margin) . 'px');
        echo sprintf('margin-bottom: %s;', esc_attr($page_boxed_margin) . 'px');
    }

    if ($page_boxed_background) {
        echo sprintf('background-color: %s;', esc_attr($page_boxed_background)  . '!important');
    }
    echo '}';

    if ($page_boxed_shadow) {
        echo '#container {';
        echo sprintf('box-shadow: %1$s %2$s %3$s %4$s %5$s;', esc_attr($page_boxed_shadow_horizontal), esc_attr($page_boxed_shadow_vertical), esc_attr($page_boxed_shadow_blur), esc_attr($page_boxed_shadow_spread), esc_attr($page_boxed_shadow_color));
        echo '}';
    }
}

// ScrollTop.
$scrolltop               = get_theme_mod('layout_scrolltop');
$scrolltop_position      = get_theme_mod('scrolltop_position');
$scrolltop_bg_color      = get_theme_mod('scrolltop_bg_color');
$scrolltop_border_radius = get_theme_mod('scrolltop_border_radius');
$scrolltop_bg_color_alt  = get_theme_mod('scrolltop_bg_color_alt');

if ($scrolltop) {
    if ('left' === $scrolltop_position) {
        echo '.scrolltop {';
        echo 'right: auto;';
        echo 'left: 20px;';
        echo '}';
    }

    if ($scrolltop_bg_color || $scrolltop_border_radius) {
        echo '.scrolltop {';

        if ($scrolltop_bg_color) {
            echo sprintf('background-color: %s;', esc_attr($scrolltop_bg_color));
        }

        if ($scrolltop_border_radius) {
            echo sprintf('border-radius: %s;', esc_attr($scrolltop_border_radius) . 'px');
        }

        echo '}';
    }

    if ($scrolltop_bg_color_alt) {
        echo '.scrolltop:hover {';
        echo sprintf('background-color: %s;', esc_attr($scrolltop_bg_color_alt));
        echo '}';
    }
}
//icon

$col_one_icon_link_size = get_theme_mod('col_one_icon_link_size');
$pre_header_column_one_layout = get_theme_mod('pre_header_column_one_layout');
if ($col_one_icon_link_size && $pre_header_column_one_layout) {
    echo '.potter-inner-pre-header .left-column.icon-links a{';
    echo sprintf('font-size: %s;', esc_attr($col_one_icon_link_size) . 'px');
    echo '}';
}
$col_one_icon_link_size_col2 = get_theme_mod('col_one_icon_link_size_col2');
$pre_header_column_two_layout = get_theme_mod('pre_header_column_two_layout');
if ($col_one_icon_link_size_col2 && $pre_header_column_two_layout) {
    echo '.potter-inner-pre-header .right-column.icon-links a{';
    echo sprintf('font-size: %s;', esc_attr($col_one_icon_link_size_col2) . 'px');
    echo '}';
}

$icon_link_size_footer_col1 = get_theme_mod('icon_link_size_footer_col1');
$footer_column_one_layout = get_theme_mod('footer_column_one_layout');
if ($icon_link_size_footer_col1 && $footer_column_one_layout) {
    echo '.bottom-footer .left-column a{';
    echo sprintf('font-size: %s;', esc_attr($icon_link_size_footer_col1) . 'px');
    echo '}';
}
$icon_link_size_footer_col2 = get_theme_mod('icon_link_size_footer_col2');
$footer_column_two_layout = get_theme_mod('footer_column_two_layout');
if ($icon_link_size_footer_col2 && $footer_column_two_layout) {
    echo '.bottom-footer .right-column a{';
    echo sprintf('font-size: %s;', esc_attr($icon_link_size_footer_col2) . 'px');
    echo '}';
}


// Background (backwards compatibility).
$page_background_color      = get_theme_mod('page_background_color');
$page_background_image      = get_theme_mod('page_background_image');
$page_background_attachment = get_theme_mod('page_background_attachment');
$page_background_position   = get_theme_mod('page_background_position');
$page_background_repeat     = get_theme_mod('page_background_repeat');
$page_background_size       = get_theme_mod('page_background_size');

if ($page_background_color || $page_background_image) {
    echo 'body{';

    if ($page_background_color) {
        echo sprintf('background-color: %s;', esc_attr($page_background_color));
    }

    if ($page_background_image) {
        echo sprintf('background-image: url(%s);', esc_url($page_background_image));
    }

    if ($page_background_attachment) {
        echo sprintf('background-attachment: %s;', esc_attr($page_background_attachment));
    }

    if ($page_background_position) {
        echo sprintf('background-position: %s;', esc_attr($page_background_position));
    }

    if ($page_background_repeat) {
        echo sprintf('background-repeat: %s;', esc_attr($page_background_repeat));
    }

    if ($page_background_size) {
        echo sprintf('background-size: %s;', esc_attr($page_background_size));
    }

    echo '}';
}

// Accent color.
$page_accent_color     = get_theme_mod('page_accent_color');
$page_accent_color_alt = get_theme_mod('page_accent_color_alt');

if ($page_accent_color) {
    echo 'a {';
    echo sprintf('color: %s;', esc_attr($page_accent_color));
    echo '}';

    echo '.potter-sub-menu>.menu-item-has-children>.sub-menu, .potter-woo-menu-item .potter-woo-sub-menu, .potter-menu-item-search .potter-menu-search.drop-down-search {';
    echo sprintf('border-top: %s;', '2px solid ' . esc_attr($page_accent_color));
    echo '}';
    echo '.potter-woo-menu-item .potter-woo-sub-menu:after, .potter-menu-item-search .potter-menu-search.drop-down-search:after {';
    echo sprintf('border-bottom-color: %s;', esc_attr($page_accent_color));
    echo '}';

    echo '.bypostauthor {';
    echo sprintf('border-color: %s;', esc_attr($page_accent_color));
    echo '}';

    echo '.potter-button-primary {';
    echo sprintf('background: %s;', esc_attr($page_accent_color));
    echo '}';
}

if ($page_accent_color_alt) {
    echo 'a:hover {';
    echo sprintf('color: %s;', esc_attr($page_accent_color_alt));
    echo '}';

    echo '.potter-button-primary:hover {';
    echo sprintf('background: %s;', esc_attr($page_accent_color_alt));
    echo '}';

    echo '.potter-menu > .current-menu-item > a {';
    echo sprintf('color: %s;', esc_attr($page_accent_color_alt) . '!important');
    echo '}';
}

// Theme buttons.
$button_border_width             = get_theme_mod('button_border_width');
$button_border_color             = get_theme_mod('button_border_color');
$button_border_color_alt         = get_theme_mod('button_border_color_alt');
$button_primary_border_color     = get_theme_mod('button_primary_border_color');
$button_primary_border_color_alt = get_theme_mod('button_primary_border_color_alt');
$button_bg_color                 = get_theme_mod('button_bg_color');
$button_text_color               = get_theme_mod('button_text_color');
$button_border_radius            = get_theme_mod('button_border_radius');
$button_bg_color_alt             = get_theme_mod('button_bg_color_alt');
$button_text_color_alt           = get_theme_mod('button_text_color_alt');
$button_primary_bg_color         = get_theme_mod('button_primary_bg_color');
$button_primary_text_color       = get_theme_mod('button_primary_text_color');
$button_primary_bg_color_alt     = get_theme_mod('button_primary_bg_color_alt');
$button_primary_text_color_alt   = get_theme_mod('button_primary_text_color_alt');
$buttom_font_family_value = get_theme_mod('button_font_family');
$theme_button_padding_top_bottom            = get_theme_mod('theme_button_padding_top_bottom');
$theme_button_padding_left_right            = get_theme_mod('theme_button_padding_left_right');
$theme_button_font_size            = get_theme_mod('theme_button_font_size');

if ($button_border_width) {
    echo '.potter-button, input[type="submit"], .button, .potter-woo-sub-menu-button-wrap a.potter-button-primary {';

    echo sprintf('border-width: %s;', esc_attr($button_border_width) . 'px');
    echo 'border-style: solid;';


    if ($button_border_color) {
        echo sprintf('border-color: %s;', esc_attr($button_border_color));
    }

    echo '}';

    if ($button_border_color_alt) {
        echo '.potter-button:hover, input[type="submit"]:hover, button:hover, .button:hover{';
        echo sprintf('border-color: %s;', esc_attr($button_border_color_alt) . ' !important');
        echo '}';
    }

    if ($button_primary_border_color) {
        echo '.potter-button-primary, .potter-woo-sub-menu-button-wrap a.potter-button-primary {';
        echo sprintf('border-color: %s;', esc_attr($button_primary_border_color));
        echo '}';
    }

    if ($button_primary_border_color_alt) {
        echo '.potter-button-primary:hover, .potter-woo-sub-menu-button-wrap a.potter-button-primary:hover {';
        echo sprintf('border-color: %s;', esc_attr($button_primary_border_color_alt) . ' !important');
        echo '}';
    }
}
echo '.potter-button, input[type="submit"], .button, .potter-woo-menu-item ul .potter-woo-sub-menu-button-wrap a.potter-button, .potter-woo-sub-menu-button-wrap a.potter-button-primary, .offminicart .wc-forward {';
if ($button_bg_color || $button_text_color || $button_border_radius || $theme_button_font_size  ) {
    if ($button_border_radius) {
        echo sprintf('border-radius: %s !important;', esc_attr($button_border_radius) . 'px');
    }

    if ($button_bg_color) {
        echo sprintf('background: %s;', esc_attr($button_bg_color));
    }

    if ($button_text_color) {
        echo sprintf('color: %s;', esc_attr($button_text_color));
    }

    if ($theme_button_font_size) {
        echo sprintf('font-size: %spx;', esc_attr($theme_button_font_size));
    }
}
if (! empty($buttom_font_family_value['font-family'])) {
    echo sprintf('font-family: %s !important;', html_entity_decode(esc_attr($buttom_font_family_value['font-family']), ENT_QUOTES));
}

if (! empty($buttom_font_family_value['variant'])) {
    $buttom_font_family_font_weight = str_replace('italic', '', $buttom_font_family_value['variant']);
    $buttom_font_family_font_weight = (in_array($buttom_font_family_font_weight, array( '', 'regular' ))) ? '400' : $buttom_font_family_font_weight;

    $buttom_font_family_is_italic = (false !== strpos($buttom_font_family_value['variant'], 'italic'));
    $buttom_font_family_is_style  = $buttom_font_family_is_italic ? 'italic' : 'normal';

    echo sprintf('font-weight: %s !important;', esc_attr($buttom_font_family_font_weight));
    echo sprintf('font-style: %s !important;', esc_attr($buttom_font_family_is_style));
}
if (! empty($buttom_font_family_value['text-transform'])) {
    echo sprintf('text-transform: %s !important;', html_entity_decode(esc_attr($buttom_font_family_value['text-transform']), ENT_QUOTES));
}

echo '}';

if ($button_bg_color_alt || $button_text_color_alt) {
    echo '.potter-button:hover, input[type="submit"]:hover, .button:hover {';

    if ($button_bg_color_alt) {
        echo sprintf('background: %s;', esc_attr($button_bg_color_alt) . ' !important');
    }

    if ($button_text_color_alt) {
        echo sprintf('color: %s;', esc_attr($button_text_color_alt) . ' !important');
    }


    echo '}';
}

if ($button_primary_bg_color || $button_primary_text_color || $theme_button_font_size) {
    echo '.potter-button-primary, .potter-woo-sub-menu-button-wrap a.potter-button-primary {';

    if ($button_primary_bg_color) {
        echo sprintf('background: %s;', esc_attr($button_primary_bg_color));
    }

    if ($button_primary_text_color) {
        echo sprintf('color: %s;', esc_attr($button_primary_text_color));
    }

    if ($theme_button_font_size) {
        echo sprintf('font-size: %spx;', esc_attr($theme_button_font_size));
    }

    echo '}';
}

if ($button_primary_bg_color_alt || $button_primary_bg_color_alt) {
    echo '.potter-button-primary:hover {';

    if ($button_primary_bg_color_alt) {
        echo sprintf('background: %s;', esc_attr($button_primary_bg_color_alt) . ' !important');
    }

    if ($button_primary_text_color_alt) {
        echo sprintf('color: %s;', esc_attr($button_primary_text_color_alt) . ' !important');
    }

    echo '}';
}
echo '.potter-button-primary, .potter-button, input[type="submit"], .button {';
if ($theme_button_padding_top_bottom) {
    echo sprintf('padding-top: %spx !important;', esc_attr($theme_button_padding_top_bottom));
    echo sprintf('padding-bottom: %spx !important;', esc_attr($theme_button_padding_top_bottom));
}
if ($theme_button_padding_left_right) {
    echo sprintf('padding-left: %spx !important;', esc_attr($theme_button_padding_left_right));
    echo sprintf('padding-right: %spx !important;', esc_attr($theme_button_padding_left_right));
}
  echo sprintf('line-height: 1;');
echo '}';

// Sidebar.
$sidebar_bg_color                      = get_theme_mod('sidebar_bg_color');
$sidebar_width                         = get_theme_mod('sidebar_width');
$sidebar_widget_padding_top_desktop    = get_theme_mod('sidebar_widget_padding_top_desktop');
$sidebar_widget_padding_right_desktop  = get_theme_mod('sidebar_widget_padding_right_desktop');
$sidebar_widget_padding_bottom_desktop = get_theme_mod('sidebar_widget_padding_bottom_desktop');
$sidebar_widget_padding_left_desktop   = get_theme_mod('sidebar_widget_padding_left_desktop');
$sidebar_widget_padding_top_tablet     = get_theme_mod('sidebar_widget_padding_top_tablet');
$sidebar_widget_padding_right_tablet   = get_theme_mod('sidebar_widget_padding_right_tablet');
$sidebar_widget_padding_bottom_tablet  = get_theme_mod('sidebar_widget_padding_bottom_tablet');
$sidebar_widget_padding_left_tablet    = get_theme_mod('sidebar_widget_padding_left_tablet');
$sidebar_widget_padding_top_mobile     = get_theme_mod('sidebar_widget_padding_top_mobile');
$sidebar_widget_padding_right_mobile   = get_theme_mod('sidebar_widget_padding_right_mobile');
$sidebar_widget_padding_bottom_mobile  = get_theme_mod('sidebar_widget_padding_bottom_mobile');
$sidebar_widget_padding_left_mobile    = get_theme_mod('sidebar_widget_padding_left_mobile');
$sidebar_font_color    = get_theme_mod('sidebar_font_color');
$sidebar_accent_color    = get_theme_mod('sidebar_accent_color');
$sidebar_accent_hover_color    = get_theme_mod('sidebar_accent_hover_color');

if ($sidebar_bg_color) {
    echo '.potter-sidebar .widget, .elementor-widget-sidebar .widget {';
    echo sprintf('background: %s;', esc_attr($sidebar_bg_color));
    echo '}';
}

if ($sidebar_font_color) {
    echo '.potter-sidebar .widget *, .elementor-widget-sidebar .widget * {';
    echo sprintf('color: %s;', esc_attr($sidebar_font_color));
    echo '}';
}

if ($sidebar_accent_color) {
    echo '.potter-sidebar .widget * a, .elementor-widget-sidebar .widget * a {';
    echo sprintf('color: %s;', esc_attr($sidebar_accent_color));
    echo '}';
}
if ($sidebar_accent_hover_color) {
    echo '.potter-sidebar .widget * a:hover, .elementor-widget-sidebar .widget * a:hover {';
    echo sprintf('color: %s;', esc_attr($sidebar_accent_hover_color));
    echo '}';
}



if (! is_bool($sidebar_widget_padding_top_desktop) || ! is_bool($sidebar_widget_padding_right_desktop) || ! is_bool($sidebar_widget_padding_bottom_desktop) || ! is_bool($sidebar_widget_padding_left_desktop)) {
    echo '.potter-sidebar .widget, .elementor-widget-sidebar .widget {';

    if (! is_bool($sidebar_widget_padding_top_desktop)) {
        echo sprintf('padding-top: %s;', esc_attr($sidebar_widget_padding_top_desktop) . 'px');
    }

    if (! is_bool($sidebar_widget_padding_right_desktop)) {
        echo sprintf('padding-right: %s;', esc_attr($sidebar_widget_padding_right_desktop) . 'px');
    }

    if (! is_bool($sidebar_widget_padding_bottom_desktop)) {
        echo sprintf('padding-bottom: %s;', esc_attr($sidebar_widget_padding_bottom_desktop) . 'px');
    }

    if (! is_bool($sidebar_widget_padding_left_desktop)) {
        echo sprintf('padding-left: %s;', esc_attr($sidebar_widget_padding_left_desktop) . 'px');
    }

    echo '}';
}

//responsive break points

$breakpoint_mobile = get_theme_mod('responsive_breakpoint_mobile', '480');
$breakpoint_medium = get_theme_mod('responsive_breakpoint_tablet', '768');
$breakpoint_desktop = get_theme_mod('responsive_breakpoint_desktop', '1024');

if (! is_bool($sidebar_widget_padding_top_tablet) || ! is_bool($sidebar_widget_padding_right_tablet) || ! is_bool($sidebar_widget_padding_bottom_tablet) || ! is_bool($sidebar_widget_padding_left_tablet)) {
    echo '@media screen and (max-width: ' . esc_attr($breakpoint_desktop) . 'px) {';

    echo '.potter-sidebar .widget, .elementor-widget-sidebar .widget {';

    if (! is_bool($sidebar_widget_padding_top_tablet)) {
        echo sprintf('padding-top: %s;', esc_attr($sidebar_widget_padding_top_tablet) . 'px');
    }

    if (! is_bool($sidebar_widget_padding_right_tablet)) {
        echo sprintf('padding-right: %s;', esc_attr($sidebar_widget_padding_right_tablet) . 'px');
    }

    if (! is_bool($sidebar_widget_padding_bottom_tablet)) {
        echo sprintf('padding-bottom: %s;', esc_attr($sidebar_widget_padding_bottom_tablet) . 'px');
    }

    if (! is_bool($sidebar_widget_padding_left_tablet)) {
        echo sprintf('padding-left: %s;', esc_attr($sidebar_widget_padding_left_tablet) . 'px');
    }

    echo '}';

    echo '}';
}

if (! is_bool($sidebar_widget_padding_top_mobile) || ! is_bool($sidebar_widget_padding_right_mobile) || ! is_bool($sidebar_widget_padding_bottom_mobile) || ! is_bool($sidebar_widget_padding_left_mobile)) {
    echo '@media screen and (max-width: ' . esc_attr($breakpoint_mobile) . 'px) {';

    echo '.potter-sidebar .widget, .elementor-widget-sidebar .widget {';

    if (! is_bool($sidebar_widget_padding_top_mobile)) {
        echo sprintf('padding-top: %s;', esc_attr($sidebar_widget_padding_top_mobile) . 'px');
    }

    if (! is_bool($sidebar_widget_padding_right_mobile)) {
        echo sprintf('padding-right: %s;', esc_attr($sidebar_widget_padding_right_mobile) . 'px');
    }

    if (! is_bool($sidebar_widget_padding_bottom_mobile)) {
        echo sprintf('padding-bottom: %s;', esc_attr($sidebar_widget_padding_bottom_mobile) . 'px');
    }

    if (! is_bool($sidebar_widget_padding_left_mobile)) {
        echo sprintf('padding-left: %s;', esc_attr($sidebar_widget_padding_left_mobile) . 'px');
    }

    echo '}';

    echo '}';
}

if ($sidebar_width) {
    echo '@media (min-width: ' . esc_attr($breakpoint_medium + 1) . 'px) {';

    echo 'body:not(.potter-no-sidebar) .potter-sidebar-wrapper.potter-medium-1-3 {';
    echo sprintf('width: %s;', esc_attr($sidebar_width) . '%');
    echo '}';

    echo 'body:not(.potter-no-sidebar) .potter-main.potter-medium-2-3 {';
    echo sprintf('width: %s;', 100 - esc_attr($sidebar_width) . '%');
    echo '}';

    echo '}';
}

// Breadcrumbs.
$breadcrumbs_alignment        = get_theme_mod('breadcrumbs_alignment', 'left');
$page_title_alignment        = get_theme_mod('page_title_alignment', 'left');
$breadcrumbs_background_color = get_theme_mod('breadcrumbs_background_color');
$breadcrumbs_font_color       = get_theme_mod('breadcrumbs_font_color');
$breadcrumbs_accent_color     = get_theme_mod('breadcrumbs_accent_color');
$breadcrumbs_accent_color_alt = get_theme_mod('breadcrumbs_accent_color_alt');
$page_title_bar_top_padding	= get_theme_mod('page_title_bar_top_padding');
$page_title_bar_bottom_padding	= get_theme_mod('page_title_bar_bottom_padding');
$page_title_font_size	= get_theme_mod('page_title_font_size');
$transparent_header = get_theme_mod('transparent_header');
$trans_nav_icon_link_color = get_theme_mod('trans_nav_icon_link_color');
$trans_nav_icon_link_color_hover = get_theme_mod('trans_nav_icon_link_color_hover');

$dtheader_single_post								= get_theme_mod('dtheader_single_post');

if ($transparent_header) {
  if ($trans_nav_icon_link_color) {
    echo '.potter-menu-item-icon a span {';
    echo sprintf('color: %s !important;', esc_attr($trans_nav_icon_link_color));
    echo '}';
  }
  if ($trans_nav_icon_link_color_hover) {
    echo '.potter-menu-item-icon a:hover span {';
    echo sprintf('color: %s !important;', esc_attr($trans_nav_icon_link_color_hover));
    echo '}';
  }
}




if ('left' !== $breadcrumbs_alignment) {
    echo '.title-bar-after-header {';
    echo sprintf('text-align: %s;', esc_attr($breadcrumbs_alignment));
    echo '}';
}

if ('left' !== $page_title_alignment) {
    echo '.title-bar-before-content, .default-title-bar-archive, .woocommerce-breadcrumb, .woocommerce-products-header, .potter-page-content h1.entry-title {';
    echo sprintf('text-align: %s;', esc_attr($page_title_alignment));
    echo '}';
}
echo '.title-bar-after-header {';
if ($breadcrumbs_background_color) {
    echo sprintf('background-color: %s;', esc_attr($breadcrumbs_background_color));
}
echo '}';

    echo '.title-bar-after-header {';
    if ($page_title_bar_top_padding) {
        echo sprintf('padding-top: %s;', esc_attr($page_title_bar_top_padding) . 'px');
    }
    if ($page_title_bar_bottom_padding) {
        echo sprintf('padding-bottom: %s;', esc_attr($page_title_bar_bottom_padding) . 'px');
    }
    echo '}';

    if ($page_title_font_size) {
        echo '.potter-page-content h1.entry-title {';
        echo sprintf('font-size: %s;', esc_attr($page_title_font_size)  . 'px');
        echo '}';
        echo '.default-title-bar-archive h1, .woocommerce-products-header h1 {';
        echo sprintf('font-size: %s;', esc_attr($page_title_font_size)  . 'px');
        echo '}';
    }

if ($breadcrumbs_font_color) {
    echo '.title-bar-after-header h1, .title-bar-after-header {';
    echo sprintf('color: %s;', esc_attr($breadcrumbs_font_color));
    echo '}';
}

if ($breadcrumbs_accent_color) {
    echo '.title-bar-after-header a {';
    echo sprintf('color: %s;', esc_attr($breadcrumbs_accent_color));
    echo '}';
}

if ($breadcrumbs_accent_color_alt) {
    echo '.title-bar-after-header a:hover {';
    echo sprintf('color: %s;', esc_attr($breadcrumbs_accent_color_alt));
    echo '}';
}

// Pagination.
$blog_pagination_background_color           = get_theme_mod('blog_pagination_background_color');
$blog_pagination_background_color_alt       = get_theme_mod('blog_pagination_background_color_alt');
$blog_pagination_background_color_active    = get_theme_mod('blog_pagination_background_color_active');
$blog_pagination_font_color                 = get_theme_mod('blog_pagination_font_color');
$blog_pagination_font_color_alt             = get_theme_mod('blog_pagination_font_color_alt');
$blog_pagination_font_color_active          = get_theme_mod('blog_pagination_font_color_active');
$blog_pagination_font_size                  = get_theme_mod('blog_pagination_font_size');
$blog_pagination_border_radius              = get_theme_mod('blog_pagination_border_radius');
$blog_pagination_background_color_next_prev = get_theme_mod('blog_pagination_background_color_next_prev');


if ($blog_pagination_border_radius || $blog_pagination_font_size || $blog_pagination_background_color || $blog_pagination_font_color) {
    echo '.pagination .page-numbers {';

    if ($blog_pagination_border_radius) {
        echo sprintf('border-radius: %s;', esc_attr($blog_pagination_border_radius) . 'px');
    }

    if ($blog_pagination_font_size) {
        $suffix = is_numeric($blog_pagination_font_size) ? 'px' : '';
        echo sprintf('font-size: %s;', esc_attr($blog_pagination_font_size) . esc_attr($suffix));
    }

    if ($blog_pagination_background_color) {
        echo sprintf('background: %s;', esc_attr($blog_pagination_background_color));
    }

    if ($blog_pagination_font_color) {
        echo sprintf('color: %s;', esc_attr($blog_pagination_font_color));
    }

    echo '}';
}

if ($blog_pagination_background_color_alt || $blog_pagination_font_color_alt) {
    echo '.pagination .page-numbers:hover {';

    if ($blog_pagination_background_color_alt) {
        echo sprintf('background: %s;', esc_attr($blog_pagination_background_color_alt));
    }

    if ($blog_pagination_font_color_alt) {
        echo sprintf('color: %s;', esc_attr($blog_pagination_font_color_alt));
    }

    echo '}';
}

if ($blog_pagination_background_color_active || $blog_pagination_font_color_active) {
    echo '.pagination .page-numbers.current {';

    if ($blog_pagination_background_color_active) {
        echo sprintf('background: %s;', esc_attr($blog_pagination_background_color_active) . '!important');
    }

    if ($blog_pagination_background_color_next_prev) {
        echo sprintf('color: %s;', esc_attr($blog_pagination_background_color_next_prev));
    }

    echo '}';
}

/* Blog Layouts */

$archives = apply_filters('potter_archives', array( 'archive' ));

foreach ($archives as $archive) {

    // Custom width.
    $custom_width = get_theme_mod($archive . '_custom_width');

    // All archives.
    if ('archive' === $custom_width && $archive) {
        echo '.blog #inner-content,';
        echo '.search #inner-content,';
        echo '.' . esc_attr($archive) . ' #inner-content {';
        echo sprintf('max-width: %s;', esc_attr($custom_width));
        echo '}';

    // Custom post type archives & taxonomies.
    } elseif ($custom_width && strpos($archive, '-')) {
        $cpt = substr($archive, 0, strpos($archive, '-'));

        echo '.tax-' . esc_attr($cpt) . '_category #inner-content,';
        echo '.tax-' . esc_attr($cpt) . '_tag #inner-content,';
        echo '.post-type-archive-' . esc_attr($cpt) . ' #inner-content {';
        echo sprintf('max-width: %s;', esc_attr($custom_width));
        echo '}';

    // Other archives.
    } elseif ($custom_width) {
        echo '.blog #inner-content,';
        echo '.' . esc_attr($archive) . ' #inner-content {';
        echo sprintf('max-width: %s;', esc_attr($custom_width));
        echo '}';
    }

    $layout            = get_theme_mod($archive . '_layout');
    $style             = get_theme_mod($archive . '_post_style', 'plain');
    $content_alignment = get_theme_mod($archive . '_post_content_alignment', 'left');
    $accent_color      = get_theme_mod($archive . '_post_accent_color');
    $accent_color_alt  = get_theme_mod($archive . '_post_accent_color_alt');
    $space_between     = get_theme_mod($archive . '_post_space_between');
    $title_size        = get_theme_mod($archive . '_post_title_size');
    $font_size         = get_theme_mod($archive . '_post_font_size');
    $stretched         = get_theme_mod($archive . '_boxed_image_streched', false);

    // General layout settings.
    if ($content_alignment) {
        echo '.potter-' . esc_attr($archive) . '-content .potter-post {';
        echo sprintf('text-align: %s;', esc_attr($content_alignment));
        echo '}';
    }

    if ($accent_color) {
        echo '.potter-' . esc_attr($archive) . '-content .potter-post a:not(.potter-read-more) {';
        echo sprintf('color: %s;', esc_attr($accent_color));
        echo '}';
    }

    if ($accent_color_alt) {
        echo '.potter-' . esc_attr($archive) . '-content .potter-post a:not(.potter-read-more):hover {';
        echo sprintf('color: %s;', esc_attr($accent_color_alt));
        echo '}';
    }

    if ($title_size) {
        $suffix = is_numeric($title_size) ? 'px' : '';

        echo '.potter-' . esc_attr($archive) . '-content .potter-post .entry-title {';
        echo sprintf('font-size: %s;', esc_attr($title_size) . esc_attr($suffix));
        echo '}';
    }

    if ($font_size) {
        $suffix = is_numeric($font_size) ? 'px' : '';

        echo '.potter-' . esc_attr($archive) . '-content .potter-post .entry-summary {';
        echo sprintf('font-size: %s;', esc_attr($font_size) . $suffix);
        echo '}';
    }

    // Boxed
    if ('boxed' === $style) {
        $background_color = get_theme_mod($archive . '_post_background_color');

        if ($background_color) {
            echo '.potter-' . $archive . '-content .potter-post-style-boxed {';
            echo sprintf('background-color: %s;', esc_attr($background_color));
            echo '}';
        } else {
            echo '.potter-' . $archive . '-content .potter-post-style-boxed {';
            echo sprintf('background-color: #fff;');
            echo '}';
        }

        if ($space_between) {
            echo '.potter-' . $archive . '-content .potter-post-style-boxed {';
            echo sprintf('margin-bottom: %s;', esc_attr($space_between) . 'px');
            echo '}';
        }

        $boxed_padding_top_desktop    = get_theme_mod($archive . '_boxed_padding_top_desktop');
        $boxed_padding_right_desktop  = get_theme_mod($archive . '_boxed_padding_right_desktop');
        $boxed_padding_bottom_desktop = get_theme_mod($archive . '_boxed_padding_bottom_desktop');
        $boxed_padding_left_desktop   = get_theme_mod($archive . '_boxed_padding_left_desktop');
        $boxed_padding_top_tablet     = get_theme_mod($archive . '_boxed_padding_top_tablet');
        $boxed_padding_right_tablet   = get_theme_mod($archive . '_boxed_padding_right_tablet');
        $boxed_padding_bottom_tablet  = get_theme_mod($archive . '_boxed_padding_bottom_tablet');
        $boxed_padding_left_tablet    = get_theme_mod($archive . '_boxed_padding_left_tablet');
        $boxed_padding_top_mobile     = get_theme_mod($archive . '_boxed_padding_top_mobile');
        $boxed_padding_right_mobile   = get_theme_mod($archive . '_boxed_padding_right_mobile');
        $boxed_padding_bottom_mobile  = get_theme_mod($archive . '_boxed_padding_bottom_mobile');
        $boxed_padding_left_mobile    = get_theme_mod($archive . '_boxed_padding_left_mobile');

        if ($boxed_padding_top_desktop || $boxed_padding_right_desktop || $boxed_padding_bottom_desktop || $boxed_padding_left_desktop) {
            echo '.potter-' . $archive . '-content .potter-post-style-boxed {';

            if ($boxed_padding_top_desktop) {
                echo sprintf('padding-top: %s;', esc_attr($boxed_padding_top_desktop) . 'px !important');
            }

            if ($boxed_padding_right_desktop) {
                echo sprintf('padding-right: %s;', esc_attr($boxed_padding_right_desktop) . 'px !important');
            }

            if ($boxed_padding_bottom_desktop) {
                echo sprintf('padding-bottom: %s;', esc_attr($boxed_padding_bottom_desktop) . 'px !important');
            }

            if ($boxed_padding_left_desktop) {
                echo sprintf('padding-left: %s;', esc_attr($boxed_padding_left_desktop) . 'px !important');
            }

            echo '}';

            if ($stretched && 'beside' !== $layout) {
                echo '.potter-' . $archive . '-content .potter-post-style-boxed.stretched .potter-post-image-wrapper {';

                if ($boxed_padding_left_desktop) {
                    echo sprintf('margin-left: -%s;', esc_attr($boxed_padding_left_desktop) . 'px');
                }

                if ($boxed_padding_right_desktop) {
                    echo sprintf('margin-right: -%s;', esc_attr($boxed_padding_right_desktop) . 'px');
                }

                echo '}';

                echo '.potter-' . $archive . '-content .potter-post-style-boxed.stretched .article-header > .potter-post-image-wrapper:first-child {';

                if ($boxed_padding_top_desktop) {
                    echo sprintf('margin-top: -%s;', esc_attr($boxed_padding_top_desktop) . 'px');
                    echo sprintf('margin-bottom: %s;', esc_attr($boxed_padding_top_desktop) . 'px');
                }

                echo '}';
            }
        }

        if ($boxed_padding_top_tablet || $boxed_padding_right_tablet || $boxed_padding_bottom_tablet || $boxed_padding_left_tablet) {
            echo '@media screen and (max-width: ' . esc_attr($breakpoint_desktop) . 'px) {';

            echo '.potter-' . $archive . '-content .potter-post-style-boxed {';

            if ($boxed_padding_top_tablet) {
                echo sprintf('padding-top: %s;', esc_attr($boxed_padding_top_tablet) . 'px !important');
            }

            if ($boxed_padding_right_tablet) {
                echo sprintf('padding-right: %s;', esc_attr($boxed_padding_right_tablet) . 'px !important');
            }

            if ($boxed_padding_bottom_tablet) {
                echo sprintf('padding-bottom: %s;', esc_attr($boxed_padding_bottom_tablet) . 'px !important');
            }

            if ($boxed_padding_left_tablet) {
                echo sprintf('padding-left: %s;', esc_attr($boxed_padding_left_tablet) . 'px !important');
            }

            echo '}';

            if ($stretched && 'beside' !== $layout) {
                echo '.potter-' . $archive . '-content .potter-post-style-boxed.stretched .potter-post-image-wrapper {';

                if ($boxed_padding_left_tablet) {
                    echo sprintf('margin-left: -%s;', esc_attr($boxed_padding_left_tablet) . 'px');
                }

                if ($boxed_padding_right_tablet) {
                    echo sprintf('margin-right: -%s;', esc_attr($boxed_padding_right_tablet) . 'px');
                }

                echo '}';

                echo '.potter-' . $archive . '-content .potter-post-style-boxed.stretched .article-header > .potter-post-image-wrapper:first-child {';

                if ($boxed_padding_top_tablet) {
                    echo sprintf('margin-top: -%s;', esc_attr($boxed_padding_top_tablet) . 'px');
                    echo sprintf('margin-bottom: %s;', esc_attr($boxed_padding_top_tablet) . 'px');
                }

                echo '}';
            }

            echo '}';
        }

        if ($boxed_padding_top_mobile || $boxed_padding_right_mobile || $boxed_padding_bottom_mobile || $boxed_padding_left_mobile) {
            echo '@media screen and (max-width: ' . esc_attr($breakpoint_mobile) . 'px) {';

            echo '.potter-' . $archive . '-content .potter-post-style-boxed {';

            if ($boxed_padding_top_mobile) {
                echo sprintf('padding-top: %s;', esc_attr($boxed_padding_top_mobile) . 'px !important');
            }

            if ($boxed_padding_right_mobile) {
                echo sprintf('padding-right: %s;', esc_attr($boxed_padding_right_mobile) . 'px !important');
            }

            if ($boxed_padding_bottom_mobile) {
                echo sprintf('padding-bottom: %s;', esc_attr($boxed_padding_bottom_mobile) . 'px !important');
            }

            if ($boxed_padding_left_mobile) {
                echo sprintf('padding-left: %s;', esc_attr($boxed_padding_left_mobile) . 'px !important');
            }

            echo '}';

            if ($stretched && 'beside' !== $layout) {
                echo '.potter-' . $archive . '-content .potter-post-style-boxed.stretched .potter-post-image-wrapper {';

                if ($boxed_padding_left_mobile) {
                    echo sprintf('margin-left: -%s;', esc_attr($boxed_padding_left_mobile) . 'px');
                }

                if ($boxed_padding_right_mobile) {
                    echo sprintf('margin-right: -%s;', esc_attr($boxed_padding_right_mobile) . 'px');
                }

                echo '}';

                echo '.potter-' . $archive . '-content  .potter-post-style-boxed.stretched .article-header > .potter-post-image-wrapper:first-child {';

                if ($boxed_padding_top_mobile) {
                    echo sprintf('margin-top: -%s;', esc_attr($boxed_padding_top_mobile) . 'px');
                    echo sprintf('margin-bottom: %s;', esc_attr($boxed_padding_top_mobile) . 'px');
                }

                echo '}';
            }

            echo '}';
        }
    }

    // Beside
    if ('beside' === $layout) {
        $image_width     = get_theme_mod($archive . '_post_image_width');
        $image_alignment = get_theme_mod($archive . '_post_image_alignment', 'left');

        if ($image_width && '40' !== $image_width) {
            echo '@media (min-width: ' . esc_attr($breakpoint_desktop + 1) . 'px) {';

            echo '.potter-' . $archive . '-content .potter-blog-layout-beside .potter-large-2-5 {';
            echo sprintf('width: %s;', esc_attr($image_width) . '%');
            echo '}';

            echo '.potter-' . $archive . '-content .potter-blog-layout-beside .potter-large-3-5 {';
            echo sprintf('width: %s;', 100 - esc_attr($image_width) . '%');
            echo '}';

            echo '}';
        }

        if ($image_alignment) {
            echo '.potter-' . $archive . '-content .potter-blog-layout-beside .potter-grid {';

            if ('left' === $image_alignment) {
                echo 'flex-direction: row;';
            }

            if ('right' === $image_alignment) {
                echo 'flex-direction: row-reverse;';
            }

            echo '}';
        }
    }
}

/* Single */

$singles = apply_filters('potter_singles', array( 'single' ));

foreach ($singles as $single) {
    $custom_width = get_theme_mod($single . '_custom_width');
    $style        = get_theme_mod($single . '_post_style');
    $title_size   = get_theme_mod($single . '_post_title_size');
    $font_size    = get_theme_mod($single . '_post_font_size');
    // $content_alignment = get_theme_mod( $single . '_post_content_alignment', 'left' );

    if ($custom_width) {
        $pt = 'single' === $single ? 'post' : $single;

        echo '.single-' . $pt . ' #inner-content {';
        echo sprintf('max-width: %s;', esc_attr($custom_width));
        echo '}';
    }

    // General Layout Settings
    // if( $content_alignment ) {

    // 	echo '.potter-' . $single . '-content .potter-post {';
    // 	echo sprintf( 'text-align: %s;', esc_attr( $content_alignment ) );
    // 	echo '}';

    // }

    if ($title_size) {
        $suffix = is_numeric($title_size) ? 'px' : '';

        echo '.potter-' . $single . '-content .potter-post .entry-title {';
        echo sprintf('font-size: %s;', esc_attr($title_size) . $suffix);
        echo '}';
    }

    if ($font_size) {
        $suffix = is_numeric($font_size) ? 'px' : '';

        echo '.potter-' . $single . '-content .potter-post .entry-content {';
        echo sprintf('font-size: %s;', esc_attr($font_size) . $suffix);
        echo '}';
    }

    // Boxed
    if ('boxed' === $style) {
        $background_color = get_theme_mod($single . '_post_background_color');

        if ($background_color) {
            echo '.potter-' . $single . '-content .potter-post-style-boxed .potter-article-wrapper, .potter-' . $single . '-content .potter-post-style-boxed #respond, .potter-' . $single . '-content .potter-post-style-boxed .commentlist {';
            echo sprintf('background: %s;', esc_attr($background_color));
            echo '}';
        }

        $stretched                    = get_theme_mod($single . '_boxed_image_stretched', false);
        $boxed_padding_top_desktop    = get_theme_mod($single . '_boxed_padding_top_desktop');
        $boxed_padding_right_desktop  = get_theme_mod($single . '_boxed_padding_right_desktop');
        $boxed_padding_bottom_desktop = get_theme_mod($single . '_boxed_padding_bottom_desktop');
        $boxed_padding_left_desktop   = get_theme_mod($single . '_boxed_padding_left_desktop');
        $boxed_padding_top_tablet     = get_theme_mod($single . '_boxed_padding_top_tablet');
        $boxed_padding_right_tablet   = get_theme_mod($single . '_boxed_padding_right_tablet');
        $boxed_padding_bottom_tablet  = get_theme_mod($single . '_boxed_padding_bottom_tablet');
        $boxed_padding_left_tablet    = get_theme_mod($single . '_boxed_padding_left_tablet');
        $boxed_padding_top_mobile     = get_theme_mod($single . '_boxed_padding_top_mobile');
        $boxed_padding_right_mobile   = get_theme_mod($single . '_boxed_padding_right_mobile');
        $boxed_padding_bottom_mobile  = get_theme_mod($single . '_boxed_padding_bottom_mobile');
        $boxed_padding_left_mobile    = get_theme_mod($single . '_boxed_padding_left_mobile');

        if ($boxed_padding_top_desktop || $boxed_padding_right_desktop || $boxed_padding_bottom_desktop || $boxed_padding_left_desktop) {
            echo '.potter-' . $single . '-content .potter-post-style-boxed .potter-article-wrapper, .potter-' . $single . '-content .potter-post-style-boxed #respond, .potter-' . $single . '-content .potter-post-style-boxed .commentlist {';

            if ($boxed_padding_top_desktop) {
                echo sprintf('padding-top: %s;', esc_attr($boxed_padding_top_desktop) . 'px');
            }

            if ($boxed_padding_right_desktop) {
                echo sprintf('padding-right: %s;', esc_attr($boxed_padding_right_desktop) . 'px');
            }

            if ($boxed_padding_bottom_desktop) {
                echo sprintf('padding-bottom: %s;', esc_attr($boxed_padding_bottom_desktop) . 'px');
            }

            if ($boxed_padding_left_desktop) {
                echo sprintf('padding-left: %s;', esc_attr($boxed_padding_left_desktop) . 'px');
            }

            echo '}';

            if ($stretched) {
                echo '.potter-' . $single . '-content .potter-post-style-boxed.stretched .potter-post-image-wrapper {';

                if ($boxed_padding_left_desktop) {
                    echo sprintf('margin-left: -%s;', esc_attr($boxed_padding_left_desktop) . 'px');
                }

                if ($boxed_padding_right_desktop) {
                    echo sprintf('margin-right: -%s;', esc_attr($boxed_padding_right_desktop) . 'px');
                }

                echo '}';

                echo '.potter-' . $single . '-content .potter-post-style-boxed.stretched .article-header > .potter-post-image-wrapper:first-child {';

                if ($boxed_padding_top_desktop) {
                    echo sprintf('margin-top: -%s;', esc_attr($boxed_padding_top_desktop) . 'px');
                    echo sprintf('margin-bottom: %s;', esc_attr($boxed_padding_top_desktop) . 'px');
                }

                echo '}';
            }
        }

        if ($boxed_padding_top_tablet || $boxed_padding_right_tablet || $boxed_padding_bottom_tablet || $boxed_padding_left_tablet) {
            echo '@media screen and (max-width: ' . esc_attr($breakpoint_desktop) . 'px) {';

            echo '.potter-' . $single . '-content .potter-post-style-boxed .potter-article-wrapper, .potter-' . $single . '-content .potter-post-style-boxed #respond, .potter-' . $single . '-content .potter-post-style-boxed .commentlist {';

            if ($boxed_padding_top_tablet) {
                echo sprintf('padding-top: %s;', esc_attr($boxed_padding_top_tablet) . 'px');
            }

            if ($boxed_padding_right_tablet) {
                echo sprintf('padding-right: %s;', esc_attr($boxed_padding_right_tablet) . 'px');
            }

            if ($boxed_padding_bottom_tablet) {
                echo sprintf('padding-bottom: %s;', esc_attr($boxed_padding_bottom_tablet) . 'px');
            }

            if ($boxed_padding_left_tablet) {
                echo sprintf('padding-left: %s;', esc_attr($boxed_padding_left_tablet) . 'px');
            }

            echo '}';

            if ($stretched) {
                echo '.potter-' . $single . '-content .potter-post-style-boxed.stretched .potter-post-image-wrapper {';

                if ($boxed_padding_left_tablet) {
                    echo sprintf('margin-left: -%s;', esc_attr($boxed_padding_left_tablet) . 'px');
                }

                if ($boxed_padding_right_tablet) {
                    echo sprintf('margin-right: -%s;', esc_attr($boxed_padding_right_tablet) . 'px');
                }

                echo '}';

                echo '.potter-' . $single . '-content .potter-post-style-boxed.stretched .article-header > .potter-post-image-wrapper:first-child {';

                if ($boxed_padding_top_tablet) {
                    echo sprintf('margin-top: -%s;', esc_attr($boxed_padding_top_tablet) . 'px');
                    echo sprintf('margin-bottom: %s;', esc_attr($boxed_padding_top_tablet) . 'px');
                }

                echo '}';
            }

            echo '}';
        }

        if ($boxed_padding_top_mobile || $boxed_padding_right_mobile || $boxed_padding_bottom_mobile || $boxed_padding_left_mobile) {
            echo '@media screen and (max-width: ' . esc_attr($breakpoint_mobile) . 'px) {';

            echo '.potter-' . $single . '-content .potter-post-style-boxed .potter-article-wrapper, .potter-' . $single . '-content .potter-post-style-boxed #respond, .potter-' . $single . '-content .potter-post-style-boxed .commentlist {';

            if ($boxed_padding_top_mobile) {
                echo sprintf('padding-top: %s;', esc_attr($boxed_padding_top_mobile) . 'px');
            }

            if ($boxed_padding_right_mobile) {
                echo sprintf('padding-right: %s;', esc_attr($boxed_padding_right_mobile) . 'px');
            }

            if ($boxed_padding_bottom_mobile) {
                echo sprintf('padding-bottom: %s;', esc_attr($boxed_padding_bottom_mobile) . 'px');
            }

            if ($boxed_padding_left_mobile) {
                echo sprintf('padding-left: %s;', esc_attr($boxed_padding_left_mobile) . 'px');
            }

            echo '}';

            if ($stretched) {
                echo '.potter-' . $single . '-content .potter-post-style-boxed.stretched .potter-post-image-wrapper {';

                if ($boxed_padding_left_mobile) {
                    echo sprintf('margin-left: -%s;', esc_attr($boxed_padding_left_mobile) . 'px');
                }

                if ($boxed_padding_right_mobile) {
                    echo sprintf('margin-right: -%s;', esc_attr($boxed_padding_right_mobile) . 'px');
                }

                echo '}';

                echo '.potter-' . $single . '-content .potter-post-style-boxed.stretched .article-header > .potter-post-image-wrapper:first-child {';

                if ($boxed_padding_top_mobile) {
                    echo sprintf('margin-top: -%s;', esc_attr($boxed_padding_top_mobile) . 'px');
                    echo sprintf('margin-bottom: %s;', esc_attr($boxed_padding_top_mobile) . 'px');
                }
                echo '}';
            }
            echo '}';
        }
    }
}

/* Header */
if ('menu-centered'===get_theme_mod('menu_position')) {
  $closednav = get_theme_mod('center_nav_layout', 'close');
  if ('streached' === $closednav) {
    echo '.potter-menu-centered .main-nav-left-menu nav {';
    echo sprintf('float: left !important;');
    echo '}';
    echo '.potter-menu-centered .main-nav-right-menu nav {';
    echo sprintf('float: right !important;');
    echo '}';
  } else {
    echo '.potter-menu-centered .main-nav-left-menu nav {';
    echo sprintf('float: right !important;');
    echo '}';
    echo '.potter-menu-centered .main-nav-right-menu nav {';
    echo sprintf('float: left !important;');
    echo '}';
  }
}
$remove_left_right_padding_nav = get_theme_mod('remove_left_right_padding');
if ($remove_left_right_padding_nav) {
  echo '.potter-navigation .potter-visible-large {';
  echo sprintf('padding-left: 0px !important;');
  echo sprintf('padding-right: 0px !important;');
  echo '}';
}

// Logo container.
$menu_logo_container_width        = get_theme_mod('menu_logo_container_width');
$mobile_menu_logo_container_width = get_theme_mod('mobile_menu_logo_container_width');

if ($menu_logo_container_width) {
    echo '.potter-navigation .potter-1-4 {';
    echo sprintf('width: %s;', esc_attr($menu_logo_container_width) . '%');
    echo '}';

    echo '.potter-navigation .potter-3-4 {';
    echo sprintf('width: %s;', 100 - esc_attr($menu_logo_container_width) . '%');
    echo '}';
}

if ($mobile_menu_logo_container_width) {
    echo '.potter-navigation .potter-2-3 {';
    echo sprintf('width: %s;', esc_attr($mobile_menu_logo_container_width) . '%');
    echo '}';

    echo '.potter-navigation .potter-1-3 {';
    echo sprintf('width: %s;', 100 - esc_attr($mobile_menu_logo_container_width) . '%');
    echo '}';
}
// Logo.
$custom_logo                 = get_theme_mod('custom_logo');
$menu_logo_font_toggle       = get_theme_mod('menu_logo_font_toggle');
$menu_logo_font_size_desktop = get_theme_mod('menu_logo_font_size_desktop');
$menu_logo_font_size_tablet  = get_theme_mod('menu_logo_font_size_tablet');
$menu_logo_font_size_mobile  = get_theme_mod('menu_logo_font_size_mobile');
$menu_logo_color             = get_theme_mod('menu_logo_color');
$menu_logo_font_family_value = get_theme_mod('menu_logo_font_family');
$menu_logo_color_alt         = get_theme_mod('menu_logo_color_alt');
$menu_logo_size              = get_theme_mod('menu_logo_size'); // Backwards compatibility.
$menu_mobile_logo_size       = get_theme_mod('menu_mobile_logo_size'); // Backwards compatibility.
$menu_logo_size_desktop      = get_theme_mod('menu_logo_size_desktop');
$menu_logo_size_tablet       = get_theme_mod('menu_logo_size_tablet');
$menu_logo_size_mobile       = get_theme_mod('menu_logo_size_mobile');

if (! $custom_logo) {
    if ($menu_logo_font_toggle && $menu_logo_font_family_value) {
        echo '.potter-logo a, .potter-mobile-logo a {';

        if (! empty($menu_logo_font_family_value['font-family'])) {
            echo sprintf('font-family: %s;', html_entity_decode(esc_attr($menu_logo_font_family_value['font-family']), ENT_QUOTES));
        }

        if (! empty($menu_logo_font_family_value['variant'])) {
            $menu_logo_font_family_font_weight = str_replace('italic', '', $menu_logo_font_family_value['variant']);
            $menu_logo_font_family_font_weight = (in_array($menu_logo_font_family_font_weight, array( '', 'regular' ))) ? '400' : $menu_logo_font_family_font_weight;

            $menu_logo_font_family_is_italic  = (false !== strpos($menu_logo_font_family_value['variant'], 'italic'));
            $menu_logo_font_family_font_style = $menu_logo_font_family_is_italic ? 'italic' : 'normal';

            echo sprintf('font-weight: %s;', esc_attr($menu_logo_font_family_font_weight));
            echo sprintf('font-style: %s;', esc_attr($menu_logo_font_family_font_style));
        }

        if (! empty($menu_logo_font_family_value['color'])) {
            echo sprintf('color: %s;', esc_attr($menu_logo_font_family_value['color']));
        }
        if (! empty($menu_logo_font_family_value['text-transform'])) {
            echo sprintf('text-transform: %s;', html_entity_decode(esc_attr($menu_logo_font_family_value['text-transform']), ENT_QUOTES));
        }

        echo '}';
    }

    if ($menu_logo_color) {
        echo '.potter-logo a, .potter-mobile-logo a {';
        echo sprintf('color: %s;', esc_attr($menu_logo_color));
        echo '}';
    }

    if ($menu_logo_color_alt) {
        echo '.potter-logo a:hover, .potter-mobile-logo a:hover {';
        echo sprintf('color: %s;', esc_attr($menu_logo_color_alt));
        echo '}';
    }

    if ($menu_logo_font_size_desktop) {
        echo '.potter-logo a, .potter-mobile-logo a {';
        echo sprintf('font-size: %s;', esc_attr($menu_logo_font_size_desktop));
        echo '}';
    }

    if ($menu_logo_font_size_tablet) {
        echo '@media screen and (max-width: ' . esc_attr($breakpoint_medium) . 'px) {';
        echo '.potter-logo a, .potter-mobile-logo a {';
        echo sprintf('font-size: %s;', esc_attr($menu_logo_font_size_tablet));
        echo '}';
        echo '}';
    }

    if ($menu_logo_font_size_mobile) {
        echo '@media screen and (max-width: ' . esc_attr($breakpoint_mobile) . 'px) {';
        echo '.potter-logo a, .potter-mobile-logo a {';
        echo sprintf('font-size: %s;', esc_attr($menu_logo_font_size_mobile));
        echo '}';
        echo '}';
    }
}
if ($custom_logo) {

    // Backwards compatibility.
    if ($menu_logo_size && ! $menu_logo_size_desktop) {
        echo '.potter-logo img {';
        echo sprintf('height: %s;', esc_attr($menu_logo_size) . 'px');
        echo '}';
    }

    // Backwards compatibility.
    if ($menu_mobile_logo_size && ! $menu_logo_size_tablet && ! $menu_logo_size_mobile) {
        echo '.potter-mobile-logo img {';
        echo sprintf('height: %s;', esc_attr($menu_mobile_logo_size) . 'px');
        echo '}';
    }

    if ($menu_logo_size_desktop) {
        $suffix = is_numeric($menu_logo_size_desktop) ? 'px' : '';

        echo '.potter-logo img, .potter-mobile-logo img {';
        echo sprintf('width: %s;', esc_attr($menu_logo_size_desktop) . $suffix);
        echo '}';
        echo '.logo-container-split {';
        echo sprintf('width: %s;', esc_attr($menu_logo_size_desktop) . $suffix);
        echo '}';
    }

    if ($menu_logo_size_tablet) {
        $suffix = is_numeric($menu_logo_size_tablet) ? 'px' : '';

        echo '@media screen and (max-width: ' . esc_attr($breakpoint_desktop) . 'px) {';
        echo '.potter-mobile-logo img {';
        echo sprintf('width: %s;', esc_attr($menu_logo_size_tablet) . $suffix);
        echo '}';
        echo '}';
    }

    if ($menu_logo_size_mobile) {
        $suffix = is_numeric($menu_logo_size_mobile) ? 'px' : '';
        echo '@media screen and (max-width: ' . esc_attr($breakpoint_mobile) . 'px) {';
        echo '.potter-mobile-logo img {';
        echo sprintf('width: %s;', esc_attr($menu_logo_size_mobile) . $suffix);
        echo '}';
        echo '}';
    }
}
// verticalmenu
$menu_position                   = get_theme_mod('menu_position', 'menu-vertical');
$menu_top_bottom_padding        = get_theme_mod('menu_top_bottom_padding');
$vertical_nav_width        = get_theme_mod('vertical_nav_width');
$vertical_nav_top_padding        = get_theme_mod('vertical_nav_top_padding');
$vertical_nav_left_right_padding        = get_theme_mod('vertical_nav_left_right_padding');
$vertical_nav_position        = get_theme_mod('vertical_nav_position', 'left');
$vertical_nav_content_alignment        = get_theme_mod('vertical_nav_content_alignment', 'left');
if ('menu-vertical' === $menu_position) {
  echo '@media (min-width: 1025px) {';

    if ('left' !== $vertical_nav_content_alignment) {
        echo '.menu-vertical-container .potter-logo, .menu-vertical-container .potter-menu>.menu-item>a, .menu-vertical-container .potter-menu .menu-item ul li a, .potter-woo-menu-item, .menu-vertical-container .potter-menu {';
        echo sprintf('text-align: %s;', esc_attr($vertical_nav_content_alignment));
        echo '}';
    }

    if ($menu_top_bottom_padding) {
        echo '.menu-vertical .menu-item > a {';
        echo sprintf('padding-top: %s;', esc_attr($menu_top_bottom_padding) . 'px !important');
        echo sprintf('padding-bottom: %s;', esc_attr($menu_top_bottom_padding) . 'px !important');
        echo '}';
    }

        echo '.menu-vertical .potter-navigation {';
        if ($vertical_nav_width) {
        echo sprintf('width: %s !important;', esc_attr($vertical_nav_width));
        }
        if ($vertical_nav_top_padding) {
        echo sprintf('padding-top: %s !important;', esc_attr($vertical_nav_top_padding));
        }
        if ($vertical_nav_left_right_padding) {
        echo sprintf('padding-left: %s !important;', esc_attr($vertical_nav_left_right_padding));
        echo sprintf('padding-right: %s !important;', esc_attr($vertical_nav_left_right_padding));
        }

        echo '}';
        echo 'body.vertical-menuposition {';
        if ('left' === $vertical_nav_position) {
          if ($vertical_nav_width) {
          echo sprintf('padding-left: %s !important;', esc_attr($vertical_nav_width) );
          } else {
            echo sprintf('padding-left: 250px !important;');
          }
        }

        elseif ('right' === $vertical_nav_position) {
          if ($vertical_nav_width) {
          echo sprintf('padding-right: %s !important;', esc_attr($vertical_nav_width));
        } else {
          echo sprintf('padding-right: 250px !important;');
        }
          echo sprintf('padding-left: 0px !important;');
        }
        echo '}';

        if ('right' === $vertical_nav_position) {
          echo '.menu-vertical .potter-navigation {';
          echo sprintf('right: 0px !important;');
          echo sprintf('left: auto !important;');
          echo '}';
        }


        echo '}';
}



//menu Off canvas
$menu_position                   = get_theme_mod('menu_position', 'menu-off-canvas');
$off_canvas_menu_position                   = get_theme_mod('off_canvas_menu_position', 'left');
$off_canvas_menu_width                   = get_theme_mod('off_canvas_menu_width');
$off_canvas_background_color                   = get_theme_mod('off_canvas_background_color');
$off_canvas_menu_color                   = get_theme_mod('off_canvas_menu_color');
$off_canvas_menu_hover_color                   = get_theme_mod('off_canvas_menu_hover_color');
$off_canvas_menu_active_color                   = get_theme_mod('off_canvas_menu_active_color');
$off_canvas_close_button_color                   = get_theme_mod('off_canvas_close_button_color');
$off_canvas_menu_separator_color                   = get_theme_mod('off_canvas_menu_separator_color');
$off_canvas_menu_item_spacing                   = get_theme_mod('off_canvas_menu_item_spacing');
$off_canvas_menu_font_size                   = get_theme_mod('off_canvas_menu_font_size');
$off_canvas_padding                   = get_theme_mod('off_canvas_padding');
$off_canvas_overlay_color                  = get_theme_mod('off_canvas_overlay_color');

$burger_menu_color                   = get_theme_mod('burger_menu_color');
$burger_menu_hover_color                   = get_theme_mod('burger_menu_hover_color');
$burger_menu_background_color                  = get_theme_mod('burger_menu_background_color');
$burger_menu_background_hover_color                  = get_theme_mod('burger_menu_background_hover_color');
$burger_menu_border_radius                  = get_theme_mod('burger_menu_border_radius');
$burger_menu_size                  = get_theme_mod('burger_menu_size');
$burger_menu_padding                  = get_theme_mod('burger_menu_padding');
$menu_icon_size                 = get_theme_mod('menu_icon_size');
$canvas_content_alignment                = get_theme_mod('canvas_content_alignment');



if ('menu-off-canvas' === $menu_position) {
    echo '@media (min-width: 1025px){';
      if ('left' !== $canvas_content_alignment) {
          echo '.potter-menu-off-canvas .potter-menu>.menu-item>a, .potter-offcanvas-cta, .off-canvas-social-link {';
          echo sprintf('text-align: %s;', esc_attr($canvas_content_alignment));
          echo '}';
      }

    if ($menu_icon_size) {
      echo '.off-canvas-social-link a span {';
        echo sprintf('font-size: %spx;', esc_attr($menu_icon_size));
      echo '}';
    }

    echo '.potter-menu-overlay {';
    if ($off_canvas_overlay_color) {
        echo sprintf('background: %s;', esc_attr($off_canvas_overlay_color));
    }
    echo '}';
    if ($off_canvas_menu_font_size) {
        echo '.potter-menu-off-canvas ul.potter-menu a, .transparent-header .potter-menu-off-canvas ul.potter-menu a {';

        echo sprintf('font-size: %s;', esc_attr($off_canvas_menu_font_size) . 'px');
        echo '}';
    }
    if ($off_canvas_menu_hover_color) {
        echo '.potter-menu-off-canvas .potter-menu li a:hover, .transparent-header .potter-menu-off-canvas .potter-menu li a:hover {';

        echo sprintf('color: %s !important;', esc_attr($off_canvas_menu_hover_color));
        echo '}';
    }
    if ($off_canvas_menu_active_color) {
        echo '.potter-menu-off-canvas ul li.current-menu-item a, .transparent-header .potter-menu-off-canvas ul li.current-menu-item a {';

        echo sprintf('color: %s;', esc_attr($off_canvas_menu_active_color) . ' !important');
        echo '}';
    }

    echo '.potter-menu-off-canvas .potter-menu > li {';
    if ($off_canvas_menu_separator_color) {
        echo sprintf('border-bottom-color: %s;', esc_attr($off_canvas_menu_separator_color));
    }
    if ($off_canvas_menu_item_spacing) {
        echo sprintf('padding-top: %s;', esc_attr($off_canvas_menu_item_spacing) . 'px');
    }
    if ($off_canvas_menu_item_spacing) {
        echo sprintf('padding-bottom: %s;', esc_attr($off_canvas_menu_item_spacing) . 'px');
    }
    echo '}';

    if ($off_canvas_menu_color) {
        echo '.potter-menu-off-canvas .potter-menu li a, .transparent-header .potter-menu-off-canvas .potter-menu li a {';
        echo sprintf('color: %s !important;', esc_attr($off_canvas_menu_color));
        echo '}';
    }

    if ('left' === $off_canvas_menu_position) {
        echo '.potter-menu-off-canvas .potter-close {';
        echo sprintf('right: %s;', esc_attr('40px !important'));
        echo sprintf('left: %s;', esc_attr('auto !important'));
        echo '}';
        echo '.potter-menu-off-canvas.canvas-visible {';
        echo sprintf('left: 0px !important;');
        echo '}';
        echo '.potter-menu-off-canvas {';
        echo 'left: -100% !important;';
        echo '}';
    } elseif ('right' === $off_canvas_menu_position) {
        echo '.potter-menu-off-canvas.canvas-visible {';
        echo sprintf('right: 0px !important;');
        echo '}';
        echo '.potter-menu-off-canvas {';
        echo sprintf('right: -100% !important;');
        echo '}';
    } elseif ('fullscreen' === $off_canvas_menu_position) {
      echo '.potter-menu-off-canvas.fullscreen-container {';
        echo 'transform: translateX(50%);';
        echo 'right: 50% !important;';
        echo '}';
    }

    if ($off_canvas_overlay_color) {
        echo '.potter-menu-overlay {';
        echo sprintf('background: %s;', esc_attr($off_canvas_overlay_color));
        echo '}';
    }
    if ($off_canvas_close_button_color) {
        echo '.potter-menu-off-canvas .potter-close {';
        echo sprintf('color: %s;', esc_attr($off_canvas_close_button_color));
        echo '}';
    }
    echo '.potter-menu-off-canvas {';
    if ($off_canvas_menu_width) {
        echo sprintf('width: %s;', esc_attr($off_canvas_menu_width) . 'px');
    }
    if ($off_canvas_background_color) {
        echo sprintf('background: %s;', esc_attr($off_canvas_background_color));
    }
    if ($off_canvas_padding['padding-top']) {
        echo sprintf('padding-top: %s;', esc_attr($off_canvas_padding['padding-top']));
    }
    if ($off_canvas_padding['padding-bottom']) {
        echo sprintf('padding-bottom: %s;', esc_attr($off_canvas_padding['padding-bottom']));
    }
    if ($off_canvas_padding['padding-left']) {
        echo sprintf('padding-left: %s;', esc_attr($off_canvas_padding['padding-left']));
    }
    if ($off_canvas_padding['padding-right']) {
        echo sprintf('padding-right: %s;', esc_attr($off_canvas_padding['padding-right']));
    }
    echo '}';
    //burger menu setup

    echo '#potter-menu-toggle {';
    if ($burger_menu_color) {
        echo sprintf('color: %s;', esc_attr($burger_menu_color));
    }
    if ($burger_menu_background_color) {
        echo sprintf('background: %s;', esc_attr($burger_menu_background_color));
    }
    if ($burger_menu_size) {
        echo sprintf('font-size: %s;', esc_attr($burger_menu_size) . 'px');
    }
    if ($burger_menu_border_radius) {
        echo sprintf('border-radius: %s;', esc_attr($burger_menu_border_radius) . 'px');
    }
    if ($burger_menu_padding) {
        echo sprintf('padding: %s;', esc_attr($burger_menu_padding) . 'px');
    }
    echo '}';
    echo '#potter-menu-toggle:hover {';
    if ($burger_menu_hover_color) {
        echo sprintf('color: %s;', esc_attr($burger_menu_hover_color));
    }
    if ($burger_menu_background_hover_color) {
        echo sprintf('background: %s;', esc_attr($burger_menu_background_hover_color));
    }
    echo '}';
    echo '}';
}


// HTML-button.
$menu_html_button                   = get_theme_mod('menu_html_button');
$nav_button_bg_color            = get_theme_mod('nav_button_bg_color');
$nav_button_bg_hover_color = get_theme_mod('nav_button_bg_hover_color');
$nav_button_font_color  = get_theme_mod('nav_button_font_color');
$nav_button_font_color_alt  = get_theme_mod('nav_button_font_color_alt');
$nav_button_border_width             = get_theme_mod('nav_button_border_width');
$nav_button_border_radius = get_theme_mod('nav_button_border_radius');
$nav_button_border_color             = get_theme_mod('nav_button_border_color');
$nav_button_border_color_alt = get_theme_mod('nav_button_border_color_alt');
$nav_button_height = get_theme_mod('nav_button_height');
$nav_button_width = get_theme_mod('nav_button_width');

$nav_button_trans_bg_color            = get_theme_mod('nav_button_trans_bg_color');
$nav_button_trans_bg_hover_color = get_theme_mod('nav_button_trans_bg_hover_color');
$nav_button_trans_font_color  = get_theme_mod('nav_button_trans_font_color');
$nav_button_trans_font_color_alt  = get_theme_mod('nav_button_trans_font_color_alt');
$nav_button_trans_border_width             = get_theme_mod('nav_button_trans_border_width');
$nav_button_trans_border_radius = get_theme_mod('nav_button_trans_border_radius');
$nav_button_trans_border_color             = get_theme_mod('nav_button_trans_border_color');
$nav_button_trans_border_color_alt = get_theme_mod('nav_button_trans_border_color_alt');

if ($menu_html_button) {
    echo '.potter-menu .potter-menu-item-button a, .potter-offcanvas-cta.potter-menu-item-button a {';
    if ($nav_button_height) {
        echo sprintf('padding-top: %spx;', esc_attr($nav_button_height));
        echo sprintf('padding-bottom: %spx;', esc_attr($nav_button_height));
    }
    if ($nav_button_bg_color) {
        echo sprintf('background: %s;', esc_attr($nav_button_bg_color));
    }
    if ($nav_button_font_color) {
        echo sprintf('color: %s;', esc_attr($nav_button_font_color) . ' !important');
    }
    if ($nav_button_border_width) {
        echo sprintf('border-width: %s;', esc_attr($nav_button_border_width) . 'px');
        echo sprintf('border-style: solid;');
    }
    if ($nav_button_border_color) {
        echo sprintf('border-color: %s;', esc_attr($nav_button_border_color));
    }

    if ($nav_button_width) {
        echo sprintf('padding-left: %spx;', esc_attr($nav_button_width));
        echo sprintf('padding-right: %spx;', esc_attr($nav_button_width));
    }

    if ($nav_button_border_radius) {
        echo sprintf('border-radius: %s;', esc_attr($nav_button_border_radius) . 'px');
    }
    if ($nav_button_border_radius) {
        echo sprintf('border-radius: %s;', esc_attr($nav_button_border_radius) . 'px');
    }
    echo '}';
    echo '.potter-menu .potter-menu-item-button a:hover, .potter-offcanvas-cta.potter-menu-item-button a:hover {';
    if ($nav_button_bg_hover_color) {
        echo sprintf('background: %s;', esc_attr($nav_button_bg_hover_color));
    }
    if ($nav_button_font_color_alt) {
        echo sprintf('color: %s;', esc_attr($nav_button_font_color_alt) . ' !important');
    }

    echo '}';

    echo '.transparent-header .potter-menu .potter-menu-item-button a {';
    if ($nav_button_trans_bg_color) {
        echo sprintf('background: %s;', esc_attr($nav_button_trans_bg_color));
    }
    if ($nav_button_trans_font_color) {
        echo sprintf('color: %s;', esc_attr($nav_button_trans_font_color) . ' !important');
    }
    if ($nav_button_trans_border_width) {
        echo sprintf('border-width: %s;', esc_attr($nav_button_trans_border_width) . 'px');
        echo sprintf('border-style: solid;');
    }
    if ($nav_button_trans_border_color) {
        echo sprintf('border-color: %s;', esc_attr($nav_button_trans_border_color));
    }

    if ($nav_button_trans_border_radius) {
        echo sprintf('border-radius: %s;', esc_attr($nav_button_trans_border_radius) . 'px');
    }
    echo '}';
    echo '.transparent-header .potter-menu .potter-menu-item-button a:hover {';
    if ($nav_button_trans_bg_hover_color) {
        echo sprintf('background: %s;', esc_attr($nav_button_trans_bg_hover_color));
    }
    if ($nav_button_trans_font_color_alt) {
        echo sprintf('color: %s;', esc_attr($nav_button_trans_font_color_alt) . ' !important');
    }
    if ($nav_button_trans_border_color_alt) {
        echo sprintf('border-color: %s;', esc_attr($nav_button_trans_border_color_alt));
    }
    echo '}';
}



// Tagline.
$menu_logo_description                   = get_theme_mod('menu_logo_description');
$menu_logo_description_toggle            = get_theme_mod('menu_logo_description_toggle');
$menu_logo_description_font_size_desktop = get_theme_mod('menu_logo_description_font_size_desktop');
$menu_logo_description_font_size_tablet  = get_theme_mod('menu_logo_description_font_size_tablet');
$menu_logo_description_font_size_mobile  = get_theme_mod('menu_logo_description_font_size_mobile');
$menu_logo_description_color             = get_theme_mod('menu_logo_description_color');
$menu_logo_description_font_family_value = get_theme_mod('menu_logo_description_font_family');

if (! $custom_logo && $menu_logo_description) {
    if ($menu_logo_description_toggle && $menu_logo_description_font_family_value) {
        echo '.potter-tagline {';

        if (! empty($menu_logo_description_font_family_value['font-family'])) {
            echo sprintf('font-family: %s;', html_entity_decode(esc_attr($menu_logo_description_font_family_value['font-family']), ENT_QUOTES));
        }

        if (! empty($menu_logo_description_font_family_value['variant'])) {
            $menu_logo_description_font_family_font_weight = str_replace('italic', '', $menu_logo_description_font_family_value['variant']);
            $menu_logo_description_font_family_font_weight = (in_array($menu_logo_description_font_family_font_weight, array( '', 'regular' ))) ? '400' : $menu_logo_description_font_family_font_weight;

            $menu_logo__description_font_family_is_italic = (false !== strpos($menu_logo_description_font_family_value['variant'], 'italic'));
            $menu_logo_description_font_family_font_style = $menu_logo__description_font_family_is_italic ? 'italic' : 'normal';

            echo sprintf('font-weight: %s;', esc_attr($menu_logo_description_font_family_font_weight));
            echo sprintf('font-style: %s;', esc_attr($menu_logo_description_font_family_font_style));
        }
        if (! empty($menu_logo_description_font_family_value['text-transform'])) {
            echo sprintf('text-transform: %s;', html_entity_decode(esc_attr($menu_logo_description_font_family_value['text-transform']), ENT_QUOTES));
        }

        echo '}';
    }

    if ($menu_logo_description_color) {
        echo '.potter-tagline {';
        echo sprintf('color: %s;', esc_attr($menu_logo_description_color));
        echo '}';
    }

    if ($menu_logo_description_font_size_desktop) {
        echo '.potter-tagline {';
        echo sprintf('font-size: %s;', esc_attr($menu_logo_description_font_size_desktop));
        echo '}';
    }

    if ($menu_logo_description_font_size_tablet) {
        echo '@media screen and (max-width: ' . esc_attr($breakpoint_medium) . 'px) {';
        echo '.potter-tagline {';
        echo sprintf('font-size: %s;', esc_attr($menu_logo_description_font_size_tablet));
        echo '}';
        echo '}';
    }

    if ($menu_logo_description_font_size_mobile) {
        echo '@media screen and (max-width: ' . esc_attr($breakpoint_mobile) . 'px) {';
        echo '.potter-tagline {';
        echo sprintf('font-size: %s;', esc_attr($menu_logo_description_font_size_mobile));
        echo '}';
        echo '}';
    }
}

// Navigation.
$menu_position       = get_theme_mod('menu_position');
$menu_width          = get_theme_mod('menu_width');
$menu_height         = get_theme_mod('menu_height');
$menu_padding        = get_theme_mod('menu_padding');
$menu_top_bottom_padding        = get_theme_mod('menu_top_bottom_padding');
$menu_bg_color       = get_theme_mod('menu_bg_color');
$menu_font_color     = get_theme_mod('menu_font_color');
$menu_font_color_alt = get_theme_mod('menu_font_color_alt');
$menu_font_color_active = get_theme_mod('menu_font_color_active');
$sticky_menu_bg_color       = get_theme_mod('sticky_menu_bg_color');
$sickynav_bar_box_shadow       = get_theme_mod('sickynav_bar_box_shadow');
$sticky_menu_font_color     = get_theme_mod('sticky_menu_font_color');
$sticky_menu_font_color_alt = get_theme_mod('sticky_menu_font_color_alt');
$sticky_navbar = get_theme_mod('sticky_navbar');
$transparent_header = get_theme_mod('transparent_header');
$transparent_header_color     = get_theme_mod('transparent_header_color');
$transparent_header_hover_color = get_theme_mod('transparent_header_hover_color');
$transparent_header_active_color = get_theme_mod('transparent_header_active_color');
$trans_navbar_bottom_border = get_theme_mod('trans_navbar_bottom_border');
$transparent_header_bottom_border_color = get_theme_mod('transparent_header_bottom_border_color');

$transparent_header_bg_color = get_theme_mod('transparent_header_bg_color');

$menu_sticky_logo  = get_theme_mod('menu_sticky_logo');
$nav_bar_border_top        = get_theme_mod('nav_bar_border_top');
$nav_bar_border_top_width        = get_theme_mod('nav_bar_border_top_width');
$nav_bar_top_border_color        = get_theme_mod('nav_bar_top_border_color');
$nav_bar_border_bottom_width        = get_theme_mod('nav_bar_border_bottom_width');
$nav_bar_bottom_border_color        = get_theme_mod('nav_bar_bottom_border_color');
$nav_bar_box_shadow_none        = get_theme_mod('nav_bar_box_shadow_none');
$sticky_nav_height        = get_theme_mod('sticky_nav_height');
$sticky_nav_width        = get_theme_mod('sticky_nav_width');

$sticky_nav_icon_link_color        = get_theme_mod('sticky_nav_icon_link_color');
$sticky_nav_icon_link_color_hover        = get_theme_mod('sticky_nav_icon_link_color_hover');

$nav_button_sticky_bg_color            = get_theme_mod('nav_button_sticky_bg_color');
$nav_button_sticky_bg_hover_color = get_theme_mod('nav_button_sticky_bg_hover_color');
$nav_button_sticky_font_color  = get_theme_mod('nav_button_sticky_font_color');
$nav_button_sticky_font_color_alt  = get_theme_mod('nav_button_sticky_font_color_alt');
$nav_button_sticky_border_width             = get_theme_mod('nav_button_sticky_border_width');
$nav_button_sticky_border_radius = get_theme_mod('nav_button_sticky_border_radius');
$nav_button_sticky_border_color             = get_theme_mod('nav_button_sticky_border_color');
$nav_button_sticky_border_color_alt = get_theme_mod('nav_button_sticky_border_color_alt');
$logo_bar_top_bottom_padding              = get_theme_mod('logo_bar_top_bottom_padding');
$logo_bar_bg_color              = get_theme_mod('logo_bar_bg_color');
$logo_bar_overlay_color             = get_theme_mod('logo_bar_overlay_color');
$logo_bar_bg_image              = get_theme_mod('logo_bar_bg_image');
$logo_bar_bg_image_size              = get_theme_mod('logo_bar_bg_image_size');
$logo_bar_bg_image_position              = get_theme_mod('logo_bar_bg_image_position');
$logo_bar_bg_image_repeat              = get_theme_mod('logo_bar_bg_image_repeat');
$logo_bar_top_bottom_padding_sticky              = get_theme_mod('logo_bar_top_bottom_padding_sticky');

if ('menu-stacked' === $menu_position) {
  echo '.transparent-header .potter-logo {';
    echo sprintf('background: none !important;', esc_attr($logo_bar_bg_color));
  echo '}';
  echo '.potter-nav-wrapper {';
    echo sprintf('padding-top: 0px !important;');
  echo '}';
  if ($logo_bar_bg_color) {
    echo '.potter-menu-stacked .potter-logo {';
    echo sprintf('background-color: %s;', esc_attr($logo_bar_bg_color));
    echo '}';
  }

  if ($logo_bar_top_bottom_padding) {
    echo '.potter-menu-stacked .potter-logo {';
    echo sprintf('padding-top: %spx;', esc_attr($logo_bar_top_bottom_padding));
    echo sprintf('padding-bottom: %spx;', esc_attr($logo_bar_top_bottom_padding));
    echo '}';
  }
  if ($logo_bar_bg_image) {
    echo '.potter-menu-stacked .potter-logo {';
    echo sprintf('background-image: url(%s);', esc_attr($logo_bar_bg_image));
    echo sprintf('position: relative;');
      if ($logo_bar_bg_image_size) {
      echo sprintf('background-size: %s;', esc_attr($logo_bar_bg_image_size));
    } else {
      echo sprintf('background-size: auto;');
    }
    if ($logo_bar_bg_image_position) {
    echo sprintf('background-position: %s;', esc_attr($logo_bar_bg_image_position));
  } else {
    echo sprintf('background-position: center center;');
  }
        if ($logo_bar_bg_image_repeat) {
          echo sprintf('background-repeat: %s;', esc_attr($logo_bar_bg_image_repeat));
        } else {
          echo sprintf('background-repeat: repeat;');
        }
    echo '}';
  }
  if ($logo_bar_overlay_color) {
    echo '.potter-menu-stacked .potter-logo:before {';
      echo sprintf('background-color: %s;', esc_attr($logo_bar_overlay_color));
    echo '}';
    echo '.transparent-header .potter-menu-stacked .potter-logo:before {';
      echo sprintf('background: none;');
    echo '}';
  }
}


if ($menu_sticky_logo) {
    echo '.hide-on-sticky {';
    echo sprintf('display: none !important;');
    echo '}';
}
echo '@media (min-width: 1025px) {';
  if ($transparent_header) {

    if ($transparent_header_bg_color) {
        echo '.regular-header-style .transparent-header {';
        echo sprintf('background-color: %s !important;', esc_attr($transparent_header_bg_color));
        echo '}';
    }
      if ($transparent_header_color) {
          echo '.transparent-header .potter-menu > .menu-item > a, .transparent-header .potter-inner-pre-header a, .transparent-header .potter-woo-menu-item a, .transparent-header .potter-menu-item-search a {';
          echo sprintf('color: %s !important;', esc_attr($transparent_header_color));
          echo '}';
      }

      if ($transparent_header_hover_color) {
          echo '.transparent-header .potter-menu > .menu-item > a:hover, .transparent-header .potter-inner-pre-header a:hover, .potter-woo-menu-item a:hover, .potter-menu-item-search a:hover {';
          echo sprintf('color: %s !important;', esc_attr($transparent_header_hover_color));
          echo '}';
      }
      if ($transparent_header_active_color) {
          echo '.transparent-header .potter-menu > .current-menu-item > a {';
          echo sprintf('color: %s;', esc_attr($transparent_header_active_color) . '!important');
          echo '}';
      }
      if ($trans_navbar_bottom_border) {
          echo '.transparent-header .potter-nav-wrapper {';
          echo sprintf('border-bottom: %spx solid;', esc_attr($trans_navbar_bottom_border));
          echo '}';
      }
      if ($transparent_header_bottom_border_color) {
          echo '.transparent-header .potter-nav-wrapper {';
          echo sprintf('border-bottom-color: %s;', esc_attr($transparent_header_bottom_border_color) . '!important');
          echo '}';
      } else {
          echo '.transparent-header .potter-nav-wrapper {';
          echo sprintf('border-bottom-color: #ccc;');
          echo '}';
      }
  }
    if ($sticky_menu_bg_color) {
        echo '.potter-navigation.stickynav {';
        echo sprintf('background-color: %s;', esc_attr($sticky_menu_bg_color) . '!important');
        echo '}';
    }
    if ($sickynav_bar_box_shadow) {
        echo '.potter-navigation.stickynav {';
        echo sprintf('box-shadow: 0 1px 3px rgba(0,0,0,.2);');
        echo sprintf('-webkit-box-shadow: 0 1px 3px rgba(0,0,0,.2);');
        echo '}';
    }
    if ($sticky_navbar) {
        echo '.potter-navigation.stickynav .potter-nav-wrapper {';
        if ($sticky_nav_height) {
            echo sprintf('padding-top: %s;', esc_attr($sticky_nav_height));
            echo sprintf('padding-bottom: %s;', esc_attr($sticky_nav_height));
        }
        if ($sticky_nav_width) {
            echo sprintf('max-width: %s;', esc_attr($sticky_nav_width));
        }
        echo '}';

        if ($sticky_nav_icon_link_color) {
          echo '.stickynav .potter-menu-item-icon a span {';
          echo sprintf('color: %s !important;', esc_attr($sticky_nav_icon_link_color));
          echo '}';
        }
        if ($sticky_nav_icon_link_color_hover) {
          echo '.stickynav .potter-menu-item-icon a:hover span {';
          echo sprintf('color: %s !important;', esc_attr($sticky_nav_icon_link_color_hover));
          echo '}';
        }

        echo '.stickynav .potter-menu .potter-menu-item-button a {';
        if ($nav_button_sticky_bg_color) {
            echo sprintf('background: %s;', esc_attr($nav_button_sticky_bg_color));
        }
        if ($nav_button_sticky_font_color) {
            echo sprintf('color: %s;', esc_attr($nav_button_sticky_font_color) . ' !important');
        }
        if ($nav_button_sticky_border_width) {
            echo sprintf('border-width: %s;', esc_attr($nav_button_sticky_border_width) . 'px');
            echo sprintf('border-style: solid;');
        }
        if ($nav_button_sticky_border_color) {
            echo sprintf('border-color: %s;', esc_attr($nav_button_sticky_border_color));
        }

        if ($nav_button_sticky_border_radius) {
            echo sprintf('border-radius: %spx !important;', esc_attr($nav_button_sticky_border_radius));
        }
        echo '}';
        echo '.stickynav .potter-menu .potter-menu-item-button a:hover {';
        if ($nav_button_sticky_bg_hover_color) {
            echo sprintf('background: %s;', esc_attr($nav_button_sticky_bg_hover_color));
        }
        if ($nav_button_sticky_font_color_alt) {
            echo sprintf('color: %s;', esc_attr($nav_button_sticky_font_color_alt) . ' !important');
        }
        if ($nav_button_sticky_border_color_alt) {
            echo sprintf('border-color: %s;', esc_attr($nav_button_sticky_border_color_alt));
        }
        echo '}';

    }
    if ($sticky_navbar && 'menu-stacked' === $menu_position) {
      echo '.potter-navigation.stickynav .potter-nav-wrapper {';
      if ($sticky_nav_height) {
          echo sprintf('padding-top: 0px;');
          echo sprintf('padding-bottom: 0px;');
      }
      echo '}';
      echo '.potter-navigation.stickynav .potter-nav-wrapper nav {';
      if ($sticky_nav_height) {
        echo sprintf('padding-top: %s;', esc_attr($sticky_nav_height));
        echo sprintf('padding-bottom: %s;', esc_attr($sticky_nav_height));
        echo sprintf('transition: .5s;');
      }
      echo '}';
      if ($logo_bar_top_bottom_padding_sticky) {
        echo '.potter-navigation.stickynav .potter-logo {';
        echo sprintf('padding-top: %spx;', esc_attr($logo_bar_top_bottom_padding_sticky));
        echo sprintf('padding-bottom: %spx;', esc_attr($logo_bar_top_bottom_padding_sticky));
        echo sprintf('transition: .5s;');
        echo '}';
      }
    }

    if ($sticky_menu_font_color) {
        echo '.potter-navigation.stickynav .potter-menu > .menu-item > a, .stickynav .potter-woo-menu-item a, .stickynav .potter-menu-item-search a {';
        echo sprintf('color: %s !important;', esc_attr($sticky_menu_font_color));
        echo '}';
    }
        if ($sticky_menu_font_color_alt) {
            echo '.potter-navigation.stickynav .potter-menu > .menu-item > a:hover, .stickynav .potter-woo-menu-item a:hover, .stickynav .potter-menu-item-search a:hover{';
            echo sprintf('color: %s !important;', esc_attr($sticky_menu_font_color_alt));
            echo '}';
        }
    echo '}';

if ($menu_width || $menu_height) {
    echo '.potter-nav-wrapper {';

    if ($menu_width) {
        echo sprintf('max-width: %s;', esc_attr($menu_width));
    }

    if ($menu_height) {
        echo sprintf('padding-top: %s;', esc_attr($menu_height));
        echo sprintf('padding-bottom: %s;', esc_attr($menu_height));
    }

    echo '}';
}

if ($menu_height && 'menu-stacked' === $menu_position) {
    echo '.potter-menu-stacked nav {';
    echo sprintf('padding-top: %s;', esc_attr($menu_height));
    echo '}';
} else {
  echo '.potter-menu-stacked nav {';
  echo sprintf('padding-top: 20px;');
  echo sprintf('padding-bottom: 20px;');
  echo '}';
}

if ($menu_padding) {
    echo '.potter-menu > .menu-item > a {';
    echo sprintf('padding-left: %s;', esc_attr($menu_padding) . 'px');
    echo sprintf('padding-right: %s;', esc_attr($menu_padding) . 'px');
    echo '}';

    if ('menu-centered' === $menu_position) {
        echo '.potter-menu-centered .logo-container-center-nav {';
        echo sprintf('padding: %s 0;', esc_attr($menu_height));
        echo '}';
    }
}
if ($menu_top_bottom_padding) {
    echo '.potter-menu > .menu-item > a {';
    echo sprintf('padding-top: %s;', esc_attr($menu_top_bottom_padding) . 'px');
    echo sprintf('padding-bottom: %s;', esc_attr($menu_top_bottom_padding) . 'px');
    echo '}';
}
    echo '.potter-navigation {';
        if ($nav_bar_border_top) {
            if ($nav_bar_border_top_width) {
                echo sprintf('border-top: %s;', esc_attr($nav_bar_border_top_width) . 'px' . ' solid ');
            }
            if ($nav_bar_top_border_color) {
                echo sprintf('border-top-color: %s;', esc_attr($nav_bar_top_border_color));
            }
        }

            if ($nav_bar_border_bottom_width) {
                echo sprintf('border-bottom: %s;', esc_attr($nav_bar_border_bottom_width) . ' solid ');
            }
            if ($nav_bar_bottom_border_color) {
                echo sprintf('border-bottom-color: %s;', esc_attr($nav_bar_bottom_border_color));
            }

            if ($menu_bg_color) {
                echo sprintf('background-color: %s;', esc_attr($menu_bg_color));
            }

            if ($nav_bar_box_shadow_none) {
                echo sprintf('box-shadow: 0px 3px 10px -9px rgba(0,0,0,0.75);');
            }
      echo '}';



if ($menu_font_color) {
    echo '.potter-menu > .menu-item > a, .potter-woo-menu-item a, .potter-menu-item-search a {';
    echo sprintf('color: %s;', esc_attr($menu_font_color));
    echo '}';
}

if ($menu_font_color_alt) {
    echo '.potter-menu > .menu-item > a:hover, .potter-woo-menu-item a:hover, .potter-menu-item-search a:hover {';
    echo sprintf('color: %s;', esc_attr($menu_font_color_alt));
    echo '}';

    echo '.potter-menu > .current-menu-item > a, .potter-mobile-menu > .current-menu-item > a {';
    echo sprintf('color: %s;', esc_attr($menu_font_color_alt) . ' !important');
    echo '}';
}

//menu item hover and active
$menu_item_hover_style         = get_theme_mod('menu_item_hover_style');
$menu_under_line_size         = get_theme_mod('menu_under_line_size');
$menu_under_line_color         = get_theme_mod('menu_under_line_color');
$menu_over_line_size         = get_theme_mod('menu_over_line_size');
$menu_over_line_color         = get_theme_mod('menu_over_line_color');
$menu_outer_line_size         = get_theme_mod('menu_outer_line_size');
$menu_outer_line_corner         = get_theme_mod('menu_outer_line_corner');
$menu_outer_line_color         = get_theme_mod('menu_outer_line_color');
$menu_background_corner         = get_theme_mod('menu_background_corner');
$menu_item_background_color         = get_theme_mod('menu_item_background_color');


if ('underline' === $menu_item_hover_style) {
    echo '.potter-menu > .menu-item {';
    echo sprintf('padding-left: %s;', esc_attr($menu_padding) . 'px');
    echo sprintf('padding-right: %s;', esc_attr($menu_padding) . 'px');
    echo '}';
    echo '.potter-menu > .menu-item > a {';
    echo sprintf('padding-left: 0px;');
    echo sprintf('padding-right: 0px;');
    echo sprintf('position: relative;');
    echo '}';
    echo '.potter-menu > .menu-item > a:before {';
    echo sprintf('content: "";');
    echo sprintf('bottom: 0px;');
    echo sprintf('position: absolute;');
    echo sprintf('left: 0px;');
    echo sprintf('opacity: 0;');
    echo sprintf('transition: 0.5s;');
    if ($menu_under_line_size) {
        echo sprintf('height: %spx;', esc_attr($menu_under_line_size));
    } else {
        echo sprintf('height: 1px;');
    }
    if ($menu_under_line_color) {
        echo sprintf('background: %s;', esc_attr($menu_under_line_color));
    } else {
        echo sprintf('background: #666;');
    }
    echo sprintf('left: 0px;');
    echo '}';
    echo '.potter-nav-wrapper .potter-menu > .menu-item > a:hover:before, .potter-nav-wrapper .potter-menu > .current-menu-item > a:before {';
    echo sprintf('opacity: 1;');
    echo sprintf('right: 0px;');
    echo '}';
}

if ('overline' === $menu_item_hover_style) {
    echo '.potter-menu > .menu-item {';
    echo sprintf('padding-left: %s;', esc_attr($menu_padding) . 'px');
    echo sprintf('padding-right: %s;', esc_attr($menu_padding) . 'px');
    echo '}';
    echo '.potter-menu > .menu-item > a {';
    echo sprintf('padding-left: 0px;');
    echo sprintf('padding-right: 0px;');
    echo sprintf('position: relative;');
    echo '}';
    echo '.potter-menu > .menu-item > a:before {';
    echo sprintf('content: "";');
    echo sprintf('top: 0px;');
    echo sprintf('position: absolute;');
    echo sprintf('left: 0px;');
    echo sprintf('right: 0px;');
    echo sprintf('opacity: 0;');
    echo sprintf('transition: 0.5s;');
    if ($menu_over_line_size) {
        echo sprintf('height: %spx;', esc_attr($menu_over_line_size));
    } else {
        echo sprintf('height: 1px;');
    }
    if ($menu_over_line_color) {
        echo sprintf('background: %s;', esc_attr($menu_over_line_color));
    } else {
        echo sprintf('background: #666;');
    }
    echo '}';
    echo '.potter-nav-wrapper .potter-menu > .menu-item > a:hover:before, .potter-nav-wrapper .potter-menu > .current-menu-item > a:before {';
    echo sprintf('opacity: 1;');
    echo '}';
}


if ('outliner' === $menu_item_hover_style) {
    echo '.potter-menu > .menu-item > a {';
    echo sprintf('position: relative;');
    echo '}';
    echo '.potter-menu > .menu-item > a:before {';
    echo sprintf('content: "";');
    echo sprintf('top: 0px;');
    echo sprintf('bottom: 0px;');
    echo sprintf('position: absolute;');
    echo sprintf('left: 0px;');
    echo sprintf('right: 0px;');
    echo sprintf('background: transparent;');
    echo sprintf('opacity: 0;');
    echo sprintf('transition: 0.5s;');
    if ($menu_outer_line_size) {
        echo sprintf('border: %spx solid;', esc_attr($menu_outer_line_size));
    } else {
        echo sprintf('border: 1px solid;');
    }
    if ($menu_outer_line_color) {
        echo sprintf('border-color: %s;', esc_attr($menu_outer_line_color));
    } else {
        echo sprintf('border-color: #666;');
    }
    if ($menu_outer_line_corner) {
        echo sprintf('border-radius: %spx;', esc_attr($menu_outer_line_corner));
    } else {
        echo sprintf('border-radius: 1px solid;');
    }
    echo '}';

    echo '.potter-nav-wrapper .potter-menu > .menu-item > a:hover:before, .potter-nav-wrapper .potter-menu > .current-menu-item > a:before {';
    echo sprintf('opacity: 1;');
    echo '}';
}

if ('background' === $menu_item_hover_style) {
    echo '.potter-menu > .menu-item > a {';
    echo sprintf('position: relative;');
    echo '}';
    echo '.potter-menu > .menu-item > a:before {';
    echo sprintf('content: "";');
    echo sprintf('top: 0px;');
    echo sprintf('bottom: 0px;');
    echo sprintf('position: absolute;');
    echo sprintf('left: 0px;');
    echo sprintf('right: 0px;');
    echo sprintf('display: block;');
    echo sprintf('z-index: -1;');
    echo sprintf('opacity: 0;');
    echo sprintf('transition: 0.5s;');
    if ($menu_item_background_color) {
        echo sprintf('background: %s;', esc_attr($menu_item_background_color));
    } else {
        echo sprintf('background: #666;');
    }
    if ($menu_background_corner) {
        echo sprintf('border-radius: %spx;', esc_attr($menu_background_corner));
    } else {
        echo sprintf('border-radius: 0px solid;');
    }
    echo '}';
    echo '.potter-nav-wrapper .potter-menu > .menu-item > a:hover:before, .potter-nav-wrapper .potter-menu > .current-menu-item > a:before {';
    echo sprintf('opacity: 1;');
    echo '}';
}
// search icon
$menu_search_icon = get_theme_mod('menu_search_icon');
$search_box_border_radius         = get_theme_mod('search_box_border_radius');
$search_icon_size         = get_theme_mod('search_icon_size');
$search_menu_item_icon_color        = get_theme_mod('search_menu_item_icon_color');
$search_menu_item_icon_sticky_color        = get_theme_mod('search_menu_item_icon_sticky_color');
$search_menu_item_icon_transparent_color        = get_theme_mod('search_menu_item_icon_transparent_color');
$search_input_background_color        = get_theme_mod('search_input_background_color');
$search_input_text_color    = get_theme_mod('search_input_text_color');
$search_input_text_border_color    = get_theme_mod('search_input_text_border_color');
$search_box_container_background_color    = get_theme_mod('search_box_container_background_color');
$search_box_overlay_background_color    = get_theme_mod('search_box_overlay_background_color');
$search_box_style = get_theme_mod('search_box_style', 'inline');
$search_box_overlay_close_btn_color = get_theme_mod('search_box_overlay_close_btn_color');

if ($menu_search_icon) {
echo '.potter-menu-item-search a i {';
if ($search_icon_size ) {
    echo sprintf('font-size: %spx;', esc_attr($search_icon_size ));
}
if ($search_menu_item_icon_color) {
    echo sprintf('color: %s;', esc_attr($search_menu_item_icon_color  ));
}
echo '}';
if ($search_menu_item_icon_sticky_color) {
  echo '.stickynav .potter-menu-item-search a i {';
  echo sprintf('color: %s !important;', esc_attr($search_menu_item_icon_sticky_color));
  echo '}';
}
if ($search_menu_item_icon_transparent_color) {
  echo '.transparent-header .potter-menu-item-search a i {';
  echo sprintf('color: %s;', esc_attr($search_menu_item_icon_transparent_color));
  echo '}';
}

//search box setting


if ($search_box_border_radius ) {
    echo '.potter-menu-item-search .potter-menu-search input[type=search], input[type="search"] {';
    echo sprintf('border-radius: %spx;', esc_attr($search_box_border_radius ));
    echo '}';
}
echo '.potter-menu-search input[type=search] {';
if ($search_input_background_color ) {
    echo sprintf('background: %s;', esc_attr($search_input_background_color));
}
if ($search_input_text_color ) {
    echo sprintf('color: %s;', esc_attr($search_input_text_color));
}
if ($search_input_text_border_color) {
    echo sprintf('border-color: %s !important;', esc_attr($search_input_text_border_color));
}
echo '}';
  if ('dropdown'===$search_box_style){
    if ($search_box_container_background_color ) {
    echo '.potter-menu-search.drop-down-search {';
      echo sprintf('background: %s !important;', esc_attr($search_box_container_background_color));
    echo '}';
  }
  }

  if ('fullscreen'===$search_box_style){
    if ($search_box_overlay_background_color ) {
    echo '.potter-menu-search.full-screen-search {';
      echo sprintf('background: %s !important;', esc_attr($search_box_overlay_background_color));
    echo '}';
  }

  if ($search_box_overlay_close_btn_color ) {
  echo '.potter-menu-search.full-screen-search .potter-close span {';
    echo sprintf('color: %s !important;', esc_attr($search_box_overlay_close_btn_color));
  echo '}';
}
  }

}

// Sub menu.
$sub_menu_bg_color         = get_theme_mod('sub_menu_bg_color');
$sub_menu_bg_color_alt     = get_theme_mod('sub_menu_bg_color_alt');
$sub_menu_width            = get_theme_mod('sub_menu_width');
$sub_menu_padding_top      = get_theme_mod('sub_menu_padding_top');
$sub_menu_padding_right    = get_theme_mod('sub_menu_padding_right');
$sub_menu_padding_bottom   = get_theme_mod('sub_menu_padding_bottom');
$sub_menu_padding_left     = get_theme_mod('sub_menu_padding_left');
$sub_menu_accent_color     = get_theme_mod('sub_menu_accent_color');
$sub_menu_font_size        = get_theme_mod('sub_menu_font_size');
$sub_menu_accent_color_alt = get_theme_mod('sub_menu_accent_color_alt');
$sub_menu_separator        = get_theme_mod('sub_menu_separator');
$sub_menu_separator_color  = get_theme_mod('sub_menu_separator_color');

if ($sub_menu_bg_color) {
    echo '.potter-sub-menu > .menu-item-has-children:not(.potter-mega-menu) .sub-menu li, .potter-sub-menu > .potter-mega-menu > .sub-menu {';
    echo sprintf('background-color: %s;', esc_attr($sub_menu_bg_color));
    echo '}';
}

if ($sub_menu_bg_color_alt) {
    echo '.potter-sub-menu > .menu-item-has-children:not(.potter-mega-menu) .sub-menu li:hover {';
    echo sprintf('background-color: %s;', esc_attr($sub_menu_bg_color_alt));
    echo '}';
}

if ($sub_menu_separator) {
    echo '.potter-sub-menu > .menu-item-has-children:not(.potter-mega-menu) li {';
    echo sprintf('border-bottom: %s;', esc_attr('1px solid #f5f5f7'));

    if ($sub_menu_separator_color) {
        echo sprintf('border-bottom-color: %s;', esc_attr($sub_menu_separator_color));
    }

    echo '}';

    echo '.potter-sub-menu > .menu-item-has-children:not(.potter-mega-menu) li:last-child {';
    echo 'border-bottom: none';
    echo '}';
}

if ($sub_menu_width) {
    echo '.potter-sub-menu > .menu-item-has-children:not(.potter-mega-menu) .sub-menu {';
    echo sprintf('width: %s;', esc_attr($sub_menu_width) . 'px');
    echo '}';
}

if ($sub_menu_padding_top || $sub_menu_padding_right || $sub_menu_padding_bottom || $sub_menu_padding_left) {
    echo '.potter-sub-menu > .menu-item-has-children:not(.potter-mega-menu) .sub-menu a {';

    if ($sub_menu_padding_top) {
        echo sprintf('padding-top: %s;', esc_attr($sub_menu_padding_top) . 'px');
    }

    if ($sub_menu_padding_right) {
        echo sprintf('padding-right: %s;', esc_attr($sub_menu_padding_right) . 'px');
    }

    if ($sub_menu_padding_bottom) {
        echo sprintf('padding-bottom: %s;', esc_attr($sub_menu_padding_bottom) . 'px');
    }

    if ($sub_menu_padding_left) {
        echo sprintf('padding-left: %s;', esc_attr($sub_menu_padding_left) . 'px');
    }

    echo '}';
}

if ($sub_menu_accent_color || $sub_menu_font_size) {
    echo '.potter-menu .sub-menu a {';

    if ($sub_menu_accent_color) {
        echo sprintf('color: %s;', esc_attr($sub_menu_accent_color));
    } else {
        echo sprintf('color: #333;');
    }

    if ($sub_menu_font_size) {
        $suffix = is_numeric($sub_menu_font_size) ? 'px' : '';
        echo sprintf('font-size: %s;', esc_attr($sub_menu_font_size) . $suffix);
    }

    echo '}';
}
if ($sub_menu_accent_color) {
    echo '.potter-menu .sub-menu a {';
    echo sprintf('color: %s;', esc_attr($sub_menu_accent_color));
    echo '}';
} else {
    echo '.potter-menu .sub-menu a {';
    echo sprintf('color: #333;');
    echo '}';
}
if ($sub_menu_accent_color_alt) {
    echo '.potter-menu .sub-menu a:hover {';
    echo sprintf('color: %s;', esc_attr($sub_menu_accent_color_alt));
    echo '}';
} else {
    echo '.potter-menu .sub-menu a:hover {';
    echo sprintf('color: #666;');
    echo '}';
}


// Mobile navigation.
$mobile_menu_height                  = get_theme_mod('mobile_menu_height');
$mobile_menu_background_color        = get_theme_mod('mobile_menu_background_color');
$mobile_menu_padding_top             = get_theme_mod('mobile_menu_padding_top');
$mobile_menu_padding_right           = get_theme_mod('mobile_menu_padding_right');
$mobile_menu_padding_bottom          = get_theme_mod('mobile_menu_padding_bottom');
$mobile_menu_padding_left            = get_theme_mod('mobile_menu_padding_left');
$mobile_menu_font_color              = get_theme_mod('mobile_menu_font_color');
$mobile_menu_font_color_alt          = get_theme_mod('mobile_menu_font_color_alt');
$mobile_menu_border_color            = get_theme_mod('mobile_menu_border_color');
$mobile_menu_options                 = get_theme_mod('mobile_menu_options', 'menu-mobile-hamburger');
$mobile_menu_hamburger_color         = get_theme_mod('mobile_menu_hamburger_color');
$mobile_menu_hamburger_size          = get_theme_mod('mobile_menu_hamburger_size');
$mobile_menu_hamburger_style         = get_theme_mod('mobile_menu_hamburger_style', 'default');
$mobile_menu_hamburger_border_radius = get_theme_mod('mobile_menu_hamburger_border_radius');
$mobile_menu_hamburger_bg_color      = get_theme_mod('mobile_menu_hamburger_bg_color');
$mobile_menu_bg_color                = get_theme_mod('mobile_menu_bg_color');
$mobile_menu_bg_color_alt            = get_theme_mod('mobile_menu_bg_color_alt');
$mobile_menu_submenu_arrow_color     = get_theme_mod('mobile_menu_submenu_arrow_color');
$mobile_menu_font_size               = get_theme_mod('mobile_menu_font_size');



if ($mobile_menu_height) {
    echo '.potter-mobile-nav-wrapper {';
    echo sprintf('padding-top: %s;', esc_attr($mobile_menu_height) . 'px');
    echo sprintf('padding-bottom: %s;', esc_attr($mobile_menu_height) . 'px');
    echo '}';
}

if ($mobile_menu_background_color) {
    echo '.potter-mobile-nav-wrapper {';
    echo sprintf('background: %s;', esc_attr($mobile_menu_background_color));
    echo '}';
}

if ($mobile_menu_padding_top || $mobile_menu_padding_right || $mobile_menu_padding_bottom || $mobile_menu_padding_left) {
    echo '.potter-mobile-menu a, .potter-mobile-menu .menu-item-has-children .potter-submenu-toggle {';

    if ($mobile_menu_padding_top) {
        echo sprintf('padding-top: %s;', esc_attr($mobile_menu_padding_top) . 'px');
    }

    if ($mobile_menu_padding_right) {
        echo sprintf('padding-right: %s;', esc_attr($mobile_menu_padding_right) . 'px');
    }

    if ($mobile_menu_padding_bottom) {
        echo sprintf('padding-bottom: %s;', esc_attr($mobile_menu_padding_bottom) . 'px');
    }

    if ($mobile_menu_padding_left) {
        echo sprintf('padding-left: %s;', esc_attr($mobile_menu_padding_left) . 'px');
    }

    echo '}';
}

if ($mobile_menu_font_color) {
    echo '.potter-mobile-menu a, .potter-mobile-menu-container .potter-close {';
    echo sprintf('color: %s;', esc_attr($mobile_menu_font_color));
    echo '}';
}

if ($mobile_menu_font_color_alt) {
    echo '.potter-mobile-menu a:hover {';
    echo sprintf('color: %s;', esc_attr($mobile_menu_font_color_alt));
    echo '}';

    echo '.potter-mobile-menu > .current-menu-item > a {';
    echo sprintf('color: %s;', esc_attr($mobile_menu_font_color_alt) . '!important');
    echo '}';
}

if ($mobile_menu_border_color) {
    echo '.potter-mobile-menu .menu-item {';
    echo sprintf('border-top-color: %s;', esc_attr($mobile_menu_border_color));
    echo '}';

    echo '.potter-mobile-menu > .menu-item:last-child {';
    echo sprintf('border-bottom-color: %s;', esc_attr($mobile_menu_border_color));
    echo '}';
}

if (in_array($mobile_menu_options, array( 'menu-mobile-hamburger', 'menu-mobile-off-canvas' ))) {
    if ($mobile_menu_hamburger_color || $mobile_menu_hamburger_size) {
        echo '.potter-mobile-nav-item {';

        if ($mobile_menu_hamburger_color) {
            echo sprintf('color: %s;', esc_attr($mobile_menu_hamburger_color));
        }

        if ($mobile_menu_hamburger_size) {
            echo sprintf('font-size: %s;', esc_attr($mobile_menu_hamburger_size) . 'px');
        }

        echo '}';

        if ($mobile_menu_hamburger_color) {
            echo '.potter-mobile-nav-item a {';
            echo sprintf('color: %s;', esc_attr($mobile_menu_hamburger_color));
            echo '}';
        }
    }

    if ('filled' === $mobile_menu_hamburger_style) {
        echo '.potter-mobile-menu-toggle {';

        if ($mobile_menu_hamburger_bg_color) {
            echo sprintf('background: %s;', esc_attr($mobile_menu_hamburger_bg_color));
        } elseif ($page_accent_color) {
            echo sprintf('background: %s;', esc_attr($page_accent_color));
        } else {
            echo 'background: #0056FF;';
        }

        echo 'color: #ffffff !important;';
        echo 'padding: 10px;';

        if ($mobile_menu_hamburger_border_radius) {
            echo sprintf('border-radius: %s;', esc_attr($mobile_menu_hamburger_border_radius) . 'px');
        }

        echo '}';
    }
}

if ($mobile_menu_bg_color) {
    echo '.potter-mobile-menu > .menu-item a {';
    echo sprintf('background-color: %s;', esc_attr($mobile_menu_bg_color));
    echo '}';
}

if ($mobile_menu_bg_color_alt) {
    echo '.potter-mobile-menu > .menu-item a:hover {';
    echo sprintf('background-color: %s;', esc_attr($mobile_menu_bg_color_alt));
    echo '}';
}

if ($mobile_menu_submenu_arrow_color) {
    echo '.potter-mobile-menu .potter-submenu-toggle {';
    echo sprintf('color: %s;', esc_attr($mobile_menu_submenu_arrow_color));
    echo '}';
}

if ($mobile_menu_font_size) {
    echo '.potter-mobile-menu {';
    echo sprintf('font-size: %s;', esc_attr($mobile_menu_font_size));
    echo '}';
}

$menu_font_size           = get_theme_mod('menu_font_size');
$menu_font_letter_spacing           = get_theme_mod('menu_font_letter_spacing');
if ($menu_font_size) {
    echo '.potter-menu > .menu-item > a {';
    echo sprintf('font-size: %s;', esc_attr($menu_font_size));
    echo '}';
}
if ($menu_font_letter_spacing) {
    echo '.potter-menu > .menu-item > a {';
    echo sprintf('letter-spacing: %spx;', esc_attr($menu_font_letter_spacing));
    echo '}';
}
//menu icons
$menu_icon_link           = get_theme_mod('menu_icon_link');
$menu_icon_size           = get_theme_mod('menu_icon_size');
if ($menu_icon_link) {
    echo '.potter-menu-item-icon {';
    if ($menu_icon_size) {
        echo sprintf('font-size: %spx;', esc_attr($menu_icon_size));
    }
    echo '}';
}



// Pre header.
$pre_header_layout           = get_theme_mod('pre_header_layout');
$pre_header_width            = get_theme_mod('pre_header_width');
$pre_header_height           = get_theme_mod('pre_header_height');
$pre_header_bg_color         = get_theme_mod('pre_header_bg_color');
$pre_header_font_color       = get_theme_mod('pre_header_font_color');
$pre_header_accent_color     = get_theme_mod('pre_header_accent_color');
$pre_header_accent_color_alt = get_theme_mod('pre_header_accent_color_alt');
$pre_header_font_size        = get_theme_mod('pre_header_font_size');
$top_header_border_top        = get_theme_mod('top_header_border_top');
$pre_header_border_top_width        = get_theme_mod('pre_header_border_top_width');
$pre_header_top_border_color        = get_theme_mod('pre_header_top_border_color');
$top_header_border_bottom        = get_theme_mod('top_header_border_bottom');
$pre_header_border_bottom_width        = get_theme_mod('pre_header_border_bottom_width');
$pre_header_bottom_border_color        = get_theme_mod('pre_header_bottom_border_color');

if ('none' !== $pre_header_layout && ($pre_header_height || $pre_header_width)) {
    echo '.potter-inner-pre-header {';

    if ($pre_header_height) {
        echo sprintf('padding-top: %s;', esc_attr($pre_header_height) . 'px');
        echo sprintf('padding-bottom: %s;', esc_attr($pre_header_height) . 'px');
    }

    if ($pre_header_width) {
        echo sprintf('max-width: %s;', esc_attr($pre_header_width));
    }

    echo '}';
}

if ('none' !== $pre_header_layout && ($pre_header_bg_color || $pre_header_font_color)) {
    echo '.potter-pre-header {';

    if ($pre_header_bg_color) {
        echo sprintf('background-color: %s !important;', esc_attr($pre_header_bg_color));
    }

    if ($pre_header_font_color) {
        echo sprintf('color: %s;', esc_attr($pre_header_font_color));
    }

    echo '}';
}

echo '.potter-pre-header {';
    if ($top_header_border_top) {
        if ($pre_header_border_top_width) {
            echo sprintf('border-top: %s;', esc_attr($pre_header_border_top_width) . 'px' . ' solid ');
        } else {
            echo sprintf('border-top: 5px solid;');
        }
        if ($pre_header_top_border_color) {
            echo sprintf('border-top-color: %s;', esc_attr($pre_header_top_border_color));
        }
    }

        if ($pre_header_border_bottom_width) {
            echo sprintf('border-bottom: %s !important;', esc_attr($pre_header_border_bottom_width) . 'px' . ' solid ');
        } else {
          echo sprintf('border-bottom: 0px solid #ececec;');
        }
        if ($pre_header_bottom_border_color) {
            echo sprintf('border-bottom-color: %s !important;', esc_attr($pre_header_bottom_border_color));
        }

echo '}';
if ('none' !== $pre_header_layout && $pre_header_accent_color) {
    echo '.potter-pre-header a, .potter-pre-header .potter-menu>.current-menu-item>a {';
    echo sprintf('color: %s;', esc_attr($pre_header_accent_color));
    echo '}';
}

if ('none' !== $pre_header_layout && $pre_header_accent_color_alt) {
    echo '.potter-pre-header a:hover, .potter-pre-header .potter-menu>.current-menu-item>a:hover {';
    echo sprintf('color: %s;', esc_attr($pre_header_accent_color_alt));
    echo '}';
}

if ('none' !== $pre_header_layout && $pre_header_font_size) {
    echo '.potter-pre-header, .potter-pre-header .potter-menu, .potter-pre-header .potter-menu .sub-menu a {';
    echo sprintf('font-size: %s;', esc_attr($pre_header_font_size));
    echo '}';
}

/* Footer */
$top_footer_width = get_theme_mod('top_footer_width');
$top_footer_height = get_theme_mod('top_footer_height');
$top_footer_bg_color = get_theme_mod('top_footer_bg_color');
$top_footer_font_color = get_theme_mod('top_footer_font_color');
$top_footer_accent_color = get_theme_mod('top_footer_accent_color');
$top_footer_accent_color_alt = get_theme_mod('top_footer_accent_color_alt');
$footer_layout           = get_theme_mod('footer_layout');
$footer_width            = get_theme_mod('footer_width');
$footer_height           = get_theme_mod('footer_height');
$footer_bg_color         = get_theme_mod('footer_bg_color');
$footer_font_color       = get_theme_mod('footer_font_color');
$footer_accent_color     = get_theme_mod('footer_accent_color');
$footer_accent_color_alt = get_theme_mod('footer_accent_color_alt');
$footer_font_size        = get_theme_mod('footer_font_size');
$bottom_footer_border		 = get_theme_mod('bottom_footer_border');
$bottom_footer_border_top_width		 = get_theme_mod('bottom_footer_border_top_width');
$bottom_footer_border_color = get_theme_mod('bottom_footer_border_color');
$top_footer_title_font_size = get_theme_mod('top_footer_title_font_size');
$top_footer_font_size = get_theme_mod('top_footer_font_size');
$footer_widget_content_alignment = get_theme_mod('footer_widget_content_alignment', 'left');


$footer_row_gap = get_theme_mod('footer_row_gap');

if ($footer_row_gap) {
    echo '.potter-inner-footer-left.potter-footer-center-aligned {';
    echo sprintf('padding-bottom: %s;', esc_attr($footer_row_gap) . 'px');
  echo '}';
}

if ('left' !== $footer_widget_content_alignment) {
    echo '.footer-widget-area .potter-container .widget * {';
    echo sprintf('text-align: %s;', esc_attr($footer_widget_content_alignment));
    echo '}';
}

if ('none' !== ($footer_height || $top_footer_width)) {
    echo '.footer-widget-area .potter-container {';

    if ($top_footer_height) {
        echo sprintf('padding-top: %s;', esc_attr($top_footer_height) . 'px');
        echo sprintf('padding-bottom: %s;', esc_attr($top_footer_height) . 'px');
    }

    if ($top_footer_width) {
        echo sprintf('max-width: %s;', esc_attr($top_footer_width));
    }

    echo '}';
}
echo '.footer-widget-area .potter-container h1, .footer-widget-area .potter-container h2, .footer-widget-area .potter-container h3, .footer-widget-area .potter-container h4, .footer-widget-area .potter-container h5, .footer-widget-area .potter-container h6 {';
        if ($top_footer_title_font_size) {
            echo sprintf('font-size: %s;', esc_attr($top_footer_title_font_size));
        }
echo '}';
echo '.footer-widget-area .potter-container p, .footer-widget-area .potter-container {';
        if ($top_footer_font_size) {
            echo sprintf('font-size: %s;', esc_attr($top_footer_font_size));
        }
echo '}';
if ($top_footer_bg_color) {
    echo '.footer-widget-area {';
    echo sprintf('background-color: %s;', esc_attr($top_footer_bg_color));
    echo '}';
}
if ($top_footer_font_color) {
    echo '.footer-widget-area .potter-container h1, .footer-widget-area .potter-container h2, .footer-widget-area .potter-container h3, .footer-widget-area .potter-container h4, .footer-widget-area .potter-container h5, .footer-widget-area .potter-container h6, .footer-widget-area p, .footer-widget-area ul li {';
    echo sprintf('color: %s;', esc_attr($top_footer_font_color));
    echo '}';
}
if ($top_footer_accent_color) {
    echo '.footer-widget-area .potter-container a {';
    echo sprintf('color: %s;', esc_attr($top_footer_accent_color));
    echo '}';
}

if ($top_footer_accent_color_alt) {
    echo '.footer-widget-area .potter-container * a:hover {';
    echo sprintf('color: %s;', esc_attr($top_footer_accent_color_alt));
    echo '}';
}

if ('none' !== $footer_layout && ($footer_height || $footer_width)) {
    echo '.bottom-footer .potter-inner-footer {';

    if ($footer_height) {
        echo sprintf('padding-top: %s;', esc_attr($footer_height) . 'px');
        echo sprintf('padding-bottom: %s;', esc_attr($footer_height) . 'px');
    }

    if ($footer_width) {
        echo sprintf('max-width: %s;', esc_attr($footer_width));
    }

    echo '}';
}

if ('none' !== $footer_layout && ($footer_bg_color || $footer_font_color)) {
    echo '.bottom-footer {';

    if ($footer_bg_color) {
        echo sprintf('background-color: %s;', esc_attr($footer_bg_color));
    }

    if ($footer_font_color) {
        echo sprintf('color: %s;', esc_attr($footer_font_color));
    }

    echo '}';
}

if ('none' !== $footer_layout && $footer_accent_color) {
    echo '.potter-page-footer a, .potter-page-footer .potter-menu > .menu-item > a {';
    echo sprintf('color: %s;', esc_attr($footer_accent_color));
    echo '}';
}

if ('none' !== $footer_layout && $footer_accent_color_alt) {
    echo '.potter-page-footer a:hover, .potter-page-footer .potter-menu > .menu-item > a:hover, .potter-page-footer .potter-menu > .current-menu-item > a {';
    echo sprintf('color: %s !important;', esc_attr($footer_accent_color_alt));
    echo '}';
}

if ('none' !== $footer_layout && $footer_font_size) {
    echo '.potter-page-footer, .potter-page-footer .potter-menu {';
    echo sprintf('font-size: %s;', esc_attr($footer_font_size));
    echo '}';
}

if ($bottom_footer_border) {
    echo '.bottom-footer .potter-inner-footer {';
    if ($bottom_footer_border_top_width) {
        echo sprintf('border-top: %s;', esc_attr($bottom_footer_border_top_width) . 'px' . ' solid ');
    } else {
        echo sprintf('border-top: 1px solid;');
    }
    if ($bottom_footer_border_color) {
        echo sprintf('border-top-color: %s;', esc_attr($bottom_footer_border_color));
    }
    echo '}';
}

do_action('potter_after_customizer_css');
