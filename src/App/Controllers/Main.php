<?php

namespace App\Controllers;

use App\Views\View;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Category;

class Main
{
    static public function getIndex()
    {
        if (isset($_GET['order_by'])) {
            $posts = Post::orderBy($_GET['order_by'], $_GET['order'])->get();
        } else {
            $posts = Post::all();
        }
        $base_per_page = Setting::where('name', '=', "per_page_front")->firstOrFail();
        $per_page = $_GET['per_page'] ?? ($base_per_page->value ?? '4');
        $current_page = 1;
        if (isset($_GET['page']) && $_GET['page'] > 0) {
            $current_page = $_GET['page'];
        }
        $start = ($current_page - 1) * $per_page;
        $rows = $posts->count();
        $num_pages = ceil($rows / $per_page);
        $page = 0;
        $posts = $posts->skip($start)->take($per_page);

        return new View("index", [
            'title'  =>  "Главная",
            'posts'   =>  $posts,
            'num_pages' => $num_pages,
            'page' => $page,
            'current_page' => $current_page,
//            'categories'    => Category::all()
        ]);
    }
}
