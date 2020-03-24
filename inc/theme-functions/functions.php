<?php
/**
 * Helpers.
 *
 * @package Potter
 */

defined('ABSPATH') || die("Can't access directly");

/* Transparent Header class */

function potter_transparent_header_class()
{
    $transparent_header             = get_theme_mod('transparent_header');
    $dtheader_archive								= get_theme_mod('dtheader_archive');
    $dtheader_woo_page							= get_theme_mod('dtheader_woo_page');
    $dtheader_single_post								= get_theme_mod('dtheader_single_post');
    $dtheader_single_download								= get_theme_mod('dtheader_single_download');
    $dtheader_search_404								= get_theme_mod('dtheader_search_404');
    $dtheader_blog								= get_theme_mod('dtheader_blog');
    // transparabt header.
    $options = get_post_meta(get_the_ID(), 'potter_options', true);

    // Check if tranparent header is disabled.
    $remove_transparent_header = $options ? in_array('remove-transparent-header', $options) : false;

    // Remove tranparent header if disabled.
    if ($remove_transparent_header) {
        echo 'no-transparent';
    } else {
        // if global transparent header is active.
        if ($transparent_header) {
            // transparabt header disable in blog page.
            if (is_home() && $dtheader_blog) {
                echo 'no-transparent';
            }
            // transparabt header disable in archive page.
            elseif (potter_is_blog() && $dtheader_archive) {
                echo 'no-transparent';
            }
            // transparabt header disable in woo product page page.
            elseif (is_singular('product') && $dtheader_woo_page) {
                echo 'no-transparent';
            }
            // transparabt header disable in single download page page.
            elseif (is_singular('download') && $dtheader_single_download) {
                echo 'no-transparent';
            }
            // transparabt header disable in single post page.
            elseif (is_single() && $dtheader_single_post) {
                echo 'no-transparent';
            }
            // transparabt header disable in search page.
            elseif ($dtheader_search_404 && is_search()) {
                echo 'no-transparent';
            }
            // transparabt header disable in 404 page.
            elseif ($dtheader_search_404 && is_404()) {
                echo 'no-transparent';
            }
            // transparabt header disable in woo page.
            elseif (class_exists('woocommerce')) {
                if ($dtheader_woo_page && is_woocommerce()) {
                    echo 'no-transparent';
                } else {
                    echo 'transparent-header';
                }
            } else {
                echo 'transparent-header';
            }
        }
    }
}

/**
 * strpos array helper function.
 *
 * @param array $haystack The haystack.
 * @param array $needles The needles.
 * @param integer $offset The offset.
 *
 * @return boolean.
 */
function potter_strposa($haystack, $needles, $offset = 0)
{
    if (! is_array($needles)) {
        $needles = array( $needles );
    }

    foreach ($needles as $needle) {
        if (strpos($haystack, $needle, $offset) !== false) {
            return true;
        }
    }

    return false;
}

/**
 * Pingback head link.
 *
 * Add Pingback head link if we're on singular and pings are open.
 */
function potter_pingback_header()
{
    if (is_singular() && pings_open()) {
        echo '<link rel="pingback" href="' . esc_url(get_bloginfo('pingback_url')) . '">';
    }
}


/**
 * Schema markup.
 */
function potter_body_schema_markup()
{

    // Blog variable.
    $is_blog = (is_home() || is_date() || is_category() || is_author() || is_tag() || is_attachment() || is_singular('post')) ? true : false;

    // Default itemtype.
    $itemtype = 'WebPage';

    // Define itemtype for blog pages, otherwise use WebPage.
    $itemtype = ($is_blog) ? 'Blog' : $itemtype;

    // Define itemtype for search results, otherwise use WebPage.
    $itemtype = (is_search()) ? 'SearchResultsPage' : $itemtype;

    // Make result filterable.
    $result = apply_filters('potter_body_itemtype', $itemtype);

    // Output.
    echo 'itemscope="itemscope" itemtype="https://schema.org/' . esc_html($result) . '"';
}

/**
 * Inner content open.
 *
 * @param boolean $echo Determine wether result should return or echo.
 */
