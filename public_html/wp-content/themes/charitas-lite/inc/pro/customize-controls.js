( function( api ) {

	// Extends our custom "charitas-pro" section.
	api.sectionConstructor['charitas-pro'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
