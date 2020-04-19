<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'category_id', 'image'];
    protected $dates = ['created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

}
