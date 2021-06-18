<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name','description','unit_price','barcode','expiration','quantity'
    ];
}
