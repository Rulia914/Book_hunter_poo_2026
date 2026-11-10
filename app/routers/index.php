<?php
//Route par défaut : les trois derniers livres
//PATTERN : /
//URL : ?
//CTRL : booksController
//ACTION : homeAction
include_once '../app/controllers/pagesController.php';
\App\Controllers\PagesController\homeAction($connexion);
