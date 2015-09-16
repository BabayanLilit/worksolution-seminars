<?php
require(__DIR__."/Factory.php");
require(__DIR__."/Order.php");
require(__DIR__."/BMWFactory.php");
require(__DIR__."/LADAFactory.php");
require(__DIR__."/BMWOrder.php");
require(__DIR__."/LADAOrder.php");
require(__DIR__."/WorkerUnion.php");
require(__DIR__."/WorkMan.php");
$manager = WorkerUnion::getManager();
$bmwFactory = $manager->getBMWFactory();
$ladaFactory = $manager->getLADAFactory();

$dmitriy = new WorkMan("Дмитрий");

for ($i = 1; $i <= 6; $i++) {
    $order = $bmwFactory->createOrder();
    $order->attach($dmitriy);
    $order->makeCar();
}

$lilit = new WorkMan("Лилит");

for ($i = 1; $i <= 6; $i++) {
    $order = $ladaFactory->createOrder();
    $order->attach($lilit);
    $order->attach($dmitriy);
    $order->makeCar();
}

$dmitriy->showMoney();
$lilit->showMoney();