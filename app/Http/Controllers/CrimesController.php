<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Crime;
use Auth;

class CrimesController extends Controller
{
	public function __construct(){

	$this->middleware('auth')->except('getCrimes');

}



public function crimeEntryForm(){

	return view('entercrimes');

}



public function addCrime(Request $request){



	$validation = $this->validate($request, [

		'title'=>'required',

		'date'=>'required',
		'time'=>'required',
		'description'=>'required',

		'happeningNow'=>'required',

		'details'=>'required',

		'type' =>'required',

	]);

	
	if(Crime::create($request)){

	return redirect('/crimes')->with("message", "You have successfully submitted this incident. Other users are very grateful to you for helping to keep them safe");

	}



	return redirect('/crimes')->withInput()->errors();

	}



	public function getCrimes(Request $request){

	$crimes = Crime::whereBetween('latitude', [$request->latitude-0.1, $request->latitude +0.1])->whereBetween('longitude', [$request->longitude-0.1, $request->longitude +0.1])->get();



	return response()->json($crimes);

	}





	public function getCrime($id){



	$crime = Crime::find($id);



	return $crime;



	}



	public function editCrime(Request $request, $id){

		Crime::find($id)->update($request);

	}



	public function deleteCrime($id){

		if(Crime::delete($id))

		return view('deleteconfirm')->with('message', 'Record successfuly deleted');

	}

    
    
}
