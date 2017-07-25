<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use App\Crime;
use App\CrimeImage;
use Auth;
use View;
class CrimesController extends Controller
{
	public function __construct(){
	$this->middleware('auth', ['except' => 'getCrimes']);
}



public function crimeEntryForm(){

	return view('entercrimes');

}

	public function index(){
	$crimes = Crime::with('images')->get();
//dd($crimes);
	return View::make('crimes.index', compact('crimes'));

}


public function addCrime(Request $request){



	$validation = $this->validate($request, [

		'title'=>'required',
		'eventdate'=>'required',
		'description'=>'required',
		'route'=>'required',
		'state'=>'required',
		'city'=>'required',
		'country'=>'required',
		'longitude'=>'required',
		'latitude'=>'required',
		'type' =>'required',

	]);

	$crime = new Crime();
	$crime->user_id=Auth::user()->id;
		$crime->title=$request->input('title');
		$crime->eventdate=$request->input('eventdate');
		$crime->description=$request->input('description');
		$crime->address=$request->input('route');
		$crime->state=$request->input('state');
		$crime->city=$request->input('city');
		$crime->country=$request->input('country');
		$crime->longitude=$request->input('longitude');
		$crime->latitude=$request->input('latitude');
		$crime->type=$request->input('type');
		if($request->has('autocomplete')){
				$crime->streetaddress=$request->input('autocomplete');
		}
			 
	if($crime->save()){
		//dd($request);
if($request->hasFile('images')){
//
	//dd($request);
	foreach($request->images as $image){
		
		//dd($image);
		$filename = $string = str_random(20);
			$ext = $image->getClientOriginalExtension();
		$filename = "/images/crimes/" . $filename . "." .$ext;
		$path = "/public" . $filename;
//dd($path);
		//	dd(File::get($image));
			Storage::disk('local')->put($path, File::get($image));
		//dd(Storage::get($filename));
		//dd($filename);
/*	CrimeImage::create([
			'imagepath' => $filename,
			'crime_id' => 	$crime->id
		
		]); 
		*/
		$img = new CrimeImage();
		
		$img->imagepath = $filename;
		$crime->images()->save($img);
}
}

	return redirect('/crimes')->with("message", "You have successfully submitted this incident. Other users are very grateful to you for helping to keep them safe");

	}



	return redirect('/crimes')->withInput()->errors();

	}



	public function getCrimes(Request $request){

	$crimes = Crime::all();
		//Crime::whereBetween('latitude', [$request->latitude-0.1, $request->latitude +0.1])->whereBetween('longitude', [$request->longitude-0.1, $request->longitude +0.1])->get();



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
