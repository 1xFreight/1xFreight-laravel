<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Subscription extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'subscriptions';

    protected $fillable = [
        'user_id',
        'free_trial_days',
        'payment_date',
        'subscription',
        'coupon',
        'subscription_monthly_price',
        'manager_user_id',
        'payment_link',
        'stripe_account_link',
        'next_payment',
    ];
}
