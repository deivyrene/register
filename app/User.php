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
        'name', 'email', 'password', 'edifice_id', 'role_id'
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
            ->belongsTo('Siac\Role', 'role_id');
    }

    public function edifices()
    {
        return $this
            ->belongsTo('Siac\Edifice', 'edifice_id');
    }

    public function places()
    {
        return $this->belongsTo('Siac\Place', 'place_id');
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
            $edifice = $this->edifices()->where('id', Auth::user()->edifice_id)->first();

            $edifice_id= $edifice->id;

            return $edifice_id;
    }

    public function nameEdifice(){

            $edifice = $this->edifices()->where('id', Auth::user()->edifice_id)->first();

            $edifice_id = $edifice->nameEdifice;

            return $edifice_id;
    }
    public function hasPlace(){

            $place = $this->places()->where('id', Auth::user()->place_id)->first();

            $place_id = $place->id;

            return $place_id;
    }

    public function typeRole(){

            $role = $this->roles()->where('id', Auth::user()->role_id)->first();

            $nameRole = $role->nameRole;

            return $nameRole;
    }
    public function nameRole(){

        $role = $this->roles()->where('id', Auth::user()->role_id)->first();

        $nameRole = $role->descriptionRole;

        return $nameRole;
}

}
