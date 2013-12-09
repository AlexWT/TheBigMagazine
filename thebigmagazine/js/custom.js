/**x
 * Custom javascript calls for TBN
 * -------------------------------
 */

jQuery(document).ready(function($) {
	// Inside of this function, $() will work as an alias for jQuery()
	// and other libraries also using $ will not be accessible under this shortcut
    
    // Mansonry setup. (page-blog.php)
    // -----------------------------------------------------------------------------
	var gutter = parseInt( jQuery( '.entry' ).css( 'marginBottom' ) );
	var container = jQuery( '.js-masonry' );
    
	$('.js-masonry').masonry({
		columnWidth: '.entry',	// Get the with of the item by its css selector properties
		itemSelector: '.entry',	// The element that will be modified
		gutter: gutter,			// Defines the space between elements
	});

	// This code fires every time a user resizes the screen and only affects .entry elements
	// whose parent class is .container-fluid. Triggers resize so nothing looks weird.
	jQuery( window ).bind( 'resize', function(){
		if ( jQuery( '.js-masonry' ).parent().hasClass( 'container-fluid' ) ) {

			// Resets all widths to 'auto' to sterilize calculations
			post_width = jQuery( '.entry' ).width() + gutter;
			jQuery( '.container-fluid .js-masonry, body > .container-fluid' ).css( 'width', 'auto');
			
			// Calculates how many .entry elements will actually fit per row. Could this code be cleaner?
			posts_per_row 		= jQuery( '.js-masonry' ).innerWidth() / post_width;
			floor_posts_width 	= ( Math.floor( posts_per_row ) * post_width ) - gutter;
			ceil_posts_width 	= ( Math.ceil( posts_per_row ) * post_width ) - gutter;
			posts_width 		= ( ceil_posts_width > jQuery( '.js-masonry' ).innerWidth() ) ? floor_posts_width : ceil_posts_width;
			if ( posts_width == jQuery( '.entry' ).width() ) 
				posts_width = '100%';
			
			// Ensures that all top-level .container-fluid elements have equal width and stay centered
			jQuery( '.container-fluid .js-masonry, body > .container-fluid' ).css( 'width', posts_width );
			jQuery( 'body > .container-fluid' ).css({ 'margin': '0 auto' });
		
		}

	}).trigger( 'resize' );
});