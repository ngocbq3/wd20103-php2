<?php

interface Animal
{
    public function sound();
    public function eat($food);
    public function run();
}

class Dog implements Animal
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
        echo "$this->name đang kêu gâu gâu ..<br>";
    }
    public function eat($food)
    {
        echo "$this->name đang ăn $food <br>";
    }
    public function run()
    {
        echo "$this->name đang chạy rất nhanh <br>";
    }
}

$dog = new Dog("Cậu vàng", 12, "Vàng");
$dog->sound();
$dog->run();
$dog->eat("Xương");
/**
 * BÀI TẬP ÁP DỤNG
 * Hãy viết 1 class trừu tượng Student bao gồm các thuộc tính:
 * hoten, namsinh, diachi, diem, và phương thức khởi tạo.
 * Có các phương thức trừu tượng: đi học, đi thi, điểm danh, thôn tin sinh viên, và kiểm tra điểm
 * Tạo 2 lớp Caodang, Daihoc để triển khai cho lớp Student
 * trong đó phương thức kiểm tra điểm:
 * Cao đẳng: 9->10: xuất sắc, 8 -> <9: Giỏi, 7-> <8: Khá, 5 -> <7 TB, <5 là yếu. còn lại là điểm ko hợp lệ
 * Đại học: 4->5: Xuất sắc, 3->4 giỏi, 2->3 TB, <2 Yếu. CÒn lại là không hợp lệ
 */