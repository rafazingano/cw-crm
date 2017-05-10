<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $casts = [
        'content' => 'array'
    ];
    protected $fillable = [
        'site_id', 'code', 'content',
    ];
    
    public function site()
    {
        return $this->belongsTo('App\Site');
    }
    
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
