<?php


namespace App\Controllers;


use \App\Models\BooksManager;
use \App\Models\TagsManager;


abstract class BooksController
{


    public static function indexAction(): void
    {

        global $title, $content;
        $books = BooksManager::findAll();

        $title = "Latest Books";
        ob_start();
        include '../app/views/books/index.php';
        $content = ob_get_clean();
    }
}
