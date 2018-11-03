<?php
require_once("Animal.php");

Class Cat extends Animal
{
    public function __construct($name, $age)
    {
        parent::__construct($name, $age, Animal::TYPE_ID_CAT);
    }
}