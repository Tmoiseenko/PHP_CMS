<?php

namespace App\Controllers;

use App\Views\View;
use App\Models\Post as PostModel;

class Post
{
    static public function getPost($id)
    {
        try {

            $post = PostModel::findOrFail($id);
            return new View('post', [
                'title'  =>  'Создание Пост',
                'post'  => $post,
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
    }
}
