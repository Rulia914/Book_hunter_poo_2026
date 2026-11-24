<?php


namespace App\Controllers;


use \App\Models\AuthorsManager;
use \App\Models\TagsManager;


abstract class AuthorsController
{
    public static function indexAction(): void
    {

        global $title, $content, $tags;
        $authors = AuthorsManager::findAll();
        $tags = TagsManager::findAll();

        $title = "Latest Authors";
        ob_start();
        include '../app/views/authors/index.php';
        $content = ob_get_clean();
    }
    public static function showAction(int $id): void
    {
        global $title, $content;
        $author = AuthorsManager::findOneById($id);

        $title = $author->firstname .' '. $author->lastname;
        ob_start();
        include '../app/views/authors/show.php';
        $content = ob_get_clean();
    }
}
