<?php

namespace App\Controllers;


use \App\Models\BooksManager;
use \App\Models\TagsManager;

abstract class PagesController
{

    //void : pcq la fonction ne retourne rien
    public static function homeAction(): void
    {
        $books = BooksManager::findAll(3);
        global $title, $content, $tags;
        $tags = TagsManager::findAll();
        $title = "Latest Books & Authors";

        ob_start();
        include '../app/views/pages/home.php';
        $content = ob_get_clean();
    }
}
