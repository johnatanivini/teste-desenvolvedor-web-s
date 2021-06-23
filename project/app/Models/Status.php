<?php

namespace App\Models;

use App\Models\Concerns\EscopeOrder;
use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory, EscopeOrder, SoftDeletes;

    const EM_ANDAMENTO = 1;
    const PAGO = 2;
    const CANCELADO = 3;

    protected $table = 'status';

    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    protected $fillable = ['name','code'];

}
