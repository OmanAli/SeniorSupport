<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonateForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_heading',
        'form_subheading',
    ];
}