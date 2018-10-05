<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Project;
use App\Country;
class Subproject extends Model
{
    protected $fillable = [
        'title', 'project',
    ];

    public function user()
     {
     	return $this->belongesTo('App\User');
     }

     public function country()
     {
     	return $this->belongesTo('App\Country');
     }
      
     public function project()
     {
     	return $this->belongesTo('App\Project');
     }
}