function potter_inner_content($echo = true)
{
    if (is_singular()) {
        $options = get_post_meta(get_the_ID(), 'potter_options', true);

        // Check if template is set to full width.
        $fullwidth = $options ? in_array('full-width', $options) : false;

        // Check if template is set to contained.
        $contained = $options ? in_array('contained', $options) : false;

        // Construct inner content wrapper.
        $inner_content = $fullwidth ? false : apply_filters('potter_inner_content', '<div id="inner-content" class="potter-container potter-container-center potter-padding-medium">');
        $potter_settings = get_option('potter_settings');
        // Get array of post types that are set to full width under Appearance > Theme Settings > Global Templat Settings.
        $fullwidth_global = isset($potter_settings['potter_fullwidth_global']) ? $potter_settings['potter_fullwidth_global'] : array();
        // If current post type has been set to full-width globally, set $inner_content to false.
        $fullwidth_global && in_array(get_post_type(), $fullwidth_global) ? $inner_content = false : '';

    // On archives, we only add the potter_inner_content filter.
    } else {
        $inner_content = apply_filters('potter_inner_content', '<div id="inner-content" class="potter-container potter-container-center potter-padding-medium">');
    }

    if ($echo) {
        echo $inner_content;
    } else {
        return $inner_content;
    }
}

/**
 * Inner content close.
 */
function potter_inner_content_close()
{
    if (is_singular()) {
        $options = get_post_meta(get_the_ID(), 'potter_options', true);

        $fullwidth = $options ? in_array('full-width', $options) : false;

        $contained = $options ? in_array('contained', $options) : false;

        $inner_content_close = $fullwidth ? false : '</div>';

        if ($contained) {
            $potter_settings = get_option('potter_settings');

            $fullwidth_global = isset($potter_settings['potter_fullwidth_global']) ? $potter_settings['potter_fullwidth_global'] : array();

            $fullwidth_global && in_array(get_post_type(), $fullwidth_global) ? $inner_content_close = false : '';
        }
    } else {
        $inner_content_close = '</div>';
    }

    echo $inner_content_close;
}



/**
* Title for the Site
*/
function potter_title()
{
    $options = get_post_meta(get_the_ID(), 'potter_options', true);
    $removetitle = $options ? in_array('remove-title', $options) : false;
    $title = $removetitle ? false : '<h1 class="entry-title" itemprop="headline">' . get_the_title() . '</h1>';
    //title
    if ($title) {
        do_action('potter_before_page_title');
        echo $title;
        do_action('potter_after_page_title');
    }
}



/*
remove breadcrumb init
*/

function potter_remove_breadcrumb()
{
    $options = get_post_meta(get_the_ID(), 'potter_options', true);
    $removebreadcrumb = $options ? in_array('remove-breadcrumb', $options) : false;
    $breadcrumbs_toggle = get_theme_mod('breadcrumbs_toggle');
    $breadcrumb_on_archive_page = get_theme_mod('breadcrumb_on_archive_page');
    $breadcrumb_on_blog_page = get_theme_mod('breadcrumb_on_blog_page');
    $breadcrumb_on_search_page = get_theme_mod('breadcrumb_on_search_page');
    $breadcrumb_on_404_page = get_theme_mod('breadcrumb_on_404_page');
    $breadcrumb_single_post_page = get_theme_mod('breadcrumb_single_post_page');
    // Remove breadcrumb.
    if ($breadcrumbs_toggle) {
        if ($removebreadcrumb) {
            remove_action('potter_after_header', 'potter_breadcrumb_after_header');
            remove_action('potter_main_title_before', 'potter_breadcrumb_before_content');
        }
        // Remove breadcrumb in  woo pages as they already have there.
        elseif (is_singular('product')) {
            remove_action('potter_after_header', 'potter_breadcrumb_after_header');
        } elseif (class_exists('woocommerce') && is_woocommerce()) {
            remove_action('potter_after_header', 'potter_breadcrumb_after_header');
        }
        // breadcrumb header disable in blog page.
        elseif (is_home() && $breadcrumb_on_blog_page) {
            remove_action('potter_after_header', 'potter_breadcrumb_after_header');
            remove_action('potter_main_title_before', 'potter_breadcrumb_before_content');
        }
        // transparabt header disable in archive page.
        elseif ($breadcrumb_on_archive_page && potter_is_blog()) {
            remove_action('potter_after_header', 'potter_breadcrumb_after_header');
            remove_action('potter_main_title_before', 'potter_breadcrumb_before_content');
        }
        // breadcrumb header disable in single post page.
        elseif (is_single() && $breadcrumb_single_post_page) {
            remove_action('potter_after_header', 'potter_breadcrumb_after_header');
            remove_action('potter_main_title_before', 'potter_breadcrumb_before_content');
        }
        // breadcrumb header disable in search page.
        elseif ($breadcrumb_on_search_page && is_search()) {
            remove_action('potter_after_header', 'potter_breadcrumb_after_header');
            remove_action('potter_main_title_before', 'potter_breadcrumb_before_content');
        }
        // breadcrumb header disable in 404 page.
        elseif ($breadcrumb_on_404_page && is_404()) {
            remove_action('potter_after_header', 'potter_breadcrumb_after_header');
            remove_action('potter_main_title_before', 'potter_breadcrumb_before_content');
        } else {
            add_action('potter_after_header', 'potter_breadcrumb_after_header');
            add_action('potter_main_title_before', 'potter_breadcrumb_before_content');
        }
    }
}
add_action('wp', 'potter_remove_breadcrumb');







