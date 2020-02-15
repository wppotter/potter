<?php
/**
 * WooCommerce customizer settings.
 *
 * @package Potter
 * @subpackage Integration/WooCommerce
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

// Textdomain. This is required, otherwise strings aren't translateable.
load_theme_textdomain( 'potter' );

/**
 * Setup.
 *
 * @param object $wp_customize The wp_customize object.
 */
function potter_woo_customizer_setup( $wp_customize ) {

	// Reorder sections.
	$wp_customize->get_section( 'woocommerce_store_notice' )->priority    = 10;
	$wp_customize->get_section( 'woocommerce_product_images' )->priority  = 20;
	$wp_customize->get_section( 'woocommerce_product_catalog' )->priority = 30;
	$wp_customize->get_section( 'woocommerce_checkout' )->priority        = 50;

	// Change section title.
	$wp_customize->get_section( 'woocommerce_product_catalog' )->title = __( 'Shop Page', 'potter' );

}
add_action( 'customize_register', 'potter_woo_customizer_setup', 20 );

// Kirki configuration.
Kirki::add_config( 'potter', array(
	'capability'     => 'edit_theme_options',
	'option_type'    => 'theme_mod',
	'disable_output' => true,
) );

/* Sections – WooCommerce */

// Menu item.
Kirki::add_section( 'potter_woocommerce_menu_item_options', array(
	'title'    => __( 'Menu Item', 'potter' ),
	'panel'    => 'woocommerce',
	'priority' => 25,
) );

// Product page.
Kirki::add_section( 'potter_woocommerce_product_options', array(
	'title'    => __( 'Product Page', 'potter' ),
	'panel'    => 'woocommerce',
	'priority' => 40,
) );


// Notices.
Kirki::add_section( 'potter_woocommerce_notices_options', array(
	'title'    => __( 'Notices', 'potter' ),
	'panel'    => 'woocommerce',
	'priority' => 70,
) );


