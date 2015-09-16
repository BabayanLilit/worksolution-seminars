<?php

/**
 * Created by PhpStorm.
 * User: programmer
 * Date: 17.08.15
 * Time: 19:13
 */
class Order {
    /** @var WorkMan[] */
    private $workMans = array();

    private $factory;

    public function __construct(Factory $factory) {
        $this->factory = $factory;
    }

    public function makeCar(){
        foreach ($this->workMans as $workMan){
            $workMan->income($this);
        }

    }

    public function attach(WorkMan $workMan) {
        $this->workMans[] = $workMan;
    }

    public function getSalary() {
        return $this->factory->getSalary();
    }
}