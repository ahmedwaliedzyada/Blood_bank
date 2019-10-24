<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $fillable = array('type','token');

    public function client()
    {
        return $this->belongsTo('App\Models\Token');
    }
}
