<?php

namespace App\Models;

use App\Models\Concerns\EscopeOrder;
use App\Models\Concerns\UsesUuid;
use App\Models\Order as ModelsOrder;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory, EscopeOrder, SoftDeletes;

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
        return $this->belongsTo(People::class)->withTrashed();
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
        $model->date = $post['date'] ?? Date::now()->format('Y-m-d');
        $model->people()->associate(People::find($post['people_id']));
        $model->status()->associate(Status::find($post['status_id'] ?? Status::EM_ANDAMENTO));
        $model->save();

        $modelsOrderItensSave = [];
       

        foreach($post['orders_itens'] as $order_itens) {

            $modelOrderItens = new OrderItens();
            $modelOrderItens->quantity = $order_itens['quantity'];
            $modelOrderItens->unit_price = $order_itens['unit_price'];
            $modelOrderItens->product_id = $order_itens['product_id'];
            $modelOrderItens->order_id = $model->id;

            $modelsOrderItensSave[] = $modelOrderItens->toArray();
        
        }

        $model->orders_itens()->createMany($modelsOrderItensSave);

        $model->price = self::getDiscount($model)->price;

        DB::commit();

        return $model;

        }catch (Exception $e){

            DB::rollBack();
            throw $e;
        }

    }

    public function scopeFilterByCpf(Builder $query, $value)
    {   
        if ($value) {
            return  $query->whereHas('people', function($people) use($value){
                $people->where('cpf', $value);
            });
        }
    }

    public function scopeFilterId(Builder $query, $value)
    {
        if ($value) {
            return $query->where('id', $value);
        }

    }

    public function scopePeople(Builder $query, $value)
    {
        if ($value) {
            return $query->where('people_id', $value);
        }

    }

    public function scopeStatus(Builder $query, $value)
    {
        if ($value) {
            return $query->whereHas('status', function($query) use($value){
                $query->where('code', $value);
            });
        }

    }

    public function scopeDiscount(Builder $query, $value)
    {
        if ($value) {
            return $query->where('discount', $value);
        }

    }

    public function scopeDate(Builder $query, $value)
    {
        if ($value) {
            return $query->where('date', $value);
        }

    }



}
