<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public $table = "appointment_steps";

    protected $fillable = [
        'title', 'content'
    ];
}