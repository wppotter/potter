/**
 * Remove activate button and replace with activation in progress button.
 */

/* global potterAboutPluginInstall */
/* global console */

jQuery( document ).ready(
	function ( $ ) {
		$.pluginInstall = {
			'init': function () {
				this.handleInstall();
				this.handleActivate();
			},

			'handleInstall': function () {
				var self = this;
				$( 'body' ).on(
					'click',
					'.potter-install-plugin',
					function ( e ) {
						e.preventDefault();
						var button   = $( this );
						var slug     = button.attr( 'data-slug' );
						var url      = button.attr( 'href' );
						var redirect = $( button ).data( 'redirect' );
						button.text( wp.updates.l10n.installing );
						button.addClass( 'updating-message' );
						wp.updates.installPlugin(
							{
								slug: slug,
								success: function () {
									button.text( potterAboutPluginInstall.activating + '...' );
									self.activatePlugin( url, redirect );
								}
							}
						);
					}
				);
			},

			'activatePlugin': function ( url, redirect ) {
				if ( typeof url === 'undefined' || ! url ) {
					return;
				}
				jQuery.ajax(
					{
						async: true,
						type: 'GET',
						url: url,
						success: function () {
							// Reload the page.
							if ( typeof(redirect) !== 'undefined' && redirect !== '' ) {
								window.location.replace( redirect );
								location.reload();
							} else {
								location.reload();
							}
						},
						error: function ( jqXHR, exception ) {
							var msg = '';
							if ( jqXHR.status === 0 ) {
								msg = potterAboutPluginInstall.verify_network;
							} else if ( jqXHR.status === 404 ) {
								msg = potterAboutPluginInstall.page_not_found;
							} else if ( jqXHR.status === 500 ) {
								msg = potterAboutPluginInstall.internal_server_error;
							} else if ( exception === 'parsererror' ) {
								msg = potterAboutPluginInstall.json_parse_failed;
							} else if ( exception === 'timeout' ) {
								msg = potterAboutPluginInstall.timeout_error;
							} else if ( exception === 'abort' ) {
								msg = potterAboutPluginInstall.ajax_req_aborted;
							} else {
								msg = potterAboutPluginInstall.uncaught_error;
							}
							console.log( msg );
						},
					}
				);
			},

			'handleActivate': function () {
				var self = this;
				$( 'body' ).on(
					'click',
					'.activate-now',
					function ( e ) {
						e.preventDefault();
						var button   = $( this );
						var url      = button.attr( 'href' );
						var redirect = button.attr( 'data-redirect' );
						button.addClass( 'updating-message' );
						button.text( potterAboutPluginInstall.activating + '...' );
						self.activatePlugin( url, redirect );
					}
				);
			},
		};
		$.pluginInstall.init();
	}
);
