@extends('layouts.app') @section('body') @foreach($crimes as $crime)

<div class="panel panel-default col-md-3 col-md-offset-2">
	<div class="panel-heading"><b>
		
		{{$crime->title}}</b></div>
	<div class="panel-body">
		<p style="color:black;">
			@foreach($crime->images as $image)


			<img src="{{asset('storage')}}{{$image->imagepath}}"> @break @endforeach
		</p>
		<p style="color:black;">
			{{$crime->description}}
		</p>
		<hr>
		<p style="color:black;">
			<i>Crime reported by <a href="{{route('user.get', ['id' => $crime->user->id]) }}">{{$crime->user->username}} </a></i>
		</p>

		<p style="color:black;">

			<i>Crime committed {{ Carbon\Carbon::parse($crime->eventdate)->diffForHumans() }}
 and reported at {{Carbon\Carbon::parse($crime->created_at)->format('l, d-m-Y h:i:s a')}} </i>
		</p>


	</div>
</div>
@endforeach @endsection