<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{

	use Sluggable;

  public $table = "blog";
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
