<?php

namespace Siac;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
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

    public function roles()
    {
        return $this
            ->belongsToMany('Siac\Role');
    }

    public function edifices()
    {
        return $this
            ->belongsToMany('Siac\Edifice')
            ->withTimestamps();
    }

    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Esta acción no está autorizada.');
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }
    
    public function hasRole($role)
    {
        if ($this->roles()->where('nameRole', $role)->first()) {
            return true;
        }
        return false;
    }

    public function hasEdifice()
    {
            $edifice = $this->edifices()->where('user_id', Auth::id())->first();

            $edifice_id= $edifice->pivot->edifice_id;

            return $edifice_id;
    }

    public function typeRole(){

            $role = $this->roles()->where('user_id', Auth::id())->first();

            $nameRole = $role->nameRole;

            return $nameRole;
    }

}
