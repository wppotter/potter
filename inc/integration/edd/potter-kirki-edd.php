<?php
/**
 * Easy Digital Downloads customizer settings.
 *
 * @package Potter
 * @subpackage Integration/EDD
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

// Textdomain. This is required, otherwise strings aren't translateable.
load_theme_textdomain( 'potter' );

/* Panels */

// Easy Digital Downloads.
Kirki::add_panel( 'edd_panel', array(
	'priority' => 5,
	'title'    => __( 'Easy Digital Downloads', 'potter' ),
) );

/* Sections */

// Menu item.
Kirki::add_section( 'potter_edd_menu_item_options', array(
	'title'    => __( 'Menu Item', 'potter' ),
	'panel'    => 'edd_panel',
	'priority' => 1,
) );

// Sidebar.
Kirki::add_section( 'potter_edd_sidebar_options', array(
	'title'    => __( 'Sidebar', 'potter' ),
	'panel'    => 'edd_panel',
	'priority' => 2,
) );

/* Fields – Sidebar */

// Shop sidebar layout.
Kirki::add_field( 'potter', array(
	'type'     => 'radio',
	'settings' => 'edd_sidebar_layout',
	'label'    => __( 'Shop Page Sidebar', 'potter' ),
	'section'  => 'potter_edd_sidebar_options',
	'default'  => 'global',
	'priority' => 0,
	'multiple' => 1,
	'choices'  => array(
		'global' => __( 'Inherit Global Settings', 'potter' ),
		'right'  => __( 'Right', 'potter' ),
		'left'   => __( 'Left', 'potter' ),
		'none'   => __( 'No Sidebar', 'potter' ),
	),
) );

// Product sidebar layout.
Kirki::add_field( 'potter', array(
	'type'     => 'radio',
	'settings' => 'edd_single_sidebar_layout',
	'label'    => __( 'Product Page Sidebar', 'potter' ),
	'section'  => 'potter_edd_sidebar_options',
	'default'  => 'global',
	'priority' => 0,
	'multiple' => 1,
	'choices'  => array(
		'global' => __( 'Inherit Global Settings', 'potter' ),
		'right'  => __( 'Right', 'potter' ),
		'left'   => __( 'Left', 'potter' ),
		'none'   => __( 'No Sidebar', 'potter' ),
	),
) );

/* Fields – Menu Item */

// Hide from non-EDD pages.
Kirki::add_field( 'potter', array(
	'type'        => 'toggle',
	'settings'    => 'edd_menu_item_hide_if_not_edd',
	'label'       => __( 'Hide from non-Shop Pages', 'potter' ),
	'description' => __( 'Display Menu Item only on EDD related pages', 'potter' ),
	'section'     => 'potter_edd_menu_item_options',
	'default'     => 0,
	'priority'    => 5,
) );

// Separator.
Kirki::add_field( 'potter', array(
	'type'     => 'custom',
	'settings' => 'separator-76314',
	'section'  => 'potter_edd_menu_item_options',
	'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority' => 5,
) );

// Menu item.
Kirki::add_field( 'potter', array(
	'type'        => 'radio',
	'settings'    => 'edd_menu_item_desktop',
	'label'       => __( 'Visibility (Desktop)', 'potter' ),
	'description' => __( 'Adds a Cart Icon to your Main Navigation', 'potter' ),
	'section'     => 'potter_edd_menu_item_options',
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
	'settings'    => 'edd_menu_item_icon',
	'label'       => __( 'Choose Icon Style', 'potter' ),
	'section'     => 'potter_edd_menu_item_options',
	'default'     => 'cart',
	'priority'    => 11,
	'multiple'    => 1,
	'choices'     => array(
		'cart' => __( 'Cart', 'potter' ),
		'basket' => __( 'Basket', 'potter' ),
		'bag' => __( 'Bag', 'potter' ),
	),
) );

Kirki::add_field('potter', array(
    'type'            => 'checkbox',
    'settings'        => 'dtheader_single_download',
    'label'           => __('Disable On (EDD)Single Download?', 'potter'),
    'section'         => 'potter_transparent_header_options',
    'default'         => false,
    'priority'        => 6,
    'active_callback' => array(
        array(
            'setting'  => 'transparent_header',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
));

// Menu item color.
Kirki::add_field( 'potter', array(
	'type'            => 'color',
	'settings'        => 'edd_menu_item_desktop_color',
	'label'           => __( 'Color', 'potter' ),
	'section'         => 'potter_edd_menu_item_options',
	'default'         => '',
	'priority'        => 12,
	'choices'         => array(
		'alpha' => true,
	),
	'active_callback' => array(
		array(
			'setting'  => 'edd_menu_item_desktop',
			'operator' => '!=',
			'value'    => 'hide',
		),
		array(
			'setting'  => 'edd_menu_item_count',
			'operator' => '!=',
			'value'    => 'hide',
		),
	),
) );

// Separator.
Kirki::add_field( 'potter', array(
	'type'     => 'custom',
	'settings' => 'separator-71253',
	'section'  => 'potter_edd_menu_item_options',
	'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority' => 13,
) );

// Mobile menu item.
Kirki::add_field( 'potter', array(
	'type'        => 'radio',
	'settings'    => 'edd_menu_item_mobile',
	'label'       => __( 'Visibility (Mobile)', 'potter' ),
	'description' => __( 'Adds a Cart Icon to your Mobile Navigation', 'potter' ),
	'section'     => 'potter_edd_menu_item_options',
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
	'settings'        => 'edd_menu_item_mobile_color',
	'label'           => __( 'Color', 'potter' ),
	'section'         => 'potter_edd_menu_item_options',
	'default'         => '',
	'priority'        => 15,
	'choices'         => array(
		'alpha' => true,
	),
	'active_callback' => array(
		array(
			'setting'  => 'edd_menu_item_mobile',
			'operator' => '!=',
			'value'    => 'hide',
		),
		array(
			'setting'  => 'edd_menu_item_count',
			'operator' => '!=',
			'value'    => 'hide',
		),
	),
) );

// Separator.
Kirki::add_field( 'potter', array(
	'type'     => 'custom',
	'settings' => 'separator-51073',
	'section'  => 'potter_edd_menu_item_options',
	'default'  => '<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority' => 16,
) );

// Menu item count.
Kirki::add_field( 'potter', array(
	'type'     => 'radio',
	'settings' => 'edd_menu_item_count',
	'label'    => __( 'Count', 'potter' ),
	'section'  => 'potter_edd_menu_item_options',
	'default'  => 'show',
	'priority' => 17,
	'multiple' => 1,
	'choices'  => array(
		'show' => __( 'Show', 'potter' ),
		'hide' => __( 'Hide', 'potter' ),
	),
) );
