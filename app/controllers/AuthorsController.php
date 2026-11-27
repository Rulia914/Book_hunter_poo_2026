<?php


namespace App\Controllers;

use \Core\Controller;
use \App\Models\AuthorsManager;


abstract class AuthorsController extends Controller
{


    public static function indexAction(): void
    {


        $authors = AuthorsManager::findAll();


        global $title, $content;
        $title = "Latest Authors";
        ob_start();
        include '../app/views/authors/index.php';
        $content = ob_get_clean();
    }


    public static function showAction(int $id): void
    {
        $author = AuthorsManager::findOneById($id);


        global $title, $content;
        $title = $author->firstname . ' ' . $author->lastname;
        ob_start();
        include '../app/views/authors/show.php';
        $content = ob_get_clean();
    }
}
