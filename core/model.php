<?php
namespace Core;

abstract class Model{
    public function __get(string $property): mixed
    {
        if (property_exists($this, $property)) :
            $setterName = 'set' . ucfirst($property); //construction des setters
            if (method_exists($this, $setterName)) : $this->$setterName();
            endif;
            return $this->$property;
        endif;
    }

}
//Méthode magique => se déclenche grâce à un trigger. il se lance quand on tente d'acceder à une propriété qui n'existe pas ou une propriété private