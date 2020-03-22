<?php

namespace App\Controllers;

use App\Views\View;

class Main
{
    static public function getIndex()
    {
        return new View('index', [
           'title'  =>  'Skill CMS Blog',
            'content'   =>  'f;kdsf;lkd;lk'
        ]);
    }
}
