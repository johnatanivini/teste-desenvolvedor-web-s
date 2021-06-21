<?php 

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait EscopeOrder {

    public function scopeOrder(Builder $query, $value = 'id', $type = 'DESC')
    {
        if($value) {
            return $query->orderBy("$value","$type");
        }

    }

}