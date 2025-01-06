<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class QuotesMongo extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'quotes';
}
