<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemoFormSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'name',
        'email',
        'phone',
        'who_you_are',
        'estimate_number',
    ];
}
