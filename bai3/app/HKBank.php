<?php

namespace App;

class HKBank extends Bank
{
    public function info()
    {
        echo "Tài khoản của bạn: {$this->accName} <br>";
        echo "Số tài khoản: {$this->numberAcc} <br>";
        echo "Số dư: {$this->balance} <br>";
    }

    //Nạp tiền vào tài khoản
    public function deposit($money)
    {
        if ($money > 0) {
            $this->addMoneyForBalance($money);
            echo "Bạn đã nạp số tiền {$money} thành công <br>";
            echo "Số dư là: {$this->balance} <br>";
        } else {
            echo "Số tiền nạp không hợp lệ <br>";
        }
    }

    //Rút tiền
    public function withDraw($money)
    {
        if ($money > 0 && $money < $this->balance) {
            $this->balance -= $money;
            echo "Bạn đã rút số tiền {$money} thành công <br>";
            echo "Số dư là: {$this->balance} <br>";
        } else {
            echo "Số tiền rút không hợp lệ <br>";
        }
    }

    //Chuyển tiền
    public function transfer($person, $money)
    {
        if ($money > 0 && $money < $this->balance) {
            $this->balance -= $money;
            $person->addMoneyForBalance($money);
            echo "Bạn đã chuyển số tiền {$money} đến tài khoản {$person->getAccName()} thành công. <br>";
            echo "Số dư của bạn còn lại là: {$this->balance} <br>";
        } else {
            echo "Số tiền cần chuyển không hợp lệ <br>";
        }
    }
}
