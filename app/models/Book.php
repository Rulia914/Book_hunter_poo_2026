<?php

namespace App\Models;

use Core\Model;

class Book extends Model
{

    // Champs natifs
    protected $id, $title, $publicated_at, $resume, $cover, $isbn, $author_id, $category_id, $created_at, $notation;

    // Champs issus de liaisons
    protected $author, $category, $tags;

    
}
