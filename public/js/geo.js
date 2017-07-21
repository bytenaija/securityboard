var lat, lon;

function addLocationToForm(position){
	console.log(position);
lat = position.coords.latitude;
lon = position.coords.longitude;

$('#latitude').val(lat).prop('disabled', true).css({
	backgroundColor:'gray'
});
$('#longitude').val(lon).prop('disabled', true).css({
	backgroundColor:'gray'
});
}

$(document).ready(function(){
$(".gpsAddress").change(function(){
switch($(this).val()){
	case'Yes':
	//alert('Yes');
	getLocationForm();
	
	break;

	case'No':
	//alert('No');
	$('#latitude').val("").prop('disabled', false).css({
	backgroundColor:'white'
});
	$('#longitude').val("").prop('disabled', false).css({
	backgroundColor:'white'
});
	
	break;
}
});
});

function getLocationForm() {
	options = {

  enableHighAccuracy: true,

  

  maximumAge: 0

};

    if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(addLocationToForm, error, options);

    } else {

        alert('Geolocation is needed for this app to work');
        getLocationForm();

    }

}


  function error(err) {

  console.warn('ERROR(' + err.code + '): ' + err.message);

}