<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonateWhyText extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_heading',
        'section_highlight',
        'section_description',
        'sub_heading',
        'bottom_text',
    ];
}