<?php

namespace App\Controllers;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category as CategoryModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException as QE;

class Category extends Model
{
    public $timestamps = false;
    protected $table = 'categories';
    protected $fillable = ['name'];



    static public function createNewCategoryFromPost($name)
    {
        $category = CategoryModel::firstOrNew(['name' => $name]);
        $category->save();
        return $category->id;
    }

    static public function getAllCategory()
    {
        $category = CategoryModel::all();
        if ($category->count() != 0){
            return $category;
        } else {
            return [];
        }
    }
}
