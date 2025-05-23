<?php

class Animal
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
    public function sound()
    {
        echo "$this->name đang kêu ... <br>";
    }
    public function eat($food)
    {
        echo "$this->name đang ăn $food <br>";
    }
}

class Dog extends Animal
{
    public function sound()
    {
        echo "$this->name đang kêu gâu .. gâu ..<br>";
    }
}
class Cat extends Animal
{
    public function sound()
    {
        echo "$this->name đang kêu meo .. meo ..<br>";
    }
}

$dog = new Dog("Scupydoo", 12, "Vàng");
$cat = new Cat("TOm", 25, "Tam thể");

$dog->sound();
$cat->sound();
