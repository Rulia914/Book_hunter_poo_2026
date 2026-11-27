<?php

namespace App\Models;

use Core\Model;

class Author extends Model
{

    protected $id, $firstname, $lastname, $biography, $picture, $created_at;

    protected $books;

}


