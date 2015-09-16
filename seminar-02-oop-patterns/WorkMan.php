<?php

/**
 * Created by PhpStorm.
 * User: programmer
 * Date: 17.08.15
 * Time: 19:14
 */
class WorkMan {
    private $money = 0;
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function income(Order $order){
        $this->money += $order->getSalary();
    }

    public function showMoney(){
        printf("%s заработал(а) %s руб\n", $this->name, $this->money);
    }
}