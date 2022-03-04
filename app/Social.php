<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class social extends Model
{
    public $table = "socials";
    protected $guarded = [
        'id'
    ];
}
