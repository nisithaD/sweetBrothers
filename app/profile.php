<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    public $table = "profile";
    protected $guarded = [
        'id'
    ];
}