/**
 * Disable header.
 */
function potter_remove_header()
{

    // Stop here if we're on archives.
    if (! is_singular()) {
        return;
    }

    $options = get_post_meta(get_the_ID(), 'potter_options', true);

    // Check if header is disabled.
    $remove_header = $options ? in_array('remove-header', $options) : false;

    // Remove header if disabled.
    if ($remove_header) {
        remove_action('potter_header', 'potter_do_header');
    }
}
add_action('wp', 'potter_remove_header');

/**
 * Disable footer.
 */
function potter_remove_footer()
{

    // Stop here if we're on archives.
    if (! is_singular()) {
        return;
    }

    $options = get_post_meta(get_the_ID(), 'potter_options', true);

    // Check if footer is disabled.
    $remove_footer = $options ? in_array('remove-footer', $options) : false;

    // Remove footer if disabled.
    if ($remove_footer) {
        remove_action('potter_footer', 'potter_do_footer');
        remove_action('potter_before_footer', 'potter_custom_footer');
    }
}
add_action('wp', 'potter_remove_footer');

/**
 * ScrollTop.
 */
function potter_scrolltop()
{
    if (get_theme_mod('layout_scrolltop')) {
        $scrollTop = get_theme_mod('scrolltop_value', 400);

        echo '<a class="scrolltop" href="javascript:void(0)" data-scrolltop-value="' . (int) $scrollTop . '">';
        echo '<span class="screen-reader-text">' . __('Scroll to Top', 'potter') . '</span>';
        echo '</a>';
    }
}
add_action('wp_footer', 'potter_scrolltop');

/**
 * Archive Class
 *
 * Add unique class to any existing archive type.
 *
 * potter-archive-content
 * + potter-{post-type}-archive
 * + potter-{archive-type}-content (for post archives)
 *
 * + potter-{post-type}-archive-content (for cpt archives)
 * + potter-{post-type}-taxonomy-content (for cpt-related taxonomies)
 *
 * @return string The archive class.
 */
function potter_archive_class()
{
    $archive_class = '';

    if (is_date()) {
        $archive_class = ' potter-archive-content potter-post-archive potter-date-content';
    } elseif (is_category()) {
        $archive_class = ' potter-archive-content potter-post-archive potter-category-content';
    } elseif (is_tag()) {
        $archive_class = ' potter-archive-content potter-post-archive potter-tag-content';
    } elseif (is_author()) {
        $archive_class = ' potter-archive-content potter-post-archive potter-author-content';
    } elseif (is_home()) {
        $archive_class = ' potter-archive-content potter-post-archive potter-blog-content';
    } elseif (is_search()) {
        $archive_class = ' potter-archive-content potter-post-archive potter-search-content';
    } elseif (is_post_type_archive()) {
        $post_type = get_post_type();

        // Stop here if no post has been found.
        if (! $post_type) {
            return $archive_class;
        }

        $archive_class  = ' potter-archive-content';
        $archive_class .= ' potter-' . $post_type . '-archive';
        $archive_class .= ' potter-' . $post_type . '-archive-content';
    } elseif (is_tax()) {
        $post_type = get_post_type();

        // Stop here if no post has been found.
        if (! $post_type) {
            return $archive_class;
        }

        $archive_class  = ' potter-archive-content';
        $archive_class .= ' potter-' . $post_type . '-archive';
        $archive_class .= ' potter-' . $post_type . '-archive-content';
        $archive_class .= ' potter-' . $post_type . '-taxonomy-content';
    }

    return apply_filters('potter_archive_class', $archive_class);
}

