<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'image', 'category_id');

    public static function find(array $array)
    {
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

}
