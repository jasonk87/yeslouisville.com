(function($){

	var docReady = function(){
		console.log( 'Doc ready!' );
	};

	var navHeader = function(){
		if ( $( '.inner' ).length ){
			$( '.inner' ).toggle();
			$( '.large-nav-toggle .menu-close' ).toggle();

			$( '.large-nav-toggle' ).on( 'click', function(){
				$( '.inner' ).toggle();
				$( '.large-nav-toggle' ).toggleClass( 'active' );
				$( '.large-nav-toggle .menu-close' ).toggle();
				$( '.large-nav-toggle .menu-open' ).toggle();
			});
		}
	};

	$(document).ready(function(){
		docReady();
		navHeader();
	});

})(jQuery);