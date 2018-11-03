<?php
require_once($_SERVER['DOCUMENT_ROOT']. '/Animals/Animal.php');

class Human
{
    private $animals = [];

    public function addAnimal(Animal $animal) {
        $this->animals[] = $animal;
    }

    public function getListAnimals() {
        return $this->animals;
    }
}