// updating names for manipulating block styles
// const addBlockStyle = wp.blocks.registerBlockStyle;
// const removeBlockStyle = wp.blocks.unregisterBlockStyle;

// set new button styles
// const $buttonStyles = [
// 	{
// 		name: 'blue-button',
// 		label: 'Blue Button',
// 		isDefault: true,
// 	},
// 	{
// 		name: 'orange-button',
// 		label: 'Orange Button',
// 	}
// ];

// register new button styles
// addBlockStyle( 'core/button', $buttonStyles );

wp.domReady( () => {
	// remove the default button styles
	// removeBlockStyle( 'core/button', [ 'outline', 'fill' ] );
} );
