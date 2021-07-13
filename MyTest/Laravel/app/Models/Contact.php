<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use  HasFactory;

    /********************************************
     ***************** Variables ****************
    ********************************************/

    /* The attributes that cannot be assigned collectively. */
    protected $guarded = [
    ];

    /* The attributes that should be hidden for arrays. */
    protected $hidden = [
    ];

    /* The attributes that should be cast to native types. */
    protected $casts = [
    ];

    /* The relationships that should always be loaded. */
    protected $with = [
        'entreprise'
    ];
    function entreprise() {
        return $this->belongsTo(Entreprise::class, 'entreprise_id', 'id');
    }
}
