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
        return $this->belongsTo('App\User', 'petitioner_id');
    }


    public function volunteeringUser()
    {
        return $this->belongsTo('App\User','volunteer_id');
    }

}
