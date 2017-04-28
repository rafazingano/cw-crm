<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'site_id', 'content',
    ];
    
    public function site()
    {
        return $this->belongsTo('App\Site');
    }
}
