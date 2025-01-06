<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

use MongoDB\Laravel\Eloquent\Model;

class MongoUser extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'users';

    protected $fillable = [
        'role',
        'status',
        'company',
        'name',
        'email',
        'phone',
        'billing_address',
        'billing_email',
        'billing_phone',
        'estimate_number',
        'created_at',
        'updated_at'
    ];
}
