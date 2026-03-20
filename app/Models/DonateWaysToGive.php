<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonateWaysToGive extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_heading',
        'section_highlight',
        'section_subheading',
        'order',
        'title',
        'description',
        'icon',
    ];
}