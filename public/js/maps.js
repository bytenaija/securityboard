var map, lat, lon, latlon, mapCanvas;
var personalMarker = null;



function initMap(){
	getLocation();
var mapOptions = {
zoom: 12,
center: {lat: 9.072264, lng: 7.491302}
};
	mapCanvas = document.getElementById('map');
map = new google.maps.Map(mapCanvas, mapOptions);
	

    
}



function getLocation() {
	options = {

  enableHighAccuracy: true,

  

  maximumAge: 0

};

    if (navigator.geolocation) {

        navigator.geolocation.watchPosition(addPersonalMarker, error, options);

    } else {

        alert('Geolocation is needed for this app to work');
        getLocation();

    }

}



function addPersonalMarker(position){
	console.log(position);
	lat = position.coords.latitude;
	lon = position.coords.longitude;
latlon = new google.maps.LatLng(lat,lon)
	if(personalMarker != null){
		personalMarker.setMap(null);
		personalMarker = null;
	}

	personalMarker = new google.maps.Marker(
		{
			position:latlon,  
			title:"You",
			map:map
		}
		);
searchAndAddCrimes(lat,lon);
	//map.setCenter(latlon);
	
	google.maps.event.addListener(mapCanvas, "center_changed", function() {
       
        map.setCenter(mapCanvas.getCenter());
       
      });

}








//add all the crime markers as retrieved from the database to the maps
function addCrimesMarkers(lat, lon, details, date,  crimeTitle){
	contentString = "<h2>" + details  + "<h2>";
	var latlon = new google.maps.LatLng(lat, lon);

var marker = new google.maps.Marker(
{
	position:latlon, 
	map:map, 
	title:crimeTitle

}

);

var infoWindow = new google.maps.InfoWindow({
content:contentString
});

marker.addListener('click', function(){
infoWindow.open(map,marker);
})
}


var contentString;

      function error(err) {

  console.warn('ERROR(' + err.code + '): ' + err.message);

}

function searchAndAddCrimes(latitude, longitude){
	var data = {
		latitude: latitude,
		longitude:longitude
	};
	var url = "api/crimes/";
	var type = 'POST';
	$.get({

           

            url: url,

            data: data,

            dataType: 'json',

            success: function(data){
            	console.log(data);
            	//$.each
            dat = JSON.parse(JSON.stringify(data));
            for(var i = 0; i<dat.length; i++){
            	addCrimesMarkers(dat[i]["latitude"], dat[i]["longitude"], dat[i]["description"], dat[i]["date"], dat[i]["title"]);
            }
            	
            }
        
        
        });

}


