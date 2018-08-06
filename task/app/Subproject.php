<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subproject extends Model
{
    protected $fillable = [
        'title', 'project',
    ];
}
