<?php
/**
 * Logo.
 *
 * @package Potter
 * @subpackage Template Parts
 */

defined('ABSPATH') || die("Can't access directly");
$menu_active_logo = get_theme_mod('menu_active_logo') ? ' data-menu-active-logo="' . esc_url(get_theme_mod('menu_active_logo')) . '"' : '';
$menu_alt_tag     = get_theme_mod('menu_logo_alt', get_bloginfo('name'));
$menu_title_tag   = get_theme_mod('menu_logo_title', get_bloginfo('name'));
$menu_logo_url    = get_theme_mod('menu_logo_url', home_url('/'));
$custom_logo_id   = get_theme_mod('custom_logo');
$custom_logo_url  = wp_get_attachment_image_src($custom_logo_id, 'full');
$custom_logo_url  = apply_filters('potter_logo', $custom_logo_url[0]);
$tagline          = get_bloginfo('description');
$tagline_toggle   = get_theme_mod('menu_logo_description');
$menu_sticky_logo							= get_theme_mod('menu_sticky_logo');
$sticky_navbar							= get_theme_mod('sticky_navbar');

if (has_custom_logo()) {
    echo '<div class="potter-logo"' . $menu_active_logo . ' itemscope="itemscope" itemtype="https://schema.org/Organization">';
    echo '<a class="potter-remove-font-size" href="' . esc_url($menu_logo_url) . '" itemprop="url">';
    potter_custom_logos();
    if ($menu_sticky_logo && $sticky_navbar) {
        echo '<img src="' . esc_url($menu_sticky_logo) . '" alt="' . esc_attr($menu_alt_tag) . '" title="' . esc_attr($menu_title_tag) . '" itemprop="logo" class="site-sticky-logo" />';
    }
    echo '</a>';
    echo '</div>';
} else {
    echo '<div class="potter-logo" itemscope="itemscope" itemtype="https://schema.org/Organization">';
    echo '<span class="site-title" itemprop="name">';
    echo '<a href="' . esc_url($menu_logo_url) . '" rel="home" itemprop="url">' . esc_html(get_bloginfo('name')) . '</a>';
    echo '</span>';
    if (! empty($tagline) && $tagline_toggle) {
        echo '<p class="site-description potter-tagline" itemprop="description">' . esc_html($tagline) . '</p>';
    }
    echo '</div>';
}





/* logo switcher append */
function potter_logo_switcher() {
  $menu_active_logo = get_theme_mod('menu_active_logo') ? ' data-menu-active-logo="' . esc_url(get_theme_mod('menu_active_logo')) . '"' : '';
  $menu_alt_tag     = get_theme_mod('menu_logo_alt', get_bloginfo('name'));
  $menu_title_tag   = get_theme_mod('menu_logo_title', get_bloginfo('name'));
  $menu_logo_url    = get_theme_mod('menu_logo_url', home_url('/'));
  $tagline          = get_bloginfo('description');
  $tagline_toggle   = get_theme_mod('menu_logo_description');
  $custom_logo_id   = get_theme_mod('custom_logo');
  $custom_logo_url  = wp_get_attachment_image_src($custom_logo_id, 'full');
  $custom_logo_url  = apply_filters('potter_logo', $custom_logo_url[0]);
  $transparent_header   = get_theme_mod('transparent_header');
  $transparent_header_logo   = get_theme_mod('transparent_header_logo');
    if ($transparent_header_logo) {
      echo '<img src="' . esc_url($transparent_header_logo) . '" alt="' . esc_attr($menu_alt_tag) . '" title="' . esc_attr($menu_title_tag) . '" itemprop="logo" class="site-logo" />';
    } else {
      echo '<img src="' . esc_url($custom_logo_url) . '" alt="' . esc_attr($menu_alt_tag) . '" title="' . esc_attr($menu_title_tag) . '" itemprop="logo" class="site-logo" />';
    }

}


