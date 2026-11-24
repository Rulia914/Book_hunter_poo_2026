<?php


if (isset($_GET['authors'])):
    include '../app/routers/authors.php';
elseif (isset($_GET['books'])):
    include '../app/routers/books.php';
else:
    \App\Controllers\PagesController::homeAction();
endif;
