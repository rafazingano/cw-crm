<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permission;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
        
    public function roles(){
        return $this->belongsToMany(\App\Role::class);
    }

    public function hasPermission(Permission $permission){
        return $this->hasAnyRoles($permission->roles);
    }
    
    public function hasAnyRoles($roles){
        if(is_array($roles) || is_object($roles)){
            return !! $roles->intersect($this->roles)->count();
        }
        return $this->roles->contains('slug', $roles);   
    }
    
    public function sites()
    {
        return $this->hasMany('App\Site');
    }
    
    public function leads()
    {
        return $this->belongsToMany('App\Lead');
    }
    
    public function customers()
    {
        return $this->belongsToMany('App\Customer');
    }
}
