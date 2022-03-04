<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class blognonslug extends Model
{

  public $table = "blog";
    protected $guarded = [
        'id'
    ];

}
