<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class servicesnonslug extends Model
{
	
    public $table = "services";
    protected $guarded = [
        'id'
    ];
 }


