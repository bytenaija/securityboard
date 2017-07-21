var map, lat, lon, latlon;
var personalMarker = null;



function initMap(){
	getLocation();
var mapOptions = {
zoom: 12,
center: {lat: 9.072264, lng: 7.491302}
};
map = new google.maps.Map(document.getElementById('map'), mapOptions);

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
	map.setCenter(latlon);

}








//add all the crime markers as retrieved from the database to the maps
function addCrimesMarkers(lat, lon, details, date, time, crimeTitle){
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


var contentString = '<div class="crimecontent">'+

      '<div id="siteNotice">'+

      '</div>'+

      '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+

      '<div id="bodyContent">'+

      '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +

      'sandstone rock formation in the southern part of the '+

      'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+

      'south west of the nearest large town, Alice Springs; 450&#160;km '+

      '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+

      'features of the Uluru - Kata Tjuta National Park. Uluru is '+

      'sacred to the Pitjantjatjara and Yankunytjatjara, the '+

      'Aboriginal people of the area. It has many springs, waterholes, '+

      'rock caves and ancient paintings. Uluru is listed as a World '+

      'Heritage Site.</p>'+

      '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+

      'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+

      '(last visited June 22, 2009).</p>'+

      '</div>'+

      '</div>';

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
            	addCrimesMarkers(dat[i]["latitude"], dat[i]["longitude"], dat[i]["details"], dat[i]["date"], dat[i]["time"], dat[i]["title"]);
            }
            	
            }
        
        
        });

}


