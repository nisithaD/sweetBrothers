<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{

	use Sluggable;
	
    public $table = "services";
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


