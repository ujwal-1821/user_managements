<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded =  ['id'];

     public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
