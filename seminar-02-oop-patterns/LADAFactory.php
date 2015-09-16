<?php
/**
 * Created by PhpStorm.
 * User: programmer
 * Date: 17.08.15
 * Time: 19:11
 */
class LADAFactory extends  Factory {
    private static $bonus = 100;


    public function createOrder() {
        return new LADAOrder($this);
    }

    protected function bonus() {
        return static::$bonus;
    }
}