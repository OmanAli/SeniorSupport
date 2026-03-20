<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonateDonorRecognitionCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'title',
        'description',
        'icon',
    ];
}