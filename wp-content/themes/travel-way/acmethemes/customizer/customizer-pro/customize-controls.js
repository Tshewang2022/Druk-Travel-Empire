( function( api ) {

	// Extends our custom "travel-way" section.
	api.sectionConstructor['travel-way'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );