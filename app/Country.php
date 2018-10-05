<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Project;
use App\Subproject;
class Country extends Model
{
    protected $fillable = [
        'title', 'image',
    ];
    public function user()
    {
    	 return $this->belongsToMany('App\User');
    }
    public function project()
    {
    	 return $this->hasMany('App\Project');

    }
    public function subproject()
    {
    	 return $this->hasMany('App\Subproject');

    }
}