/* potter custom logo */
function potter_custom_logos()
{
    $menu_active_logo = get_theme_mod('menu_active_logo') ? ' data-menu-active-logo="' . esc_url(get_theme_mod('menu_active_logo')) . '"' : '';
    $menu_alt_tag     = get_theme_mod('menu_logo_alt', get_bloginfo('name'));
    $menu_title_tag   = get_theme_mod('menu_logo_title', get_bloginfo('name'));
    $menu_logo_url    = get_theme_mod('menu_logo_url', home_url('/'));
    $tagline          = get_bloginfo('description');
    $tagline_toggle   = get_theme_mod('menu_logo_description');
    $custom_logo_id   = get_theme_mod('custom_logo');
    $custom_logo_url  = wp_get_attachment_image_src($custom_logo_id, 'full');
    $custom_logo_url  = apply_filters('potter_logo', $custom_logo_url[0]);
    $transparent_header   = get_theme_mod('transparent_header');
    $transparent_header_logo   = get_theme_mod('transparent_header_logo');
    $dtheader_archive								= get_theme_mod('dtheader_archive');
    $dtheader_woo_page							= get_theme_mod('dtheader_woo_page');
    $dtheader_single_post								= get_theme_mod('dtheader_single_post');
    $dtheader_single_download								= get_theme_mod('dtheader_single_download');
    $dtheader_blog								= get_theme_mod('dtheader_blog');
    $dtheader_search_404								= get_theme_mod('dtheader_search_404');
    $options = get_post_meta(get_the_ID(), 'potter_options', true);

    // Check if header is disabled.
    $remove_transparent_header = $options ? in_array('remove-transparent-header', $options) : false;

    if (potter_is_blog() && $transparent_header) {
          if ($dtheader_archive) {
              echo '<img src="' . esc_url($custom_logo_url) . '" alt="' . esc_attr($menu_alt_tag) . '" title="' . esc_attr($menu_title_tag) . '" itemprop="logo" class="site-logo" />';
          } else {
            potter_logo_switcher();
          }
    } elseif (is_home() && $transparent_header) {
        if ($dtheader_blog) {
            echo '<img src="' . esc_url($custom_logo_url) . '" alt="' . esc_attr($menu_alt_tag) . '" title="' . esc_attr($menu_title_tag) . '" itemprop="logo" class="site-logo" />';
        } else {
          potter_logo_switcher();
        }
    } elseif (is_singular('product') && $transparent_header ) {
        if ($dtheader_woo_page) {
            echo '<img src="' . esc_url($custom_logo_url) . '" alt="' . esc_attr($menu_alt_tag) . '" title="' . esc_attr($menu_title_tag) . '" itemprop="logo" class="site-logo" />';
        } else {
            potter_logo_switcher();
        }
    } elseif (is_singular('download') && $transparent_header ) {
        if ($dtheader_single_download) {
            echo '<img src="' . esc_url($custom_logo_url) . '" alt="' . esc_attr($menu_alt_tag) . '" title="' . esc_attr($menu_title_tag) . '" itemprop="logo" class="site-logo" />';
        } else {
            potter_logo_switcher();
        }
    } elseif (is_single() && $transparent_header) {
        if ($dtheader_single_post) {
          echo '<img src="' . esc_url($custom_logo_url) . '" alt="' . esc_attr($menu_alt_tag) . '" title="' . esc_attr($menu_title_tag) . '" itemprop="logo" class="site-logo" />';
      } else {
        potter_logo_switcher();
      }
    } elseif ($transparent_header && is_search()) {
        if ($dtheader_search_404) {
          echo '<img src="' . esc_url($custom_logo_url) . '" alt="' . esc_attr($menu_alt_tag) . '" title="' . esc_attr($menu_title_tag) . '" itemprop="logo" class="site-logo" />';
      } else {
        potter_logo_switcher();
      }
    } elseif (is_404() && $transparent_header) {
        if ($dtheader_search_404) {
          echo '<img src="' . esc_url($custom_logo_url) . '" alt="' . esc_attr($menu_alt_tag) . '" title="' . esc_attr($menu_title_tag) . '" itemprop="logo" class="site-logo" />';
      } else {
        potter_logo_switcher();
      }
    } elseif (class_exists('woocommerce') && is_woocommerce() && $transparent_header) {
        if ($dtheader_woo_page) {
            echo '<img src="' . esc_url($custom_logo_url) . '" alt="' . esc_attr($menu_alt_tag) . '" title="' . esc_attr($menu_title_tag) . '" itemprop="logo" class="site-logo" />';
        } else {
          potter_logo_switcher();
        }
    } elseif ($transparent_header_logo && $transparent_header) {
        if ($remove_transparent_header) {
            echo '<img src="' . esc_url($custom_logo_url) . '" alt="' . esc_attr($menu_alt_tag) . '" title="' . esc_attr($menu_title_tag) . '" itemprop="logo" class="site-logo" />';
        } else {
            echo '<img src="' . esc_url($transparent_header_logo) . '" alt="' . esc_attr($menu_alt_tag) . '" title="' . esc_attr($menu_title_tag) . '" itemprop="logo" class="site-logo" />';
        }
    } else {
        echo '<img src="' . esc_url($custom_logo_url) . '" alt="' . esc_attr($menu_alt_tag) . '" title="' . esc_attr($menu_title_tag) . '" itemprop="logo" class="site-logo" />';
    }
}
