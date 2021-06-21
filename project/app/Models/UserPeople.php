<?php

namespace App\Models;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPeople extends Model
{
   use HasFactory;

   protected $dates = [
    'created_at',
    'deleted_at',
    'updated_at'
   ];

   protected $fillable = [
       'people_id',
       'user_id'
   ];

   public function people()
   {
       return $this->belongsTo(People::class,'people_id','id');
   }

   public function user()
   {
       return $this->belongsTo(User::class,'user_id','id');
   }

}
