<?php
/**
 * Created by PhpStorm.
 * User: programmer
 * Date: 11.08.15
 * Time: 18:54
 */
class Lot{
    private $name;
    public function __construct($name){
        $this->name = $name;
    }
}
class Bid {
    private $price;
    private $user;
    public function __construct($user,$price) {
        $this->user = $user;
        $this->price = $price;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getUser(){
        return $this->user;
    }
}
class User {
    private $name;
    /**
     * @param $name
     */
    public function __construct($name) {
        $this->name = $name;
    }
    /**
     * @return string
     */
    public function getName(){
        return $this->name;
    }
}
class BaseAuction {
    private $lot;
    private $startTime;
    protected $bids;
    private $interval;
    public function __construct(Lot $lot,$interval=5) {
        $this->lot = $lot;
        $this->interval = $interval;
    }
    public function start(){
        $this->startTime = time();
    }
    public function getWinner() {
        $bid = array_pop($this->bids);
        if (!$bid){
            return "Лот не разыгран";
        }
        array_push($this->bids, $bid);
        return $bid->getUser()->getName();
    }
    /**
     * @return bool|mixed
     */
    public function getLastBid() {
        if (is_array($this->bids)){
            $bid = array_pop($this->bids);
            array_push($this->bids, $bid);
            return $bid;
        }
        return false;
    }
    public function isFinish(){
        $now = time();
        return $now > ($this->startTime + $this->interval);
    }
    public function makeBid(Bid $bid) {
        $lastBid = $this->getLastBid();
        if ($lastBid  && $lastBid->getPrice() > $bid->getPrice()){
            return false;
        }
        $this->bids[] = $bid;
    }
}
class FirstTypeAuction extends BaseAuction {
}
class SecondTypeAuction extends BaseAuction{
    public function makeBid(Bid $bid) {
        parent::makeBid($bid);
        $this->start();
    }
}
$firstAuction = new FirstTypeAuction( new Lot("first lot") );
$firstAuction->start();
$firstBid = new Bid (new User("User1"),500);
$firstAuction->makeBid($firstBid);
sleep(5);
if (!$firstAuction->isFinish()){
    $secondBid = new Bid (new User("User2"),600);
    $firstAuction->makeBid($secondBid);
}
sleep(5);
if ($firstAuction->isFinish()){
    var_dump($firstAuction->getWinner());
}
$secondAuction = new SecondTypeAuction( new Lot("second lot") );
$firstBid = new Bid (new User("User3"),500);
$secondAuction->makeBid($firstBid);
sleep(6);
if ($secondAuction->isFinish()){
    var_dump($secondAuction->getWinner());
}else{
    echo "Не закончился";
}