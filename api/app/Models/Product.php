<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $dates = [
        'expiration',
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    protected $fillable = [
        'name','description','unit_price','barcode','expiration','quantity'
    ];

}
