<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('email', 'phone', 'facebook_url', 'twitter_url', 'youtube_url', 'instgram_url', 'whatsup_url', 'image','about_us');

}
