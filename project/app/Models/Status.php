<?php

namespace App\Models;

use App\Models\Concerns\EscopeOrder;
use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory, EscopeOrder;

    protected $table = 'status';

    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    protected $fillable = ['name','code'];

}
