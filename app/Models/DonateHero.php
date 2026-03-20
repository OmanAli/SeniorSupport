<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonateHero extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'subheading',
        'description',
        'button_text',
    ];
}