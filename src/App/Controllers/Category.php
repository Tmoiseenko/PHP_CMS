<?php

namespace App\Controllers;

use App\Views\View;
use App\Models\Category as CategoryModel;

class Category
{

    static public function getAll($adminTmp = false)
    {
        if (isset($_GET['order_by'])) {
            $objects = CategoryModel::orderBy($_GET['order_by'], $_GET['order'])->get();
        } else {
            $objects = CategoryModel::all();
        }
        $base_per_page = \App\Models\Setting::where('slug', '=', "per_page_admin")->firstOrFail();
        $per_page = $_GET['per_page'] ?? ($base_per_page->value ?? '3');
        $current_page = 1;
        if (isset($_GET['page']) && $_GET['page'] > 0) {
            $current_page = $_GET['page'];
        }
        $start = ($current_page - 1) * $per_page;
        $rows = $objects->count();
        $num_pages = ceil($rows / $per_page);
        $page = 0;
        $objects = $objects->skip($start)->take($per_page);
        $template = $adminTmp ? 'admin.get-all-category' : 'index' ;
        return new View($template, [
            'title'  =>  "Все посты",
            'objects'   =>  $objects,
            'num_pages' => $num_pages,
            'page' => $page,
            'current_page' => $current_page,
            'model' => 'post'
        ]);
    }

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
