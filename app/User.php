<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getAuthPassword()
    {
        return $this->password;
    }
    
    public function fonctions()
    {
        return $this->belongsToMany('App\Fonction')->withTimestamps();
    }

    public function authorizeFunctions($fonctions)
    {
        if($this->hasAnyFunction($fonctions))
        {
            return true;
        }
//        dd("Vous ne pouvez pas effectuer cette action");
        return false;
    }

    public function hasAnyFunction($fonctions)
    {
        if(is_array($fonctions))
        {
            foreach ($fonctions as $role)
            {
                if($this->hasFunction($role))
                {
                    return true;
                }
            }
        }else{
            if($this->hasFunction($fonctions))
            {
                return true;
            }
        }
        return false;
    }

    public function hasFunction($fonction)
    {
        if($this->fonctions()->where('typefonction',$fonction)->first())
        {
            return true;
        }
        return false;
    }

}
