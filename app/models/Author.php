<?php

namespace App\Models;

class Author
{

    private $id, $firstname, $lastname, $biography, $picture, $created_at;

    private $books;

    public function __get(string $property): mixed
    {
        $setterName = 'set' . ucfirst($property);
        if (method_exists($this, $setterName)) $this->$setterName();
        return $this->$property;
    }
    private function setBooks(): void
    {
        $this->books = BooksManager::findAllByAuthorId($this->id);
    }
}


