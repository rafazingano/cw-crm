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
    
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function sites()
    {
        return $this->hasMany('App\Site');
    }
    
    public function leads()
    {
        return $this->hasMany('App\Site')
                ->join('leads', 'leads.site_id', '=', 'sites.id');
    }
}
