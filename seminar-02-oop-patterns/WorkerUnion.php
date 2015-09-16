<?php

/**
 * Created by PhpStorm.
 * User: programmer
 * Date: 17.08.15
 * Time: 19:10
 */
class WorkerUnion {
    private static $instance;
    /** @var  Factory */
    private $LADAFactory;
    /** @var  Factory */
    private $BMWFactory;

    public static function getManager(){
        if (!self::$instance){
            self::$instance = new WorkerUnion();
        }
        return self::$instance;

    }

    private function __construct(){
        $this->BMWFactory = new BMWFactory();
        $this->LADAFactory = new LADAFactory();
    }

    /**
     * @return Factory
     */
    public function getLADAFactory() {
        return $this->LADAFactory;
    }

    /**
     * @return Factory
     */
    public function getBMWFactory() {
        return $this->BMWFactory;
    }
}