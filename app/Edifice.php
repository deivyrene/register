<?php

namespace Siac;

use Illuminate\Database\Eloquent\Model;

class Edifice extends Model
{
    protected $fillable = [
        'nameEdifice', 'addressEdifice', 'contactEdifice', 'emailEdifice'
    ];

}
