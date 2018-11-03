<?php

Class Animal
{
    protected $name;
    protected $age;
    protected $type;
    protected $time;

    CONST TYPE_ID_CAT = 1;
    CONST TYPE_ID_DOG = 2;
    CONST TYPE_ID_TURTLE = 3;

    public function __construct($name, $age, $type)
    {
        $this->name = $name;
        $this->age = $age;
        $this->type = $type;
    }

    public function setStartTime() {
        $this->time = time();
    }

    public function getStartTime() {
        return $this->time;
    }

    public function getTypeId() {
        return $this->type;
    }

    public function getTypeName($id) {
        $list = $this->typesName();

        return $list[$id];
    }

    public function getName() {
        return $this->name;
    }

    private function typesName() {
        $list = [
            self::TYPE_ID_CAT => 'Кошка',
            self::TYPE_ID_DOG => 'Собака',
            self::TYPE_ID_TURTLE => 'Черепаха',
        ];

        return $list;
    }
}