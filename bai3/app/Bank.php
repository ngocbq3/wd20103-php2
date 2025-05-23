<?php

namespace App;

abstract class Bank
{
    protected $accName;
    protected $numberAcc;
    protected $balance;

    public function __construct($accName, $numberAcc, $balance)
    {
        $this->accName = $accName;
        $this->numberAcc = $numberAcc;
        $this->balance = $balance;
    }

    public function addMoneyForBalance($money)
    {
        $this->balance += $money;
    }
    public function getAccName()
    {
        return $this->accName;
    }

    public abstract function deposit($money);
    public abstract function withDraw($money);
    public abstract function transfer($person, $money);
}