/**
 * Singular class.
 *
 * @return string The singular class.
 */
function potter_singular_class()
{
    if (is_singular('post')) {
        $singular_class = ' potter-single-content potter-post-content';
    } elseif (is_attachment()) {
        $singular_class = ' potter-single-content potter-attachment-content';
    } elseif (is_page()) {
        $singular_class = ' potter-single-content potter-page-content';
    } elseif (is_404()) {
        $singular_class = ' potter-single-content potter-404-content';
    } else {
        $post_type      = get_post_type();
        $singular_class = ' potter-single-content potter-' . $post_type . '-content';
    }

    return apply_filters('potter_singular_class', $singular_class);
}

/* Social icons */


function potter_icon_link()
{
    $defaults = [
[
  'link_text' => esc_html__('pottericon-twitter', 'potter'),
  'link_url'  => esc_url('#'),
  'link_color' => '#333333',
],
];
    // Theme_mod settings to check.
    $settings = get_theme_mod('potter_icon_repeater_topbar', $defaults);
    foreach ($settings as $setting) :
    echo '<a href="' . esc_url($setting['link_url']) . '" target="_blank">';
    echo '<span class="' . $setting['link_text'] . '" style="color: '. $setting['link_color'] .'">';
    echo '</span></a>';
    endforeach;
}

function potter_icon_link_coltwo()
{
    $defaults = [
[
  'link_text' => esc_html__('pottericon-twitter', 'potter'),
  'link_url'  => esc_url('#'),
  'link_color' => '#333333',
],
];
    // Theme_mod settings to check.
    $settings = get_theme_mod('potter_icon_repeater_topbar_col2', $defaults);
    foreach ($settings as $setting) :
    echo '<a href="' . esc_url($setting['link_url']) . '" target="_blank">';
    echo '<span class="' . $setting['link_text'] . '" style="color: '. $setting['link_color'] .'">';
    echo '</span></a>';
    endforeach;
}

function potter_icon_fotter_bottom_colone()
{
    $defaults = [
[
  'link_text' => esc_html__('pottericon-twitter', 'potter'),
  'link_url'  => esc_url('#'),
  'link_color' => '#333333',
],
];
    // Theme_mod settings to check.
    $settings = get_theme_mod('potter_icon_bottom_footer_col1', $defaults);
    foreach ($settings as $setting) :
    echo '<a href="' . esc_url($setting['link_url']) . '" target="_blank">';
    echo '<span class="' . $setting['link_text'] . '" style="color: '. $setting['link_color'] .'">';
    echo '</span></a>';
    endforeach;
}

function potter_icon_fotter_bottom_coltwo()
{
    $defaults = [
[
  'link_text' => esc_html__('pottericon-twitter', 'potter'),
  'link_url'  => esc_url('#'),
  'link_color' => '#333333',
],
];
    // Theme_mod settings to check.
    $settings = get_theme_mod('potter_icon_bottom_footer_col2', $defaults);
    foreach ($settings as $setting) :
    echo '<a href="' . esc_url($setting['link_url']) . '" target="_blank">';
    echo '<span class="' . $setting['link_text'] . '" style="color: '. $setting['link_color'] .'">';
    echo '</span></a>';
    endforeach;
}
/**
 * Archive header.
 */
