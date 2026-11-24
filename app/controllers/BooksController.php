<?php

namespace App\Controllers;

use \App\Models\BooksManager;
<<<<<<< HEAD

abstract class BooksController
{

    public static function indexAction(): void
    {

=======
use \App\Models\TagsManager;
use Core\Model;


abstract class BooksController
{
    public static function indexAction(): void
    {
        global $title, $content;
>>>>>>> 796ceec0787128d861bb6a71ed621751ce59240e
        $books = BooksManager::findAll();

        global $title, $content;
        $title = "Latest Books";
        ob_start();
        include '../app/views/books/index.php';
        $content = ob_get_clean();
    }
<<<<<<< HEAD

    public static function showAction(int $id): void
    {
        $book = BooksManager::findOneById($id);

        global $title, $content;
=======
    public static function showAction(int $id): void
    {
        global $title, $content;
        $book = BooksManager::findOneById($id);

>>>>>>> 796ceec0787128d861bb6a71ed621751ce59240e
        $title = $book->title;
        ob_start();
        include '../app/views/books/show.php';
        $content = ob_get_clean();
    }
}
