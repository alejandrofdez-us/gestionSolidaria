<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{

    protected $fillable = [
        'description', 'demandType', 'accepted', 'satisfied', 'cancelled', 'validity'
    ];

    public function petitionerUser()
    {
        return $this->belongsTo('App\User');
    }


    public function volunteeringUser()
    {
        return $this->belongsTo('App\User');
    }

}
