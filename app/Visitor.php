<?php

namespace Siac;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'nameVisitor', 'surnameVisitor', 'rutVisitor', 'emailVisitor', 'addressVisitor', 'companyVisitor'
    ];


    public function places(){

        return $this->belongsToMany('Siac\Place');
    }
}