function potter_archive_header()
{
    echo '<div class="default-title-bar-archive">';
    if (is_author()) {
        ?>
		<section class="potter-author-box">
      <?php
           echo get_avatar(get_the_author_meta('email'), 120); ?>
			<h2 class="page-title"><span class="vcard"><?php echo get_the_author(); ?></span></h2>
			<p><?php echo wp_kses_post(get_the_author_meta('description')); ?></p>
		</section>
		<?php
    } else {
        if (get_the_archive_title()) {
            do_action('potter_before_page_title');

            the_archive_title('<h1 class="page-title">', '</h1>');

            do_action('potter_after_page_title');
        }

        the_archive_description('<div class="taxonomy-description">', '</div>');
    }
    echo '</div>';
}

/** Blog Head line
*/

function potter_blog_page_title()
{
    $blog_page_custom_title = get_theme_mod('blog_page_custom_title', __( 'Just another WordPress blog', 'potter' ));
    if (is_home() && $blog_page_custom_title) {
        echo '<div class="default-title-bar-archive">';
        echo '<h1 class="page-title">';
        echo esc_html($blog_page_custom_title);
        echo '</h1></div>';
    }
}
add_action('potter_inner_content_open', 'potter_blog_page_title');

/**
 * Archive headline.
 *
 * @param string $title The archive headline.
 *
 * @return string The updated archive headline.
 */
function potter_archive_title($title)
{
    $archive_headline = get_theme_mod('archive_headline');

    if (is_category()) {
        if ('hide_prefix' === $archive_headline) {
            $title = single_cat_title('', false);
        } elseif ('hide' === $archive_headline) {
            $title = false;
        }
    } elseif (is_tag()) {
        if ('hide_prefix' === $archive_headline) {
            $title = single_tag_title('', false);
        } elseif ('hide' === $archive_headline) {
            $title = false;
        }
    } elseif (is_date()) {
        $date = get_the_date('F Y');
        if (is_year()) {
            $date = get_the_date('Y');
        }

        if (is_day()) {
            $date = get_the_date('F j, Y');
        }

        if ('hide_prefix' === $archive_headline) {
            $title = $date;
        } elseif ('hide' === $archive_headline) {
            $title = false;
        }
    } elseif (is_post_type_archive()) {
        if ('hide_prefix' === $archive_headline) {
            $title = post_type_archive_title('', false);
        } elseif ('hide' === $archive_headline) {
            $title = false;
        }
    } elseif (is_tax()) {
        if ('hide_prefix' === $archive_headline) {
            $title = single_term_title('', false);
        } elseif ('hide' === $archive_headline) {
            $title = false;
        }
    }

    return $title;
}
add_filter('get_the_archive_title', 'potter_archive_title', 10);

if (! function_exists('potter_has_responsive_breakpoints')) {

    /**
     * Responsive breakpoints.
     *
     * Simple check if responsive breakpoints are set.
     *
     * @return boolean.
     */
    function potter_has_responsive_breakpoints()
    {
        $potter_settings = get_option('potter_settings');

        // Check if custom breakpoints are set, otherwise return false.
        if (! empty($potter_settings['potter_breakpoint_medium']) || ! empty($potter_settings['potter_breakpoint_desktop']) || ! empty($potter_settings['potter_breakpoint_mobile'])) {
            return true;
        } else {
            return false;
        }
    }
}

/**
 * Render right sidebar.
 */
function potter_do_sidebar_right()
{
    if ('right' === potter_sidebar_layout()) {
        get_sidebar();
    }
}
add_action('potter_sidebar_right', 'potter_do_sidebar_right');

/**
 * Render left sidebar.
 */
function potter_do_sidebar_left()
{
    if ('left' === potter_sidebar_layout()) {
        get_sidebar();
    }
}
add_action('potter_sidebar_left', 'potter_do_sidebar_left');

/**
 * Sidebar layout.
 *
 * @return string The sidebar layout.
 */
function potter_sidebar_layout()
{

    // Set default sidebar position.
    $sidebar = get_theme_mod('sidebar_position', 'right');

    $archive_sidebar_position = get_theme_mod('archive_sidebar_layout', 'global');
    $sidebar = 'global' !== $archive_sidebar_position ? $archive_sidebar_position : $sidebar;

    if (is_singular()) {
        $id                             = get_the_ID();
        $single_sidebar_position        = get_post_meta($id, 'potter_sidebar_position', true);
        $single_sidebar_position_global = get_theme_mod('single_sidebar_layout', 'global');

        $sidebar = 'global' !== $single_sidebar_position_global ? $single_sidebar_position_global : $sidebar;
        $sidebar = $single_sidebar_position && 'global' !== $single_sidebar_position ? $single_sidebar_position : $sidebar;
    }

    return apply_filters('potter_sidebar_layout', $sidebar);
}

