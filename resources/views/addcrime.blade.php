@extends('layouts.app')

@section('body')

<h1>Add Crime</h1>
      
<div>
{{Form::model('User', ['route'=>'registrationpost', 'method'=>'post'])}}

<div class="form-group">

    {{Form::label('title', 'Title(Caption)')}}

    {!! Form::text('title', $value = null, ['class' => 'form-control', 'placeholder' => 'Give the crime a title/caption']) !!}
  

  </div>
<div class="form-group">

    {{Form::label('email', 'E-Mail Address')}}

    {!! Form::email('email', $value = null, ['class' => 'form-control', 'placeholder' => 'email']) !!}
  

  </div>

  <div class="form-group">
  	{{Form::label('gpsAddress', 'Are currently at the address it happened?')}}

  	{{ Form::radio('gpsAddress', 'Yes', true, ['class' => 'gpsAddress', 'id'=>'gpyes']) }} Yes
{{ Form::radio('gpsAddress', 'No', false, ['class' => 'gpsAddress', 'id'=>'gpNo']) }} No

  </div>

  <div class="form-group">

    {{Form::label('latitude', 'Latitude')}}

    {!! Form::text('latitude', $value = null, ['class' => 'form-control', 'placeholder' => 'username', 'id'=>'latitude']) !!}
  

  </div>

  <div class="form-group">

    {{Form::label('longitude', 'Longitude')}}

    {!! Form::text('longitude', $value = null, ['class' => 'form-control', 'placeholder' => 'Phone Number', 'id'=>'longitude']) !!}
  

  </div>

  <div class="form-group">

    {{Form::label('password', 'Password')}}

    {!! Form::password('password', ['class' => 'form-control']) !!}
  

  </div>
<div class="form-group">

    {{Form::label('address', 'Your Address')}}

    {!! Form::textarea('address', $value = null, ['class' => 'form-control', 'placeholder' => 'Your Address']) !!}
  

  </div>
    {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
{{Form::close()}}



@endsection