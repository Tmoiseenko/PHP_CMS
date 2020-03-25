<?php

namespace App\Controllers;

use App\Views\View;
use App\Models\User;

class Main
{
    static public function getIndex()
    {
        return new View('index', [
           'title'  =>  'Skill CMS Blog',
        ]);
    }

    static public function getTest()
    {
        return new View('test', [
            'title'  =>  'Skill CMS Blog',
        ]);
    }
}
