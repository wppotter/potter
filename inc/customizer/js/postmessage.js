( function( $ ) {

	/* Layout */

	// Boxed margin.
	wp.customize( 'page_boxed_margin', function( value ) {
		value.bind( function( newval ) {
			$('.potter-page').css('margin-top', newval + 'px' ).css('margin-bottom', newval + 'px' );
		} );
	} );




	// Boxed padding.
	wp.customize( 'page_boxed_padding', function( value ) {
		value.bind( function( newval ) {
			$('.potter-container').css('padding-left', newval + 'px' ).css('padding-right', newval + 'px' );
		} );
	} );

	// Boxed background color.
	wp.customize( 'page_boxed_background', function( value ) {
		value.bind( function( newval ) {
			$('.potter-page').css('background-color', newval );
		} );
	} );

	// ScrollTop background color.
	wp.customize( 'scrolltop_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.scrolltop').css('background', newval );
		} );
	} );

	// ScrollTop border radius.
	wp.customize( 'scrolltop_border_radius', function( value ) {
		value.bind( function( newval ) {
			$('.scrolltop').css('border-radius', newval + 'px' );
		} );
	} );

	/* Menu */

	// Font size.
	wp.customize( 'menu_font_size', function( value ) {
		value.bind( function( newval ) {
			var suffix = '';
			if( $.isNumeric( newval ) ) {
				suffix = 'px';
			};
			$('.potter-menu a, .potter-mobile-menu a').css('font-size', newval + suffix );
		} );
	} );

	/* Sub Menu */

	// Background color.
	wp.customize( 'sub_menu_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.potter-sub-menu > .menu-item-has-children:not(.potter-mega-menu) .sub-menu li, .potter-sub-menu > .potter-mega-menu > .sub-menu').css('background-color', newval );
		} );
	} );

	// Accent color.
	wp.customize( 'sub_menu_accent_color', function( value ) {
		value.bind( function( newval ) {
			$('.potter-menu .sub-menu a').css('color', newval );
		} );
	} );

	// Font size.
	wp.customize( 'sub_menu_font_size', function( value ) {
		value.bind( function( newval ) {
			var suffix = '';
			if( $.isNumeric( newval ) ) {
				suffix = 'px';
			};
			$('.potter-menu .sub-menu a').css('font-size', newval + suffix );
		} );
	} );

	/* Mobile Navigation */

	// Hamburger size.
	wp.customize( 'mobile_menu_hamburger_size', function( value ) {
		value.bind( function( newval ) {
			$('.potter-mobile-nav-item').css('font-size', newval + 'px' );
		} );
	} );

	// Hamburger border radius (filled).
	wp.customize( 'mobile_menu_hamburger_border_radius', function( value ) {
		value.bind( function( newval ) {
			$('.potter-mobile-nav-item').css('border-radius', newval + 'px' );
		} );
	} );

	/* Logo */

	// Container width.
	wp.customize( 'menu_logo_container_width', function( value ) {
		value.bind( function( newval ) {
			var calculation = 100-newval;
			$('.potter-navigation .potter-1-4').css('width', newval + '%' );
			$('.potter-navigation .potter-3-4').css('width', calculation + '%' );
		} );
	} );

	// Mobile container width.
	wp.customize( 'mobile_menu_logo_container_width', function( value ) {
		value.bind( function( newval ) {
			var calculation = 100-newval;
			$('.potter-navigation .potter-2-3').css('width', newval + '%' );
			$('.potter-navigation .potter-1-3').css('width', calculation + '%' );
		} );
	} );

	/* Tagline */

	// Font color.
	wp.customize( 'menu_logo_description_color', function( value ) {
		value.bind( function( newval ) {
			$('.potter-tagline').css('color', newval );
		} );
	} );

	// Font size.
	wp.customize( 'menu_logo_description_font_size', function( value ) {
		value.bind( function( newval ) {
			$('.potter-tagline').css('font-size', newval );
		} );
	} );

	/* Mobile Menu */

	// Height.
	wp.customize( 'mobile_menu_height', function( value ) {
		value.bind( function( newval ) {
			$('.potter-mobile-nav-wrapper').css('padding-top', newval + 'px' ).css('padding-bottom', newval + 'px' );
		} );
	} );


	// Height.
	wp.customize( 'single_post_header_bg_height', function( value ) {
		value.bind( function( newval ) {
			$('.sigle-blog-title-bar .title-bar').css('padding-top', newval + 'px' ).css('padding-bottom', newval + 'px' );
		} );
	} );
	// Sub menu arrow color.
	wp.customize( 'mobile_menu_submenu_arrow_color', function( value ) {
		value.bind( function( newval ) {
			$('.potter-submenu-toggle').css('color', newval );
		} );
	} );

	/* Pre Header */

	// Width.
	wp.customize( 'pre_header_width', function( value ) {
		value.bind( function( newval ) {
			if( newval == '' ) {
				newval = '1200px';
			}
			$('.potter-inner-pre-header').css('max-width', newval );
		} );
	} );

	wp.customize( 'menu_width', function( value ) {
		value.bind( function( newval ) {
			if( newval == '' ) {
				newval = '1200px';
			}
			$('.potter-nav-wrapper').css('max-width', newval );
		} );
	} );

	wp.customize( 'page_max_width', function( value ) {
		value.bind( function( newval ) {
			if( newval == '' ) {
				newval = '1200px';
			}
			$('.potter-container').css('max-width', newval );
		} );
	} );

	// Height.
	wp.customize( 'pre_header_height', function( value ) {
		value.bind( function( newval ) {
			$('.potter-inner-pre-header').css('padding-top', newval + 'px' ).css('padding-bottom', newval + 'px' );
		} );
	} );

	// Background color.
	wp.customize( 'pre_header_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.potter-pre-header').css('background-color', newval );
		} );
	} );

	// Font color.
	wp.customize( 'pre_header_font_color', function( value ) {
		value.bind( function( newval ) {
			$('.potter-pre-header').css('color', newval );
		} );
	} );

	// Font size.
	wp.customize( 'pre_header_font_size', function( value ) {
		value.bind( function( newval ) {
			var suffix = '';
			if( $.isNumeric( newval ) ) {
				suffix = 'px';
			};
			$('.potter-pre-header, .potter-pre-header .potter-menu, .potter-pre-header .potter-menu .sub-menu a').css('font-size', newval + suffix );
		} );
	} );

	// border-heaight.
	wp.customize( 'pre_header_border_top_width', function( value ) {
		value.bind( function( newval ) {
			$('.potter-pre-header').css('border-top-width', newval + 'px' ).css('border-top-type', 'solid');
		} );
	} );
	// border-color.
	wp.customize( 'pre_header_top_border_color', function( value ) {
		value.bind( function( newval ) {
			$('.potter-pre-header').css('border-top-color', newval );
		} );
	} );

	// border-heaight.
	wp.customize( 'pre_header_border_bottom_width', function( value ) {
		value.bind( function( newval ) {
			$('.potter-pre-header').css('border-bottom-width', newval + 'px' ).css('border-bottom-type', 'solid');
		} );
	} );
	// border-color.
	wp.customize( 'pre_header_bottom_border_color', function( value ) {
		value.bind( function( newval ) {
			$('.potter-pre-header').css('border-bottom-color', newval );
		} );
	} );


	// border-heaight.
	wp.customize( 'nav_bar_border_top_width', function( value ) {
		value.bind( function( newval ) {
			$('.potter-navigation').css('border-top-width', newval + 'px' ).css('border-top-type', 'solid');
		} );
	} );
	// border-color.
	wp.customize( 'nav_bar_top_border_color', function( value ) {
		value.bind( function( newval ) {
			$('.potter-navigation').css('border-top-color', newval );
		} );
	} );

	// border-heaight.
	wp.customize( 'nav_bar_border_bottom_width', function( value ) {
		value.bind( function( newval ) {
			$('.potter-navigation').css('border-bottom-width', newval ).css('border-bottom-type', 'solid');
		} );
	} );
	// border-color.
	wp.customize( 'nav_bar_bottom_border_color', function( value ) {
		value.bind( function( newval ) {
			$('.potter-navigation').css('border-bottom-color', newval );
		} );
	} );


	// title bar height.
	wp.customize( 'title_bar_height', function( value ) {
		value.bind( function( newval ) {
			$('.default-title-bar .title-bar').css('padding-top', newval + 'px' ).css('padding-bottom', newval + 'px');
		} );
	} );
	// title bar top padding.
	wp.customize( 'title_bar_top_padding', function( value ) {
		value.bind( function( newval ) {
			$('.transparent-header .default-title-bar .title-bar').css('padding-top', newval + 'px' );
		} );
	} );

	// shop title bar top padding.
	wp.customize( 'shop_header_top_padding', function( value ) {
		value.bind( function( newval ) {
			$('.default-shop-title-bar .title-bar').css('padding-top', newval + 'px' );
		} );
	} );

	// shop title bar top padding.
	wp.customize( 'shop_header_bottom_padding', function( value ) {
		value.bind( function( newval ) {
			$('.default-shop-title-bar .title-bar').css('padding-bottom', newval + 'px' );
		} );
	} );
	// shop title bar top padding.
	wp.customize( 'blog_header_top_padding', function( value ) {
		value.bind( function( newval ) {
			$('.blog-page-title-bar .title-bar').css('padding-top', newval + 'px' );
		} );
	} );

	// shop title bar top padding.
	wp.customize( 'blog_header_bottom_padding', function( value ) {
		value.bind( function( newval ) {
			$('.blog-page-title-bar .title-bar').css('padding-bottom', newval + 'px' );
		} );
	} );

	/* Blog – Pagination */

	// Border radius.
	wp.customize( 'blog_pagination_border_radius', function( value ) {
		value.bind( function( newval ) {
			$('.pagination .page-numbers').css('border-radius', newval + 'px' );
		} );
	} );

	// Background color.
	wp.customize( 'blog_pagination_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.pagination .page-numbers:not(.current)').css('background', newval );
		} );
	} );

	// Background color active.
	wp.customize( 'blog_pagination_background_color_active', function( value ) {
		value.bind( function( newval ) {
			$('.pagination .page-numbers.current').css('background', newval );
		} );
	} );

	// Font color.
	wp.customize( 'blog_pagination_font_color', function( value ) {
		value.bind( function( newval ) {
			$('.pagination .page-numbers:not(.current)').css('color', newval );
		} );
	} );

	// Font color active.
	wp.customize( 'blog_pagination_font_color_active', function( value ) {
		value.bind( function( newval ) {
			$('.pagination .page-numbers.current').css('color', newval );
		} );
	} );

	// Font size.
	wp.customize( 'blog_pagination_font_size', function( value ) {
		value.bind( function( newval ) {
			var suffix = '';
			if( $.isNumeric( newval ) ) {
				suffix = 'px';
			};
			$('.pagination .page-numbers').css('font-size', newval + suffix );
		} );
	} );

	/* Sidebar */

	// Width.
	wp.customize( 'sidebar_width', function( value ) {
		value.bind( function( newval ) {
			$('.potter-sidebar-wrapper').css('width', newval + '%' );
			$('.potter-main').css('width', 100 - newval + '%' );
		} );
	} );

	// Background color.
	wp.customize( 'sidebar_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.potter-sidebar .widget, .elementor-widget-sidebar .widget').css('background-color', newval );
		} );
	} );
	// Background color.
	wp.customize( 'widget_corner', function( value ) {
		value.bind( function( newval ) {
			$('.potter-sidebar .widget, .elementor-widget-sidebar .widget').css('border-radius', newval + 'px' );
		} );
	} );

	/* Buttons */


	// Border width.
	wp.customize( 'button_border_width', function( value ) {
		value.bind( function( newval ) {
			$('.potter-button, input[type="submit"]').css('border-width', newval + 'px' ).css('border-type', 'solid' );
		} );
	} );

	// Border color.
	wp.customize( 'button_border_color', function( value ) {
		value.bind( function( newval ) {
			$('.potter-button, input[type="submit"]').css('border-color', newval );
		} );
	} );

	/* Breadcrumbs */

	// Background color.
	wp.customize( 'breadcrumbs_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.title-bar-after-header').css('background', newval );
		} );
	} );

	// Alignment.
	wp.customize( 'breadcrumbs_alignment', function( value ) {
		value.bind( function( newval ) {
			$('.title-bar-before-content').css('text-align', newval );
		} );
	} );

	// Font color.
	wp.customize( 'breadcrumbs_font_color', function( value ) {
		value.bind( function( newval ) {
			$('.title-bar-after-header').css('color', newval );
			$('.title-bar-after-header h1').css('color', newval );
		} );
	} );

	// Accent color.
	wp.customize( 'breadcrumbs_accent_color', function( value ) {
		value.bind( function( newval ) {
			$('.title-bar-after-header a').css('color', newval );
		} );
	} );

	wp.customize( 'page_title_bar_top_padding', function( value ) {
		value.bind( function( newval ) {
			$('.title-bar-after-header').css('padding-top', newval + 'px' );
		} );
	} );
	wp.customize( 'page_title_bar_bottom_padding', function( value ) {
		value.bind( function( newval ) {
			$('.title-bar-after-header').css('padding-bottom', newval + 'px' );
		} );
	} );
	wp.customize( 'page_title_font_size', function( value ) {
		value.bind( function( newval ) {
			$('.title-bar-after-header h1').css('font-size', newval + 'px' );
			$('.title-bar-before-content h1').css('font-size', newval + 'px' );
			$('.default-title-bar-archive h1, .woocommerce-products-header h1').css('font-size', newval + 'px' );
		} );
	} );

	/* icon Size */

	wp.customize( 'col_one_icon_link_size', function( value ) {
		value.bind( function( newval ) {
			$('.potter-inner-pre-header .left-column.icon-links a').css('font-size', newval + 'px' );
		} );
	} );

	wp.customize( 'col_one_icon_link_size_col2', function( value ) {
		value.bind( function( newval ) {
			$('.potter-inner-pre-header .right-column.icon-links a').css('font-size', newval + 'px' );
		} );
	} );

	wp.customize( 'icon_link_size_footer_col1', function( value ) {
		value.bind( function( newval ) {
			$('.bottom-footer .left-column a').css('font-size', newval + 'px' );
		} );
	} );
	wp.customize( 'icon_link_size_footer_col2', function( value ) {
		value.bind( function( newval ) {
			$('.bottom-footer .right-column a').css('font-size', newval + 'px' );
		} );
	} );
