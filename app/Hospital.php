<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    //
    protected $fillable = [
        'hospital_name',
        'created_at',
        'updated_at',
    ];
}
