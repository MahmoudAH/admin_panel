<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subproject extends Model
{
    protected $fillable = [
        'title', 'project',
    ];
    
  public function user()
  {
    return $this->belongsTo('App\User');
  }
  public function country()
  {
    return $this->belongsTo('App\Country');
  }
    
  public function project()
  {
    return $this->belongsTo('App\Project');
  }
}
