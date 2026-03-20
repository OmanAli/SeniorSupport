<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonateDonorRecognitionText extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_heading',
        'section_highlight',
        'section_description',
        'bottom_text',
    ];
}