/* off canvas */
wp.customize( 'off_canvas_menu_width', function( value ) {
	value.bind( function( newval ) {
		$('.potter-menu-off-canvas').css('width', newval + 'px' );
	} );
} );
wp.customize( 'off_canvas_background_color', function( value ) {
	value.bind( function( newval ) {
		$('.potter-menu-off-canvas').css('background', newval );
	} );
} );
wp.customize( 'off_canvas_overlay_color', function( value ) {
	value.bind( function( newval ) {
		$('.potter-menu-overlay.menu-overlay-visible').css('background', newval );
	} );
} );

wp.customize( 'off_canvas_menu_color', function( value ) {
	value.bind( function( newval ) {
		$('.potter-menu-off-canvas ul li a').css('color', newval );
	} );
} );
wp.customize( 'off_canvas_menu_active_color', function( value ) {
	value.bind( function( newval ) {
		$('.potter-menu-off-canvas ul li.current_page_item > a').css('color', newval );
	} );
} );


wp.customize( 'off_canvas_close_button_color', function( value ) {
	value.bind( function( newval ) {
		$('.potter-menu-off-canvas .potter-close').css('color', newval );
	} );
} );

wp.customize( 'off_canvas_menu_separator_color', function( value ) {
	value.bind( function( newval ) {
		$('.potter-menu-off-canvas .potter-menu > li').css('border-bottom-color', newval );
	} );
} );