/*
 * Article meta.
 *
 * Construct sortable article meta.
 */
function potter_article_meta()
{
    $blog_meta = get_theme_mod('blog_sortable_meta', array( 'author', 'date' ));

    if (is_array($blog_meta) && ! empty($blog_meta)) {
        do_action('potter_before_article_meta');
        echo '<p class="article-meta">';
        do_action('potter_article_meta_open');

        foreach ($blog_meta as $value) {
            switch ($value) {
            case 'author':
                do_action('potter_before_author_meta');
                potter_author_meta();
                do_action('potter_after_author_meta');
                break;
            case 'date':
                do_action('potter_before_date_meta');
                potter_date_meta();
                do_action('potter_after_date_meta');
                break;
            case 'comments':
                do_action('potter_before_comments_meta');
                potter_comments_meta();
                do_action('potter_after_comments_meta');
                break;
            default:
                break;
            }
        }

        do_action('potter_article_meta_close');
        echo '</p>';
        do_action('potter_after_article_meta');
    }
}

/**
 * Article meta (author).
 */
function potter_author_meta()
{
    $rtl    = is_rtl();
    $avatar = get_theme_mod('blog_author_avatar');

    if (! $rtl && $avatar) {
        echo get_avatar(get_the_author_meta('ID'), 128);
    }

    echo sprintf(
        '<span class="article-author author vcard" itemscope="itemscope" itemprop="author" itemtype="https://schema.org/Person"><a class="url fn" href="%1$s" title="%2$s" rel="author" itemprop="url"><span itemprop="name">%3$s</span></a></span>',
        esc_url(get_author_posts_url(get_the_author_meta('ID'))),
        esc_attr(sprintf(__('View all posts by %s', 'potter'), get_the_author())),
        esc_html(get_the_author())
    );

    if ($rtl && $avatar) {
        echo get_avatar(get_the_author_meta('ID'), 128);
    }

    echo '<span class="article-meta-separator">' . apply_filters('potter_article_meta_separator', ' | ') . '</span>';
}

/*
 * Article meta (date).
 */
function potter_date_meta()
{
    echo '<span class="posted-on">' . __('Posted on', 'potter') . '</span> <time class="article-time published" datetime="' . get_the_date('c') . '" itemprop="datePublished">' . get_the_date() . '</time>';
    echo '<span class="article-meta-separator">' . apply_filters('potter_article_meta_separator', ' | ') . '</span>';
}

/**
 * Article meta (comments).
 */
function potter_comments_meta()
{
    echo '<span class="comments-count">';

    comments_number(
        __('<span>No</span> Comments', 'potter'),
        __('<span>1</span> Comment', 'potter'),
        __('<span>%</span> Comments', 'potter')
    );

    echo '</span>';

    echo '<span class="article-meta-separator">' . apply_filters('potter_article_meta_separator', ' | ') . '</span>';
}

/**
 * Blog layout.
 *
 * @return array The blog layout.
 */
function potter_blog_layout()
{
    $template_parts_header = get_theme_mod('archive_sortable_header', array( 'title', 'meta', 'featured' ));
    $template_parts_footer = get_theme_mod('archive_sortable_footer', array( 'readmore', 'categories' ));
    $blog_layout           = get_theme_mod('archive_layout', 'default');
    $style                 = get_theme_mod('archive_post_style', 'plain');
    $stretched             = get_theme_mod('archive_boxed_image_streched', false);

    if ('beside' !== $blog_layout && 'boxed' === $style && $stretched) {
        $style .= ' stretched';
    }

    return apply_filters('potter_blog_layout', array( 'blog_layout' => $blog_layout, 'template_parts_header' => $template_parts_header, 'template_parts_footer' => $template_parts_footer, 'style' => $style ));
}

/**
 * Register menu's.
 *
 * Declare wp_nav_menu based on selected navigation.
 */
