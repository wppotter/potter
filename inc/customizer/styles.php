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

/* Typography */

// Page font settings.
$page_font_toggle       = get_theme_mod('page_font_toggle');
$page_font_family_value = get_theme_mod('page_font_family');
$page_font_color        = get_theme_mod('page_font_color');
$page_font_line_height        = get_theme_mod('page_font_line_height');

$heading_font_color        = get_theme_mod('heading_font_color');
$heading_font_accent_color        = get_theme_mod('heading_font_accent_hover_color');
$heading_font_accent_hover_color        = get_theme_mod('heading_font_accent_color');

if ($page_font_line_height) {
  echo 'body, optgroup, textarea, h1, h2, h3, h4, h5, h6, ul li, ol {';
    echo sprintf('line-height: %s;', esc_attr($page_font_line_height));
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
  echo sprintf('font-size: %s;', esc_attr($col_one_icon_link_size) . 'px' );
  echo '}';
}
$col_one_icon_link_size_col2 = get_theme_mod('col_one_icon_link_size_col2');
$pre_header_column_two_layout = get_theme_mod('pre_header_column_two_layout');
if ($col_one_icon_link_size_col2 && $pre_header_column_two_layout) {
  echo '.potter-inner-pre-header .right-column.icon-links a{';
  echo sprintf('font-size: %s;', esc_attr($col_one_icon_link_size_col2) . 'px' );
  echo '}';
}

