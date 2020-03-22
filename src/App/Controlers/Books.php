<?php

namespace App\Controlers;

use App\Models\Book;
use App\Views\View;

class Books
{
    static public function createBook()
    {
        $arr = ['id' => null, 'author' => 'Артур Конандоил', 'title' => 'Шерлок Холмс'];
        $book = Book::create($arr);
        return $book;
    }

    static public function getAllBooks()
    {
        return new View('books', [
            'title' => 'Books',
            'content' => Book::all()
        ]);
    }
}