function potter_nav_menu()
{
    $custom_menu = get_theme_mod('menu_custom');

    if ($custom_menu) {
        echo do_shortcode($custom_menu);
    } elseif (in_array(get_theme_mod('menu_position'), array( 'menu-off-canvas', 'menu-off-canvas-left' ))) {

        // Off canvas menu.
        wp_nav_menu(array(
            'theme_location' => 'off_canvas_menu',
            'container'      => false,
            'menu_class'     => 'potter-menu',
            'depth'          => 1,
            'fallback_cb'    => 'potter_main_menu_fallback',
        ));
    } elseif ('menu-full-screen' === get_theme_mod('menu_position')) {

        // Full screen menu.
        wp_nav_menu(array(
            'theme_location' => 'main_menu',
            'container'      => false,
            'menu_class'     => 'potter-menu',
            'depth'          => 2,
            'fallback_cb'    => 'potter_main_menu_fallback',
        ));
    } else {

        // Default menu.
        wp_nav_menu(array(
            'theme_location' => 'main_menu',
            'container'      => false,
            'menu_class'     => 'potter-menu potter-sub-menu' . potter_sub_menu_alignment() . potter_sub_menu_animation() . potter_menu_hover_effect(),
            'depth'          => 4,
            'fallback_cb'    => 'potter_main_menu_fallback',
        ));
    }
}
add_action('potter_main_menu', 'potter_nav_menu');

/**
 * Menu.
 *
 * @return string Menu selected under Header > Navigation in the WordPress customizer.
 */
function potter_menu()
{
    return get_theme_mod('menu_position', 'menu-right');
}

/**
 * Mobile menu.
 *
 * @return string Mobile menu selected under Header > Mobile Navigation in the WordPress customizer.
 */
function potter_mobile_menu()
{
    return get_theme_mod('mobile_menu_options', 'menu-mobile-hamburger');
}

/**
 * Is off canvas menu check.
 *
 * Simple check to determine wether an off canvas menu is used.
 *
 * @return boolean.
 */
function potter_is_off_canvas_menu()
{
    if (in_array(get_theme_mod('menu_position'), array( 'menu-off-canvas', 'menu-off-canvas-left', 'menu-full-screen' ))) {
        return true;
    } else {
        return false;
    }
}

/** Navigation off canvas construct
*/

function potter_navigation_offcanvas_nav()
{
    $menu_position = get_theme_mod('menu_position');
    if ('menu-off-canvas' === $menu_position) {
        ?>
    <div class="potter-menu-overlay"></div>
    <div class="potter-menu-off-canvas potter-menu-off-canvas-right potter-visible-large">
      <button class="potter-close"><i class="potterf potterf-times" aria-hidden="true"></i></button>
      <?php do_action('potter_before_main_menu'); ?>
      <nav id="navigation" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement" aria-labelledby="potter-menu-toggle">
        <?php do_action('potter_main_menu_open'); ?>
        <?php do_action('potter_main_menu'); ?>
        <?php do_action('potter_main_menu_close'); ?>
      </nav>
      <?php do_action('potter_after_main_menu'); ?>

    </div>
    <?php
    }
}
add_action('potter_header_close', 'potter_navigation_offcanvas_nav');


/** navigation left menu
*/

function potter_nav_left_menu()
{
    wp_nav_menu(array(
      'theme_location' => 'nav_left_menu',
      'container'      => false,
      'menu_class'     => 'potter-menu potter-sub-menu' . potter_sub_menu_alignment() . potter_sub_menu_animation() . potter_menu_hover_effect(),
      'depth'          => 4,
      'fallback_cb'    => 'potter_main_menu_fallback',
));
}

/**
 * Add sub menu indicators to mobile & off canvas menu's.
 *
 * @param string $item_output The menu item's starting HTML output.
 * @param object $item The menu item data object.
 * @param integer $depth Depth of menu item.
 * @param object $args The arguments.
 *
 * @return string The updated mobile menu item's starting HTML output.
 */
