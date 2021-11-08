<?php

/**
 * 备忘录模式
 *
 * 在不破坏封装性的前提下，捕获一个对象的内部状态，并在该对象之外保存这个状态。这样以后就可将该对象恢复到原先保存的状态
 */


class Person{
    public $age = 10;
    public $sex = "男";

    public function saveState($person){
        return new Memento($person);

    }

    public function coverState(Memento $memento){
        $this->age = $memento->age;
        $this->sex = $memento->sex;
    }

    public function show(){
        echo $this->age.$this->sex;
    }
}

class Memento{
    public $age = 0;
    public $sex = "";
    public function __construct(Person $person){
        $this->age = $person->age;
        $this->sex = $person->sex;
    }
}

//可以做出列表 多个恢复点
class MementoManager{
    public $memento;
}



$person = new Person();
$person->show();

$mementoManager = new MementoManager();
$mementoManager->memento = $person->saveState($person);

$person->age = 11;
$person->sex = "女";
$person->show();

$person->coverState($mementoManager->memento);
$person->show();