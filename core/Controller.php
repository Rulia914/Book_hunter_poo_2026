<?php
namespace Core;


abstract class Controller
{
    protected $manager, $record, $records, $controller;

    private function init()
    {
        $controller = explode('\\', get_class($this));
        $this->records = strtolower(str_replace('controller','', end($controller)));
        
    }
    public static function indexAction(): void
    {
        $this->init();
        $authors = AuthorsManager::findAll();
        global $title, $content;
        $title = "Latest Authors";
        ob_start();
        include '../app/views/authors/index.php';
        $content = ob_get_clean();
    }
}