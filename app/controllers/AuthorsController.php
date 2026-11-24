<?php

namespace App\Controllers;

use \App\Models\AuthorsManager;

abstract class AuthorsController
{
<<<<<<< HEAD

=======
>>>>>>> 796ceec0787128d861bb6a71ed621751ce59240e
    public static function indexAction(): void
    {

        $authors = AuthorsManager::findAll();

        global $title, $content;
        $title = "Latest Authors";
        ob_start();
        include '../app/views/authors/index.php';
        $content = ob_get_clean();
    }
<<<<<<< HEAD

    public static function showAction(int $id): void
    {
        $author = AuthorsManager::findOneById($id);

        global $title, $content;
        $title = $author->firstname . ' ' . $author->lastname;
=======
    public static function showAction(int $id): void
    {
        global $title, $content;
        $author = AuthorsManager::findOneById($id);

        $title = $author->firstname .' '. $author->lastname;
>>>>>>> 796ceec0787128d861bb6a71ed621751ce59240e
        ob_start();
        include '../app/views/authors/show.php';
        $content = ob_get_clean();
    }
}
