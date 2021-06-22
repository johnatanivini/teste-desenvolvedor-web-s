<?php

namespace App\Models;

use App\Models\Concerns\EscopeOrder;
use App\Models\Concerns\UsesUuid;
use App\Models\Order as ModelsOrder;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory, EscopeOrder;

    public $price;

    protected  $dates = [
        'date',
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    protected $fillable = [
        'date', 'descount','price'
    ];

    public static function getDiscount(Order $model) {

            $totalItens = $model->orders_itens->sum('quantity');
            $valorTotal = $model->orders_itens->sum('unit_price');

            $discount = $model->discount;

            $price = $totalItens * $valorTotal;

            if($discount > 0 && $discount < $valorTotal) {
                $price -= $discount;
            }

            $model->price = $price;
            return $model;
    }

    public static function boot()
    {
        parent::boot();

    }

    public function people()
    {
        return $this->belongsTo(People::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function orders_itens()
    {
        return $this->hasMany(OrderItens::class);
    }

    public static function saveOrders($post = [])
    {

        DB::beginTransaction();

        try{

        $model = new ModelsOrder();
    
        $model->discount = $post['discount'];
        $model->date = $post['date'];
        $model->people()->associate(People::find($post['people_id']));
        $model->status()->associate(Status::find($post['status_id']));
        $model->save();

        $modelsOrderItensSave = [];
       

        foreach($post['order_itens'] as $order_itens) {

            $modelOrderItens = new OrderItens();
            $modelOrderItens->quantity = $order_itens['quantity'];
            $modelOrderItens->unit_price = $order_itens['unit_price'];
            $modelOrderItens->product_id = $order_itens['product_id'];
            $modelOrderItens->order_id = $model->id;

            $modelsOrderItensSave[] = $modelOrderItens->toArray();
        
        }

        $model->orders_itens()->createMany($modelsOrderItensSave);

        DB::commit();

        return $model;

        }catch (Exception $e){

            DB::rollBack();
            throw $e;
        }

    }

    public function scopeFilterId(Builder $query, $value)
    {
        if($value) {
            return $query->where('id', $value);
        }

    }

    public function scopePeople(Builder $query, $value)
    {
        if($value) {
            return $query->where('people_id', $value);
        }

    }

    public function scopeStatus(Builder $query, $value)
    {
        if($value) {
            return $query->where('status_id', $value);
        }

    }

    public function scopeDiscount(Builder $query, $value)
    {
        if($value) {
            return $query->where('discount', $value);
        }

    }

    public function scopeDate(Builder $query, $value)
    {
        if($value) {
            return $query->where('date', $value);
        }

    }



}
