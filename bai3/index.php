<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\HKBank;

$person1 = new HKBank('Nam', 12345, 10000);
$person2 = new HKBank('Nguyễn Long', 12346, 1000);

$person1->transfer($person2, 2500);

echo "<hr>";
$person1->info();
echo "<hr>";
$person2->info();
