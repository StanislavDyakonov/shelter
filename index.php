<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/Human.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/Shelter.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/Animals/Cat.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/Animals/Dog.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/Animals/Turtle.php");

$human = new Human();
$shelter = new Shelter();

$cat1 = new Cat('Mega cat', 10);
$cat2 = new Cat('Super cat', 11);
$dog1 = new Dog('Little dog', 2);
$dog2 = new Dog('Just dog', 4);
$turtle1 = new Turtle('Older turtle', 100);


$shelter->add($cat1);

sleep(1);
$shelter->add($cat2);

sleep(1);
$shelter->add($dog1);

sleep(1);
$shelter->add($dog2);

sleep(1);
$shelter->add($turtle1);

?>
<pre>
<?php
// - Посмотреть всех животных определенного типа, сортированных по кличке в алфавитном порядке.
$sortedListByName = $shelter->getSortedListByTypeAndName(Animal::TYPE_ID_DOG);
print_r($sortedListByName);

// - Передать человеку животное (определенного типа), находящееся в приюте наибольшее время.
$item = $shelter->deleteAndGetItem();
$human->addAnimal($item);

// - Передать человеку животное (без указания типа), находящееся приюте наибольшее время.
$itemDog = $shelter->deleteAndGetItemByType(Animal::TYPE_ID_DOG);
$human->addAnimal($itemDog);

print_r($human->getListAnimals());
?>
</pre>
