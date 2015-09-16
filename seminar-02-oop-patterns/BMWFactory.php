<?php
/**
 * Created by PhpStorm.
 * User: programmer
 * Date: 17.08.15
 * Time: 19:11
 */
class BMWFactory extends  Factory {

    public function createOrder() {
        return new BMWOrder($this);
    }


}