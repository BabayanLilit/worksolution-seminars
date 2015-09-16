<?php

/**
 * Created by PhpStorm.
 * User: programmer
 * Date: 17.08.15
 * Time: 19:11
 */
abstract class Factory {

    const PRICE_CAR = 1000;

    /**
     * @return Order
     */
    abstract public function createOrder();

    public function getSalary(){
        return static::PRICE_CAR + $this->bonus();
    }

    protected function bonus() {
        return 0;
    }
}