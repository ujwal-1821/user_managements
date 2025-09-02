<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
      use HasFactory;
     protected $fillable = ['name', 'description'];

      public function users(){
        return $this->belongsToMany(User::class,'user_role');
    }

public function permissions()
{
    return $this->hasMany(Permission::class);
}

}
