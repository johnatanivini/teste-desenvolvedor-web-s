<?php

namespace App\Models;

use App\Models\Concerns\EscopeOrder;
use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class People extends Model
{
    use HasFactory, EscopeOrder, SoftDeletes;

    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    protected $fillable = ['name','email','cpf'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function scopeName(Builder $query, $value)
    {
        if($value) {
            return $query->where('name','LIKE', "%{$value}%" );
        }
    }

    public function scopeEmail(Builder $query, $value)
    {
        if($value) {
            return $query->where('email','=', $value);
        }
    }

    public function scopeCpf(Builder $query, $value)
    {
        if($value) {
            return $query->where('cpf','=', $value);
        }
    }

}
