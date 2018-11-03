<?php
require_once("Animal.php");

Class Turtle extends Animal
{
    public function __construct($name, $age)
    {
        parent::__construct($name, $age, Animal::TYPE_ID_TURTLE);
    }
}