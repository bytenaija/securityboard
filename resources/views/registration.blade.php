@extends('layouts.app')
@section('title', 'Crimes Board - Register')

@section('body')

<h1 class="text-center">Register</h1>
      
<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
{{Form::model(['route'=>'registrationpost', 'method'=>'post'])}}


<div class="form-group">

    {{Form::label('email', 'E-Mail Address')}}

    {!! Form::email('email', $value = null, ['class' => 'form-control', 'placeholder' => 'email']) !!}
  

  </div>

  <div class="form-group">

    {{Form::label('username', 'Username')}}

    {!! Form::text('username', $value = null, ['class' => 'form-control', 'placeholder' => 'username']) !!}
  

  </div>

 

  <div class="form-group">

    {{Form::label('password', 'Password')}}

    {!! Form::password('password', ['class' => 'form-control']) !!}
  

  </div>
<div class="text-center">
   {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info'] ) !!}
{{Form::close()}}
  </div>
   
</div>

@endsection