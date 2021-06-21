<?php

namespace App\Models;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at'
    ]

    protected $fillable = [
        'street',
        'number',
        'zipcode',
        'complement'
    ];

    public function people()
    {
        $this->belongsTo(People::class,'people_id','id');
    }
}
