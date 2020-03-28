<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'slug', 'content', 'category_id', 'image'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

}
