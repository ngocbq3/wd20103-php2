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
    public $favorite;
    public function __construct($name, $age, $color, $favorite)
    {
        parent::__construct($name, $age, $color);
        $this->favorite = $favorite;
    }
    public function setAge($age)
    {
        $this->age = $age;
    }
}
$tom = new Cat("TOm", 25, "Tam thể", "Xương");
$tom->info();

/**
 * Hãy tạo 1 lớp People bao gồm các thuộc tính
 * tên, tuoi, diachi phương thức khởi tạo và thông tin
 * trong đó thuộc tính diachi và tuoi được bảo vệ.
 * Tạo lớp con Employee kế thừa từ lớp People
 * và các phương thức để đặt lại giá trị cho thuộc tính tuoi và diachi
 */
