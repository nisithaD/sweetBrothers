<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class products extends Model
{

	use Sluggable;
	
    public $table = "products";
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

    public function images(): HasMany
    {
        return $this->hasMany(product_images::class,'product_id','id');
    }
}


