<?php

namespace Siac;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        'numberPlace', 'namePlace', 'phonePlace', 'ownerPlace', 'mailPlace', 'edifice_id'
    ];

    public function visitors()
    {
        return $this->belongsToMany('Siac\Visitor');
    }

    public function edifices()
    {
        return $this->belongsTo('Siac\Edifice', 'edifice_id');
    }
}
