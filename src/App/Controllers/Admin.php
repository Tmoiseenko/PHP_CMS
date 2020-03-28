<?php

namespace App\Controllers;

use App\Views\View;
use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        switch ($model){
            case 'post':
                $strModel = 'посты';
                break;
            case 'page':
                $strModel = 'страницы';
                break;
            case 'user':
                $strModel = 'пользователи';
                break;
            case 'category':
                $strModel = 'категории';
                break;
            case 'subscribe':
                $strModel = 'подписки';
                break;
            case 'comment':
                $strModel = 'комментарии';
                break;
            case 'setting':
                $strModel = 'настройки';
                break;
        }
        if (isset($_SESSION["is_auth"]) & $_SESSION["is_auth"] === true){
            $modelClass = 'App\Models\\' . ucfirst($model);
            if (isset($_GET['order_by'])) {
                $objects = $modelClass::orderBy($_GET['order_by'], $_GET['order'])->get();
            } else {
                $objects = $modelClass::all();
            }
            $base_per_page = Setting::where('name', '=', "per_page_admin")->firstOrFail();
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

            return new View("admin.get-all-$model", [
                'title'  =>  "Все $strModel",
                'objects'   =>  $objects,
                'num_pages' => $num_pages,
                'page' => $page,
                'current_page' => $current_page,
                'model' => $model
            ]);
        } else {
            return header("Location: /login");
        }
    }

    static public function createPost()
    {
        if (isset($_SESSION["is_auth"]) & $_SESSION["is_auth"] === true){
            return new View('admin.postCreate', [
                'title'  =>  'Создание Пост',
                'categories'    => Category::all()
            ]);
        } else {
            return header("Location: /login");
        }

    }

    static public function savePost()
    {
        if (isset($_SESSION["is_auth"]) & $_SESSION["is_auth"] === true){
            if (isset($_POST['createPost'])) {
                if (isset($_FILES)){
                    $image = file_get_contents($_FILES['image']['tmp_name']);
                    if ($image) {
                        if (file_put_contents(UPLOAD_DIR . $_FILES['image']['name'], $image)){
                            $imagePath = UPLOAD_DIR . $_FILES['image']['name'];
                        }
                    }
                }
                $prop = [
                    'title' => htmlspecialchars($_POST['title']),
                    'slug' => htmlspecialchars($_POST['slug']),
                    'content' => htmlspecialchars($_POST['content']),
                    'category_id' => (int) $_POST['category'],
                    'image' => $imagePath ?? '',
                ];
                try {
                    $post = Post::firstOrNew($prop);
                    $post->save();
                    return header("Location: /admin/post");
                } catch (\Exception $e){
                    return new View('404', [
                        'title'  =>  'Упс кажется такой страницы нет',
                        'e'    => $e
                    ]);
                }
            }
        } else {
            return header("Location: /login");
        }
    }

    static public function getUpdatePost($model, $id)
    {
        if (isset($_SESSION["is_auth"]) & $_SESSION["is_auth"] === true){
            try {
                $post = Post::findOrFail($id);
                return new View('admin.postUpdate', [
                    'title'  =>  'Создание Пост',
                    'post'  => $post,
                    'categories'    => Category::all(),
                ]);
            } catch (ModelNotFoundException $e) {
                return new View('404', [
                    'title'  =>  'Упс кажется такой страницы нет',
                    'e'    => $e
                ]);
            } catch (\Exception $e) {
                return new View('404', [
                    'title'  =>  'Упс кажется такой страницы нет',
                    'e'    => $e
                ]);
            }

        } else {
            return header("Location: /login");
        }
    }

    static public function saveUpdatePost($model, $id)
    {
        if (isset($_SESSION["is_auth"]) & $_SESSION["is_auth"] === true){
            if (isset($_POST['createPost'])) {
                if (isset($_FILES) && $_FILES['image']['name'] !== ''){
                    $image = file_get_contents($_FILES['image']['tmp_name']);
                    if ($image) {
                        if (file_put_contents(UPLOAD_DIR . $_FILES['image']['name'], $image)){
                            $imagePath = UPLOAD_DIR . $_FILES['image']['name'];
                        }
                    }
                }
                $prop = [
                    'title' => htmlspecialchars($_POST['title']),
                    'slug' => htmlspecialchars($_POST['slug']),
                    'content' => htmlspecialchars($_POST['content']),
                    'category_id' => (int) $_POST['category'],
                    'image' => $imagePath ?? '',
                ];
                try {
                    $category = Category::find((int) $_POST['category']);
                    $post = Post::findOrFail($id);
                    $post->title = htmlspecialchars($_POST['title']);
                    $post->slug = htmlspecialchars($_POST['slug']);
                    $post->content = htmlspecialchars($_POST['content']);
                    $post->category()->associate($category);
                    if (isset($imagePath)) {
                        $post->image = $imagePath;
                    }
                    $post->save();
                    return header("Location: /admin/post");
                } catch (\Exception $e){
                    return new View('404', [
                        'title'  =>  'Упс кажется такой страницы нет',
                        'e'    => $e
                    ]);
                }
            }
        } else {
            return header("Location: /login");
        }
    }
}
