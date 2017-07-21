@extends('layouts.app')
@section('title', 'Crimes Board - Login')

@section('body')
<div class="col-md-6 col-md-offset-3 bordered">
{{Form::model(['route'=>'loginpost', 'method'=>'post'])}}
<div class="form-group error error-default">
@if ( count( $errors ) > 0 )

   @foreach ($errors->all() as $error)

      <div>{{ $error }}</div>

  @endforeach

@endif
</div>

<div class="form-group">

    {{Form::label('email', 'Your Address')}}

    {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Your email or username']) !!}
  

  </div>

  <div class="form-group">

    {{Form::label('password', 'Password')}}

    {!! Form::password('password', ['class' => 'form-control']) !!}
  

  </div>
    {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info centered'] ) !!}
{{Form::close()}}
</div>
@endsection