wp.customize( 'off_canvas_menu_item_spacing', function( value ) {
	value.bind( function( newval ) {
		$('.potter-menu-off-canvas .potter-menu > li').css('padding-top', newval + 'px' ).css('padding-bottom', newval + 'px' );
	} );
} );

wp.customize( 'off_canvas_menu_font_size', function( value ) {
	value.bind( function( newval ) {
		$('.potter-menu-off-canvas .potter-menu > li > a').css('font-size', newval + 'px' );
	} );
} );

/* burger menu design */

wp.customize( 'burger_menu_color', function( value ) {
	value.bind( function( newval ) {
		$('#potter-menu-toggle').css('color', newval );
	} );
} );
wp.customize( 'burger_menu_background_color', function( value ) {
	value.bind( function( newval ) {
		$('#potter-menu-toggle').css('background', newval );
	} );
} );
wp.customize( 'burger_menu_border_radius', function( value ) {
	value.bind( function( newval ) {
		$('#potter-menu-toggle').css('border-radius', newval + 'px' );
	} );
} );
wp.customize( 'burger_menu_size', function( value ) {
	value.bind( function( newval ) {
		$('#potter-menu-toggle').css('font-size', newval + 'px' );
	} );
} );
wp.customize( 'burger_menu_padding', function( value ) {
	value.bind( function( newval ) {
		$('#potter-menu-toggle').css('padding', newval + 'px' );
	} );
} );