/* Fields – Sidebar */
//shop header layout
Kirki::add_field('potter', array(
    'type'            => 'checkbox',
    'settings'        => 'dtheader_woo_page',
    'label'           => __('Disable on WooCommerce Page?', 'potter'),
    'section'         => 'potter_transparent_header_options',
    'default'         => false,
    'priority'        => 5,
    'active_callback' => array(
        array(
            'setting'  => 'transparent_header',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
));



// Shop sidebar layout.
Kirki::add_field('potter', array(
    'type'     => 'radio-image',
    'settings' => 'woocommerce_sidebar_layout',
    'label'    => __('Shop Page Sidebar', 'potter'),
    'section'  => 'woocommerce_product_catalog',
    'default'  => 'none',
    'priority' => 0,
    'multiple' => 1,
    'choices'  => array(
        'left'   => POTTER_THEME_URI . '/inc/customizer/img/left-sidebar.png',
        'right' => POTTER_THEME_URI . '/inc/customizer/img/right-sidebar.png',
        'none'  => POTTER_THEME_URI . '/inc/customizer/img/no-sidebar.png',
    ),
));

// Product sidebar layout.
Kirki::add_field('potter', array(
    'type'     => 'radio-image',
    'settings' => 'woocommerce_single_sidebar_layout',
    'label'    => __('Product Page Sidebar', 'potter'),
    'section'  => 'potter_woocommerce_product_options',
    'default'  => 'none',
    'priority' => 1,
    'multiple' => 1,
    'choices'  => array(
        'left'   => POTTER_THEME_URI . '/inc/customizer/img/left-sidebar.png',
        'right' => POTTER_THEME_URI . '/inc/customizer/img/right-sidebar.png',
        'none'  => POTTER_THEME_URI . '/inc/customizer/img/no-sidebar.png',
    ),
));
/* Fields – Menu Item */

// Hide from non WooCommerce pages.
Kirki::add_field( 'potter', array(
	'type'        => 'toggle',
	'settings'    => 'woocommerce_menu_item_hide_if_not_wc',
	'label'       => __( 'Hide from non-Shop Pages', 'potter' ),
	'description' => __( 'Display Menu Item only on WooCommerce related pages', 'potter' ),
	'section'     => 'potter_woocommerce_menu_item_options',
	'default'     => 0,
	'priority'    => 5,
) );

// Turn search into product search.
Kirki::add_field( 'potter', array(
	'type'        => 'toggle',
	'settings'    => 'woocommerce_search_menu_item',
	'label'       => __( 'Product Search', 'potter' ),
	'description' => __( 'Turn the Search Menu Item into a Product Search', 'potter' ),
	'section'     => 'potter_woocommerce_menu_item_options',
	'default'     => 0,
	'priority'    => 5,
) );

// Separator.
Kirki::add_field( 'potter', array(
	'type'     => 'custom',
	'settings' => 'separator-88057',
	'section'  => 'potter_woocommerce_menu_item_options',
	'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority' => 5,
) );

// Menu item.
Kirki::add_field( 'potter', array(
	'type'        => 'radio',
	'settings'    => 'woocommerce_menu_item_desktop',
	'label'       => __( 'Visibility (Desktop)', 'potter' ),
	'description' => __( 'Adds a Cart Icon to your Main Navigation', 'potter' ),
	'section'     => 'potter_woocommerce_menu_item_options',
	'default'     => 'show',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => array(
		'show' => __( 'Show', 'potter' ),
		'hide' => __( 'Hide', 'potter' ),
	),
) );

// Menu item.
Kirki::add_field( 'potter', array(
	'type'        => 'radio',
	'settings'    => 'woocommerce_menu_item_icon',
	'label'       => __( 'Cart Icon Style', 'potter' ),
	'section'     => 'potter_woocommerce_menu_item_options',
	'default'     => 'cart',
	'priority'    => 11,
	'multiple'    => 1,
	'choices'     => array(
		'cart' => __( 'Cart', 'potter' ),
		'basket' => __( 'Basket', 'potter' ),
		'bag' => __( 'Bag', 'potter' ),
	),
) );

// Menu item color.
Kirki::add_field( 'potter', array(
	'type'            => 'color',
	'settings'        => 'woocommerce_menu_item_desktop_color',
	'label'           => __( 'Cart Item Color', 'potter' ),
	'section'         => 'potter_woocommerce_menu_item_options',
	'default'         => '',
	'priority'        => 12,
	'choices'         => array(
		'alpha' => true,
	),
	'active_callback' => array(
		array(
			'setting'  => 'woocommerce_menu_item_desktop',
			'operator' => '!=',
			'value'    => 'hide',
		),
		array(
			'setting'  => 'woocommerce_menu_item_count',
			'operator' => '!=',
			'value'    => 'hide',
		),
	),
) );


// Separator.
Kirki::add_field( 'potter', array(
	'type'     => 'custom',
	'settings' => 'separator-75733',
	'section'  => 'potter_woocommerce_menu_item_options',
	'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority' => 13,
) );

// Mobile menu item.
Kirki::add_field( 'potter', array(
	'type'        => 'radio',
	'settings'    => 'woocommerce_menu_item_mobile',
	'label'       => __( 'Visibility (Mobile)', 'potter' ),
	'description' => __( 'Adds a Cart Icon to your Mobile Navigation', 'potter' ),
	'section'     => 'potter_woocommerce_menu_item_options',
	'default'     => 'show',
	'priority'    => 14,
	'multiple'    => 1,
	'choices'     => array(
		'show' => __( 'Show', 'potter' ),
		'hide' => __( 'Hide', 'potter' ),
	),
) );

// Menu item color.
Kirki::add_field( 'potter', array(
	'type'            => 'color',
	'settings'        => 'woocommerce_menu_item_mobile_color',
	'label'           => __( 'Color', 'potter' ),
	'section'         => 'potter_woocommerce_menu_item_options',
	'default'         => '',
	'priority'        => 15,
	'choices'         => array(
		'alpha' => true,
	),
	'active_callback' => array(
		array(
			'setting'  => 'woocommerce_menu_item_mobile',
			'operator' => '!=',
			'value'    => 'hide',
		),
		array(
			'setting'  => 'woocommerce_menu_item_count',
			'operator' => '!=',
			'value'    => 'hide',
		),
	),
) );

// Separator.
Kirki::add_field( 'potter', array(
	'type'     => 'custom',
	'settings' => 'separator-36652',
	'section'  => 'potter_woocommerce_menu_item_options',
	'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority' => 16,
) );

// Menu item count.
Kirki::add_field( 'potter', array(
	'type'     => 'radio',
	'settings' => 'woocommerce_menu_item_count',
	'label'    => __( 'Count', 'potter' ),
	'section'  => 'potter_woocommerce_menu_item_options',
	'default'  => 'show',
	'priority' => 17,
	'multiple' => 1,
	'choices'  => array(
		'show' => __( 'Show', 'potter' ),
		'hide' => __( 'Hide', 'potter' ),
	),
) );

/* Fields – Shop & Archive Pages (Loop) */

// Custom width.
Kirki::add_field( 'potter', array(
	'type'        => 'dimension',
	'label'       => __( 'Custom Content Width', 'potter' ),
	'settings'    => 'woocommerce_loop_custom_width',
	'section'     => 'woocommerce_product_catalog',
	'description' => __( 'Default: 1200px', 'potter' ),
	'priority'    => 10,
	'transport'   => 'postMessage',
) );

// Separator.
Kirki::add_field( 'potter', array(
	'type'     => 'custom',
	'settings' => 'separator-56123',
	'section'  => 'woocommerce_product_catalog',
	'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority' => 10,
) );

// Remove page title.
Kirki::add_field( 'potter', array(
	'type'     => 'toggle',
	'settings' => 'woocommerce_loop_remove_page_title',
	'label'    => __( 'Hide Page Title', 'potter' ),
	'section'  => 'woocommerce_product_catalog',
	'default'  => 0,
	'priority' => 10,
) );

// Remove breadcrumbs.
Kirki::add_field( 'potter', array(
	'type'     => 'toggle',
	'settings' => 'woocommerce_loop_remove_breadcrumbs',
	'label'    => __( 'Hide Breadcrumbs', 'potter' ),
	'section'  => 'woocommerce_product_catalog',
	'default'  => 0,
	'priority' => 10,
) );

// Remove result count.
Kirki::add_field( 'potter', array(
	'type'     => 'toggle',
	'settings' => 'woocommerce_loop_remove_result_count',
	'label'    => __( 'Hide Result Count', 'potter' ),
	'section'  => 'woocommerce_product_catalog',
	'default'  => 0,
	'priority' => 10,
) );

// Remove ordering.
Kirki::add_field( 'potter', array(
	'type'     => 'toggle',
	'settings' => 'woocommerce_loop_remove_ordering',
	'label'    => __( 'Hide Ordering', 'potter' ),
	'section'  => 'woocommerce_product_catalog',
	'default'  => 0,
	'priority' => 10,
) );

// Separator.
Kirki::add_field( 'potter', array(
	'type'     => 'custom',
	'settings' => 'separator-72124',
	'section'  => 'woocommerce_product_catalog',
	'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority' => 10,
) );


/**
 * Custom controls.
 *
 * @param object $wp_customize The wp_customize object.
 */
function potter_woo_custom_controls_default( $wp_customize ) {

	$wp_customize->add_setting( 'woocommerce_loop_products_per_row_desktop',
		array(
			'default'           => '4',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_setting( 'woocommerce_loop_products_per_row_tablet',
		array(
			'default'           => '2',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_setting( 'woocommerce_loop_products_per_row_mobile',
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control( new POTTER_Customize_Font_Size_Control(
		$wp_customize,
		'woocommerce_loop_products_per_row',
		array(
			'label'    => __( 'Products per Row', 'potter' ),
			'section'  => 'woocommerce_product_catalog',
			'settings' => 'woocommerce_loop_products_per_row_desktop',
			'priority' => 15,
		)
	) );

	$wp_customize->add_control( new POTTER_Customize_Font_Size_Control(
		$wp_customize,
		'woocommerce_loop_products_per_row',
		array(
			'label'    => __( 'Products per Row', 'potter' ),
			'section'  => 'woocommerce_product_catalog',
			'settings' => 'woocommerce_loop_products_per_row_tablet',
			'priority' => 15,
		)
	) );

	$wp_customize->add_control( new POTTER_Customize_Font_Size_Control(
		$wp_customize,
		'woocommerce_loop_products_per_row',
		array(
			'label'    => __( 'Products per Row', 'potter' ),
			'section'  => 'woocommerce_product_catalog',
			'settings' => 'woocommerce_loop_products_per_row_mobile',
			'priority' => 15,
		)
	) );

}
add_action( 'customize_register', 'potter_woo_custom_controls_default' );

// Grid gap.
Kirki::add_field( 'potter', array(
	'type'     => 'select',
	'settings' => 'woocommerce_loop_grid_gap',
	'label'    => __( 'Grid Gap', 'potter' ),
	'section'  => 'woocommerce_product_catalog',
	'default'  => 'large',
	'priority' => 20,
	'multiple' => 1,
	'choices'  => array(
		'small'    => __( 'Small', 'potter' ),
		'medium'   => __( 'Medium', 'potter' ),
		'large'    => __( 'Large', 'potter' ),
		'xlarge'   => __( 'xLarge', 'potter' ),
		'collapse' => __( 'Collapse', 'potter' ),
	),
) );

// Content alignment.
Kirki::add_field( 'potter', array(
	'type'     => 'radio-image',
	'settings' => 'woocommerce_loop_content_alignment',
	'label'    => __( 'Content Alignment', 'potter' ),
	'section'  => 'woocommerce_product_catalog',
	'default'  => 'left',
	'priority' => 20,
	'multiple' => 1,
	'choices'  => array(
		'left'   => POTTER_THEME_URI . '/inc/customizer/img/align-left.png',
		'center' => POTTER_THEME_URI . '/inc/customizer/img/align-center.png',
		'right'  => POTTER_THEME_URI . '/inc/customizer/img/align-right.png',
	),
) );

// Product structure.
Kirki::add_field( 'potter', array(
	'type'     => 'sortable',
	'settings' => 'woocommerce_loop_sortable_content',
	'label'    => __( 'Structure', 'potter' ),
	'section'  => 'woocommerce_product_catalog',
	'default'  => array(
		'category',
		'title',
		'price',
		'add_to_cart',
	),
	'choices'  => array(
		'category'    => __( 'Category', 'potter' ),
		'title'       => __( 'Title', 'potter' ),
		'rating'      => __( 'Rating', 'potter' ),
		'price'       => __( 'Price', 'potter' ),
		'add_to_cart' => __( 'Add to Cart Button', 'potter' ),
		'excerpt'     => __( 'Short Description', 'potter' ),
	),
	'priority' => 20,
) );

// Layout.
Kirki::add_field(
	'potter',
	array(
		'type'     => 'select',
		'settings' => 'woocommerce_loop_layout',
		'label'    => __( 'Layout', 'potter' ),
		'section'  => 'woocommerce_product_catalog',
		'default'  => 'default',
		'priority' => 20,
		'choices'  => array(
			'default' => __( 'Default', 'potter' ),
			'list'    => __( 'List', 'potter' ),
		),
	)
);

// Alignment.
Kirki::add_field( 'potter', array(
	'type'            => 'radio-image',
	'settings'        => 'woocommerce_loop_image_alignment',
	'label'           => __( 'Image Alignment', 'potter' ),
	'section'         => 'woocommerce_product_catalog',
	'default'         => 'left',
	'priority'        => 20,
	'multiple'        => 1,
	'transport'       => 'postMessage',
	'choices'         => array(
		'left'  => POTTER_THEME_URI . '/inc/customizer/img/align-left.png',
		'right' => POTTER_THEME_URI . '/inc/customizer/img/align-right.png',
	),
	'active_callback' => array(
		array(
			'setting'  => 'woocommerce_loop_layout',
			'operator' => '==',
			'value'    => 'list',
		),
	),
) );

// Image container width.
Kirki::add_field( 'potter', array(
	'type'            => 'slider',
	'settings'        => 'woocommerce_loop_image_width',
	'label'           => __( 'Image Width', 'potter' ),
	'section'         => 'woocommerce_product_catalog',
	'priority'        => 20,
	'default'         => 50,
	'transport'       => 'postMessage',
	'choices'         => array(
		'min'  => '25',
		'max'  => '75',
		'step' => '1',
	),
	'active_callback' => array(
		array(
			'setting'  => 'woocommerce_loop_layout',
			'operator' => '==',
			'value'    => 'list',
		),
	),
) );

// Separator.
Kirki::add_field( 'potter', array(
	'type'     => 'custom',
	'settings' => 'separator-56377',
	'section'  => 'woocommerce_product_catalog',
	'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority' => 20,
) );

Kirki::add_field('potter', array(
    'type'     => 'custom',
    'settings' => 'separator-1024',
    'section'  => 'woocommerce_product_catalog',
    'default'  => '<h3 class="setting-header">' . esc_html__( 'Sale Badge Options', 'potter' ) .  '</h3>',
    'priority' => 30,
));
// Sale position.
Kirki::add_field( 'potter', array(
	'type'     => 'select',
	'settings' => 'woocommerce_loop_sale_position',
	'label'    => __( 'Sale Badge', 'potter' ),
	'section'  => 'woocommerce_product_catalog',
	'default'  => 'outside',
	'priority' => 30,
	'multiple' => 1,
	'choices'  => array(
		'outside' => __( 'Outside', 'potter' ),
		'inside'  => __( 'Inside', 'potter' ),
		'none'    => __( 'Hide', 'potter' ),
	),
) );

// Sale layout.
Kirki::add_field( 'potter', array(
	'type'            => 'select',
	'settings'        => 'woocommerce_loop_sale_layout',
	'label'           => __( 'Layout', 'potter' ),
	'section'         => 'woocommerce_product_catalog',
	'default'         => 'round',
	'priority'        => 30,
	'multiple'        => 1,
	'choices'         => array(
		'round'  => __( 'Round', 'potter' ),
		'square' => __( 'Square', 'potter' ),
	),
	'active_callback' => array(
		array(
			'setting'  => 'woocommerce_loop_sale_position',
			'operator' => '!=',
			'value'    => 'none',
		),
	),
) );

// Sale alignment.
Kirki::add_field( 'potter', array(
	'type'            => 'radio-image',
	'settings'        => 'woocommerce_loop_sale_alignment',
	'label'           => __( 'Alignment', 'potter' ),
	'section'         => 'woocommerce_product_catalog',
	'default'         => 'left',
	'priority'        => 30,
	'multiple'        => 1,
	'choices'         => array(
		'left'   => POTTER_THEME_URI . '/inc/customizer/img/align-left.png',
		'center' => POTTER_THEME_URI . '/inc/customizer/img/align-center.png',
		'right'  => POTTER_THEME_URI . '/inc/customizer/img/align-right.png',
	),
	'active_callback' => array(
		array(
			'setting'  => 'woocommerce_loop_sale_position',
			'operator' => '!=',
			'value'    => 'none',
		),
	),
) );

// Sale font size.
Kirki::add_field( 'potter', array(
	'type'            => 'dimension',
	'label'           => __( 'Font Size', 'potter' ),
	'settings'        => 'woocommerce_loop_sale_font_size',
	'section'         => 'woocommerce_product_catalog',
	'transport'       => 'postMessage',
	'priority'        => 30,
	'default'         => '14px',
	'active_callback' => array(
		array(
			'setting'  => 'woocommerce_loop_sale_position',
			'operator' => '!=',
			'value'    => 'none',
		),
	),
) );

// Sale color.
Kirki::add_field( 'potter', array(
	'type'            => 'color',
	'settings'        => 'woocommerce_loop_sale_font_color',
	'label'           => __( 'Font Color', 'potter' ),
	'section'         => 'woocommerce_product_catalog',
	'transport'       => 'postMessage',
	'default'         => '#fff',
	'priority'        => 30,
	'choices'         => array(
		'alpha' => true,
	),
	'active_callback' => array(
		array(
			'setting'  => 'woocommerce_loop_sale_position',
			'operator' => '!=',
			'value'    => 'none',
		),
	),
) );

// Sale background color.
Kirki::add_field( 'potter', array(
	'type'            => 'color',
	'settings'        => 'woocommerce_loop_sale_background_color',
	'label'           => __( 'Background Color', 'potter' ),
	'section'         => 'woocommerce_product_catalog',
	'transport'       => 'postMessage',
	'default'         => '#4fe190',
	'priority'        => 30,
	'choices'         => array(
		'alpha' => true,
	),
	'active_callback' => array(
		array(
			'setting'  => 'woocommerce_loop_sale_position',
			'operator' => '!=',
			'value'    => 'none',
		),
	),
) );

// Separator.
Kirki::add_field( 'potter', array(
	'type'     => 'custom',
	'settings' => 'separator-37611',
	'section'  => 'woocommerce_product_catalog',
	'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority' => 30,
) );

// Title font size.
Kirki::add_field( 'potter', array(
	'type'      => 'dimension',
	'label'     => __( 'Title Font Size', 'potter' ),
	'settings'  => 'woocommerce_loop_title_size',
	'section'   => 'woocommerce_product_catalog',
	'transport' => 'postMessage',
	'priority'  => 30,
	'default'   => '16px',
) );

// Title color.
Kirki::add_field( 'potter', array(
	'type'      => 'color',
	'settings'  => 'woocommerce_loop_title_color',
	'label'     => __( 'Font Color', 'potter' ),
	'section'   => 'woocommerce_product_catalog',
	'transport' => 'postMessage',
	'default'   => '#3e4349',
	'priority'  => 30,
	'choices'   => array(
		'alpha' => true,
	),
) );

// Separator.
Kirki::add_field( 'potter', array(
	'type'     => 'custom',
	'settings' => 'separator-58256',
	'section'  => 'woocommerce_product_catalog',
	'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority' => 30,
) );

// Price font size.
Kirki::add_field( 'potter', array(
	'type'      => 'dimension',
	'label'     => __( 'Price Font Size', 'potter' ),
	'settings'  => 'woocommerce_loop_price_size',
	'section'   => 'woocommerce_product_catalog',
	'transport' => 'postMessage',
	'priority'  => 30,
	'default'   => '16px',
) );

// Price color.
Kirki::add_field( 'potter', array(
	'type'      => 'color',
	'settings'  => 'woocommerce_loop_price_color',
	'label'     => __( 'Font Color', 'potter' ),
	'section'   => 'woocommerce_product_catalog',
	'transport' => 'postMessage',
	'default'   => '#3e4349',
	'priority'  => 30,
	'choices'   => array(
		'alpha' => true,
	),
) );

// Separator.
Kirki::add_field( 'potter', array(
	'type'     => 'custom',
	'settings' => 'separator-91969',
	'section'  => 'woocommerce_product_catalog',
	'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority' => 30,
) );

// Out of stock notice.
Kirki::add_field( 'potter', array(
	'type'     => 'select',
	'settings' => 'woocommerce_loop_out_of_stock_notice',
	'label'    => __( 'Out of Stock Notice', 'potter' ),
	'section'  => 'woocommerce_product_catalog',
	'default'  => 'show',
	'priority' => 30,
	'multiple' => 1,
	'choices'  => array(
		'show' => __( 'Show', 'potter' ),
		'hide' => __( 'Hide', 'potter' ),
	),
) );

// Out of stock font size.
Kirki::add_field( 'potter', array(
	'type'            => 'dimension',
	'label'           => __( 'Font Size', 'potter' ),
	'settings'        => 'woocommerce_loop_out_of_stock_font_size',
	'section'         => 'woocommerce_product_catalog',
	'transport'       => 'postMessage',
	'priority'        => 30,
	'default'         => '14px',
	'active_callback' => array(
		array(
			'setting'  => 'woocommerce_loop_out_of_stock_notice',
			'operator' => '!=',
			'value'    => 'hide',
		),
	),
) );

// Out of stock color.
Kirki::add_field( 'potter', array(
	'type'            => 'color',
	'settings'        => 'woocommerce_loop_out_of_stock_font_color',
	'label'           => __( 'Font Color', 'potter' ),
	'section'         => 'woocommerce_product_catalog',
	'transport'       => 'postMessage',
	'default'         => '#fff',
	'priority'        => 30,
	'choices'         => array(
		'alpha' => true,
	),
	'active_callback' => array(
		array(
			'setting'  => 'woocommerce_loop_out_of_stock_notice',
			'operator' => '!=',
			'value'    => 'hide',
		),
	),
) );

// Out of stock background color.
Kirki::add_field( 'potter', array(
	'type'            => 'color',
	'settings'        => 'woocommerce_loop_out_of_stock_background_color',
	'label'           => __( 'Background Color', 'potter' ),
	'section'         => 'woocommerce_product_catalog',
	'transport'       => 'postMessage',
	'default'         => 'rgba(0,0,0,.7)',
	'priority'        => 30,
	'choices'         => array(
		'alpha' => true,
	),
	'active_callback' => array(
		array(
			'setting'  => 'woocommerce_loop_out_of_stock_notice',
			'operator' => '!=',
			'value'    => 'hide',
		),
	),
) );

/* Fields – Product Page */

$product_priority = 0;

// Custom width.
Kirki::add_field( 'potter', array(
	'type'        => 'dimension',
	'label'       => __( 'Custom Content Width', 'potter' ),
	'settings'    => 'woocommerce_single_custom_width',
	'section'     => 'potter_woocommerce_product_options',
	'description' => __( 'Default: 1200px', 'potter' ),
	'priority'    => $product_priority++,
	'transport'   => 'postMessage',
) );


// Alignment.
Kirki::add_field( 'potter', array(
	'type'      => 'radio-image',
	'settings'  => 'woocommerce_single_alignment',
	'label'     => __( 'Image Alignment', 'potter' ),
	'section'   => 'potter_woocommerce_product_options',
	'default'   => 'left',
	'priority'  => $product_priority++,
	'multiple'  => 1,
	'transport' => 'postMessage',
	'choices'   => array(
		'left'  => POTTER_THEME_URI . '/inc/customizer/img/align-left.png',
		'right' => POTTER_THEME_URI . '/inc/customizer/img/align-right.png',
	),
) );

// Image container width.
Kirki::add_field( 'potter', array(
	'type'      => 'slider',
	'settings'  => 'woocommerce_single_image_width',
	'label'     => __( 'Image Width', 'potter' ),
	'section'   => 'potter_woocommerce_product_options',
	'priority'  => $product_priority++,
	'default'   => 50,
	'transport' => 'postMessage',
	'choices'   => array(
		'min'  => '25',
		'max'  => '75',
		'step' => '1',
	),
) );

// Summary separator.
Kirki::add_field( 'potter', array(
	'type'     => 'select',
	'settings' => 'woocommerce_single_summary_separator',
	'label'    => __( 'Summary Separator', 'potter' ),
	'section'  => 'potter_woocommerce_product_options',
	'default'  => 'hide',
	'priority' => $product_priority++,
	'choices'  => array(
		'hide' => __( 'Hide', 'potter' ),
		'show' => __( 'Show', 'potter' ),
	),
) );

// Price font size.
Kirki::add_field( 'potter', array(
	'type'      => 'dimension',
	'label'     => __( 'Price Font Size', 'potter' ),
	'settings'  => 'woocommerce_single_price_size',
	'section'   => 'potter_woocommerce_product_options',
	'transport' => 'postMessage',
	'priority'  => $product_priority++,
	'default'   => '22px',
) );

// Price color.
Kirki::add_field( 'potter', array(
	'type'      => 'color',
	'settings'  => 'woocommerce_single_price_color',
	'label'     => __( 'Font Color', 'potter' ),
	'section'   => 'potter_woocommerce_product_options',
	'transport' => 'postMessage',
	'default'   => '#3e4349',
	'priority'  => $product_priority++,
	'choices'   => array(
		'alpha' => true,
	),
) );

// Separator.
Kirki::add_field( 'potter', array(
	'type'     => 'custom',
	'settings' => 'separator-45153',
	'section'  => 'potter_woocommerce_product_options',
	'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority' => $product_priority++,
) );

// Tabs layout.
Kirki::add_field( 'potter', array(
	'type'     => 'select',
	'settings' => 'woocommerce_single_tabs',
	'label'    => __( 'Tabs Layout', 'potter' ),
	'section'  => 'potter_woocommerce_product_options',
	'default'  => 'default',
	'priority' => $product_priority++,
	'multiple' => 1,
	'choices'  => array(
		'default' => __( 'Default', 'potter' ),
		'modern'  => __( 'Modern', 'potter' ),
	),
) );

// Tabs headlines.
Kirki::add_field( 'potter', array(
	'type'     => 'select',
	'settings' => 'woocommerce_single_tabs_remove_headline',
	'label'    => __( 'Headlines', 'potter' ),
	'section'  => 'potter_woocommerce_product_options',
	'default'  => 'show',
	'priority' => $product_priority++,
	'choices'  => array(
		'hide' => __( 'Hide', 'potter' ),
		'show' => __( 'Show', 'potter' ),
	),
) );

// Tabs font size.
Kirki::add_field( 'potter', array(
	'type'      => 'dimension',
	'label'     => __( 'Font Size', 'potter' ),
	'settings'  => 'woocommerce_single_tabs_font_size',
	'section'   => 'potter_woocommerce_product_options',
	'transport' => 'postMessage',
	'priority'  => $product_priority++,
	'default'   => '16px',
) );

// Tabs font color.
Kirki::add_field( 'potter', array(
	'type'     => 'color',
	'settings' => 'woocommerce_single_tabs_font_color',
	'label'    => __( 'Font Color', 'potter' ),
	'section'  => 'potter_woocommerce_product_options',
	'default'  => '#3e4349',
	'priority' => $product_priority++,
	'choices'  => array(
		'alpha' => true,
	),
) );

// Tabs hover color.
Kirki::add_field( 'potter', array(
	'type'     => 'color',
	'settings' => 'woocommerce_single_tabs_font_color_alt',
	'label'    => __( 'Hover', 'potter' ),
	'section'  => 'potter_woocommerce_product_options',
	'default'  => '',
	'priority' => $product_priority++,
	'choices'  => array(
		'alpha' => true,
	),
) );

// Tabs active color.
Kirki::add_field( 'potter', array(
	'type'     => 'color',
	'settings' => 'woocommerce_single_tabs_font_color_active',
	'label'    => __( 'Active', 'potter' ),
	'section'  => 'potter_woocommerce_product_options',
	'default'  => '',
	'priority' => $product_priority++,
	'choices'  => array(
		'alpha' => true,
	),
) );

// Tabs background color.
Kirki::add_field( 'potter', array(
	'type'            => 'color',
	'settings'        => 'woocommerce_single_tabs_background_color',
	'label'           => __( 'Background Color', 'potter' ),
	'section'         => 'potter_woocommerce_product_options',
	'default'         => '#e7e7ec',
	'priority'        => $product_priority++,
	'choices'         => array(
		'alpha' => true,
	),
	'active_callback' => array(
		array(
			'setting'  => 'woocommerce_single_tabs',
			'operator' => '!=',
			'value'    => 'modern',
		),
	),
) );

// Tabs background color alt.
Kirki::add_field( 'potter', array(
	'type'            => 'color',
	'settings'        => 'woocommerce_single_tabs_background_color_alt',
	'label'           => __( 'Hover', 'potter' ),
	'section'         => 'potter_woocommerce_product_options',
	'default'         => '#f5f5f7',
	'priority'        => $product_priority++,
	'choices'         => array(
		'alpha' => true,
	),
	'active_callback' => array(
		array(
			'setting'  => 'woocommerce_single_tabs',
			'operator' => '!=',
			'value'    => 'modern',
		),
	),
) );

// Tabs background color active.
Kirki::add_field( 'potter', array(
	'type'            => 'color',
	'settings'        => 'woocommerce_single_tabs_background_color_active',
	'label'           => __( 'Active', 'potter' ),
	'section'         => 'potter_woocommerce_product_options',
	'default'         => '#ffffff',
	'priority'        => $product_priority++,
	'choices'         => array(
		'alpha' => true,
	),
	'active_callback' => array(
		array(
			'setting'  => 'woocommerce_single_tabs',
			'operator' => '!=',
			'value'    => 'modern',
		),
	),
) );

// Separator.
Kirki::add_field( 'potter', array(
	'type'     => 'custom',
	'settings' => 'separator-9987953',
	'section'  => 'potter_woocommerce_product_options',
	'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority' => $product_priority++,
) );

// Single add to cart ajax.
Kirki::add_field( 'potter', array(
	'type'     => 'toggle',
	'settings' => 'woocommerce_single_add_to_cart_ajax',
	'label'    => __( 'Enable AJAX add to cart button', 'potter' ),
	'section'  => 'potter_woocommerce_product_options',
	'priority' => $product_priority++,
	'default'  => false,
) );

/* Fields – Checkout Page */

// Alignment.
Kirki::add_field( 'potter', array(
	'type'     => 'select',
	'settings' => 'woocommerce_checkout_layout',
	'label'    => __( 'Layout', 'potter' ),
	'section'  => 'woocommerce_checkout',
	'default'  => 'default',
	'priority' => 1,
	'multiple' => 1,
	'choices'  => array(
		'default' => __( 'Default', 'potter' ),
		'side'    => __( 'Side by Side', 'potter' ),
	),
) );

// Separator.
Kirki::add_field( 'potter', array(
	'type'     => 'custom',
	'settings' => 'separator-82245',
	'section'  => 'woocommerce_checkout',
	'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority' => 2,
) );

/* Fields – Messages/Notices */

// Separator.
Kirki::add_field( 'potter', array(
	'type'     => 'custom',
	'settings' => 'separator-06205833',
	'section'  => 'woocommerce_store_notice',
	'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority' => 100,
) );

// Store notice color.
Kirki::add_field( 'potter', array(
	'type'     => 'color',
	'settings' => 'woocommerce_store_notice_color',
	'label'    => __( 'Store Notice', 'potter' ),
	'section'  => 'woocommerce_store_notice',
	'default'  => '',
	'priority' => 100,
	'choices'  => array(
		'alpha' => true,
	),
) );

// Info color.
Kirki::add_field( 'potter', array(
	'type'     => 'color',
	'settings' => 'woocommerce_info_notice_color',
	'label'    => __( 'Info Notice', 'potter' ),
	'section'  => 'woocommerce_store_notice',
	'default'  => '',
	'priority' => 100,
	'choices'  => array(
		'alpha' => true,
	),
) );

// Success color.
Kirki::add_field( 'potter', array(
	'type'     => 'color',
	'settings' => 'woocommerce_message_notice_color',
	'label'    => __( 'Success Notice', 'potter' ),
	'section'  => 'woocommerce_store_notice',
	'default'  => '',
	'priority' => 100,
	'choices'  => array(
		'alpha' => true,
	),
) );

// Error color.
Kirki::add_field( 'potter', array(
	'type'     => 'color',
	'settings' => 'woocommerce_error_notice_color',
	'label'    => __( 'Error Notice', 'potter' ),
	'section'  => 'woocommerce_store_notice',
	'default'  => '',
	'priority' => 100,
	'choices'  => array(
		'alpha' => true,
	),
) );
