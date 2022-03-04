<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class package_types extends Model
{

	use Sluggable;
	
    public $table = "package_types";
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


