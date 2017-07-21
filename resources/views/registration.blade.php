@extends('layouts.app')
@section('title', 'Crimes Board - Register')

@section('body')

<h1>Register</h1>
      
<div>
{{Form::model(['route'=>'registrationpost', 'method'=>'post'])}}

<div class="form-group">

    {{Form::label('name', 'Your full Name')}}

    {!! Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'Your full name']) !!}
  

  </div>
<div class="form-group">

    {{Form::label('email', 'E-Mail Address')}}

    {!! Form::email('email', $value = null, ['class' => 'form-control', 'placeholder' => 'email']) !!}
  

  </div>

  <div class="form-group">

    {{Form::label('username', 'Username')}}

    {!! Form::text('username', $value = null, ['class' => 'form-control', 'placeholder' => 'username']) !!}
  

  </div>

  <div class="form-group">

    {{Form::label('phone', 'Phone number')}}

    {!! Form::text('phone', $value = null, ['class' => 'form-control', 'placeholder' => 'Phone Number']) !!}
  

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
</div>

@endsection