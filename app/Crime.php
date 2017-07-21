<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{

   protected $fillable = ['title', 'description', 'happeningNow', 'date', 'address', 'longitude', 'latitude', 'type', 'policeReponse', 'details', 'pictures'];
    
}
