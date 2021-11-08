<?php

/**
 * 门面模式/外观模式
 *
 * 简化含有很多逻辑步骤和方法调用的复杂性
 */

class CarDoor{
    public function openDoor(){
        echo "开车门";
    }
    public function closeDoor(){
        echo "关闭车门";
    }
}

class Engine{
    public function openEngine(){
        echo "开引擎";
    }
    public function closeEngine(){
        echo "关闭引擎";
    }
}


class Accelerator {

    public function run()
    {
        echo "踩油门".PHP_EOL;
    }
}

class Breaking
{

    public function run()
    {
        echo "踩刹车" . PHP_EOL;
    }

}

class Car{
    public function __construct(){
        $this->_door = new CarDoor();
        $this->_eingine = new Engine();
        $this->_accelerator = new Accelerator();
        $this->_breaking = new Breaking();
    }

    public function start()
    {
        $this->_door->openDoor();
        $this->_eingine->openEngine();
        $this->_accelerator->run();
    }

    public function stop()
    {
        $this->_breaking->run();
        $this->_eingine->closeEngine();
        $this->_door->closeDoor();
    }
}

$car = new Car();
$car->start();
$car->stop();