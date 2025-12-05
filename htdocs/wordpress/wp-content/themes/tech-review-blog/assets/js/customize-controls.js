( function( api ) {

	// Extends our custom "tech-review-blog" section.
	api.sectionConstructor['tech-review-blog'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );