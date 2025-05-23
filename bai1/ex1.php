<?php

class Animal
{
    public $name;
    protected $age;
    private $color;

    //Phương thức khởi tạo
    public function __construct($name, $age, $color)
    {
        $this->name = $name;
        $this->age = $age;
        $this->color = $color;
    }
    public function info()
    {
        echo "Tên: $this->name <br>";
        echo "Tuổi: $this->age <br>";
        echo "Có màu: $this->color <br>";
    }
}

//Kế thừa
class Cat extends Animal
{
    public function setAge($age)
    {
        $this->age = $age;
    }
}

$cauvang = new Animal("Cậu vàng", 10, "Vàng");
// $cauvang->name = "Cậu Vàng";
// $cauvang->age = 10;
// $cauvang->color = "Vàng";
$cauvang->info();

$tom = new Cat('TOm', 100, "Tam thể");
$tom->setAge(25);

$tom->info();
