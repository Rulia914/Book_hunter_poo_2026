<?php
namespace App\Models;

class Book {
    //champs natifs
    public $id, $title, $publicated_at, $resume, $cover, $isbn, $author_id, $category_id, $created_at, $notation;
    //champs issus de liaisons
    private $author, $category, $tags;

    public function __get(string $property): mixed {
        $setterName = 'set' . ucfirst($property); //construction des setters
        if(method_exists($this, $setterName)) $this->$setterName(); 
        return $this->$property;
    }

    private function setAuthor(){
        $this->author = AuthorsManager::findOneById($this->author_id);
    }

    private function setCategory(){
        $this->category = CategoriesManager::findOneById($this->category_id);
    }
    private function setTags(){
        $this->tags = TagsManager::findAllByBookId($this->id);
    }
}