<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitors extends Model
{
   public $table = "visitors";

    protected $guarded = [
        'id'
    ];
}
