@extends('layouts.app')
@section('title', 'Crimes Board - See Crime, Report Crime')

@section('body')


     
        <div id="map" style="border:2px solid black;"></div>
      
  

@endsection


@section('map')
<script
	async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdAa3vMSuEuCMg6KYNSlgtrAtvmNTzgsI&callback=initMap"></script>

@endsection