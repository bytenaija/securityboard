<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function getUser($id){
      $user = User::find($id);
      
      dd($user);
    }
}
