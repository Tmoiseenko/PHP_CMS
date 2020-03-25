<?php

namespace App\Controllers;

use App\Views\View;

class Admin
{
    static public function getIndex()
    {
        if (isset($_SESSION["is_auth"]) & $_SESSION["is_auth"] === true){
            return new View('admin.index', [
                'title'  =>  'Admin Panel',
            ]);
        } else {
            return header("Location: /login");
        }

    }

    static public function getModel($model)
    {
        if (isset($_SESSION["is_auth"]) & $_SESSION["is_auth"] === true){
            $modelClass = 'App\Models\\' . ucfirst($model);
            if (isset($_GET['order_by'])) {
                $objects = $modelClass::orderBy($_GET['order_by'], $_GET['order'])->get();
            } else {
                $objects = $modelClass::all();
            }
            $per_page = $_GET['per_page'] ?? '3';
            $current_page = 1;
            if (isset($_GET['page']) && $_GET['page'] > 0) {
                $current_page = $_GET['page'];
            }
            $start = ($current_page - 1) * $per_page;
            $rows = $objects->count();
            $num_pages = ceil($rows / $per_page);
            $page = 0;
            $objects = $objects->skip($start)->take($per_page);

            return new View('admin.allModelTable', [
                'title'  =>  'Admin Panel',
                'objects'   =>  $objects,
                'num_pages' => $num_pages,
                'page' => $page,
                'current_page' => $current_page
            ]);
        } else {
            return header("Location: /login");
        }
    }

    static public function createPost($id)
    {
        return new View('admin.postCreate', [
            'title'  =>  'Создать Пост',
        ]);
    }
}
