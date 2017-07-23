@extends('layouts.app')

@section('body')


<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
  


<h1>Add Crime</h1>
      
<div>
{{Form::model('Crime', ['route'=>'crime.add', 'method'=>'post', 'files'=> true])}}

	<div>
		@if(Session::has('errors'))
   @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
  @endforeach
@endif
	</div>
<div class="form-group">

    {{Form::label('title', 'Title(Caption)')}}

    {!! Form::text('title', $value = null, ['class' => 'form-control', 'placeholder' => 'Give the crime a title/caption']) !!}
  

  </div>
  
	
	

	<label class="btn btn-success" id="happening_now">
	<input type="checkbox"  autocomplete="off" id="happening"> Happening Now?
	</label>

  
  <div class="form-group" id="date">

    {{Form::label('eventdate', 'Date the incident happened')}}

    {!! Form::text('eventdate', $value = null, ['class' => 'form-control', 'placeholder' => 'Choose the date the incident happened']) !!}
  

  </div>
  
  <div class="form-group" id="date">
    {{Form::label('type', 'Type of Incident')}}
  {{ Form::select('type', [
   'Armed Robbery' => 'Armed robbery',
   'Police Brutality' => 'Police/Armed Forces  Brutality',
   'Child Abuse' => 'Child Abuse',
   'Murder' => 'Murder',
   'Cultism' => 'Cultism',
   'Terrorism' => 'Terrorism',
   'Herdsmen Attack' => 'Herdsmen Attack',
   'Accident' => 'Accident']
, null, ['class' => 'form-control']) }}
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
  
  <div class="form-group">

    {{Form::label('images', 'Upload images (you can add multiple images at the same time)')}}

    {!! Form::file('images[]', ['class' => 'form-control images','multiple'=>'true' ,'accept'=>'image/*']) !!}
   

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
	
	<script type="text/javascript">
		var hapDate;
		$("#happening_now").click(function(event){
		
	if($("#happening").prop("checked")==true){
	
		$('#eventdate').attr('value',"");
		hapDate = new Date(Date.now());
		var day = hapDate.getDate();
		var month = "0" + (hapDate.getMonth() + 1);
		var year = hapDate.getFullYear();
		//alert(year);
		//console.log(hapDate);
		hapDate = month  + "/" + day + "/" + year;
		alert(hapDate);
			$('#eventdate').datepicker('setDate', hapDate); 
			//attr('value',hapDate);
	} else{
		$('#eventdate').datepicker('setDate', ""); 
		//attr('value',"");
	}
		});

		 $("#eventdate").datepicker( {
        onClose: function(date) {
            $(this).val(date);
        },
        selectWeek: true,
        inline: true,
        changeMonth: true,
        changeYear: true,
        dateFormat: "mm/dd/yy"
    });
		
		


	</script>

@endsection