$icon_link_size_footer_col1 = get_theme_mod('icon_link_size_footer_col1');
$footer_column_one_layout = get_theme_mod('footer_column_one_layout');
if ($icon_link_size_footer_col1 && $footer_column_one_layout) {
  echo '.bottom-footer .left-column a{';
  echo sprintf('font-size: %s;', esc_attr($icon_link_size_footer_col1) . 'px' );
  echo '}';
}
$icon_link_size_footer_col2 = get_theme_mod('icon_link_size_footer_col2');
$footer_column_two_layout = get_theme_mod('footer_column_two_layout');
if ($icon_link_size_footer_col2 && $footer_column_two_layout) {
  echo '.bottom-footer .right-column a{';
  echo sprintf('font-size: %s;', esc_attr($icon_link_size_footer_col2) . 'px' );
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

    echo '.potter-sub-menu>.menu-item-has-children>.sub-menu {';
    echo sprintf('border-top: %s;', '2px solid ' . esc_attr($page_accent_color));
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

if ($button_border_width) {
    echo '.potter-button, input[type="submit"], .button {';

    echo sprintf('border-width: %s;', esc_attr($button_border_width) . 'px');
    echo 'border-style: solid;';

    if ($button_border_color) {
        echo sprintf('border-color: %s;', esc_attr($button_border_color));
    }

    echo '}';

    if ($button_border_color_alt) {
        echo '.potter-button:hover, input[type="submit"]:hover {';
        echo sprintf('border-color: %s;', esc_attr($button_border_color_alt) . ' !important');
        echo '}';
    }

    if ($button_primary_border_color) {
        echo '.potter-button-primary {';
        echo sprintf('border-color: %s;', esc_attr($button_primary_border_color));
        echo '}';
    }

    if ($button_primary_border_color_alt) {
        echo '.potter-button-primary:hover {';
        echo sprintf('border-color: %s;', esc_attr($button_primary_border_color_alt) . ' !important');
        echo '}';
    }
}
echo '.potter-button, input[type="submit"], .button {';
if ($button_bg_color || $button_text_color || $button_border_radius) {
    if ($button_border_radius) {
        echo sprintf('border-radius: %s;', esc_attr($button_border_radius) . 'px');
    }

    if ($button_bg_color) {
        echo sprintf('background: %s;', esc_attr($button_bg_color));
    }

    if ($button_text_color) {
        echo sprintf('color: %s;', esc_attr($button_text_color));
    }
}
echo '}';

if ($button_bg_color_alt || $button_text_color_alt) {
    echo '.potter-button:hover, input[type="submit"]:hover {';

    if ($button_bg_color_alt) {
        echo sprintf('background: %s;', esc_attr($button_bg_color_alt) . ' !important');
    }

    if ($button_text_color_alt) {
        echo sprintf('color: %s;', esc_attr($button_text_color_alt) . ' !important');
    }

    echo '}';
}

if ($button_primary_bg_color || $button_primary_text_color) {
    echo '.potter-button-primary {';

    if ($button_primary_bg_color) {
        echo sprintf('background: %s;', esc_attr($button_primary_bg_color));
    }

    if ($button_primary_text_color) {
        echo sprintf('color: %s;', esc_attr($button_primary_text_color));
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


if ($sidebar_bg_color) {
    echo '.potter-sidebar .widget, .elementor-widget-sidebar .widget {';
    echo sprintf('background: %s;', esc_attr($sidebar_bg_color));
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
$breakpoint_mobile_int  = function_exists('potter_breakpoint_mobile') ? potter_breakpoint_mobile() : 480;
$breakpoint_medium_int  = function_exists('potter_breakpoint_medium') ? potter_breakpoint_medium() : 768;
$breakpoint_desktop_int = function_exists('potter_breakpoint_desktop') ? potter_breakpoint_desktop() : 1024;
$breakpoint_mobile      = $breakpoint_mobile_int . 'px';
$breakpoint_medium      = $breakpoint_medium_int . 'px';
$breakpoint_desktop     = $breakpoint_desktop_int . 'px';


if (! is_bool($sidebar_widget_padding_top_tablet) || ! is_bool($sidebar_widget_padding_right_tablet) || ! is_bool($sidebar_widget_padding_bottom_tablet) || ! is_bool($sidebar_widget_padding_left_tablet)) {
    echo '@media screen and (max-width: ' . esc_attr($breakpoint_desktop) . ') {';

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
    echo '@media screen and (max-width: ' . esc_attr($breakpoint_mobile) . ') {';

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
    echo '@media (min-width: ' . esc_attr($breakpoint_medium_int + 1) . 'px) {';

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

$dtheader_single_post								= get_theme_mod('dtheader_single_post');

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
            echo '@media screen and (max-width: ' . esc_attr($breakpoint_desktop) . ') {';

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
            echo '@media screen and (max-width: ' . esc_attr($breakpoint_mobile) . ') {';

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
            echo '@media (min-width: ' . esc_attr($breakpoint_desktop_int + 1) . 'px) {';

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
            echo '.potter-' . $single . '-content .potter-post-style-boxed .potter-article-wrapper, .potter-' . $single . '-content .potter-post-style-boxed #respond {';
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
            echo '.potter-' . $single . '-content .potter-post-style-boxed .potter-article-wrapper, .potter-' . $single . '-content .potter-post-style-boxed #respond {';

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
            echo '@media screen and (max-width: ' . esc_attr($breakpoint_desktop) . ') {';

            echo '.potter-' . $single . '-content .potter-post-style-boxed .potter-article-wrapper, .potter-' . $single . '-content .potter-post-style-boxed #respond {';

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
            echo '@media screen and (max-width: ' . esc_attr($breakpoint_mobile) . ') {';

            echo '.potter-' . $single . '-content .potter-post-style-boxed .potter-article-wrapper, .potter-' . $single . '-content .potter-post-style-boxed #respond {';

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
        echo '@media screen and (max-width: ' . esc_attr($breakpoint_medium) . ') {';
        echo '.potter-logo a, .potter-mobile-logo a {';
        echo sprintf('font-size: %s;', esc_attr($menu_logo_font_size_tablet));
        echo '}';
        echo '}';
    }

    if ($menu_logo_font_size_mobile) {
        echo '@media screen and (max-width: ' . esc_attr($breakpoint_mobile) . ') {';
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
    }

    if ($menu_logo_size_tablet) {
        $suffix = is_numeric($menu_logo_size_tablet) ? 'px' : '';

        echo '@media screen and (max-width: ' . esc_attr($breakpoint_desktop) . ') {';
        echo '.potter-mobile-logo img {';
        echo sprintf('width: %s;', esc_attr($menu_logo_size_tablet) . $suffix);
        echo '}';
        echo '}';
    }

    if ($menu_logo_size_mobile) {
        $suffix = is_numeric($menu_logo_size_mobile) ? 'px' : '';
        echo '@media screen and (max-width: ' . esc_attr($breakpoint_mobile) . ') {';
        echo '.potter-mobile-logo img {';
        echo sprintf('width: %s;', esc_attr($menu_logo_size_mobile) . $suffix);
        echo '}';
        echo '}';
    }
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
$off_canvas_padding                   = get_theme_mod('off_canvas_padding', 'padding-top');
$off_canvas_overlay_color                  = get_theme_mod('off_canvas_overlay_color');

$burger_menu_color                   = get_theme_mod('burger_menu_color');
$burger_menu_hover_color                   = get_theme_mod('burger_menu_hover_color');
$burger_menu_background_color                  = get_theme_mod('burger_menu_background_color');
$burger_menu_background_hover_color                  = get_theme_mod('burger_menu_background_hover_color');
$burger_menu_border_radius                  = get_theme_mod('burger_menu_border_radius');
$burger_menu_size                  = get_theme_mod('burger_menu_size');
$burger_menu_padding                  = get_theme_mod('burger_menu_padding');



if ($menu_position['menu-off-canvas']) {

  echo '.potter-menu-overlay {';
  if ($off_canvas_overlay_color) {
      echo sprintf('background: %s;', esc_attr($off_canvas_overlay_color));
  }
    echo '}';
    if ($off_canvas_menu_font_size) {
  echo '.potter-menu-off-canvas ul.potter-menu a {';

        echo sprintf('font-size: %s;', esc_attr($off_canvas_menu_font_size) . 'px' );
        echo '}';
    }
    if ($off_canvas_menu_hover_color) {
  echo '.potter-menu-off-canvas ul li a:hover {';

        echo sprintf('color: %s;', esc_attr($off_canvas_menu_hover_color));
          echo '}';
    }
if ($off_canvas_menu_active_color) {
  echo '.potter-menu-off-canvas ul li.current_page_item a {';

        echo sprintf('color: %s;', esc_attr($off_canvas_menu_active_color) . ' !important');
          echo '}';
    }

  echo '.potter-menu-off-canvas .potter-menu > li {';
    if ($off_canvas_menu_separator_color) {
        echo sprintf('border-bottom-color: %s;', esc_attr($off_canvas_menu_separator_color));

    }
    if ($off_canvas_menu_item_spacing) {
        echo sprintf('padding-top: %s;', esc_attr($off_canvas_menu_item_spacing) . 'px' );
    }
    if ($off_canvas_menu_item_spacing) {
        echo sprintf('padding-bottom: %s;', esc_attr($off_canvas_menu_item_spacing) . 'px' );
    }
  echo '}';

  if ($off_canvas_menu_color) {
     echo '.potter-menu-off-canvas .potter-menu li a {';
      echo sprintf('color: %s;', esc_attr($off_canvas_menu_color));
      echo '}';
  }

  if ('right' !== $off_canvas_menu_position) {
      echo '.potter-menu-off-canvas .potter-close {';
      echo sprintf('right: %s;', esc_attr('40px !important'));
      echo sprintf('left: %s;', esc_attr('auto !important'));
      echo '}';
      echo '.potter-menu-off-canvas.canvas-visible {';
      echo sprintf(esc_attr($off_canvas_menu_position) . ': %s;', esc_attr('0px !important'));
      echo '}';
      echo '.potter-menu-off-canvas {';
      echo sprintf(esc_attr($off_canvas_menu_position) . ': %s;', esc_attr('-100%'));
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
        echo sprintf('width: %s;', esc_attr($off_canvas_menu_width) . 'px' );
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
        echo sprintf('font-size: %s;', esc_attr($burger_menu_size) . 'px' );
    }
    if ($burger_menu_border_radius) {
        echo sprintf('border-radius: %s;', esc_attr($burger_menu_border_radius) . 'px' );
    }
    if ($burger_menu_padding) {
        echo sprintf('padding: %s;', esc_attr($burger_menu_padding) . 'px' );
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

$nav_button_trans_bg_color            = get_theme_mod('nav_button_trans_bg_color');
$nav_button_trans_bg_hover_color = get_theme_mod('nav_button_trans_bg_hover_color');
$nav_button_trans_font_color  = get_theme_mod('nav_button_trans_font_color');
$nav_button_trans_font_color_alt  = get_theme_mod('nav_button_trans_font_color_alt');
$nav_button_trans_border_width             = get_theme_mod('nav_button_trans_border_width');
$nav_button_trans_border_radius = get_theme_mod('nav_button_trans_border_radius');
$nav_button_trans_border_color             = get_theme_mod('nav_button_trans_border_color');
$nav_button_trans_border_color_alt = get_theme_mod('nav_button_trans_border_color_alt');

if ( $menu_html_button ) {
    echo '.potter-menu-item-button a {';
      if ($nav_button_bg_color) {
          echo sprintf('background: %s;', esc_attr($nav_button_bg_color));
      }
      if ($nav_button_font_color) {
          echo sprintf('color: %s;', esc_attr($nav_button_font_color) . ' !important' );
      }
      if ($nav_button_border_width) {
          echo sprintf('border-width: %s;', esc_attr($nav_button_border_width) . 'px' );
          echo sprintf('border-style: solid;');
      }
      if ($nav_button_border_color) {
          echo sprintf('border-color: %s;', esc_attr($nav_button_border_color));
      }

      if ($nav_button_border_radius) {
          echo sprintf('border-radius: %s;', esc_attr($nav_button_border_radius) . 'px' );
      }
    echo '}';
    echo '.potter-menu-item-button a:hover {';
      if ($nav_button_bg_hover_color) {
          echo sprintf('background: %s;', esc_attr($nav_button_bg_hover_color));
      }
      if ($nav_button_font_color_alt) {
          echo sprintf('color: %s;', esc_attr($nav_button_font_color_alt) . ' !important' );
      }
      if ($nav_button_border_color_alt) {
          echo sprintf('border-color: %s;', esc_attr($nav_button_border_color_alt));
      }
    echo '}';

    echo '.transparent-header .potter-menu-item-button a {';
      if ($nav_button_trans_bg_color) {
          echo sprintf('background: %s;', esc_attr($nav_button_trans_bg_color));
      }
      if ($nav_button_trans_font_color) {
          echo sprintf('color: %s;', esc_attr($nav_button_trans_font_color) . ' !important' );
      }
      if ($nav_button_trans_border_width) {
          echo sprintf('border-width: %s;', esc_attr($nav_button_trans_border_width) . 'px' );
          echo sprintf('border-style: solid;');
      }
      if ($nav_button_trans_border_color) {
          echo sprintf('border-color: %s;', esc_attr($nav_button_trans_border_color));
      }

      if ($nav_button_trans_border_radius) {
          echo sprintf('border-radius: %s;', esc_attr($nav_button_trans_border_radius) . 'px' );
      }
    echo '}';
    echo '.transparent-header .potter-menu-item-button a:hover {';
      if ($nav_button_trans_bg_hover_color) {
          echo sprintf('background: %s;', esc_attr($nav_button_trans_bg_hover_color));
      }
      if ($nav_button_trans_font_color_alt) {
          echo sprintf('color: %s;', esc_attr($nav_button_trans_font_color_alt) . ' !important' );
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
        echo '@media screen and (max-width: ' . esc_attr($breakpoint_medium) . ') {';
        echo '.potter-tagline {';
        echo sprintf('font-size: %s;', esc_attr($menu_logo_description_font_size_tablet));
        echo '}';
        echo '}';
    }

    if ($menu_logo_description_font_size_mobile) {
        echo '@media screen and (max-width: ' . esc_attr($breakpoint_mobile) . ') {';
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
$menu_bg_color       = get_theme_mod('menu_bg_color');
$menu_font_color     = get_theme_mod('menu_font_color');
$menu_font_color_alt = get_theme_mod('menu_font_color_alt');
$sticky_menu_bg_color       = get_theme_mod('sticky_menu_bg_color');
$sickynav_bar_box_shadow       = get_theme_mod('sickynav_bar_box_shadow');
$sticky_menu_font_color     = get_theme_mod('sticky_menu_font_color');
$sticky_menu_font_color_alt = get_theme_mod('sticky_menu_font_color_alt');
$sticky_navbar = get_theme_mod('sticky_navbar');
$transparent_header = get_theme_mod('transparent_header');
$transparent_header_color     = get_theme_mod('transparent_header_color');
$transparent_header_hover_color = get_theme_mod('transparent_header_hover_color');

$menu_sticky_logo  = get_theme_mod('menu_sticky_logo');
$nav_bar_border_top        = get_theme_mod('nav_bar_border_top');
$nav_bar_border_top_width        = get_theme_mod('nav_bar_border_top_width');
$nav_bar_top_border_color        = get_theme_mod('nav_bar_top_border_color');
$nav_bar_border_bottom_width        = get_theme_mod('nav_bar_border_bottom_width');
$nav_bar_bottom_border_color        = get_theme_mod('nav_bar_bottom_border_color');
$nav_bar_box_shadow_none        = get_theme_mod('nav_bar_box_shadow_none');
$sticky_nav_height        = get_theme_mod('sticky_nav_height');
$sticky_nav_width        = get_theme_mod('sticky_nav_width');

if ($menu_sticky_logo) {
    echo '.hide-on-sticky {';
    echo sprintf('display: none;');
    echo '}';
}
    echo '@media (min-width: 1025px) {';
if ($transparent_header_color) {
    echo '.transparent-header .potter-menu-container .potter-menu > .menu-item > a, .transparent-header .potter-inner-pre-header, .transparent-header .potter-inner-pre-header a, .transparent-header .potter-mobile-nav-item a {';
    echo sprintf('color: %s;', esc_attr($transparent_header_color));
    echo '}';
}

    if ($transparent_header_hover_color) {
        echo '.transparent-header .potter-menu > .menu-item > a:hover, .transparent-header .potter-inner-pre-header a:hover {';
        echo sprintf('color: %s;', esc_attr($transparent_header_hover_color));
        echo '}';
    }

    if ($sticky_menu_bg_color) {
        echo '.potter-navigation.stickynav {';
        echo sprintf('background-color: %s;', esc_attr($sticky_menu_bg_color) . '!important');
        echo '}';
    }
    if ($sickynav_bar_box_shadow) {
        echo '.potter-navigation.stickynav {';
        echo sprintf('box-shadow: 0px 6px 14px -9px rgba(0,0,0,0.75);');
        echo '}';
    }
    if ($sticky_navbar ) {
      echo '.potter-navigation.stickynav .potter-nav-wrapper {';
    if ($sticky_nav_height ) {

        echo sprintf('padding-top: %s;', esc_attr($sticky_nav_height) . 'px');
        echo sprintf('padding-bottom: %s;', esc_attr($sticky_nav_height) . 'px');

    }
    if ($sticky_nav_width ) {
    echo sprintf('max-width: %s;', esc_attr($sticky_nav_width));
      }
    echo '}';
  }
    if ($sticky_menu_font_color) {
        echo '.potter-navigation.stickynav .potter-menu > .menu-item > a {';
        echo sprintf('color: %s;', esc_attr($sticky_menu_font_color));
        echo '}';
    }
        if ($sticky_menu_font_color_alt) {
            echo '.potter-navigation.stickynav .potter-menu > .menu-item > a:hover {';
            echo sprintf('color: %s;', esc_attr($sticky_menu_font_color_alt));
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
    echo sprintf('margin-top: %s;', esc_attr($menu_height));
    echo '}';
}

if ($menu_padding) {
    echo '.potter-menu > .menu-item > a {';
    echo sprintf('padding-left: %s;', esc_attr($menu_padding) . 'px');
    echo sprintf('padding-right: %s;', esc_attr($menu_padding) . 'px');
    echo '}';

    if ('menu-centered' === $menu_position) {
        echo '.potter-menu-centered .logo-container {';
        echo sprintf('padding: 0 %s;', esc_attr($menu_padding) . 'px');
        echo '}';
    }
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
    echo '.potter-menu a, .potter-mobile-menu a, .potter-close {';
    echo sprintf('color: %s;', esc_attr($menu_font_color));
    echo '}';
}

if ($menu_font_color_alt) {
    echo '.potter-menu a:hover, .potter-mobile-menu a:hover {';
    echo sprintf('color: %s;', esc_attr($menu_font_color_alt));
    echo '}';

    echo '.potter-menu > .current-menu-item > a, .potter-mobile-menu > .current-menu-item > a {';
    echo sprintf('color: %s;', esc_attr($menu_font_color_alt) . '!important');
    echo '}';
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
    }

    if ($sub_menu_font_size) {
        $suffix = is_numeric($sub_menu_font_size) ? 'px' : '';
        echo sprintf('font-size: %s;', esc_attr($sub_menu_font_size) . $suffix);
    }

    echo '}';
}

if ($sub_menu_accent_color_alt) {
    echo '.potter-menu .sub-menu a:hover {';
    echo sprintf('color: %s;', esc_attr($sub_menu_accent_color_alt));
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
if ($menu_font_size) {
    echo '.potter-menu > .menu-item > a {';
    echo sprintf('font-size: %s;', esc_attr($menu_font_size));
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
        echo sprintf('background-color: %s;', esc_attr($pre_header_bg_color));
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
        }
        if ($pre_header_top_border_color) {
            echo sprintf('border-top-color: %s;', esc_attr($pre_header_top_border_color));
        }
    }
    if ($top_header_border_bottom) {
        if ($pre_header_border_bottom_width) {
            echo sprintf('border-bottom: %s;', esc_attr($pre_header_border_bottom_width) . 'px' . ' solid ');
        }
        if ($pre_header_bottom_border_color) {
            echo sprintf('border-bottom-color: %s;', esc_attr($pre_header_bottom_border_color));
        }
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

if ('left' !== $footer_widget_content_alignment) {
    echo '.footer-widget-area .potter-container .widget * {';
    echo sprintf('text-align: %s;', esc_attr($footer_widget_content_alignment));
    echo '}';
}

if ('none' !== ($footer_height || $widget_footer_width)) {
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
    echo '.potter-page-footer a {';
    echo sprintf('color: %s;', esc_attr($footer_accent_color));
    echo '}';
}

if ('none' !== $footer_layout && $footer_accent_color_alt) {
    echo '.potter-page-footer a:hover {';
    echo sprintf('color: %s;', esc_attr($footer_accent_color_alt));
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
    }
    if ($bottom_footer_border_color) {
        echo sprintf('border-top-color: %s;', esc_attr($bottom_footer_border_color));
    }
    echo '}';
}

do_action('potter_after_customizer_css');
