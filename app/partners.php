<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class partners extends Model
{

	use Sluggable;
	
    public $table = "partners";
    protected $guarded = [
        'id'
    ];
     public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}


