<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonateFormExtraText extends Model
{
    use HasFactory;

    protected $fillable = [
        'secure_text',
        'contact_heading',
        'email_text',
        'phone_text',
    ];
}