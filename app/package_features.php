<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class package_features extends Model
{

	use Sluggable;
	
    public $table = "package_features";
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


