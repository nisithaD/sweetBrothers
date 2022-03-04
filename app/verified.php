<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class verified extends Model
{
    public $table = "verified";
    protected $guarded = [
        'id'
    ];

}


