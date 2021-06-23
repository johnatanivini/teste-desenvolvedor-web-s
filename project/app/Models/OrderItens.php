<?php

namespace App\Models;

use App\Models\Concerns\UsesUuid;
use App\Models\OrderItens as ModelsOrderItens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItens extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'orders_itens';

    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    public static function boot()
    {
        self::creating(function(ModelsOrderItens $orderItens)
        {
                $product = Product::find($orderItens->product->id);
                $product->quantity -= $orderItens->quantity;
                $product->update();
        });

        parent::boot();
    }

    protected $fillable =['order_id','unit_price','quantity','product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
