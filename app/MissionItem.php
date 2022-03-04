<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class MissionItem extends Model
{
    public $table = "mission_items";

    protected $fillable = [
        'title', 'content', 'icon'
    ];
}