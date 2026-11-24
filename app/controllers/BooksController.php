<?php


namespace App\Controllers;


use \App\Models\BooksManager;
use \App\Models\TagsManager;
use Core\Model;


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
    public static function showAction(int $id): void
    {
        global $title, $content;
        $book = BooksManager::findOneById($id);

        $title = $book->title;
        ob_start();
        include '../app/views/books/show.php';
        $content = ob_get_clean();
    }
}
