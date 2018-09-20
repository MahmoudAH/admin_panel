<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'title', 'image',
    ];
    
    public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function projects()
  {
    return $this->hasMany('App\Project');
  }
}
