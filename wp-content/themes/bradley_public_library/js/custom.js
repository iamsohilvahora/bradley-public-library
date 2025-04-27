jQuery(document).ready(function () {

	var home_url = bplc_url.MyHomepath;


	// Search bar in header section
	if(jQuery("#header-search-form").length > 0) {

		jQuery('[name=search-option]').click(function(){
			var search_option = jQuery(this).val();	
			if(search_option == 'website') {
				jQuery("#search-type-option").hide();
                jQuery(this).parents(".header-bottom-details").addClass("full-width");
			} else {
				jQuery("#search-type-option").show();
                jQuery(this).parents(".header-bottom-details").removeClass("full-width");
			}
		});

		jQuery('#header-search-form').on('submit', function(e){
			e.preventDefault();

			var search_option = jQuery('[name=search-option]:checked').val();
			if(search_option == 'website') {
				window.location = home_url + '?s=' + jQuery('.find-title').val();
			} else {
				var search_url = jQuery('[name=search_url]').val();
				var search_type_key = jQuery('[name=search_type_key]').val();
				var search_type = jQuery('[name="'+search_type_key+'"]').val();

				var find_title = jQuery('.find-title').val();
				var search_key = jQuery('.find-title').attr("name");

				url = search_url + '?'+search_type_key+'=' +search_type +'&'+search_key+'='+find_title;

			    var link = jQuery('<a href="' + url + '" />');
			    link.attr('target', '_blank');
			    window.open(link.attr('href'));
			}
		});

	}

});