wp.customize( 'burger_menu_background_hover_color', function( value ) {
	value.bind( function( newval ) {
		$('#potter-menu-toggle:hover').css('background', newval );
	} );
} );


	/* Footer */

	// Width.
	wp.customize( 'footer_width', function( value ) {
		value.bind( function( newval ) {
			if( newval == '' ) {
				newval = '1200px';
			}
			$('.bottom-footer .potter-inner-footer').css('max-width', newval );
		} );
	} );

	// Height.
	wp.customize( 'footer_height', function( value ) {
		value.bind( function( newval ) {
			$('.bottom-footer .potter-inner-footer').css('padding-top', newval + 'px' ).css('padding-bottom', newval + 'px' );
		} );
	} );

	// Background color.
	wp.customize( 'footer_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.bottom-footer').css('background-color', newval );
		} );
	} );

	// Font color.
	wp.customize( 'footer_font_color', function( value ) {
		value.bind( function( newval ) {
			$('.bottom-footer').css('color', newval );
		} );
	} );

	// Accent color.
	wp.customize( 'footer_accent_color', function( value ) {
		value.bind( function( newval ) {
			$('.bottom-footer a').css('color', newval );
		} );
	} );

	// Font size.
	wp.customize( 'footer_font_size', function( value ) {
		value.bind( function( newval ) {
			var suffix = '';
			if( $.isNumeric( newval ) ) {
				suffix = 'px';
			};
			$('.potter-inner-footer, .potter-inner-footer .potter-menu').css('font-size', newval + suffix );
		} );
	} );

	// Height.
	wp.customize( 'top_footer_height', function( value ) {
		value.bind( function( newval ) {
			$('.footer-widget-area .potter-container').css('padding-top', newval + 'px' ).css('padding-bottom', newval + 'px' );
		} );
	} );

	wp.customize( 'top_footer_width', function( value ) {
		value.bind( function( newval ) {
			if( newval == '' ) {
				newval = '1200px';
			}
			$('.footer-widget-area .potter-container').css('max-width', newval );
		} );
	} );
	// Background color.
	wp.customize( 'top_footer_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.footer-widget-area').css('background-color', newval );
		} );
	} );

	// Font color.
	wp.customize( 'top_footer_font_color', function( value ) {
		value.bind( function( newval ) {
			$('.footer-widget-area .potter-container h1, .footer-widget-area .potter-container h2, .footer-widget-area .potter-container h3, .footer-widget-area .potter-container h4, .footer-widget-area .potter-container h5, .footer-widget-area .potter-container h6, .footer-widget-area p, .footer-widget-area ul li').css('color', newval );
		} );
	} );

	// Accent color.
	wp.customize( 'top_footer_accent_color', function( value ) {
		value.bind( function( newval ) {
			$('.footer-widget-area .potter-container a').css('color', newval, + ' !important' );
		} );
	} );

	wp.customize( 'top_footer_title_font_size', function( value ) {
		value.bind( function( newval ) {
			$('.footer-widget-area .potter-container h1, .footer-widget-area .potter-container h2, .footer-widget-area .potter-container h3, .footer-widget-area .potter-container h4, .footer-widget-area .potter-container h5, .footer-widget-area .potter-container h6').css('font-size', newval );
		} );
	} );
	wp.customize( 'top_footer_font_size', function( value ) {
		value.bind( function( newval ) {
			$('.footer-widget-area .potter-container p, .footer-widget-area .potter-container').css('font-size', newval );
		} );
	} );

	/* WooCommerce - Defaults */

	// Button border radius.
	wp.customize( 'button_border_radius', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce a.button, .woocommerce button.button').css('border-radius', newval + 'px' );
		} );
	} );
	// Custom width.
	wp.customize( 'woocommerce_loop_custom_width', function( value ) {
		value.bind( function( newval ) {
			if( newval == '' ) {
				newval = '1200px';
			}
			$('.archive.woocommerce #inner-content').css('max-width', newval );
		} );
	} );


	// Font size.
	wp.customize( 'blog_title_bar_title_font_size', function( value ) {
		value.bind( function( newval ) {
			$('.blog-page-title-bar .entry-title').css('font-size', newval + 'vw' );
		} );
	} );

	// Font size.
	wp.customize( 'blog_title_bar_subtitle_font_size', function( value ) {
		value.bind( function( newval ) {
			$('.blog-page-title-bar p').css('font-size', newval + 'vw' );
		} );
	} );

	// Font size.
	wp.customize( 'shop_page_title_bar_title_font_size', function( value ) {
		value.bind( function( newval ) {
			$('.default-shop-title-bar .entry-title').css('font-size', newval + 'vw' );
		} );
	} );

	// Font size.
	wp.customize( 'shop_page_title_bar_subtitle_font_size', function( value ) {
		value.bind( function( newval ) {
			$('.default-shop-title-bar p').css('font-size', newval + 'vw' );
		} );
	} );

	/* WooCommerce - Loop */

	// Image alignment.
	wp.customize( 'woocommerce_loop_image_alignment', function( value ) {
		value.bind( function( newval ) {
			if( newval == 'left' ) {
				$('.potter-woo-list-view .potter-woo-loop-thumbnail-wrapper').css('float', 'left' );
				$('.potter-woo-list-view .potter-woo-loop-summary').css('float', 'right' );
			} else {
				$('.potter-woo-list-view .potter-woo-loop-thumbnail-wrapper').css('float', 'right' );
				$('.potter-woo-list-view .potter-woo-loop-summary').css('float', 'left' );
			}
		} );
	} );

	// Image width.
	wp.customize( 'woocommerce_loop_image_width', function( value ) {
		value.bind( function( newval ) {
			$('.potter-woo-list-view .potter-woo-loop-thumbnail-wrapper').css('width', newval-2 + '%');
			$('.potter-woo-list-view .potter-woo-loop-summary').css('width', 98-newval + '%');
		} );
	} );

	// Title font size.
	wp.customize( 'woocommerce_loop_title_size', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce ul.products li.product h3, .woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce ul.products li.product .woocommerce-loop-category__title').css('font-size', newval );
		} );
	} );

	// Title font color.
	wp.customize( 'woocommerce_loop_title_color', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce ul.products li.product h3, .woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce ul.products li.product .woocommerce-loop-category__title').css('color', newval );
		} );
	} );

	// Price font size.
	wp.customize( 'woocommerce_loop_price_size', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce ul.products li.product .price').css('font-size', newval );
		} );
	} );

	// Price font color.
	wp.customize( 'woocommerce_loop_price_color', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce ul.products li.product .price').css('color', newval );
		} );
	} );

	// Out of stock notice.
	wp.customize( 'woocommerce_loop_out_of_stock_font_size', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce ul.products li.product .potter-woo-loop-out-of-stock').css('font-size', newval );
		} );
	} );

	// Out of stock color.
	wp.customize( 'woocommerce_loop_out_of_stock_font_color', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce ul.products li.product .potter-woo-loop-out-of-stock').css('color', newval );
		} );
	} );

	// Out of stock background color.
	wp.customize( 'woocommerce_loop_out_of_stock_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce ul.products li.product .potter-woo-loop-out-of-stock').css('background-color', newval );
		} );
	} );

	// Sale font size.
	wp.customize( 'woocommerce_loop_sale_font_size', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce span.onsale').css('font-size', newval );
		} );
	} );

	// Sale font color.
	wp.customize( 'woocommerce_loop_sale_font_color', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce span.onsale').css('color', newval );
		} );
	} );

	// Sale background color.
	wp.customize( 'woocommerce_loop_sale_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce span.onsale').css('background-color', newval );
		} );
	} );

	/* WooCommerce - Single */

	// Custom width.
	wp.customize( 'woocommerce_single_custom_width', function( value ) {
		value.bind( function( newval ) {
			if( newval == '' ) {
				newval = '1200px';
			}
			$('.single.woocommerce #inner-content').css('max-width', newval );
		} );
	} );

	// Image alignment.
	wp.customize( 'woocommerce_single_alignment', function( value ) {
		value.bind( function( newval ) {
			if( newval == 'right' ) {
				$('.woocommerce div.product div.summary, .woocommerce #content div.product div.summary, .woocommerce-page div.product div.summary, .woocommerce-page #content div.product div.summary').css('float', 'left' );
				$('.woocommerce div.product div.images, .woocommerce #content div.product div.images, .woocommerce-page div.product div.images, .woocommerce-page #content div.product div.images').css('float', 'right' );
				$('.single-product.woocommerce span.onsale').css('display', 'none' );
			} else {
				$('.woocommerce div.product div.summary, .woocommerce #content div.product div.summary, .woocommerce-page div.product div.summary, .woocommerce-page #content div.product div.summary').css('float', 'right' );
				$('.woocommerce div.product div.images, .woocommerce #content div.product div.images, .woocommerce-page div.product div.images, .woocommerce-page #content div.product div.images').css('float', 'left' );
				$('.single-product.woocommerce span.onsale').css('display', 'block' );
			}
		} );
	} );

	// Image width.
	wp.customize( 'woocommerce_single_image_width', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce div.product div.images, .woocommerce #content div.product div.images, .woocommerce-page div.product div.images, .woocommerce-page #content div.product div.images').css('width', newval-2 + '%' );
			$('.woocommerce div.product div.summary, .woocommerce #content div.product div.summary, .woocommerce-page div.product div.summary, .woocommerce-page #content div.product div.summary').css('width', 98 - newval + '%' );
		} );
	} );

	// Price font size.
	wp.customize( 'woocommerce_single_price_size', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce div.product span.price, .woocommerce div.product p.price').css('font-size', newval );
		} );
	} );

	// Price font color.
	wp.customize( 'woocommerce_single_price_color', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce div.product span.price, .woocommerce div.product p.price').css('color', newval );
		} );
	} );

	// Tabs font size.
	wp.customize( 'woocommerce_single_tabs_font_size', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce div.product .woocommerce-tabs ul.tabs li a').css('font-size', newval );
		} );
	} );

	/* Easy Digital Downloads - Defaults */

	// Button border radius.
	wp.customize( 'button_border_radius', function( value ) {
		value.bind( function( newval ) {
			$('.edd-submit.button').css('border-radius', newval + 'px' );
		} );
	} );

} )( jQuery );
