function geolocate(){
	var componentForm = {
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'long_name',
        country: 'long_name',
        };
	var input = document.getElementById("autocomplete");
	var autocomplete = new google.maps.places.Autocomplete(input, {componentRestrictions: {country: ['ng', 'gh', 'za']}});
			var lat = document.getElementById('latitude');
	var address = document.getElementById('address');
		var long = document.getElementById('longitude');
	autocomplete.addListener('place_changed', function(){
	var place = autocomplete.getPlace();
	//	console.log(place);
		
		for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }
		
		for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
		}
		
		
		var latitude = place.geometry.location.lat();
		var longitude = place.geometry.location.lng();
		var add = place.formatted_address;
	
		lat.value = latitude;
	long.value = longitude;
	});
		
	}
