<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'amount',
        'message',
        'form_location',
    ];
}