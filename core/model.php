<?php


namespace Core;


abstract class Model
{


    // GETTER MAGIIIIQUE: 
    // Getter qui se lance quand on tente d'accéder à 
    // - une propriété qui n'existe pas
    // - une propriété private
    public function __get(string $property): mixed
    {
        $this->magicSetter($property);
        return $this->$property;
    }
    public function magicSetter($property): void
    {
        if (! $this->$property) :
            if (\Core\Inflect::is_plural($property)):
                // Cas $books->tags ($property : 'tags')
                // TagsManager::findAllByBookId($this->id)
                $managerName = '\App\Models\\' . ucfirst($property) . 'Manager';
                $className = explode('\\', get_class($this));
                $methodName = 'findAllBy' . end($className) . 'Id';
                $this->$property = $managerName::$methodName($this->id);
            else:
                // Cas $book->author  ($property : 'author')
                // AuthorsManager::findoneById($this->author_id)
                $managerName = '\App\Models\\' . ucfirst(\Core\Inflect::pluralize($property)) . 'Manager';
                $fkName = $property . '_id';
                $this->$property = $managerName::findOneById($this->$fkName);
            endif;
        endif;
    }
}


//Méthode magique => se déclenche grâce à un trigger. il se lance quand on tente d'acceder à une propriété qui n'existe pas ou une propriété private

