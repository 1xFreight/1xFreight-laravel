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
        'estimated_quotes_demo',
        'created_at',
        'updated_at'
    ];

    public function subscription()
    {
        return $this->hasOne(Subscription::class, 'user_id');
    }

}
