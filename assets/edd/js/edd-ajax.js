jQuery( function( $ ) {

	// reload when item is added or removed
	$( document.body ).on( 'edd_cart_item_removed edd_cart_item_added', function( event, response ) {
		var data = {
			security:	potter_edd_fragments.nonce,
			action:		"potter_edd_fragments",
		};

		xhr = $.ajax({
			type:		'POST',
			url:		potter_edd_fragments.ajaxurl,
			data:		data,
			success:	function( response ) {
				$('.potter-edd-menu-item').html( response );
			}
		});

	});

});