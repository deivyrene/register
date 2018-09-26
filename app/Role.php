<?php

namespace Siac;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'nameRole', 
        'descriptionRole'
    ];

    public function users()
    {
        $this->belongsToMany('Siac\User');
    }
}
