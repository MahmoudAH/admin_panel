<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Country;
use App\Project;
use App\Subproject;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function country()
    {
        return $this->hasMany('App\Country');
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
