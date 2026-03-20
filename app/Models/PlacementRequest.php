<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlacementRequest extends Model
{
    protected $fillable = [
        'full_name','phone','email','senior_age','care_type','location','message'
    ];
}
