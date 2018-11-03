<?php

Class Shelter
{
    private $animals = [];
    private $autoIncrement = 0;

    CONST SORT_BY_NAME = 'sortByName';
    CONST SORT_BY_TIME = 'sortByTime';

    public function add(Animal $animal)
    {
        $animal->setStartTime();

        $this->animals[$this->autoIncrement++] = $animal;
    }


    private function sortByTime(Animal $el1, Animal $el2)
    {
        if ($el1->getStartTime() < $el2->getStartTime()) return 1;
        elseif ($el1->getStartTime() > $el2->getStartTime()) return -1;
        else return 0;
    }

    private function sortByName(Animal $el1, Animal $el2)
    {
        if ($el1->getName() < $el2->getName()) return -1;
        elseif ($el1->getName() > $el2->getName()) return 1;
        else return 0;
    }

    function getList()
    {
        return $this->animals;
    }

    private function getSortedList($list, $sortName)
    {
        $sortedList = $list;

        uasort($sortedList, [get_class($this), $sortName]);

        return $sortedList;
    }

    public function getListByType($type)
    {
        $list = array_filter($this->animals, function (Animal $element) use ($type) {
            return $element->getTypeId() === $type;
        });

        return $list;
    }

    public function getSortedListByName()
    {
        $sortedList = $this->getSortedList($this->animals, self::SORT_BY_NAME);

        return $sortedList;
    }

    private function getSortedListByTime()
    {
        $sortedList = $this->getSortedList($this->animals, self::SORT_BY_TIME);

        return $sortedList;
    }

    public function deleteAndGetItem()
    {
        $list = $this->getSortedListByTime();

        $item = array_shift($list);

        unset($this->animals[array_search($item, $this->animals)]);

        return $item;
    }


    public function deleteAndGetItemByType($type)
    {
        $listByType = $this->getListByType($type);

        $sortedListByTime = $this->getSortedList($listByType, self::SORT_BY_TIME);

        $item = array_shift($sortedListByTime);

        unset($this->animals[array_search($item, $this->animals)]);

        return $item;
    }


    public function getSortedListByTypeAndName($type)
    {
        $listByType = $this->getListByType($type);

        $sortedListByName = $this->getSortedList($listByType, self::SORT_BY_NAME);

        return $sortedListByName;
    }
}