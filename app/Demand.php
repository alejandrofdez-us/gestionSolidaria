<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{

    protected $fillable = [
        'description', 'demandType', 'accepted', 'satisfied', 'cancelled', 'validity', 'address', 'userType'
    ];

    public function demandingUser()
    {
        return $this->belongsTo('App\User');
    }


    public function volunteeringUser()
    {
        return $this->belongsTo('App\User');
    }

}
