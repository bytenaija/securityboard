@extends('layouts.app')

@section('body')

,    'type', 'policeReponse', 'details', 'pictures'
<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
  


<h1>Add Crime</h1>
      
<div>
{{Form::model('Crime', ['route'=>'crime.add', 'method'=>'post'])}}

<div class="form-group">

    {{Form::label('title', 'Title(Caption)')}}

    {!! Form::text('title', $value = null, ['class' => 'form-control', 'placeholder' => 'Give the crime a title/caption']) !!}
  

  </div>
  
<div class="form-group">

    {{Form::label('happeningNow', 'Happening now?')}}

    {!! Form::checkbox('happeningNow') !!}
  

  </div>
  
  <div class="form-group" id="date">

    {{Form::label('date', 'Date the incident happened')}}

    {!! Form::text('date', $value = null, ['class' => 'form-control', 'placeholder' => 'Choose the date the incident happened']) !!}
  

  </div>

  <div class="form-group">
  	{{Form::label('gpsAddress', 'Are currently at the address it happened?')}}

  	{{ Form::radio('gpsAddress', 'Yes', true, ['class' => 'gpsAddress', 'id'=>'gpyes']) }} Yes
{{ Form::radio('gpsAddress', 'No', false, ['class' => 'gpsAddress', 'id'=>'gpNo']) }} No

  </div>

  
  
  <div class="form-group">

    {{Form::label('description', 'Description of Incident')}}

    {!! Form::textarea('description', $value = null, ['class' => 'form-control', 'placeholder' => 'Description of the crime or incident', 'id'=>'description']) !!}
  

  </div>

 
<div class="form-group">

    {{Form::label('autocomplete', 'Address of the Incident')}}

    {!! Form::text('autocomplete', $value = null, ['class' => 'form-control', 'placeholder' => 'Enter address for google maps to complete', 'id'=>"autocomplete", 'onFocus'=>'geolocate()']) !!}
  


  {{Form::label('street_number', 'Street Address (Only to be entered if you could not find address above)')}}

     
     {!! Form::text('route', "", [ 'id'=>'route', 'class'=>' form-control col-md-7', 'placeholder' => 'Street Name']) !!}
     {!! Form::text('city', "", [ 'id'=>'locality', 'class'=>' form-control col-md-7', 'placeholder' => 'City']) !!}
     {!! Form::text('state', "", [ 'id'=>'administrative_area_level_1', 'class'=>' form-control col-md-7', 'placeholder' => 'State']) !!}
     {!! Form::text('country', "", [ 'id'=>'country', 'class'=>' form-control col-md-7', 'placeholder' => 'Country']) !!}
  

 {{Form::label('address', 'Coordinates')}}
   
 
       
      {!! Form::text('latitude', "", [ 'id'=>'latitude' ,'class'=>' form-control', 'placeholder' => 'Latitude']) !!}

      {!! Form::text('longitude',  "", [ 'id'=>'longitude' ,'class'=>' form-control', 'placeholder' => 'Longitude']) !!}

  </div>
    <div class="text-center">
      {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info '] ) !!}
  </div>
{{Form::close()}}

</div>

@endsection
  
  @section('map')
<script
	async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdAa3vMSuEuCMg6KYNSlgtrAtvmNTzgsI&libraries=places"></script>

@endsection