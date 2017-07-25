<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrimeImage extends Model
{
  protected $fillable = ['path', 'crime_id'];
  
   public function crime(){
     return $this->belongsTo('App\Crime');
   }
}
