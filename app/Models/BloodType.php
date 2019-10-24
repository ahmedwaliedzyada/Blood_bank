<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{

    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = array('type');

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client')->withPivot('client_id','blood_type_id');;
    }

    public function donationRequest()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

}
