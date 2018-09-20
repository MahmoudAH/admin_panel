<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
     protected $fillable = [
        'title', 'image','country',
    ];
      public function country()
  {
    return $this->belongsTo('App\Country');
  }
     
  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function subprojects()
  {
    return $this->hasMany('App\Subproject');
  }
}
