<?php

namespace App\Models;

class Book extends \Core\Model
{
    //champs natifs
    protected $id, $title, $publicated_at, $resume, $cover, $isbn, $author_id, $category_id, $created_at, $notation;
    //champs issus de liaisons
    protected $author, $category, $tags;

 
    protected function setAuthor()
    {
        $this->author = AuthorsManager::findOneById($this->author_id);
    }

    protected function setCategory()
    {
        $this->category = CategoriesManager::findOneById($this->category_id);
    }
    protected function setTags()
    {
        $this->tags = TagsManager::findAllByBookId($this->id);
    }
}
