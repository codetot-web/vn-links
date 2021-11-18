import './frontend.css';

const isUrl = ( string ) => {
	const regex = /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
	const pattern = new RegExp( regex );

	return pattern.test( string );
};

const init = ( el ) => {
	if ( ! el ) {
		return;
	}

	const selectEl = el.querySelector( 'select' );

	if ( selectEl.children.length > 0 ) {
		selectEl.addEventListener( 'change', ( e ) => {
			e.preventDefault();

			if ( isUrl( e.target.value ) ) {
				window.open( e.target.value, '_blank' ).focus();
			}
		} );
	}
};

window.addEventListener( 'DOMContentLoaded', () => {
	const els = Array.prototype.slice.call(
		document.querySelectorAll( '[data-app="vn-links"]' )
	);

	if ( els && els.length ) {
		els.map( ( el ) => {
			return init( el );
		} );
	}
} );
