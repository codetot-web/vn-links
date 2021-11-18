import './frontend.css';

const LOADING_CLASS = 'is-loading';

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
	const options = selectEl
		? Array.prototype.slice.call( selectEl.querySelectorAll( 'option' ) )
		: [];

	if ( selectEl.children.length > 0 ) {
		selectEl.addEventListener( 'change', ( e ) => {
			el.classList.add( LOADING_CLASS );
			e.preventDefault();

			if ( isUrl( e.target.value ) ) {
				window.location = e.target.value;
			}

			/** Reset an instance */
			setTimeout( () => {
				el.classList.remove( LOADING_CLASS );
				selectEl.value = options[ 0 ].value;
			}, 3000 );
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
