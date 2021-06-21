<?php

namespace App\Models;

use App\Models\Concerns\EscopeOrder;
use App\Models\Concerns\UsesUuid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, EscopeOrder;

    protected $dates = [
        'expiration',
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    protected $fillable = [
        'name','description','unit_price','barcode','expiration','quantity'
    ];

   
    public function scopeName(Builder $query, $value)
    {
        if($value) {
            return $query->where('name','LIKE', "%{$value}%" );
        }
    }

    public function scopeDescription(Builder $query, $value)
    {

        if($value) {
            return $query->where('description','LIKE', "%".$value."%");
        }

    }

    public function scopeUnitPrice(Builder $query, $value)
    {
        if($value) {
            return $query->where('unit_price', $value);
        }

    }

    public function scopeBarcode(Builder $query, $value)
    {
        if($value) {
            return $query->where('barcode', $value);
        }
    }

    public function scopeExpiration(Builder $query, $value)
    {
        if($value) {
            return $query->where('expiration', $value);
        }
    }

    public function scopeQuantity(Builder $query, $value)
    {
        if($value) {
            return $query->where('quantity', $value);
        }

    }

}
