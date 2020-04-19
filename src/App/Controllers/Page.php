<?php

namespace App\Controllers;

use App\Models\Page as PageModel;
use App\Models\Setting;
use App\Views\View;

class Page
{
    static public function getAll($adminTmp = false)
    {
        if (isset($_GET['order_by'])) {
            $objects = PageModel::orderBy($_GET['order_by'], $_GET['order'])->get();
        } else {
            $objects = PageModel::all();
        }
        $base_per_page = Setting::where('slug', '=', "per_page_admin")->firstOrFail();
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
        $template = $adminTmp ? 'admin.get-all-page' : 'index' ;
        return new View($template, [
            'title'  =>  "Все посты",
            'objects'   =>  $objects,
            'num_pages' => $num_pages,
            'page' => $page,
            'current_page' => $current_page,
            'model' => 'post'
        ]);
    }
}
