<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    
    protected $fillable = [
        'title', 'slug',
    ];
    
    public function roles(){
        return $this->belongsToMany(\App\Role::class);
    }
}
