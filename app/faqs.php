<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class faqs extends Model
{

	use Sluggable;
	
    public $table = "faqs";
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


