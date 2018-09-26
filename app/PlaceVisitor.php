<?php

namespace Siac;

use Illuminate\Database\Eloquent\Model;

class PlaceVisitor extends Model
{
    protected $fillable = [
        'comments', 'arrivalTime', 'departureTime', 'visitor_id', 'place_id'
    ];

    public function visitors(){
    
        return $this->belongsTo('Siac\Visitor', 'visitor_id');
    }

    public function places(){
    
        return $this->belongsTo('Siac\Place', 'place_id');
    }
}
