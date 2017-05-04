<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

    protected $casts = [
        'options' => 'array'
    ];
    protected $fillable = [
        'user_id', 'title', 'options'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
