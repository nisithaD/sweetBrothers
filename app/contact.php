<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
   public $table = "contact";
    protected $guarded = [
        'id'
    ];
}
