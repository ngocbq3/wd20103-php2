<?php

use Animal as GlobalAnimal;

abstract class Animal
{
    public $name;
    public $age;
    public $color;

    public function __construct($name, $age, $color)
    {
        $this->name = $name;
        $this->age = $age;
        $this->color = $color;
    }

    public abstract function sound();
    public abstract function eat($food);
}

class Dog extends Animal
{
    public function sound()
    {
        echo "$this->name đang kêu gâu gâu ..<br>";
    }
    public function eat($food)
    {
        echo "$this->name đang ăn $food <br>";
    }
}

$dog = new Dog("Cậu vàng", 12, "Vàng");
$dog->sound();