function potter_mobile_sub_menu_indicators($item_output, $item, $depth, $args)
{
    if ('mobile_menu' === $args->theme_location || (in_array(get_theme_mod('menu_position'), array( 'menu-off-canvas', 'menu-off-canvas-left' )) && 'main_menu' === $args->theme_location)) {
        if (isset($item->classes) && in_array('menu-item-has-children', $item->classes)) {
            $item_output .= '<button class="potter-submenu-toggle" aria-expanded="false"><i class="potterf potterf-arrow-down" aria-hidden="true"></i><span class="screen-reader-text">' . __('Menu Toggle', 'potter') . '</span></button>';
        }
    }

    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'potter_mobile_sub_menu_indicators', 10, 4);

/**
 * Submenu alignment class.
 *
 * @return string The submenu alignment class.
 */
function potter_sub_menu_alignment()
{
    $sub_menu_alignment = get_theme_mod('sub_menu_alignment', 'left');
    $alignment = ' potter-sub-menu-align-' . $sub_menu_alignment;

    return $alignment;
}

/**
 * Submenu animation class.
 *
 * @return string The submenu animation class.
 */
function potter_sub_menu_animation()
{
    $sub_menu_animation = get_theme_mod('sub_menu_animation', 'fade');
    $sub_menu_animation = ' potter-sub-menu-animation-' . $sub_menu_animation;

    return $sub_menu_animation;
}

/**
 * Menu alignment class.
 *
 * @return string The menu alignment class.
 */
function potter_menu_alignment()
{
    $alignment = get_theme_mod('menu_alignment', 'left');
    $alignment = ' menu-align-' . $alignment;

    return $alignment;
}

/**
 * Navigation hover effect classes.
 *
 * @return string The navigation hover effect classes.
 */
function potter_menu_hover_effect()
{
    $menu_effect           = get_theme_mod('menu_effect', 'none');
    $menu_effect_animation = get_theme_mod('menu_effect_animation', 'fade');
    $menu_effect_alignment = get_theme_mod('menu_effect_alignment', 'center');

    $hover_effect  = ' potter-menu-effect-' . $menu_effect;
    $hover_effect .= ' potter-menu-animation-' . $menu_effect_animation;
    $hover_effect .= ' potter-menu-align-' . $menu_effect_alignment;

    return $hover_effect;
}

/**
 * Navigation attributes.
 *
 * Currently only being used to add the submenu animation duration.
 */
function potter_navigation_attributes()
{
    $submenu_animation_duration = get_theme_mod('sub_menu_animation_duration');

    $navigation_attributes = $submenu_animation_duration ? 'data-sub-menu-animation-duration="' . esc_attr($submenu_animation_duration) . '"' : 'data-sub-menu-animation-duration="250"';

    echo $navigation_attributes;
}

/**
 * Responsive embed/oembed.
 *
 * @param string $html The HTML output.
 * @param string $url The embed URL.
 * @param array $attr Array of shortcode attributes.
 *
 * @return string The updated HTML output.
 */
function potter_responsive_embed($html, $url, $attr)
{
    $providers = array( 'vimeo.com', 'youtube.com', 'youtu.be', 'wistia.com', 'wistia.net' );

    if (potter_strposa($url, $providers)) {
        $html = '<div class="potter-video">' . $html . '</div>';
    }

    return $html;
}
add_filter('embed_oembed_html', 'potter_responsive_embed', 10, 3);

/**
 * Page builder compatibility.
 *
 * Make the page full-width & remove the title if Page Builder is being used.
 *
 * @param int $id the ID.
 */
function potter_page_builder_compatibility($id)
{

    // Stop here if we're not on a page.
    if ('page' !== get_post_type()) {
        return;
    }

    $elementor  = get_post_meta($id, '_elementor_edit_mode', true);
    $fl_enabled = get_post_meta($id, '_fl_builder_enabled', true);

    if ($fl_enabled || 'builder' === $elementor) {
        $potter_stored_meta = get_post_meta($id);
        $mydata           = $potter_stored_meta['potter_options'];

        // Stop here if auto conversion already took place.
        if (in_array('auto-convert', $mydata)) {
            return;
        }

        $mydata[] .= 'remove-title';
        $mydata[] .= 'full-width';
        $mydata[] .= 'auto-convert';

        update_post_meta($id, 'potter_options', $mydata);
    }
}
