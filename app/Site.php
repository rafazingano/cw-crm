<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'customer_id', 'title'
    ];
    
    public function scopeCustomer($query){
        $customer = auth()->user()->customers()->first();
        $customer_id = isset($customer->id)? $customer->id : 0;
        return $query->where('customer_id', $customer_id);
    }
    
    public function domains()
    {
        return $this->hasMany('App\Domain');
    }
    
}
