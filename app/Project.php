<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Country;
use App\Subproject;
class Project extends Model
{
     protected $fillable = [
        'title', 'image','country',
    ];
     public function user()
     {
     	return $this->belongesTo('App\User');
     }

     public function country()
     {
     	return $this->belongesTo('App\Country');
     }
      
     public function subproject()
     {
     	return $this->hasMany('App\Subproject');
     }


}
